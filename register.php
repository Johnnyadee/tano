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

<section class="banner-area">
    <div class="banner-overlay">
        <div class="banner-text text-center">
            <div class="container">
                <div class="row text-center">
                    <div class="col-xs-12">
                        <h2 class="title-head">Member <span>Register</span></h2>
                        <hr>
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
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
                                I agree to the <a href="policy.php">Terms & Conditions</a> of service.
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


<section class="call-action-all">
    <div class="call-action-all-overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="action-text">
                        <h2>Get Started Today WithAlpha Capital Investment</h2>
                        <p class="lead">Open account for free and start trading crypto assets!</p>
                    </div>
                    <p class="action-btn"><a class="btn btn-primary" href="register.php">Register Now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require("footer.php"); ?>