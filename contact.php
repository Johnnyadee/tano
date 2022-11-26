<?php
require("controller/controller.php");
$title = "Contact";
require("head.php");
require("header.php");

if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    if (!empty($fname) && !empty($lname)  && !empty($email) && !empty($subject) && !empty($message)) {
        $msg = $call->support($fname, $lname, $email, $subject, $message);
    } else {
        $mag = "Please fill all fields";
    }
}
?>
<section class="banner-area">
    <div class="banner-overlay">
        <div class="banner-text text-center">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <h2 class="title-head">Get in <span>touch</span></h2>
                        <hr>
                        <ul class="breadcrumb">
                            <li><a href="index.php"> home</a></li>
                            <li>contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 contact-form">
                <?php if (isset($msg) && !empty($msg)) {
                    if ($msg == 1) { ?>
                        <p class="alert alert-success"><?php echo "Support Message was Successful"; ?></p>
                    <?php } else { ?>
                        <p class="alert alert-danger"><?php echo $msg; ?></p>
                <?php }
                } ?>
                <h3 class="col-xs-12">feel free to drop us a message</h3>
                <p class="col-xs-12">Need to speak to us? Do you have any queries or suggestions? Please contact us about all enquiries including membership and volunteer work using the form below.</p>
                <form class="form-contact1" method="POST">
                    <div class="form-group col-md-6">
                        <input class="form-control" name="firstname" id="firstname" placeholder="FIRST NAME" type="text" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="lastname" id="lastname" placeholder="LAST NAME" type="text" required>
                    </div>

                    <div class="form-group col-md-6">
                        <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="subject" id="subject" placeholder="SUBJECT" type="text" required>
                    </div>
                    <div class="form-group col-xs-12">
                        <textarea class="form-control" id="message" name="message" placeholder="MESSAGE" required></textarea>
                    </div>
                    <div class="form-group col-xs-12 col-sm-4">
                        <!-- <button class="btn btn-primary btn-contact" value="submit" type="submit">send message</button> -->
                        <input type="submit" value="Send" name="submit" class="btn btn-primary">
                    </div>
                    <div class="col-xs-12 text-center output_message_holder d-none">
                        <p class="output_message"></p>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="widget">
                    <div class="contact-page-info">
                        <div class="contact-info-box">
                            <i class="fa fa-home big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Address</h4>
                                <p>15 Castle street, thetford, United Kingdom, IP24 2DW</p>
                            </div>
                        </div>
                        <div class="contact-info-box">
                            <i class="fa fa-phone big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Phone Numbers</h4>
                                <p>+44 7377517956</p>
                                <p>+1 (757)933-1081</p>
                            </div>
                        </div>
                        <div class="contact-info-box">
                            <i class="fa fa-envelope big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Email Addresses</h4>
                                <p>support@Alphacapitalinvestment.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Widget Ends -->
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
<?php
require("footer.php");
?>