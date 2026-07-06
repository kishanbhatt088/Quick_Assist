
<?php require 'qaconn.php';
    session_start();
    $wor_phno = $_SESSION['wor_phno'];
    $sql = "SELECT * FROM worker WHERE wor_phno = '$wor_phno'";
    $result = mysqli_query($conn,$sql);
    if(!$result)
    {   
        echo"nothing";
    }
    else
    {
        while($row = mysqli_fetch_assoc($result))
        {   
            $_SESSION['wor_id'] = $row['wor_id'];
            $_SESSION['wor_name'] = $row['wor_name']; 
            $_SESSION['wor_img'] = $row['wor_image'];
        }
    }
$wor_id = $_SESSION['wor_id'] ?? null; // Safe access
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>header - nav bar</title>
        <link rel="stylesheet" href="worker.css">
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="sidebar">
        <div class="admin">
                    <img src="../fworker/workerimg/<?php echo $_SESSION['wor_img'];?>">
                    <h3><?php echo $_SESSION['wor_name'];?></h3>
                </div>
            
            <ul class="menubar">
                
                <li>
                    <a href="#">
                        <i class="fa-solid fa-address-card"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="task.php">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <span>Task</span>
                    </a>
                </li>
                <li>
                    <a href="request.php">
                        <i class="fa-solid fa-bell"></i>
                        <span>New Request</span>
                    </a>
                </li>
                <li>
                    <a href="history.php">
                        <i class="fa-solid fa-receipt"></i>
                        <span>History</span>
                    </a>
                </li>
                <!---<li>
                    <a href="#">
                        <i class="fa-solid fa-user-tie"></i>
                        <span>Profile</span>
                    </a>
                </li>--->
                <li class="logout">
                    <a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
        <header>
        </header>
    </body>
</html>