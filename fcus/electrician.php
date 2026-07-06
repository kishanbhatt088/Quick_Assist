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
            <div class="serpageimgbar" id="electricianpage">
                <h1>Electrician</h1>
            </div>
            <div class="sltservice">
                <div class="field">
                    <img src="../fcus/cusimg/switch.png" alt="switch & socket">
                    <h4>Switch & socket</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/fan.png" alt="fan">
                    <h4>Fan</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/light.png" alt="light">
                    <h4>Light</h4>
                </div>
            </div>
<!----------------------------------------------------service list start from here------------------------------------------------------------------------------>
            <div class="boxlayout">
            <!------------------------------switch & socket---------------------------------->
                <h2>Switch & Socket</h2>
                    <div class="listbox">
                    <?php 
                    $sql = "SELECT *FROM services WHERE ser_section='Switch & socket'";
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
            <!----------------------------------------fan---------------------------------->
                <h2>Fan</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='fan'";
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
            <!---------------------------------------light----------------------------------------------------->
            <h2>Light</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='Light'";
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
        <?php require 'ufooter.php'; ?>
    </body>
</html>