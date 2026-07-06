<?php require'uheader.php' ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CLEANING PAGE</title>
        <script src="customer.js" ></script>
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
<!----------------------------------------------------------main content start from here-------------------------------------------------------------------->
        <main>
            <div class="serpageimgbar" id="cleaningpage">
                <h1>Cleaning</h1>
            </div>
            <div class="sltservice">
                <div class="field">
                    <img src="../fcus/cusimg/Bathroom & Kitchen cleaning.png" alt="Bathroom & Kitchen cleaning">
                    <h4>Bathroom & Kitchen cleaning</h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/Mini services.png" alt="Mini services">
                    <h4>Mini services </h4>
                </div>
                <div class="field">
                    <img src="../fcus/cusimg/Sofa & Carpet Cleaning.png" alt="Sofa & Carpet Cleaning">
                    <h4>Sofa & Carpet Cleaning</h4>
                </div>
            </div>
<!----------------------------------------------------service list start from here------------------------------------------------------------------------------>
            <div class="boxlayout">
            <!------------------------------Bathroom & Kitchen cleaning---------------------------------->
                <h2>Bathroom & Kitchen cleaning</h2>
                    <div class="listbox">
                    <?php 
                    $sql = "SELECT *FROM services WHERE ser_section='Bathroom & Kitchen cleaning'";
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
            <!----------------------------------------Mini services---------------------------------->
                <h2>Mini services</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section=' Mini services'";
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
            <!--------------------------------------Sofa & Carpet Cleaning----------------------------------------------------->
            <h2>Sofa & Carpet Cleaning</h2>
                    <div class="listbox">
                    <?php 
                        $sql = "SELECT *FROM services WHERE ser_section='Sofa & Carpet Cleaning'";
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