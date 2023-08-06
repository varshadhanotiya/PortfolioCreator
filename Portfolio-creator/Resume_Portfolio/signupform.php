<?php
  $_REQUEST['msg']='';
?>
<html lang="en" class="h-100">
<head>
 <meta charset="utf-8">
 <title>Signup form</title>
 <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">

<?php include "link.php";?>
<link rel="stylesheet"  href="css/bootstrap.min.css">
<link rel="stylesheet" href=" css/styl1.css">
<!--<script type="text/javascript" src="cssjsfiles/jsf/value.js"></script>-->


<script type="text/javascript">
	$(function(){
     //$('[data-toggle="tooltip"]').tooltip();
    $('.a').tooltip({
    html:true,
    animation:false,
    delay:{"show":2000},
    trigger:"focus"
    });
	});
</script>
</head>

<body class="h-100">
<div class="container-fluid h-100" style="background:url('images/iPhone Wallpaper.jpg')no-repeat 0 0;background-size:cover;">
<div class="row h-100 justify-content-center align-items-center">
<div class="col-12 col-md-8 col-lg-6 bg">
<div class="text-center p-0">
<h1 class="title">Signup Form</h1>
</div>
<?php 
if(isset($_POST['save'])){
  $con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die("connection failed:");

  $username = mysqli_real_escape_string($con,$_POST['username']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $password1 = mysqli_real_escape_string($con,$_POST['password1']);
  $role = mysqli_real_escape_string($con,$_POST['role']);
  
  $sql = "SELECT username FROM signup WHERE username = '{$username}'";
  $result = mysqli_query($con, $sql) or die("Query Failed.");
  if(mysqli_num_rows($result)>0){
    echo '<div class="alert alert-dannger">Username already exist</div>';
  }else{
    if($role==='0'){
        $sql1 = "INSERT INTO signup (username,emailid, password,role) VALUES ('{$username}','{$email}','{$password}','{$role}');";
        $result=mysqli_query($con,$sql1);
        if($result){
          echo "<script type='text/javascript'>document.location.href='login.php';</script>";
        }else{
          echo '<div class="alert alert-danger">Cannot insert user</div>';
      }
    }else if($role==='1'){  
        echo '<div class="alert alert-danger message">Cannot Create Account. Role 1 is for Admin only</div>';
    }
  }
}//mysqli_close($con);
?>
<?php
                global $msg;
                echo $msg;
?>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST"  class="text-center mt-2 frm" id="form" style="border-radius: 0px 175px;">
<div class="form-group mt-2">
<label class="col-sm-4 sr-only">Username</label>
<input type="text" class="form-control-lg col-sm-5 col-lg-6 a" placeholder="Enter username" title="Username : lowercase,uppercase and space is allowed" id="username" name="username" autocomplete="off">
<i class="far fa-check-circle"></i>
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div class="form-group mt-2">
<label class="col-sm-4 sr-only">Email address</label>
<input type="text" class="form-control-lg col-sm-5 col-lg-6 a" placeholder="Enter email" title="Email"id="email" name="email" autocomplete="off">
<i class="far fa-check-circle"></i>
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div class="form-group mt-2">
<label class="col-sm-4 sr-only">Password</label>
<input type="password" class="form-control-lg col-sm-5 col-lg-6 a" placeholder="Enter password" title="password : Enter b/w 7 to 15 characters which should contain atleast one numeric digit and a special character"id="password" name="password" autocomplete="off">
<i class="far fa-check-circle"></i>
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div class="form-group sz mt-2">
<label class="col-sm-4 sr-only">Re-type password</label>
<input type="password" class="form-control-lg col-sm-5 col-lg-6 a" placeholder="Repeat password" title="Re-type password" id="password1" name="password1" autocomplete="off">
<i class="far fa-check-circle"></i>
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div class="form-group">
                          <!--<label>User Role</label>-->
                          <select class="form-control-lg col-sm-5 col-lg-6 a" name="role" title="user role">
                              <option  value="0">Normal User</option>
                              <option  value="1">Admin</option>
                          </select>
                      </div>
<div>
<div> 
<button type="submit" style="background: linear-gradient(to left ,#c2e538,#045d22,#bee030);" name="save"class="btn mt-4 mb-2 col-sm-4 col-lg-6 e" onclick="validate()">Submit</button>
</div>
<p id="hl">Account already exist?<a href="login.php"> Login here</a></p>
</form>
</div>
</div>
</div>
<script src="javascript/jquery-3.5.1.js"></script>
<script type="text/javascript" src="javascript/value.js"></script>
</body>
</html>