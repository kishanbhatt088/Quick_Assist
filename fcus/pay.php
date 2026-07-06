<?php require 'qaconn.php'; 
     session_start();
     if (!empty($_GET))
    {
        $p_number = $_GET['tx'];
        $amt = $_GET['amt'];
    }
    $ser_id = $_SESSION['ser_id'];
    $cus_id = $_SESSION['cus_id'];
    $a_addre = $_SESSION['a_addre'];
    $a_city = $_SESSION['a_city'];
    $a_date = $_SESSION['a_date'];
    $amount = $amt*83;
    $sql = "INSERT INTO appointment(ser_id,cus_id,a_addre,a_city,a_date,a_status)VALUES('$ser_id','$cus_id','$a_addre','$a_city','$a_date','NEW')";
    if(mysqli_query($conn,$sql))
    {
        $apoid = "SELECT *FROM appointment WHERE cus_id = '$cus_id' AND ser_id = '$ser_id'";
        $result = $conn->query($apoid);
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $aid = $row['a_id'];
            }
        }
        $asql = "INSERT INTO cus_payment(cus_id,a_id,p_number,amount)VALUES('$cus_id','$aid','$p_number','$amount')";
        if(mysqli_query($conn,$asql))
        {
            header("Location:invoice.php");
        }
        else{
            echo "payment error";
        }
    }
?>