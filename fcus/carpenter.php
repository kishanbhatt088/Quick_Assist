<?php require'uheader.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ELECTRICIAN PAGE</title>
        <script src="customer.js" ></script>
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
<!----------------------------------------------------------main content start from here-------------------------------------------------------------------->
        <main>
            <div class="serpageimgbar" id="carpenterpage">
                <h1>Carpenter</h1>
            </div>
            <div class="sltservice">
                <div class="field">
                    <img src="../fcus/cusimg/cupboard & drawer.png" alt="cupboard & drawer">
                    <h4>Cupboard & Drawer</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/furniture repair.png" alt="furniture repair">
                    <h4>Furniture repair</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/looking for something else.png" alt="looking for something else">
                    <h4>Something else?</h4>
                </div>
            </div>
<!----------------------------------------------------service list start from here------------------------------------------------------------------------------>
            <div class="boxlayout">
            <!------------------------------Cupboard & Drawer---------------------------------->
                <h2>Cupboard & Drawer</h2>
                    <div class="listbox">
                    <?php 
                    $sql = "SELECT *FROM services WHERE ser_section='Cupboard & Drawer'";
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
            <!----------------------------------------furniture repair---------------------------------->
                <h2>Furniture repair</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='furniture repair'";
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
            <!---------------------------------------looking for something else----------------------------------------------------->
            <h2>Looking for something else</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='looking for something else?'";
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