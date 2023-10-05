

<?php session_start(); ?>
<?php 
    //connecting to the DB
    require 'php/includes/dbcon.php';
    require 'php/includes/signinFunctions.php';


    if(isset($_POST['fname']))
    {
                $fName = $_POST['fname'];
                $lName = $_POST["lname"];
                $email = $_POST["email"];
                $pass = $_POST["pass"];
                $photo = $_POST["pPhoto"];
                $about = $_POST["about"];
            
                $query="INSERT INTO users(user_id, password, first_name, last_name, email, account_status, account_type, 
                profile_photo, about) VALUES ('', '$pass', '$fName', '$lName', '$email', 'valid', 'user', '$photo', '$about')";
                
                if($con->query($query))
                {
                    $sessionID = $con->insert_id;
                    signin($sessionID);
                    echo "<script> alert ('Data added Successfully')</script>";
                    if (isset($_SERVER["HTTP_REFERER"])){
                        header("Location:../landsale/index.php");
                    }
                }
                else
                {
                    echo "<script> alert ('Error: query was not Successful')</script>";
                }

    }
                
?>

<!DOCTYPE html>
<html>
	<head>
    <?php include_once('php/includes/common-css-js.php'); ?>
    <link rel="stylesheet" href="styles/register.css">
	</head>
	
	<body>
		<!-- adding a header (c)-->
        <?php
            include("php/templates/header.php"); //connecting to the db
        ?>
		<hr>

        <!--getting user details through input boxes-->
            <div class="icontainer">
            <center><h1 id="cheader">REGISTRATION FORM</h1></center>
            <form onsubmit="return checkPassword()" method="post" class="regform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <label for="fname" class="label">First Name<br></label>
				<input type="text" id="fname" name="fname" class="inputBox" placeholder="First Name" required><br><br>
				
				<label for="lName" class="label">Last Name<br></label>
				<input type="text" id="lName" name="lname" class="inputBox" placeholder="Last Name" required><br><br>

                <label for="email" class="label">Email<br></label>
				<input type="text" id="email" name="email" class="inputBox" placeholder="abc@xyz.com" pattern="[a-z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}" required><br><br>
				
                <label for="about" class="label">About<br></label>
				<textarea id="about" rows="4" cols="25" name="about" class="inputBox" placeholder="Add a small description about yourself"></textarea><br><br>

                <label for="photo" class="label">Upload a profile picture</label>
                <input type="file" name="pPhoto" class="inputBox" id="photo" ><br><br>

                <label for="pass" class="label">Password</label>
                <input type="password" name="pass" id="pass" class="inputBox" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}" required
                title="Password should be leaset 8 characters long and include at least
                One lowercase letter, One Uppercase letter and One number" ><br>

                <label for="repass" class="label">Re-Enter Password</label>
                <input type="password" name="pass" class="inputBox" id="repass"><br>

                <label for="ToS" class="label">Accept Privacy Policy and Terms & Conditions</label>
                <input type="checkbox" class="tos" class="inputBox" value=" name="tos" onclick="enableButton()"><br><br>

                <center>

                    <!--submit boxes-->
                    <input type="submit" value="SUBMIT" id="submitbtn">
                    <label for="action" id=saction">Already have an account?</label>
                    <a href="signin.php" id="signin">Sign in</a></label>
                </center>
            </form>
            </div>
		<hr>
        <?php include("php/templates/footer.php"); ?>   <!--linking the footer-->

	</body>
</html>
