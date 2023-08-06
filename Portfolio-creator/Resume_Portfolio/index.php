<!DOCTYPE html>
<html>
<head>
	<title>Portfolio creator</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/index.css">
    <link rel="stylesheet" href="css/style10.css">
    <link rel="stylesheet" href="css/style8.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/> 
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style type="text/css" media="screen">
    .main{
      display: flex;
      justify-content: center;
      align-items: center;
      /* width: 100%; */
    }
    .main > p{
      font-size: 3rem;
      font-weight: 700;
      font-family: Verdena , Geneva , Tahoma ,sans-serif;
      color:white;
      text-shadow: 1px 1px 1px #919191,
      1px 2px 1px #919191,1px 3px 1px #919191,
      1px 4px 1px #919191,1px 5px 1px #919191,
      1px 6px 1px #919191,1px 7px 1px #919191,
      1px 8px 1px #919191,1px 9px 1px #919191,
      1px 20px 6px rgba(0,0,0,0.5),
      1px 22px 8px rgba(0,0,0,0.4),
      1px 24px 10px rgba(0,0,0,0.3);
    }  
    </style>
</head>
<body class="bdy">
   <div class="container-fluid">
   	<div class="row vh-100">
 
    <!--Mobile Menu-->
      <div class="col-12 d-md-none position-fixed m-2 position-fixed" id="mob_menu">
        <div class="bar" id="bar1"></div>
        <div class="bar" id="bar2"></div>
        <div class="bar" id="bar3"></div>
      </div>

   	 <!-- Menu bar -->	
   	  <div class="col-md-2 vh-100 d-md-flex flex-column justify-content-center d-none border bg-dark menu">
        <div class="row text-center mb-5">
          <div class="col-12 mb-2 menu_content">
            <div class="ml-4 mr-5 p-1 "><a href="#index" class="text-light">Home</a></div>
          </div>
          <div class="col-12 mb-2 menu_content">
            <div class="ml-4 mr-5 p-1"><a href="#aboutus" class="text-light">About us</a></div>
          </div>
          <div class="col-12 mb-2 menu_content">
            <div class="ml-4 mr-5 p-1 "><a href="#template" class="text-light">Templates</a></div>
          </div> 
          <!-- <div class="col-12 mb-2 menu_content">
            <div class="ml-4 mr-5 p-1 "><a href="#subscription" class="text-light">Subscription</a></div>
          </div>   -->             
          <div class="col-12 mb-2 menu_content">
            <div class="ml-4 mr-5 p-1 "><a href="login.php" class="text-light">Login</a></div>
          </div>
          <div class="col-12 mb-2 menu_content">
            <div class="ml-4 mr-5 p-1 "><a href="#usercontact" class="text-light">Contact Us</a></div>
          </div>
        </div>
        <div class="row mt-5 text-center">
           <div class="col-12">
             <a href="https://www.facebook.com/soumyasofty.jaiswal" class="border rounded bg-light p-1 pl-2 pr-2">
              <!-- <i class="fa fa-facebook fa-1x" aria-hidden="true"></i> -->
              <i class="fab fa-facebook-f"></i></a>
             <a href="https://www.instagram.com/manju_10k" class="border rounded bg-light p-1 pl-2 pr-2">
             <!--  <i class="fa fa-instagram fa-1x" aria-hidden="true"></i> -->
            <i class="fab fa-instagram"></i></a>
             <a href="https://www.linkedin.com/in/manju-kumari-13b900195" class="border rounded bg-light p-1 pl-2 pr-2">
              <!-- <i class="fa fa-linkedin fa-1x" aria-hidden="true"></i> -->
            <i class="fab fa-linkedin-in"></i></a>
             <a href="https://twitter.com/@Soumyajaiswal7" class="border rounded bg-light p-1 pl-2 pr-2">
              <!-- <i class="fa fa-twitter fa-1x" aria-hidden="true"></i> -->
            <i class="fab fa-twitter"></i></a>
            <a href="mailto:portfoliocreator2021@gmail.com" class="border rounded bg-light p-1 pl-2 pr-2">
              <!-- <i class="fa fa-facebook fa-1x" aria-hidden="true"></i> -->
              <i class="fas fa-envelope"></i></a>
           </div>
           <div class="col-12">
             <p class="text-light mt-4">&copy; Copyright Portfolio</p>
           </div>
        </div>
   	  </div>

   	  <!-- Main body -->
   	  <div class="col-md-10 ml-auto">
        <!--Home page-->
        <div class="row text-center d-flex align-items-center mt-5" id="index">
          <div class="col-12" style="padding-top: 11em;">
            <h1 class="mainheading a">PORTFOLIO CREATOR</h1>
            <p class="para">The Online Resume Builder</p>
          </div>
        </div>
        
        <!--Aboutus-->
        <div class="row divpos" style="margin-top: 23em;" id="aboutus" data-aos="zoom-in-up">
         <div class="abtparent"> 
          <!-- <h2 class="headabt">About Us</h2> -->
          <!-- <h1 class="mt-5 headabout">About us</h1> -->
          <div class="main"><p>About us</p></div>
          <div class="center main" style="margin-left: 4em;">
            <div class="box center col-lg-11 col-md-8 col-lg-6 col-sm-10">
              <p class=" ml-4 mt-3 mb-3" style="margin-right: 7em; text-align: justify;">
              Portfolio Creator provides the users the popular resume formats and a better way
              to show their resume to the employers.<br>
              We register the user and collect as many data or details about the user. A job seeker can download their resume as well. it is to provide a way to the customers to design their resumes according to their requirement.<br>
              This would be facilitating the employees to make and print their resume in a
              oper format. <br>
              Keeping track of the customer and their resumes.Create different users
              and assign different roles with related permissions.system Manage all the account
              details such as user name,phone number, address, email address etc.of all the user
              from one central location.<br>
              Confirmation of end user identity and will verify which users are authorized to receive support. User can select the format of their resume from the given templates. User can update or edit their resume.<br>
              User can download and take print of their resume.Interface for filling up the
              information.User authentication. <br>
            </p>
          </div>
         </div>
          </div>
        </div>


        <!-- Templates --> 
        <div class="row divpos" id="template" data-aos="zoom-in-up">
          <div class="col-12">
            <!-- <h1 class="headabt">Templates</h1> -->
            <div class="main mb-3"><p>Templates</p></div>
              <div class="swiper-container" style=" margin-bottom: 6em;">
                <div class="swiper-wrapper">
                   <div class="swiper-slide">
                      <img src="images/Screenshotresume.png" class="tempimg">
                     <!--  <button type="button" class="btn btn-lg btn-warning view d-none">View</button> -->
                   </div>
                   <div class="swiper-slide">
                      <img src="images/Screenshotresume2.png" class="tempimg">
                      <!-- <button type="button" class="btn btn-lg btn-warning view d-none">View</button> -->
                   </div>
                   <div class="swiper-slide">
                       <img src="images/resume3.png" class="tempimg">
                       <!-- <button type="button" class="btn btn-lg btn-warning view d-none">View</button> -->
                   </div>
                </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination"></div>
              <!-- Add Arrows -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
          </div>  
        </div> 

        
        <!--Subscription card-->
      <!--   <div class="row divpos" id="subscription" data-aos="zoom-in-up">
          <h1 class="col-12 headabt">Subscription</h1>
           <div class="col-4 pricecard pr-0" id="free">
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
           <div class="col-4  pricecard pr-0" id="yearly">
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
        </div> -->

                   <!-- Team Members -->
        <div class="row divpos" style="margin-top: 1em;background-image: url('images/hlo1.png');" id="aboutus" data-aos="zoom-in-up">
             <div class="row py-4 position-relative" >
                <div class="col-12">
                 <!--  <h1 class="py-3 text-center headabout">Our Team</h1> -->
                 <div class="main"><p>Our Team</p></div>
                </div>
                <div class="col-md-4 offset-md-2 col-sm-8">
                  <!-- <h1 class="py-3 text-center">Our Team</h1> -->
                  <div class="main center">
                    <div class="card mt-3 ml-5 mb-1" style="width:350px;height:300px;position:relative;cursor:pointer;margin:10px;overflow:hidden;">
                        <img src="images/Screenshot_20210506_144533.jpg" class="img-card" alt="error">
                        <div class="card-img-overlay center">
                          <h2 class="card-title"><u>Manju Kumari</u></h2>
                          <p class="card-text">Hello, I am Developer</p><br>      
                          <a href="https://www.instagram.com/manju_10k"><i class="fab fa-instagram fa-2x"></i></a><br>
                          <a href="https://www.linkedin.com/in/manju-kumari-13b900195" ><i  class="fab fa-linkedin-in fa-2x"></i></a><br>
                          <a href="https://github.com/mkumari10"><i class="fab fa-github fa-2x"></i></i></a>
                        </div>
                    </div>
                  </div>
                 </div>

                <div class="col-md-4 offset-md-1 col-sm-8">
                    <div class="main center">
                        <div class="card mr-5 mb-5 mt-3" style="width:350px;height:300px;position:relative;cursor:pointer;margin:10px;overflow:hidden;">
                            <img src="images/WhatsApp Image 2021-05-12 at 17.13.18 (1).jpeg" class="img-card" alt="error">
                          <div class="card-img-overlay center">
                            <h2 class="card-title"><u>Paridhi Upadhyay</u></h2>
                            <p class="card-text">Hello, I am Designer</p><br> 
                            <a href="https://www.instagram.com/paridhi._.upadhyay" ><i  class="fab fa-instagram fa-2x"></i></a><br>
                            <a href="https://www.linkedin.com/in/paridhi-upadhyay-912602189" color="yellow"><i  class="fab fa-linkedin-in fa-2x"></i></a><br>
                            <a href="https://github.com/paridhiupa"><i  class="fab fa-github  fa-2x"></i></a>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="col-md-4  offset-md-2 col-sm-8">
                    <div class="main center">
                        <div class="card ml-5" style="width:350px;height:300px;position:relative;cursor:pointer;margin:10px;overflow:hidden;">
                            <img src="images/WhatsApp Image 2021-05-12 at 17.05.47 (1).jpeg" class="img-card" alt="error">
                            <div class="card-img-overlay center">
                              <h2 class="card-title"><u>Soumya Jaiswal</u></h2>
                              <p class="card-text">Hello, I am Developer</p><br> 
                              <a href="https://www.instagram.com/soumya_jaiswal75" ><i  class="fab fa-instagram fa-2x"></i></a><br>
                              <a href="https://www.linkedin.com/in/soumya-jaiswal-80010b1b7"><i  class="fab fa-linkedin-in fa-2x"></i></a><br>
                              <a href="https://github.com/Soumya-max-web"><i  class="fab fa-github  fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
              </div>

              <div class="col-md-4 offset-md-1 col-sm-8">
                <div class="main center">
                    <div class="card mr-5" style="width:350px;height:300px;position:relative;cursor:pointer;margin:10px;overflow:hidden;">
                        <img src="images/WhatsApp Image 2021-05-12 at 19.40.28.jpeg" class="img-card" alt="error">
                        <div class="card-img-overlay center">
                          <h2 class="card-title"><u>Varsha Dhanotiya</u></h2>
                          <p class="card-text">Hello,I am Designer</p><br> 
                          <a href="https://www.instagram.com/varsha_.dhanotiya" ><i  class="fab fa-instagram fa-2x"></i></a><br>
                          <a href="https://www.linkedin.com/in/varsha-dhanotiya-20010404"><i class="fab fa-linkedin-in fa-2x"></a></i><br>
                          <a href="https://github.com/varsha0104"><i  class="fab fa-github  fa-2x"></i></a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>

        <!-- Contact us --> 
        <div class="row divpos" style="margin-top: 0.5em;" id="usercontact" data-aos="zoom-in-up">
          <div class="col-12 mt-5 mb-5">
            <!-- <h1 class="text-center" style="color: khaki;">Contact Us</h1> -->
            <div class="main"><p>Contact us</p></div>
          </div>
          <div class="col-5 m-auto">
            <form action="" method="post" style="margin-bottom: 7em;">
              <fieldset>
              <div class="form-group">
                 <label for="uname" class="labelText">Full Name</label>
                 <input type="text" name="name" id="uname" class="inptext form-control" autocomplete="off">
              </div>
              <div class="form-group">
                 <label for="uemail" class="labelText">Email</label>
                 <input type="text" name="email" id="uemail" class="inptext form-control" autocomplete="off">
              </div>
              <div class="form-group">
                 <label for="umob" class="labelText">Mobile No.</label>
                 <input type="text" name="mob" id="umob" class="inptext form-control" autocomplete="off">
              </div>
              <div class="form-group">
                 <label for="umessage" class="labelText">Message</label>
                 <textarea name="message" rows="4" cols="6" id="umessage" class="inptext form-control" autocomplete="off"></textarea>
              </div>
              <div class="form-group">
                 <input type="submit" name="cntct" class="form-control btn btn-success">
              </div>
              </fieldset>
            </form>
            <?php
         $_REQUEST['msg']='';
          $con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
          if(isset($_POST['cntct'])){
            $name=mysqli_real_escape_string($con,$_POST['name']);
            $email=mysqli_real_escape_string($con,$_POST['email']);
            $mobile=mysqli_real_escape_string($con,$_POST['mob']);
            $msg1=mysqli_real_escape_string($con,$_POST['message']);

            $sql= "INSERT INTO contactus(name,email,mobile,message) VALUES ('{$name}','{$email}','{$mobile}','{$msg1}'); ";
            $sql.="UPDATE contactus SET c_id=concat(cabbrs,cnum);";    

            $result = mysqli_multi_query($con, $sql) or die("Query Failed.");
    
            if($result)
                {
                  echo "<script type='text/javascript'>
                          document.location.href='index.php#usercontact';
                        </script>";
                $msg = '<div class="alert alert-success message">Successfully message Send</div>';
                }
                else{  
                  echo "<script type='text/javascript'>
                          document.location.href='index.php#usercontact';
                        </script>";
                 $msg ='<div class="alert alert-danger message">Not Successfully message Send</div>';
                }
                 }
            global $msg;
            echo $msg;
            ?>
          </div>
        </div>
   		</div>
   	</div>
   </div>


   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   <script src="javascript/jquery-3.5.1.js"></script>
   <script src="javascript/index.js"></script>
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
   <script>
   	  AOS.init({
   	  	offset: 300,
   	  	duration: 1000,
        once:true
   	  });

      var i=0;
      function read(){
        if(!i){
          document.getElementById("more").style.
          display="inline";
          document.getElementById("read").innerHTML="Read Less";
          i=1;        
          
        }
        else{
          document.getElementById("more").style.
          display="none";
          document.getElementById("read").innerHTML="Read More";
          i=0;        
          
        }  
      }

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
    // if(window.history.replaceState){
    //   window.history.replaceState(null,null,window.location.href);
    // }
    </script>
</body>
</html>
