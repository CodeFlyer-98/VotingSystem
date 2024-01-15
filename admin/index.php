<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page" style="background-color: #E6E6FA; display: flex; align-items: center; justify-content: center; height: 100vh;">
<!-- Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #0c9c64; border-color: #2ecc71;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">
                    <img alt="Logo" src="logo.png" style="height: 40px; margin-top: -10px;">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../aboutus.php" style="color: #fff; font-size: 18px; text-transform: uppercase; font-weight: bold;">About Us</a></li>
                    <li><a href="../instructions.php" style="color: #fff; font-size: 18px; text-transform: uppercase; font-weight: bold;">Instructions</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>
    <div class="login-box" style="background-color: #4B0082; color: white; font-size: 24px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; width: 400px;">
        <div class="login-logo" style="width: 100%; text-align: center;">
            <b>Online Voting System</b>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg" style="color: #333; font-size: 18px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align: center;">Sign in to start your admin session</p>

            <form action="login.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <!-- Google reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LdMGxwpAAAAAJyAC_Rj1uDsylnK8BS1ofeceVdP"></div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-success btn-block btn-curve" style="background-color: #32CD32; color: white; font-size: 16px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" name="login">
                            <i class="fa fa-sign-in"></i> Sign In
                        </button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_SESSION['error'])) {
                echo "
                    <div class='callout callout-danger text-center mt20'>
                        <p>" . $_SESSION['error'] . "</p>
                    </div>
                ";
                unset($_SESSION['error']);
            }
            ?>
        </div>
    </div>

    <?php include 'includes/scripts.php' ?>
    <!-- Include the reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>

