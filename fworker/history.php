<?php
require 'whead.php';
// Ensure $wor_id is set, e.g., from session
$wor_id = $_SESSION['wor_id'];
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
   
</head>
<body>
<main>
    
    <h4>Completed Tasks</h4>
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
                </tr>
<?php
// Show completed appointments
$sql = "SELECT appointment.*, services.ser_name, services.ser_price, customer.cus_name 
        FROM appointment 
        INNER JOIN services ON appointment.ser_id = services.ser_id
        INNER JOIN customer ON appointment.cus_id = customer.cus_id
        WHERE appointment.wor_id = '$wor_id' AND appointment.a_status = 'completed'";
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
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='6' style='text-align:center'>No completed tasks found.</td></tr>";
}
?>
            </table>
        </div>
    </div>
    <h4>Cancelled Tasks</h4>
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
                    <td>REASON</td>
                </tr>
<?php
// Show cancelled appointments
$sql = "SELECT appointment.*, services.ser_name, services.ser_price, customer.cus_name 
        FROM appointment 
        INNER JOIN services ON appointment.ser_id = services.ser_id
        INNER JOIN customer ON appointment.cus_id = customer.cus_id
        WHERE appointment.wor_id = '$wor_id' AND appointment.a_status = 'cancel'";
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
            <td><?php echo isset($row['cancel_reason']) ? $row['cancel_reason'] : ""; ?></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='7' style='text-align:center'>No cancelled tasks found.</td></tr>";
}
?>
            </table>
        </div>
    </div>
</main>
</body>
</html>