
<?php
require_once('../includes/dbcon.php');
//checking  if id is set or not then executing the given commands

if(isset($_GET['id'])){

    $id=$_GET['id'];
    $sql=  "DELETE FROM saved_sale WHERE sale_id = $id;".
         "DELETE FROM sale_phone WHERE sale_id = $id;".
            "DELETE FROM sale_media WHERE sale_id = $id;".
            "DELETE FROM sale_complaints WHERE sale_id = $id;".
            "DELETE FROM sale WHERE sale_id = $id;";
            
    if($con->multi_query($sql)){
        echo "<script> alert ('Deleted Successfully')</script>";
        
    }
    else{
        echo "<script> alert ('Error: query was not Successful')</script>";
        echo sql;
    }
}
else{
    die('id is not provided correctly');
}

?>