<?php session_start(); ?>
<?php
require 'php/includes/dbcon.php';
$target_dir = "images/request/";
$target_file = $target_dir . basename($_FILES["coverphoto"]["name"]);
if (isset($_FILES["coverphoto"])){
    if (move_uploaded_file($_FILES["coverphoto"]["tmp_name"], $target_file)){
       // echo "The file ".basename($_FILES["coverphoto"]["name"])." is uploaded";
    }
    else {
        echo "Error while uploading your file.";
    }
}
else {
    echo "File not available";
}

$title=$_POST["title"];
$location=$_POST["location"];
$description=$_POST["description"];
$city=$_POST["city"];
$district=$_POST["district"];
$province=$_POST["province"];
$max_price=$_POST["max_price"];
$min_price=$_POST["min_price"];
$max_area=$_POST["max_area"];
$min_area=$_POST["min_area"];
$distance=$_POST["distance"];
$type_id=$_POST["postType"];
$user_id=$_SESSION['user_id'];

$sql="INSERT INTO request(title,location,description,city,district,province,max_price,min_price,max_area,min_area,distance,cover_photo,type_id,user_id) VALUES('$title','$location','$description','$city','$district','$province','$max_price','$min_price','$max_area','$min_area','$distance','$target_file','$type_id','$user_id')";
if($con->query($sql))
{
    echo "<script>alert('Form Submitted Successfully');</script>";
    if($type_id==2)
    {
        header("Location:payment.php");
    }
    else if($type_id==3)
    {
        header("Location:payment.php");
    }
    else{
        header("Location:index.php");
    }
}
else 
{
    echo "Error: ".$con->error;
}

?>
