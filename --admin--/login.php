<!doctype html>
<?php include('../includes/header.php'); ?>
<body>
<?php
session_start();
include("../includes/database.php");
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$user_name=$_POST['email'];
	$password=$_POST['password'];
	  $sql= "select * from admin where user_name='$user_name' and password='$password'";
	  $result=mysqli_query($con,$sql);
	
while($row=mysqli_fetch_array($result))
{
	$advo_id=$row['advo_user'];
}
		echo$advo_id;  
			if(!empty($advo_id))
			{  
				$_SESSION['admin_id']=$advo_id;

				?><script> window.open('admin.php', '_self')</script><?php
				
				
			}
			
	else{
		echo"<script> alert('Wrong email and password combination!')</script>";
		echo"<script> window.open('login.php', '_self')</script>";
        }
}
?>
<div class="body_area">
	<div class="login_page">
	<div class="form">
	<form action="login.php" method="post" class="login-form">
        		<input type="text" name="email" placeholder="username" required/>
                <input type="password" name="password" placeholder="password" required/>
                <button type="submit" >Login</button>
                
        </form>
        </div>
        </div>

  </div>
  
  
  
</body>
</html>