<?php
require 'whead.php';
// Ensure $wor_id is set, e.g., from session
$wor_id = $_SESSION['wor_id'];

// Accept request (set status to 'working')
if (isset($_GET['aid']) && isset($_GET['action']) && $_GET['action'] === 'accept') {
    $a_id = $_GET['aid'];
    $working = "working";
    $sqlaccept = "UPDATE appointment SET a_status ='$working' WHERE a_id='$a_id'";
    if (mysqli_query($conn, $sqlaccept)) {
        header("Location: request.php");
        exit;
    } else {
        header("Location: servicetable.php");
        exit;
    }
}

// Reject request (set status to 'cancel', with optional reason)
// Reject request (set status to 'cancel' and worker available)
if (isset($_GET['aid']) && isset($_GET['action']) && $_GET['action'] === 'reject') {
    $a_id   = (int)$_GET['aid'];
    $cancel = "cancel";
    $wor_id = (int)$_SESSION['wor_id'];   // you said you already have this

    // Optional reason
    $reason = isset($_GET['reason']) ? mysqli_real_escape_string($conn, $_GET['reason']) : '';

    if ($reason !== '') {
        $sqlcancel = "UPDATE appointment 
                      SET a_status = '$cancel',
                          cancel_reason = '$reason'
                      WHERE a_id = $a_id";
    } else {
        $sqlcancel = "UPDATE appointment 
                      SET a_status = '$cancel'
                      WHERE a_id = $a_id";
    }

    if (mysqli_query($conn, $sqlcancel)) {

        // change worker status to available
        if ($wor_id > 0) {
            $sqlWorker = "UPDATE worker 
                          SET wor_status = 'available' 
                          WHERE wor_id = $wor_id";
            mysqli_query($conn, $sqlWorker);
        }

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
    <h4>New Requested</h4>
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
                    <td>ACCEPT</td>
                    <td>REJECT</td>
                </tr>
<?php
// Show new/requested appointments
$sql = "SELECT appointment.*, services.ser_name, services.ser_price, customer.cus_name 
        FROM appointment 
        INNER JOIN services ON appointment.ser_id = services.ser_id
        INNER JOIN customer ON appointment.cus_id = customer.cus_id
        WHERE appointment.wor_id = '$wor_id' AND appointment.a_status = 'requested'";
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
                <a href="request.php?aid=<?php echo $row['a_id']; ?>&action=accept">
                    <i class="fa-regular fa-square-check"></i>
                </a>
            </td>
            <td>
                <a href="javascript:void(0);" onclick="rejectRequest(<?php echo $row['a_id'];?>);">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8' style='text-align:center'>No new requests found.</td></tr>";
}
?>
            </table>
        </div>
    </div>

</main>
</body>
</html>