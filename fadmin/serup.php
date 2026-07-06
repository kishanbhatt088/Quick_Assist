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
            <h5>Details of </h5>
            <?php 
                if(isset($_GET['id'])){   
                    $id = $_GET['id'];
                    $sqlupdate = "SELECT * FROM services WHERE ser_id = $id";
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
            <img src="../fcus/cusimg/<?php echo $row['ser_img'];?>" alt="service img" id="serimg">
            <form method="post" action="serup.php?id_new=<?php echo $id;?>">
                <div class="show">
                    <lable>Service :</lable>
                    <input type="text" value="<?php echo $row['ser_name'];?>" name="ser_name">
                </div>
                <div class="show">
                    <lable>Category :</lable>
                    <input type="text" value="<?php echo $row['ser_category'];?>" name="ser_category">
                </div>
                <div class="show">
                    <lable>Section :</lable>
                    <input type="text" value="<?php echo $row['ser_section'];?>" name="ser_section">
                </div>
                <div class="uinline">
                    <div class="show">
                        <lable>Price :</lable>
                        <input type="text" value="<?php echo $row['ser_price'];?>" name="ser_price">
                    </div>
                    <div class="show">
                        <lable>Time :</lable>
                        <input type="text" value="<?php echo $row['ser_time'];?>" name="ser_time">
                    </div>
                </div>
                <div class="uinline uimgdes">
                    <div class="show">
                        <lable>Image :</lable>
                        <input type="file" id="uimg" name="ser_img" >
                    </div>
                    <div class="show uimgdes">
                        <lable>Description :</lable>
                        <input type="text" name="ser_des">
                    </div>
                </div>
                <button type="submit" name="serupdate">UPDATE</button>
            </form> 
        <?php 
                }
            }
        }?>
        </div>
        <?php
            if(isset($_POST['serupdate']))
            {
                if(isset($_GET['id_new'])){
                    $id_new =  $_GET['id_new'];
                }
                $ser_name = $_POST['ser_name'];
                $ser_category = $_POST['ser_category'];
                $ser_section = $_POST['ser_section'];
                $ser_price = $_POST['ser_price'];
                $ser_img = $_POST['ser_img'];
                $ser_time = $_POST['ser_time'];
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