<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_SESSION['detsuid'])){
  header('location:dashboard.php');
}

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }


  if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
    if ($query) {
$sub = "REGISTER";
$msg = "WELCOME TO EXPENSE TRACKER .... YOU ARE SUCCESSFULLY REGISTER !!!";
$rec = $email;
$check = mail($rec,$sub,$msg);
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
}
}


  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daily Expense Tracker - Login</title>
  
	<link href="css/datepicker3.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link href="css/login-style.css" rel="stylesheet">
<style>
  html {
	scroll-behavior: smooth;
}

@media screen and (prefers-reduced-motion: reduce) {
	html {
		scroll-behavior: auto;
	}
}
 .head-title {
  position: absolute;
  left: 43%;
  top: 160px;
  z-index: 1;
}
#top-div{
  top:0%;
}


</style>


</head>
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>
<body>



<div id="top-div" style="" >
   <div style="background-color:grey;color:black;width:100%;min-height:900px;background-image:url(https://expense-robot.ch/wp-content/uploads/2019/10/HD_HEADER_EXPENSEROBOT.jpg);background-size:cover;background-attachment:fixed;">
  <h2 class="head-title">
      <center><p style="font-family:cursive">EXPENSE TRACKING SYSTEM</p></center> 
     <a href="#form-log"><button class="btn btn-danger btn-lg">SignUp / Login</button></a>
       
     </h2> 
  </div>
  
</div>












<div style="" class="ml-2 mr-2 py-3 px-5">

<div class="pages" id="fourthPage">
<div class="max-width text-center middle-things">
<h3 class="text-center text-up green visible-xs-block visible-sm-block mb-5">Features</h3>
<div class="row mt">
<div class="col-md-4 col-lg-4 col-xs-6 animated fadeIn">
<div class="animated features-ml">
<img alt="features" src="images/feature1.png"/>
<h3 class="fourthlabel">Multiple devices</h3>
<p>Safely synchronize across devices with Bank standard security.</p>
</div>
</div>
<div class="col-md-4 col-lg-4 col-xs-6 animated fadeIn">
<div class="animated features-ml">
<img alt="features" src="images/feature2.png"/>
<h3 class="fourthlabel">Recurring transaction</h3>
<p>Get notified of recurring bills and transactions before due date.</p>
</div>
</div>
<div class="col-md-4 col-lg-4 col-xs-6 animated fadeIn">
<div class="animated features-ml">
<img alt="features" src="images/feature3.png"/>
<h3 class="fourthlabel">Travel mode</h3>
<p>All currencies supported with up-to-date exchange rate.</p>
</div>
</div>
<div class="col-md-4 col-lg-4 col-xs-6 animated fadeIn">
<div class="animated features-ml">
<img alt="features" src="images/feature4.png"/>
<h3 class="fourthlabel">Saving plan</h3>
<p>Keep track on savings process to meet your financial goals.</p>
</div>
</div>
<div class="col-md-4 col-lg-4 col-xs-6 animated fadeIn">
<div class="animated features-ml">
<img alt="features" src="images/feature5.png"/>
<h3 class="fourthlabel">Debt and Loan</h3>
<p>Manage your debts, loans and payment process in one place.</p>
</div>
</div>
<div class="col-md-4 col-lg-4 col-xs-6 animated fadeIn">
<div class="animated features-ml">
<img alt="features" src="images/feature6.png"/>
<h3 class="fourthlabel">Scan receipt</h3>
<p>Take pictures of your receipts to auto-process and organize them.</p>
</div>
</div>
</div>
</div>
</div>


</div>



<div style="" class="ml-2 mr-2 py-3 px-5">

<div class="pages" id="seventhPage">
<div class="row text-center middle-things">
  <div class="col"><center>
<h2 class="getNow">Get it now</h2></center></div>
<div class="row devices">
<div class="col-md-3 col-lg-3 col-sm-3"></div>
<div class="col-md-3 col-lg-3 col-sm-3">
<a class="playstore" href="https://play.google.com/store/apps/details?id=com.bookmark.money&amp;referrer=utm_source%3Dlanding" target="_blank">
<img alt="download android" class="animated fadeInLeft android" src="images/android_10.png" width="170px"/>
</a>
</div>
<div class="col-md-3 col-lg-3 col-sm-3">
<a class="appstore" href="https://itunes.apple.com/app/apple-store/id486312413?pt=694013&amp;ct=landing&amp;mt=8" target="_blank">
<img alt="download iphone" class="animated fadeIn iphone" src="images/apple_x.png" width="170px"/>
</a>
</div>

</div>
</div>
<div class="col-md-8 col-lg-8 col-lg-offset-2 col-md-offset-2 col-sm-10 col-sm-offset-1 hidden-xs hidden-sm">
<div class="row devices centered">
<div class="col-md-3 col-lg-3 col-sm-3"></div>
<div class="col-md-3 col-lg-3 col-sm-3">
<a class="playstore" href="https://play.google.com/store/apps/details?id=com.bookmark.money&amp;referrer=utm_source%3Dlanding" target="_blank">
<img alt="download android" class="animated fadeInLeft android" src="images/google_play.svg" width="156px"/>
</a>
</div>
<div class="col-md-3 col-lg-3 col-sm-3">
<a class="appstore" href="https://itunes.apple.com/app/apple-store/id486312413?pt=694013&amp;ct=landing&amp;mt=8" target="_blank">
<img alt="download iphone" class="animated fadeIn iphone" src="images/apple_store.svg" width="156px"/>
</a>
</div>
</div>
</div>
<div class="col-md-8 col-lg-8 col-lg-offset-2 col-md-offset-2 col-sm-10 col-sm-offset-1 visible-xs-block visible-sm-block">
<a class="btn downloadMobile">
</a>
</div>
</div>

</div>

</div>








<a name="form-log"></a>

<div  class="container " id="container" >
	<div class="form-container sign-up-container">
		<form role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
			<h1>Create Account</h1>
            <input class="form-control" placeholder="Full Name" name="name" type="text" required="true">
			<input class="form-control" placeholder="E-mail" name="email" type="email" required="true">
            <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" required="true">
            <input class="form-control" placeholder="Password" name="password" type="password" value="" required="true">
            <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password" required="true">
            <button type="submit" value="submit" name="submit" >Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form role="form" action="" method="post" id="" name="login">
			<h1>Sign in</h1>
			<input  name="email" type="email" placeholder="Email" />
			<input name="password" type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="submit" value="login" name="login">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>



<div style="min-height:50px;width:100%; background-color:red;" class="py-2 mt-5 centered " >
<center style="color:white;"> &copy; Atul pandey </center>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>
