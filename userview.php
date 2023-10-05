
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Details</title>
    <?php include_once('php/includes/common-css-js.php'); ?>
    
    
</head>
<body>
    <?php
        include("php/templates/header.php");
    ?>
    <div align="center">
<?Php
$id=$_GET['id'];
// Checking data it is a number or not
if(!is_numeric($id)){
echo "ID must be a integer";
exit;
}
// MySQL connection string
include 'php/includes/dbcon.php'; 

$path="SELECT*FROM users where user_id=?";

if($stmt = $con->prepare($path)){
  $stmt->bind_param('i',$id);
  $stmt->execute();

 $result = $stmt->get_result();
 $value=$result->fetch_object();

}else{
    echo $connection->error;
    }
 ?>
 

 <img  src="<?php echo $value->profile_photo ?>">

<h3>
  <p> Name :
    <?php  echo $value->first_name ?>
    <?php  echo " " ?>
    <?php  echo  $value->last_name ?>
  </p>
</h3>
<h3>
  <p> Email :
    <?php  echo $value->email?>
  </p>
</h3>
<h3>
  <p> About :
    <?php  echo $value->about?>
  </p>
</h3>


<?php
include 'php/includes/dbcon.php'; 

$path1=$con->query
("SELECT phone FROM users_phone where user_id=$id");
?>

<h3>
  <p> Contact Numbers:
<?php
while($row = $path1->fetch_object())  
       {
        echo "<br>";
        echo $row->phone;
       }
      ?>
      </h3>
      </p>
  </div>

    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>