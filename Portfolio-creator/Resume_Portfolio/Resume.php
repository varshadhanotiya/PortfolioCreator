<?php 
 $con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die("connection failed:");
  session_start();
  // if(!isset($_SESSION['uname'])){
  //   header('Location: login.php');
  // }
  // if($_SESSION['urole']==='1'){
  //   header('Location: dashboard.php');
  // }
?>
<html>
<head>
  <title>Create Resume</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <script src="javascript/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/Resume.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body>
   <div class="container-fluid">
      
      
      <!-- Logout form --> 
      <div class="row d-none frm" id="logoutfrm">
        <div class="col-4 p-0 m-0 logdiv">
            <div class="upper-div">
              <h2>Confirm Logout</h2>
            </div>
            <div class="lower-div">
              <p>Are you sure you want to logout?</p>
              <button type="button" class="btn confirmbtn">No</button>
              <button type="button" class="btn confirmbtn">Yes</button>
            </div>
          </div>
      </div>

      <!-- Subscription card-->
      <div class="row d-none subpopup" id="subscription">

           <div class="col-12 m-4 text-center position-relative">
             <h2 class="headabt d-inline-block">Subscription Plan</h2>
             <sapn class="position-absolute planclosebtn" style="right: 21px;top: -12px; cursor:pointer"><i class="fas fa-times-circle"></i></sapn>
           </div>
           <div class="col-4 pricecard pr-0 d-none" id="free">
                   <div class="price" style="background-color: #5bc1c1;">
                        <h5>Free</h5>
                         <p>Essential Features</p>
                        <h3>$0</h3>
                    </div>    
                    <div>
                       <table  class="featlist">
                        <tbody>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Free Templates:<span class="tempnum" style="color: #4682b4;">4/8</span></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Resume Version: <span class="tempnum" style="color: #4682b4;">1</span></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-times-circle"></i></td>
                            <td>Download and Save your resume in multiple Format</td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-times-circle"></i></td>
                            <td>Removing branding on your resume</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="subbtn" style="margin-top: 2.5em;">
                      <div class="bgstyle"></div>
                      <button type="button" class="btn" disabled style="padding:.375rem 2.75rem;">Free</button>
                    </div> 
             </div>
            <div class="col-4 pricecard pr-0" id="monthly">
                    <div class="price" style="background-color: coral;">
                       <h5 class="headsub">Monthly</h5>
                         <p>Advanced Features</p>
                        <h3 class="cost d-inline-block mr-1">$7.00</h3><span class="text-light">/month</span>
                    </div>    
                    <div >
                      <table  class="featlist">
                        <tbody>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Free Templates: <span class="tempnum" style="color: #ff581b;">6/8</span></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Resume Version: <span class="tempnum" style="color: #ff581b;">2</span></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-times-circle"></i></td>
                            <td>Download and Save your resume in multiple Format</td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-times-circle"></i></td>
                            <td>Removing branding on your resume</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="subbtn">
                      <div class="bgstyle"></div>
                      <button type="button" class="btn text-light">Subscribed</button>
                    </div> 
           </div>
           <div class="col-4 pricecard pr-0" id="yearly">
                    <div class="price" style="background-color: #ee4c6b;">
                        <h5 class="headsub">Yearly</h5>
                         <p>Pro Features</p>
                        <h3 class="cost d-inline-block mr-1">$83.00</h3><span class="text-light">/year</span>
                    </div>    
                    <div>
                      <table  class="featlist">
                        <tbody>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Free Templates: <span class="tempnum" style="color: #ff0031;">8/8</span></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Resume Version: <span class="tempnum" style="color: #ff0031;">3</span></td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Download and Save your resume in multiple Format</td>
                          </tr>
                          <tr>
                            <td><i class="fas fa-check-circle"></i></td>
                            <td>Removing branding on your resume</td>
                          </tr>
                        </tbody>
                      </table>
                    </div> 
                    <div class="subbtn">
                      <div class="bgstyle"></div>
                      <button type="button" class="btn text-light">Subscribed</button>
                    </div> 
           </div>
        </div>


      <div class="row" id="manu-bar" data-aos="slide-down">
        <div class="col-3" id="menu1">
          <ul class="topBotomBordersOut circleBehind">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Template</a></li>
            <li><a href="index.php" id="dboard" class="d-none">Dashboard</a></li>
            <li><a href="index.php"class="logout">Logout</a></li>
          </ul>
        </div>
        <div class="col-7" id="menu2">
          <ul>
            <li><a href="#contactfrm">
              <i class="fas fa-id-card-alt"></i>
              <p class="m-0 p-0">Contact</p>
              <!-- <i class="fas fa-check"></i> -->
              <i class="far fa-circle"></i>
              <div class="track"></div>
              </a>
            </li>
            <li><a href="#objfrm">
              <i class="fas fa-bullseye"></i>
              <p class="m-0 p-0">Objective</p>
              <!-- <i class="fas fa-check"></i> -->
              <i class="far fa-circle"></i>
              <div class="track"></div>
            </a>
            </li>
            <li><a href="#skillfrm">
              <i class="fas fa-tools"></i> 
              <p class="m-0 p-0">Skills</p>
              <i class="far fa-circle"></i>
              <div class="track"></div>
            </a>
            </li>
            <li><a href="#edufrm">
            <!-- <i class="fas fa-book-reader"></i> -->
            <i class="fas fa-user-graduate"></i>
            <p class="m-0 p-0">Education</p>
             <!--  <i class="fas fa-check"></i> -->
             <i class="far fa-circle"></i>
             <div class="track"></div></a>
            </li>
            <li><a href="#expfrm">
            <i class="fas fa-briefcase"></i>
            <p class="m-0 p-0">Experience</p>
            <i class="far fa-circle"></i>
            <div class="track"></div></a>
            </li>
            <li><a href="#intfrm">
            <!-- <i class="fas fa-heart"></i> -->
            <!-- <i class="fas fa-headphones-alt"></i> -->
            <i class="fas fa-icons"></i>
            <p class="m-0 p-0">Interest</p>
            <i class="far fa-circle"></i>
            <div class="track"></div></a>
            </li>
            <li><a href="#achfrm">
            <i class="fas fa-award"></i>
            <p class="m-0 p-0">Achievement</p>
            <i class="far fa-circle"></i>
            <div class="track"></div></a>
            </li>
            <li><a href="#projfrm">
            <i class="fas fa-project-diagram"></i>
            <p class="m-0 p-0">Project</p>
            <i class="far fa-circle"></i>
            <div class="track"></div></a>
            </li>
            <li><a href="#langfrm">
            <i class="fas fa-language"></i>
            <p class="m-0 p-0">Language</p>
            <i class="far fa-circle"></i></a>
            </li>
          </ul>
        </div>
        <!-- <div class="col-2">
          <input type="file" class="d-none" id="fileLoader" name="files" title="Load File" accept="image/jpeg, image/png"/>
          <div class="upload-photo">
            <img src="images/iconfinder_expand-color-web2-23_5049207.svg">
          </div>
        </div> -->
      </div>
      <div class="row middlediv" id="content">
       
        <div class="col-12" id="form-contents">
        
           <!--Form 1: Contact information -->
          <div class="row forminfo1 m-0 p-0" id="contactfrm" data-aos="fade-right" >
            <div class="col-7 p-0 step1 ml-3 mt-3 position-relative">
                <h3 class="mt-4 mb-4 text-center">Add Your Contact Information</h3>
                <?php 
                     $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
                          
                          $sql="SELECT * FROM contact WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                                 
                          $row=mysqli_fetch_assoc($result);  
                ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
               <div class="form-row">
                <div class="form-group col">
                  <label for="firstName" class="col-md-5"><em class="lb d-none">First Name</em>
                    <input type="text" name="Fname" id="firstName" placeholder="First Name" class="form-control form-input contfield" required autocomplete="off" value="<?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  <label for="lastName" class="col-md-5"><em class="lb d-none">Last Name</em>
                    <input type="text" name="Lname" id="lastName" placeholder="Last Name" class="form-control contfield" required autocomplete="off" value="<?php echo isset($row['last_name']) ? $row['last_name'] : '' ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="address" class="col-md-10"><em class="lb d-none">Address</em>
                    <input type="text" name="Address" id="address" placeholder="Address" autocomplete="off" class="form-control input-lg contfield" required value="<?php echo isset($row['addrerss']) ? $row['addrerss'] : '' ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="country" class="col-md-5"><em class="lb d-none">Country</em>
                    <input type="text" name="Country" id="country" list="countrylist" placeholder="Country" autocomplete="off" class="form-control contfield" required value="<?php echo isset($row['country']) ? $row['country'] : '' ?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                   <datalist id="countrylist">
                      <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
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
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
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
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
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
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
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
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
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
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
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
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                   </datalist>   
                  </label>
                  <label for="city" class="col-md-5"><em class="lb d-none">City</em>
                    <input type="text" name="City" id="city" placeholder="City" autocomplete="off" class="form-control contfield" required value="<?php echo isset($row['city']) ? $row['city'] : '' ?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="state" class="col-md-5 "><em class="lb d-none">State</em>
                    <input type="text" name="State" id="state" list="statelist" placeholder="State" class="form-control contfield" required value="<?php echo isset($row['state']) ? $row['state'] : '' ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    <datalist id="statelist">
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="Assam">Assam</option>
                      <option value="Bihar">Bihar</option>
                      <option value="Chandigarh">Chandigarh</option>
                      <option value="Chhattisgarh">Chhattisgarh</option>
                      <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                      <option value="Daman and Diu">Daman and Diu</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Lakshadweep">Lakshadweep</option>
                      <option value="Puducherry">Puducherry</option>
                      <option value="Goa">Goa</option>
                      <option value="Gujarat">Gujarat</option>
                      <option value="Haryana">Haryana</option>
                      <option value="Himachal Pradesh">Himachal Pradesh</option>
                      <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                      <option value="Jharkhand">Jharkhand</option>
                      <option value="Karnataka">Karnataka</option>
                      <option value="Kerala">Kerala</option>
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                      <option value="Manipur">Manipur</option>
                      <option value="Meghalaya">Meghalaya</option>
                      <option value="Mizoram">Mizoram</option>
                      <option value="Nagaland">Nagaland</option>
                      <option value="Odisha">Odisha</option>
                      <option value="Punjab">Punjab</option>
                      <option value="Rajasthan">Rajasthan</option>
                      <option value="Sikkim">Sikkim</option>
                      <option value="Tamil Nadu">Tamil Nadu</option>
                      <option value="Telangana">Telangana</option>
                      <option value="Tripura">Tripura</option>
                      <option value="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="Uttarakhand">Uttarakhand</option>
                      <option value="West Bengal">West Bengal</option>
                    </datalist>
                  </label>
                  <label for="pin" class="col-md-5"><em class="lb d-none">PIN Number</em>
                    <input type="text" name="PIN" id="pin" placeholder="PIN Code" class="form-control contfield" required autocomplete="off" value="<?php echo isset($row['pincode']) ? $row['pincode'] : '' ?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                 </label>
                </div>  
                <div class="form-group col-12">
                  <label for="phoneno" class="col-md-5"><em class="lb d-none">Phone Number</em>
                    <input type="text" name="Phone" id="phoneno" placeholder="Contact Number" class="form-control contfield" autocomplete="off" required value="<?php echo isset($row['mobile_no']) ? $row['mobile_no'] : '' ?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                 </label>
                  <label for="emailid" class="col-md-5"><em class="lb d-none">Email</em>
                    <input type="text" name="Email" id="emailid" placeholder="Email" class="form-control contfield" required value="<?php echo isset($row['email_id']) ? $row['email_id'] : '' ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="link" class="col-md-10"><em class="lb d-none">Link</em>
                    <input type="text" name="Links" id="link" placeholder="Link" class="form-control postion-relative links contfield" value="<?php echo isset($row['link']) ? $row['link'] : '' ?>">
                    <!-- <button type="button" class="btn addbtn">ADD</button> -->
                  </label>
                </div> 
                  <div class="form-group col-12">
                    <label for="dob" class="col-md-6 p-0"><em class="lb d-none">DOB</em>
                      <input type="text" name="DOB" id="dob" placeholder="Date Of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input contfield" required value="<?php echo isset($row['DOB']) ? $row['DOB'] : '' ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>                 
                  </div> 
                <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" id="Contprevent" name="Contactsave">Save</button></div>
                  <label for="nextb" class="col-2 offset-5 nextbtn mt-2"><input type="submit" name="next" value="Next" class="form-control formbtn"><i class="fas fa-chevron-right pl-2"></i></label>
                </div>
              </div> 
              </form>
              <?php
                if(mysqli_num_rows($result)>0){ 
              ?>
              <script type="text/javascript" charset="utf-8" async defer>
                $('#contactfrm').children().first().find('.lb').removeClass('d-none');
                $('.form-control').siblings('.fa-exclamation-circle').css("top","32px");
              </script>
              <?php 
                } } } 
              ?>
              
              <!--Contact us php-->
              <?php 

                $_REQUEST['msg']='';
                if(isset($_POST['Contactsave'])){
                  echo "print";
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  
                  $Fname = mysqli_real_escape_string($conn,$_POST['Fname']);
                  $Lname = mysqli_real_escape_string($conn,$_POST['Lname']); 
                  $Address= $_POST['Address'];
                  $Country = mysqli_real_escape_string($conn,$_POST['Country']);
                  $City = mysqli_real_escape_string($conn,$_POST['City']);
                  $State = mysqli_real_escape_string($conn,$_POST['State']);
                  $Pin = $_POST['PIN'];
                  $Phone = $_POST['Phone'];
                  $Email = $_POST['Email'];
                  $Links = $_POST['Links'];
                  $DOB = $_POST['DOB'];

                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed1");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];
                    $sql="SELECT *FROM contact WHERE userid='{$userid}';";
                    $result=mysqli_query($conn,$sql) or die("Query failed2");
                    print_r(mysqli_num_rows($result));
                    if(mysqli_num_rows($result) > 0){ 
                     $row=mysqli_fetch_assoc($result);
                      $sql="UPDATE contact SET first_name='{$Fname}', last_name='{$Lname}' ,addrerss='{$Address}',country='{$Country}',city='{$City}',state='{$State}',pincode='{$Pin}',mobile_no='{$Phone}',email_id='{$Email}',link='{$Links}',DOB='{$DOB}' WHERE userid='{$userid}';";
                      $result=mysqli_query($conn,$sql) or die('Query failed1');
                      
                    if($result){
                        $msg= '<div class="alert alert-success message">Update Successfully</div>';
                      }else{
                        echo "<script type='text/javascript'>
                          document.location.href='Resume.php#contactfrm';
                        </script>";
                        $msg= '<div class="alert alert-success">Not Updated Successfully</div>';
                      }
                    }
                    else{ 
                    $sql= "INSERT INTO contact(userid,first_name,last_name,addrerss,country,city,state,pincode,mobile_no,email_id,link,DOB) VALUES('{$userid}','{$Fname}','{$Lname}','{$Address}','{$Country}','{$City}','{$State}','{$Pin}','{$Phone}','{$Email}','{$Links}','{$DOB}');";
                    $sql.="UPDATE contact SET profile_id=concat(cabbrs,cnum);";
                    $result = mysqli_multi_query($conn,$sql) or die("Query failed2");
                    
                    if($result){
                      echo "<script type='text/javascript'>
                          document.location.href='Resume.php#contactfrm';
                        </script>";
                     $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                    }else{ 
                      echo "<script type='text/javascript'>
                          document.location.href='Resume.php#contactfrm';
                        </script>";
                    $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                     }
                    }
                    }
                  }           
                } 
                // mysqli_close($conn);
              ?>
            </div>
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
              <img src="images/undraw_profile_details_f8b7.svg" class="image-fluid mt-5 pb-0" style="max-width: 104%;">
              <?php
                global $msg;
                echo $msg;
              ?>
            </div>
          </div>

          <!-- form 2: objective page -->
          <div class="row forminfo1 d-none" id="objfrm"  data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Add Objective</h3>
              <?php 
                     $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
                          
                          $sql="SELECT * FROM objective WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                                 
                          $row=mysqli_fetch_assoc($result);  
                ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"  accept-charset="utf-8" class="p-2 mb-1 text-center">
                  <div class="mb-4">
                     <textarea rows="10" cols="70" placeholder="Type Here..." class="form-control p-4 objfield" name="summary" required><?php echo isset($row['summary']) ? $row['summary'] : ''  ?></textarea>
                     <div class="col-4 offset-8 wordcount">540 words left</div> 
                  </div>
                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back" class="form-control formbtn"></label>
                  <div class="col-2 offset-2"><button type="submit" class="btn detailsave" name="Objsave">Save</button></div>
                  <label for="nextb" class="col-2 offset-2 nextbtn"><input type="submit" name="next" value="Next" class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>
              </form> 
              <?php 
                } }  
              ?>


              <!--Objective php-->
              <?php
                $_REQUEST['msg']='';
                if(isset($_POST['Objsave'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $summary= $_POST['summary'];
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];
 
                    $sql1="SELECT *FROM objective WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     while($row=mysqli_fetch_assoc($result1)){
                      $sql="UPDATE objective SET summary='{$summary}' WHERE userid='{$userid}';";
                      $result=mysqli_query($conn,$sql) or die('Query failed1');
                  
                      if($result){
                       echo "<script type='text/javascript'>
                          document.location.href='Resume.php#objfrm';
                        </script>";
                        $msg='<div class="alert alert-success message">Update Successfully</div>';
                      }else{
                        echo "<script type='text/javascript'>
                          document.location.href='Resume.php#objfrm';
                        </script>";
                        $msg='<div class="alert alert-success">Not Updated Successfully</div>';
                      }
                     }
                    }else{

                    $sql= "INSERT INTO objective(userid,summary) VALUES('{$userid}','{$summary}');";
                    $sql.="UPDATE objective SET obj_id=concat(oabbrs,onum);";
                    $result = mysqli_multi_query($conn,$sql);
                    echo $result;
                    if($result){
                      echo "<script type='text/javascript'>
                          document.location.href='Resume.php#objfrm';
                        </script>";
                     $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                    }else{
                    echo "<script type='text/javascript'>
                          document.location.href='Resume.php#objfrm';
                        </script>"; 
                    $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                     }
                    }
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>

            </div>
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_Profile_data_re_v81r.svg" class=" mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
              ?>
            </div>
          </div>    


          <!-- form 3: skills page -->
          <div class="row forminfo1 d-none" id="skillfrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Hightlight your top Skills</h3>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];

                     $sql1="SELECT soft_id FROM soft_skills WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                  <div class="position-relative skills">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>">
                      <label for="soft">List your most relevant Soft Skills</label><br>
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                        <?php

                        if(mysqli_num_rows($result1) > 0){
                        $srow=mysqli_fetch_assoc($result1);
                        $frnkey=$srow['soft_id'];

                        $sksql1="SELECT *FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                        $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");  
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo isset($row['softskills']) ? $row['softskills'] : '' ?></textarea>
                          <button type="submit" name="del" value="<?php echo $row['softskills']; ?>" class="delbtn" id="#<?php echo $row['softskills']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
                         }
                        }
                       }
                      ?>

                      <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['del'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $softsk=$_POST['del'];
                              $_SESSION['deleted']= $softsk;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT soft_id FROM soft_skills WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['soft_id'];

                                    $sksql1="SELECT *FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if($softsk==$row['softskills']){
                                            $prykey=$row['sub_sid'];
                                            $delsql="DELETE FROM subsoft_skills WHERE sub_sid='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                   if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parent('div').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>
                    </div>
                      <input type="text" id="soft" placeholder="Typing..." autocomplete="off" class="form-control col-12">
                      <i class="fas fa-plus position-absolute skilladded" style="bottom: 55.5px;"></i><br>
                      <div class="col-2 offset-5 mt-3"><button type="submit" class="btn detailsave" name="softsave">Save</button></div>
                  </div>
              
              <!--Soft Skills php-->
                <?php
                $_REQUEST['msg']='';
                if(isset($_POST['softsave'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!empty($_POST['softskill'])){            
                    $sskill=array($_POST['softskill']);
                    
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];
                    $skillsql = "SELECT COUNT(*) FROM soft_skills WHERE soft_skills.userid='{$userid}';";
                    $skillresult = mysqli_query($conn,$skillsql);

                    if((mysqli_fetch_row($skillresult)[0])==0){
                     $subsql1='';
                     $sql= "INSERT INTO soft_skills(userid) VALUES('{$userid}');";
                     $sql.="UPDATE soft_skills SET soft_id=concat(sabbrs,snum);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if ($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $softid1 ="SELECT soft_id FROM soft_skills WHERE soft_skills.userid=$userid;";
                      $resultid = mysqli_query($conn,$softid1) or die("Query failed2"); 
                      

                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['soft_id'];
                         $sksql1="SELECT *FROM subsoft_skills WHERE soft_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=$row['softskills'];
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if($insarray[$i]===$plrow[$j]){
                                           echo $plrow[$j]."already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql1='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                        
                                        $subsql1.="INSERT INTO subsoft_skills(soft_id,softskills) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql1.="UPDATE subsoft_skills SET sub_sid=concat(subsabbrs,subsnum);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql1) or die("Query failed2");
                                        if($subresult){
                                        echo '<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        echo '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                                }else{
                                  $subsql1='';
                                  foreach ($sskill as $value){
                                    foreach ($value as $ele)
                                      { $subsql1.="INSERT INTO subsoft_skills(soft_id,softskills) VALUES('{$foreignid}','{$ele}');";
                                        $subsql1.="UPDATE subsoft_skills SET sub_sid=concat(subsabbrs,subsnum);";  
                                      }
                                    }
                                  $subresult = mysqli_multi_query($conn,$subsql1)  or die("Query failed3");
                                  if($subresult){
                                    $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                                    }else{ 
                                    $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                                  }
                                }
                              }
                          }
                    }
                    else{
                      $subsql2='';
                      $i=0;
                      $softid2 ="SELECT soft_id FROM soft_skills WHERE soft_skills.userid=$userid;";
                      $resultid2 = mysqli_query($conn,$softid2) or die("Query failed1");
                      
                      if(mysqli_num_rows($resultid2) > 0){
                       while($row=mysqli_fetch_assoc($resultid2)){
                         $foreignid=$row['soft_id'];
                         $sksql1="SELECT *FROM subsoft_skills WHERE soft_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=$row['softskills'];
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if($insarray[$i]===$plrow[$j]){
                                           echo $plrow[$j]."already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql2='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                        
                                        $subsql2.="INSERT INTO subsoft_skills(soft_id,softskills) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql2.="UPDATE subsoft_skills SET sub_sid=concat(subsabbrs,subsnum);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql2) or die("Query failed2");
                                        if($subresult){
                                        echo '<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        echo '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                                }
                              }
                     }
                  }
                 
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
              
              </form>
              <?php
                }
              }
              ?>


              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];

                     $sql1="SELECT hard_id FROM hard_skills WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
              ?>              
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">     
                  <div class="mt-5 mb-5 position-relative skills">
                      <label for="hard">Hard Skills</label>
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                         <?php 
                        if(mysqli_num_rows($result1) > 0){
                        $srow=mysqli_fetch_assoc($result1);
                        $frnkey=$srow['hard_id'];

                        $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$frnkey}';";
                        $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2"); 
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo $row['sh_skill']; ?></textarea>
                          <!-- <a href="#" type="submit" name="del"><i class="fas fa-trash-alt"></i></a> -->
                          <button type="submit" name="harddel" value="<?php echo $row['sh_skill']; ?>" class="delbtn" id="#<?php echo $row['sh_skill']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
                          }
                        }
                       }
                      ?>
                      <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['harddel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $sskill=$_POST['harddel'];
                              $_SESSION['deleted']=$sskill;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT hard_id FROM hard_skills WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['hard_id'];

                                    $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if($sskill==$row['sh_skill']){
                                            $prykey=$row['sub_hid'];
                                            $delsql="DELETE FROM subhard_skills WHERE sub_hid='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                    if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parent('div').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>
                      </div>
                      <!-- <div class="skillcontainer col-12 m-1 p-0"></div> -->
                      <input type="text" id="hard" placeholder="Typing..." autocomplete="off" class="form-control col-12 ">
                      <i class="fas fa-plus position-absolute skilladded" style="bottom: 55.5px;"></i><br>
                      <div class="col-2 offset-5 mt-3"><button type="submit" class="btn detailsave" name="hardsave">Save</button></div>
                  </div>
                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back"  class="form-control formbtn"></label>
                  <label for="nextb" class="col-2 offset-6 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>

              <!--hard Skills php-->
              <?php
                $_REQUEST['msg']='';
                if(isset($_POST['hardsave'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!empty($_POST['softskill'])){            
                    $sskill=array($_POST['softskill']);
                    
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];
                    $skillsql = "SELECT COUNT(*) FROM hard_skills WHERE hard_skills.userid='{$userid}';";
                    $skillresult = mysqli_query($conn,$skillsql);

                    if((mysqli_fetch_row($skillresult)[0])==0){
                     $subsql1='';
                     $sqlin= "INSERT INTO hard_skills(userid) VALUES('{$userid}');";
                     $sqlin.="UPDATE hard_skills SET hard_id=concat(habbrs,hnum);";
                     $resultup = mysqli_multi_query($conn,$sqlin) or die("Query failed1");   
                     
                    if ($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $softid1 ="SELECT hard_id FROM hard_skills WHERE hard_skills.userid=$userid;";
                      $resultid = mysqli_query($conn,$softid1) or die("Query failed2"); 
                      

                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['hard_id'];
                         $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$foreignid}';";
                         $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed3");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=$row['sh_skill'];
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if($insarray[$i]===$plrow[$j]){
                                           echo $plrow[$j]."already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql1='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                        
                                        $subsql1.="INSERT INTO subhard_skills(hard_id,sh_skill) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql1.="UPDATE subhard_skills SET sub_hid=concat(shabbrs,subhnum);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql1) or die("Query failed2");
                                        if($subresult){
                                        echo '<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        echo '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                                }else{
                                   $subsql1='';
                                   foreach ($sskill as $value){
                                    foreach ($value as $ele)
                                    {
                                      $subsql1.="INSERT INTO subhard_skills(hard_id,sh_skill ) VALUES('{$foreignid}','{$ele}');";
                                      $subsql1.="UPDATE subhard_skills SET sub_hid=concat(shabbrs,subhnum);"; 
                                    }
                                  }
                                  $subresult = mysqli_multi_query($conn,$subsql1)  or die("Query failed3");
                                  if($subresult){
                                  $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                                  }else{ 
                                  $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                                  }
                                }
                              }
                     }

                    }
                    else{
                      $subsql2='';
                      $i=0;
                      $softid2 ="SELECT hard_id FROM hard_skills WHERE hard_skills.userid=$userid;";
                      $resultid2 = mysqli_query($conn,$softid2) or die("Query failed4");
                      
                      if(mysqli_num_rows($resultid2) > 0){
                       while($row=mysqli_fetch_assoc($resultid2)){
                         $foreignid=$row['hard_id'];
                         $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed5");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=$row['sh_skill'];
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if($insarray[$i]===$plrow[$j]){
                                           echo $plrow[$j]." already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql2='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                                        $subsql2.="INSERT INTO subhard_skills(hard_id,sh_skill) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql2.="UPDATE subhard_skills SET sub_hid=concat(shabbrs,subhnum);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql2) or die("Query failed2");
                                        if($subresult){
                                        echo '<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        echo '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                                }
                              }
                     }
                  }
                 
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
              </form>
              <?php
                }
              }
              ?>
            </div>
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_percentages_0rur.svg" class="mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
              ?>
            </div>
          </div>


          <!-- form 4: Education page -->
          <div class="row forminfo1 d-none" id="edufrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Tell us about your Education</h3>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];           
                     $sql1="SELECT edu_id FROM education WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['edu_id'];
                     
                     $sksql1="SELECT *FROM subeducate WHERE edu_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>
            <div class="colldiv"> 
             <button type="button" class="btn collapsible position-relative"><?php echo $row['degree']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center d-none">
              <button type="submit" name="edudel" value="<?php echo $row['degree']; ?>" class="delbtn d-none" id="#<?php echo $row['degree']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="schname" class="col-md-5 pl-0"><em class="lb d-none">School/University Name</em>
                      <input type="text" name="schoolname" id="schname" placeholder="Name" class="form-control form-input edufield" value="<?php echo $row['sch_col_name']; ?>" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                    <label for="schlocation" class="col-md-5 p-0"><em class="lb d-none">Location</em>
                      <input type="text" name="schoolloc" id="schlocation" placeholder="Location" class="form-control form-input edufield" value="<?php echo isset($row['location']) ? $row['location'] : '' ?>" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="degree" class="col-md-5 pl-0"><em class="lb d-none">Degree</em>
                      <input type="text" list="deg" name="Degree" id="degree" placeholder="Degree" class="form-control form-input edufield" value="<?php echo isset($row['degree']) ? $row['degree'] : '' ?>" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                      <datalist id="deg">
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                        <option value="other">other</option>
                      </datalist>
                    </label>
                    <label for="FieldOS" class="col-md-5 p-0"><em class="lb d-none">Field of Study</em>
                      <input type="text" name="FieldofStudy" id="FieldOS" placeholder="Field of Study" class="form-control form-input edufield" value="<?php echo isset($row['field_of_study']) ? $row['field_of_study'] : '' ?>" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <p style="color: #008080; font-weight: 500;">Graduation Duration</p>
                    <label for="year" class="col-md-5 pl-0"><em class="lb d-none">Start</em>
                    <input type="text" name="PassingstartYear" placeholder="Start" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo isset($row['start_year']) ? $row['start_year'] : '' ?>" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                    <label for="year" class="col-md-5 pl-0"><em class="lb d-none">End</em>
                    <input type="text" name="PassingendYear" value="<?php echo isset($row['end_year']) ? $row['end_year'] : '' ?>"  placeholder="End" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>                    
                  </div> 
                  <div class="form-group col-12">
                    <label for="percentage" class="col-md-5 p-0"><em class="lb d-none">Percentage</em>
                      <input type="text" name="Percentage" id="percentage" placeholder="Percentage" value="<?php echo $row['percentage']; ?>" class="form-control form-input edufield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>  
                  <div class="col-2 offset-5 mt-3"><button type="submit" class="btn detailsave" name="edusave">Save</button></div>
               </div> 
              </form>
              <?php
                if(mysqli_num_rows($result1)>0){ 
              ?>
              <script type="text/javascript" charset="utf-8" async defer>
                $('#edufrm').children().first().find('.lb').removeClass('d-none');
                $('.form-control').siblings('.fa-exclamation-circle').css("top","32px");
              </script>
             </div>
              <?php 
                } } } } } }
              ?>    
              
             <!--Update-->
               <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['edusave'])){
                  // $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
                  $schoolname = mysqli_real_escape_string($conn,$_POST['schoolname']);
                  $schoolloc = mysqli_real_escape_string($conn,$_POST['schoolloc']); 
                  $Degree= trim($_POST['Degree']);
                  $FieldofStudy = mysqli_real_escape_string($conn,$_POST['FieldofStudy']);
                  $PassingstartYear = mysqli_real_escape_string($conn,$_POST['PassingstartYear']);
                  $PassingendYear = mysqli_real_escape_string($conn,$_POST['PassingendYear']);
                  $Percentage = $_POST['Percentage'];
                  $logemail = trim($_SESSION['uemail']);

                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                                
                     $sql1="SELECT edu_id FROM education WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['edu_id'];
                     
                     $sksql1="SELECT *FROM subeducate WHERE edu_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
                              if(strtolower($Degree)==strtolower($row['degree'])){
                              $edukey=$row['subedu_id'];
                              $sql="UPDATE subeducate SET sch_col_name='{$schoolname}', location='{$schoolloc}' ,degree='{$Degree}',field_of_study='{$FieldofStudy}',start_year='{$PassingstartYear}',end_year='{$PassingendYear}',percentage='{$Percentage}' WHERE subedu_id='{$edukey}';";         
                          }
                        }
                    }
                  $result=mysqli_query($conn,$sql) or die('Query failed1');
                  if($result){

                   $msg='<div class="alert alert-success message">Update Successfully</div>';
                  }else{
                    $msg= '<div class="alert alert-success">Not Updated Successfully</div>';
                  }
                }
              }
                } 
              ?>

              <!--Deletion-->
                 <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['edudel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $edusk=trim($_POST['edudel']);
                              $_SESSION['deleted']= $edusk;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT edu_id FROM education WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['edu_id'];

                                    $sksql1="SELECT *FROM subeducate WHERE edu_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if(strtolower($edusk)==strtolower($row['degree'])){
                                            $prykey=$row['subedu_id'];
                                            $delsql="DELETE FROM subeducate WHERE subedu_id='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                   if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parents('.colldiv').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>
          

            <div class="colldiv" id="extfrm"> 
             <button type="button" class="btn collapsible position-relative d-none">
             Education</button>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center">
              <button type="submit" name="edudel" value="<?php echo $row['degree']; ?>" class="delbtn d-none" id="#<?php echo $row['degree']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="schname" class="col-md-5 pl-0"><em class="lb d-none">School/University Name</em>
                      <input type="text" name="schoolname" id="schname" placeholder="Name" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                    <label for="schlocation" class="col-md-5 p-0"><em class="lb d-none">Location</em>
                      <input type="text" name="schoolloc" id="schlocation" placeholder="Location" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="degree" class="col-md-5 pl-0"><em class="lb d-none">Degree</em>
                      <input type="text" list="deg" name="Degree" id="degree" placeholder="Degree" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                      <datalist id="deg">
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                        <option value="other">other</option>
                      </datalist>
                    </label>
                    <label for="FieldOS" class="col-md-5 p-0"><em class="lb d-none">Field of Study</em>
                      <input type="text" name="FieldofStudy" id="FieldOS" placeholder="Field of Study" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <p style="color: #008080; font-weight: 500;">Graduation Duration</p>
                    <label for="year" class="col-md-5 pl-0"><em class="lb d-none">Start</em>
                    <input type="text" name="PassingstartYear" placeholder="Start" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                    <label for="year" class="col-md-5 pl-0"><em class="lb d-none">End</em>
                    <input type="text" name="PassingendYear"  placeholder="End" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input edufield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>                    
                  </div> 
                  <div class="form-group col-12">
                    <label for="percentage" class="col-md-5 p-0"><em class="lb d-none">Percentage</em>
                      <input type="text" name="Percentage" id="percentage" placeholder="Percentage" class="form-control form-input edufield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>  
                  <div class="col-2 offset-5 mt-3"><button type="submit" class="btn detailsave" name="eduinsert">Save</button></div>
                  <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light addinfo">+ Add Another Education</button>
                  </div>           
                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back" class="form-control formbtn"></label>
                  <label for="nextb" class="col-2 offset-6 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                 </div>
               </div> 
              </form>
              </div> 
                <!--Education php-->
             <?php
                $_REQUEST['msg']='';
                if(isset($_POST['eduinsert'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!(empty($_POST['schoolname'])  && empty($_POST['schoolloc']) && empty($_POST['Percentage'])  && empty($_POST['Degree'])  && empty($_POST['FieldofStudy'])  && empty($_POST['PassingstartYear'])  && empty($_POST['PassingendYear'])))
                  {            
                     $schoolname=$_POST['schoolname'];
                     $schoolloc=$_POST['schoolloc'];
                     $Degree=$_POST['Degree'];
                     $FieldofStudy=$_POST['FieldofStudy'];
                     $PassingstartYear=$_POST['PassingstartYear'];
                     $PassingendYear=$_POST['PassingendYear'];
                     $Percentage=$_POST['Percentage'];

                    
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");

                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];

                    $edusql = "SELECT COUNT(*) FROM education WHERE education.userid='{$userid}';";
                    $eduresult = mysqli_query($conn,$edusql);

                    if((mysqli_fetch_row($eduresult)[0])==0){
                     $edusql1='';
                     $sql= "INSERT INTO education(userid) VALUES('{$userid}');";
                     $sql.="UPDATE education SET edu_id=concat(eabbrs,enums);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $eduid1 ="SELECT edu_id FROM education WHERE education.userid=$userid;";
                      $resultid = mysqli_query($conn,$eduid1) or die("Query failed2"); 
                      

                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['edu_id'];
                         $sksql1="SELECT *FROM subeducate WHERE edu_id='{$frnkey}';";
                         $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                        if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $eduDegree=trim($Degree);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $edurow[]=trim($row['degree']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($eduDegree)===strtolower($edurow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                $edusql1='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                            $edusql1.="INSERT INTO subeducate(edu_id,sch_col_name,location,degree,field_of_study,  start_year,end_year,percentage) VALUES('{$foreignid}','{$schoolname}','{$schoolloc}',
                           '{$Degree}','{$FieldofStudy}','{$PassingstartYear}','{$PassingendYear}','{$Percentage}');";
                            $edusql1.="UPDATE subeducate SET subedu_id=concat(subedu_abbrs,subedu_num);"; 
                       
                            $subresult = mysqli_multi_query($conn,$edusql1)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                        }else{
                          $edusql1='';
                          $edusql1.="INSERT INTO subeducate(edu_id,sch_col_name,location,degree,field_of_study,  start_year,end_year,percentage) VALUES('{$foreignid}','{$schoolname}','{$schoolloc}',
                           '{$Degree}','{$FieldofStudy}','{$PassingstartYear}','{$PassingendYear}','{$Percentage}');";
                         $edusql1.="UPDATE subeducate SET subedu_id=concat(subedu_abbrs,subedu_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$edusql1)  or die("Query failed3");
                        if($subresult){
                          $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                        }else{ 
                          $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                        }
                      }
                     }
                  }
                    }
                    else{
                      $edusql2='';
                      $eduid2 ="SELECT edu_id FROM education WHERE education.userid=$userid;";
                      $resultid = mysqli_query($conn,$eduid2) or die("Query failed2"); 
                      
                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['edu_id'];
                        
                         $sksql1="SELECT *FROM subeducate WHERE edu_id='{$frnkey}';";
                      $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                      if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $eduDegree=trim($Degree);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $edurow[]=trim($row['degree']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($eduDegree)===strtolower($edurow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                $edusql2='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                            $edusql2.="INSERT INTO subeducate(edu_id,sch_col_name,location,degree,field_of_study,  start_year,end_year,percentage) VALUES('{$foreignid}','{$schoolname}','{$schoolloc}',
                           '{$Degree}','{$FieldofStudy}','{$PassingstartYear}','{$PassingendYear}','{$Percentage}');";
                            $edusql2.="UPDATE subeducate SET subedu_id=concat(subedu_abbrs,subedu_num);"; 
                       
                            $subresult = mysqli_multi_query($conn,$edusql2)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                                }
                     }
                  }
                }
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
            </div>
            
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_education_f8ru.svg" class=" mt-5 pb-0" style="max-width: 100%;">
                <?php
                global $msg;
                echo $msg;
              ?>
            </div>
          </div>


          <!-- form 5: Experience page -->
          <div class="row forminfo1 d-none" id="expfrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 text-center">Add your Work History</h3>
              <p class="col-12 text-center mb-5">You can add volunteer work, internship ot extracurricular activites too.</p>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                      $userid=$urow['userid'];
                                
                     $sql1="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['exp_id'];
                     
                     $sksql1="SELECT *FROM subexperience WHERE exp_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>
             <div class="colldiv"> 
               <button type="button" class="btn collapsible position-relative"><?php echo $row['designation']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 d-none text-center">
                  <button type="submit" name="expdel" value="<?php echo $row['organization']; ?>" class="delbtn  d-none" id="#<?php echo $row['organization']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="desig" class="col-md-10 p-0"><em class="lb d-none">Your Designation</em>
                      <input type="text" name="Designation" id="desig" placeholder="Your Designation" class="form-control form-input expfield" value="<?php echo $row['designation']; ?>" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>                 
                  </div>
                  <div class="form-group col-12">
                    <label for="orgn" class="col-md-10 p-0"><em class="lb d-none">Your Organization</em>
                    <input type="text" name="Organization" id="orgn" placeholder="Your Organization" class="form-control form-input expfield" value="<?php echo $row['organization']; ?>" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="orgnloc" class="col-md-10 p-0"><em class="lb d-none">Organization Location</em>
                    <input type="text" name="OrganizationLoc" id="orgnloc" placeholder="Organization Location" class="form-control form-input expfield" value="<?php echo $row['location']; ?>" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="workstart" class="col-md-5 pl-0"><em class="lb d-none">Started Working From</em>
                    <input type="text" name="workstart"  placeholder="Started Working From" onfocus="(this.type='date')" onblur="(this.type='text')" value="<?php echo $row['start_yrs']; ?>" class="form-control form-input expfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                    <label for="workend" class="col-md-5 pl-0"><em class="lb d-none">Worked Till</em>
                    <input type="text" name="workend" value="<?php echo $row['end_yrs']; ?>"  placeholder="Worked Till" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input expfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>                
                  <div class="form-group col-12">
                    <textarea name="jobprofile" rows="5" class="form-control col-10 offset-1 p-4 expfield" placeholder="Describe your job profile" required><?php echo $row['description']; ?></textarea>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </div>
                  <div class="col-2 offset-5">
                    <button type="submit" class="btn detailsave" name="expsave">Save</button>
                  </div>
              </div>  
              </form>
              <?php
                if(mysqli_num_rows($result1)>0){ 
              ?>
              <script type="text/javascript" charset="utf-8" async defer>
                $('#expfrm').children().first().find('.lb').removeClass('d-none');
                $('.form-control').siblings('.fa-exclamation-circle').css("top","32px");
              </script>
             </div> 
              <?php 
                 } } } } } }
              ?>


               <!--Updation-->
              <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['expsave'])){
                  // $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
                  $Designation = trim($_POST['Designation']);
                  $Organization =$_POST['Organization']; 
                  $OrganizationLoc= $_POST['OrganizationLoc'];
                  $workstart = $_POST['workstart'];
                  $workend = $_POST['workend'];
                  $jobprofile = $_POST['jobprofile'];

                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                                
                     $sql1="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['exp_id'];
                     
                     $sksql1="SELECT *FROM subexperience WHERE exp_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
                              if(strtolower($Designation)==strtolower($row['designation'])){
                              $edukey=$row['subexp_id'];
                              $sql="UPDATE subexperience SET designation='{$Designation}', organization='{$Organization}' ,location='{$OrganizationLoc}',start_yrs='{$workstart}',end_yrs='{$workend}',description='{$jobprofile}' WHERE subexp_id='{$edukey}';";         
                            }
                          }
                        }
                      $result=mysqli_query($conn,$sql) or die('Query failed1');
                      if($result){
                        $msg= '<div class="alert alert-success message">Update Successfully</div>';
                      }else{
                        $msg= '<div class="alert alert-success">Not Updated Successfully</div>';
                      }
                   }
                 }
                } 
              ?>

              <!--Deletion-->
                 <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['expdel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $expsk=trim($_POST['expdel']);
                              $_SESSION['deleted']= $expsk;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['exp_id'];

                                    $sksql1="SELECT *FROM subexperience WHERE exp_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if(strtolower($expsk)==strtolower($row['organization'])){
                                            $prykey=$row['subexp_id'];
                                            $delsql="DELETE FROM subexperience WHERE subexp_id='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                   if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parents('.colldiv').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>


         <div class="colldiv" id="extfrm"> 
               <button type="button" class="btn collapsible position-relative d-none">Experience</button>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <button type="submit" name="expdel" value="<?php echo $row['organization']; ?>" class="delbtn" id="#<?php echo $row['organization']; ?>"><i class="fas fa-trash-alt d-none"></i></button>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="desig" class="col-md-10 p-0"><em class="lb d-none">Your Designation</em>
                      <input type="text" name="Designation" id="desig" placeholder="Your Designation" class="form-control form-input expfield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>                 
                  </div>
                  <div class="form-group col-12">
                    <label for="orgn" class="col-md-10 p-0"><em class="lb d-none">Your Organization</em>
                    <input type="text" name="Organization" id="orgn" placeholder="Your Organization" class="form-control form-input expfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="orgnloc" class="col-md-10 p-0"><em class="lb d-none">Organization Location</em>
                    <input type="text" name="OrganizationLoc" id="orgnloc" placeholder="Organization Location" class="form-control form-input expfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="workstart" class="col-md-5 pl-0"><em class="lb d-none">Started Working From</em>
                    <input type="text" name="workstart"  placeholder="Started Working From" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input expfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                    <label for="workend" class="col-md-5 pl-0"><em class="lb d-none">Worked Till</em>
                    <input type="text" name="workend"  placeholder="Worked Till" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input expfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>                
                  <div class="form-group col-12">
                    <textarea name="jobprofile" rows="5" class="form-control col-10 offset-1 p-4 expfield" placeholder="Describe your job profile" required></textarea>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </div>
                  <div class="col-2 offset-5">
                    <button type="submit" class="btn detailsave" name="expinsert">Save</button>
                  </div>
                  <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light addinfo">+ Add Another Experience</button>
                  </div>
                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-1 offset-2 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back"  class="form-control formbtn"></label>
                  
                  <label for="nextb" class="col-2 offset-6 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>
              </div>  
              </form>
           </div>                    

             <!--Experienced php-->
              <?php
                $_REQUEST['msg']='';
                if(isset($_POST['expinsert'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!(empty($_POST['Designation'])  && empty($_POST['Organization']) && empty($_POST['OrganizationLoc'])  && empty($_POST['workstart'])  && empty($_POST['workend'])  && empty($_POST['jobprofile'])))
                  {            
                     $Designation=$_POST['Designation'];
                     $Organization=$_POST['Organization'];
                     $OrganizationLoc=$_POST['OrganizationLoc'];
                     $workstart=$_POST['workstart'];
                     $workend=$_POST['workend'];
                     $jobprofile=$_POST['jobprofile'];
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");

                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];

                    $expsql = "SELECT COUNT(*) FROM experience WHERE experience.userid='{$userid}';";
                    $expresult = mysqli_query($conn,$expsql);

                    if((mysqli_fetch_row($expresult)[0])==0){
                     $expsql1='';
                     $sql= "INSERT INTO experience(userid) VALUES('{$userid}');";
                     $sql.="UPDATE experience SET exp_id=concat(expabbrs,expnum);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $expid1 ="SELECT exp_id FROM experience WHERE experience.userid=$userid;";
                      $resultid = mysqli_query($conn,$expid1) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
                      $foreignid=$row['exp_id'];
      
                      $sksql1="SELECT *FROM subexperience WHERE exp_id='{$frnkey}';";
                      $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                      if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $exporg=trim($Organization);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $exprow[]=trim($row['organization']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($exporg)===strtolower($exprow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                $expsql1='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                            $expsql1.="INSERT INTO subexperience(
                         exp_id,designation,organization,location,start_yrs,end_yrs,description) VALUES('{$foreignid}','{$Designation}','{$Organization}','{$OrganizationLoc}','{$workstart}','{$workend}','{$jobprofile}');";
                         $expsql1.="UPDATE subexperience SET subexp_id=concat(subexp_abbrs,subexp_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$expsql1)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                      }else{
                        $expsql1='';
                        $expsql1.="INSERT INTO subexperience(
                         exp_id,designation,organization,location,start_yrs,end_yrs,description) VALUES('{$foreignid}','{$Designation}','{$Organization}','{$OrganizationLoc}','{$workstart}','{$workend}','{$jobprofile}');";
                         $expsql1.="UPDATE subexperience SET subexp_id=concat(subexp_abbrs,subexp_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$expsql1)  or die("Query failed3");
                        if($subresult){
                          $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                        }else{ 
                          $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                        }
                      }
                    }
                    else{
                      $expsql2='';
                      $expid2 ="SELECT exp_id FROM experience WHERE experience.userid=$userid;";
                      $resultid = mysqli_query($conn,$expid2) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
                      $foreignid=$row['exp_id'];
      
                      $sksql2="SELECT *FROM subexperience WHERE exp_id='{$frnkey}';";
                      $skresult2 = mysqli_query($conn,$sksql2) or die("Query failed2");
                      if(mysqli_num_rows($skresult2) > 0){
                                  $fetchsize=mysqli_num_rows($skresult2);
                                  $flag=0;
                                  $exporg=trim($Organization);

                                while($row=mysqli_fetch_assoc($skresult2)){
                                  $exprow[]=trim($row['organization']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($exporg)===strtolower($exprow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                $expsql2='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                            $expsql2.="INSERT INTO subexperience(
                         exp_id,designation,organization,location,start_yrs,end_yrs,description) VALUES('{$foreignid}','{$Designation}','{$Organization}','{$OrganizationLoc}','{$workstart}','{$workend}','{$jobprofile}');";
                         $expsql2.="UPDATE subexperience SET subexp_id=concat(subexp_abbrs,subexp_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$expsql2)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                                }
                }
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
            </div>  
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_interaction_design_odgc.svg" class="mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
              ?>
            </div>
          </div>

          <!-- form 6: Interest page -->
          <div class="row forminfo1 d-none" id="intfrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Add your Interest</h3>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];

                     $sql1="SELECT int_id FROM interest WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                  <div class="position-relative skills mb-5">
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                        <?php

                        if(mysqli_num_rows($result1) > 0){
                        $srow=mysqli_fetch_assoc($result1);
                        $frnkey=$srow['int_id'];

                        $sksql1="SELECT *FROM subinterest WHERE int_id='{$frnkey}';";
                        $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");  
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo isset($row['intname']) ? $row['intname'] : '' ?></textarea>
                          <button type="submit" name="intdel" value="<?php echo $row['intname']; ?>" class="delbtn" id="#<?php echo $row['intname']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
                         }
                        }
                       }
                      ?>

                      <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['intdel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $sskill=$_POST['intdel'];
                              $_SESSION['deleted']=$sskill;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT int_id FROM interest WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['int_id'];

                                    $sksql1="SELECT *FROM subinterest WHERE int_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if($sskill==$row['intname']){
                                            $prykey=$row['subint_id'];
                                            $delsql="DELETE FROM subinterest WHERE subint_id='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                     if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parent('div').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>
                        
                    </div>
                      <input type="text" id="interest" placeholder="Typing..." class="form-control col-12">
                      <i class="fas fa-plus position-absolute skilladded"></i>
                  </div>
                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back"  class="form-control formbtn"></label>
                  <div class="col-2 offset-2"><button type="submit" class="btn detailsave" name="intsave">Save</button></div>
                  <label for="nextb" class="col-2 offset-2 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>
              </form>
              <?php 
               } }
              ?>


             <!--Interest php-->
              <?php
                $_REQUEST['msg']='';
                if(isset($_POST['intsave'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!empty($_POST['softskill'])){            
                    $sskill=array($_POST['softskill']);
                    
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];
                    $skillsql = "SELECT COUNT(*) FROM interest WHERE interest.userid='{$userid}';";
                    $skillresult = mysqli_query($conn,$skillsql);

                    if((mysqli_fetch_row($skillresult)[0])==0){
                     $subsql1='';
                     $sql= "INSERT INTO interest(userid) VALUES('{$userid}');";
                     $sql.="UPDATE interest SET int_id=concat(intabbrs,intnum);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if ($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $softid1 ="SELECT int_id FROM interest WHERE interest.userid=$userid;";
                      $resultid = mysqli_query($conn,$softid1) or die("Query failed2"); 
                      

                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['int_id'];
                         $sksql1="SELECT *FROM subinterest WHERE int_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=trim($row['intname']);
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($insarray[$i])===($plrow[$j])){
                                           echo $plrow[$j]."already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql1='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                        
                                        $subsql1.="INSERT INTO subinterest(int_id,intname) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql1.="UPDATE subinterest SET subint_id=concat(subint_abbrs,subint_num);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql1) or die("Query failed2");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                     }else{
                      $subsql1='';
                        foreach ($sskill as $value){
                        foreach ($value as $ele)
                         {
                           $subsql1.="INSERT INTO subinterest(int_id,intname) VALUES('{$foreignid}','{$ele}');";
                           $subsql1.="UPDATE subinterest SET subint_id=concat(subint_abbrs,subint_num);"; 
                         }
                       }
                       $subresult = mysqli_multi_query($conn,$subsql1)  or die("Query failed3");
                        if($subresult){
                          $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                        }else{ 
                          $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                        }
                     }
                  }
                     }
                    }
                    else{
                      $subsql2='';
                      $i=0;
                      $softid2 ="SELECT int_id FROM interest WHERE interest.userid=$userid;";
                      $resultid2 = mysqli_query($conn,$softid2) or die("Query failed1");
                      
                      if(mysqli_num_rows($resultid2) > 0){
                       while($row=mysqli_fetch_assoc($resultid2)){
                         $foreignid=$row['int_id'];
                         $sksql1="SELECT *FROM subinterest WHERE int_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=trim($row['intname']);
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($insarray[$i])===strtolower($plrow[$j])){
                                           echo $plrow[$j]." already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql2='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                                        $subsql2.="INSERT INTO subinterest(int_id,intname) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql2.="UPDATE subinterest SET subint_id=concat(subint_abbrs,subint_num);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql2) or die("Query failed2");
                                        if($subresult){
                                        $msg= '<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg='<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                                }
                              }
                     }
                  }
                 
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
            </div>
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_audio_conversation_dgtw.svg" class="mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
               ?>
            </div>
          </div> 

          
          <!-- form 7: Achievement page -->
          <div class="row forminfo1 d-none" id="achfrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Add Responsibilities and Achievements</h3>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];

                     $sql1="SELECT resach_id FROM resp_achieve WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <div class="form-row">
                  <div class="form-group col-12">
                    <div class="position-relative skills mb-5">
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                        <?php

                        if(mysqli_num_rows($result1) > 0){
                        $srow=mysqli_fetch_assoc($result1);
                        $frnkey=$srow['resach_id'];

                        $sksql1="SELECT *FROM subres_achieve WHERE resach_id='{$frnkey}';";
                        $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");  
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo isset($row['resach_name']) ? $row['resach_name'] : '' ?></textarea>
                          <button type="submit" name="achdel" value="<?php echo $row['resach_name']; ?>" class="delbtn" id="#<?php echo $row['resach_name']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
                         }
                        }
                       }
                      ?>

                      <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['achdel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $sskill=$_POST['achdel'];
                              $_SESSION['deleted']=$sskill;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT resach_id FROM resp_achieve WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['resach_id'];

                                    $sksql1="SELECT *FROM subres_achieve WHERE resach_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if($sskill==$row['resach_name']){
                                            $prykey=$row['subresach_id'];
                                            $delsql="DELETE FROM subres_achieve WHERE subresach_id='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                     if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parent('div').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>
                        
                    </div>
                      <input type="text" id="achieve" placeholder="Typing..." class="form-control col-12 ">
                      <i class="fas fa-plus position-absolute skilladded"></i>
                  </div>
                  </div>
                </div>  

                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back"  class="form-control formbtn"></label>
                  <div class="col-2 offset-2"><button type="submit" class="btn detailsave" name="resachsave">Save</button></div>
                  <label for="nextb" class="col-2 offset-2 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>
              </form> 
              <?php 
                } }
              ?>    

             <!--Achievement php-->
              <?php
                $_REQUEST['msg']='';
                if(isset($_POST['resachsave'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!empty($_POST['softskill'])){            
                    $sskill=array($_POST['softskill']);
                    
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];
                    $skillsql = "SELECT COUNT(*) FROM resp_achieve WHERE resp_achieve.userid='{$userid}';";
                    $skillresult = mysqli_query($conn,$skillsql);

                    if((mysqli_fetch_row($skillresult)[0])==0){
                     $subsql1='';
                     $sql= "INSERT INTO resp_achieve(userid) VALUES('{$userid}');";
                     $sql.="UPDATE resp_achieve SET resach_id=concat(resabbrs,resnum);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if ($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $softid1 ="SELECT resach_id FROM resp_achieve WHERE resp_achieve.userid=$userid;";
                      $resultid = mysqli_query($conn,$softid1) or die("Query failed2"); 
                      

                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['resach_id'];
                         $sksql1="SELECT *FROM subres_achieve WHERE resach_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=trim($row['resach_name']);
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($insarray[$i])===strtolower($plrow[$j])){
                                           echo $plrow[$j]."already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql1='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                        
                                        $subsql1.="INSERT INTO subresp_achieve(resach_id,resach_name) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql1.="UPDATE subres_achieve SET subresach_id=concat(subresabbrs,subresnum);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql1) or die("Query failed2");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg='<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                    }else{
                      $subsql1='';
                      foreach ($sskill as $value){
                        foreach ($value as $ele)
                         {
                           $subsql1.="INSERT INTO subres_achieve(resach_id,resach_name) VALUES('{$foreignid}','{$ele}');";
                           $subsql1.="UPDATE subres_achieve SET subresach_id=concat(subresabbrs,subresnum);"; 
                         }
                       }
                       $subresult = mysqli_multi_query($conn,$subsql1)  or die("Query failed3");
                        if($subresult){
                          $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                        }else{ 
                          $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                        }
                    }
                 }
                     }
                    }
                    else{
                      $subsql2='';
                      $i=0;
                      $softid2 ="SELECT resach_id FROM resp_achieve WHERE resp_achieve.userid=$userid;";
                      $resultid2 = mysqli_query($conn,$softid2) or die("Query failed1");
                      
                      if(mysqli_num_rows($resultid2) > 0){
                       while($row=mysqli_fetch_assoc($resultid2)){
                         $foreignid=$row['resach_id'];
                         $sksql1="SELECT *FROM subres_achieve WHERE resach_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                              if(mysqli_num_rows($skresult1) > 0){

                                  $insarray=$sskill[0]; 
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $inpsize=count($insarray);
                                  $flag=0;

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $plrow[]=trim($row['resach_name']);
                                }
                                
                                for($i=0;$i<$inpsize;$i++){
                                    if($i>=$fetchsize){
                                      for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($insarray[$i])===strtolower($plrow[$j])){
                                           echo $plrow[$j]." already exists"."<br>";
                                           $flag=1;
                                           break;
                                        } 
                                      }
                                      if($flag==0){
                                        $subsql2='';
                                        $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                                        $subsql2.="INSERT INTO subres_achieve(resach_id,resach_name) VALUES('{$foreignid}','{$insarray[$i]}');";
                                        $subsql2.="UPDATE subres_achieve SET subresach_id=concat(subresabbrs,subresnum);";
                                        
                                        $subresult = mysqli_multi_query($conn,$subsql2) or die("Query failed2");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg='<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }
                                        
                                    } 
                                    }   
                                }
                              }
                     }
                  }
                 
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
            </div>
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_winners_ao2o.svg" class=" mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
               ?>
            </div>
          </div>


        <!-- form 8: Project page -->
          <div class="row forminfo1 d-none" id="projfrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Add Project</h3>


              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                                
                     $sql1="SELECT proj_id FROM project WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['proj_id'];
                     
                     $sksql1="SELECT *FROM subproject WHERE proj_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>
             <div class="colldiv"> 
                <button type="button" class="btn collapsible position-relative"><?php echo $row['projname']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center d-none">
                <button type="submit" name="projdel" value="<?php echo $row['projname']; ?>" class="delbtn" id="#<?php echo $row['projname']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="projname" class="col-md-10 p-0"><em class="lb d-none">Project Title</em>
                      <input type="text" name="ProjectName" id="projname" value="<?php echo $row['projname']; ?>" placeholder="Project Title" class="form-control form-input projfield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label> 
                  </div>
                  <div class="form-group col-12">
                    <label for="clientname" class="col-md-10 p-0"><em class="lb d-none">Client Name</em>
                      <input type="text" name="Projassoc" value="<?php echo $row['clientname']; ?>" id="clientname" placeholder="Client Name" class="form-control form-input projfield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="projlink" class="col-md-10 p-0"><em class="lb d-none">URL</em>
                    <input type="text" name="projurl" id="projlink" value="<?php echo $row['urls']; ?>" placeholder="URL" class="form-control form-input projfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group form-check col-6 ml-4">                    
                    <p class="text-left ml-5">Project Status</p><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    <label  class="col-md-5 p-0 form-check-label"><input type="radio" name="ProjStatus" value="inprogress"  class="form-check-input  projfield" value="inprogress" <?php if($row['progress']=='inprogress'){
                             echo "checked=\"checked\" ";
                       }?>>In Progress</label>
                    <label class="col-md-5 p-0 form-check-label"><input type="radio" name="ProjStatus" value="finished" class="form-check-input projfield" value="finished" <?php if($row['progress']=='finished'){
                      echo "checked=\"checked\" ";
                    } ?>>Finished</label>
                  </div>
                  <div class="form-group col-12">
                    <label for="workstart" class="col-md-5 pl-0"><em class="lb d-none">Started Working From</em>
                    <input type="text" name="projworkstart"  placeholder="Started Working From" onfocus="(this.type='date')" value="<?php echo $row['start_yrs']; ?>" onblur="(this.type='text')" class="form-control form-input projfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                    <label for="workend" class="col-md-5 pl-0"><em class="lb d-none">Worked Till</em>
                    <input type="text" name="projworkend" value="<?php echo $row['end_yrs']; ?>" placeholder="Worked Till" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input projfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>
                  <div class="form-group col-12">
                    <textarea name="projprofile" rows="5" cols='50' placeholder="Details of Project" required class="form-control col-10 offset-1 p-4 projfield"><?php echo $row['description']; ?></textarea>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </div>
                  <div class="col-2 offset-5"><button type="submit" class="btn detailsave" name="projsave">Save</button></div>
                </div> 
              </form>      
              <?php
                if(mysqli_num_rows($result1)>0){ 
              ?>
              <script type="text/javascript" charset="utf-8" async defer>
                $('#projfrm').children().first().find('.lb').removeClass('d-none');
                $('.form-control').siblings('.fa-exclamation-circle').css("top","32px");
              </script>
             </div>
              <?php 
                } } } } } }
              ?>   


              <!--Updation-->  
              <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['projsave'])){
                  // $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
                  $ProjectName = trim($_POST['ProjectName']);
                  $Projassoc =$_POST['Projassoc']; 
                  $noticeperiod= $_POST['projurl'];
                  $ProjStatus = $_POST['ProjStatus'];
                  $projworkstart = $_POST['projworkstart'];
                  $projworkend = $_POST['projworkend'];
                  $projprofile = $_POST['projprofile'];

                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                                
                     $sql1="SELECT proj_id FROM project WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['proj_id'];
                     
                     $sksql1="SELECT *FROM subproject WHERE proj_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
                              if(strtolower($ProjectName)===strtolower($row['projname'])){
                              $edukey=$row['subproj_id'];
                              $sql="UPDATE subproject SET projname='{$ProjectName}', clientname='{$Projassoc}' ,urls='{$noticeperiod}',progress='{$ProjStatus}',start_yrs='{$projworkstart}',end_yrs='{$projworkend}',description='{$projprofile}' WHERE subproj_id='{$edukey}';";         
                            }
                          }
                        }
                      $result=mysqli_query($conn,$sql) or die('Query failed1');
                      if($result){
                        $msg='<div class="alert alert-success message">Update Successfully</div>';
                      }else{
                        $msg='<div class="alert alert-success">Not Updated Successfully</div>';
                      }
                   }
                 }
                } 
              ?> 

              
              <!--Deletion-->
                 <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['projdel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $projsk=$_POST['projdel'];
                              $_SESSION['deleted']= $projsk;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT proj_id FROM project WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['proj_id'];

                                    $sksql1="SELECT *FROM subproject WHERE proj_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if($projsk==$row['projname']){
                                            $prykey=$row['subproj_id'];
                                            $delsql="DELETE FROM subproject WHERE subproj_id='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                   if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parents('.colldiv').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>


            <div class="colldiv" id="extfrm"> 
               <button type="button" class="btn collapsible position-relative d-none">Experience</button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <button type="submit" name="projdel" value="<?php echo $row['projname']; ?>" class="delbtn" id="#<?php echo $row['projname']; ?>"><i class="fas fa-trash-alt d-none"></i></button>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="projname" class="col-md-10 p-0"><em class="lb d-none">Project Title</em>
                      <input type="text" name="ProjectName" id="projname" placeholder="Project Title" class="form-control form-input projfield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label> 
                  </div>
                  <div class="form-group col-12">
                    <label for="clientname" class="col-md-10 p-0"><em class="lb d-none">Client Name</em>
                      <input type="text" name="Projassoc" id="clientname" placeholder="Client Name" class="form-control form-input projfield" required>
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="projlink" class="col-md-10 p-0"><em class="lb d-none">URL</em>
                    <input type="text" name="projurl" id="projlink" placeholder="URL" class="form-control form-input projfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group form-check col-6 ml-4">                    
                    <p class="text-left ml-5">Project Status</p><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    <label  class="col-md-5 p-0 form-check-label"><input type="radio" name="ProjStatus" value="inprogress"  class="form-check-input  projfield" checked>In Progress</label>
                    <label class="col-md-5 p-0 form-check-label"><input type="radio" name="ProjStatus" value="finished" class="form-check-input  projfield">Finished</label>
                  </div>
                  <div class="form-group col-12">
                    <label for="workstart" class="col-md-5 pl-0"><em class="lb d-none">Started Working From</em>
                    <input type="text" name="projworkstart"  placeholder="Started Working From" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input projfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                    <label for="workend" class="col-md-5 pl-0"><em class="lb d-none">Worked Till</em>
                    <input type="text" name="projworkend"  placeholder="Worked Till" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input projfield" required>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>
                  <div class="form-group col-12">
                    <textarea name="projprofile" rows="5" cols='50' placeholder="Details of Project" required class="form-control col-10 offset-1 p-4 projfield"></textarea>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </div>
                  <div class="col-2 offset-5"><button type="submit" class="btn detailsave" name="projinsert">Save</button></div>
                  <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light addinfo">+ Add Another Project</button>
                  </div>
                </div>   
                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back"  class="form-control formbtn"></label>
                  
                  <label for="nextb" class="col-2 offset-6 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>
              </form>      
             </div>               

             <!--Project php-->
             <?php
                $_REQUEST['msg']='';
                if(isset($_POST['projinsert'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                  if(!(empty($_POST['ProjectName'])  && empty($_POST['Projassoc']) && empty($_POST['projurl'])  && empty($_POST['ProjStatus'])  && empty($_POST['projworkstart'])  && empty($_POST['projworkend']) && empty($_POST['projprofile'])))
                  {            
                     $ProjectName=$_POST['ProjectName'];
                     $Projassoc=$_POST['Projassoc'];
                     $projurl=$_POST['projurl'];
                     $ProjStatus=$_POST['ProjStatus'];
                     $projworkstart=$_POST['projworkstart'];
                     $projworkend=$_POST['projworkend'];
                     $projprofile=$_POST['projprofile'];
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");

                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];

                    $projsql = "SELECT COUNT(*) FROM project WHERE project.userid='{$userid}';";
                    $projresult = mysqli_query($conn,$projsql);

                    if((mysqli_fetch_row($projresult)[0])==0){
                     $projsql1='';
                     $sql= "INSERT INTO project(userid) VALUES('{$userid}');";
                     $sql.="UPDATE project SET proj_id=concat(projabbrs,projnum);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $projid1 ="SELECT proj_id FROM project WHERE project.userid=$userid;";
                      $resultid = mysqli_query($conn,$projid1) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
                      $foreignid=$row['proj_id'];
            
                      $sksql1="SELECT *FROM subproject WHERE proj_id='{$frnkey}';";
                      $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                      if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $projs=trim($ProjectName);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $projrow[]=trim($row['projname']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($projs)===strtolower($projrow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                 $projsql1='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                             $projsql1.="INSERT INTO subproject(
                         proj_id,projname,clientname,start_yrs,end_yrs,urls,progress,description) VALUES('{$foreignid}','{$ProjectName}','{$Projassoc}','{$projworkstart}','{$projworkend}','{$projurl}','{$ProjStatus}','{$projprofile}');";
                         $projsql1.="UPDATE subproject SET subproj_id=concat(subproj_abbrs,subproj_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$projsql1)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                      }else{
                        $projsql1='';
                        $projsql1.="INSERT INTO subproject(
                         proj_id,projname,clientname,start_yrs,end_yrs,urls,progress,description) VALUES('{$foreignid}','{$ProjectName}','{$Projassoc}','{$projworkstart}','{$projworkend}','{$projurl}','{$ProjStatus}','{$projprofile}');";
                         $projsql1.="UPDATE subproject SET subproj_id=concat(subproj_abbrs,subproj_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$projsql1)  or die("Query failed3");
                        if($subresult){
                          $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                        }else{ 
                          $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                        }
                      }
                    }
                    else{
                      $projsql2='';
                      $projid2 ="SELECT proj_id FROM project WHERE project.userid=$userid;";
                      $resultid = mysqli_query($conn,$projid2) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
                      $foreignid=$row['proj_id'];
            
                      $sksql1="SELECT *FROM subproject WHERE proj_id='{$frnkey}';";
                      $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                      if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $projs=trim($ProjectName);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $projrow[]=trim($row['projname']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($projs)===strtolower($projrow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                 $projsql2='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                             $projsql2.="INSERT INTO subproject(
                         proj_id,projname,clientname,start_yrs,end_yrs,urls,progress,description) VALUES('{$foreignid}','{$ProjectName}','{$Projassoc}','{$projworkstart}','{$projworkend}','{$projurl}','{$ProjStatus}','{$projprofile}');";
                         $projsql2.="UPDATE subproject SET subproj_id=concat(subproj_abbrs,subproj_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$projsql2)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                                }
                }
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?> 
             </div> 
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_project_completed_w0oq.svg" class="mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
               ?>
            </div>
          </div>


          <!-- form 9: Language page -->
          <div class="row forminfo1 d-none" id="langfrm" data-aos="fade-right">
            <div class="col-7 p-0 step1 ml-3 mt-3">
              <h3 class="mt-4 mb-4 text-center">Add Languages</h3>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                                
                     $sql1="SELECT lang_id FROM language WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['lang_id'];
                     
                     $sksql1="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>
              <?php
                  $str=$row['lread'];
                  $rwsarray=explode(',',$str);
                  $size=count($rwsarray);
              ?>
              <div class="colldiv"> 
               <button type="button" class="btn collapsible position-relative "><?php echo $row['langname']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center d-none">
                <button type="submit" name="langdel" value="<?php echo $row['langname']; ?>" class="delbtn d-none" id="#<?php echo $row['langname']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
                  <div class="form-group offset-1 col-10 pl-2">
                   <label for="lang" class="col-md-12 p-0"><em class="lb d-none">Language</em>
                    <input type="text" name="Language" list="langlist" value="<?php echo $row['langname']; ?>" id="lang" placeholder="Language" class="form-control form-input langfield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  <datalist id="langlist">
                    <option value="Afrikaans">Afrikaans</option>
                    <option value="Albanian">Albanian</option>
                    <option value="Arabic">Arabic</option>
                    <option value="Armenian">Armenian</option>
                    <option value="Basque">Basque</option>
                    <option value="Bengali">Bengali</option>
                    <option value="Bulgarian">Bulgarian</option>
                    <option value="Catalan">Catalan</option>
                    <option value="Cambodian">Cambodian</option>
                    <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                    <option value="Croatian">Croatian</option>
                    <option value="Czech">Czech</option>
                    <option value="Danish">Danish</option>
                    <option value="Dutch">Dutch</option>
                    <option value="English">English</option>
                    <option value="Estonian">Estonian</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finnish">Finnish</option>
                    <option value="French">French</option>
                    <option value="Georgian">Georgian</option>
                    <option value="German">German</option>
                    <option value="Greek">Greek</option>
                    <option value="Gujarati">Gujarati</option>
                    <option value="Hebrew">Hebrew</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Hungarian">Hungarian</option>
                    <option value="Icelandic">Icelandic</option>
                    <option value="Indonesian">Indonesian</option>
                    <option value="Irish">Irish</option>
                    <option value="Italian">Italian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Javanese">Javanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Latin">Latin</option>
                    <option value="Latvian">Latvian</option>
                    <option value="Lithuanian">Lithuanian</option>
                    <option value="Macedonian">Macedonian</option>
                    <option value="Malay">Malay</option>
                    <option value="Malayalam">Malayalam</option>
                    <option value="Maltese">Maltese</option>
                    <option value="Maori">Maori</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Mongolian">Mongolian</option>
                    <option value="Nepali">Nepali</option>
                    <option value="Norwegian">Norwegian</option>
                    <option value="Persian">Persian</option>
                    <option value="Polish">Polish</option>
                    <option value="Portuguese">Portuguese</option>
                    <option value="Punjabi">Punjabi</option>
                    <option value="Quechua">Quechua</option>
                    <option value="Romanian">Romanian</option>
                    <option value="Russian">Russian</option>
                    <option value="Samoan">Samoan</option>
                    <option value="Serbian">Serbian</option>
                    <option value="Slovak">Slovak</option>
                    <option value="Slovenian">Slovenian</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Swahili">Swahili</option>
                    <option value="Swedish ">Swedish </option>
                    <option value="Tamil">Tamil</option>
                    <option value="Tatar">Tatar</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Thai">Thai</option>
                    <option value="Tibetan">Tibetan</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Turkish">Turkish</option>
                    <option value="Ukrainian">Ukrainian</option>
                    <option value="Urdu">Urdu</option>
                    <option value="Uzbek">Uzbek</option>
                    <option value="Vietnamese">Vietnamese</option>
                    <option value="Welsh">Welsh</option>
                    <option value="Xhosa">Xhosa</option>
                  </datalist>
                  </label>
                </div>
                <div class="form-group col-12">
                  <div class="form-check col-md-4 d-inline">
                    <input type="checkbox" name="rws[]" value="read" id="read" class="form-check-input langfield" max="25" min="0" <?php 
                       if((0<$size) && ($rwsarray[0]=='read')){
                         echo "checked=\"checked\" ";
                       }
                    ?>
                    >
                    <label class="form-check-label" for="read">Read</label>
                  </div>
                  <div class="form-check col-md-4 d-inline">  
                    <input type="checkbox" id="write" name="rws[]" value="write" class="form-check-input langfield" max="5" min="0"
                    <?php 
                       if((1<$size) && ($rwsarray[1]=='write')){
                         echo "checked=\"checked\" ";
                       }
                    ?>
                    >
                    <label class="form-check-label" for="write">Write</label>
                  </div>
                  <div class="form-check col-md-4 d-inline">  
                    <input type="checkbox" id="speak" name="rws[]" value="speak" class="form-check-input langfield" max="5" min="0"
                    <?php 
                       if((2<$size) && ($rwsarray[2]=='speak')){
                         echo "checked=\"checked\" ";
                       }
                    ?>
                    >
                    <label class="form-check-label" for="speak">Speak</label>  
                  </div>
                </div>
                <div class="col-2 offset-5">
                  <button type="submit" class="btn detailsave" name="langsave">Save</button>
                </div> 
                </div>
              </form>
              <?php
                if(mysqli_num_rows($result1)>0){ 
              ?>
              <script type="text/javascript" charset="utf-8" async defer>
                $('#langfrm').children().first().find('.lb').removeClass('d-none');
                $('.form-control').siblings('.fa-exclamation-circle').css("top","32px");
              </script>
             </div> 
              <?php 
                 } } } } } }
              ?>  


              <!--Updation--> 
                 <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['langsave'])){
           
                     // $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
                     $Language=trim($_POST['Language']);
                     $rws=$_POST['rws'];
                     $data="";
                     foreach ($rws as $value) {
                       $data = $data.$value.',';  
                     }
                     $data=chop($data,',');
                  

                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                      while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                                
                     $sql1="SELECT lang_id FROM language WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['lang_id'];
                     
                     $sksql1="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
                              if(strtolower($Language)==strtolower($row['langname'])){
                              $edukey=$row['sublang_id'];
                              $sql="UPDATE sublangauge SET langname='{$Language}', lread='{$data}'  WHERE sublang_id='{$edukey}';";         
                            }
                          }
                        }
                      $result=mysqli_query($conn,$sql) or die('Query failed1');
                      if($result){
                        $msg= '<div class="alert alert-success message">Update Successfully</div>';
                      }else{
                        $msg= '<div class="alert alert-success">Not Updated Successfully</div>';
                      }
                   }
                 }
                } 
              ?> 


              <!--Deletion-->
                 <?php 
                      $_REQUEST['msg']='';
                            if(isset($_POST['langdel'])){
                              $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                              $logemail = trim($_SESSION['uemail']);
                              $langsk=trim($_POST['langdel']);
                              $_SESSION['deleted']= $langsk;
                              $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                              $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                              if(mysqli_num_rows($conresult) > 0){
                              while($urow=mysqli_fetch_assoc($conresult)){
                                    $userid=$urow['userid'];

                                    $sql1="SELECT lang_id FROM language WHERE userid='{$userid}';";
                                    $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                                    $srow=mysqli_fetch_assoc($result1);
                                    $frnkey=$srow['lang_id'];

                                    $sksql1="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                                    if(mysqli_num_rows($skresult1) > 0){
                                    while($row=mysqli_fetch_assoc($skresult1)){
                                            if(strtolower($langsk)==strtolower($row['langname'])){
                                            $prykey=$row['sublang_id'];
                                            $delsql="DELETE FROM sublangauge WHERE sublang_id='{$prykey}';";
                                            }
                                        }
                                    }
                                    $delresult = mysqli_query($conn,$delsql) or die("Query failed3");   
                                   if($delresult>0){
                                     ?>
                                    <script type="text/javascript">
                                      let deldiv =document.getElementById("#<?php echo $_SESSION['deleted']; ?>");
                                      $(deldiv).parents('.colldiv').remove();
                                    </script>
                                     <?php
                                     $msg='<div class="alert alert-success message">Deleted Successfully</div>';
                                    }else{
                                      $msg= '<div class="alert alert-danger message">Not Deleted</div>';
                                  }
                        }
                      }
                    }
                          ?>

            <div class="colldiv" id="extfrm"> 
               <button type="button" class="btn collapsible position-relative d-none">Experience</button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <div class="form-row">
                  <button type="submit" name="langdel" value="<?php echo $row['langname']; ?>" class="delbtn d-none" id="#<?php echo $row['langname']; ?>"><i class="fas fa-trash-alt"></i></button>
                  <div class="form-group offset-1 col-10 pl-2">
                   <label for="lang" class="col-md-12 p-0"><em class="lb d-none">Language</em>
                    <input type="text" name="Language" list="langlist" id="lang" placeholder="Language" class="form-control form-input langfield" required><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  <datalist id="langlist">
                    <option value="Afrikaans">Afrikaans</option>
                    <option value="Albanian">Albanian</option>
                    <option value="Arabic">Arabic</option>
                    <option value="Armenian">Armenian</option>
                    <option value="Basque">Basque</option>
                    <option value="Bengali">Bengali</option>
                    <option value="Bulgarian">Bulgarian</option>
                    <option value="Catalan">Catalan</option>
                    <option value="Cambodian">Cambodian</option>
                    <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                    <option value="Croatian">Croatian</option>
                    <option value="Czech">Czech</option>
                    <option value="Danish">Danish</option>
                    <option value="Dutch">Dutch</option>
                    <option value="English">English</option>
                    <option value="Estonian">Estonian</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finnish">Finnish</option>
                    <option value="French">French</option>
                    <option value="Georgian">Georgian</option>
                    <option value="German">German</option>
                    <option value="Greek">Greek</option>
                    <option value="Gujarati">Gujarati</option>
                    <option value="Hebrew">Hebrew</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Hungarian">Hungarian</option>
                    <option value="Icelandic">Icelandic</option>
                    <option value="Indonesian">Indonesian</option>
                    <option value="Irish">Irish</option>
                    <option value="Italian">Italian</option>
                    <option value="Japanese">Japanese</option>
                    <option value="Javanese">Javanese</option>
                    <option value="Korean">Korean</option>
                    <option value="Latin">Latin</option>
                    <option value="Latvian">Latvian</option>
                    <option value="Lithuanian">Lithuanian</option>
                    <option value="Macedonian">Macedonian</option>
                    <option value="Malay">Malay</option>
                    <option value="Malayalam">Malayalam</option>
                    <option value="Maltese">Maltese</option>
                    <option value="Maori">Maori</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Mongolian">Mongolian</option>
                    <option value="Nepali">Nepali</option>
                    <option value="Norwegian">Norwegian</option>
                    <option value="Persian">Persian</option>
                    <option value="Polish">Polish</option>
                    <option value="Portuguese">Portuguese</option>
                    <option value="Punjabi">Punjabi</option>
                    <option value="Quechua">Quechua</option>
                    <option value="Romanian">Romanian</option>
                    <option value="Russian">Russian</option>
                    <option value="Samoan">Samoan</option>
                    <option value="Serbian">Serbian</option>
                    <option value="Slovak">Slovak</option>
                    <option value="Slovenian">Slovenian</option>
                    <option value="Spanish">Spanish</option>
                    <option value="Swahili">Swahili</option>
                    <option value="Swedish ">Swedish </option>
                    <option value="Tamil">Tamil</option>
                    <option value="Tatar">Tatar</option>
                    <option value="Telugu">Telugu</option>
                    <option value="Thai">Thai</option>
                    <option value="Tibetan">Tibetan</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Turkish">Turkish</option>
                    <option value="Ukrainian">Ukrainian</option>
                    <option value="Urdu">Urdu</option>
                    <option value="Uzbek">Uzbek</option>
                    <option value="Vietnamese">Vietnamese</option>
                    <option value="Welsh">Welsh</option>
                    <option value="Xhosa">Xhosa</option>
                  </datalist>
                  </label>
                </div>
                <div class="form-group col-12">
                  <div class="form-check col-md-4 d-inline">
                    <input type="checkbox" name="rws[]" value="read" id="read" class="form-check-input langfield" max="25" min="0">
                    <label class="form-check-label" for="read">Read</label>
                  </div>
                  <div class="form-check col-md-4 d-inline">  
                    <input type="checkbox" id="write" name="rws[]" value="write" class="form-check-input langfield" max="5" min="0">
                    <label class="form-check-label" for="write">Write</label>
                  </div>
                  <div class="form-check col-md-4 d-inline">  
                    <input type="checkbox" id="speak" name="rws[]" value="speak" class="form-check-input langfield" max="5" min="0">
                    <label class="form-check-label" for="speak">Speak</label>  
                  </div>
                </div>
                <div class="col-2 offset-5">
                  <button type="submit" class="btn detailsave" name="langinsert">Save</button>
                </div>
                <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light addinfo">+ Add Language</button>
                  </div>  
                </div>

                  <div class="form-group col-12 form-inline">
                  <label for="backbtn" class="col-2 offset-1 btnback"><i class="fas fa-chevron-left"></i><input type="submit" name="back" value="Back"  class="form-control formbtn"></label>
                  <label for="nextb" class="col-2 offset-6 nextbtn"><input type="submit" name="next" value="Next"  class="form-control formbtn"><i class="fas fa-chevron-right"></i></label>
                </div>
              </form>
            </div>

             <!--language-->
             <?php
                $_REQUEST['msg']='';
                if(isset($_POST['langinsert'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                
                  if(!(empty($_POST['Language'])  && empty($_POST['rws'])))
                  {            
                     $Language=$_POST['Language'];
                     $rws=$_POST['rws'];
                     $data="";
                     foreach ($rws as $value) {
                       $data = $data.$value.',';  
                     }
                     $data=chop($data,',');
                  }
                  else{
                    die();
                  }
                  
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");

                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){
                    $userid = $row['userid'];

                    $langsql = "SELECT COUNT(*) FROM language WHERE language.userid='{$userid}';";
                    $langresult = mysqli_query($conn,$langsql);

                    if((mysqli_fetch_row($langresult)[0])==0){
                     $langsql1='';
                     $sql= "INSERT INTO language(userid) VALUES('{$userid}');";
                     $sql.="UPDATE language SET lang_id=concat(langabbrs,langnum);";
                     $resultup = mysqli_multi_query($conn,$sql)  or die("Query failed1");   
                     
                    if($resultup) {
                     do {
                          /* store first result set */
                          if ($result = mysqli_store_result($conn)) {
                          while ($row = mysqli_fetch_row($result)) {
                            echo $row[0];
                          }
                          mysqli_free_result($result);
                        }
                       } while (mysqli_next_result($conn));
                     }

                      $langid1 ="SELECT lang_id FROM language WHERE language.userid=$userid;";
                      $resultid = mysqli_query($conn,$langid1) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
                      $foreignid=$row['lang_id'];

                      $sksql1="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                      $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                      if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $langs=trim($Language);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $langrow[]=trim($row['langname']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($langs)===strtolower($langrow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                 $langsql1='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                             $langsql1.="INSERT INTO sublangauge(
                         lang_id,lread,langname) VALUES('{$foreignid}','{$data}','{$Language}');";
                         $langsql1.="UPDATE sublangauge SET sublang_id=concat(sublang_abbr,sublang_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$langsql1)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                      }else{
                        $langsql2='';
                        $langsql2.="INSERT INTO sublangauge(
                         lang_id,lread,langname) VALUES('{$foreignid}','{$data}','{$Language}');";
                         $langsql2.="UPDATE sublangauge SET sublang_id=concat(sublang_abbr,sublang_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$langsql2)  or die("Query failed3");
                        if($subresult){
                          $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                        }else{ 
                          $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                        }
                      }
                    }
                    else{
                      $langsql2='';
                      $langid2 ="SELECT lang_id FROM language WHERE language.userid=$userid;";
                      $resultid = mysqli_query($conn,$langid2) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
                      $foreignid=$row['lang_id'];

                      $sksql1="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                      $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                      if(mysqli_num_rows($skresult1) > 0){
                                  $fetchsize=mysqli_num_rows($skresult1);
                                  $flag=0;
                                  $langs=trim($Language);

                                while($row=mysqli_fetch_assoc($skresult1)){
                                  $langrow[]=trim($row['langname']);
                                }
                                
                                for($j=0;$j<$fetchsize;$j++){
                                        if(strtolower($langs)===strtolower($langrow[$j])){
                                          $msg='<div class="alert alert-success message">Already Exists</div>';
                                           $flag=1;
                                           break;
                                        } 
                                      }
                              if($flag==0){
                                 $langsql2='';
                                $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                                         
                             $langsql2.="INSERT INTO sublangauge(
                         lang_id,lread,langname) VALUES('{$foreignid}','{$data}','{$Language}');";
                         $langsql2.="UPDATE sublangauge SET sublang_id=concat(sublang_abbr,sublang_num);"; 
                       
                       $subresult = mysqli_multi_query($conn,$langsql2)  or die("Query failed3");
                                        if($subresult){
                                        $msg='<div class="alert alert-success message">Successfully Saved</div>';
                                        }else{ 
                                        $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                                        }
                                      }    
                                }
                }
                    } 
                  }          
                } 
                // mysqli_close($conn);
              ?>
            </div>
            <div class="col ml-5 mt-2 contactimg" data-aos="zoom-out" data-aos-delay="1030">
               <img src="images/undraw_Around_the_world_re_n353.svg" class="mt-5 pb-0" style="max-width: 100%;">
               <?php
                global $msg;
                echo $msg;
              ?>
            </div>
          </div>
        </div>
     </div>
     <!-- <?php 
            // session_unset();
            // session_destroy();
      ?> -->
  </div>


  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script src="javascript/index.js"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
     AOS.init({
        offset: 300,
        duration: 1000
      });
    var swiper = new Swiper('.swiper-container', {
      pagination: {
        el: '.swiper-pagination',
        type: 'progressbar',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
</body>
</html>



