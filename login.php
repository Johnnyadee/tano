<?php
require('controller/controller.php');
$title = "Login Page";
require("head.php");
require("header.php");

if (isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
    header("location: user/index.php");
}


if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $username = $_POST['username'];
    $password  = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $msg = $call->userLogin($username, $password);
    } else {
        $msg = 'Please fill all fields';
    }
}

?>
<section class="banner-area">
    <div class="banner-overlay">
        <div class="banner-text text-center">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <h2 class="title-head">Member <span>Login</span></h2>
                        <hr>
                        <ul class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Accounts</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-us">
    <div class="container">

        <div class="row m-t-50">
            <div class="col-md-6 col-md-offset-3">
                <?php if (isset($msg) && !empty($msg)) { ?>
                    <p><a class="alert alert-danger"><?php echo $msg; ?></a></p>
                <?php } ?>
                <form method="post">
                    <div class="form-group">
                        <label for="email">Username / Email Address</label>
                        <input class="form-control" name="username" id="email" placeholder="USERNAME / EMAIL" type="text" required>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <label for="password">Account Password</label>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <a class="text-gray-05 pull-right" href="password/reset.php">Forgot your password?</a>
                            </div>
                        </div>
                        <input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password" required>
                    </div>
                    <div class="form-field">
                        <label style="color:#000">
                            <input type="checkbox" name="remember" style="height: auto; width: auto" />
                            Keep me logged in
                        </label>
                    </div>
                    <button class="btn btn-primary m-t-30" name="submit" value="submit" type="submit">Log Me In</button>
                </form>

            </div>
        </div>
    </div>
</section>


<section class="call-action-all">
    <div class="call-action-all-overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="action-text">
                        <h2>Get Started Today With Alpha Capital Investment</h2>
                        <p class="lead">Open account for free and start trading crypto assets!</p>
                    </div>
                    <p class="action-btn"><a class="btn btn-primary" href="register.php">Register Now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require("footer.php"); ?>