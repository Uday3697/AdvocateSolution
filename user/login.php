<?php
session_start();
include("../includes/database.php");

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$user_name=$_POST['email'];
	$password=$_POST['password'];
	
	  $sql= "select advo_id,permission from advo_login where advo_user='$user_name' and advo_password='$password'";
	  $result=mysqli_query($con,$sql);
	
while($row=mysqli_fetch_array($result))
{
	$advo_id=$row['advo_id'];
	$permission=$row['permission'];
}
     if($permission=='0')
		{
		echo"<script> alert('It looks like your request is under process !!')</script>";
		 echo "<script>window.open('login.php','_self')</script>";
		}
		else
		{
			
			if(!empty($advo_id))
			{

                                $_SESSION['u_id']=$advo_id;
				?><script> window.open('../profile/myaccount.php', '_self')</script><?php				
				
			}
			else
                        {
			echo"<script> alert('Wrong email and password combination!')</script>";
			 echo "<script>window.open('login.php','_self')</script>";
		        }

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
	<form action="login.php" method="post" class="login-form">
        	<input type="text" name="email" placeholder="username" required/>
                <input type="password" name="password" placeholder="password" required/>
				<a href="forget.php" class="message">forget password!</a>
                <button type="submit" name="login" >Login</button>
                <p class="message">Not yet registered? <a href="signup.php">Create an account</a></p>
        </form>
        </div>
        </div>

  </div>
  
  
<?php include('../includes/footer.php');?>
</body>
</html>