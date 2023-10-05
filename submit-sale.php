
<?php 
    session_start(); 
    require_once('php\includes\signinFunctions.php');
    accessLevel('user');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submit sale</title>
    <?php include_once('php/includes/common-css-js.php'); ?>
    <link rel="stylesheet" href="styles/sale-request.css">
    <link rel="stylesheet" href="styles/sale-req.css">
    
</head>
<body>
    <?php
        include("php/templates/header.php");
    ?>

<h1>Sell Your Land</h1>
   <div  text-align="center">
   <form  method="post" action="saleform.php" enctype="multipart/form-data"> <!--clicking submit executes saleform.php-->
   
   <div class="saleForm">
       <!--//Form to input details-->
       <fieldset>
       <input type="hidden" name="sid" value="<?php echo $_SESSION['user_id'];?>">
           <p>Title: <br>
               <input type="text" id="stitle"  name="stitle" placeholder="Enter the title" required >
           </p>
           <p>Location: <br>
               <input type="text" id="slocation" name="slocation" placeholder="Enter Geo Cordinates " required >
            </p>
           <p>Description : <br>
               <textarea type="text" name="sdescript" id="sdescript" rows="7" cols="50"required></textarea>
            </p>
           <p>City : <br>
               <input type="text" id="scity"  name="scity" required>
            </p>
           <p>District : <br>
               <input type="text" id="sdistrict"  name="sdistrict" required>
            </p>
           <p>Province : <br>
               <input type="text" id="sprovince"  name="sprovince"required >
            </p>
           <p>Price : <br>
               <input type="text" id="sprice"  name="sprice"  pattern="[0-9]{1,10}" required> Rs.
            </p>
           <p>Landa Area : <br>
               <input type="text" id="slandarea"  name="slandarea"  pattern="[0-9]{1,10}" required > Perch
             </p>
           <p>Address:<br>
               <input type="text" id=" saddress" name="saddress" placeholder="Land address" required>
            </p>
           <p>Upload photo : <input type="file" name="sphoto" id="sphoto accept="image/PNG, image/JPEG, image/JPG, image/GIF" >
           <br><br>
           <label>Post Type</label><br>
        <label>Basic<input type="radio" name="spostType" value="1" checked></label>
        <label>Budget<input type="radio" name="spostType" value="2"></label> 
        <label>Premium<input type="radio" name="spostType" value="3"></label>

<br>
        <ul>
          <li>Basic plan is the Free and Standard Package, with a validity period of 30 days with a Price of Rs.0.00</li><br>
          <li>Budget plan is the Budget Package which is quite similar to the Basic Plan but with a validity period of 60 days  with a Price of Rs.300.00</li><br>
          <li>Premium plan is the Premium Version to make you post featured in the home page with a validity period of 90 days with a Price of Rs.1000.00</li>
        </ul>

       </fieldset>
       <br>
            <input type="submit" value="Submit"  name="submit" >
     </div>
  </form>
</div>
<br><br>

    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>
