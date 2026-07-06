<?php require'qaconn.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="customer.css">
        <script src="customer.js"></script>
        <script src="https://kit.fontawesome.com/61163db8e0.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="loginpagebox" id="cuslogin">
            <div class="databox">
                <div style="margin-top:-20px; margin-bottom: 30px;" onclick="adminlogin()">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <h2>Sign in</h2>
                <form method="post" action="check.php">
                    <div class="userinput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="cus_phno" placeholder="phone number" required>
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                        <a href="forgot_password.php">Forget password</a>
                    <input type="submit" name="cuslgn" id="lbtn" value="login">
                </form>
                <div onclick="worlogin()">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <h4>worker </h4>
                </div>
            </div>
            <div class="imgbox">
                <img src="../fcus/cusimg/cuslogin.jpg" alt="">
                <h5 onclick="cusregistration()">Create an account</h5>
            </div>
        </div>
<!----------------------------------------------------------customer registration----------------------------------------------------->
        <div class="loginpagebox" id="cusregistration">
            <div class="imgbox">
                <img src="../fcus/cusimg/cusregistration.jpg" alt="">
                <h5  onclick="cuslogin()">I am already member</h5>
            </div>
            <div class="databox">
                <h2>Sign up</h2>
                <form method="post" action="check.php">
                    <div class="userinput">
                        <i class="fa-solid fa-user-large"></i>
                        <input type="text" name="cus_name" placeholder="User Name">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="cus_email" placeholder="Your Email">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-square-phone"></i>
                        <input type="text" name="cus_phno" placeholder="Phone Number">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <input type="text" name="city" placeholder="City">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input  type="submit" name="cusreg" id="lbtn" value="Register">
                </form>
            </div>
        </div>
<!---------------------------------------------------------worker login box------------------------------------------------------------>
        <div class="loginpagebox" id="worlogin">
            <div class="imgbox" onclick="worregistration()">
                <img src="../fcus/cusimg/worlogin.jpg" alt="">
                <h5>Want To Join With Us</h5>
            </div>
            <div class="databox">
                <h2>Log in  </h2>
                <form method="post" action="check.php">
                    <div class="userinput">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="wor_phno" placeholder="phone number">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <a href="#" >Forget password</a>
                    <input type="submit" name="wlgn" id="lbtn" value="Log In">
                </form>
                <div onclick="cuslogin()">
                    <i class="fa-solid fa-users"></i>
                    <h4>Customer </h4>
                </div>
            </div>
        </div>
<!----------------------------------------------worker registration box------------------------------------------------------------------------->
        <div class="loginpagebox" id="worregistration">
            <div class="databox">
                <h2>Sign up</h2>
                <form method="post" action="check.php">
                    <div class="userinput">
                        <i class="fa-solid fa-user-large"></i>
                        <input type="text" name="wor_name" placeholder="Worker Name">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="wor_email" placeholder=" Email">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-square-phone"></i>
                        <input type="text" name="wor_phno" placeholder="Phone Number">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <input type="text" name="profession" placeholder="Profession">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" name="wreg" id="lbtn" value="Join" >
                </form>
            </div>
            <div class="imgbox">
                <img src="../fcus/cusimg/worregistration.jpg" alt="">
                <h5  onclick="worlogin()">I am already member</h5>
            </div>
        </div>
<!-------------------------------------------------------------admin login box--------------------------------------------------------------------->
        <div class="loginpagebox" id="adminlogin">
            <div class="imgbox">
                <img src="../fcus/cusimg/adminlogin.jpg" alt="">
                <i class="fa-solid fa-users" onclick="cuslogin()"></i>
            </div>
            <div class="databox">
                <h2>Welcome Admin </h2>
                <form method="post" action="check.php">
                    <div class="userinput">
                        <i class="fa-solid fa-user-large"></i>
                        <input type="text" name="ad_name" placeholder="Admin Name">
                    </div>
                    <div class="userinput">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="ad_pass" placeholder="Password">
                    </div>
                    <input type="submit" name="algn" id="lbtn" value="Log In">
                </form>
                <div onclick="worlogin()">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <h4>worker </h4>
                </div>
            </div>
        </div>
    </body>
</html>