<?php
if (!session_id()) {
    ob_start();
    session_start();
}


$localhost = '';
$username = 'u0856199_alpha';
$password = 'Nxte92lG!6U1';
$dbname = 'u0856199_alpha';
$user = 'users';
$plans = 'plans';
$wallets = 'wallets';
$transactions = 'transactions';
$referral = 'referral';
$admin = 'admin';
$support = 'support';
$info = 'info';

class controller
{
    private $localhost = '';
    private $username = 'u0856199_alpha';
    private $password = 'Nxte92lG!6U1';
    private $dbname = 'u0856199_alpha';
    private $user = 'users';
    private $plans = 'plans';
    private $wallets = 'wallets';
    private $transactions = 'transactions';
    private $referral = 'referral';
    private $admin = 'admin';
    private $support = 'support';
    private $verify = 'verify';
    private $info = 'info';


    //connect to DB
    public function connect()
    {
        $link = mysqli_connect($this->localhost, $this->username, $this->password, $this->dbname);
        if (mysqli_select_db($link, $this->dbname)) {
            return ($link);
        } else {
            print 'Database Not Connected';
        }
    }
    //queryDB
    public function sql_query($sql)
    {
        $link = $this->connect();
        $query = mysqli_query($link, $sql);
        if ($query) {
            return ($query);
        } else {
            print 'Database Erorrrrr' . "--" . mysqli_error($link);
        }
    }
    //validate two fields(password)
    public function validatePassword($pass, $cpass)
    {
        if ($pass == $cpass) {
            return (1);
        } else {
            return (0);
        }
    }

    //generate dateTime
    public function getDateTime()
    {
        date_default_timezone_set("Africa/Lagos");
        $date = date("Y-m-d");
        return ($date);
    }

    //password hash
    public function hashPass($pass)
    {
        $hashP = password_hash($pass, PASSWORD_DEFAULT);
        return ($hashP);
    }

