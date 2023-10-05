
<?php
//checking  if id is set or not
if(!isset($_GET['id'])){

    die('id is not provided');
}

require_once ('php/includes/dbcon.php'); 
$id = $_GET['id'];//querry parameters
$sql="SELECT*FROM sale WHERE sale_id=$id";
$result =$con->query($sql);
//checking if the given id is valid 
if($result->num_rows !=1){
    die('provided id is not valid');
}
$values=$result->fetch_assoc();//fetches result row as an associative array

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Sale</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('php/includes/common-css-js.php'); ?>
    
</head>
<body>
<link rel="stylesheet" href="styles/sale-req.css">
    <?php
        include("php/templates/header.php");
    ?>

<h3>Edit Sale </h3>
  <div  text-align="center">
   <form  method="post" action="php/controllers/edit-sale-ctrl.php?id=<?= $id?>"><!--clicking submit executes edit-sale-ctrl.php-->

   <div class="saleForm">
       <!--//Form to input details-->
       <fieldset>

           <p>Title: 
               <input type="text" id="stitle"  name="stitle" required value="<?=$values['title']?>" >
           </p>
           <p>Location: 
               <input type="text" id="slocation" name="slocation" required value="<?=$values['location']?>" >
            </p>
           <p>Description : 
               <br><textarea type="text" name="sdescript" id="sdescript" rows="7" cols="50" required > <?=$values['description']?></textarea>
            </p>
           <p>City : 
               <input type="text" id="scity"  name="scity"required value="<?=$values['city']?>">
            </p>
           <p>District : 
               <input type="text" id="sdistrict"  name="sdistrict" required value="<?=$values['district']?>">
            </p>
           <p>Province : 
               <input type="text" id="sprovince"  name="sprovince"required value="<?=$values['province']?>" >
            </p>
           <p>Price : 
               <input type="text" id="sprice"  name="sprice" required value="<?=$values['price']?>"> Rs.
            </p>
           <p>Landa Area : 
               <input type="text" id="slandarea"  name="slandarea"required value="<?=$values['land_area']?>" > Perch
             </p>
           <p>Address:
               <input type="text" id=" saddress" name="saddress" required value="<?=$values['address']?>">
            </p>
           <p>Upload photo : <input type="file" name="sphoto" id="sphoto" >

       </fieldset>
</div>
       <br>
       <input type="submit" value="Update"  name="submit" >
       <button>
            <a  href="php/controllers/delete-sale-ctrl.php?id=<?= $id?>">Delete</a>
        </button>
       
   </form>
</div> 
<br><br>
    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>