
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('php/includes/common-css-js.php'); ?>
    <link rel="stylesheet" href="styles/admintable.css"/>
    <title>Document</title>
</head>
<body>

  <?php
        include("php/templates/header.php");
        ?> 

    <h1 style='text-align:center;'>Update user details</details></h1>

    <div class="hcenter">
        <div class="texxst"> 
        <form method="POST" action="php\controllers\admin-ctrl.php">
            <label class="admin">User ID :</label>
            <input class="admins" type="text" name="user_id" ><br><br>
            <label class="admin">Firest Name :</label>
            <input class="admins" type="text" name="first_name" ><br><br>
            <label class="admin">Last Name :</label>
            <input class="admins" type="text" name="last_name" ><br><br>
            <label class="admin">E-mail :</label>
            <input class="admins" type="text" name="email" ><br><br>
            <label class="admin">Account Status:</label>
            <select name="status1">
                <option value="valid">Valid</option>
                <option value="suspend">Suspended</option>
                <option value="banned">Banned</option>
            </select><br><br>
            <label>Account Type:</label>
            <select name="status2">
                <option value="user">User</option>
                <option value="mod">Mod</option>
                <option value="admin">Admin</option>
            </select><br><br>
            <label class="admin">About:</label>
            <input class="admins" type="text" name="about"><br><br>
            <input type="submit" name="Update" value="Update">
        </form>
        </div>
    </div>


<?php

include_once 'php\includes\dbcon.php';

$sql1="SELECT user_id,first_name,last_name,email,account_status,account_type,about FROM users";

$result2=$con->query($sql1);

//Shows the Request table details
if ($result2->num_rows > 0) {

    echo("<h1 style='text-align:center;'>All Users</h1>");
    
    echo("<table border='5' class='table1'>");

    echo("<th>User ID</th>");
    echo("<th>First Name</th>");
    echo("<th>Last Name</th>");
    echo("<th>E-mail</th>");
    echo("<th>Account Status</th>");
    echo("<th>Account Type</th>");
    echo("<th>About</th>");
    echo("<th>Remove</th>");
    echo("<th>Profile</th>");

    while($row = $result2->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["user_id"]."</td>";
        echo "<td>".$row["first_name"]."</td>";
        echo "<td>".$row["last_name"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["account_status"]."</td>";
        echo "<td>".$row["account_type"]."</td>";
        echo "<td>".$row["about"]."</td>";
        ?>
        <td class="delete"><a style="text-decoration: none;" href="php\controllers\admin-del-ctrl.php?user_id=<?php echo $row["user_id"]; ?>">Delete</a></td>
        <style>
            .viewws{
            background-color:rgba(14, 140, 243, 0.737) ;
        }
        .viewws:hover{
            background-color:rgba(41, 240, 140, 0.7) ;
        }
        </style>
        <td class="viewws"><a style="text-decoration: none;" href="userview.php?id=<?php echo $row["user_id"]; ?>">View</a></td>
        <?php
        echo "</tr>";
    }
    echo ("</table>");

    }else{
        echo ('<h1 class="warnings">The Users table is empty</h1>');
    }

$con->close();

        include("php/templates/footer.php");
    ?>
    </div>
</body>
</html>