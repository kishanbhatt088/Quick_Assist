<?php require 'qaconn.php'; 
     session_start();
    
    if(isset($_POST['cusreg']))
    {
        $cus_name = $_POST['cus_name'];
        $cus_email = $_POST['cus_email'];
        $cus_phno = $_POST['cus_phno'];
        $city = $_POST['city'];
        $password= $_POST['password'];
        $sqlinsert = "INSERT INTO customer(cus_name,cus_email,cus_phno,city,password)VALUES('$cus_name','$cus_email','$cus_phno','$city','$password')";
        if(mysqli_query($conn,$sqlinsert))
        {   
            header("Location: login.php");
        }
        else
        {
            header("Location: login.php");
        }
    }
    if(isset($_POST['cuslgn'])) {
    $cus_phno = $_POST['cus_phno'];
    $password = $_POST['password'];

    // Prevent SQL injection with prepared statements
    $stmt = $conn->prepare("SELECT * FROM customer WHERE cus_phno = ? AND password = ?");
    $stmt->bind_param("ss", $cus_phno, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching user exists
    if($result->num_rows == 1) {
        $_SESSION['cus_phno'] = $cus_phno;
        $_SESSION['password'] = $password;
        header("Location: home.php");
        exit;
    } else {
        echo "<script>alert('Invalid phone number or password');</script>";
        header("Location: login.php");
        exit;
    }
}

    if(isset($_POST['wreg']))
    {
        $wor_name = $_POST['wor_name'];
        $wor_email = $_POST['wor_email'];
        $wor_phno = $_POST['wor_phno'];
        $wor_city = $_POST['city'];
        $profession = $_POST['profession'];
        $password= $_POST['password'];
        $sqlinsert = "INSERT INTO worker(wor_name,wor_email,wor_phno,wor_city,profession,password)VALUES('$wor_name','$wor_email','$wor_phno','$wor_city','$profession','$password')";
        if(mysqli_query($conn,$sqlinsert))
        {   
            header("Location: login.php");
        }
        else
        {
            header("Location: login.php");
        }

    }
    
    if(isset($_POST['wlgn']))
    {
        $wor_phno = $_POST['wor_phno'];
        $password = $_POST['password'];
        $sqlinsert = "SELECT * FROM worker WHERE wor_phno = '$wor_phno' AND password = '$password' ";
        if(mysqli_query($conn,$sqlinsert))
        {   
            $_SESSION['wor_phno'] = $wor_phno;
            header("Location: ../fworker/task.php");
        }
        else
        {
            header("Location: login.php");
        }
    }
    
    if(isset($_POST['algn']))
    {
        $ad_name = $_POST['ad_name'];
        $password = $_POST['password'];
        $sqlinsert = "SELECT * FROM admin WHERE ad_name = '$ad_name' AND ad_pass = '$ad_pass' ";
        if(mysqli_query($conn,$sqlinsert))
        {   
            $_SESSION['ad_name'] = $ad_name;
            header("Location: ../fadmin/dashboard.php");
            exit;
        }
        else
        {
            header("Location: login.php");
        }
    }

?>