
<?php

include_once '../includes/dbcon.php';

if(isset($_POST["Update"])){

$user_id=$_POST['user_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$account_status=$_POST['status1'];
$account_type=$_POST['status2'];
$about=$_POST['about'];

$sql2="UPDATE users SET first_name='$first_name',last_name='$last_name',email='$email', account_status='$account_status', account_status='$account_status', account_type='$account_type', about='$about' WHERE user_id=$user_id "; 

$result2=$con->query($sql2);

if($result2){

  if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

}else {
    echo "failed!!!!!!!!!".$con->error;
}
}

$con->close();

?>
