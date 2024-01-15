<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('location: admin/home.php');
    exit();
}

if (isset($_SESSION['voter'])) {
    $_SESSION['start'] = time();
    header('location: home.php');
    exit();
}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition login-page" style="background: url('images/bg2.jpg') center center fixed; background-size: cover; font-family: 'Georgia', 'Times New Roman', serif;">

<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #0c9c64; border-color: #2ecc71;">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <img alt="Logo" src="images/logo.png" style="height: 40px; margin-top: -10px;">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="aboutus.php" style="color: #fff; font-size: 18px; text-transform: uppercase; font-weight: bold;">About Us</a></li>
                <li><a href="instructions.php" style="color: #fff; font-size: 18px; text-transform: uppercase; font-weight: bold;">Instructions</a></li>
                <li><a href="admin/login.php" style="color: #fff; font-size: 18px; text-transform: uppercase; font-weight: bold;">Admin Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
</nav>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-6">
            <!-- Move the welcome text to the middle of the left side -->
            <div class="text-center" style="color: red; font-size: 42px; margin-bottom: 20px; height: 100%; display: flex; align-items: center;">
                <div style="border-bottom: 4px solid red; margin: 0 auto 10px; width: 50%;"></div>
                Welcome to<br>
                E-voting
                <div style="border-top: 4px solid red; margin: 10px auto 0; width: 50%;"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="login-box" style="background-color: #fff; color: #333; font-size: 20px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
                <div class="login-logo" style="background-color: #2ecc71; color: #fff; font-size: 28px; padding: 15px; text-align: center; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                    <b> Classic Voting System</b>
                </div>

                <div class="login-box-body" style="background-color: #fff; color: #333; font-size: 18px; padding: 20px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <h3 style="color: #2ecc71; font-size: 28px; text-align: center; font-weight: bold; padding-bottom: 15px;">User Login</h3>

                    <form action="login.php" method="POST">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" name="voter" placeholder="Voter's ID" required style="margin-bottom: 15px; padding: 12px; font-size: 18px; border: 1px solid #ccc; border-radius: 5px;">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" name="password" placeholder="Password" required style="margin-bottom: 15px; padding: 12px; font-size: 18px; border: 1px solid #ccc; border-radius: 5px;">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>

                        <!-- Google reCAPTCHA -->
                        <div class="g-recaptcha" data-sitekey="6LdMGxwpAAAAAJyAC_Rj1uDsylnK8BS1ofeceVdP" style="margin-bottom: 15px;"></div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-success btn-block btn-curve" style="background-color: #2ecc71; color: #fff; font-size: 18px; padding: 15px; border: none; border-radius: 5px;">Sign In</button>
                            </div>
                        </div>
                    </form>

                    <p class="text-center" style="color: #333; font-size: 18px; margin-top: 20px;">Don't have an account? <a href="register.php" style="color: #2ecc71; font-weight: bold;">Register here</a></p>
                </div>

                <!-- Include the Google reCAPTCHA script -->
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>

                <?php include 'includes/scripts.php' ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
