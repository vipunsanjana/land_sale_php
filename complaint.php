
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css" >
    <?php include_once('php/includes/common-css-js.php'); ?>
    <link rel="stylesheet" href="styles/admintable.css"/>
    <title>Complaints</title>
</head>
<body>

    <?php

        include("php/templates/header.php");

include_once 'php\includes\dbcon.php';

//Request table
$sql1="SELECT complaint_id,description,reviewed,complaint_type,request_id,user_id,create_date FROM request_complaints ";

$result2=$con->query($sql1);

//Shows the Request table details
if ($result2->num_rows > 0) {

    echo("<h1 style='text-align:center;'>Request Complaints</h1>");
    
    echo("<table class='table1'>");

    echo("<th>Complaint ID</th>");
    echo("<th>Complaint Type</th>");
    echo("<th>Request ID</th>");
    echo("<th>User ID</th>");
    echo("<th>Description</th>");
    echo("<th>Reviewed</th>");
    echo("<th>Action</th>");
    echo("<th>Complaint</th>");

    while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["complaint_id"]."</td>";
        echo "<td>".$row["complaint_type"]."</td>";
        echo "<td>".$row["request_id"]."</td>";
        echo "<td>".$row["user_id"]."</td>";
        echo "<td>".$row["description"]."</td>";
    
        if($row["reviewed"]==1){
            echo "<td>Yes</th>";
        }else{
            echo "<td>No</th>";
        }

        ?>
        <td class="delete"><a style="text-decoration: none;" href="php\controllers\request-complaints-ctrl.php?complaint_id=<?php echo $row["complaint_id"]; ?>">Delete</a></td>
        <td class="viewws"><a style="text-decoration: none;" href="review-complaint.php?id=<?php echo $row["complaint_id"]; ?>&type=request">View</a></td>
      <?php

        echo "</tr>";
    }
    echo ("</table>");

    }else{
        echo ('<h1 class="warnings">The Request complaint table is empty</h1>');
    }

echo "<hr>";

/////////////////////////////////////////////////////////////////////////////
include_once 'php\includes\dbcon.php';

//Sale table
$sql1="SELECT complaint_id,description,reviewed,complaint_type,sale_id,user_id,create_date FROM sale_complaints ";

$result2=$con->query($sql1);

//Shows the Sale table details
if ($result2->num_rows > 0) {

    echo("<h1 style='text-align:center;'>Sale Complaints</h1>");
    
    echo("<table class='table1'>");

    echo("<th>Complaint ID</th>");
    echo("<th>Complaint Type</th>");
    echo("<th>Sale ID</th>");
    echo("<th>User ID</th>");
    echo("<th>Description</th>");
    echo("<th>Reviewed</th>");
    echo("<th>Action</th>");
    echo("<th>Complaint</th>");

    while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["complaint_id"]."</td>";
        echo "<td>".$row["complaint_type"]."</td>";
        echo "<td>".$row["sale_id"]."</td>";
        echo "<td>".$row["user_id"]."</td>";
        echo "<td>".$row["description"]."</td>";

        if($row["reviewed"]==1){
            echo "<td>Yes</th>";
        }else{
            echo "<td>No</th>";
        }

      ?>
        <td class="delete"><a style="text-decoration: none;" href="php\controllers\sale-complaint-ctrl.php?complaint_id=<?php echo $row["complaint_id"]; ?>">Delete</a></td>
        <td class="viewws"><a style="text-decoration: none;" href="review-complaint.php?id=<?php echo $row["complaint_id"]; ?>&type=sale">View</a></td>
      <?php

       echo "</tr>";
    }
    echo ("</table>");

    }else{
        echo ('<h1 class="warnings">The Sale complaint table is empty</h1>');
    }

    $con->close();

    include("php/templates/footer.php");
    ?>

</body>
</html>