<?php
require 'qaconn.php';
session_start();
$ad_name = $_SESSION['ad_name'];
$sql = "SELECT * FROM admin WHERE ad_name = '$ad_name'";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['ad_id'] = $row['ad_id'];
        $_SESSION['ad_img'] = $row['ad_img'];
    }
}

$newRequestCount = 0;
$countQuery = "SELECT COUNT(*) AS new_request_count FROM appointment WHERE a_status = 'NEW'";
$countResult = mysqli_query($conn, $countQuery);
if ($countResult) {
    $countRow = mysqli_fetch_assoc($countResult);
    $newRequestCount = $countRow['new_request_count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Header Navbar</title>
    <link rel="stylesheet" href="admin.css" />
    <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    <style>
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 7px;
            font-size: 12px;
            font-weight: bold;
        }
        .icon-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">Quick Assist</div>
        <ul class="menubar">
            <li><a href="dashboard.php"><i class="fa-solid fa-address-card"></i><span>Dashboard</span></a></li>
            <li><a href="service.php"><i class="fa-solid fa-screwdriver-wrench"></i><span>Services</span></a></li>
            <li><a href="appointment.php"><i class="fa-solid fa-bell"></i><span>New Request</span></a></li>
            <li><a href="worker.php"><i class="fa-solid fa-helmet-safety"></i><span>Worker</span></a></li>
            <li><a href="customer.php"><i class="fa-solid fa-users"></i><span>Customer</span></a></li>
            <li class="logout"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i><span>Log Out</span></a></li>
        </ul>
    </div>

    <header>
        <div class="headerlink">
            <a id="envelopeIcon" href="appointment.php?filter=new" class="icon-container">
                <i class="fa-solid fa-envelope-open-text" style="font-size: 24px;"></i>
                <?php if ($newRequestCount > 0) { ?>
                    <span class="notification-badge"><?php echo $newRequestCount; ?></span>
                <?php } ?>
            </a>
            <div class="admin">
                <img src="../fadmin/adminimg/<?php echo $_SESSION['ad_img']; ?>" alt="Admin Image" />
                <h3><?php echo $ad_name; ?></h3>
            </div>
        </div>
    </header>
</body>
</html>
