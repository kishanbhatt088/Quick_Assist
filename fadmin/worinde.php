<?php require'head.php';?>
<?php 
if(isset($_GET['id']))
{
    $wor_id = $_GET['id'];
    $sqlDelete = "DELETE FROM worker WHERE wor_id='$wor_id'";
    if(mysqli_query($conn,$sqlDelete))
    {
        header("Location: worker.php");
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
        $wor_name = $_POST['wor_name'];
        $wor_email =$_POST['wor_email'];
        $wor_phno = $_POST['wor_phno'];
        $password = $_POST['password'];
        $wor_city = $_POST['wor_city'];
        $wor_address = $_POST['wor_address'];
        $sqlinsert = "INSERT INTO worker (wor_name,wor_email,wor_phno,password,wor_city,wor_address) VALUES ('$wor_name','$wor_email','$wor_phno','$password','$wor_city','$wor_address')";
        if(mysqli_query($conn,$sqlinsert))
        {   
            header("Location: worker.php");
        }
        else
        {
            header("Location: worinde.php");
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
                <h4>Add New Worker</h4>
                <div class="forms">
                    <div class="insertform">
                        <h5>Worker information</h5>
                        <form action="" method="post">
                            <div class="input">
                                <label>Name:</label>
                                <input type="text" name="wor_name">
                            </div>
                            <div class="fieldinput">
                                <div class="input">
                                    <label>Email:</label>
                                    <input type="text" name="wor_email">
                                </div>
                                <div class="input">
                                    <label>Phone Number:</label>
                                    <input type="text" name="wor_phno">
                                </div>
                            </div>
                            <div class="fieldinput">
                                <div class="input">
                                    <label>Profession :</label>
                                    <input type="text" name="profession">
                                </div>
                                <div class="input">
                                    <label>Password:</label>
                                    <input type="text" name="password">
                                </div>
                            </div>
                            <div class="fieldinput">
                                <div class="input">
                                    <label>City :</label>
                                    <input type="text" name="wor_city">
                                </div>
                                <div class="input">
                                    <label>Address:</label>
                                    <input type="text" name="wor_address">
                                </div>
                            </div>
                            <button type="submit" name="insert" style ="background-color :black; color : white; height : 30px ">Add</button>
                        </form>
                    </div>  
                </div> 
            </div>
        </main>
    </body>
</html>
