<?php
require 'qaconn.php';
session_start();
ini_set('display_errors', 0);
error_reporting(0);

if (!isset($_SESSION['ad_name'])) {
    header('Location: login.php');
    exit();
}

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=appointment_report_" . date('Y-m-d') . ".csv");

$output = fopen('php://output', 'w');

// Output headers as separate columns
fputcsv($output, ['ID', 'Service', 'Customer', 'City', 'Price', 'Worker', 'Status']);

$sql = "SELECT appointment.a_id, services.ser_name, customer.cus_name, customer.city, services.ser_price, 
        worker.wor_name, appointment.a_status 
        FROM appointment 
        LEFT JOIN services ON appointment.ser_id = services.ser_id 
        LEFT JOIN customer ON appointment.cus_id = customer.cus_id 
        LEFT JOIN worker ON appointment.wor_id = worker.wor_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $workerName = isset($row['wor_name']) ? $row['wor_name'] : 'Unassigned';
        $status = isset($row['a_status']) ? $row['a_status'] : '';
        // Each field as a separate element in the array = separate column in Excel
        fputcsv($output, [
            $row['a_id'],
            $row['ser_name'],
            $row['cus_name'],
            $row['city'],
            $row['ser_price'],
            $workerName,
            $status
        ]);
    }
} else {
    fputcsv($output, ['No data found']);
}

fclose($output);
$conn->close();
exit();
?>
