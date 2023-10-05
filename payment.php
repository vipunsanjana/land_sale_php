<html>
    <head>
        <title>Payment</title>
        <link rel="stylesheet" href="styles/reqownForm.css">
        <?php 
        include ('php/includes/common-css-js.php'); 
        ?>
    </head>
    <body>
    <?php
     include ("php/templates/header.php");
    ?>
    <div class="form">    
    <div class="RequestForm" style="max-width: 350px;">    
        <div class="Title">Payment Details</div>
        <img src="images/icons/cards.png" alt="cards" width="100%"><br>
        <form method="POST" action="paymentP.php">
        <label>Card Number</label> <br>
        <input type="text" name="cardNo" pattern="[0-9]{10,14}" placeholder="Enter Valid Card Number" required>
        <label>Expiration Date</label> <br>
        <input type="text" name="expiryDate" pattern="[0-9]{2}+\\[0-9]{3}" placeholder="MM/YY" required>
        <label>CV Code</label> <br>
        <input type="password" name="cvCode" pattern="[0-9]{1,3}" placeholder="CVC" required>
        <label>Card Owner</label> <br>
        <input type="text" name="cardName" placeholder="Enter Card Owner Name" required><br>
        <input type="submit" name ="submit" class="formBtn" value="Confirm Payment">
        </form>
    </div>  
    </div>   
    <?php
    include ("php/templates/footer.php");
    ?>
    </body>

</html>
