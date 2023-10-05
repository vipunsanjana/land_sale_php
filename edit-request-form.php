<?php
        require 'php/includes/dbcon.php';
        $id=$_GET['id'];
        $sql="SELECT * FROM request where request_id='$id'";
        $result=$con->query($sql);
        if($result=$con->query($sql)){
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                    $title= $row['title'];
                    $location= $row['location'];
                    $coverphoto= $row['cover_photo'];
                    $description= $row['description'];
                    $city= $row['city'];
                    $district= $row['district'];
                    $province= $row['province'];
                    $max_price= $row['max_price'];
                    $min_price= $row['min_price'];
                    $max_area= $row['max_area'];
                    $min_area= $row['min_area'];
                    $distance= $row['distance'];
                }
            }
        }
?>
<html>
<head>
    <title>Edit Request</title>
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
    <div class="RequestForm">    
        <div class="Title">Edit Request Form</div>
        <form method="POST" action="edit-req.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <label>Title</label> <br>
        <input type="text" name="title" placeholder="Enter the new title" value="<?php echo "$title"; ?>"required><br><br> 
        <label>Cover Photo : </label>
        <input type="file" name="coverphoto" accept="image/png, image/jpeg , image/jpg" value="<?php echo "$coverphoto"; ?>"><br><br> 
        <label>Location</label> <br>
        <input type="text" name="location" placeholder="<?php echo "$location"; ?>" value="<?php echo "$location"; ?>" required><br><br> 
        <label>Description</label> <br>
        <textarea name="description" rows="10" cols="50" placeholder="<?php echo "$description"; ?>" value="<?php echo "$description"; ?>" required></textarea><br><br> 
        <label>City</label> <br>
        <input type="text" name="city" placeholder="Enter the new city" value="<?php echo "$city";?>" required><br><br> 
        <label>District</label> <br>
        <select name="district" value="<?php echo "$district"; ?>">
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
        <select name="province" value="<?php echo "$province"; ?>">
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
        <input type="text" name="max_price" pattern="[0-9]{1,10}" placeholder="Enter the new Maximum Price" value="<?php echo "$max_price"; ?>" required><br><br> 
        <label>Minimum Price</label> <br>
        <input type="text" name="min_price" pattern="[0-9]{1,10}" placeholder="Enter the new Minimum Price" value="<?php echo "$min_price"; ?>" required><br><br> 
        <label>Maximum Area</label> <br>
        <input type="text" name="max_area" pattern="[0-9]{1,10}" placeholder="Enter the new Maximum Area (in perch)" value="<?php echo "$max_area"; ?>" required><br><br> 
        <label>Minimum Area</label> <br>
        <input type="text" name="min_area" pattern="[0-9]{1,10}" placeholder="Enter the new Minimum Area (in perch)" value="<?php echo "$min_area"; ?>" required><br><br> 
        <label>Distance</label> <br>
        <input type="text" name="distance" pattern="[0-9]{1,10}" placeholder="<?php echo "$distance"; ?>"  value="<?php echo "$distance"; ?>" required><br><br> 
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
</div>       
    </form>
<?php
    include ("php/templates/footer.php");
?>

    </body>

</html>

