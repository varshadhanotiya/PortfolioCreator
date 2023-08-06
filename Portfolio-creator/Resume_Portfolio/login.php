
<html lang="en" class="h-100">
<head>
 <meta charset="utf-8">
 <title>login form</title>
 <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">-->


<?php include "link.php"; ?>
<link rel="stylesheet" href=" css/style7.css">
<link rel="stylesheet"  href="css/bootstrap.min.css">
<!--<script type="text/javascript" src="cssjsfiles/jsf/val1.js"></script>-->
</head>
<body class="h-100">
<div class="container-fluid h-100" style="background:url('images/m21.jpg')no-repeat 0 0;background-size:cover;">
<div class="row py-3 h-100 justify-content-center align-items-center">
<div class="col-12 col-md-8 col-lg-6 bg">
<div class="text-center">
<h1 class="title">Login Form</h1>
</div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="text-center mt-4 frm" style="    border-radius: 0px 175px;">
<div>
<ul id="social-icons"class="col-sm-12">
<li><a href="https://www.facebook.com/soumyasofty.jaiswal"><i class="fa fa-facebook"></i></a></li>
<li><a href="https://github.com/Soumya-max-web"><i class="fa fa-github"></i></a></li>
<li><a href="https://www.linkedin.com/in/soumya-jaiswal-80010b1b7"><i class="fa fa-linkedin"></i></a></li>
<li><a href="https://twitter.com/@Soumyajaiswal7"><i class="fa fa-twitter"></i></a></li>
</ul>
</div>
<div class="form-group  mt-5">
<label class="col-sm-4 sr-only">Username</label>
<input type="text" class="form-control-lg col-sm-4 col-lg-6 a" placeholder="Enter username" id="email" name="username" autocomplete="off">
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div class="form-group sz  mt-5">
<label class="col-sm-4 sr-only">Password</label>
<input type="password" class="form-control-lg col-sm-4 col-lg-6 b" placeholder="Enter Password" id="password" name="password" autocomplete="off">
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<p><a href="changepassword.php">Forgot Password?</a></p>
<div>
<button type="submit" style="background: linear-gradient(90deg,#79cbc7,#12163e);color: white;" class="btn mt-4 mb-3 col-sm-4 col-lg-6 c" name="login" onclick="return validate()">Login</button>
</div>
<p id="hl">not yet a member?<a href="signupform.php"> signup</a></p>
</form>

<?php
if(isset($_POST['login'])){
session_start();
$con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die("connection failed:");
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = $_POST['password'];

$sql="SELECT *FROM signup WHERE  username = '{$username}' AND password = '{$password}'";
$result = mysqli_query($con,$sql) or die ("Query failed.");
if(mysqli_num_rows($result) >0)
{
 while($row = mysqli_fetch_assoc($result)){
  $_SESSION["uemail"]= $row['emailid'];
  $_SESSION["uname"]= $row['username'];
  $_SESSION["urole"]= $row['role'];
  $_SESSION["uid"]=$row['userid'];
 }
}	
else
{	
echo '<div class="alert alert-danger">Login Failed</div>';
}

$uid =$_SESSION["uid"];

$sql="SELECT *FROM language WHERE  language.userid = '{$uid }'";
$result = mysqli_query($con,$sql) or die ("Query failed.");
 if(mysqli_num_rows($result) >0 || $_SESSION["urole"]=='1'){
    echo "<script type='text/javascript'>
         document.location.href='dashboard.php';
       </script>";
 } 
 else{
    echo "<script type='text/javascript'>
         document.location.href='Resume.php';
       </script>";
 }
}
?>

</div>
</div>
</div>
<script type="text/javascript">
function validate()
{
const  form=document.getElementById('form');
const  email=document.getElementById('email');
const  password=document.getElementById('password');

const eml=email.value.trim();
const pass=password.value.trim();
if(eml === '')
{
setErrorFor(email,'Email cannot be blank');	
}
if(pass === ''){
setErrorFor(password,'password cannot be blank');
}
}

function setErrorFor(input,message){
const formGroup=input.parentElement;
const small=formGroup.querySelector('small');
//add error msg inside small
small.innerText=message;
//add error class
formGroup.className='form-group error';	
}	
</script>
<!--<script type="text/javascript" src="val1.js"></script>-->
</body>
</html>