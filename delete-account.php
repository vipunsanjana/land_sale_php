<?php
    session_start();
    require_once('php\includes\signinFunctions.php');
    accessLevel('user');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {   
        require_once('php\includes\dbFunctions.php');
        if(deleteUser($_SESSION['user_id']))
        {
            header('location: signout.php');
            die();
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sale Post</title>
    <link rel="stylesheet" href="styles/delete-account.css">
    <?php include_once('php/includes/common-css-js.php'); ?>

</head>
<body>
    <?php
        include("php/templates/header.php");
    ?>
    <form action="delete-account.php" method="post" class="delete-form">
        <h1>Delete your account?</h1>
        <div class="btns">
            <input type="button" value="Decline" onclick="location.href = 'index.php'">
            <input type="submit" value="Accept">
        </div>

    </form>

    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>

