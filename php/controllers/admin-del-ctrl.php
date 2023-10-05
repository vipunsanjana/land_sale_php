
<?php

require '../includes/dbcon.php';

echo "Index of the Deleted recode is >>>> ";

$userId=$_GET["user_id"];

echo $userId;

    // deletes from whole data base
     $sql = "delete from saved_request where request_id in (select request_id from request where user_id = $userId) or user_id = $userId;".
            "delete from saved_sale where sale_id in (select sale_id from sale where user_id = $userId) or user_id = $userId;".
            "delete from request_complaints where request_id in (select request_id from request where user_id = $userId) or user_id = $userId;".
            "delete from sale_complaints where sale_id in (select sale_id from sale where user_id = $userId) or user_id = $userId;".
            "delete from request_phone where request_id in (select request_id from request where user_id = $userId);".
            "delete from sale_phone where sale_id in (select sale_id from sale where user_id = $userId);".
            "delete from sale_media where sale_id in (select sale_id from sale where user_id = $userId);".
            "delete from sale where user_id = $userId;".
            "delete from request where user_id = $userId;".
            "delete from users_phone where user_id = $userId;".
            "delete from users_warnings where user_id = $userId;".
            "delete from users where user_id = $userId;";


        $resul=$con->multi_query($sql);
        
if (!empty($referer)) {
    
        echo '<script type="text/javascript">alert("Recode was not deleted!!!");</script>';
		echo '<p><a href="javascript:history.go(-1)" title="Return to the previous page">« Go back</a></p>';
		
	} else {

        if (isset($_SERVER["HTTP_REFERER"])){
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
        
	}

$con->close();

?>
