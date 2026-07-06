<?php require'qaconn.php'; 
    session_start();
    if(isset($_POST['book']))
    {
        $_SESSION['ser_id']= $_POST['ser_id'];
        $ser_price = $_POST['ser_price'];
        $_SESSION['a_addre'] = $_POST['a_addre'];
        $_SESSION['a_city'] = $_POST['a_city'];
        $_SESSION['a_date'] = $_POST['a_date'];
        $price = $ser_price*40/100;
        $amount = $price /83;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="triggerBtnClick()">
<script> function triggerBtnClick()
                        {
                            document.getElementById("btn").click();
                        }
            </script>
            <form method = "post" action ="https://www.sandbox.paypal.com/cgi-bin/webscr" >
                <input type="hidden" name = "business" value="sb-ai2v329125215@business.example.com">
                <input type="hidden" name = "item_name" value ="home service">
                <input type="hidden" name = "amount" value ="<?php echo $amount;?>">
                <input type="hidden" name = "no_shipping" value ="1">
                <input type="hidden" name = "currency_code" value ="USD">
                <input type="hidden" name = "cmd" value ="_xclick">
                <input type="hidden" name = "return" value ="http://localhost/project/fcus/pay.php">
                <input type="hidden" name = "cancel_return" value ="http://localhost/project/fcus/home.php">
                <input type="submit" name = "book" id="btn" style = "visibility : hidden;">
            </form>
        <?php
    }
        ?>
</body>
</html>