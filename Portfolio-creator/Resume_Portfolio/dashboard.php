<?php 
$con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die("connection failed:");
  session_start();
  // if(!isset($_SESSION['uname'])){
  //   header('Location: login.php');
  // }
?>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/Resume.css">
    <link rel="stylesheet" href="css/fdbk.css">
    <link rel="stylesheet" href="css/style12.css">
    <link rel="stylesheet" type="text/css" href="css/res.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" type="text/javascript" charset="utf-8" async defer></script>
    <script src="javascript/jquery-3.5.1.js"></script>
    <style type="text/css">
       .lbs{
        text-transform: capitalize;
        font-family: monospace;
        color: cadetblue;
        display: block;
        text-align: left;
        padding: 0px 18px;
       }

       a,
a:hover,
a:focus{
    text-decoration: none;
    outline: none;
}

.admin-content .content-table{
    border: 4px solid #000;
    width: 100%;
    margin: 0 0 20px;
}
.admin-content .content-table thead{
    color: #fff;
    background-color: #333;
}

.admin-content .content-table th{
    padding: 10px;
    border: 1px solid #fff;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
}

.admin-content .content-table tbody{
    color: #333;
}

.admin-content .content-table tbody tr{
    background-color: #e7e7e7;
}
.admin-content .content-table tbody tr:nth-child(even){
    background-color: transparent;
}
.admin-content .content-table tbody td{
    padding: 10px;
    border: 1px solid #fff;
    text-align: center;

}

.admin-content .content-table tbody td:nth-child(2){
    text-align: left;
}
.admin-content .content-table tbody td:nth-child(3){
    text-align: left;
}
.admin-content .admin-heading{
    font-size: 35px;
    margin: 0 0 15px;
    font-family: 'Syne Mono';
    text-align: center;
}
/* Pagination  Styling */
.pagination {
    display: block;
    text-align: center;
    margin: 0;
}

.pagination li {
    display:inline-block;
    margin: 0 5px 0;
}

.pagination li a{
    border: none;
    background: #7e6080;
    color: #fff;
    width: 30px;
    height: 30px;
    border-radius: 5px;
}

.pagination li .b{
    border: none;
    background: #7e6080;
    color: #fff;
    width: 50px;
    height: 30px;
    border-radius: 5px;
}

.pagination li a:hover
,.pagination > li > a:focus{
    color:#fff;
    background:#333;
}

.pagination li  a.active,.pagination li  a:focus{
    color:#fff !important;
    background:#5cb85c !important;
}
.admin-content .admin-pagination{
    margin: 0;
}
.admin-content .admin-pagination li a{
    display: block;
}

