<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.5.0/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <?php include_once("config.php");redirect('contact-us.php','','agency-contact-us.php');?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button navbar-fixed-top" style="height: 80px;background-color: transparent;color: #ffffff;">
        <div class="container-fluid"><a class="navbar-brand text-capitalize" data-toggle="tooltip" data-bs-tooltip="" data-placement="bottom" title="Gas Agency"><?php include_once("config.php");echo $company_name;?></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-bs-hover-animate="flash" style="color: #ffffff;font-weight: bold;" href="contact-us.php">Contact Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle nav-link btn-primary" data-toggle="dropdown" aria-expanded="false" data-bs-hover-animate="wobble" href="" style="color: #ffffff;font-weight: bold;" name="username-container"><?php include_once('config.php');if(isset($_SESSION['username'])){echo $_SESSION['username'];}else{echo 'username';}?></a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="user.php">Profile</a>
                            <a class="dropdown-item" role="presentation" href="user-booking.php">Booking</a>
                            <a class="dropdown-item" role="presentation" href="user-order-status.php">Order Status</a>
                            <a class="dropdown-item" role="presentation" href="user-change-password.php">Change Password</a>
                            <a class="dropdown-item" role="presentation" href="user-settings.php">Settings</a>
                            <a class="dropdown-item" role="presentation" href="user-contact-us.php?action=logout">Logout<?php include_once("config.php");logout();redirect('index.php','','agency-home.php');?></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="scroller">
        <div class="form-div container-fluid h-100">
            <form method="POST" class="login-form">
                <div class="form-group"><input class="form-control" type="text" placeholder="Subject" name="subject"></div>
                <div class="form-group"><textarea class="form-control" placeholder="Message" name="message"></textarea></div>
                <div class="btn-group d-flex pt-3" role="group">
                    <button class="btn btn-success btn-rounded" type="submit">Submit</button>
                    <button class="btn btn-warning btn-rounded" type="reset">Clear</button>
                </div>
                <?php include_once('config.php');user_contact_us();?>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>
</html>