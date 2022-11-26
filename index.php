<?php
require('controller/controller.php');
$title = "HomePage";
require("head.php");
require("header.php");
if (isset($_POST['submit'])) {
    $fname = $_POST['name'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $pass = $_POST['password'];
    $cpass = $_POST['password_confirmation'];
    $ref = $_POST['referral'];

    if (!empty($fname) && !empty($username) && !empty($phone) && !empty($email) && !empty($country) && !empty($pass) && !empty($cpass)) {
        $msg = $call->userRegister($fname, $username, $phone, $email, $country, $pass, $cpass, $ref);
    } else {
        $msg = "Please Fill all fields";
    }
}
?>
<div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators visible-lg visible-md">
        <li data-target="#main-slide" data-slide-to="0" class="active"></li>
        <li data-target="#main-slide" data-slide-to="1"></li>
        <li data-target="#main-slide" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="item active bg-parallax item-1">
            <div class="slider-content">
                <div class="container">
                    <div class="slider-text">
                        <h3 class="slide-title"><span>Secure</span> and <span>Easy Way</span><br /> To Earn</h3>
                        <p>
                            <a href="about.php" class="slider btn btn-primary">About Alpha Capital Investment</a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item bg-parallax item-2">
            <div class="slider-content">
                <div class="col-md-12">
                    <div class="container">
                        <div class="slider-text">
                            <h3 class="slide-title"><span>Forex</span> Brokerage <br />You can <span>Trust</span> </h3>
                            <p>
                                <a href="plans.php" class="slider btn btn-primary">Our plans</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="index.php#main-slide" data-slide="prev">
        <span><i class="fa fa-angle-left"></i></span>
    </a>
    <a class="right carousel-control" href="index.php#main-slide" data-slide="next">
        <span><i class="fa fa-angle-right"></i></span>
    </a>
</div>
<section class="features">
    <div class="container">
        <div class="row features-row">
            <div class="feature-box col-md-4 col-sm-12">
                <span class="feature-icon">
                    <h1 class="font-70" style="color: #0095eb;">1.</h1>
                </span>
                <div class="feature-box-content">
                    <h2>Sign up</h2>
                    <p>We’ll guide you through the registration process, to help you get started.</p>
                </div>
            </div>
            <div class="feature-box two col-md-4 col-sm-12">
                <span class="feature-icon">
                    <h1 class="font-70" style="color: #0095eb;">2.</h1>
                </span>
                <div class="feature-box-content">
                    <h2>Invest</h2>
                    <p>Buy your preferred and make deposit for the investment plan of your choice.</p>
                </div>
            </div>
            <div class="feature-box three col-md-4 col-sm-12">
                <span class="feature-icon">
                    <h1 class="font-70" style="color: #0095eb;">3.</h1>
                </span>
                <div class="feature-box-content">
                    <h2>Start Earning</h2>
                    <p>Make your withdrawals daily. See how easy it is to earn with Alpha Capital Investment!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-us">
    <div class="container">
        <div class="row m-t-50">
            <div class="col-md-8 col-md-offset-2">
                <?php if (isset($msg) && !empty($msg)) {
                    if ($msg == 1) { ?>
                        <p class="btn btn-success"><?php echo 'Verification Email have been successfully sent to you'; ?></p>
                    <?php } else { ?>
                        <p class="action-btn"><a class="btn btn-danger"><?php echo $msg; ?></a></p>
                    <?php }
                } else { ?>
                    <p class="action-btn"><a class="btn btn-primary">Register Now</a></p>
                <?php }; ?>
                <form class="form-signup" method="POST">
                    <div class="form-group">
                        <div class="form-field">
                            <input name="name" id="fullname" type="text" placeholder="Your Fullname *" value="" class="form-control required" aria-required="true" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-field">
                            <input name="username" type="text" placeholder="Your Username *" value="" class="form-control required" aria-required="true" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-field">
                                    <input type="email" class="form-control required" name="email" value="" id="email" required placeholder="Email Address    *">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-field">
                                    <input type="text" class="form-control required" name="phone" value="" id="phone" required placeholder="Phone number *">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-field">
                            <select name="country" autocomplete="country" class="form-control required" required style="width:100% !important">
                                <option value="">Select a country…</option>
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="BT">Bhutan</option>
                                <option value="Bhutan">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam ">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="CA">Canada</option>
                                <option value="Canada">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos Islands">Cocos Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote DIvoire">Cote D&#039;Ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia </option>
                                <option value="Ethiopia">Ethiopia </option>
                                <option value="Falkland">Falkland Islands </option>
                                <option value="Faroe Islands">Faroe Islands </option>
                                <option value="Fiji">Fiji </option>
                                <option value="Finland">Finland </option>
                                <option value="France">France </option>
                                <option value="French Guiana">French Guiana </option>
                                <option value="French Polynesia">French Polynesia </option>
                                <option value="French Southern Territories">French Southern Territories </option>
                                <option value="Gabon">Gabon </option>
                                <option value="Gambia">Gambia </option>
                                <option value="Georgia">Georgia </option>
                                <option value="Germany">Germany </option>
                                <option value="Ghana">Ghana </option>
                                <option value="Gibraltar">Gibraltar </option>
                                <option value="Greece">Greece </option>
                                <option value="Greenland">Greenland </option>
                                <option value="Grenada">Grenada </option>
                                <option value="Guadeloupe">Guadeloupe </option>
                                <option value="Guam">Guam </option>
                                <option value="Guatemala">Guatemala </option>
                                <option value="Guinea">Guinea </option>
                                <option value="Guinea-Bissau">Guinea-Bissau </option>
                                <option value="Guyana">Guyana </option>
                                <option value="Haiti">Haiti </option>
                                <option value="Heard Island">Heard Island and Mcdonald Islands </option>
                                <option value="Vatican City State">Holy See Vatican City State </option>
                                <option value="Honduras">Honduras </option>
                                <option value="Hong Kong">Hong Kong </option>
                                <option value="Hungary">Hungary </option>
                                <option value="Iceland">Iceland </option>
                                <option value="India">India </option>
                                <option value="Indonesia">Indonesia </option>
                                <option value="Iran">Iran, Islamic Republic of </option>
                                <option value="Iraq">Iraq </option>
                                <option value="Ireland">Ireland </option>
                                <option value="Israel">Israel </option>
                                <option value="Italy">Italy </option>
                                <option value="Jamaica">Jamaica </option>
                                <option value="Japan">Japan</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People">Korea, Democratic People&#039;s Republic of</option>
                                <option value="Korea, Republic ">Korea, Republic</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People">Lao People&#039;s Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia">Macedonia, the Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia">Micronesia, Federated States of</option>
                                <option value="Moldova">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon ">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia and Montenegro</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option value="South Africa">South Africa</option>
                                <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan, Province of China</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania">Tanzania </option>
                                <option value="Thailand">Thailand </option>
                                <option value="Timor-Leste">Timor-Leste </option>
                                <option value="Togo">Togo </option>
                                <option value="Tokelau">Tokelau </option>
                                <option value="Tonga">Tonga </option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago </option>
                                <option value="Tunisia">Tunisia </option>
                                <option value="Turkey">Turkey </option>
                                <option value="Turkmenistan">Turkmenistan </option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands </option>
                                <option value="Tuvalu">Tuvalu </option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="VietNam">VietNam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.s">Virgin Islands, U.s.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara ">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-field">
                                    <input name="password" type="password" placeholder="Enter Password *" class="form-control required" aria-required="true" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-field">
                                    <input name="password_confirmation" type="password" placeholder="Confirm Password *" class="form-control required" aria-required="true" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="referral" placeholder="Referee (Optional)" type="text" class="form-control required" value="" />
                    </div>
                    <div class="form-group">
                        <div class="form-field">
                            <label style="color:#000">
                                <input type="checkbox" name="check" value="check" style="height: auto; width: auto" />
                                I agree to the <a href="terms.php">Terms & Conditions</a> of service.
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="submit" value="submit" type="submit">create account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="about-us">
    <div class="container">
        <div class="row text-center">
            <h2 class="title-head">About <span>Us</span></h2>
            <div class="title-head-subtitle">
                <p>The best Trading investment brokerage platform.</p>
            </div>
        </div>
        <div class="row about-content">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h3 class="title-about">WE ARE Alpha Capital Investment</h3>
                <p class="about-text">Alpha capital investment is a well experienced mining company, with over 6 years of experience. It was registered and licensed in London on 24th November, 2016, and since then they've been providing mining services for their investors.</p>
                <p class="about-text">
                    They are one of the best leading hashpower providers in the world, offering cryptocurrency mining capacities in every range - for newcomers, interested home miners, as well as large scale investors. Our mission is to make acquiring cryptocurrencies easy and fast for everyone.
                    They provide a multi-algorithm, multi-coin cloud mining service using the latest technology. The ultimate goal is to make cryptocurrency mining an easy, smart and rewarding experience for all.
                </p>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#menu1">Our Advantages</a></li>
                    <li><a data-toggle="tab" href="#menu2">Our Mission</a></li>
                    <li><a data-toggle="tab" href="#menu3">Our Guarantees</a></li>
                </ul>
                <div class="tab-content">
                    <div id="menu1" class="tab-pane fade in active">
                        <p>Designed to provide exposure to drivers of investment returns beyond market cap, with different risks. This what we call the "Alpha Capital Investment Portfolio Strategy".</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <p>Our mission as an official partner of Forex firms is to help you enter and better understand the world of investments and avoid any issues you may encounter as a novice.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <p>We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are extremely good in forex. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="image-block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ts-padding img-block-left">
                <div class="gap-20"></div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="strong-security" src="assets/images/icons/orange/strong-security.png" alt="strong security" />
                            </span>
                            <h3 class="feature-title">Strong Security</h3>
                            <p>Protection against DDoS attacks, <br>full data encryption</p>
                        </div>
                    </div>
                    <div class="gap-20-mobile"></div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="world-coverage" src="assets/images/icons/orange/world-coverage.png" alt="world coverage" />
                            </span>
                            <h3 class="feature-title">World Coverage</h3>
                            <p>Providing services in many countries<br> around all the globe</p>
                        </div>
                    </div>
                </div>
                <div class="gap-20"></div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="payment-options" src="assets/images/icons/orange/payment-options.png" alt="payment options" />
                            </span>
                            <h3 class="feature-title">Payment Options</h3>
                            <p>Popular methods: Visa, MasterCard, <br>bank transfer, cryptocurrency</p>
                        </div>
                    </div>
                    <div class="gap-20-mobile"></div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="mobile-app" src="assets/images/icons/orange/mobile-app.png" alt="mobile app" />
                            </span>
                            <h3 class="feature-title">Mobile App</h3>
                            <p>Trading via our Mobile App, Available<br> in Play Store & App Store</p>
                        </div>
                    </div>
                </div>
                <div class="gap-20"></div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="cost-efficiency" src="assets/images/icons/orange/cost-efficiency.png" alt="cost efficiency" />
                            </span>
                            <h3 class="feature-title">Cost efficiency</h3>
                            <p>Reasonable trading fees for takers<br> and all market makers</p>
                        </div>
                    </div>
                    <div class="gap-20-mobile"></div>
                    <div class="col-sm-6 col-md-6 col-xs-12">
                        <div class="feature text-center">
                            <span class="feature-icon">
                                <img id="high-liquidity" src="assets/images/icons/orange/high-liquidity.png" alt="high liquidity" />
                            </span>
                            <h3 class="feature-title">High Liquidity</h3>
                            <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ts-padding bg-image-1">
                <div>
                    <div class="text-center">
                        <a class="button-video mfp-youtube" href="https://www.youtube.com/watch?v=GmOzih6I1zs"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pricing">
    <div class="container">
        <div class="row text-center">
            <h2 class="title-head">investment <span>packages</span></h2>
            <div class="title-head-subtitle">
                <p>Pick a plan that best suits you, all have distinguishing benefits.</p>
            </div>
        </div>
        <div class="row pricing-tables-content">
            <div class="pricing-container">

                <ul class="pricing-list bounce-invert">
                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <ul class="pricing-wrapper">
                            <li data-type="buy" class="is-visible">
                                <header class="pricing-header">

                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-square fa-stack-2x"></i>
                                        <i class="fab fa-bitcoin fa-stack-1x fa-inverse"></i>
                                    </span>

                                    <h2>Starter Plan</h2>
                                    <div class="price">
                                        <span class="value">$200 - $1,000</span>
                                    </div>
                                    <br>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-coins m-r-20 col-blue"></i> 33.3% Daily Returns</p>
                                    <p class="text-left col-bold dotted-item"><i class="fa fa-calendar m-r-20 col-blue"></i> 3 days contract</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-headset m-r-20 col-blue"></i> 24/7 Support Included</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-briefcase m-r-20 col-blue"></i>
                                        20% Referral Bonus




                                    </p>
                                </header>
                                <footer class="pricing-footer">
                                    <a href="register.php" class="btn btn-primary">Register Now <i class="fa fa-arrow-right m-l-20"></i> </a>
                                </footer>
                            </li>
                        </ul>
                    </li>
                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <ul class="pricing-wrapper">
                            <li data-type="buy" class="is-visible">
                                <header class="pricing-header">

                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-square fa-stack-2x"></i>
                                        <i class="fab fa-bitcoin fa-stack-1x fa-inverse"></i>
                                    </span>

                                    <h2>Weekly Plan</h2>
                                    <div class="price">
                                        <span class="value">$1,000 - $4,999</span>
                                    </div>
                                    <br>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-coins m-r-20 col-blue"></i> 20% Daily Returns</p>
                                    <p class="text-left col-bold dotted-item"><i class="fa fa-calendar m-r-20 col-blue"></i> 5 days contract</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-headset m-r-20 col-blue"></i> 24/7 Support Included</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-briefcase m-r-20 col-blue"></i>

                                        20% Referral Bonus



                                    </p>
                                </header>
                                <footer class="pricing-footer">
                                    <a href="register.php" class="btn btn-primary">Register Now <i class="fa fa-arrow-right m-l-20"></i> </a>
                                </footer>
                            </li>
                        </ul>
                    </li>
                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <ul class="pricing-wrapper">
                            <li data-type="buy" class="is-visible">
                                <header class="pricing-header">

                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-square fa-stack-2x"></i>
                                        <i class="fab fa-bitcoin fa-stack-1x fa-inverse"></i>
                                    </span>

                                    <h2>Premuim Plan</h2>
                                    <div class="price">
                                        <span class="value">$5,000 - $9,999</span>
                                    </div>
                                    <br>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-coins m-r-20 col-blue"></i> 20% Daily Returns</p>
                                    <p class="text-left col-bold dotted-item"><i class="fa fa-calendar m-r-20 col-blue"></i> 5 days contract</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-headset m-r-20 col-blue"></i> 24/7 Support Included</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-briefcase m-r-20 col-blue"></i>



                                        20% Referral Bonus

                                    </p>
                                </header>
                                <footer class="pricing-footer">
                                    <a href="register.php" class="btn btn-primary">Register Now <i class="fa fa-arrow-right m-l-20"></i> </a>
                                </footer>
                            </li>
                        </ul>
                    </li>
                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <ul class="pricing-wrapper">
                            <li data-type="buy" class="is-visible">
                                <header class="pricing-header">

                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-square fa-stack-2x"></i>
                                        <i class="fab fa-bitcoin fa-stack-1x fa-inverse"></i>
                                    </span>

                                    <h2>Silver Plan</h2>
                                    <div class="price">
                                        <span class="value">$10,000 - $49,999</span>
                                    </div>
                                    <br>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-coins m-r-20 col-blue"></i> 14.29% Daily Returns</p>
                                    <p class="text-left col-bold dotted-item"><i class="fa fa-calendar m-r-20 col-blue"></i> 7 days contract</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-headset m-r-20 col-blue"></i> 24/7 Support Included</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-briefcase m-r-20 col-blue"></i>


                                        25% Referral Bonus


                                    </p>
                                </header>
                                <footer class="pricing-footer">
                                    <a href="register.php" class="btn btn-primary">Register Now <i class="fa fa-arrow-right m-l-20"></i> </a>
                                </footer>
                            </li>
                        </ul>
                    </li>
                    <li class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <ul class="pricing-wrapper">
                            <li data-type="buy" class="is-visible">
                                <header class="pricing-header">

                                    <span class="fa-stack fa-2x">
                                        <i class="fas fa-square fa-stack-2x"></i>
                                        <i class="fab fa-bitcoin fa-stack-1x fa-inverse"></i>
                                    </span>

                                    <h2>VIP</h2>
                                    <div class="price">
                                        <span class="value">$50,000 - UNLIMITED</span>
                                    </div>
                                    <br>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-coins m-r-20 col-blue"></i> 7.14% Daily Returns</p>
                                    <p class="text-left col-bold dotted-item"><i class="fa fa-calendar m-r-20 col-blue"></i> 14 days contract</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-headset m-r-20 col-blue"></i> 24/7 Support Included</p>
                                    <p class="text-left col-bold dotted-item"><i class="fas fa-briefcase m-r-20 col-blue"></i>




                                        30% Referral Bonus
                                    </p>
                                </header>
                                <footer class="pricing-footer">
                                    <a href="register.php" class="btn btn-primary">Register Now <i class="fa fa-arrow-right m-l-20"></i> </a>
                                </footer>
                            </li>
                        </ul>
                    </li>
                </ul>

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