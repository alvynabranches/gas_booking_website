<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.5.0/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <?php include_once("config.php"); redirect('user.php',TRUE);?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button navbar-fixed-top" style="height: 80px;background-color: transparent;color: #ffffff;">
        <div class="container-fluid"><a class="navbar-brand" href="#">Gas-Modi Gas Agency</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link d-xl-flex" data-bs-hover-animate="pulse" style="color:#ffffff;" href="index.html"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-bs-hover-animate="flash" style="color: #ffffff;font-weight: bold;" href="contact-us.html">Contact Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-bs-hover-animate="swing" style="color: #ffffff;font-weight: bold;" href="login.html">Login</a></li>
                    <li class="nav-item btn-primary" role="presentation"><a class="nav-link active" data-bs-hover-animate="shake" style="color: #ffffff;font-weight: bold;" href="register.html">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="scroller">
        <div class="form-div container-fluid h-100">
            <form class="form-table" method="POST">
                <div class="form-group"><input class="form-control" type="text" id="full_name" placeholder="Full Name" required="" name="full_name" autofocus="" minlength="5" autocomplete="on"></div>
                <div class="form-group"><input class="form-control" type="text" id="full_address" placeholder="Full Address" name="full_address" minlength="32" required="" autocomplete="on"></div>
                <div class="form-group"><input class="form-control" type="text" id="username" placeholder="User Name" required="" name="username" minlength="8" autocomplete="on"></div>
                <div class="form-group"><input class="form-control" type="email" id="email" placeholder="Email" required="" name="email" minlength="8" autofocus="" autocomplete="on"></div>
                <div class="form-group"><input class="form-control" type="tel" id="phone_no" name="phone_no" placeholder="Phone No" required="" minlength="10" maxlength="10" pattern="[7-9]{1}[0-9]{9}"></div>
                <div class="form-group"><input class="form-control" type="password" id="password" placeholder="Password" required="" name="password" minlength="8" autocomplete="on"></div>
                <div class="form-group"><input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" minlength="8" autocomplete="on" required=""></div>
                <div class="form-group"><select class="form-control" id="location" placeholder="location" required="" name="location"><option value="" selected="">Location</option><?php include_once('config.php');echo location_options();?></select></div>
                <div class="form-group"><select class="form-control" id="type" required="" name="type"><option value="" selected="">Type</option><option value="domestic">Domestic</option><option value="commercial">Commercial</option></select></div>
                <div class="btn-group d-flex pt-3" role="group"><button class="btn btn-success text-center btn-rounded" data-bs-hover-animate="shake" id="submit-btn" type="submit" name="submit_btn">Submit</button><button class="btn btn-warning text-center btn-rounded" data-bs-hover-animate="bounce" id="reset-btn" type="reset" name="reset_btn">Clear</button></div>
                <?php include_once('config.php'); register();?>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>