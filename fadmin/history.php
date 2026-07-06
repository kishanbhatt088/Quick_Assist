<?php
require 'head.php';


if (!isset($_SESSION['ad_name'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT appointment.a_id, services.ser_name, customer.cus_name, customer.city, services.ser_price, 
        worker.wor_name, appointment.a_status 
        FROM appointment 
LEFT JOIN services ON appointment.ser_id = services.ser_id 
        LEFT JOIN customer ON appointment.cus_id = customer.cus_id 
        LEFT JOIN worker ON appointment.wor_id = worker.wor_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Appointments</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
    
</head>
<body>
    <main>
    <h2>Appointment List</h2>
    <form action="export_report.php" method="post" style="margin-bottom: 16px;">
        <button type="submit">Export to Excel</button>
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>Service</th>
            <th>Customer</th>
            <th>City</th>
            <th>Price</th>
            <th>Worker</th>
            <th>Cancel Reason</th>
            <th>Status</th>
        </tr>
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $workerName = isset($row['wor_name']) ? $row['wor_name'] : 'Unassigned';
                $status = isset($row['a_status']) ? $row['a_status'] : '';
                echo "<tr>
                    <td>{$row['a_id']}</td>
                    <td>{$row['ser_name']}</td>
                    <td>{$row['cus_name']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['ser_price']}</td>
                    <td>{$workerName}</td>
                    <td>{$row['cancel_reason']}</td>
                    <td>{$status}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data found.</td></tr>";
        }
        ?>
    </table>
</main>
</body>
</html>
