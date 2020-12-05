<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.5.0/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <?php include_once("config.php");redirect('user.php','agency-home.php','login.php');?>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean-button navbar-fixed-top" style="height: 80px;background-color: transparent;color: #ffffff;">
        <div class="container-fluid"><a class="navbar-brand" href="">Goa University Gas Agency</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link d-xl-flex" data-bs-hover-animate="pulse" style="color:#ffffff;" href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" data-bs-hover-animate="flash" style="color: #ffffff;font-weight: bold;" href="contact-us.php">Contact Us</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" data-bs-hover-animate="swing" style="color: #ffffff;font-weight: bold;" href="login.php">Login</a></li>
                    <li class="nav-item btn-primary" role="presentation"><a class="nav-link" data-bs-hover-animate="shake" style="color: #ffffff;font-weight: bold;" href="register.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="scroller">
        <div class="form-div container-fluid h-100">
            <form class="login-form" method="POST">
                <div class="form-group"><input class="form-control" type="text" placeholder="User Name" name="username" autocomplete></div>
                <div class="form-group"><input class="form-control" type="password" placeholder="Password" name="password" autocomplete></div>
                <div class="btn-group d-flex pt-3" role="group"><button class="btn btn-success btn-rounded" data-bs-hover-animate="shake" type="submit">Submit</button><button class="btn btn-warning btn-rounded" data-bs-hover-animate="bounce" type="button">Clear</button></div>
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <?php include_once('config.php'); login();?>
</body>
</html>