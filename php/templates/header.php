
<header>
        <div class="nav">
                <div class="logo">
                        <img src="images/headerfooter/logos.jpg" alt="" height="75px">
                        <!-- <p style="height:75px">ABC lands</p>  -->
                </div>
                <div class="links">
                        <a href="index.php" class="link">Home</a>
                        <a href="requests.php" class="link">Requests</a>
                        <a href="submit-sale.php" class="link">Submit a Sale</a>
                        <a href="submit-request-form.php" class="link">Submit a Request</a>
                        <?php if (isset($_SESSION['account_type']) and ($_SESSION['account_type'] === 'mod' or $_SESSION['account_type'] === 'admin')) : ?>
                                <a href="complaint.php" class="link">Moderator Dashboard</a>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['account_type']) and $_SESSION['account_type'] === 'admin') : ?>
                        <a href="admin.php" class="link">Admin Dashboard</a>
                        <?php endif; ?>
                </div>

                
                
                <?php if (isset($_SESSION['user_id'])) : ?>
                        <div class="profile">
                                <a href="account.php" class=""><img src="<?php echo (isset($_SESSION['profile_photo']) and !empty($_SESSION['profile_photo'])) ? $_SESSION['profile_photo'] : 'images/profile/default.png' ?>" class="profile-img" alt=""></a>
                        </div>
                <?php else : ?>
                        <div class="links r-align">
                                <a href="signin.php" class="link">Sign in</a>
                                <a href="register.php" class="link">Register</a>
                        </div>
                <?php endif; ?>
        </div>
    </div>  
</header>       