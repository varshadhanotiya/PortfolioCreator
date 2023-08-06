<?php 
session_start();
?>
<html>
<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <link rel="stylesheet"  href="css/bootstrap.min.css">
    <link rel="stylesheet"  href="css/Resume.css">
    <link rel="stylesheet" href="css/res.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
    <style>
      .container-fluid{
        page-break-inside: auto;
        page-break-after: auto;
      }
      .icon{
        margin-right:5px;
        color:#eed2ae;
        text-decoration: none; 
        background-color: transparent;
      }
    </style>
</head>
<body>
    <div class="container-fluid">
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
              <div class="row resformat chronological">
                  <div class="col-3 bg-dark text-white py-4">
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
                           echo "<img src='".$row['img_source']."'  class='img-thumbnail rounded-circle m-4' width='150px' height='150px' style='max-width: 100%;'>";
                          }
                         }
                        }
                    ?>
                      
                   </div>

                  <!-- **contact** -->
                  <div class="mt-5">
                      <div class="display-flex" style="color: #deb887;">
                        <a href="#" class="ml-auto" class="icon"><i class="fas fa-id-card-alt"></i></a> 
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
                      <div class="display-inline" style="color: #deb887;">
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
                      <div class="display-inline" style="color: #deb887;">
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
                      <div class="display-inline" style="color: #deb887;">
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
                <div class="col-5 text-dark py-4" style="background-color:#CDCDCF; ">
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
          <?php
             }
          }
         ?>
    </div>
</body>
</html>
