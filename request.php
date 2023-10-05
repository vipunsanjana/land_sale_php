<?php

    session_start();
    include("php/controllers/request-ctrl.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Request Post</title>
    <link rel="stylesheet" href="styles/page-container.css">
    <link rel="stylesheet" href="styles/sale-request.css">
    <script src="js/sale-request.js"></script>
    <?php include_once('php/includes/common-css-js.php'); ?>

</head>
<body>
    <?php
        include("php/templates/header.php");
    ?>

    <form class='hide' id="save-form">
        <input type="text" name="request_id" value="<?php echo $values['request_id'] ?>">
        <input type="text" name="action" value="save">
    </form>

    <form class='hide' id="unsave-form">
        <input type="text" name="request_id" value="<?php echo $values['request_id'] ?>">
        <input type="text" name="action" value="unsave">
    </form>

    <div class="popup-container" id="report-post">
        <h2>Report Post</h2>
        <form class="simple-form" id="report-form">
            <label for="complaint_type">Reason</label>
            <select name='complaint_type' id="complaint_type">
                <option value="false advertisement">False advertisement</option>
                <option value="spam and abuse">Spam and abuse</option>
                <option value="false information">False information</option>
                <option value="transaction denial">Transaction denial</option>
            </select>
            <label for="description">Description</label>
            <textarea type="text" name='description' id="description" rows="7"></textarea>
            <input type="hidden" name='request_id' value="<?php echo $values['request_id'] ?>">
        </form>
        <input class="btn-report" type="button" value="Submit" onclick="submitReport('submit-request-complaint.php')">
        <input class="btn-report" type="button" value="Cancel" id="cancel-report" onclick="hideReportForm()">
    </div>       

    <div class="popup-container" id="report-success">
        <h2>Report Successful!</h2>
        <h3>Thank you for the support</h3>
        <input class="btn-report" type="button" value="Close" id="close-success" onclick="hideReportSuccess()">
    </div>

    <div class="container" id="container">
        <div class="title">
            <h1><?php echo $values['title'] ?></h1>
        </div>

        <div class="images">
            <div class="slide-show">

            <img class="image" src="<?php if(empty($values['cover_photo'])) echo "images/request/default.png"; else echo $values['cover_photo'];?>">

            </div>
        </div>

                    
        <div class="btn-container-ralign">
        <input class='btn-simple' type='button' value='Report' onclick='showReportForm()' <?php echo isset($_SESSION['user_id']) ? '' : "disabled title = 'Sign in to report posts'" ?>>

        <input class='btn-simple <?php if (!$values['saved']) echo 'hide' ?>' type='button' value='Saved' id='btn-unsave' onclick="unsave('save-request.php')">
        <input class='btn-simple <?php if ($values['saved']) echo 'hide' ?>' type='button' value='Save' id='btn-save' onclick="save('save-request.php')" <?php echo isset($_SESSION['user_id']) ? '' : "disabled title = 'Sign in to save posts'" ?>>

        </div>
    
        <div class="info">
            <h3>Details</h3>
            <div class="field-container">
                <div class="info-field">
                    <p>Land Area</p>
                    <p><?php echo $values['min_area'] ? $values['min_area'] . ' - ' .$values['max_area']. ' Perch' : 'Neglibible' ?></p>
                </div>
                <div class="info-field">
                    <p>Price</p>
                    <p><?php echo $values['min_price'] ? 'Rs. '.$values['min_price'] . ' - ' . $values['max_price'] : 'Negligible'?></p>
                </div>
                <div class="info-field">
                    <p>City</p>
                    <p><?php echo $values['city']?></p>
                </div>
                <div class="info-field">
                    <p>District</p>
                    <p><?php echo $values['district']?></p>
                </div>
                <div class="info-field">
                    <p>Province</p>
                    <p><?php echo $values['province']?></p>
                </div>
            </div>
        </div>

        <div class="description">
            <h3>Description</h3>
            <p><?php echo $values['description']?> </p>
        </div>

        <div class="contacts">
            <h3>Contacts</h3>
            <div class="field-container">
            <?php 
                foreach ($values['phone'] as $contact)
                {
                    echo "<a href='tel:$contact'><div><p>$contact</p></div></a>";
                }
            ?> 
            </div>
        </div>

        <div class="user">
            <h3>Requester</h3>
            <a href="userview.php?id=<?php echo $values['seller']['user_id'] ?>">
                <div class="profile">
                    <img class="avatar" src="<?php echo $values['seller']['profile_photo'] ?>">
                    <p> <?php echo $values['seller']['first_name'] . ' ' . $values['seller']['last_name'] ?></p>
                </div>
            </a>
            <div class="field-container">
                <div class="info-field">
                    <p>Contacts</p>
                    <a href="tel:<?php echo $values['seller']['contact'] ?>">
                        <p><?php echo $values['seller']['contact'] ?></p>
                    </a>
                </div>
                <div class="info-field">
                    <p>E-mail</p>
                    <a href="mailto:<?php echo $values['seller']['email'] ?>">
                        <p><?php echo $values['seller']['email'] ?></p>
                    </a>
                </div>
                <div class="info-field">
                    <p>About</p>
                    <p><?php echo $values['seller']['about'] ?></p>
                </div>
            </div>
            
        </div>
    </div>

    <?php
        include("php/templates/footer.php");
    ?>
</body>
</html>