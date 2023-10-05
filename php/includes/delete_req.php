<?php
require 'dbcon.php';
$request_id=$_GET['id'];
$sql="DELETE FROM request_phone WHERE request_id='$request_id';". "DELETE FROM saved_request WHERE request_id='$request_id';"."DELETE FROM request WHERE request_id='$request_id';";
if($con->multi_query($sql)){
    echo "Deleted successfully<br>";
    
}else{
    echo "Error: ".$con->error;
}


?>
