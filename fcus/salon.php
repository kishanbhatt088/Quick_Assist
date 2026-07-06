<?php require'uheader.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SALON PAGE</title>
        <script src="customer.js" ></script>
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
<!----------------------------------------------------------main content start from here-------------------------------------------------------------------->
        <main>
            <div class="serpageimgbar" id="salonpage">
                <h1>Salon</h1>
            </div>
            <div class="sltservice">
                <div class="field">
                    <img src="../fcus/cusimg/haircut & beard styling.png" alt="haircut & beard styling">
                    <h4>Haircut & Beard styling</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/Hair Color.png" alt="Hair Color">
                    <h4>Hair Color </h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/Face care.png" alt="Face care">
                    <h4>Face care</h4>
                </div>
            </div>
<!----------------------------------------------------service list start from here------------------------------------------------------------------------------>
            <div class="boxlayout">
            <!------------------------------haircut & beard styling---------------------------------->
                <h2>Haircut & Beard styling</h2>
                    <div class="listbox">
                    <?php 
                    $sql = "SELECT *FROM services WHERE ser_section='haircut & beard styling'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {?>
                            <div class="serdetailbox">
                                <img src="../fcus/cusimg/<?php echo"$row[ser_img]"; ?>">
                                <h2><?php echo"$row[ser_name]";?></h2>
                                <div class="debtn">
                                    <div class="pricetime">
                                        <h3> ₹ <?php echo"$row[ser_price]"; ?></h3>
                                        <h3><?php echo"$row[ser_time]"; ?></h3>
                                    </div>
                                    <div class="bookbtn">
                                        <a href="book.php?id=<?php echo"$row[ser_id]"; ?>">Book</a> 
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                    }?>
                    </div>
            <!----------------------------------------Hair Color---------------------------------->
                <h2>Hair Color</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='Hair Color'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {?>
                                <div class="serdetailbox">
                                    <img src="../fcus/cusimg/<?php echo"$row[ser_img]"; ?>">
                                    <h2><?php echo"$row[ser_name]";?></h2>
                                    <div class="debtn">
                                        <div class="pricetime">
                                            <h3> ₹ <?php echo"$row[ser_price]"; ?></h3>
                                            <h3><?php echo"$row[ser_time]"; ?></h3>
                                        </div>
                                        <div class="bookbtn">
                                            <a href="book.php?id=<?php echo"$row[ser_id]"; ?>">Book</a> 
                                        </div>
                                    </div>
                                </div>
                            <?php 
                            }
                    }?>
                    </div>
            <!---------------------------------------Face care----------------------------------------------------->
            <h2>Face care</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='Face care'";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0)
                        {
                            while($row = $result->fetch_assoc())
                            {?>
                                <div class="serdetailbox">
                                    <img src="../fcus/cusimg/<?php echo"$row[ser_img]"; ?>">
                                    <h2><?php echo"$row[ser_name]";?></h2>
                                    <div class="debtn">
                                        <div class="pricetime">
                                            <h3> ₹ <?php echo"$row[ser_price]"; ?></h3>
                                            <h3><?php echo"$row[ser_time]"; ?></h3>
                                        </div>
                                        <div class="bookbtn">
                                            <a href="book.php?id=<?php echo"$row[ser_id]"; ?>">Book</a> 
                                        </div>
                                    </div>
                                </div>
                            <?php 
                            }
                    }?>
                    </div>
            </div>
        </main>
        <?php require'ufooter.php'; ?>
    </body>
</html>