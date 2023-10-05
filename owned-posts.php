
<?php session_start(); ?>
<html>
<head>
    <title>Owned-Posts</title>
    <link rel="stylesheet" href="styles/reqownForm.css">
    <?php include_once('php/includes/common-css-js.php'); ?>
</head>
<body style="background:linear-gradient(135deg, #71b7e6, #9b59b6);">
<?php
        include("php/templates/header.php");
?>

<?php
require 'php/includes/dbcon.php';
echo "<h2 class=\"ownTitle\">My Request Posts</h2>";
$userId=$_GET['id'];
$sql="SELECT * FROM request where user_id='$userId'";
$result=$con->query($sql);

if($result=$con->query($sql)){
    if($result->num_rows>0){
        //read form-data
        while($row=$result->fetch_assoc()){
            //read and utilize form-data
             $img=$row['cover_photo'];
             if($row['max_price']==-1)
             {
                 $row['max_price']="Not Negotiable";
             }
             if($row['max_price']==NULL)
             {
                 $row['max_price']="Negotiable";
             }
             $id=$row['request_id'];
             echo "<div id=\"ownedCard\">";
             echo "<img src=\"$img\" alt=\"Picture of a land\" height=\"150\" width=\"150\" id=\"ownedImg\">";
             echo "<h2>".$row['title']."</h2>";
             echo "<p>".$row['description']."</p>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<button class=\"ownBtn\">"."<a href=\"request.php?id=$id\">"."View"."</a>"."</button>";  
             echo "<button class=\"ownBtn\">"."<a href=\"edit-request-form.php?id=$id\">"."Edit"."</a>"."</button>";    
             echo "<button class=\"ownBtn\">"."<a href=\"php/includes/delete_req.php?id=$id\">"."Delete"."</a>"."</button>";
             echo "<span id=\"ownedPrice\">". $row['max_price'] . "</span>";
             echo "</div>";
        }
    } else {
        echo "<b style='padding: 100px;'>No results</b>";
    }
}

echo "<h2 class=\"ownTitle\">My Sale Posts</h2>";
$sql="SELECT * FROM sale where user_id=$userId";
$result=$con->query($sql);

if($result=$con->query($sql)){
    if($result->num_rows>0){
        //read form-data
        while($row=$result->fetch_assoc()){
            //read and utilize form-data
             $img=$row['cover_photo'];
             if($row['price']==-1)
             {
                 $row['price']="Not Negotiable";
             }
             if($row['price']==NULL)
             {
                 $row['price']="Negotiable";
             }
             $id=$row['sale_id'];
             echo "<div id=\"ownedCard\">";
             echo "<img src=\"$img\" alt=\"Picture of a land\" height=\"150\" width=\"150\" id=\"ownedImg\">";
             echo "<h2>".$row['title']."</h2>";
             echo "<p>".$row['description']."</p>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<br>";
             echo "<button class=\"ownBtn\">"."<a href=\"sale.php?id=$id\">"."View"."</a>"."</button>";  
             echo "<button class=\"ownBtn\">"."<a href=\"edit-sale.php?id=$id\">"."Edit"."</a>"."</button>";    
             echo "<button class=\"ownBtn\">"."<a href=\"php/includes/delete_sale.php?id=$id\">"."Delete"."</a>"."</button>";
             echo "<span id=\"ownedPrice\">". $row['price'] . "</span>";
             echo "</div>";
        }
    } else {
        echo "<b style='padding: 100px;'>No results</b>";
    }
}

?>
<div style="padding: 50px;">

</div>
<?php
    include("php/templates/footer.php");
?>
</body>
</html>
