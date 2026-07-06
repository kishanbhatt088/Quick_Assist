<?php require'uheader.php';
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BOOKING PAGE</title>
        <script src="customer.js" ></script>
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <div id="updateservice">
                <h5>Details </h5>
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
                <form method="post" action="abook.php">
                    <input type="hidden" value="<?php echo $row['ser_id'];?>" name="ser_id">
                    <div class="show">
                        <lable>Service :</lable>
                        <input type="text" value="<?php echo $row['ser_name'];?>" disabled >
                    </div>
                    <div class="show">
                        <lable>Price:</lable>
                        <input type="text" value="<?php echo $row['ser_price'];?>" name = "ser_price"  >
                    </div>
                    <div class="show">
                            <lable>City :</lable>
                            <input type="text"  name="a_city" required>
                    </div>
                    <div class="show">
                            <lable>Address :</lable>
                            <input type="text"  name="a_addre" required>
                    </div>
                    <div class="show">
                        <lable>Time :</lable>
                        <input type="date" name="a_date" required min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <input type="submit" name="book" value="BOOK" id="bookbtn"> 
                </form> 
            
            </div>
            <p style = "text-align : center">NOTE : CUSTOMER NEED TO PR-PAY 40% OF SERVICE COST FOR VISITE CHARGE AND BOOKING CHARGE.</p>
            <?php 
                    }
                }
            }?>
        </main>
    </body>
</html>