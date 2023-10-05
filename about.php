
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <?php include_once('php/includes/common-css-js.php'); ?>
    
</head>
<body>
    <?php
        include("php/templates/header.php");
    ?>

    <div class="mainpage">
        <h2>About Us</h2>
        <p>Our approach gives our users a better
experience when they intend to find or sell
their land without having another
third party person or company.</p>
    </div>

    <div class="mainpage">
        <h2>Contact Us</h2>
        <p>
        <span>E-mail : ABClands@gmil.com</span><br>
        <span>Phone (Admin): 077-8780559</span><br>
        <span>Phone (Moderator): 078-2828934</span><br>
        <span>Social media (Whatsapp or Telegram): 077-8780559</span>
    </P>
    </div>

    <div class="mainpage">
        <h2>Terms and Conditions</h2>
        <p>Illegal activities are prohibited and if someone have commited those will be penalized under the civil law.</p>
    </div>

    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>