<?php require'head.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Service</title>
        <link rel="stylesheet" href="admin.css">
        <script src="admin.js"></script> 
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
        <h5>Today</h5>
            <div class="dashbox">
                <div class="reportbox" id="income">
                    <div class="leftdashbox">
                    <?php
                        ?>
                        <h5><?php
                                $row = $conn->query("SELECT SUM(amount) AS amount FROM cus_payment")->fetch_assoc();
                                echo $row['amount'] == null ? '0' : $row['amount'];
                                ?></h5>
                        <h6>Revenue</h6>
                    </div>
                    <i class="fa-solid fa-sack-dollar"></i>
                </div>
                <div class="reportbox">
                <a href="appointment.php" style="color:cateblue;">    
                <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM appointment WHERE a_status = 'New'")->num_rows;
                                ?></h5>

                        <h6>New Request</h6>
                    </div>
                    </a>
                    <i class="fa-regular fa-bell"></i>
                </div>
                <div class="reportbox">
                    <a href="customer.php" style="color:cateblue">
                    <div class="leftdashbox">
                        <h5>10</h5>
                        <h6>New User</h6>
                    </div>
                    </a>
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="reportbox">
                    <a href="worker.php" style="color:cateblue">
                    <div class="leftdashbox">
                        <h5>10</h5>
                        <h6>New Worker</h6>
                    </div>
                    </a>
                    <i class="fa-solid fa-id-card-clip"></i>
                </div>
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM appointment WHERE a_status = 'completed'")->num_rows;
                                ?></h5>
                        <h6>complete </h6>
                    </div>
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM appointment")->num_rows;
                                ?></h5>
                        <h6>Total Task </h6>
                    </div>
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
                
                <div class="reportbox">
                    <a href="history.php">
                    <div class="leftdashbox">
                        <h6 style="padding-top: 12px;">History </h6>
                    </div>
                    </a>
                    <i class="fa-solid fa-clock"></i>
                </div>
            </div>
            <h5>Workers</h5>
            <div class="dashbox">
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM worker WHERE profession = 'Electrician'")->num_rows;
                                ?></h5>
                        <h6>Electrician</h6>
                    </div>
                    <i class="fa-solid fa-plug"></i>
                </div>
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM worker WHERE profession = 'Plumber'")->num_rows;
                                ?></h5>
                        <h6>Plumber</h6>
                    </div>
                    <i class="fa-solid fa-wrench"></i>
                </div>
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM worker WHERE profession = 'Carpenter'")->num_rows;
                                ?></h5>
                        <h6>Carpenter</h6>
                    </div>
                    <i class="fa-solid fa-hammer"></i>
                </div>
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM worker WHERE profession = 'Cleaner'")->num_rows;
                                ?></h5>
                        <h6>Cleaner</h6>
                    </div>
                    <i class="fa-solid fa-broom"></i>
                </div>
                <div class="reportbox">
                    <div class="leftdashbox">
                        <h5><?php
                                echo $comp = $conn->query("SELECT * FROM worker WHERE profession = 'Salon'")->num_rows;
                                ?></h5>
                        <h6>Salon</h6>
                    </div>
                    <i class="fa-solid fa-scissors"></i>
                </div>
            </div>
        </main>
    </body>
</html>