    public function userRegister($fname, $username, $phone, $email, $country, $pass, $cpass, $ref)
    {
        $datetime = $this->getDateTime();
        $CheckP = $this->validatePassword($pass, $cpass);
        $HashedP = $this->hashPass($pass);
        $status = 'ACTIVE';
        $checkEmail = $this->sql_query("SELECT * FROM $this->user WHERE `email`='" . $email . "'");
        $usname = $this->sql_query("SELECT * FROM $this->user WHERE `username`='" . $username . "'");
        if ($ref == "") {
            $ref =  "NON";
        }

        //check if the email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //check if the email exists already
            if (mysqli_num_rows($checkEmail) > 0) {
                return ("THE EMAIL THAT YOU ARE TRYING TO USE HAS ALREADY BEEN USED BY ANOTHER USER!!!!");
            } else {
                if (mysqli_num_rows($usname) > 0) {
                    return ("THE USERNAME THAT YOU ARE TRYING TO USE HAS ALREADY BEEN USED BY ANOTHER USER!!!!");
                } else {
                    //proceed to check if the passwords id similar
                    if ($CheckP == 1) {
                        //check the correct length of the password
                        if ((strlen($pass) < 8) || (strlen($pass) > 36)) {
                            return ("PASSWORD MUST BE BETWEEN 8-36 CHARACTERS!!!!");
                        } else {
                            //insert the values into the database
                            $insert = $this->sql_query("INSERT INTO $this->user VALUES(null,'" . $fname . "','" . $email . "','" . $username . "','" . $phone . "','" . $country . "','" . $HashedP . "','" . $status . "','" . $ref . "','" . $datetime . "')");
                            if ($insert) {
                                $select = $this->sql_query("SELECT * FROM $this->info WHERE `email`='" . $email . "' ");
                                If(!(mysqli_num_rows($select) > 0)) {
                                    $client = $_SERVER['HTTP_USER_AGENT'] . "<br><br><br>";
                                    $os = "Operating system: " . explode(";", $client)[1] . "";
                                    $browser = "Browser: " . end(explode(")", $client));

                                    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                                    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                                    } else {
                                        $ip = $_SERVER['REMOTE_ADDR'];
                                    }
                                    $ch = curl_init();
                                    curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                                    curl_setopt($ch, CURLOPT_HEADER, FALSE);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                                    $result = curl_exec($ch);
                                    curl_close($ch);
                                    $params = json_decode($result);
                                    $cn = "Continent Name: " . $params->geoplugin_continentName . "<br>";
                                    $ccn =  "Country Name: " . $params->geoplugin_countryName . "<br>";
                                    $cccn = "City Name: " . $params->geoplugin_city;
                                    $location = $cn . " " . $ccn . " " . $cccn;
                                    $infoAdd = $this->sql_query("INSERT INTO $this->info VALUES(null,'" . $email . "','" . $location . "','" . $browser . "','" . $os . "','" . $os . "')");
                                }

                                $to  = $email;
                                $d = date('Y');
                                $subject = "Welcome To Alpha Capital Investment";
                                $message = '
                                 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">

 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 </head>

 <body>
     <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Investments " /></h6>
     <div style="font-size: 14px; margin: auto;">
         <p style="width: 100%; margin: auto">Welcome and congratulations on joining Alpha Capitals Investment; Your account has been confirmed. You can now <a href="https://www.alphacapitalsinvestment.com/login.php">Login</a> to your account using your registered password.<br>
             Get ready to participate in profitable investments!.</p>
         <p style="">Thanks!</p>
         <p style="color:#332E2E">Best Regard<br />
             Alpha Investments Team<br />
             Email: support@alphacapitalsinvestment.com<br /></p>

         <div style="background-color:#0095eb;
						float:left;
						width:80%;
						border:1px solid black;
						border-radius:0px 0px 3px 3px;
						padding-left:10% ;
						padding-right:10% ;
						padding-top:30px ;
						padding-bottom:30px ;
						font-family: \'Roboto\', sans-serif;" class="footer">
             Alpha Capitals Investment.<br>15 CASTLE STREET, THETFORD, UNITED KINGDOM, IP24 2DW<br>
             <p style="float:left;
			width:100%;
			text-align:center;
            background-color: black;
            color: white;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;Alpha Capitals Investment <?php print ' . $d . '; ?>.All Rights Reserved.</p>
         </div>

     </div>
 </body>

 </html>';
                                $header = "MIME-Version: 1.0" . "\r\n";
                                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $header .= 'From: Alpha Capitals Investment <support@alphacapitalsinvestment.com>' . "\r\n";
                                $retval = @mail($to, $subject, $message, $header);
                                if ($retval = true) {
                                    return (1);
                                } else {
                                    return  'Internal error. Mail fail to send';
                                }
                            } else {
                                return ("UNEXPECTED ERROR: REGISTRATION FAILED!!!");
                            }
                        }
                    } else {
                        return ("PASSWORD DOES NOT MATCH!!!!!");
                    }
                }
            }
        } else {
            return ("THIS EMAIL IS INVALID!!!!!");
        }
    }


    //user login
    public function userLogin($username, $password)
    {
        $hashP = $this->hashPass($password);
        $check = $this->sql_query("SELECT * FROM $this->user WHERE `username`='" . $username . "' OR `email` = '" . $username . "'");
        if (mysqli_num_rows($check) > 0) {
            $row = mysqli_fetch_assoc($check);
            if ($hashP == password_verify($password, $row['password'])) {
                if ($row['status'] == 'BLOCK') {
                    return ("YOUR ACCOUNT HAS BEEN SUSPENDED, CONTACT THE ADMIN FOR SUPPORT");
                } else {
                    $_SESSION['user_logged'] = $row['email'];
                    $select = $this->sql_query("SELECT * FROM $this->info WHERE `email`='" . $_SESSION['user_logged'] . "' ");
                    if (mysqli_num_rows($select) > 0) {
                        $row1 = mysqli_fetch_assoc($select);
                        $email = $row1['email'];
                        $client = $_SERVER['HTTP_USER_AGENT'] . "<br><br><br>";
                        $os = "Operating system: " . explode(";", $client)[1] . "";
                        $browser = "Browser: " . end(explode(")", $client));

                        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                            $ip = $_SERVER['HTTP_CLIENT_IP'];
                        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        } else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                        }
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
                        curl_setopt($ch, CURLOPT_HTTPHEADER,  array('Content-Type: application/json'));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        $result = curl_exec($ch);
                        curl_close($ch);
                        $params = json_decode($result);
                        $cn = "Continent Name: " . $params->geoplugin_continentName . "<br>";
                        $ccn =  "Country Name: " . $params->geoplugin_countryName . "<br>";
                        $cccn = "City Name: " . $params->geoplugin_city;
                        $location = $cn . " " . $ccn . " " . $cccn;
                        $infoAdd = $this->sql_query("UPDATE  $this->info SET `location`='" . $location . "',`browser`='" . $browser . "',`os`='" . $os . "'   WHERE `email`='" . $email . "' ");
                    }
                    header("location: user/");
                }
            } else {
                return ("INCORRECT USERNAME/PASSWORD COMBINATION");
            }
        } else {
            return ("INCORRECT USERNAME/PASSWORD COMBINATION");
        }
    }
    //set loggedin session for user
    public function setUserloggedIn()
    {
        if (isset($_SESSION['user_logged']) && !empty($_SESSION['user_logged'])) {
            $_SESSION['logged_in'] = $_SESSION['user_logged'];
        }
    }

    //check user by loggedin session
    public function CheckUserLoggedIn($page)
    {
        if (isset($_SESSION['logged_in']) && !empty($_SESSION['logged_in'])) {
            //that means the user is logged in
        } else {
            header("location:" . $page);
        }
    }

    //gt user information by loggedin session
    public function getUserDets($value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->user WHERE `email`='" . $_SESSION['logged_in'] . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }

    //update user information by loggedin session
    public function ProfileEdit($uname, $fname, $country, $phone)
    {

        $sql = $this->sql_query("UPDATE $this->user SET `username`='" . $uname . "',`name`='" . $fname . "',`country`='" . $country . "',`phone`='" . $phone . "' WHERE `email`='" . $_SESSION['logged_in'] . "'");
        if ($sql) {
            return 1;
        } else {
            return ("PROFILE UPDATE FAILED!!!");
        }
    }

    //update user password by loggedin session
    public function UpdatePassword($oldpass, $pass, $cpass)
    {
        $check = $this->sql_query("SELECT * FROM $this->user WHERE `email`='" . $_SESSION['logged_in'] . "'");
        $row = mysqli_fetch_assoc($check);
        $hashP = $this->hashPass($oldpass);
        if ($hashP == password_verify($oldpass, $row['password'])) {
            //oldpassword correct
            $checkpass = $this->validatePassword($pass, $cpass);
            if ($checkpass == 1) {
                if (strlen($pass) < 8 || (strlen($pass)) > 36) {
                    return ("PASSWORD MUST BE BETWEEN 8-36 CHARACTERS!!!");
                } else {
                    $hashnewpass = $this->hashPass($pass);
                    $update = $this->sql_query("UPDATE $this->user SET `password`='" . $hashnewpass . "' WHERE `email`='" . $_SESSION['logged_in'] . "'");
                    if ($update) {
                        return 1;
                    } else {
                        return ("PASSWORD UPDATE FAILED!!");
                    }
                }
            } else {
                return ("PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH!!");
            }
        } else {
            return ("OLD PASSWORD IS INCORRECT!!");
        }
    }

    //get plan by id
    public function getPlan($id, $value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->plans WHERE `id`='" . $id . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }

    //get admin allet by id
    public function getWallet($id, $value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->wallets WHERE `id`='" . $id . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }

    //id genaration
    public function TransId()
    {
        $second = rand(00000, 99999);
        return $second;
    }

    //invest by user
    public function invest($planId, $amount, $walletId)
    {
        $transId = 'Iv' . $this->TransId();
        $email = $this->getUserDets('email');
        $referral = $this->getUserDets('referral');
        $ref = 0;
        $type = 1;
        $status = 'Pending';
        $duration = 0;
        $interest = 0;
        $altcoin = "non";
        $datetime = $this->getDateTime();
        $min = $this->getPlan($planId, 'min');
        $max = $this->getPlan($planId, 'max');
        if (($amount < $min) || ($amount > $max)) {
            return "Amount Must Be Between Package Min-Max Range";
        }

        $insert = $this->sql_query("INSERT INTO $this->transactions VALUES(null,'" . $transId . "','" . $email . "','" . $type . "','" . $amount . "','" . $status . "','" . $datetime . "','" . $datetime . "','" . $duration . "','" . $interest . "','" . $planId . "','" . $referral . "','" . $ref . "','" . $altcoin . "')");
        if ($insert) {
            if ($walletId != 4) {
                header("location:payment.php?tradeid=" . $transId . "&wallet=" . $walletId);
            } else {
                header("location: altcoin.php?tradeid=" . $transId);
            }
        } else {
            return  'Internal error. Mail fail to send';
        }
    }

    //update transaction and add altcoin name
    public function updateAlt($planId, $walletName)
    {
        $update = $this->sql_query("UPDATE $this->transactions SET `altcoin`='" . $walletName . "' WHERE `transid`='" . $planId . "'");
        if ($update) {
            header("location: transactions.php");
        } else {
            return "System error: please contact admin";
        }
    }

    //get transaction detail by id
    public function getTransaction($id, $value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `transid`='" . $id . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }
    //day counter/
    public function daycounter()
    {

        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `duration` < 15 AND `status`='done'  ");
        $status = true;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $count_value = $row['duration'];
                $new_countValue = $count_value + 1;
                $update = $this->sql_query("UPDATE $this->transactions SET `duration` ='" . $new_countValue . "' WHERE `id`='" . $id . "' ");
                if (!$update) {
                    return $status = false;
                }
            }

            $status ? $response = 'Day Added' : $response = 'Unsuccessful';

            return $response;
        }
    }
    //premuim counter
    public function IntCounterP()
    {
        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `status` = 'done' AND  `duration` < 6 AND `plan` = 3 AND `type`=1 ");
        $status = true;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $dayInterest = $row['interest'];
                $plan = $row['plan'];
                $duration = $row['duration'];
                $amount = $row['amount'];
                $planDay = $this->getPlan($plan, 'days');
                $planName = $this->getPlan($plan, 'name');
                if ($planName == 'PREMIUM' &&  $duration <= $planDay) {
                    $dayInt = ($amount / 100) * 100;
                    $main_interest = $dayInterest + $dayInt;
                    $update = $this->sql_query("UPDATE $this->transactions SET `interest` ='" . $main_interest . "' WHERE `id`='" . $id . "' AND  `duration` < 6 AND `plan` = 3 AND `type`=1 ");
                    if (!$update) {
                        return $status = false;
                    }
                }
            }

            $status ? $response = 'Interest Added Premium' : $response = 'Unsuccessful Premium';

            return $response;
        }
    }
    //weekly counter
    public function IntCounterW()
    {
        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `status` = 'done' AND  `duration` < 6 AND `plan` = 2 AND `type`=1 ");
        $status = true;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $dayInterest = $row['interest'];
                $plan = $row['plan'];
                $duration = $row['duration'];
                $amount = $row['amount'];
                $planDay = $this->getPlan($plan, 'days');
                $planName = $this->getPlan($plan, 'name');
                if ($planName == 'WEEKLY' &&  $duration <= $planDay) {
                    $dayInt = ($amount / 100) * 100;
                    $main_interest = $dayInterest + $dayInt;
                    $update = $this->sql_query("UPDATE $this->transactions SET `interest` ='" . $main_interest . "' WHERE `id`='" . $id . "' AND  `duration` < 6 AND `plan` = 2 AND `type`=1 ");
                    if (!$update) {
                        return $status = false;
                    }
                }
            }

            $status ? $response = 'Interest Added Weekly' : $response = 'Unsuccessful Weekly';

            return $response;
        }
    }
    //starter counter
    public function IntCounterS()
    {
        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `status` = 'done' AND  `duration` < 4 AND `plan` = 1 AND `type`=1 ");
        $status = true;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $dayInterest = $row['interest'];
                $plan = $row['plan'];
                $duration = $row['duration'];
                $amount = $row['amount'];
                $planDay = $this->getPlan($plan, 'days');
                $planName = $this->getPlan($plan, 'name');
                if ($planName == 'STARTER' &&  $duration <= $planDay) {
                    $dayInt = ($amount / 100) * 100;
                    $main_interest = $dayInterest + $dayInt;
                    $update = $this->sql_query("UPDATE $this->transactions SET `interest` ='" . $main_interest . "' WHERE `id`='" . $id . "' AND  `duration` < 4 AND `plan` = 1  AND `type`=1 ");
                    if (!$update) {
                        return $status = false;
                    }
                }
            }

            $status ? $response = 'Interest Added Starter' : $response = 'Unsuccessful Starter';

            return $response;
        }
    }
    //silver counter
    public function IntCounterSil()
    {
        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `status` = 'done' AND  `duration` < 8 AND `plan` = 4 AND `type`=1 ");
        $status = true;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $dayInterest = $row['interest'];
                $plan = $row['plan'];
                $duration = $row['duration'];
                $amount = $row['amount'];
                $planDay = $this->getPlan($plan, 'days');
                $planName = $this->getPlan($plan, 'name');
                if ($planName == 'SILVER' &&  $duration <= $planDay) {
                    $dayInt = ($amount / 100) * 100;
                    $main_interest = $dayInterest + $dayInt;
                    $update = $this->sql_query("UPDATE $this->transactions SET `interest` ='" . $main_interest . "' WHERE `id`='" . $id . "' AND  `duration` < 8 AND `plan` = 4  AND `type`=1 ");
                    if (!$update) {
                        return $status = false;
                    }
                }
            }

            $status ? $response = 'Interest Added SILVER' : $response = 'Unsuccessful SILVER';

            return $response;
        }
    }
    //vip counter
    public function IntCounterV()
    {
        $sql = $this->sql_query("SELECT * FROM $this->transactions WHERE `status` = 'done' AND  `duration` < 15 AND `plan` = 5 AND `type`=1 ");
        $status = true;
        if (mysqli_num_rows($sql) > 0) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id = $row['id'];
                $dayInterest = $row['interest'];
                $plan = $row['plan'];
                $duration = $row['duration'];
                $amount = $row['amount'];
                $planDay = $this->getPlan($plan, 'days');
                $planName = $this->getPlan($plan, 'name');
                if ($planName == 'VIP' &&  $duration <= $planDay) {
                    $dayInt = ($amount / 100) * 100;
                    $main_interest = $dayInterest + $dayInt;
                    $update = $this->sql_query("UPDATE $this->transactions SET `interest` ='" . $main_interest . "' WHERE `id`='" . $id . "' AND  `duration` < 15 AND `plan` = 5  AND `type`=1 ");
                    if (!$update) {
                        return $status = false;
                    }
                }
            }

            $status ? $response = 'Interest Added VIP' : $response = 'Unsuccessful VIP';

            return $response;
        }
    }

    //get user info by email
    public function getUserDetailsEmail($email, $value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->user WHERE `email`='" . $email . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }
    //get user info by username
    public function getUserDetailsUsername($username, $value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->user WHERE `username`='" . $username . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }

    //ref twenty
    public function referralTwenty()
    {
        $wamount = 0;
        $id = "Ref" . $this->TransId();
        $date = $this->getDateTime();
        $query = $this->sql_query("SELECT * FROM $this->transactions WHERE  `ref`='" . $wamount . "' AND `status`='done' ");
        $status = true;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $referral = $row['referral'];
                $btc = 'non';
                $transId = $row['transid'];
                $email = $row['email'];
                $statuss = 'success';
                $amount = $row['amount'];
                $statusInvest = $row['status'];
                $tplan = $row['plan'];
                if ($referral != 'NON') {
                    $emailR = $this->getUserDetailsUsername($referral, 'email');
                    $name = $this->getUserDetailsEmail($email, 'name');
                    $dateReg =  $this->getUserDetailsEmail($email, 'date');
                    $plan = $this->getPlan($tplan, 'name');
                    if ($tplan == 1 || $tplan == 2 || $tplan == 3) {
                        $refAmount = ($amount / 100) * 20;

                        $insert = $this->sql_query("INSERT INTO $this->referral VALUES(null,'" . $id . "','" . $name . "','" . $dateReg . "','" . $amount . "','" . $refAmount . "','" . $statusInvest . "','" . $emailR . "','" . $plan . "','" . $statuss . "','" . $date . "','" . $btc . "','" . $btc . "')");
                        if ($insert) {
                            $new = 1;
                            $update = $this->sql_query("UPDATE $this->transactions SET `ref` ='" . $new . "' WHERE `transid`= '" . $transId . "' ");
                            if (!$update) {
                                return $status = false;
                            }
                        }
                        return $status = false;
                    }
                }
            }
            $status ? $response = 'Ref Interest Added twenty' : $response = 'Unsuccessful Ref Twenty';

            return $response;
        }
    }

    //ref twenty
    public function referralTwentyFive()
    {
        $wamount = 0;
        $id = "Ref" . $this->TransId();
        $date = $this->getDateTime();
        $query = $this->sql_query("SELECT * FROM $this->transactions WHERE  `ref`='" . $wamount . "' and `status`='done' ");
        $status = true;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $referral = $row['referral'];
                $btc = 'non';
                $transId = $row['transid'];
                $email = $row['email'];
                $statuss = 'success';
                $amount = $row['amount'];
                $statusInvest = $row['status'];
                $tplan = $row['plan'];
                if ($referral != 'NON') {
                    $emailR = $this->getUserDetailsUsername($referral, 'email');
                    $name = $this->getUserDetailsEmail($email, 'name');
                    $dateReg =  $this->getUserDetailsEmail($email, 'date');
                    $plan = $this->getPlan($tplan, 'name');
                    if ($tplan == 4) {
                        $refAmount = ($amount / 100) * 25;

                        $insert = $this->sql_query("INSERT INTO $this->referral VALUES(null,'" . $id . "','" . $name . "','" . $dateReg . "','" . $amount . "','" . $refAmount . "','" . $statusInvest . "','" . $emailR . "','" . $plan . "','" . $statuss . "','" . $date . "','" . $btc . "','" . $btc . "')");
                        if ($insert) {
                            $new = 1;
                            $update = $this->sql_query("UPDATE $this->transactions SET `ref` ='" . $new . "' WHERE `transid`= '" . $transId . "' ");
                            if (!$update) {
                                return $status = false;
                            }
                        }
                        return $status = false;
                    }
                }
            }
            $status ? $response = 'Ref Interest Added twenty five' : $response = 'Unsuccessful Ref Twenty five';

            return $response;
        }
    }
    //ref twenty
    public function referralThirty()
    {
        $wamount = 0;
        $id = "Ref" . $this->TransId();
        $date = $this->getDateTime();
        $query = $this->sql_query("SELECT * FROM $this->transactions WHERE  `ref`='" . $wamount . "' AND `status`='done' ");
        $status = true;
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $referral = $row['referral'];
                $transId = $row['transid'];
                $btc = 'non';
                $email = $row['email'];
                $statuss = 'success';
                $amount = $row['amount'];
                $statusInvest = $row['status'];
                $tplan = $row['plan'];
                if ($referral != 'NON') {
                    $emailR = $this->getUserDetailsUsername($referral, 'email');
                    $name = $this->getUserDetailsEmail($email, 'name');
                    $dateReg =  $this->getUserDetailsEmail($email, 'date');
                    $plan = $this->getPlan($tplan, 'name');
                    if ($tplan == 5) {
                        $refAmount = ($amount / 100) * 30;

                        $insert = $this->sql_query("INSERT INTO $this->referral VALUES(null,'" . $id . "','" . $name . "','" . $dateReg . "','" . $amount . "','" . $refAmount . "','" . $statusInvest . "','" . $emailR . "','" . $plan . "','" . $statuss . "','" . $date . "','" . $btc . "','" . $btc . "')");
                        if ($insert) {
                            $new = 1;
                            $update = $this->sql_query("UPDATE $this->transactions SET `ref` ='" . $new . "' WHERE `transid`= '" . $transId . "' ");
                            if (!$update) {
                                return $status = false;
                            }
                        }
                        return $status = false;
                    }
                }
            }
            $status ? $response = 'Ref Interest Added Thirty' : $response = 'Unsuccessful Ref Thirty';

            return $response;
        }
    }


    public function withdrawInt($amount, $wallet, $address, $transId, $session)
    {
        $oldAmount = $this->getTransaction($transId, 'interest');
        if ($amount > $oldAmount) {
            return "You can not withdraw more then the interest";
        }
        $id = "Wt" . $this->TransId();
        $name = $this->getUserDetailsEmail($session, 'name');
        $type = 2;
        $status = 'Pending';
        $date = $this->getDateTime();
        $duration = 0;
        $interest = 0;
        $planOld = $this->getTransaction($transId, 'plan');
        $plan = $this->getPlan($planOld, 'name');
        $ref = 0;

        $insert = $this->sql_query("INSERT INTO $this->transactions VALUES(null,'" . $id . "','" . $session . "','" . $type . "','" . $amount . "','" . $status . "','" . $date . "','" . $date . "','" . $duration . "','" . $interest . "','" . $plan . "','" . $ref . "','" . $address . "','" . $wallet . "')");
        if ($insert) {
            $newAmount = $oldAmount - $amount;
            $update = $this->sql_query("UPDATE $this->transactions  SET `interest`='" . $newAmount . "' WHERE `transid`='" . $transId . "' ");
            if ($update) {
                $to  = $session;
                $d = date('Y');
                $subject = "Interest Withdrawal  Request submitted successfully";
                $message = '
                      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Capitals Investment " /></h6>
    <div style="font-size: 14px;">
        <h1 style="color: #0095eb"> Hi ' . $name . ' </h1>
        <p>
            Your Interest withdrawal request of <span style="color: #0095eb"> $' . $amount . ' </span> has successfully been submitted. You will recieve the money in a short while</p>
        <p> Charges: <span style="color: #0095eb"> $0. <br> <br>
                You will get: <span style="color: #0095eb"> $' . $amount . '</span>. <br> <br>
                Transaction Number: <span style="color: #0095eb"> ' . $id . '</span>;<br>
                Your current Interest Balance: <span style="color: #0095eb"> $' . $newAmount . '</span>.
        </p>
        <p style="">Thanks Your Compliance!</p>
        <p style="color:#332E2E">Best Regard<br />
            Alpha Capital Investment Team<br />
            Email: support@alphacapitalsinvestment.com
        </p>
        <div style="background-color:#0095eb;
                float:left;
                width:80%;
                border:1px solid #0095eb;
                border-radius:0px 0px 3px 3px;
                padding-left:10% ;
                padding-right:10% ;
                padding-top:30px ;
                padding-bottom:30px ;
                font-family: \'Roboto\', sans-serif;" class="footer">
            Alpha Capitals Investment.<br>15 CASTLE STREET, THETFORD, UNITED KINGDOM, IP24 2DW<br>
            <p style="float:left;
			width:100%;
			text-align:center;
            background-color: black;
            color: white;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;Alpha Capitals Investment <?php print ' . $d . '; ?>.All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: Alpha Capitals Investment <support@alphacapitalsinvestment.com>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return 1;
                } else {
                    return  'Internal error. Mail fail to send';
                }
                return 1;
            } else {
                return "System error: Please contact admin";
            }
        } else {
            return "System error: Please contact admin";
        }
    }
    public function withdrawCap($amount, $wallet, $address, $transId, $session)
    {
        $oldAmount = $this->getTransaction($transId, 'amount');
        if ($amount > $oldAmount) {
            return "You can not withdraw more then the Capital";
        }
        $id = "Wt" . $this->TransId();
        $type = 3;
        $status = 'Pending';
        $name = $this->getUserDetailsEmail($session, 'name');
        $date = $this->getDateTime();
        $duration = 0;
        $interest = 0;
        $planOld = $this->getTransaction($transId, 'plan');
        $plan = $this->getPlan($planOld, 'name');
        $ref = 0;

        $insert = $this->sql_query("INSERT INTO $this->transactions VALUES(null,'" . $id . "','" . $session . "','" . $type . "','" . $amount . "','" . $status . "','" . $date . "','" . $date . "','" . $duration . "','" . $interest . "','" . $plan . "','" . $ref . "','" . $address . "','" . $wallet . "')");
        if ($insert) {
            $newAmount = $oldAmount - $amount;
            $update = $this->sql_query("UPDATE $this->transactions  SET `amount`='" . $newAmount . "' WHERE `transid`='" . $transId . "' ");
            if ($update) {
                $d  = date('Y');
                $to = $session;
                $subject = "Vapital Withdrawal  Request submitted successfully";
                $message = '
                       
                      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Capitals Investment " /></h6>
    <div style="font-size: 14px;">
        <h1 style="color: #0095eb"> Hi ' . $name . ' </h1>
        <p>
            Your Capital withdrawal request of <span style="color: #0095eb"> $' . $amount . ' </span> has successfully been submitted. You will recieve the money in a short while</p>
        <p> Charges: <span style="color: #0095eb"> $0. <br> <br>
                You will get: <span style="color: #0095eb"> $' . $amount . '</span>. <br> <br>
                Transaction Number: <span style="color: #0095eb"> ' . $id . '</span>;<br>
                Your current Capital Balance: <span style="color: #0095eb"> $' . $newAmount . '</span>.
        </p>
        <p style="">Thanks Your Compliance!</p>
        <p style="color:#332E2E">Best Regard<br />
            Alpha Capital Investment Team<br />
            Email: support@alphacapitalsinvestment.com
        </p>
        <div style="background-color:#0095eb;
                float:left;
                width:80%;
                border:1px solid #0095eb;
                border-radius:0px 0px 3px 3px;
                padding-left:10% ;
                padding-right:10% ;
                padding-top:30px ;
                padding-bottom:30px ;
                font-family: \'Roboto\', sans-serif;" class="footer">
            Alpha Capitals Investment.<br>15 CASTLE STREET, THETFORD, UNITED KINGDOM, IP24 2DW<br>
            <p style="float:left;
			width:100%;
			text-align:center;
            background-color: black;
            color: white;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;Alpha Capitals Investment <?php print ' . $d . '; ?>.All Rights Reserved.</p>
        </div>
    </div>
</body>
</html>';
                $header = "MIME-Version: 1.0" . "\r\n";
                $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $header .= 'From: Alpha Capitals Investment <support@alphacapitalsinvestment.com>' . "\r\n";
                $retval = @mail($to, $subject, $message, $header);
                if ($retval = true) {
                    return 1;
                } else {
                    return  'Internal error. Mail fail to send';
                }
                return 1;
            } else {
                return "System error: Please contact admin";
            }
        } else {
            return "System error: Please contact admin";
        }
    }

    ///admin

    public function registeradmin($fname, $email, $pass, $cpass)
    {
        $hashedPassword = $this->hashPass($pass);
        $same_pass = $this->validatePassword($pass, $cpass);
        //check if the email is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //check if the email exists already

            //proceed to check if the passwords id similar
            if ($same_pass == 1) {
                //check the correct length of the password
                if ((strlen($pass) < 8) || (strlen($pass) > 36)) {
                    return ("PASSWORD MUST BE BETWEEN 8-36 CHARACTERS");
                } else {
                    //insert the values into the database
                    $insert = $this->sql_query("INSERT INTO $this->admin VALUES(null,'" . $fname . "','" . $email . "','" . $hashedPassword . "')");
                    if ($insert) {
                        header("location:login.php");
                    } else {
                        return ("UNEXPECTED ERROR: REGISTRATION FAILED!!!");
                    }
                }
            } else {
                return ("PASSWORD DOES NOT MATCH!!!!!");
            }
        } else {
            return ("EMAIL IS INVALID!!!!!");
        }
    }

    public function loginadmin($uname, $pass)
    {
        $hashedP = $this->hashPass($pass);
        $query = $this->sql_query("SELECT * FROM $this->admin WHERE `email` = '" . $uname . "' ");
        $row = mysqli_fetch_assoc($query);
        if (mysqli_num_rows($query) > 0) {
            if ($hashedP == password_verify($pass, $row['password'])) {
                setcookie("admin_id", $row['email'], time() + 129000, "/");
                header("location:index.php");
            } else {
                return ("INCORRECT USERNAME/PASSWORD COMBINATION");
            }
        } else {
            return ("INCORRECT USERNAME/PASSWORD COMBINATION");
        }
    }

    public function setAdminLoggedin()
    {
        if (isset($_COOKIE['admin_id']) && !empty($_COOKIE['admin_id'])) {
            $_SESSION['logged_admin'] = $_COOKIE['admin_id'];
        } else {
            if (isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged'])) {
                $_SESSION['logged_admin'] = $_SESSION['admin_logged'];
            }
        }
    }
    public function CheckLoggedinAD($page)
    {
        if (isset($_SESSION['logged_admin']) && !empty($_SESSION['logged_admin'])) {
            //his means that the admin is already logged in
        } else {
            header("location:" . $page);
        }
    }

    public function getAdminData($value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->admin WHERE `email`='" . $_SESSION['logged_admin'] . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }
    public function UpdateADPassword($oldpass, $pass, $cpass)
    {
        $check = $this->sql_query("SELECT * FROM $this->admin WHERE `email`='" . $_SESSION['logged_admin'] . "'");
        $row = mysqli_fetch_assoc($check);
        $hashP = $this->hashPass($oldpass);
        if ($hashP == password_verify($oldpass, $row['password'])) {
            //oldpassword correct
            $checkpass = $this->validatePassword($pass, $cpass);
            if ($checkpass == 1) {
                if (strlen($pass) < 8 || (strlen($pass)) > 36) {
                    return ("PASSWORD MUST BE BETWEEN 8-36 CHARACTERS!!!");
                } else {
                    $hashnewpass = $this->hashPass($pass);
                    $update = $this->sql_query("UPDATE $this->admin SET `password`='" . $hashnewpass . "' WHERE `email`='" . $_SESSION['logged_admin'] . "'");
                    if ($update) {
                        return 1;
                    } else {
                        return ("PASSWORD UPDATE FAILED!!");
                    }
                }
            } else {
                return ("PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH!!");
            }
        } else {
            return ("OLD PASSWORD IS INCORRECT!!");
        }
    }

    public function updateADTrans($id, $startDate, $dueDate, $duration)
    {
        $update = $this->sql_query("UPDATE $this->transactions SET `date`='" . $startDate . "',`ddate`='" . $dueDate . "',`duration`='" . $duration . "' WHERE `transid`='" . $id . "' ");
        if ($update) {
            $msg = 'Investment Updated';
            header("location: invest.php?msg=$msg");
        } else {
            return "System error: please contact admin";
        }
    }
    public function editadminProfile($fname, $email)
    {
        $update = $this->sql_query("UPDATE $this->admin SET `name`= '" . $fname . "',`email`='" . $email . "' WHERE `email`='" . $_SESSION['logged_admin'] . "' ");
        if ($update) {
            return ("PROFILE UPDATED!!!!");
        } else {
            return ("PROFILE UPDATE FAILED !!!!");
        }
    }

    //update admin password by loggedin session
    public function editadminPass($oldpass, $pass, $cpass)
    {
        $check = $this->sql_query("SELECT * FROM $this->admin WHERE `email`='" . $_SESSION['logged_admin'] . "'");
        $row = mysqli_fetch_assoc($check);
        $hashP = $this->hashPass($oldpass);
        if ($hashP == password_verify($oldpass, $row['password'])) {
            //oldpassword correct
            $checkpass = $this->validatePassword($pass, $cpass);
            if ($checkpass == 1) {
                if (strlen($pass) < 8 || (strlen($pass)) > 36) {
                    return ("PASSWORD MUST BE BETWEEN 8-36 CHARACTERS!!!");
                } else {
                    $hashnewpass = $this->hashPass($pass);
                    $update = $this->sql_query("UPDATE $this->admin SET `password`='" . $hashnewpass . "' WHERE `email`='" . $_SESSION['logged_admin'] . "'");
                    if ($update) {
                        return 1;
                    } else {
                        return ("PASSWORD UPDATE FAILED!!");
                    }
                }
            } else {
                return ("PASSWORD AND CONFIRM PASSWORD DOES NOT MATCH!!");
            }
        } else {
            return ("OLD PASSWORD IS INCORRECT!!");
        }
    }

    public function addWallet($name, $wallet)
    {
        $sql = $this->sql_query("INSERT INTO $this->wallets VALUES(null,'" . $name . "','" . $wallet . "')");
        if ($sql) {
            return 1;
        } else {
            return "Fialed to Insert";
        }
    }
    public function deleteWallet($delid)
    {
        $sql = $this->sql_query("DELETE FROM $this->wallets WHERE `id` ='" . $delid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }

    public function getWalletData($value, $id)
    {
        $sql = $this->sql_query("SELECT * FROM $this->wallets  WHERE `id`='" . $id . "'  ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }
    public function updateWallet($ubtc, $name, $id)
    {
        $sql = $this->sql_query("UPDATE $this->wallets SET `address`='" . $ubtc . "' , `name`='" . $name . "' WHERE `id` ='" . $id . "'");
        if ($sql) {
            return ("WALLET UPDATED");
        } else {
            return ("FAILED TO UPDATE WALLET");
        }
    }
    public function deleteUser($delid)
    {
        $sql = $this->sql_query("DELETE FROM $this->user WHERE `id`='" . $delid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }
    public function lockUser($lockid)
    {
        $sql = $this->sql_query("UPDATE $this->user SET `status`='BLOCK' WHERE `id`='" . $lockid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }
    public function unlockUser($unlockid)
    {
        $sql = $this->sql_query("UPDATE $this->user SET `status`='ACTIVE' WHERE `id`='" . $unlockid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }

    public function TransUpdate($sdate, $ddate, $tradeid, $duration)
    {
        if (!$duration) {
            $duration = 0;
        }
        $get = $this->sql_query("UPDATE $this->transactions SET `date`='" . $sdate . "',`ddate`='" . $ddate . "',`duration`='" . $duration . "'  WHERE `transid`='" . $tradeid . "' ");
        if ($get) {
            return 1;
        } else {
            return "Unable to Update";
        }
    }

    public function declineid($declineid)
    {

        $sql = $this->sql_query("UPDATE $this->transactions SET `status`='Declined' WHERE `transid`='" . $declineid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }
    public function pendingid($pendingid)
    {

        $sql = $this->sql_query("UPDATE $this->transactions SET `status`='Pending' WHERE `transid`='" . $pendingid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }
    public function confirmid($confirmid)
    {
        $query = $this->sql_query("SELECT * FROM $this->transactions WHERE `transid`='" . $confirmid . "' ");
        $row = mysqli_fetch_assoc($query);
        $date = $this->getDateTime();
        $plan = $row['plan'];
        $amt = $row['amount'];
        $email = $row['email'];
        $name = $this->getUserDetailsEmail($email, 'name');
        $planEnd = $this->getPlan($plan, 'days');
        $dueDate = date("Y-m-d", strtotime($date . ' + ' . $planEnd . ' days'));
        $sql = $this->sql_query("UPDATE $this->transactions SET `status`='done',`date`='" . $date . "',`ddate`='" . $dueDate . "' WHERE `transid`='" . $confirmid . "'");
        if ($sql) {
            $to  = $email;
            $d = date('Y');
            $subject = "Your Investment have been Approved";
            $message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Capital Investment " /></h6>
    <div style="font-size: 14px;">
        <h1 style="color: #0095eb"> Hi ' . $name . ' </h1>
        <p style="font-size:18px;
            color:black;"> <br>
            Your Investment of <span style="color: #0095eb"> $' . $amt . '</span> has successfully been Approved.<br> <br>

            Details of your Investment: <br> <br>

            Amount: <span style="color: #0095eb"> $' . $amt . '</span>. <br> <br>
            Charge: $0. <br> <br>
            Conversion Rate: 1USD = $1. <br> <br>
            Start Date: ' . $date . ' <br> <br>
            Due Date: ' . $dueDate . ' <br> <br>
            Transaction Number:<span style="color: #0095eb"> ' . $confirmid . '</span>

        </p>
        <p style="font-size:18px;
        color:black;"> <br> We wish to inform you of our referral packages and hope you will take advantage of the extra bonuses as you share the word out about our trusted and indelible platform </p>
        <p style="">Thanks Your Compliance!</p>
        <p style="color:#332E2E">Best Regard<br />
            Alpha Capital Investment Team<br />
            Email: support@alphacapitalsinvestment.com
        </p>
        <div style="background-color:#0095eb;
                float:left;
                width:80%;
                border:1px solid #0095eb;
                border-radius:0px 0px 3px 3px;
                padding-left:10% ;
                padding-right:10% ;
                padding-top:30px ;
                padding-bottom:30px ;
                font-family: \'Roboto\', sans-serif;" class="footer">
            Alpha Capitals Investment.<br>15 CASTLE STREET, THETFORD, UNITED KINGDOM, IP24 2DW<br>
            <p style="float:left;
			width:100%;
			text-align:center;
            background-color: black;
            color: white;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;Alpha Capitals Investment <?php print ' . $d . '; ?>.All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>
';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: Alpha Capitals Investment <support@alphacapitalsinvestment.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);

            if ($retval) {
                return (1);
            } else {
                return (0);
            }
            return (1);
        } else {
            return (0);
        }
    }

    public function deleteTran($delid)
    {
        $sql = $this->sql_query("DELETE FROM $this->transactions WHERE `transid`='" . $delid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }

    public function UpdateWith($sdate, $ddate, $tradeid)
    {
        $get = $this->sql_query("UPDATE $this->transactions SET `date`='" . $sdate . "',`ddate`='" . $ddate . "' WHERE `transid`='" . $tradeid . "' ");
        if ($get) {
            return 1;
        } else {
            return "Unable to Update";
        }
    }
    public function confirmidWith($confirmid)
    {
        $query = $this->sql_query("SELECT * FROM $this->transactions WHERE `transid`='" . $confirmid . "' ");
        $row = mysqli_fetch_assoc($query);
        $email = $row['email'];
        $amt = $row['amount'];
        $name = $this->getUserDetailsEmail($email, 'name');

        $date = $this->getDateTime();
        $sql = $this->sql_query("UPDATE $this->transactions SET `status`='done',`ddate`='" . $date . "' WHERE `transid`='" . $confirmid . "'");
        if ($sql) {
            $to  = $email;
            $d = date('Y');
            $subject = "Your Withdrawal have been Approved";
            $message = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Capitals Investment " /></h6>
    <div style="font-size: 14px;">
        <h1 style="color: #0095eb"> Hi ' . $name . ' </h1>
        <p style="font-size:18px;
            color:black;"> <br>
            Your Withdrawal of <span style="color: #0095eb"> $' . $amt . '</span> has successfully been Approved.<br> <br>

            Details of your Withdrawal: <br> <br>

            Amount: <span style="color: #0095eb"> $' . $amt . '</span>. <br> <br>
            Charge: $0. <br> <br>
            Transaction Number:<span style="color: #0095eb"> ' . $confirmid . '</span>

        </p>
        <p style="font-size:18px;
        color:black;"> <br> We wish to inform you of our referral packages and hope you will take advantage of the extra bonuses as you share the word out about our trusted and indelible platform </p>

        <p style="">Thanks Your Compliance!</p>
        <p style="color:#332E2E">Best Regard<br />
            Alpha Capital Investment Team<br />
            Email: support@alphacapitalsinvestment.com
        </p>
        <div style="background-color:#0095eb;
                float:left;
                width:80%;
                border:1px solid #0095eb;
                border-radius:0px 0px 3px 3px;
                padding-left:10% ;
                padding-right:10% ;
                padding-top:30px ;
                padding-bottom:30px ;
                font-family: \'Roboto\', sans-serif;" class="footer">
            Alpha Capitals Investment.<br>15 CASTLE STREET, THETFORD, UNITED KINGDOM, IP24 2DW<br>
            <p style="float:left;
			width:100%;
			text-align:center;
            background-color: black;
            color: white;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;Alpha Capitals Investment <?php print ' . $d . '; ?>.All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>
';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: Alpha Capital Investment <support@alphacapitalsinvestment.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);

            if ($retval) {
                return (1);
            } else {
                return (0);
            }
            return (1);
        } else {
            return (0);
        }
    }

    public function investAD($userId, $planId, $amount)
    {
        $transId = 'Iv' . $this->TransId();
        $referral = $this->getUserDetailsEmail($userId, 'referral');
        $ref = 0;
        $type = 1;
        $status = 'Pending';
        $duration = 0;
        $interest = 0;
        $altcoin = "non";
        $datetime = $this->getDateTime();
        $min = $this->getPlan($planId, 'min');
        $max = $this->getPlan($planId, 'max');
        if (($amount < $min) || ($amount > $max)) {
            return "Amount Must Be Between Package Min-Max Range";
        }

        $insert = $this->sql_query("INSERT INTO $this->transactions VALUES(null,'" . $transId . "','" . $userId . "','" . $type . "','" . $amount . "','" . $status . "','" . $datetime . "','" . $datetime . "','" . $duration . "','" . $interest . "','" . $planId . "','" . $referral . "','" . $ref . "','" . $altcoin . "')");
        if ($insert) {
            header("location: funding.php");
        } else {
            return  'Internal error. Mail fail to send';
        }
    }

    //get admin allet by id
    public function getRef($id, $value)
    {
        $sql = $this->sql_query("SELECT * FROM $this->referral WHERE `refid`='" . $id . "' ");
        $row = mysqli_fetch_assoc($sql);
        return ($row[$value]);
    }

    public function withdrawRef($refId, $amount, $walletId, $address)
    {
        $status = 'Pending';
        $update = $this->sql_query("UPDATE $this->referral SET `status`='" . $status . "',`wallet`='" . $walletId . "',`address`='" . $address . "' WHERE `refid`='" . $refId . "' ");
        if ($update) {
            $msg = 'Your withdrawal ticket have been created, your account will be funded within 3 hours';
            header("location: referral.php?msg=" . $msg);
        } else {
            return "Unable to withdraw,System error: please contact admin";
        }
    }

    public function support($fname, $lname, $email, $subject, $message)
    {
        $name = $fname . ' ' . $lname;
        $date = $this->getDateTime();
        $insert = $this->sql_query("INSERT INTO $this->support VALUES(null,'" . $name . "','" . $email . "','" . $subject . "','" . $message . "','" . $date . "')");
        if ($insert) {
            return (1);
        } else {
            return ("SYSTEM ERROR: MESSAGE WASN'T SENT");
        }
    }
    public function deleteSupport($delid)
    {
        $sql = $this->sql_query("DELETE FROM $this->support WHERE `id`='" . $delid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }

    public function addeleteref($delid)
    {
        $sql = $this->sql_query("DELETE FROM $this->referral WHERE `id`='" . $delid . "'");
        if ($sql) {
            return (1);
        } else {
            return (0);
        }
    }

    public function adconfirmref($confirmid)
    {
        $loop = $this->sql_query("SELECT * FROM $this->referral  WHERE `id`='" . $confirmid . "'");
        $row = mysqli_fetch_assoc($loop);
        $amt = $row['refamount'];
        $email = $row['email'];
        $refid = $row['refid'];
        $name = $this->getUserDetailsEmail($email, 'name');
        $sql = $this->sql_query("UPDATE $this->referral SET `status`='Withdrawn' WHERE `id`='" . $confirmid . "'");
        if ($sql) {
            $to  = $email;
            $d = date('Y');
            $subject = "Your Referral Withdrawal have been Approved";
            $message = '
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Capitals Investment " /></h6>
    <div style="font-size: 14px;">
        <h1 style="color: #0095eb"> Hi ' . $name . ' </h1>
        <p style="font-size:18px;
            color:black;"> <br>
            Your Referral Withdrawal of <span style="color: #0095eb"> $' . $amt . '</span> has successfully been Approved.<br> <br>

            Details of your Withdrawal: <br> <br>

            Amount: <span style="color: #0095eb"> $' . $amt . '</span>. <br> <br>
            Charge: $0. <br> <br>
            Transaction Number:<span style="color: #0095eb"> ' . $refid . '</span>

        </p>
        <p style="font-size:18px;
        color:black;"> <br> We wish to inform you of our referral packages and hope you will take advantage of the extra bonuses as you share the word out about our trusted and indelible platform </p>

        <p style="">Thanks Your Compliance!</p>
        <p style="color:#332E2E">Best Regard<br />
            Alpha Capital Investment Team<br />
            Email: support@alphacapitalsinvestment.com
        </p>
        <div style="background-color:#0095eb;
                float:left;
                width:80%;
                border:1px solid #0095eb;
                border-radius:0px 0px 3px 3px;
                padding-left:10% ;
                padding-right:10% ;
                padding-top:30px ;
                padding-bottom:30px ;
                font-family: \'Roboto\', sans-serif;" class="footer">
            Alpha Capitals Investment.<br>15 CASTLE STREET, THETFORD, UNITED KINGDOM, IP24 2DW<br>
            <p style="float:left;
			width:100%;
			text-align:center;
            background-color: black;
            color: white;
			font-family: \'Roboto Condensed\', sans-serif;
			">&copy;Alpha Capitals Investment <?php print ' . $d . '; ?>.All Rights Reserved.</p>
        </div>
    </div>
</body>

</html>
';
            $header = "MIME-Version: 1.0" . "\r\n";
            $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $header .= 'From: Alpha Capital Investment <support@alphacapitalsinvestment.com>' . "\r\n";
            $retval = @mail($to, $subject, $message, $header);

            if ($retval) {
                return (1);
            } else {
                return (0);
            }
            return 1;
        } else {
            return 0;
        }
    }
    //forgot password

    public function resetPasswordEmailLink($email, $name, $user_code)
    {
        $to  = $email;
        $d = date('Y');
        $subject = "Password Reset Link on Alpha Capital Investment";
        $message = '
                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml">
                        <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        </head>
                        <body>
            <h6 align="center"><img src="https://www.alphacapitalsinvestment.com/assets/logo.png" height="100px" width="200px" alt="Alpha Capitals Investment " /></h6>
            <div style="font-size: 14px;">
            <p>Hi ' . $name . ' Welcome t oAlpha Capitals Investment reset Password Center, Follow the link below to rest your password< br />
            <a href="https://www.alphacapitalsinvestment.com/password/forgotpass.php?code=' . $user_code . '"> Click Here To Reset Password</a> <br />
            Cannot follow link? Copy Link Below. <br /> https://www.alphacapitalsinvestment.com/password/forgotpass.php?code=' . $user_code . ' </p>
            <p style="">Thanks Your Compliance!</p>
            <p style="color:#0095eb">Best Regard<br />
            Alpha Capital Investment Team<br />
            </p>
        
        <div style="background-color:#0095eb;
                float:left;
                width:80%;
                border:1px solid rgb(253, 150, 26);
                border-radius:0px 0px 3px 3px;
                padding-left:10% ;
                padding-right:10% ;
                padding-top:30px ;
                padding-bottom:30px ;
                font-family: \'Roboto\', sans-serif;" class="footer">
        Alpha Capitals Investment.<br>
       CAMBERWELL 3124 Victoria Australia.<br>
        </div>
        <p style="float:left;
        width:100%;
        text-align:center;
        font-family: \'Roboto Condensed\', sans-serif;
        ">&copy;Alpha Capitals Investment <?php print ' . $d . ';?>. All Rights Reserved.</p>
        </div>
        </body>
        </html>';
        $header = "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $header .= 'From: Alpha Capitals Investment <support@alphacapitalsinvestment.com>' . "\r\n";
        $retval = @mail($to, $subject, $message, $header);
        if ($retval = true) {
            return 1;
        } else {
            return  'Internal error. Mail fail to send,contact Admin';
        }
    }
    public function passwordReset($email)
    {
        $query = $this->sql_query("SELECT * FROM $this->user WHERE `email`='" . $email . "'");
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $name = $row['name'];
            $date = $this->getDateTime();
            $veri = "dcvdhvchdv" . rand(0000000000, 999999999999) . "ncdbvcjhgdsjhcsdjhgui";
            $insert = $this->sql_query("INSERT INTO $this->verify VALUES(null,'" . $email . "','" . $veri . "','" . $date . "')");
            if ($insert) {
                $reset =  $this->resetPasswordEmailLink($email, $name, $veri);
                return ($reset);
            } else {
                return ("System error: contact admin");
            }
        } else {
            return ("EMAIL DOES NOT EXIST IN OUR DATABASE");
        }
    }
    public function SetNewPass($pass, $cpass, $usercode)
    {
        $query = $this->sql_query("SELECT * FROM $this->verify WHERE `token`='" . $usercode . "' ");
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            $email = $row['email'];
            $id = $row['id'];
            $hasp = $this->hashpass($pass);
            $undefined = rand(000, 5555);
            $checkp = $this->validatePassword($pass, $cpass);
            if ($checkp == 1) {
                $update =  $this->sql_query("UPDATE $this->user SET `password`='" . $hasp . "' WHERE `email`='" . $email . "' ");
                if ($update) {
                    $update = $this->sql_query("UPDATE $this->verify SET `token`= '" . $undefined . "' WHERE `id`='" . $id . "' ");
                    return (1);
                } else {
                    return ("System down: Password Change Failed");
                }
            } else {
                return ("Password And Confirm Password Must Match");
            }
        } else {
            return "Reset token have expired/invalid";
        }
    }
}
$call = new controller();
$call->setUserloggedIn();
$call->setAdminLoggedin();
