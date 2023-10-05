

<?php 
session_start(); ?>
<?php
require 'php/includes/dbcon.php';//connecting to the database


$target_dir = "images/sale/";
$target_file = $target_dir . basename($_FILES["sphoto"]["name"]);
if (isset($_FILES["sphoto"])){
    if (move_uploaded_file($_FILES["sphoto"]["tmp_name"], $target_file)){
    }
    else {
        echo "Error while uploading your file.";
    }
}
else {
    echo "File not available";
}
//getting the values typed in the form to variables 
$stitle =$_POST["stitle"];
$sloc =$_POST["slocation"];
$sdesc =$_POST["sdescript"];
$scity =$_POST["scity"];
$sdist =$_POST["sdistrict"];
$sprovince =$_POST["sprovince"];
$sprice =$_POST["sprice"];
$sarea =$_POST["slandarea"];
$saddress =$_POST["saddress"];
$fk1=$_POST["spostType"];
$fk2=$_SESSION["user_id"];
//inserting data into table in order of columns 
$sql = "INSERT INTO sale (title,location,description,city,district,province,price,land_area,address,cover_photo,type_id,user_id)   VALUES ('$stitle' ,'$sloc' ,'$sdesc' ,'$scity' ,'$sdist','$sprovince','$sprice','$sarea','$saddress' ,'$target_file','$fk1','$fk2')";
//checking if query excuted or not
if($con->query($sql))
{
    echo "<script>alert('Form Submitted Successfully');</script>";
    
    if($fk1==2)
    {
        header("Location:payment.php");
    }
    else if($fk1==3)
    {
        header("Location:payment.php");
    }
    else{
        header("Location:index.php");
        echo "<script>alert('Form Submitted Successfully');</script>";
    }
}
else 
{
    echo "Error: ".$con->error;
}
?>
