
<?php
require_once('../includes/dbcon.php');

//id must be valid and not null 
if(isset($_GET['id']) ){

    $id=$_GET['id'];
    $stitle =$_POST['stitle'];
    $sloc =$_POST["slocation"];
    $sdesc =$_POST["sdescript"];
    $scity =$_POST["scity"];
    $sdist =$_POST["sdistrict"];
    $sprovince =$_POST["sprovince"];
    $sprice =$_POST["sprice"];
    $sarea =$_POST["slandarea"];
    $saddress =$_POST["saddress"];
    $sphoto =$_POST["sphoto"];

    $sql= "UPDATE `sale` SET `title`='$stitle',`location`='$sloc',`description`='$sdesc',
    `city`='$scity',`district`='$sdist',`province`='$sprovince',`price`='$sprice',`land_area`='$sarea',
    `address`='$saddress',`cover_photo`='$sphoto' WHERE sale_id=$id";

if($con->query($sql)==TRUE  ){
    echo "<script> alert ('Updated Successfully')</script>";
    
}
else{
    echo "<script> alert ('Error: query was not Successful')</script>";
    echo sql;
}

}else{
    echo"invald";
}

?>