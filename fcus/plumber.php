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
            <div class="serpageimgbar" id="plumberpage">
                <h1>Plumber</h1>
            </div>
            <div class="sltservice">
                <div class="field">
                    <img src="../fcus/cusimg/bath.png" alt="bath">
                    <h4>Bath fitting</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/basin.png" alt="basin">
                    <h4>Basin & Sink</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/drainage pipes.png" alt="drainage pipes">
                    <h4>Drainage pipes</h4>
                </div>
            </div>
<!----------------------------------------------------service list start from here------------------------------------------------------------------------------>
            <div class="boxlayout">
            <!------------------------------Bath fitting---------------------------------->
                <h2>Bath fitting</h2>
                    <div class="listbox">
                    <?php 
                    $sql = "SELECT *FROM services WHERE ser_section='bath fitting'";
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
            <!----------------------------------------Basin & Sink---------------------------------->
                <h2>Basin & Sink</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='basin & sink'";
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
            <!---------------------------------------Drainage pipes----------------------------------------------------->
            <h2>Drainage pipes</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='Drainage pipes'";
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