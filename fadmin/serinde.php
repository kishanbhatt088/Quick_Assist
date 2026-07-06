<?php require'head.php';?>

<?php 
if(isset($_GET['id']))
{
    $ser_id = $_GET['id'];
    $sqlDelete = "DELETE FROM services WHERE ser_id='$ser_id'";
    if(mysqli_query($conn,$sqlDelete))
    {
        header("Location: service.php");
        echo'<script>alert("service deleted")</script>';
    }
    else
    {
        header("location:servicetable.php");
    }
}
?>
<?php
    if(isset($_POST['insert']))
    {
        $ser_name = $_POST['ser_name'];
        $ser_category = $_POST['ser_category'];
        $ser_section = $_POST['ser_section'];
        $ser_price = $_POST['ser_price'];
        $ser_time = $_POST['ser_time'];
        $ser_img = $_POST['ser_img'];
        $ser_des = $_POST['ser_des'];
        $sqlinsert = "INSERT INTO services(ser_name,ser_category,ser_section,ser_price,ser_time,ser_img,ser_des)VALUES('$ser_name','$ser_category','$ser_section','$ser_price','$ser_time','$ser_img','$ser_des')";
        if(mysqli_query($conn,$sqlinsert))
        {   
            header("Location: service.php");
            echo'<script>alert("New service inserted successfully")';
        }
        else
        {
            header("Location: seroperation.php");
            echo'<script>alert("No data inserted")';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>service table operations</title>
        <link rel="stylesheet" href="admin.css">
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <div>
                <h4>Add New Service</h4>
                <div class="forms">
                    <div class="insertform">
                        <h5>Service information</h5>
                        <form action="serinde.php" method="post">
                            <div class="input">
                                <label>Service Name:</label>
                                <input type="text" name="ser_name">
                            </div>
                            <div class="fieldinput">
                                <div class="input">
                                    <label>Category:</label>
                                    <input type="text" name="ser_category">
                                </div>
                                <div class="input">
                                    <label>Section:</label>
                                    <input type="text" name="ser_section">
                                </div>
                            </div>
                            <div class="fieldinput">
                                <div class="input">
                                    <label>Price:</label>
                                    <input type="text" name="ser_price">
                                </div>
                                <div class="input">
                                    <label>Duration:</label>
                                    <input type="text" name="ser_time">
                                </div>
                            </div>
                            <div class="decimbox">
                                <div class="input">
                                    <label>Image:</label>
                                    <input type="file" name="ser_img" id="img">
                                </div>
                                <div class="input">
                                    <label>Description:</label>
                                    <input type="text" name="ser_des">
                                </div>
                            </div>
                            <input type="submit" name="insert" id="insertservicebtn">
                        </form>
                    </div>  
                </div> 
            </div>
        </main>
    </body>
</html>
