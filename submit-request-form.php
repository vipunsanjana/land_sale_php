<?php 
    session_start(); 
    require_once('php\includes\signinFunctions.php');
    accessLevel('user');
?>
<html>
    <head>
        <title>Submit Request</title>
        <link rel="stylesheet" href="styles/reqownForm.css">
        <?php include_once('php/includes/common-css-js.php'); ?>

    </head>
    <body >
    <?php
        include("php/templates/header.php");
    ?>
    <div class="form">
    <div class="RequestForm">    
        <div class="Title">Submit Request Form</div>
        <form method="POST" action="submit-request.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_SESSION['user_id'];?>">
        <label>Title</label> <br>
        <input type="text" name="title" placeholder="Enter the title" required><br><br> 
        <label>Cover Photo : </label>
        <input type="file" name="coverphoto" accept="image/png, image/jpeg , image/jpg"><br><br> 
        <label>Location</label> <br>
        <input type="text" name="location" placeholder="Enter the location co-ordinates" required><br><br> 
        <label>Description</label> <br>
        <textarea name="description" rows="10" cols="50" placeholder="Enter the description" required></textarea><br><br> 
        <label>City</label> <br>
        <input type="text" name="city" placeholder="Enter the city" required><br><br> 
        <label>District</label> <br>
        <select name="district">
            <option value="Anuradhapura">Anuradhapura</option>
            <option value="Colombo">Colombo</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Kaluthara">Kaluthara</option>
            <option value="Kandy">Kandy</option>
            <option value="Mathale">Mathale</option>
            <option value="Nuwara-Eliya">Nuwara-Eliya</option>
            <option value="Kegalla">Kegalla</option>
            <option value="Rathnapura">Rathnapura</option>
            <option value="Badulla">Badulla</option>
            <option value="Monaragala">Monaragala</option>
            <option value="Galle">Galle</option>
            <option value="Matara">Matara</option>
            <option value="Hambanthota">Hambanthota</option>
            <option value="Trincomalee">Trincomalee</option>
            <option value="Batticaloa">Batticaloa</option>
            <option value="Ampara">Ampara</option>
            <option value="Puttalam">Puttalam</option>
            <option value="Kurunegala">Kurunegala</option>
            <option value="Jaffna">Jaffna</option>
            <option value="Killinochchi">Killinochchi</option>
            <option value="Mannar">Mannar</option>
            <option value="Mullaitivu">Mullaitivu</option>
            <option value="Polonnaruwa">Polonnaruwa</option>                    
            <option value="Vavuniya">Vavuniya</option>
        </select><br><br>
        <label>Province</label> <br>
        <select name="province">
            <option value="Western">Western Province</option>
            <option value="North-Western">North-Western</option>
            <option value="Nothern">Northern Province</option>
            <option value="North-Central">North-Central Province</option>
            <option value="Central">Central Province</option>
            <option value="Sabaragamuwa">Sabaragamuwa Province</option>
            <option value="Eastern">Eastern Province</option>
            <option value="Uva">Uva Province</option>
            <option value="Southern">Southern Province</option>
        </select> <br><br>
        <label>Maximum Price</label> <br>
        <input type="text" name="max_price" pattern="[0-9]{1,10}" placeholder="Enter the Maximum Price" required><br><br> 
        <label>Minimum Price</label> <br>
        <input type="text" name="min_price" pattern="[0-9]{1,10}" placeholder="Enter the Minimum Price" required><br><br> 
        <label>Maximum Area</label> <br>
        <input type="text" name="max_area" pattern="[0-9]{1,10}" placeholder="Enter the Maximum Area (in perch)" required><br><br> 
        <label>Minimum Area</label> <br>
        <input type="text" name="min_area" pattern="[0-9]{1,10}" placeholder="Enter the Minimum Area (in perch)" required><br><br> 
        <label>Distance</label> <br>
        <input type="text" name="distance" pattern="[0-9]{1,10}" placeholder="Enter the Distance (in meter)" required><br><br> 
        <label>Post Type</label><br>
        <label>Basic<input type="radio" name="postType" value="1" checked></label>
        <label>Budget<input type="radio" name="postType" value="2"></label> 
        <label>Premium<input type="radio" name="postType" value="3"></label>
        <br><br>
        <input type="reset" name ="reset" class="formBtn" value="Reset">
        <input type="submit" name ="submit" class="formBtn" value="Submit">
        <br>
        <ul style="color:red;">
          <li>Basic plan is the Free and Standard Package</li><br>
          <li>Budget plan is the Budget Package which is quite similar to the Basic Plan but with some additional functionalities with a Price of Rs.300.00</li><br>
          <li>Premium plan is the Premium Version to make your post featured in the home page with a Price of Rs.1000.00</li>
        </ul>
    </div>    

           
    </form>
    </div>
    

    <?php
        include("php/templates/footer.php");
    ?>
    </body>
</html>
