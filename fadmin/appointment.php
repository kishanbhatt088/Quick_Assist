<?php
require 'head.php';

// DELETE APPOINTMENT
if (isset($_GET['id'])) {
    $a_id = intval($_GET['id']);
    $conn->query("DELETE FROM appointment WHERE a_id = $a_id");
    header("Location: appointment.php");
    exit();
}

// WORKER REJECT/CANCEL
if (isset($_GET['action']) && isset($_GET['a_id'])) {
    $a_id   = intval($_GET['a_id']);
    $action = strtolower($_GET['action']);

    if ($action === 'reject' || $action === 'cancel') {

        // 1) Set appointment status to rejected
        $conn->query("UPDATE appointment 
                      SET a_status = 'rejected' 
                      WHERE a_id = $a_id");

        // 2) Set worker status back to available, if a worker is assigned
        $conn->query("UPDATE worker 
                      JOIN appointment ON worker.wor_id = appointment.wor_id
                      SET worker.wor_status = 'available'
                      WHERE appointment.a_id = $a_id");

        header("Location: appointment.php");
        exit();
    }
}

// FILTER HANDLING
$filterStatus = isset($_GET['filter']) ? strtolower(trim($_GET['filter'])) : 'all';
$validFilters = ['new', 'completed', 'cancelled', 'rejected', 'all'];
if (!in_array($filterStatus, $validFilters)) {
    $filterStatus = 'all';
}

// MAIN QUERY: join worker for wor_status and wor_id
$sql = "SELECT appointment.*, 
               services.ser_name, 
               services.ser_price, 
               customer.cus_name,
               worker.wor_status,
               worker.wor_id
        FROM appointment
        INNER JOIN services ON appointment.ser_id = services.ser_id
        INNER JOIN customer ON appointment.cus_id = customer.cus_id
        LEFT JOIN worker    ON appointment.wor_id = worker.wor_id";
if ($filterStatus !== 'all') {
    $sql .= " WHERE LOWER(appointment.a_status) = '{$filterStatus}'";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Service - Appointments</title>
<link rel="stylesheet" href="admin.css" />
<script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
<script src="admin.js"></script>
</head>
<body>
<main>
    <h4>Appointment List</h4>
    <div class="tableview">
        <div class="heading">
            <div class="tablesearchbox">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="search" placeholder="Search..." />
            </div>
            <div class="filter">
                <form method="get" style="display: inline;">
                    <select name="filter" id="statusFilter" onchange="this.form.submit()" style="padding-left:730px">
                        <option value="all"       <?php if ($filterStatus === 'all')       echo 'selected'; ?>>All</option>
                        <option value="new"       <?php if ($filterStatus === 'new')       echo 'selected'; ?>>New</option>
                        <option value="completed" <?php if ($filterStatus === 'completed') echo 'selected'; ?>>Completed</option>
                        <option value="cancelled" <?php if ($filterStatus === 'cancelled') echo 'selected'; ?>>Cancelled</option>
                        <option value="rejected"  <?php if ($filterStatus === 'rejected')  echo 'selected'; ?>>Rejected</option>
                    </select>
                </form> 
            </div>
        </div>
        <table id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SERVICE</th>
                    <th>CUSTOMER</th>
                    <th>CITY</th>
                    <th>PRICE</th>
                    <th>WORKER</th>
                    <th>W_STATUS</th>
                    <th>STATUS</th>
                    <th>CANCEL REASON</th>
                    <th>Assign/View</th>
                    <th>Reject</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
<?php
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // wor_status from worker table (may be NULL if unassigned)
        $worStatus = strtolower($row['wor_status'] ?? '');
        $aStatus   = strtolower($row['a_status']);

        if ($worStatus === 'rejected') {
            $displayStatus = 'rejected';
        } elseif ($worStatus === 'accepted') {
            $displayStatus = 'performing';
        } elseif ($worStatus === 'completed') {
            $displayStatus = 'completed';
        } else {
            $displayStatus = $aStatus;
        }

        $workerDisplay       = $row['wor_id'] ? $row['wor_id'] : 'Unassigned';
        $workerStatusDisplay = $worStatus ? $worStatus : 'Unassigned';

        echo "<tr>";
        echo "<td>{$row['a_id']}</td>";
        echo "<td>{$row['ser_name']}</td>";
        echo "<td>{$row['cus_name']}</td>";
        echo "<td>{$row['a_city']}</td>";
        echo "<td>{$row['ser_price']}</td>";
        echo "<td>{$workerDisplay}</td>";
        echo "<td>{$workerStatusDisplay}</td>";
        echo "<td>{$displayStatus}</td>";
        echo "<td style=\"text-align:center\">{$row['cancel_reason']}</td>";

        // Assign / View link
        echo "<td>";
        if (in_array($displayStatus, ['new', 'cancelled', 'rejected'])) {
            echo "<a href=\"wassign.php?id={$row['a_id']}\" title=\"Assign/Reassign Worker\"><i class=\"fa-solid fa-user-plus\"></i></a>";
        } else {
            echo "<a href=\"wassign.php?id={$row['a_id']}\" title=\"View Assignment\"><i class=\"fa-solid fa-eye\"></i></a>";
        }
        echo "</td>";

        // Reject/Cancel Button
        if (!in_array($displayStatus, ['rejected', 'completed'])) {
            echo "<td><a href=\"appointment.php?action=reject&a_id={$row['a_id']}\" onclick=\"return confirm('Are you sure to reject/cancel this appointment?');\">";
            echo "<i class=\"fa-solid fa-ban\"></i></a></td>";
        } else {
            echo "<td></td>";
        }

        // Delete Button
        echo "<td><a href=\"appointment.php?id={$row['a_id']}\" onclick=\"return confirm('Are you sure to delete this request?');\">";
        echo "<i class=\"fa-solid fa-trash-can\"></i></a></td>";
        echo "</tr>";
    }
}
?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
