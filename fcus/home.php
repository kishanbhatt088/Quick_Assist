<?php require 'uheader.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <main>
        <div class="imagebar">
        </div>
        <div class="category">
        <div class="sertitle">
                    <h2>Services</h2>
                </div>
        </div>
        <div class="categorylist">
            <a href="electrician.php">
            <div class="catbox" >
                <img src="../fcus/cusimg/electrician_icon.png" alt="electrician">
                <h4>Electrician</h4>
            </div>
            </a>
            <a href="plumber.php">
            <div class="catbox">
                <img src="../fcus/cusimg/plumber_icon.jpg" alt="plumber_icon">
                <h4>Plumber</h4>
            </div></a>
            <a href="carpenter.php">
            <div class="catbox">
                <img src="../fcus/cusimg/carpenter.png" alt="carpenter">
                <h4>Carpenter</h4>
            </div></a>
            <a href="cleaning.php">
            <div class="catbox">
                <img src="../fcus/cusimg/spa.png" alt="spa">
                <h4>Cleaning</h4>
            </div></a>
            <a href="salon.php">
            <div class="catbox">
                <img src="../fcus/cusimg/salon.png" alt="salon">
                <h4>Salon</h4>
            </div></a>
        </div>
        <div class="offerview">
                <div class="offerquote">
                    <h3>What We Offer</h3>
                    <h1>An Efforts to Make a Reliable House</h1>
                    <p>Let us bring expertise, reliability, and a touch of craftsmanship to your doorstep. Experience the difference with Quick Assist – Where Your Home Deserves the Best.</p>
                    <a href="service.php">Discover More</a>
                </div>
                <div class="offerbox offerbox1">
                    <h1>1.</h1>
                    <h3>Installation</h3>
                    <p>At Quick Assist, we take pride in delivering top-notch installation services tailored to meet the diverse needs of our valued customers.</p>
                </div>
                <div class="offerbox offerbox2">
                    <h1>2.</h1>
                    <h3>Repair</h3>
                    <p>At Quick Assist, we are your  partners in delivering reliable and professional repair services to ensure the longevity and optimal performance of your essential belongings.</p>
                </div>
                <div class="offerbox offerbox3">
                    <h1>3.</h1>
                    <h3>Replacement</h3>
                    <p>At Quick Assist, we specialize in offering comprehensive replacement services, ensuring that your essential items receive the attention and care they deserve.</p>
                </div>
        </div>
        <div class="fourbox">
                <div class="fbox">
                    <div class="fsubbox">
                        <img src="https://media.istockphoto.com/photos/professional-cleaner-vacuuming-a-carpet-picture-id1417833187?b=1&k=20&m=1417833187&s=170667a&w=0&h=imQbpIvLmz2RSH88v4LPwaVTfWaVTXxqtyxBEwUPFXc=" alt="Cleaning">
                    </div>
                    <div class="fboxtext fsubbox"">
                        <h1>Cleaning</h1>
                        <p>We understand the importance of flexibility in scheduling. Whether you prefer regular cleaning sessions, one-time deep cleans, or have specific timing preferences, we strive to accommodate your schedule to ensure convenience.</p>
                        <a href="cleaning.php">Book Now</a> 
                    </div>
                </div>
                <div class="fbox">
                    <div class="fboxtext fsubbox"">
                        <h1>Salon</h1>
                        <p>Indulge in the luxury of beauty at your doorstep. Our salon home service brings the glamour to you, where comfort meets style. Because pampering yourself should be as convenient as it is exquisite.</p>
                        <a href="salon.php">Book Now</a> 
                    </div>
                    <div class="fsubbox"">
                        <img src="../fcus/cusimg/salon.jpg" alt="Salon">
                    </div>
                </div>
                <div class="fbox ">
                    <div class="fsubbox"">
                        <img src="https://media.istockphoto.com/id/918319088/photo/plumber-at-work-in-a-bathroom-plumbing-repair-service-assemble-and-install-concept.webp?b=1&s=170667a&w=0&k=20&c=SRngvhgImyrf5uX9uImk1mWKq_SurUZfIPhRcIwnBOM=" alt="spa">
                    </div>
                    <div class="fboxtext fsubbox"">
                        <h1>Plumber</h1>
                        <p>our plumbing service offers unparalleled expertise and reliability. Whether it's a leaky faucet, a clogged drain, or a complete bathroom renovation, our team of skilled plumbers is equipped to handle any job with precision and efficiency.</p>
                        <a href="plumber.php">Book Now</a> 
                    </div>
                </div>
                <div class="fbox">
                    <div class="fboxtext fsubbox"">
                        <h1>Carpenter</h1>
                        <p>Crafting convenience in every corner of your home. Our carpenter home service brings skilled hands and precision right to your doorstep. From repairs to custom creations.</p>
                        <a href="carpenter.php">Book Now</a> 
                    </div>
                    <div class="fsubbox"">
                        <img src="../fcus/cusimg/carpenter.jpeg" alt="carpenter">
                    </div>
                </div>
            </div>
            <div class="servicelist">
                <h3>Frequent Services</h3>
                <div class="list">
                <?php 
                    $sql = "SELECT *FROM services WHERE ser_section = ' Mini services'";
                    $result = $conn->query($sql);
                    if($result->num_rows > 0)
                    {
                        while($row = $result->fetch_assoc())
                        {?>
                            <a href="<?php echo $row['ser_category'];?>.php">
                                <div class="box">
                                    <img src="../fcus/cusimg/<?php echo $row['ser_img'];?>" alt="<?php echo $row['ser_name'];?>">
                                    <h4><?php echo $row['ser_name'];?></h4>
                                </div>
                            </a>
                            <?php 
                        }
                    }?>
                </div>
        </div>
        <div class="block">
            <h1>Have something to do? Get it done today.</h1>
            <a href="service.php"><button>Book Now</button></a>
        </div>
    </main>
    <?php require 'ufooter.php'; ?>
</body>
</html>