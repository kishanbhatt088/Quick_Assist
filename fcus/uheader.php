<?php require 'qaconn.php'; 
        session_start();
        $cus_phno = $_SESSION['cus_phno'];
        $sql = "SELECT * FROM customer WHERE cus_phno = '$cus_phno' ";
        $result = mysqli_query($conn,$sql);
        if(!$result)
        {   
            echo"nothing";
        }
        else
        {
            while($row = mysqli_fetch_assoc($result))
            {   
                $_SESSION['cus_id']= $row['cus_id'];
            }
        }
        $cus_id = $_SESSION['cus_id'];
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer header</title>
        <link rel="stylesheet" href="customer.css">
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <header>
            <div class="logo">
                <h2>Quick Assist</h2>
            </div>
            <div class="links">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="invoice.php">Booking</a></li>
                    <li><a href="quickassist.php">About Us</a></li>
                    <li><a href="logout.php">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a></li>
                </ul>
            </div>       
        </header>
    </body>
</html>