.admin-content .admin-heading{
    font-size: 35px;
    margin: 0 0 15px;
}
    </style>
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
              <button type="button" class="btn confirmbtn" id="yes">Yes</button>
            </div>
          </div>
      </div>

       <!-- Thanking page -->
       <div class="main d-none" id="thankpg">
         <div class="card">
                <i class="fas fa-quote-left fa-3x"></i>
                <i class="fas fa-quote-right fa-3x"></i>
                <div class="content">
                <p>
                  Thankyou for visiting our website <b>'PORTFOLIO CREATOR'</b>
                  we are fortunate to have a customer like you.<br>
                  share this with your friend also.
                </p>
                <p><b>--- We team members </b></p>
                </div>
      </div>
       </div>

    <!-- dashboard -->
    <div class="row middlediv" id="dash">
       <div class="col-2 left-menu p-0">
        <div>

          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <input type="file" name="uploadfile" id="fileLoader" value="" accept="image/jpeg, image/png" class="d-none">
            <input type="submit" name="imgsubmit" value="upload file" id="savedpic" class="d-none">
            <!-- <input type="file" id="fileLoader" name="files" title="Load File" accept="image/jpeg, image/png" class="d-none"/> -->
          </form>
          <?php 
             if(isset($_POST['imgsubmit'])){
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                      if(empty($_POST['uploadfile'])){
                        $filename=$_FILES['uploadfile']['name'];
                        $tempname=$_FILES['uploadfile']['tmp_name'];
                        $folder="userimages/".$filename;
                        move_uploaded_file($tempname,$folder);
                      }else{
                        die();
                      }

                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
                          $sqlig="SELECT *FROM userimage WHERE userid='{$userid}';";
                          $res=mysqli_query($conn,$sqlig);

                      if(mysqli_num_rows($res)){
                          $sqlimg="UPDATE userimage SET img_source='{$folder}';";
                          $resultimg=mysqli_query($conn,$sqlimg) or die("Query failed2");
                          if($resultimg>0)
                          {
                             $msg='<div class="alert alert-success message">Successfully updated</div>';
                          }else{
                            $msg= '<div class="alert alert-danger message">Not Updated</div>';
                          }

                      }else{ 
                          $sqlimg="INSERT INTO userimage(userid,img_source) VALUES('{$userid}','{$folder}');";
                          $sqlimg.="UPDATE userimage SET img_id=concat(img_abbres,img_num);";
                          $resultimg=mysqli_multi_query($conn,$sqlimg) or die("Query failed3");
                          if($resultimg>0)
                          {
                             $msg='<div class="alert alert-success message">Successfully Saved</div>';
                          }else{
                            $msg= '<div class="alert alert-danger message">Data Not Saved</div>';
                          }
                      }
                     }
                   }
                 }
          ?>

            <?php 
                      $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");
                      $imgpath="images/iconfinder_expand-color-web2-23_5049207.svg";
                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $imguserid = $row['userid'];
                          $sql="SELECT *FROM userimage WHERE userid='{$imguserid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result) > 0)
                          { $row=mysqli_fetch_assoc($result);
                            echo "<div class='upimg upload-photo'>
                                    <img src='".$row['img_source']."' >
                                 </div>";
                          }else{
                            echo "<div class='upimg upload-photo'>
                                    <img src='{$imgpath}'>
                                  </div>";
                          }
                         }
                        }
            ?>
            <h5 class="text-center text-light"><?php echo $_SESSION["uname"]; ?></h5> 
            <div class="text-center pt-3">
              <a href="login.php" class="logout"><i class="fas fa-power-off"></i></a>
            </div>

            <?php
                    global $msg;
                    echo $msg;
             ?>  
        </div>

        <!--user-->
        <?php 
               if($_SESSION['urole']==='0'){
        ?>
        <div style="margin-top: 1em;">
          <ul class="dashmenu p-0">
            <!-- <li class="but" style="text-align:center;"><a href="#dashbrd" style="color: #f0e68c;">DASHBOARD</a></li> -->
            <li class="but"><a href="#details"><i class="fas fa-database"></i>Details</a></li>
            <li class="but"><a href="#viewResume"><i class="fas fa-file"></i>Resume</a></li>
            <li class="but"><a href="#Tempdemo"><i class="fas fa-list-alt"></i>Template</a></li>
            <li class="but"><a href="#feedback"><i class="fas fa-comment"></i>Feedback</a></li>
            <li class="but"><a href="index.php"><i class="fas fa-home"></i></i>Home</a></li>
            <li class="but"><a href="#setting"><i class="fas fa-cog"></i>Settings</a></li>
            <!-- <li class="but"><a href="../index.html" class="logout"><i class="fas fa-sign-out-alt"></i>Logout</a></li> -->
          </ul>
        </div>
           <?php 
              } 
            ?>

        <!-- admin -->
        <?php 
         if($_SESSION['urole']==='1'){
        ?>
        <div style="margin-top: 1em;">
          <ul class="admindashmenu p-0">
            <li class="but"><a href="#admindetails"><i class="fas fa-database"></i>Details</a></li>
            <li class="but"><a href="#contactus"><i class="fas fa-phone-alt"></i>contactus</a></li>
             <li class="but"><a href="#adminfeedback"><i class="fas fa-comment"></i>Feedback</a></li>
            <li class="but"><a href="index.php"><i class="fas fa-home"></i></i>Home</a></li>
            <li class="but"><a href="#adminsetting"><i class="fas fa-cog"></i>Settings</a></li>
          </ul>
        </div>
        <?php 
              } 
            ?>

      </div>
      <div class="col-10 p-0" style="left: 16em;">
           
           <!--Dashboard-->
           <!-- <div id="dashbrd" class="mb-5">
             <h5 class="text-center m-4 ml-0 mr-0" style="font-family: cursive;font-size: x-large;">Welcome!! Here is your Dashboard</h5>
             
             <!- - Sucbscription Card - ->
             <div class="row" style="margin-top: 6em">
                <div class="paidimg">
                   <img src="images/undraw_pay_online_b1hk.svg" alt="subscribe">
                </div>
                <div class="col-9 offset-3 bg-warning validitycard">
                   <h4 class="subplan">Free| $0</h4>
                  <div class="paidcard position-relative">
                   <div class="paiddetails  mt-4">
                     <svg>
                       <circle cx="60" cy="60" r=60></circle>
                       <circle cx="60" cy="60" r=60></circle>
                     </svg>
                   </div>
                  <p class="daysleft">Unlimited</p>
                  <p class="subvalid">Validity</p>
                  <div class="planupgrade">
                    <table  class="features">
                        <tbody>
                          <tr>
                            <th colspan="2" class="text-center">Features</th>
                          </tr>
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
                    <button type="button" class="btn btn-danger" id="Subscribebtn">Subscribe</button>
                  </div>
                 </div> 
               </div>
             </div>

            <!- - transaction history - ->

               <div class="col-11 transchart">
                 <h4 class="text-center p-3 text-light">Transaction History</h4>
                 <table class="table table-bordered table-hover ml-4" id="transtable">
                   <thead>
                     <tr>
                       <th>Transaction id</th>
                       <th>Date</th>
                       <th>Subscription Plan</th>
                       <th>Card</th>
                       <th>Rupee</th>
                       <th>Status</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>123e123</td>
                       <td>12-04-2021</td>
                       <td>Monthly</td>
                       <td>Visa</td>
                       <td>$7.00</td>
                       <td>Success</td>
                     </tr>
                     <tr>
                       <td>123e123</td>
                       <td>12-04-2021</td>
                       <td>Monthly</td>
                       <td>Visa</td>
                       <td>$7.00</td>
                       <td>Success</td>
                     </tr>
                    </tbody>
                 </table>
                 <div class="paidimg historyimg">
                  <img src="images/undraw_online_ad_re_ol62.svg" alt="subscribe">
                 </div>
              </div> 
        </div> -->
             
            <!--Details-->
             <?php 
               if($_SESSION['urole']==='0'){
            ?>
            <div class="vh-100 rightdash" id="details">
              <h3 class="dashtitle">Details</h3>
              <?php 
                     $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
               ?>


              <!-- contact -->
              <div class="enteredinfo mb-5  ml-5" id="contedit">
              	<div>
              		<h4 class="d-inline-block p-3">Contact</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
                <div  class="p-2">
                  <?php
                          $sql="SELECT * FROM contact WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                  ?>
                	<table  width="97%" cellpadding="5px" class="conttable">
                   <?php $row=mysqli_fetch_assoc($result);  ?>
                			<tr>
                				<td>First Name</td>
                				<td><?php 
                          echo $row['first_name'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Last Name</td>
                				<td><?php 
                          echo $row['last_name'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Address</td>
                				<td><?php 
                          echo $row['addrerss'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>City</td>
                				<td><?php 
                          echo $row['city'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>State</td>
                				<td><?php 
                          echo $row['state'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Pincode</td>
                				<td><?php 
                          echo $row['pincode'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Contact Number</td>
                				<td><?php 
                          echo $row['mobile_no'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Email</td>
                				<td><?php 
                          echo $row['email_id'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Link</td>
                				<td><?php 
                          echo $row['link'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>DOB</td>
                				<td><?php 
                          echo $row['DOB'];
                        ?></td>
                			</tr>
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                </div>  
              </div>

              <!-- Objective -->
              <div class="enteredinfo mb-5 ml-5" id="objedit">
              	
              	<div>
              		<h4 class="d-inline-block p-3">Objective</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div  class="p-2">
                  <?php
                          $sql="SELECT * FROM objective WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                  ?>
                	<table  width="97%" cellpadding="5px" class="conttable">
                    <?php $row=mysqli_fetch_assoc($result);  ?>
                   <tr>
                     <td><?php
                      echo $row['summary'];
                     ?></td>
                   </tr> 
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                </div>  
              </div>

              <!-- Skills -->
              <div class="enteredinfo mb-5 ml-5" id="skilledit">
              	
              	<div>
              		<h4 class="d-inline-block p-3">Skills</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div  class="p-2">
                  <?php
                          $sql="SELECT soft_id FROM soft_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['soft_id'];
                            $skillsql="SELECT * FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                	<table  width="97%" cellpadding="5px" class="conttable">
                		<caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;">Soft Skills</caption>
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                			<tr>
                				<td><li><?php 
                          echo $row['softskills'];
                        ?></li></td>
                			</tr> 
                      <?php
                          }
                      ?>              		
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?>

                  <!--Hard skills table-->
                  <?php
                          $sql="SELECT hard_id FROM hard_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['hard_id'];
                            $skillsql="SELECT * FROM subhard_skills WHERE hard_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                  <table  width="97%" cellpadding="5px" class="conttable">
                    <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;">Hard Skills</caption>
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['sh_skill'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                  
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?>
                </div>  
              </div>

              <!-- Education -->
              <div class="enteredinfo mb-5 ml-5" id="eduedit">
              	
              	<div>
              		<h4 class="d-inline-block p-3">Education</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div  class="p-2">
                  <?php
                          $sql="SELECT edu_id FROM education WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['edu_id'];
                            $skillsql="SELECT * FROM subeducate WHERE edu_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                	<table  width="97%" cellpadding="5px" class="conttable">
                     <tbody>
                      <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;"><?php 
                       echo $row['degree'];
                      ?></caption>
                			<tr>
                				<td>School/university Name</td>
                				<td><?php
                          echo $row['sch_col_name'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>location</td>
                				<td><?php
                          echo $row['location'];
                        ?> 
                        </td>
                			</tr>
                			<tr>
                				<td>Degree</td>
                				<td><?php
                          echo $row['degree'];
                        ?>                                                   
                        </td>
                			</tr>
                			<tr> 
                				<td>Field of Study</td>
                				<td>
                        <?php
                          echo $row['field_of_study'];
                        ?>  
                        </td>
                			</tr>
                			<tr>
                				<td colspan="2" style="color: #6c757d;">Duration</td>
                			</tr>
                			<tr>
                				<td class="pl-3">start</td>
                				<td><?php
                          echo $row['start_year'];
                        ?>
                        </td>
                			</tr>
                			<tr>
                				<td class="pl-3">End</td>
                				<td><?php
                          echo $row['end_year'];
                        ?>           
                        </td>
                			</tr>
                			<tr>
                				<td>Percentage</td>
                				<td>
                          <?php
                          echo $row['percentage'];
                          ?>
                        </td>
                			</tr>
                      </tbody> 
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?>
                </div>  
              </div>

              <!-- Experience -->
              <div class="enteredinfo mb-5 ml-5" id="expedit">	
              	<div>
              		<h4 class="d-inline-block p-3">Experience</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div  class="p-2">
                  <?php
                          $sql="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['exp_id'];
                            $skillsql="SELECT * FROM subexperience WHERE exp_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                	<table  width="97%" cellpadding="5px" class="conttable">
                     <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;"><?php 
                       echo $row['designation'];
                      ?></caption>
                			<tr>
                				<td>Designation</td>
                				<td><?php 
                         echo $row['designation'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Organization</td>
                				<td><?php 
                         echo $row['organization'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Location</td>
                				<td><?php 
                         echo $row['location'];
                        ?></td>
                			</tr>
                			<tr>
                				<td colspan="2" style="color: #6c757d;">Duration</td>
                			</tr>
                			<tr>
                				<td class="pl-3">start</td>
                				<td><?php 
                         echo $row['start_yrs'];
                        ?></td>
                			</tr>
                			<tr>
                				<td class="pl-3">End</td>
                				<td><?php 
                         echo $row['end_yrs'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Description</td>
                				<td><?php 
                         echo $row['description'];
                        ?></td>
                			</tr>
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?>
                </div>  
              </div>

              <!-- interest -->
              <div class="enteredinfo mb-5 ml-5" id="intedit">
              	
              	<div>
              		<h4 class="d-inline-block p-3">Interest</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
                <?php
                          $sql="SELECT int_id FROM interest WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['int_id'];
                            $skillsql="SELECT * FROM subinterest WHERE int_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                  <table  width="97%" cellpadding="5px" class="conttable">
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['intname'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                  
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?>  
              </div>

              <!-- Achievements -->
              <div class="enteredinfo mb-5 ml-5" id="achedit">
              	<div>
              		<h4 class="d-inline-block p-3">Achievement And Responsibility</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div class="p-2">
                	<?php
                          $sql="SELECT resach_id FROM resp_achieve WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['resach_id'];
                            $skillsql="SELECT * FROM subres_achieve WHERE resach_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                  <table  width="97%" cellpadding="5px" class="conttable">
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['resach_name'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                  
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?> 
                </div>  
              </div>

              <!-- Project -->
              <div class="enteredinfo  mb-5 ml-5" id="progedit">
              	
              	<div>
              		<h4 class="d-inline-block p-3">Project</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div  class="p-2">
                  <?php
                          $sql="SELECT proj_id FROM project WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['proj_id'];
                            $skillsql="SELECT * FROM subproject WHERE proj_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                	<table  width="97%" cellpadding="5px" class="conttable">
                    <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;"><?php 
                       echo $row['projname'];
                      ?></caption>
                			<tr>
                				<td>Project Title</td>
                				<td><?php 
                          echo $row['projname'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Client Name</td>
                				<td><?php 
                          echo $row['clientname'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>URL</td>
                				<td><?php 
                          echo $row['urls'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Projrct Status</td>
                				<td><?php 
                          echo $row['progress'];
                        ?></td>
                			</tr>
                			<tr>
                				<td colspan="2" style="color: #6c757d;">Duration</td>
                			</tr>
                			<tr>
                				<td class="pl-3">start</td>
                				<td><?php 
                          echo $row['start_yrs'];
                        ?></td>
                			</tr>
                			<tr>
                				<td class="pl-3">End</td>
                				<td><?php 
                          echo $row['end_yrs'];
                        ?></td>
                			</tr>
                			<tr>
                				<td>Description</td>
                				<td><?php 
                          echo $row['description'];
                        ?></td>
                			</tr>
                      </table><hr>
                     <?php
                           }   
                          }else{
                            echo "result not found";
                          }
                     ?> 
                </div>  
              </div>

              <!-- Language -->
              <div class="enteredinfo mb-5 ml-5" id="langedit">
              	<div>
              		<h4 class="d-inline-block p-3">Language</h4>
              		<a href="#" class="ml-auto" style="margin-right: 3em;"><i class="fas fa-pen popupedit"></i></a>
              	</div><hr class="m-0" style="border-color: black;">
              	<div  class="p-2">
                  <?php
                          $sql="SELECT lang_id FROM language WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['lang_id'];
                            $skillsql="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   ?>
                  <table border="1" width="97%" cellpadding="5px" class="conttable text-center">
                    <thead>
                      <tr>
                        <th>Language</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Speak</th>
                      </tr>
                    </thead>
                    <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                    <tbody>
                      <tr>
                        <td><?php 
                          echo $row['langname'];
                         ?></td>
                         <?php  
                           $str=$row['lread'];
                           $rwsarray=explode(',',$str);
                           $size=count($rwsarray);
                           $i=0;
                           while($i<3){
                         ?>
                        <td><?php
                         switch($size){
                         case 3: if($rwsarray[$i]==='read')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='write')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='speak')
                                  echo 'Yes';
                              break;
                        case 2: if($i<2){ 
                                if($rwsarray[$i]==='read')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='write')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='speak')
                                  echo 'Yes';
                                 else
                                  echo "No";
                               }
                               else
                                echo "No";
                             break;      
                        case 1: if($i<1){ 
                                if($rwsarray[$i]==='read')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='write')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='speak')
                                  echo 'Yes';
                                 else
                                  echo "No";
                               }
                               else
                                echo "No";
                             break;       
                        }                 
                        ?></td>
                        <?php
                           $i++; 
                          }
                        ?>
                      </tr>
                    </tbody>
                    <?php
                      }
                    ?>
                  </table>
                	<?php   
                          }else{
                            echo "result not found";
                          }
                     ?> 
                </div>  
              </div>
              <?php 
                 }
               }
              ?>
            </div>
              <?php 
                }
              ?>
            
             <!-- admin -->
             <?php 
               if($_SESSION['urole']==='1'){
             ?>
                 
            <div id="admindetails" class="admin-content bg-light vh-100 rightdash">
              <div class="row">
                  <div class="col-md-11 ml-4">
                    <h1 class="admin-heading">All Users</h1>
                  </div>
                  <div class="col-md-11 ml-5">
                   <?php
                    $con = mysqli_connect("localhost","root","","resume_portfolio") or die("connection failed".mysqli_connect_error());// database configuration
                  $limit = 2;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
                  // $sql = "SELECT * FROM contact ORDER BY userid DESC LIMIT {$offset},{$limit}";
        $sql="SELECT * FROM signup JOIN contact WHERE signup.userid=contact.userid ORDER BY contact.userid ASC LIMIT {$offset},{$limit}";
        $result = mysqli_query($con, $sql) or die("Query Failed.");
        if(mysqli_num_rows($result) > 0){
        ?>
        <table class="content-table">
        <thead>
        <th>S.No.</th>    
        <th>User id</th>
        <th>Email</th>
        <th>User name</th>
        <th>Role</th>
        <th>Name</th>
        <th>Address</th>
        <th>Mobile No.</th>
       <!--  <th>Comment</th> -->
        </thead>
        <tbody>
        <?php
        $serial = $offset + 1;
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td class='id'><?php echo $serial; ?></td>    
        <td><?php echo $row['userid']?></td>
        <td><?php echo $row['emailid']?></td>
        <td><?php echo $row['username']?></td>
        <td><?php
        if($row['role'] == 1){
        echo "Admin";
        }else{
        echo "Normal User";
        }
        ?></td>
        <td><?php echo $row['first_name']." ".$row['last_name']?></td>
        <td><?php echo $row['addrerss'].", ".$row['city'].", ".$row['state'].", ".$row['country'].", ".$row['pincode']?></td>
        <td><?php echo $row['mobile_no']?></td>
        <!-- <td><?php echo $row['comment']?></td> -->
        </tr>
        <?php
        $serial++;
        }
         ?>
        </tbody>
        </table>
        <?php
        }else {
        echo "<h3>No Results Found.</h3>";
        }
        // show pagination
                $sql1 = "SELECT * FROM signup JOIN contact WHERE signup.userid=contact.userid";
                $result1 = mysqli_query($con, $sql1) or die("Query Failed2.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);/*number of records*/

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a class="b" href="dashboard.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "pgactive";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a class="b" href="dashboard.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
        ?>
        </div>
  </div>   
</div>

  <?php 
    }
  ?>

            <!--******************-->
              <!--View Resume-->
            <!--******************-->  
              <!--user-->
               <?php 
                 if($_SESSION['urole']==='0'){
                ?>
            <div class="bg-light vh-100  d-none rightdash" id="viewResume">
            <!-- <div class="text-center mt-3">
                  <button class="btn btn-lg btn-warning dashtitle mt-3 mb-3 text-dark" id="download">Download</button>
                  </div>  -->
               <?php 
                     $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());

                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
               ?>

              <!--chronological Resume -->
              <div class="text-center mt-3 resumediv  chronological">
                  <button class="btn btn-lg btn-warning dashtitle mt-3 mb-3 text-dark download">Download</button>
              <div class="row resformat" id="chronoresume">
                  <div class="col-lg-3 offset-2 bg-dark text-white py-4">
                   <div class="header-center text-center">
                      <?php 
                      $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
                          $sqlimg="SELECT *FROM userimage WHERE userid='{$userid}';";
                          $resultimg=mysqli_query($conn,$sqlimg) or die("Query failed2");
                          if($resultimg)
                          { $row=mysqli_fetch_assoc($resultimg);
                           echo "<img src='".$row['img_source']."'  class='img-thumbnail rounded-circle m-4' width='150px' height='150px' style='max-width: 100%; width: 135px !important; height: 135px !important; border: 0px solid white !important;'>";
                          }
                         }
                        }
                    ?>
                      
                   </div>

                  <!-- **contact** -->
                  <div class="mt-5">
                      <div class="display-flex" style="color: #deb887;text-align: initial;">
                        <a href="#" class="ml-auto" style="margin-right:5px;color:#eed2ae; text-decoration: none; background-color: transparent;"><i class="fas fa-id-card-alt"></i></a>  
                        <h1 class="d-inline finalresh">CONTACT</h1><hr color="white">
                      </div>
                      <?php
                          $sql="SELECT * FROM contact WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                      ?>
                      <table  width="97%" cellpadding="5px" class="fetchtable m-1">
                      <?php $row=mysqli_fetch_assoc($result);  ?>
                        <tr>
                          <td  style="vertical-align: top; font-weight: 500;">Name</td>
                          <td  style="vertical-align: top; font-weight: 500;"><?php
                            echo $row['first_name']." ".$row['last_name'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top;">Address</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                            echo $row['addrerss']."<br>".$row['city'],", ".$row['pincode']."<br>".$row['state'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top;">Contact No.</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                           echo $row['mobile_no'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top;">Email</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                           echo $row['email_id'];
                          ?></td>
                        </tr>
                        <tr>
                         <td  style="vertical-align: top;">Link</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                           echo $row['link'];
                          ?></td>
                        </tr>
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                  </div><!--contact end-->

                  <!-- **Skill** -->
                  <div class="mt-5">
                      <div class="display-inline" style="color: #deb887;text-align: initial;">
                        <a href="#" class="ml-auto" style="margin-right: 5px;color:#eed2ae; text-decoration: none; background-color: transparent;"><i class="fas fa-tools"></i></a>  
                        <h1 class="d-inline finalresh">SKILLS </h1><hr color="white">
                      </div>
                      <?php
                          $sql="SELECT soft_id FROM soft_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['soft_id'];
                            $skillsql="SELECT * FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                     ?>
                      <table  width="97%" cellpadding="5px" class="fetchtable m-1">
                          <caption style="caption-side: top; color:#cac1c1;"><u>Soft Skills</u></caption>
                          <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['softskills'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>

                      <!--Hard skill-->
                      <?php
                          $sql="SELECT hard_id FROM hard_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['hard_id'];
                            $skillsql="SELECT * FROM subhard_skills WHERE hard_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                      <table  width="97%" cellpadding="5px" class="fetchtable m-1">
                          <caption style="caption-side: top; color:#cac1c1;"><u>Hard Skills</u></caption>
                          <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                        <tr>
                        <td><li><?php 
                          echo $row['sh_skill'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                  </div><!--skill end-->

                  <!-- **interest** -->
                  <div class="mt-5">
                      <div class="display-inline" style="color: #deb887;text-align: initial;">
                        <a href="#" class="ml-auto" style="margin-right: 5px;color:#eed2ae; text-decoration: none; background-color: transparent;"><i class="fas fa-icons"></i></a>  
                        <h1 class="d-inline finalresh">INTEREST </h1><hr color="white">
                      </div>
                      <?php
                          $sql="SELECT int_id FROM interest WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['int_id'];
                            $skillsql="SELECT * FROM subinterest WHERE int_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                      ?>
                      <table class="fetchtable m-1">
                        <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                          <tr>
                        <td><li><?php 
                          echo $row['intname'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                  </div><!--interest end-->

                  <!-- **Language** -->
                  <div class="mt-5"> 
                      <div class="display-inline" style="color: #deb887;text-align: initial;">
                            <a href="#" class="ml-auto" style="margin-right: 5px;color:#eed2ae; text-decoration: none; background-color: transparent;"><i class="fas fa-language"></i></a> 
                            <h1 class="d-inline finalresh">LANGUAGE</h1><hr color="white">
                      </div>
                       <?php
                          $sql="SELECT lang_id FROM language WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['lang_id'];
                            $skillsql="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   ?> 
                      <table class="fetchtable m-1">
                          <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                          <tr>
                        <td><li><?php 
                          echo $row['langname'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                  </div><!--language end--> 

                  <!-- **Objective** -->
                </div>
          <div class="col-lg-5 text-dark py-4" style="background-color:#CDCDCF; text-align: initial;">
                <div>
                    <div class="display-inline">
                        <a href="#" class="ml-auto" style="margin-right: 5px;text-decoration: none; background-color: transparent; color:#4b4848;"><i class="fas fa-bullseye"></i></a> 
                        <h1 class="d-inline finalresh">OBJECTIVE</h1><hr style="border-color: white;">
                    </div>
                    <?php
                          $sql="SELECT * FROM objective WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                  ?>
                  <table width="97%" cellpadding="5px" class="m-1" style="font-size: 15px;">
                    <?php $row=mysqli_fetch_assoc($result);  ?>
                   <tr>
                     <td><?php
                      echo $row['summary'];
                     ?></td>
                   </tr> 
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>    
                </div><!--objective end-->

                <!-- **Education** -->
                <div class="mt-5">
                <!--<hr color="black">--> 
                    <div class="display-inline">
                          <a href="#" class="ml-auto" style="margin-right: 5px;text-decoration: none; background-color: transparent; color:#4b4848;"><i class="fas fa-user-graduate"></i></a>  
                          <h1 class="d-inline finalresh">EDUCATION</h1><hr style="border-color: white;">
                    </div> 
                    <?php
                          $sql="SELECT edu_id FROM education WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['edu_id'];
                            $skillsql="SELECT * FROM subeducate WHERE edu_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                  <table  width="97%" cellpadding="2px" class="m-1" style="font-size: 15px;">
                     <tbody>
                      <!-- <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;"><?php 
                       echo $row['field_of_study'];
                      ?></caption> -->
                      <tr>
                        <td style="font-size: 19px; font-weight: 500; color: #5f9ea0;">
                        <?php
                          echo $row['field_of_study'];
                        ?>  
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 17px; font-weight: 500;"><?php
                          echo $row['sch_col_name'].", ".$row['location'];;
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_year']));
                          $startmonth = date('F',strtotime($row['start_year']));
                          $endyear = date('Y',strtotime($row['end_year']));
                          $endmonth = date('F',strtotime($row['end_year']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="font-weight: 500;" class="pt-2">
                          <?php
                          echo "Percentage: ".$row['percentage']."%";
                          ?>
                        </td>
                      </tr>
                      </tbody> 
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?> 
            </div><!--education end-->

            <!-- **Experience** -->
            <div class="mt-5">
                  <div>
                      <a href="#" class="ml-auto" style="margin-right: 5px;text-decoration: none; background-color: transparent; color:#4b4848;"><i class="fas fa-briefcase"></i></a>  
                      <h1 class="d-inline finalresh">EXPERIENCE</h1><hr style="border-color: white;">  
                  </div>
                  <?php
                          $sql="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['exp_id'];
                            $skillsql="SELECT * FROM subexperience WHERE exp_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                  <table  width="97%" cellpadding="5px" class=" m-1" style="font-size: 15px;">
                     <!-- <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;"><?php 
                       echo $row['designation'];
                      ?></caption> -->
                      <tr style="font-size: 19px; font-weight: 500; color: #5f9ea0;">
                        <td><?php 
                         echo $row['designation'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 17px; font-weight: 500;"><?php 
                         echo $row['organization'].", ".$row['location'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_yrs']));
                          $startmonth = date('F',strtotime($row['start_yrs']));
                          $endyear = date('Y',strtotime($row['end_yrs']));
                          $endmonth = date('F',strtotime($row['end_yrs']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td><?php 
                         echo $row['description'];
                        ?></td>
                      </tr>
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?>  
                  <!--experience end--> 
          </div>

          <!-- **Project** -->
          <div class="mt-5">
                  <div class="display-inline">
                      <a href="#" class="ml-auto" style="margin-right: 5px;text-decoration: none; background-color: transparent; color:#4b4848;"><i class="fas fa-project-diagram"></i></a>  
                      <h1 class="d-inline finalresh">PROJECT</h1><hr style="border-color: white;">
                  </div> 
                  <?php
                          $sql="SELECT proj_id FROM project WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['proj_id'];
                            $skillsql="SELECT * FROM subproject WHERE proj_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                  <table  width="97%" cellpadding="5px" class=" m-1" style="font-size: 15px;">
                    <!-- <caption style="caption-side: top;font-size: large;font-weight: 500;text-decoration: underline;color: #8bb1bf;"><?php 
                       echo $row['projname'];
                      ?></caption> -->
                      <tr>
                        <td style="font-size: 19px; font-weight: 500; color: #5f9ea0;"><?php 
                          echo $row['projname'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 15px; font-weight: 400;">
                         <a href="<?php echo $row['urls'];?>"><?php echo $row['urls'];?> </a>
                       </td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_yrs']));
                          $startmonth = date('F',strtotime($row['start_yrs']));
                          $endyear = date('Y',strtotime($row['end_yrs']));
                          $endmonth = date('F',strtotime($row['end_yrs']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo "Project Status - ".$row['progress'];
                        ?></td>
                      </tr>

                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo "Client Name - ".$row['clientname'];
                        ?></td>
                      </tr>
                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo $row['description'];
                        ?></td>
                      </tr>
                      </table><hr>
                     <?php
                           }   
                          }else{
                            echo "result not found";
                          }
                     ?>  
            </div><!--project end-->

            <!-- **Achievement** -->
            <div class="mt-5">
                  <div class="display-inline">
                        <a href="#" class="ml-auto" style="margin-right: 5px;text-decoration: none; background-color: transparent; color:#4b4848;"><i class="fas fa-award"></i></a>  
                        <h1 class="d-inline finalresh">ACHIEVEMENT</h1><hr style="border-color: white;">
                  </div>  
                  <?php
                          $sql="SELECT resach_id FROM resp_achieve WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['resach_id'];
                            $skillsql="SELECT * FROM subres_achieve WHERE resach_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                  <table  width="97%" cellpadding="5px" class=" m-1" style="font-size: 15px;">
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['resach_name'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                  
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?> 
            </div><!--achievement end-->  
          </div>
         </div>
       </div>
          <?php
             }
          }
         ?>
              

        <!-- functional Resume -->
        <div class="text-center d-none mt-3 resumediv functional">
           <button class="btn btn-lg btn-warning dashtitle mt-3 mb-3 text-dark download">Download</button>
         <div class="row  " id="functionalresume">
          <div class="col-md-8 offset-2"  style="background: #E4E5E9" >
           <div class="header col-md-12">
            <?php
                          $sql="SELECT * FROM contact WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
            ?>
            <table class="float-right" width="100%" cellpadding="5px">
                     <?php $row=mysqli_fetch_assoc($result);  ?>
                    <tr>
                        <td>
                         <table class="" style="text-align:right;margin-left: auto;">
                        <tr>
                          <td  style="vertical-align: top; font-weight: 400;"><?php
                            echo $row['addrerss']."<br>".$row['city'],", ".$row['pincode']."<br>".$row['state'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top; font-weight: 400;"><?php
                           echo $row['mobile_no'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top; font-weight: 400;"><?php
                           echo $row['email_id'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top; font-weight: 400;">
                           <a href="<?php echo $row['link'];?>"><?php echo $row['link'];?> </a>
                          </td>
                        </tr>
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>   
                      </td>
                     </tr>

                     <tr class=" bg-primary">  
                        <td style="font-size: xx-large; font-weight: 400;width: 50%;text-align: center;">
                        <?php 
                         echo $row['first_name']." ".$row['last_name'];
                        ?>
                        </td>
                    </tr>  
            </table>        
           </div>
      <div class="col-md-12"><!--skill start-->
        
           <table width="97%" cellpadding="5px" class="m-2">
                <tr>
                  <td style="vertical-align: top;width: 15em;"><h1 class="finalresh">SKILLS</h1></td>   
                  <td>
                    <?php
                          $sql="SELECT soft_id FROM soft_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['soft_id'];
                            $skillsql="SELECT * FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                    ?>
                    <table width="97%" cellpadding="5px">
                      <caption style="caption-side: top;"><u>Soft Skills</u></caption>
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['softskills'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>

                      <!-- Hard skills -->
                      <?php
                          $sql="SELECT hard_id FROM hard_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['hard_id'];
                            $skillsql="SELECT * FROM subhard_skills WHERE hard_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                    ?>
                    <table width="97%" cellpadding="5px">
                      <caption style="caption-side: top;"><u>Hard Skills</u></caption>
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                        <tr>
                        <td><li><?php 
                          echo $row['sh_skill'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>                
                  </td> 
                  </tr>               
                </table>
      <hr style="border-color: white;height: 7px;"> 
      </div><!--skill end-->
      <div class="col-md-12"><!--interest start-->
        <table width="97%" cellpadding="5px" class="m-2">
                <tr> 
                  <td style="width: 15em;">   
                    <h1 class="finalresh" style="vertical-align: top;">INTEREST</h1>
                  </td>
                  <td>
                    <?php
                          $sql="SELECT int_id FROM interest WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['int_id'];
                            $skillsql="SELECT * FROM subinterest WHERE int_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                      ?>
                    <table width="97%" cellpadding="5px">
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                    <tr>
                        <td><li><?php 
                          echo $row['intname'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                    </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?> 
                    </td>
                </tr> 
        </table> 
         <hr style="border-color: white;height: 7px;">   
    </div><!--interest end-->

    <!--language start-->
    <div class="col-md-12">
        <table width="97%" cellpadding="5px" class="m-2">
              <tr>
                   <td style="vertical-align: top;width: 15em;"><h1  class="finalresh">LANGUAGE</h1></td> 
                   <td> 
                   <?php
                          $sql="SELECT lang_id FROM language WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['lang_id'];
                            $skillsql="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   ?> 

                          
                    <table width="97%" cellpadding="5px">
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                    <tr>
                        <td><li><?php 
                          echo $row['langname'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?> 
                    </td>
              </tr>
        </table>
    <hr style="border-color: white;height: 7px;">
    </div><!--language end-->

     <!--objective start-->
        <div class="col-md-12">
          <table width="97%" cellpadding="5px" class="m-2"> 
                    <tr>    
                       <td style="vertical-align: top;width: 15em;"><h1 class="finalresh">OBJECTIVE</h1></td>
                      <td>
                        <?php
                          $sql="SELECT * FROM objective WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                  ?>
                      <table width="97%" cellpadding="5px">
                        <?php $row=mysqli_fetch_assoc($result);  ?>
                      <tr>
                     <td><?php
                      echo $row['summary'];
                     ?></td>
                   </tr> 
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
                      </td>
                    </tr>
         </table>
   <hr style="border-color: white;height: 7px;">
   </div><!--objective end-->


   <!--edu strt-->
     <div class="col-md-12">
          <table width="97%" cellpadding="5px" class="m-2">
                    <tr>   
                      <td  style="vertical-align: top;width: 15em;"><h1 class="finalresh">EDUCATION</h1></td>
                      <td>
                        <?php
                          $sql="SELECT edu_id FROM education WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['edu_id'];
                            $skillsql="SELECT * FROM subeducate WHERE edu_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                         while($row=mysqli_fetch_assoc($skillresult)){  ?>
                        <table width="97%" cellpadding="5px">
                        <tr>
                        <td style="font-size: 19px; font-weight: 500; color: #5f9ea0;">
                        <?php
                          echo $row['field_of_study'];
                        ?>  
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 17px; font-weight: 500;"><?php
                          echo $row['sch_col_name'].", ".$row['location'];;
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_year']));
                          $startmonth = date('F',strtotime($row['start_year']));
                          $endyear = date('Y',strtotime($row['end_year']));
                          $endmonth = date('F',strtotime($row['end_year']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="font-weight: 500;" class="pt-2">
                          <?php
                          echo "Percentage: ".$row['percentage']."%";
                          ?>
                        </td>
                      </tr>
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?> 
                  </td>
                </tr>
              </table>
     <hr style="border-color: white;height: 7px;"> 
            </div><!--education end-->
            <div class="col-md-12">
            <table width="97%" cellpadding="5px" class="m-2">
                    <tr>    
            <td style="vertical-align: top;width: 15em;"><h1 class="finalresh">EXPERIENCE</h1></td>  
            <td>
            <?php
                          $sql="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['exp_id'];
                            $skillsql="SELECT * FROM subexperience WHERE exp_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
            <table width="97%" cellpadding="5px">
                      <tr style="font-size: 19px; font-weight: 500; color: #5f9ea0;">
                        <td><?php 
                         echo $row['designation'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 17px; font-weight: 500;"><?php 
                         echo $row['organization'].", ".$row['location'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_yrs']));
                          $startmonth = date('F',strtotime($row['start_yrs']));
                          $endyear = date('Y',strtotime($row['end_yrs']));
                          $endmonth = date('F',strtotime($row['end_yrs']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td><?php 
                         echo $row['description'];
                        ?></td>
                      </tr>
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?>    
                    </td>
                    </tr>
                    </table><!--experience end-->
                    <hr style="border-color: white;height: 7px;"> 
            </div>
          <div class="col-md-12">
          <table width="97%" cellpadding="5px" class="m-2">
                    <tr>    
            <td style="vertical-align: top;width: 15em;"><h1  class="finalresh" >PROJECT</h1></td>
              <td> 
              <?php
                          $sql="SELECT proj_id FROM project WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['proj_id'];
                            $skillsql="SELECT * FROM subproject WHERE proj_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      
                  <table width="97%" cellpadding="5px">
                      <tr>
                        <td style="font-size: 19px; font-weight: 500; color: #5f9ea0;"><?php 
                          echo $row['projname'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 15px; font-weight: 400;">
                         <a href="<?php echo $row['urls'];?>"><?php echo $row['urls'];?> </a>
                       </td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_yrs']));
                          $startmonth = date('F',strtotime($row['start_yrs']));
                          $endyear = date('Y',strtotime($row['end_yrs']));
                          $endmonth = date('F',strtotime($row['end_yrs']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo "Project Status - ".$row['progress'];
                        ?></td>
                      </tr>

                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo "Client Name - ".$row['clientname'];
                        ?></td>
                      </tr>
                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo $row['description'];
                        ?></td>
                      </tr>
                      </table><hr>
                     <?php
                           }   
                          }else{
                            echo "result not found";
                          }
                     ?>  
                    </td>
                    </tr>
                    </table>
                    <hr style="border-color: white;height: 7px;">
          </div><!--project end-->
          <div class="col-md-12">
           <table width="97%" cellpadding="5px" class="m-2">
                     <tr> 
                    <td style="vertical-align: top;width: 15em;"><h1 class="finalresh">ACHIEVEMENT</h1></td>
                      <td>  
                        <?php
                          $sql="SELECT resach_id FROM resp_achieve WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['resach_id'];
                            $skillsql="SELECT * FROM subres_achieve WHERE resach_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
                      <table width="97%" cellpadding="5px">
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['resach_name'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                  
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?> 
                      </td>
                      </tr>
          </table>
              
          </div><!--achievement end--> 
    </div>
  </div>
</div>

<!-- </div> -->




 <!-- Combination Resume -->
 <div class="text-center mt-3 resumediv d-none  combination">
   <button class="btn btn-lg btn-warning dashtitle mt-3 mb-3 text-dark download">Download</button>       
  <div class="row" id="wrapper" id="combineresume">
    <div class="col-md-8 offset-2"  style="background: #E4E5E9" >
    <div id="header">
      <div class="text-center">
         <?php 
                      $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                      $logemail = trim($_SESSION['uemail']);
                      $sql1 = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                      $result1 = mysqli_query($conn,$sql1) or die("Query failed1");

                      if(mysqli_num_rows($result1) > 0){
                        while($row=mysqli_fetch_assoc($result1)){
                          $userid = $row['userid'];
                          $sqlimg="SELECT *FROM userimage WHERE userid='{$userid}';";
                          $resultimg=mysqli_query($conn,$sqlimg) or die("Query failed2");
                          if($resultimg)
                          { $row=mysqli_fetch_assoc($resultimg);
                           echo "<img src='".$row['img_source']."'  class='img-thumbnail rounded-circle m-4' width='150px' height='150px' style='max-width: 100%;margin: 11px 33px !important; width: 135px !important; height: 135px !important; border: 0px solid white !important;'>";
                          }
                         }
                        }
                    ?>
      </div>
      <div>
        <?php
                          $sql="SELECT * FROM contact WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
        ?>
        <table class="float-right" width="100%" cellpadding="5px">
                     <?php $row=mysqli_fetch_assoc($result);  ?>
                     <tr>
                        <td style="text-align: -webkit-center;">
                         <table class="" style="text-align:left;align-items: right;">
                          <tr>
                            <td><h1>
                           <?php 
                              echo $row['first_name']." ".$row['last_name'];
                            ?></h1><hr id="underline" color="white">                             
                            </td>
                          </tr>

                        <tr>
                          <td class="resheader"><?php
                           echo $row['email_id'];
                          ?></td>
                        </tr>
                        <tr>
                          <td class="resheader"><?php
                            echo $row['addrerss']."<br>".$row['city'],", ".$row['state']." - ".$row['pincode'];
                          ?></td>
                        </tr>
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>   
                      </td>
                     </tr>  
            </table>        
        <!-- <h1 id="name">Soumya Jaiswal</h1>
        <hr id="underline" color="white">
        <h5>soumyajaiswal1999@gmail.com</h5>
        <h5 id="web">Malsalami, Nandgola , Patna Ghat  Patna City  Patna-800008 , Bihar.</h5> -->
      </div>
    
    </div><!--end header-->

    <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh">CONTACT</h4>
        <div>
          <?php
                          $sql="SELECT * FROM contact WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                  ?>
          <table  width="97%" cellpadding="5px" class="conttable m-4">                    
            <?php $row=mysqli_fetch_assoc($result);  ?>
                     <tr>
                          <td  style="vertical-align: top; font-weight: 500;">Name</td>
                          <td  style="vertical-align: top; font-weight: 500;"><?php
                            echo $row['first_name']." ".$row['last_name'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top;">Address</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                            echo $row['addrerss']."<br>".$row['city'],", ".$row['pincode']."<br>".$row['state'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top;">Contact No.</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                           echo $row['mobile_no'];
                          ?></td>
                        </tr>
                        <tr>
                          <td  style="vertical-align: top;">Email</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                           echo $row['email_id'];
                          ?></td>
                        </tr>
                        <tr>
                         <td  style="vertical-align: top;">Link</td>
                          <td  style="vertical-align: top; font-weight: 100;"><?php
                           echo $row['link'];
                          ?></td>
                        </tr>
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
              </div>
      </div>
    </div><!--end of contact-->



    <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh">OBJECTIVE</h4>
        <div>
          <?php
                          $sql="SELECT * FROM objective WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          
                          if(mysqli_num_rows($result)>0){
                          
                  ?>
        <table width="97%" cellpadding="5px" class="conttable m-4">
          <?php $row=mysqli_fetch_assoc($result);  ?>
                      <tr>
                     <td><?php
                      echo $row['summary'];
                     ?></td>
                   </tr> 
        </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                      ?> 
        </div>
      </div>
    </div><!--end of obective-->


    <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh"> EXPERIENCE</h4>
        <div>
           <?php
                          $sql="SELECT exp_id FROM experience WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['exp_id'];
                            $skillsql="SELECT * FROM subexperience WHERE exp_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                      while($row=mysqli_fetch_assoc($skillresult)){  ?>
          <table  width="97%" cellpadding="5px" class="conttable m-4">
                      <tr style="font-size: 19px; font-weight: 500; color: #5f9ea0;">
                        <td><?php 
                         echo $row['designation'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 17px; font-weight: 500;"><?php 
                         echo $row['organization'].", ".$row['location'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_yrs']));
                          $startmonth = date('F',strtotime($row['start_yrs']));
                          $endyear = date('Y',strtotime($row['end_yrs']));
                          $endmonth = date('F',strtotime($row['end_yrs']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td><?php 
                         echo $row['description'];
                        ?></td>
                      </tr>
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?>    
        </div>
      </div>
    </div><!--End of experience-->
        
        <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh"> EDUCATION</h4>
        <div>
          <?php
                          $sql="SELECT edu_id FROM education WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['edu_id'];
                            $skillsql="SELECT * FROM subeducate WHERE edu_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                         while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      
        <table  width="97%" cellpadding="5px" class="conttable m-4">
                      <tr>
                        <td style="font-size: 19px; font-weight: 500; color: #5f9ea0;">
                        <?php
                          echo $row['field_of_study'];
                        ?>  
                        </td>
                      </tr>
                      <tr>
                        <td style="font-size: 17px; font-weight: 500;"><?php
                          echo $row['sch_col_name'].", ".$row['location'];;
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_year']));
                          $startmonth = date('F',strtotime($row['start_year']));
                          $endyear = date('Y',strtotime($row['end_year']));
                          $endmonth = date('F',strtotime($row['end_year']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="font-weight: 500;" class="pt-2">
                          <?php
                          echo "Percentage: ".$row['percentage']."%";
                          ?>
                        </td>
                      </tr>
                      </table><hr> 
                      <?php 
                           }  
                          }else{
                            echo "result not found";
                          }
                      ?> 
                      
        </div>
      </div>
    </div><!--end of education-->




        <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh">SKILLS</h4>
        <div>
                  <?php
                          $sql="SELECT soft_id FROM soft_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['soft_id'];
                            $skillsql="SELECT * FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                    ?>
                  <table  width="97%" cellpadding="5px" class="conttable m-4">
                    <caption style="caption-side: top;"><u>Soft Skills</u></caption>
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['softskills'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>

                      <!-- Hard skills -->
                      <?php
                          $sql="SELECT hard_id FROM hard_skills WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['hard_id'];
                            $skillsql="SELECT * FROM subhard_skills WHERE hard_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                    ?>
                      <table  width="97%" cellpadding="5px" class="conttable m-4">
                    <caption style="caption-side: top;"><u>Hard Skills</u></caption>
                      <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                        <tr>
                        <td><li><?php 
                          echo $row['sh_skill'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>          
        </div>
      </div>
    </div><!--end of skills-->

    <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh mt-2">INTEREST</h4>
        <div class="m-4">
          <?php
                          $sql="SELECT int_id FROM interest WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['int_id'];
                            $skillsql="SELECT * FROM subinterest WHERE int_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                      ?>
        <table>
          <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                          <tr>
                        <td><li><?php 
                          echo $row['intname'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                
                      </table>
                      <?php   
                          }else{
                            echo "result not found";
                          }
                      ?>
        </div>
      </div>
    </div><!--end of interest-->


    <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh mt-2">ACHIEVEMENT</h4>
        <div class="m-4">
          <?php
                          $sql="SELECT resach_id FROM resp_achieve WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['resach_id'];
                            $skillsql="SELECT * FROM subres_achieve WHERE resach_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                  ?>
        <table>
          
<?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                      <tr>
                        <td><li><?php 
                          echo $row['resach_name'];
                        ?></li></td>
                      </tr> 
                      <?php
                          }
                      ?>                  
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                  ?> 
        </table>
        </div>
      </div>
    </div><!--end of achivement-->



        <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh mt-2">PROJECT</h4>
        <div>
          <?php
                          $sql="SELECT proj_id FROM project WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['proj_id'];
                            $skillsql="SELECT * FROM subproject WHERE proj_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   while($row=mysqli_fetch_assoc($skillresult)){  ?>
        <table  width="97%" cellpadding="5px" class="conttable m-4">
                      <tr>
                        <td style="font-size: 19px; font-weight: 500; color: #5f9ea0;"><?php 
                          echo $row['projname'];
                        ?></td>
                      </tr>
                      <tr>
                        <td style="font-size: 15px; font-weight: 400;">
                         <a href="<?php echo $row['urls'];?>"><?php echo $row['urls'];?> </a>
                       </td>
                      </tr>
                      <tr>
                        <td style="font-size: 13px; font-style: italic;"><?php
                          $startyear = date('Y',strtotime($row['start_yrs']));
                          $startmonth = date('F',strtotime($row['start_yrs']));
                          $endyear = date('Y',strtotime($row['end_yrs']));
                          $endmonth = date('F',strtotime($row['end_yrs']));
                          echo $startmonth."/".$startyear." - ".$endmonth."/".$endyear;
                        ?>
                        </td>
                      </tr>
                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo "Project Status - ".$row['progress'];
                        ?></td>
                      </tr>

                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo "Client Name - ".$row['clientname'];
                        ?></td>
                      </tr>
                      <tr style="font-weight: 400;">
                        <td><?php 
                          echo $row['description'];
                        ?></td>
                      </tr>
                      </table><hr>
                     <?php
                           }   
                          }else{
                            echo "result not found";
                          }
                     ?>  
        </div>
      </div>
    </div><!--end of project-->


        <div class="row">
      <div class="col-md-12">
        <h4 id="exp" class="finalresh mt-2">LANGUAGE</h4>
        <div>
          <?php
                          $sql="SELECT lang_id FROM language WHERE userid='{$userid}';";
                          $result=mysqli_query($conn,$sql) or die("Query failed2");
                          if(mysqli_num_rows($result)>0){
                            $row=mysqli_fetch_assoc($result);
                            $frnkey=$row['lang_id'];
                            $skillsql="SELECT *FROM sublangauge WHERE lang_id='{$frnkey}';";
                            $skillresult=mysqli_query($conn,$skillsql) or die("Query failed3");
                            if(mysqli_num_rows($skillresult)>0){
                          }
                   ?>
        <table border="1" width="97%" cellpadding="5px" class="conttable text-center m-4">
                    <thead>
                      <tr>
                        <th>Language</th>
                        <th>Read</th>
                        <th>Write</th>
                        <th>Speak</th>
                      </tr>
                    </thead>
                    <?php while($row=mysqli_fetch_assoc($skillresult)){  ?>
                    <tbody>
                      <tr>
                        <td><?php 
                          echo $row['langname'];
                         ?></td>
                         <?php  
                           $str=$row['lread'];
                           $rwsarray=explode(',',$str);
                           $size=count($rwsarray);
                           $i=0;
                           while($i<3){
                         ?>
                        <td><?php
                         switch($size){
                         case 3: if($rwsarray[$i]==='read')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='write')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='speak')
                                  echo 'Yes';
                              break;
                        case 2: if($i<2){ 
                                if($rwsarray[$i]==='read')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='write')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='speak')
                                  echo 'Yes';
                                 else
                                  echo "No";
                               }
                               else
                                echo "No";
                             break;      
                        case 1: if($i<1){ 
                                if($rwsarray[$i]==='read')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='write')
                                  echo 'Yes';
                                 else if($rwsarray[$i]==='speak')
                                  echo 'Yes';
                                 else
                                  echo "No";
                               }
                               else
                                echo "No";
                             break;       
                        }                 
                        ?></td>
                        <?php
                           $i++; 
                          }
                        ?>
                      </tr>
                    </tbody>
                    <?php
                      }
                    ?>
                  </table>
                  <?php   
                          }else{
                            echo "result not found";
                          }
                     ?>
                  
        </div>
      </div>
    </div><!--end of language-->
    </div>
  </div>
</div>
</div>
<?php 
  }
?>
            
            <!--user-->
             <?php 
                 if($_SESSION['urole']==='0'){
             ?>
            <!--Template-->
            <div class="bg-light vh-100 d-none rightdash" id="Tempdemo">
              <h3 class="tempclass">Chose Template</h3>
             <div class="swiper-container" style=" margin-bottom: 6em;">
                <div class="swiper-wrapper">
                   <div class="swiper-slide" style="height: 111%;">
                      <img src="images/Screenshotresume.png" class="tempimg">
                      <button type="button" class="btn btn-lg btn-warning view d-none" id="chronological">View</button>
                   </div>
                   <div class="swiper-slide" style="height: 111%;">
                      <img src="images/Screenshotresume2.png" class="tempimg">
                      <button type="button" class="btn btn-lg btn-warning view d-none" id="functional">View</button>
                   </div>
                   <div class="swiper-slide" style="height: 111%;">
                       <img src="images/resume3.png" class="tempimg">
                       <button type="button" class="btn btn-lg btn-warning view d-none" id="combination">View</button>
                   </div>
                </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination"></div>
              <!-- Add Arrows -->
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
            </div>
            </div>
            <?php 
             }
            ?>
            
             <?php 
                if($_SESSION['urole']==='0'){
             ?>
            <!--Setting-->
            <div class="bg-light vh-100  d-none rightdash" id="setting">
             <div class="row" style="align-items: center;">
               <?php
                $_REQUEST['msg']='';
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT *FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){  
                // mysqli_close($conn);
              ?>
              <div class="col-6 mt-5">
               <div class="row setdiv">
                 <div class="col-5">Username</div>
                 <div class="col-5 font-weight-lighter"><?php echo $row['username']; ?></div>
               </div>
               <div class="row setdiv">
                 <div class="col-5">Password</div>
                 <div class="col-5 font-weight-lighter"><?php echo $row['password']; ?></div>
               </div>
               <div class="row setdiv">
                 <div class="col-5">Email</div>
                 <div class="col-5 font-weight-lighter"><?php echo $row['emailid']; ?></div>
               </div>
              <!--  <div class="row setdiv">
                <div class="col-5">Mode</div>
                <div class="col-5">
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
               </div> -->
               <!-- <div class="row mt-5">
                 <div class="col change pl-5 ml-5"><a href="#">Change settings</a></div>
               </div> -->
              </div>
               <?php 
                 } } 
              ?>
              <div class="col-5 settingimg">
                <img src="images/undraw_settings_ii2j.svg">
              </div>
            </div>
           </div> 

            <?php 
              } 
            ?>


            <?php 
                if($_SESSION['urole']==='1'){
             ?>
            <!--Setting-->
            <div class="bg-light vh-100  d-none rightdash" id="adminsetting">
             <div class="row" style="align-items: center;">

              <?php
                $_REQUEST['msg']='';
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $sql1 = "SELECT *FROM signup WHERE emailid LIKE '{$logemail}';";
                  $result1 = mysqli_query($conn,$sql1) or die("Query failed");
                  if(mysqli_num_rows($result1) > 0){
                    while($row=mysqli_fetch_assoc($result1)){  
                // mysqli_close($conn);
              ?>
              <div class="col-6 mt-5">
               <div class="row setdiv">
                 <div class="col-5">Username</div>
                 <div class="col-5 font-weight-lighter"><?php echo $row['username']; ?></div>
               </div>
               <div class="row setdiv">
                 <div class="col-5">Password</div>
                 <div class="col-5 font-weight-lighter"><?php echo $row['password']; ?></div>
               </div>
               <div class="row setdiv">
                 <div class="col-5">Email</div>
                 <div class="col-5 font-weight-lighter"><?php echo $row['emailid']; ?></div>
               </div>
              <!--  <div class="row setdiv">
                <div class="col-5">Mode</div>
                <div class="col-5">
                  <label class="switch">
                    <input type="checkbox">
                    <span class="slider round"></span>
                  </label>
                </div>
               </div> -->
               <!-- <div class="row mt-5">
                 <div class="col change pl-5 ml-5"><a href="#">Change settings</a></div>
               </div> -->
              </div>
              <?php 
                 } } 
              ?>
              <div class="col-5 settingimg">
                <img src="images/undraw_settings_ii2j.svg">
              </div>
            </div>
           </div> 

            <?php 
              } 
            ?>


        <!--Contactus admin -->
        <?php 
         if($_SESSION['urole']==='1'){
        ?>
        <div class="admin-content bg-light vh-100  d-none rightdash" id="contactus">
            <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Users Queries</h1>
              </div>
              <div class="col-md-11 ml-5">
                <?php
                  $con= mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());// database configuration
                  /* Calculate Offset Code */
                  $limit = 2;/*how much record to show in one page*/
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;/*page- on which page it is. offset- ke bd se strt hoga*/
                  /* select query of feedback table with offset and limit */
                  $sql = "SELECT *FROM contactus ORDER BY c_id ASC LIMIT {$offset},{$limit}";
                  $result = mysqli_query($con, $sql) or die("Query Failed1.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                         <!--  <th>user_id</th> -->
                          <th>c_id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Message</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <!-- <td><?php echo $row['user_id'] ; ?></td> -->
                              <td><?php echo $row['c_id'] ; ?></td>
                              <td><?php echo $row['name']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['mobile']; ?></td>
                              <td><?php echo $row['message']; ?></td>
                          </tr>
                        <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                $sql1 = "SELECT *FROM contactus";
                $result1 = mysqli_query($con, $sql1) or die("Query Failed2.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);/*number of records*/

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a class="b" href="dashboard.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){/*kitne page honge uske aaccdng loop chl raha h*/
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a class="b" href="dashboard.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
                  </div>
                </div>
        </div>   
        <?php 
          }
        ?>
 
        <!-- user feedback -->
        <?php
           if($_SESSION['urole']==='0'){
        ?>

         <div class="row vh-100 rightdash justify-content-center d-none mt-2 ml-1" id="feedback" style="background-image: url(images/Lockscreen.jpg);background-size: cover;    overflow-y: auto;">
            <div class="col-12 col-md-8 col-lg-6 bg">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="text-center frmfeed" style="border-radius: 0px 173px; background:rgba(128,128,128,0.2);">
            <div class="banner-title text-center">
            <h1 class="title">Feedback</h1>
            <p class="mt-3 display-5"> <!--class="text-white"-->
            <b>We would love to hear your thoughts,concerns or problem<br>
               with anything so we can improve.</b>
            </p>
            </div>
            <div class="form-group  mt-4">
            <label class="col-sm-4 sr-only">Username</label>
            <input type="text" class="form-control-lg col-sm-6 col-lg-8 a fedfrm" placeholder="Enter Email" id="email" autocomplete="off" required 
                  name="emailid">
                  </div>
                  <div class="form-group mt-4">
                  <label class="col-sm-4 sr-only">Username</label>
                  <textarea class="form-control-lg col-sm-6 col-lg-8 fedfrm h-25 rounded-50 shadow-textarea b" placeholder="comment down your views..." id="text" required autocomplete="off" name="cmnt"></textarea>
                  </div>
                  <div class="rating">
                  <p class="text-center display-5"><b>Please let us know about your experience</b></p>
                  <div class="wrapper display col-11 mt-4">
                  <!--<input type="radio" name="emoji" value="like">-->
                  <div class="emoji">
                  <div class="emoji1" data-title="like">
                  <i class="fas fa-thumbs-up" style="font-size: 1em;"></i><br>
                  </div>
                  </div>
                  <!--<input type="radio" name="emoji" value="love">--> 
                  <div class="emoji">
                  <!--<input type="radio" name="emoji" value="love">-->
                  <div class="emoji2" data-title="love">
                  <i class="fas fa-heart" style="font-size: 1em;"></i>
                </div>
                </div>
                <!--<input type="radio" name="emoji" value="haha">--> 
                <div class="emoji">
                <!--<input type="radio" name="emoji" value="haha">-->
                <div class="emoji3" data-title="haha">
                  <i class="fas fa-laugh-squint" style="font-size: 0.9em;"></i>
                </div>
                </div>
                <!--<input type="radio" name="emoji" value="wow">-->  
                <div class="emoji">
                <!--<input type="radio" name="emoji" value="wow">-->
                <div class="emoji4" data-title="wow">
                  <i class="fas fa-surprise" style="font-size: 0.9em;"></i>
                </div>
                </div>
                <!--<input type="radio" name="emoji" value="sad">-->  
                <div class="emoji">
                <!--<input type="radio" name="emoji" value="sad">-->  
                <div class="emoji5" data-title="sad">
                <i class="fas fa-sad-tear" style="font-size: 0.9em;"></i>
                </div>
                </div>
                <!--<input type="radio" name="emoji" value="angry">-->
                <div class="emoji">
                <!--<input type="radio" name="emoji" value="angry"> -->
                <div class="emoji6" data-title="angry">
                <i class="fas fa-angry" style="font-size: 0.9em;"></i>
              </div>
              </div>
              </div>
              <div class="oo">
                <input type="radio" name="emoji" value="like">
                <input type="radio" name="emoji" value="love">
                <input type="radio" name="emoji" value="haha">
                <input type="radio" name="emoji" value="wow">
                <input type="radio" name="emoji" value="sad">
                <input type="radio" name="emoji" value="angry">
              </div>
              </div>
              <div>
              <button type="submit" class="btn fedbtn mt-5 mb-3 col-sm-4 col-lg-6 c" name="fdbk">Submit</button>
            </div>
            </form>

            <?php
              $_REQUEST['msg']='';
              if(isset($_POST['fdbk'])){
                 $con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                $logemail = trim($_SESSION['uemail']);
                if(!(empty($_POST['emailid']) && empty($_POST['cmnt']) && empty($_POST['emoji']) ))
                  {            
                  $emailid= mysqli_real_escape_string($con,$_POST['emailid']);
                  $cmnt = mysqli_real_escape_string($con,$_POST['cmnt']);
                  $emoji = mysqli_real_escape_string($con,$_POST['emoji']); 
                  }
                  else{
                  die();
                  }
  
                $sql = "SELECT userid FROM signup WHERE emailid = '{$logemail}';";
                $result = mysqli_query($con, $sql) or die("Query Failed.");
                if(mysqli_num_rows($result) > 0)
                  {
                    while($row=mysqli_fetch_assoc($result))
                   {
                    $userid = $row['userid'];
                    $sql1= "INSERT INTO feedback(userid,email,comment,reaction) VALUES('{$userid}','{$emailid}','{$cmnt}','{$emoji}');";
                    $sql1.="UPDATE feedback SET fdbk_id=concat(fabbrs,fnum);";
                    $result1 = mysqli_multi_query($con,$sql1) or die("Query failed2");
                    
                    if($result1){
                     $msg = '<div class="alert alert-success message">Successfully Saved</div>';
                     
                    }else{ 
                    $msg ='<div class="alert alert-danger message">Data Not Saved</div>';
                     
                     }
                    }
                  }
                }
                    //mysqli_close($con);
                ?>
                <?php
                  global $msg;
                  echo $msg;
                ?>
                </div>
            </div>
            <?php 
              }
            ?>



          <!-- admin feedback -->
        <?php
           if($_SESSION['urole']==='1'){
        ?>
         <div class="admin-content vh-100 rightdash d-none" id="adminfeedback">
           <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Users feedback</h1>
              </div>
              <div class="col-md-12">
                <?php
                  $con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());// database configuration
                  /* Calculate Offset Code */
                  $limit = 2;/*how much record to show in one page*/
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;/*page- on which page it is. offset- ke bd se strt hoga*/
                  /* select query of feedback table with offset and limit */
                  $sql = "SELECT * FROM feedback ORDER BY userid ASC LIMIT {$offset},{$limit}";
                  $result = mysqli_query($con, $sql) or die("Query Failed.");
                  if(mysqli_num_rows($result) > 0){
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Userid</th>
                          <th>Feedback id</th>
                          <th>Email</th>
                          <th>Comment</th>
                          <th>Reaction</th>
                      </thead>
                      <tbody>
                        <?php
                          $serial = $offset + 1;
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr>
                              <td class='id'><?php echo $serial; ?></td>
                              <td><?php echo $row['userid'] ; ?></td>
                              <td><?php echo $row['fdbk_id']; ?></td>
                              <td><?php echo $row['email']; ?></td>
                              <td><?php echo $row['comment']; ?></td>
                              <td><?php echo $row['reaction']; ?></td>
                          </tr>
                        <?php
                          $serial++;
                        } ?>
                      </tbody>
                  </table>
                  <?php
                }else {
                  echo "<h3>No Results Found.</h3>";
                }
                // show pagination
                $sql1 = "SELECT * FROM feedback";
                $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $total_records = mysqli_num_rows($result1);/*number of records*/

                  $total_page = ceil($total_records / $limit);

                  echo '<ul class="pagination admin-pagination">';
                  if($page > 1){
                    echo '<li><a class="b" href="dashboard.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){/*kitne page honge uske aaccdng loop chl raha h*/
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="'.$active.'"><a href="dashboard.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li><a class="b" href="dashboard.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }
                  ?>
              </div>
          </div>
      </div>
  </div>

        <?php
          }
        ?>

        </div> 
      </div>


      <!-- Edit Forms-->
      <div class="row middlediv d-none" id="editfrm">
      
      <!--Contact us Edit Forms-->
      <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate" id="contactfrm">
              <h3 class="mt-4 mb-4 text-center">Add Your Contact Information</h3>
              <?php 
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                    while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                     $sql1="SELECT *FROM contact WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     while($row=mysqli_fetch_assoc($result1)){
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="p-2 mb-1 text-center">
               <div class="form-row">
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>">
                <div class="form-group col">
                  <label for="firstName" class="col-md-5"><em class="lbs">First Name</em>
                    <input type="text" name="Fname" id="firstName" placeholder="First Name" class="form-control form-input contfield" required autocomplete="off" value="<?php echo $row['first_name']?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  <label for="lastName" class="col-md-5"><em class="lbs">Last Name</em>
                    <input type="text" name="Lname" id="lastName" placeholder="Last Name" class="form-control contfield" required value="<?php echo $row['last_name']?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="address" class="col-md-10"><em class="lbs">Address</em>
                    <input type="text" name="Address" id="address" placeholder="Address" autocomplete="off" class="form-control input-lg contfield" required value="<?php echo $row['addrerss']?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="country" class="col-md-5"><em class="lbs">Country</em>
                    <input type="text" name="Country" id="country" list="countrylist" placeholder="Country" autocomplete="off" class="form-control contfield" required value="<?php echo $row['country']?>">
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
                  <label for="city" class="col-md-5"><em class="lbs">City</em>
                    <input type="text" name="City" id="city" placeholder="City" autocomplete="off" class="form-control contfield" required value="<?php echo $row['city']?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="state" class="col-md-5 "><em class="lbs">State</em>
                    <input type="text" name="State" id="state" list="statelist" placeholder="State" class="form-control contfield" required value="<?php echo $row['state']?>">
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
                  <label for="pin" class="col-md-5"><em class="lbs">PIN Number</em>
                    <input type="text" name="PIN" id="pin" placeholder="PIN Code" class="form-control contfield" required value="<?php echo $row['pincode']?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                 </label>
                </div>  
                <div class="form-group col-12">
                  <label for="phoneno" class="col-md-5"><em class="lbs">Phone Number</em>
                    <input type="text" name="Phone" id="phoneno" placeholder="Contact Number" class="form-control contfield" autocomplete="off" required value="<?php echo $row['mobile_no']?>">
                   <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                 </label>
                  <label for="emailid" class="col-md-5"><em class="lbs">Email</em>
                    <input type="text" name="Email" id="emailid" placeholder="Email" class="form-control contfield" required value="<?php echo $row['email_id']?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                </div>
                <div class="form-group col-12">
                  <label for="link" class="col-md-10"><em class="lbs">Link</em>
                    <input type="text" name="Links" id="link" placeholder="Link" class="form-control postion-relative links contfield" value="<?php echo $row['link']?>">
                  </label>
                </div> 
                  <div class="form-group col-12">
                    <label for="dob" class="col-md-6 p-0"><em class="lbs">DOB</em>
                      <input type="text" name="DOB" id="dob" placeholder="Date Of Birth" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input contfield" required value="<?php echo $row['DOB']?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>                 
                  </div> 
                <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="contsave" value="submit">Save</button></div>
                </div>
              </div> 
              </form>
              <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['contsave'])){
                  $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
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
                  
                  $sql="UPDATE contact SET first_name='{$Fname}', last_name='{$Lname}' ,addrerss='{$Address}',country='{$Country}',city='{$City}',state='{$State}',pincode='{$Pin}',mobile_no='{$Phone}',email_id='{$Email}',link='{$Links}',DOB='{$DOB}' WHERE userid='{$userid}';";
                  $result=mysqli_query($conn,$sql) or die('Query failed1');
                  
                  if($result){

                   echo '<div class="alert alert-success message">Update Successfully</div>';
                  }else{
                    echo '<div class="alert alert-success">Not Updated Successfully</div>';
                  }
                } 
                     }
                   }
                  }
                }
              ?>
            </div>

            <!-- Objective Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="objfrm">
              <h3 class="mt-4 mb-4 text-center">Add Objective</h3>
              <?php 
                 $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $logemail = trim($_SESSION['uemail']);
                  $consql = "SELECT userid FROM signup WHERE emailid LIKE '{$logemail}';";
                  $conresult = mysqli_query($conn,$consql) or die("Query failed1");
                  if(mysqli_num_rows($conresult) > 0){
                    while($urow=mysqli_fetch_assoc($conresult)){
                     $userid=$urow['userid'];
                     $sql1="SELECT *FROM objective WHERE userid='{$userid}';";
                     $result1 = mysqli_query($conn,$sql1) or die("Query failed2");
                     if(mysqli_num_rows($result1) > 0){
                     while($row=mysqli_fetch_assoc($result1)){
              ?> 
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>">
                  <div class="mb-4">
                     <textarea name="summary" rows="10" cols="70" placeholder="Type Here..." class="form-control p-4 objfield" required><?php echo $row['summary']?></textarea>
                     <div class="col-4 offset-8 wordcount">540 words left</div> 
                  </div>
                  <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="EditObjsave">Save</button></div>
                  </div>
              </form> 
              <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['EditObjsave'])){
                  $conn = mysqli_connect('localhost','root','','resume_portfolio','3306') or die('Connection Failed'.mysqli_connect_error());
                  $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
                  $summary = $_POST['summary'];
                  
                  $sql="UPDATE objective SET summary='{$summary}' WHERE userid='{$userid}';";
                  $result=mysqli_query($conn,$sql) or die('Query failed1');
                  
                  if($result){
                   echo '<div class="alert alert-success message">Update Successfully</div>';
                  }else{
                    echo '<div class="alert alert-success">Not Updated Successfully</div>';
                  }
                }
              ?>
              <?php 
                     }
                   }
                  }
                }
              ?>  
            </div>

            <!-- Skill Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="skillfrm">
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['soft_id'];

                     $sksql1="SELECT *FROM subsoft_skills WHERE soft_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                  <div class="position-relative skills">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>">
                      <label for="soft">List your most relevant Soft Skills</label><br>
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                        <?php  
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo $row['softskills']; ?></textarea>
                          <button type="submit" name="del" value="<?php echo $row['softskills']; ?>" class="delbtn" id="#<?php echo $row['softskills']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
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
                    <?php
                    global $msg;
                    echo $msg;
                    ?>
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
                    $skillsql = 'SELECT COUNT(*) FROM soft_skills;';
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
              <?php
                  }
                }
              ?> 
              </form>


              <!--Hard skill-->
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['hard_id'];

                     $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">   
                  <div class="mt-5 mb-5 position-relative skills">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>">
                      <label for="hard">Hard Skills</label>
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                         <?php  
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
                      <input type="text" name="hardskill" id="hard" placeholder="Typing..." autocomplete="off" class="form-control col-12 ">
                      <i class="fas fa-plus position-absolute skilladded"></i>
                  </div>
                  <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="hardsave">Save</button></div>
                  </div>
                  <?php
                    global $msg;
                    echo $msg;
                    ?>
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
                    $skillsql = 'SELECT COUNT(*) FROM hard_skills;';
                    $skillresult = mysqli_query($conn,$skillsql);

                    if((mysqli_fetch_row($skillresult)[0])==0){
                     $subsql1='';
                     $sql= "INSERT INTO hard_skills(userid) VALUES('{$userid}');";
                     $sql.="UPDATE hard_skills SET hard_id=concat(habbrs,hnum);";
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

                      $softid1 ="SELECT hard_id FROM hard_skills WHERE hard_skills.userid=$userid;";
                      $resultid = mysqli_query($conn,$softid1) or die("Query failed2"); 
                      

                      if(mysqli_num_rows($resultid) > 0){
                       while($row=mysqli_fetch_assoc($resultid)){
                         $foreignid=$row['hard_id'];
                         $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
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
                                }
                              }
                     }
                    }
                    else{
                      $subsql2='';
                      $i=0;
                      $softid2 ="SELECT hard_id FROM hard_skills WHERE hard_skills.userid=$userid;";
                      $resultid2 = mysqli_query($conn,$softid2) or die("Query failed1");
                      
                      if(mysqli_num_rows($resultid2) > 0){
                       while($row=mysqli_fetch_assoc($resultid2)){
                         $foreignid=$row['hard_id'];
                         $sksql1="SELECT *FROM subhard_skills WHERE hard_id='{$foreignid}';";
                              $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
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
                  <?php
                  }
                }
              ?> 
              </form>  

            </div>  



             <!-- Education Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="edufrm">
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['edu_id'];
                     
                     $sksql1="SELECT *FROM subeducate WHERE edu_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>
            <div class="colldiv"> 
             <button type="button" class="btn collapsible position-relative">
             <?php echo $row['degree']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center d-none">
                <button type="submit" name="edudel" value="<?php echo $row['degree']; ?>" class="delbtn" id="#<?php echo $row['degree']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
                  <!-- <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>"> -->
                  <div class="form-group col-12">
                    <label for="schname" class="col-md-5 pl-0"><em class="lbs">School/University Name</em>
                      <input type="text" name="schoolname" id="schname" placeholder="Name" class="form-control form-input edufield" required value="<?php echo $row['sch_col_name']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                    <label for="schlocation" class="col-md-5 p-0"><em class="lbs">Location</em>
                      <input type="text" name="schoolloc" id="schlocation" placeholder="Location" class="form-control form-input edufield" required  value="<?php echo $row['location']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="degree" class="col-md-5 pl-0"><em class="lbs">Degree</em>
                      <input type="text" list="deg" name="Degree" id="degree" placeholder="Degree" class="form-control form-input edufield" required value="<?php echo $row['degree']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                      <datalist id="deg">
                        <option value="10th">10th</option>
                        <option value="12th">12th</option>
                        <option value="Undergraduate">Undergraduate</option>
                        <option value="Postgraduate">Postgraduate</option>
                        <option value="other">other</option>
                      </datalist>
                    </label>
                    <label for="FieldOS" class="col-md-5 p-0"><em class="lbs">Field of Study</em>
                      <input type="text" name="FieldofStudy" id="FieldOS" placeholder="Field of Study" class="form-control form-input edufield" required value="<?php echo $row['field_of_study']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <p style="color: #008080; font-weight: 500;">Duration</p>
                    <label for="year" class="col-md-5 pl-0"><em class="lbs">Start</em>
                    <input type="text" name="PassingstartYear"  placeholder="Start" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input edufield" required value="<?php echo $row['start_year']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                    <label for="year" class="col-md-5 pl-0"><em class="lbs">End</em>
                    <input type="text" name="PassingendYear"  placeholder="End" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input edufield" required value="<?php echo $row['end_year']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>                    
                  </div> 
                  <div class="form-group col-12">
                    <label for="percentage" class="col-md-5 p-0"><em class="lbs">Percentage</em>
                      <input type="text" name="Percentage" id="percentage" placeholder="Percentage" class="form-control form-input edufield" required value="<?php echo $row['percentage']; ?>">
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div> 

                  <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="edusave">Save</button></div>
                  </div> 
               </div> 
              </form>
             </div> 

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
               <?php
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

            <div class="colldiv" id="eduextra"> 
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
                    <p style="color: #008080; font-weight: 500;">Duration</p>
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
                  <div class="col-2 offset-5 mt-3"><button type="submit"  class="btn detailsave" name="eduinsert">Save</button></div>
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

                    $edusql = 'SELECT COUNT(*) FROM education;';
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
                      $row=mysqli_fetch_assoc($resultid);
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
                                }
                    }
                    else{
                      $edusql2='';
                      $eduid2 ="SELECT edu_id FROM education WHERE education.userid=$userid;";
                      $resultid = mysqli_query($conn,$eduid2) or die("Query failed2"); 
                      $row=mysqli_fetch_assoc($resultid);
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
                // mysqli_close($conn);
              ?>
               <?php
                    global $msg;
                    echo $msg;
             ?> 
             <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center">
              <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light anotheredu">+ Add Another Education</button>
              </div>
            </form>
            </div>



             <!-- Experience Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="expfrm">
              <h3 class="mt-4 text-center">Add your Work History</h3>
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['exp_id'];
                     
                     $sksql1="SELECT *FROM subexperience WHERE exp_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>
             <div class="colldiv"> 
               <button type="button" class="btn collapsible position-relative"><?php echo $row['designation']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center d-none">
                <button type="submit" name="expdel" value="<?php echo $row['organization']; ?>" class="delbtn" id="#<?php echo $row['organization']; ?>"><i class="fas fa-trash-alt"></i>
                </button>
                  <div class="form-group col-12">
                    <label for="desig" class="col-md-10 p-0"><em class="lbs">Your Designation</em>
                      <input type="text" name="Designation" id="desig" placeholder="Your Designation" class="form-control form-input expfield" required value="<?php echo $row['designation']; ?>">
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>       
                  </div>
                  <div class="form-group col-12">
                    <label for="orgn" class="col-md-10 p-0"><em class="lbs">Your Organization</em>
                    <input type="text" name="Organization" id="orgn" placeholder="Your Organization" class="form-control form-input expfield" required value="<?php echo $row['organization']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>
                  <div class="form-group col-12">
                    <label for="orgnloc" class="col-md-10 p-0"><em class="lbs">Organization Location</em>
                    <input type="text" name="OrganizationLoc" id="orgnloc" placeholder="Organization Location" class="form-control form-input expfield" required value="<?php echo $row['location']; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="workstart" class="col-md-5 pl-0"><em class="lbs">Started Working From</em>
                    <input type="text" name="workstart"  placeholder="Started Working From" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input expfield" required value="<?php echo $row['start_yrs']; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                    <label for="workend" class="col-md-5 pl-0"><em class="lbs">Worked Till</em>
                    <input type="text" name="workend"  placeholder="Worked Till" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input expfield" required value="<?php echo $row['end_yrs']; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>                
                  <div class="form-group col-12">
                    <textarea name="jobprofile" rows="5" class="form-control col-10 offset-1 p-4 expfield" placeholder="Describe your job profile" required><?php echo $row['description']; ?></textarea>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </div>
                  <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="expsave">Save</button></div>
                  </div> 
              </form> 
              </div> 

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
              <?php
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

            <div class="colldiv" id="eduextra"> 
               <button type="button" class="btn collapsible position-relative d-none">Experience</button>
                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                  <button type="submit" name="expdel" value="<?php echo $row['organization']; ?>" class="delbtn d-none" id="#<?php echo $row['organization']; ?>"><i class="fas fa-trash-alt"></i></button>
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

                    $expsql = 'SELECT COUNT(*) FROM experience;';
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
              <?php
                    global $msg;
                    echo $msg;
               ?> 
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center">
              <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light anotheredu">+ Add Another Experience</button>
              </div> 
            </form>
            </div>

            <!-- Interest Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="intfrm">
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['int_id'];

                     $sksql1="SELECT *FROM subinterest WHERE int_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
              ?>
              <h3 class="mt-4 mb-4 text-center">Add your Interest</h3>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                  <div class="position-relative skills mb-5">
                    <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>">
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;">
                         <?php  
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo $row['intname']; ?></textarea>
                          <!-- <a href="#" type="submit" name="del"><i class="fas fa-trash-alt"></i></a> -->
                          <button type="submit" name="intdel" value="<?php echo $row['intname']; ?>" class="delbtn" id="#<?php echo $row['intname']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
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
                  <div class="col-12"><button type="submit" class="btn detailsave" name="intsave">Save</button></div>
                  </div>
                  
              <!--interest php-->
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
                    $skillsql = 'SELECT COUNT(*) FROM interest;';
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
                  <?php
                  }
                }
              ?> 

                  <?php
                    global $msg;
                    echo $msg;
                    ?>
              </form> 


            </div>


            <!-- Achievement Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="achfrm">
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['resach_id'];

                     $sksql1="SELECT *FROM subres_achieve WHERE resach_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
              ?>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <div class="form-row">
                  <div class="form-group col-12">
                    <div class="position-relative skills mb-5">
                      <div class="skillcontainer col-12 m-1 p-0" style="overflow-y:scroll;height:279px;">
                         <?php  
                        if(mysqli_num_rows($skresult1) > 0){
                        while($row=mysqli_fetch_assoc($skresult1)){
                        ?>
                        <div class="skilllist position-relative">
                          <i class="fas fa-circle"></i>
                          <textarea type="text" name="softskill[]" class="form-control col-12 added" role="textbox" contenteditable readonly><?php echo $row['resach_name']; ?></textarea>
                          <!-- <a href="#" type="submit" name="del"><i class="fas fa-trash-alt"></i></a> -->
                          <button type="submit" name="achdel" value="<?php echo $row['resach_name']; ?>" class="delbtn" id="#<?php echo $row['resach_name']; ?>"><i class="fas fa-trash-alt"></i></button>
                      </div>
                      <?php
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
                  <div class="col-12"><button type="submit" class="btn detailsave" name="resachsave">Save</button></div>
                  </div>
                                <!--Resp_Achieve php-->
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
                    $skillsql = 'SELECT COUNT(*) FROM resp_achieve;';
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
                  <?php
                  }
                }
              ?> 

                  <?php
                    global $msg;
                    echo $msg;
                    ?>
              </form>  
            </div>


            <!-- Project Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="projfrm">
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
                     $srow=mysqli_fetch_assoc($result1);
                     $frnkey=$srow['proj_id'];
                     
                     $sksql1="SELECT *FROM subproject WHERE proj_id='{$frnkey}';";
                     $skresult1 = mysqli_query($conn,$sksql1) or die("Query failed2");
                     if(mysqli_num_rows($skresult1) > 0){
                            while($row=mysqli_fetch_assoc($skresult1)){
              ?>

             <div class="colldiv"> 
               <button type="button" class="btn collapsible position-relative"><?php echo $row['projname']; ?><i class="fas fa-plus expand"></i><i class="fas fa-minus d-none expand"></i></button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center  d-none">
                <button type="submit" name="projdel" value="<?php echo $row['projname']; ?>" class="delbtn" id="#<?php echo $row['projname']; ?>"><i class="fas fa-trash-alt"></i></button>
                <!-- <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['userid']; ?>"> -->
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="projname" class="col-md-10 p-0"><em class="lbs">Project Title</em>
                      <input type="text" name="ProjectName" id="projname" placeholder="Project Title" class="form-control form-input projfield" required value="<?php echo $row['projname']; ?>">
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label> 
                  </div>
                  
                  <div class="form-group col-12">
                    <label for="clientname" class="col-md-10 p-0"><em class="lbs">Client Name</em>
                      <input type="text" name="Projassoc" id="clientname" placeholder="Client Name" class="form-control form-input projfield" required value="<?php echo $row['clientname']; ?>">
                      <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    </label>
                  </div>
                  <div class="form-group col-12">
                    <label for="projlink" class="col-md-10 p-0"><em class="lbs">URL</em>
                    <input type="text" name="noticeperiod" id="projlink" placeholder="URL" class="form-control form-input projfield" required value="<?php echo $row['urls']; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </label>
                  </div>
                  <div class="form-group form-check col-6 ml-4">                    
                    <p class="text-left ml-5">Project Status</p><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                    <label  class="col-md-5 p-0 form-check-label"><input type="radio" name="ProjStatus" class="form-check-input  projfield" value="inprogress" <?php if($row['progress']=='inprogress'){
                             echo "checked=\"checked\" ";
                       }?>>In Progress</label>
                    <label class="col-md-5 p-0 form-check-label"><input type="radio" name="ProjStatus" class="form-check-input  projfield" value="finished" <?php if($row['progress']=='finished'){
                      echo "checked=\"checked\" ";
                    } ?>>Finished</label>
                  </div>
                  <div class="form-group col-12">
                    <label for="workstart" class="col-md-5 pl-0"><em class="lbs">Started Working From</em>
                    <input type="text" name="projworkstart" id="workstart" placeholder="Started Working From" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input projfield" required value="<?php echo $row['start_yrs']; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                    <label for="workend" class="col-md-5 pl-0"><em class="lbs">Worked Till</em>
                    <input type="text" name="projworkend" id="workend" placeholder="Worked Till" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control form-input projfield" required value="<?php echo $row['end_yrs']; ?>">
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i></label>
                  </div>
                  <div class="form-group col-12">
                    <textarea name="projprofile" rows="5" cols='50' placeholder="Details of Project" required class="form-control col-10 offset-1 p-4 projfield"><?php echo $row['description']; ?></textarea>
                    <i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
                  </div>
                  <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="projsave">Save</button></div>
                  </div>
                </div>     
              </form> 
             </div>

             <!--Updation-->  
              <?php 
               $_REQUEST['msg']='';
                if(isset($_POST['projsave'])){
                  // $userid=mysqli_real_escape_string($conn,$_POST['user_id']);
                  $ProjectName = trim($_POST['ProjectName']);
                  $Projassoc =$_POST['Projassoc']; 
                  $noticeperiod= $_POST['noticeperiod'];
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
              <?php
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
              <div class="colldiv" id="eduextra"> 
               <button type="button" class="btn collapsible position-relative d-none">Experience</button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <button type="submit" name="projdel" value="<?php echo $row['projname']; ?>" class="delbtn d-none" id="#<?php echo $row['projname']; ?>"><i class="fas fa-trash-alt"></i></button>
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

                    $projsql = 'SELECT COUNT(*) FROM project;';
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
              <?php
                    global $msg;
                    echo $msg;
               ?> 
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center">
              <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light anotheredu">+ Add Another Project</button>
              </div>
              
            </form>
            </div>


            <!-- Language Edit form-->
            <div class="col-7 p-0 step1 ml-3 mt-3 contduplicate d-none" id="langfrm">
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
                <button type="submit" name="langdel" value="<?php echo $row['langname']; ?>" class="delbtn" id="#<?php echo $row['langname']; ?>"><i class="fas fa-trash-alt"></i></button>

                <div class="form-row">
                  <div class="form-group offset-1 col-10 pl-2">
                   <label for="lang" class="col-md-12 p-0"><em class="lbs">Language</em>
                    <input type="text" name="Language" list="langlist" id="lang" placeholder="Language" class="form-control form-input langfield" required value="<?php echo $row['langname']; ?>"><i class="fa fa-exclamation-circle d-none" aria-hidden="true"></i>
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

                  <div class="form-group col-12 form-inline">
                  <div class="col-12"><button type="submit" class="btn detailsave" name="langsave">Save</button></div>
                  </div>
                </div>
              </form>
            </div>

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
              <?php
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
              <div class="colldiv" id="eduextra"> 
               <button type="button" class="btn collapsible position-relative d-none">Language</button>
              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 mb-1 text-center">
                <button type="submit" name="langdel" value="<?php echo $row['langname']; ?>" class="delbtn d-none" id="#<?php echo $row['langname']; ?>"><i class="fas fa-trash-alt"></i></button>
                <div class="form-row">
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

                    $langsql = 'SELECT COUNT(*) FROM language;';
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
              <?php
                    global $msg;
                    echo $msg;
               ?>  

              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="utf-8" class="p-2 pt-4 mb-1 text-center">
              <div class="form-group col-12">
                    <button type="button" class="btn btn-danger m-4 text-light anotheredu">+ Add Another Language</button>
              </div> 
            </form>
            </div>
          </div> 
        </div>
        <!-- <?php 
            // session_unset();
            // session_destroy();
        ?> -->
    </div>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="javascript/jquery-3.5.1.js"></script>
  <script src="javascript/index.js"></script>
  <script src="pdf.js"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container',{        
        observer: true,
        observeParents: true,
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