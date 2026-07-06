<?php
require 'whead.php';
// Ensure $wor_id is set, e.g., from session
$wor_id = $_SESSION['wor_id'];

// Accept request (set status to 'working')
if (isset($_GET['aid']) && isset($_GET['action']) && $_GET['action'] === 'accept') {
    $a_id = (int)$_GET['aid'];
    $working = "working";

    // 1) Update appointment status
    $sqlaccept = "UPDATE appointment SET a_status = '$working' WHERE a_id = $a_id";
    if (mysqli_query($conn, $sqlaccept)) {
        // 2) Update worker status in worker table
        $wor_id_int = (int)$wor_id; // from $_SESSION['wor_id']
        $sqlWorker = "UPDATE worker SET wor_status = '$working' WHERE wor_id = $wor_id_int";
        mysqli_query($conn, $sqlWorker);

        header("Location: request.php");
        exit;
    } else {
        header("Location: servicetable.php");
        exit;
    }
}

// Complete request (set status to 'completed')
if (isset($_GET['aid']) && isset($_GET['action']) && $_GET['action'] === 'complete') {
    $a_id = (int)$_GET['aid'];
    $completed = "completed";

    // 1) Update appointment status
    $sqlcomplete = "UPDATE appointment SET a_status = '$completed' WHERE a_id = $a_id";

    if (mysqli_query($conn, $sqlcomplete)) {
        // 2) Set worker status to available in worker table
        $wor_id_int = (int)$wor_id;
        $sqlWorker = "UPDATE worker SET wor_status = 'available' WHERE wor_id = $wor_id_int";
        mysqli_query($conn, $sqlWorker);

        header("Location: task.php");
        exit;
    } else {
        header("Location: servicetable.php");
        exit;
    }
}

// Reject request (set status to 'cancel', with optional reason)
if (isset($_GET['aid']) && isset($_GET['action']) && $_GET['action'] === 'reject') {
    $a_id = $_GET['aid'];
    $cancel = "cancel";
    // Optionally handle a reason field if present and column exists in DB
    $reason = isset($_GET['reason']) ? mysqli_real_escape_string($conn, $_GET['reason']) : '';
    // Add cancel_reason only if you have that column in your DB
    if ($reason !== '') {
        $sqlcancel = "UPDATE appointment SET a_status ='$cancel', cancel_reason='$reason' WHERE a_id='$a_id'";
    } else {
        $sqlcancel = "UPDATE appointment SET a_status ='$cancel' WHERE a_id='$a_id'";
    }
    if (mysqli_query($conn, $sqlcancel)) {
        header("Location: request.php");
        exit;
    } else {
        header("Location: servicetable.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Tasks</title>
    <link rel="stylesheet" href="admin.css">
    <script src="admin.js"></script>
    <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    <script>
        // For rejection with reason (optional)
        function rejectRequest(aid) {
            let reason = prompt("Please enter the reason for canceling the request:");
            if (reason !== null && reason.trim() !== "") {
                window.location.href = "request.php?aid=" + aid + "&action=reject&reason=" + encodeURIComponent(reason);
            } else {
                alert("Cancellation reason is required to reject the request.");
            }
        }
    </script>
</head>
<body>
<main>
    <h4>Working Tasks</h4>
    <div class="tableview">
        <div>
            <table id="table">
                <tr>
                    <td>ID</td>
                    <td>NAME</td>
                    <td>CUSTOMER</td>
                    <td>DATE</td>
                    <td>ADDRESS</td>
                    <td>PRICE</td>
                    <td>COMPLETED</td>
                </tr>
<?php
// Show working appointments
$sql = "SELECT appointment.*, services.ser_name, services.ser_price, customer.cus_name 
        FROM appointment 
        INNER JOIN services ON appointment.ser_id = services.ser_id
        INNER JOIN customer ON appointment.cus_id = customer.cus_id
        WHERE appointment.wor_id = '$wor_id' AND appointment.a_status = 'working'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
?>
        <tr>
            <td><?php echo $row['a_id']; ?></td>
            <td><?php echo $row['ser_name']; ?></td>
            <td><?php echo $row['cus_name']; ?></td>
            <td><?php echo $row['a_date']; ?></td>
            <td><?php echo $row['a_addre']; ?></td>
            <td><?php echo $row['ser_price']; ?></td>
            <td>
                <a href="task.php?aid=<?php echo $row['a_id']; ?>&action=complete">
                    <i class="fa-solid fa-check"></i>
                </a>
            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7' style='text-align:center'>No working tasks found.</td></tr>";
}
?>
            </table>
        </div>
    </div>
</main>
</body>
</html>