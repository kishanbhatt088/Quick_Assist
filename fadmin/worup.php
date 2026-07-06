<?php require'head.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Service</title>
    <link rel="stylesheet" href="admin.css"> 
    <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>  
        <div id="updateservice">
            <h5>Details </h5>
            <?php 
                if(isset($_GET['id'])){   
                    $id = $_GET['id'];
                    $sqlupdate = "SELECT * FROM worker WHERE wor_id = $id";
                    $result = mysqli_query($conn,$sqlupdate);
                    if(!$result)
                    {   
                        die("query Failed".mysqli_error($conn));
                    }
                    else
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                ?>
            <img src="../image/admin/electrician.png" alt="worker img" id="serimg">
            <form method="post" action="worup.php?id_new=<?php echo $id;?>">
                <div class="show">
                    <lable>Worker :</lable>
                    <input type="text" value="<?php echo $row['wor_name'];?>" name="wor_name">
                </div>
                <div class="show">
                    <lable>Category :</lable>
                    <input type="text" value="<?php echo $row['profession'];?>" name="profession">
                </div>
                <div class="show">
                    <lable>Phone No :</lable>
                    <input type="text" value="<?php echo $row['wor_phno'];?>" name="wor_phno">
                </div>
                <div class="uinline">
                    <div class="show">
                        <lable>City :</lable>
                        <input type="text" value="<?php echo $row['wor_city'];?>" name="wor_city">
                    </div>
                    <div class="show">
                        <lable>Address :</lable>
                        <input type="text" value="<?php echo $row['wor_address'];?>" name="wor_address">
                    </div>
                </div>
                <button type="submit" name="worupdate">UPDATE</button>
            </form> 
        <?php 
                }
            }
        }?>
        </div>
        <?php
            if(isset($_POST['worupdate']))
            {
                if(isset($_GET['id_new'])){
                    $id_new =  $_GET['id_new'];
                }
                $ser_name = $_POST['ser_name'];
                $ser_category = $_POST['ser_category'];
                $ser_section = $_POST['ser_section'];
                $ser_price = $_POST['ser_price'];
                $ser_img = $_POST['ser_time'];
                $ser_time = $_POST['ser_img'];
                $ser_des = $_POST['ser_des'];
                $sql = "UPDATE services SET  ser_name='$ser_name', ser_category = '$ser_category', ser_section = '$ser_section',ser_price = '$ser_price',ser_time = '$ser_time',ser_img = '$ser_img',ser_des = 'ser_des' WHERE ser_id= '$id_new'";
                if(mysqli_query($conn,$sql))
                {   
                    header("Location: service.php");
                }
                else
                {
                    header("Location: serup.php");
                }
            }
        ?>
    </main>
</body>
</html>