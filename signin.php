<?php

    include("php/controllers/signin-ctrl.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>
    <link rel="stylesheet" href="styles/signin.css">
    <link rel="stylesheet" href="styles/forms.css">    
    <?php include_once('php/includes/common-css-js.php'); ?>


</head>
<body>
    <?php include('php\templates\header.php'); ?>

   <form class="simple-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-field">
            <div for="email">E-mail</div>
            <input type="email" name="email" value="<?php echo $values['email'] ?>">
            <?php    if (!empty($errors['email'])) echo "<div class='error'>*".$errors['email']."</div><br>";    ?>
        </div>

        <div class="form-field">
            <div for="pwd">Password</div>
            <input type="password" name="password" value="<?php echo $values['password'] ?>">
            <?php    if (!empty($errors['password'])) echo "<div class='error'>*".$errors['password']."</div><br>";    ?>
        </div>

        <?php    if (!empty($errors['form'])) echo "<div class='form-field error'>*".$errors['form']."</div><br>";    ?>

        <?php    if (!empty($_GET['redirect'])) echo "<input type='hidden' name='redirect' value='".$_GET['redirect']."'>";    ?>

        <div class="form-field">
            <a href="register.php">Create an account</a>    
        </div>


        <div class="form-field">
        <input type="submit" name="submit" value="Submit">
        </div>

   </form> 
   <?php include('php\templates\footer.php'); ?>

</body>
</html>