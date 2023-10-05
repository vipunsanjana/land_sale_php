<?php

    session_start();
    require_once('php\includes\signinFunctions.php');
    accessLevel('user');
    require_once('php\controllers\account-ctrl.php');
?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Account Settings</title>
    <link rel="stylesheet" href="styles/page-container.css">
    <link rel="stylesheet" href="styles/account.css">
    <link rel="stylesheet" href="styles/forms.css">
    <?php include_once('php/includes/common-css-js.php'); ?>

    <script>
        let originalImage = "<?php echo $values['profile_photo']  ?>";
    </script>
    <script src="js/account.js"></script>

</head>
<body>

    <?php include('php\templates\header.php'); ?>

    <form class="account-form" enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="edit-profile-form">
        <input id="photo-input" class="hide" type="file" name="profile_photo" onchange="photoSelected()" disabled>

        <div class="container" id="report-post">

            <div class="title">
                <h1>Account Settings</h1>
            </div>

            <div class="user-details">
                <div class="profile-container">
                    <img id="profile-img" class='profile-img' src="<?php echo $values['profile_photo'] ? $values['profile_photo'] : 'images/profile/default.png'  ?>" alt="">
                    <h2 class="display"><?php echo $values['first_name'] . ' ' . $values['last_name']  ?></h2>
                    <div class="edit hide">
                        <div class="form-field">
                            <input type="text" name="first_name" value="<?php echo $values['first_name']  ?>">
                            <?php if ($errors['first_name']) echo "<label class='error'>".$errors['first_name']."</label>"; ?>
                        </div>
                        <div class="form-field">
                            <input type="text" name="last_name" class="edit hide" value="<?php echo $values['last_name']  ?>">
                            <?php if ($errors['last_name']) echo "<label class='error'>".$errors['last_name']."</label>"; ?>
                        </div>
                    </div>
                    <input onclick="chooseFile()" type="button" class="edit picture-edit hide"  value="Change profile picture">
                    <input id="remove-pic" onclick="removeProfilePicture()" type="button" class="edit picture-edit hide"  value="Remove profile picture">
                    <?php if ($errors['profile_photo']) echo "<label class='error'>".$errors['profile_photo']."</label>"; ?>
                </div>

                <div class="field-container">
                    <div class="info-field">
                        <p>Email</p>
                        <div class="form-field edit hide">
                            <input type="text" name="email" value="<?php echo $values['email']  ?>">
                            <?php if ($errors['email']) echo "<label class='error'>".$errors['email']."</label>"; ?>
                        </div>
                        <a class="display" href="mailto:<?php echo $values['email']  ?>">
                            <p ><?php echo $values['email']  ?></p>
                        </a>
                    </div>
                    <div class="info-field">
                        <p>About</p>
                        <div class="form-field edit hide">
                            <textarea type="text" name="about"><?php echo $values['about']  ?></textarea>
                            <?php if ($errors['about']) echo "<label class='error'>".$errors['about']."</label>"; ?>
                        </div>
                        <p class="display"><?php echo $values['about']  ?></p>
                    </div>
                </div>
            </div>

            <div class="contacts">
                <div class="h-with-button">
                    <h3>Contacts</h3>
                    <input type="button" class="edit btn-image plus-background hide" onclick="addPhone()">
                    <?php if ($errors['phone']) echo "<label class='error'>".$errors['phone']."</label>"; ?>
                </div>
                <div class="field-container" id="phone-container">
                    <?php
                        foreach ($values['phone'] as $phone)
                        {
                            echo "
                                <div class='phone' id='$phone'>
                                    <a class='display' href='tel:$phone'>
                                        <p >$phone</p>
                                    </a>
                                    <div class='form-field edit hide'>
                                        <input type='text' name='phone[]' value='$phone'>
                                     </div>
                                    <input type='button' class='edit btn-image delete-background hide' onclick=\"deletePhone('$phone')\">
                                </div>";
                        }
                    ?>
                </div>
            </div>

            <div class="btn-container-ralign hide edit">            
                <input type="submit" value="Save changes" name="profile">

            </div>
            
            <?php if (!empty($values['warnings'])) : ?>

                <div class="warnings">
                    <div class="h-with-button">
                        <h3>Warnings</h3>
                        <form action="account.php" method="post">
                            <input type="submit" value="Clear Warnings" name="clear-warnings">
                        </form>
                    </div>
                    
                    <?php
                        foreach($values['warnings'] as $warning)
                        {
                            echo "<p>$warning</p>";
                        }
                    ?>

                </div>

            <?php endif; ?>

            <div class="options">
                <h3>Options</h3>
                <div class="field-container">
                    <a onclick="editMode()">
                        <div >
                            <p>Edit account</p>
                        </div>
                    </a>
                    <a href="saved-posts.php">
                        <div>
                            <p>Saved posts</p>
                        </div>
                    </a>
                    <a href="owned-posts.php?id=<?php echo $values['user_id']?>">
                        <div>
                            <p>My posts</p>
                        </div>
                    </a>
                    <a href="signout.php">
                        <div>
                            <p>Sign out</p>
                        </div>
                    </a>
                    <a href="delete-account.php"  class='delete'>
                        <div>
                            <p>Delete Account</p>
                        </div>
                    </a>
                    
                </div>
            </div>



        </div>
    </form>
    
    <?php include('php\templates\footer.php'); ?>

    <?php if ($editMode) echo "<script> editMode(); </script>"?>
</body>
</html>