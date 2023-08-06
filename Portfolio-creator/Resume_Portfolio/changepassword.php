<html lang="en" class="h-100">
<head>
 <meta charset="utf-8">
 <title>verification code</title>
 <meta name="viewport" content="width=device-width , initial-scale=1 , shrink-to-fit=no">
 <?php include "link.php"; ?> 
<link rel="stylesheet"  href="css/bootstrap.min.css">
<link rel="stylesheet" href=" css/style7.css">
<!--<script type="text/javascript" src="cssjsfiles/jsf/value.js"></script>-->
</head>
<body class="h-100">
<div class="container-fluid h-100" style="background:url('images/m5.jpg')no-repeat 0 0;background-size:cover;">
<div class="row py-3 h-100 justify-content-center align-items-center">
<div class="col-12 col-md-8 col-lg-6 bg">
<div class="text-center">
<h1 class="title">Reset Password</h1>
</div>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="text-center mt-4 frm" style="    border-radius: 0px 176px;">
<div class="form-group mt-5">
<label class="col-sm-4 sr-only">Username</label>
<input type="text" class="form-control-lg col-sm-4 col-lg-6 a" placeholder="Enter username" title="Email"id="email" name="username" autocomplete="off">
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>	
<div class="form-group  mt-5">
<label class="col-sm-4 sr-only">password</label>
<input type="text" class="form-control-lg col-sm-4 col-lg-6 a" placeholder="Create New Password" id="password" name="password" autocomplete="off">
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div class="form-group  mt-5">
<label class="col-sm-4 sr-only">Change password</label>
<input type="text" class="form-control-lg col-sm-4 col-lg-6 a" placeholder="Confirm Your Password" id="password1" name="password1" autocomplete="off">
<i class="fas fa-exclamation-circle"></i>
<small class="form-text" style='font-size: 1.2rem;'>
Error msg
</small>
</div>
<div>
<button type="submit" style="background: linear-gradient(to left ,#e56038,#323224,#d2dca4);" class="btn mt-4 mb-3 col-sm-4 col-lg-6 c" name="reset_password" onclick="validate()">Change</button>
</div>
</form>
<?php

if(isset($_POST['reset_password'])){
$con = mysqli_connect('localhost','root','','resume_portfolio','3306') or die("connection failed:");
$username = mysqli_real_escape_string($con,$_POST['username']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$password1 = mysqli_real_escape_string($con,$_POST['password1']);


$sql="SELECT username FROM signup WHERE username = '{$username}'";
$result = mysqli_query($con,$sql) or die ("Query failed.");
if(mysqli_num_rows($result) >0)
{
$sqli = "UPDATE signup SET password = '{$password}' WHERE username = '{$username}' ";
$result1 = mysqli_query($con,$sqli);
if($result1)
{	
header("Location:login.php");
}	
else
{
echo '<div class="alert alert-danger">User does not exist</div>';
}
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
const email=document.getElementById('email');
const  password=document.getElementById('password');
const  password1=document.getElementById('password1');

const eml=email.value.trim();	
const pass=password.value.trim();
const pass1=password1.value.trim();	

if(eml === '')
{
setErrorFor(email,'Email cannot be blank');	
}
else{	
setSuccessFor(email);
}

if(pass === ''){
setErrorFor(password,'password cannot be blank');
}
else{
setSuccessFor(password1);
}

if(pass1 === ''){
setErrorFor(password1,'password cannot be blank');
}
else if(pass !== pass1){
setErrorFor(password1,'password does not match');
}
else{
setSuccessFor(password1);
}
}
function setErrorFor(input,message){
const formGroup=input.parentElement;
const small=formGroup.querySelector('small');
small.innerText=message;
formGroup.className='form-group error';	
}
function setSuccessFor(input){
const formGroup=input.parentElement;
formGroup.className='form-group success';	
}
	
</script>
</body>
</html>  