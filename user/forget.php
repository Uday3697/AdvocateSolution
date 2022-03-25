<?php

include("../includes/database.php");
include("../includes/function.php");

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$enroll=format_str($_POST['enroll']);
	
	
	  $sql= "select email from advo_details where enrollment_no='$enroll'";
	  $result=mysqli_query($con,$sql);
	
while($row=mysqli_fetch_array($result))
{
	$email=$row['email'];
	
}
//echo"<script> alert('It looks like your request is under process !!')</script>";
if(isset($email))
{
	echo"<script> alert('Sir check your email and reset your password!!')</script>";
	// MAIL BODY...
	$ts=time();
$headers = "MIME-Version: 1.0\r\n
            Content-Type: text/html; charset=UTF-8\r\n";
$msg="

	  Link to reset password
	  	  www.advocatesolution.com/user/reset_password.php?enroll=".base64_encode($enroll)."&tid=".base64_encode($ts)."
	      click here to reset
	

	";
	$sent=mail($email,'Reset Password',$msg,$header);
	echo "<script>window.open('login.php','_self')</script>";
}
else{
	
	echo"<script> alert('Its look like you have enter a wrong enrollment no...try again!!')</script>";
}
   
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" width="device-width, initial-scale=1">
<title>E - Court | Hazaribag</title>
<link type="image/png" rel="icon" href="../images/icon.png" />
<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="../style/style.css"/>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-3.2.1.min.js"></script>

</head>

<body>
<div class="container-fluid">
	
    <div class="main_header">

	<p id="date"><script>document.getElementById("date").innerHTML=Date();</script></p>
	<div class="head_menu">
    <a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
    <a href="signup.php"><span class="glyphicon glyphicon-user"></span> Register</a>
   
    </div>
    </div>
</div>


<div class="container-fluid header_img">
	<img src="../images/finalban.jpg" class="img-responsive" />
</div>

<nav class="nav menubar">
	<ul class="nav navbar-nav">
        <li><a href="../index.php">Home</a></li>
         <li><a href="#">Supreme Court</a></li>
          <li><a href="#">High Court</a></li>
           
    </ul>
    
    <div id="search_area">
    	<form >
        	<div class="input-group">
            	<input type="text" placeholder="Search..." class="form-control">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button></div>
            </div>
        </form>
        </div>
   
</nav>

<div class="container-fluid body_area">
	<div class="login_page">
	<div class="form">
	<form action="" method="post" class="login-form">
        	<label>Enrollment no.</label><input type="text" name="enroll" placeholder="enrollment no." required/>
    		
                <button type="submit" name="forget_submit" >Submit</button>
    </form>
        </div>
        </div>

  </div>
  
  
  <div class="container-fluid footer">
  		<p style="text-align:center; margin-top:5px; margin-bottom:0; color:white;">&copy; 2017 All rights reserved. mcavbu.</p>
        <p style="text-align:center; color:white;">Designed & Developed by - mcavbu</p>
  </div>
</body>
</html>