//const  form=document.getElementById('form');
//const  username=document.getElementById('username');
//const  email=document.getElementById('email');
//const  password=document.getElementById('password');
//const  password1=document.getElementById('password1');

//form.addEventListener('submit',(e) =>{
//e.preventDefault();
//checkInputs();
//} );
$('.message').show('slow').delay(5000).hide('slow');
function validate()
{
const  form=document.getElementById('form');
const  username=document.getElementById('username');
const  email=document.getElementById('email');
const  password=document.getElementById('password');
const  password1=document.getElementById('password1');
	
const usernm=username.value.trim();
const eml=email.value.trim();
const pass=password.value.trim();
const pass1=password1.value.trim();	

if(usernm === ''){
	//show error
	//add error class
setErrorFor(username,'username cannot be blank');
return false;
}
else if(!isUser(usernm)){
setErrorFor(username,'username is not valid');	
return false;
}
else{
	//add success class
setSuccessFor(username);
}

if(eml === '')
{
setErrorFor(email,'Email cannot be blank');	
return false;
}
else if(!isEmail(eml)){
setErrorFor(email,'Email is not valid');
return false;		
}
else{	
setSuccessFor(email);
}

if(pass === ''){
setErrorFor(password,'password cannot be blank');
return false;
}
/*
else if(!ispaw(pass)){
setErrorFor(password,'password is not valid');
}*/
else{
setSuccessFor(password);
}

if(pass1 === ''){
setErrorFor(password1,'password cannot be blank');
return false;
}
else if(pass !== pass1){
setErrorFor(password1,'password does not match');
return false;
}
else{
setSuccessFor(password1);
}
//show a success message
}

function setErrorFor(input,message){
const formGroup=input.parentElement;
const small=formGroup.querySelector('small');
//add error msg inside small
small.innerText=message;
//add error class
formGroup.className='form-group error';	

document.getElementsByClassName('a')[0].style.border='1px solid #e74c3c';
}

function setSuccessFor(input){
const formGroup=input.parentElement;

formGroup.className='form-group success';	
document.getElementsByClassName('a')[0].style.border='1px solid #2ecc71';
}

function isEmail(email)
{
return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);	
}
function isUser(username)
{
return /^(?:[a-zA-Z ]+)?$/.test(username);	
}
/*function ispaw(password)
{
return /^[A-Za-z]\w{7,14}$/.test(password);	
}*/