<?php
include("../includes/database.php");
?>

<!doctype html>
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
	<form action="#" method="post" class="login-form">
    			<input type="text" name="firstname" placeholder="First name" required/>
        		<input type="text" name="lastname" placeholder="Last name" required/>
                <input type="text" name="enroll" placeholder="Enrollment number" required/>
                <input type="date" name="dob" required/>
                
               <select name="gender" class="col-xs-5" required>
				<option>--Gender--</option>
				<option value="male">Male</option>
				<option value="female">Female</option>
				<option value="other">Other</option>
			   
			   </select>
                <input type="text" name="email" placeholder="Email" required/>
                <input type="password" name="password" placeholder="Password" required/>
                <input type="password" name="con_password" placeholder="Confirm password" required/>
                <button name="signup" type="submit">Signup</button>
                <p class="message">already a member? <a href="login.php">login</a></p>
        </form>
        </div>
        </div>

  </div>
  
  
 <?php include('../includes/footer.php');?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$enroll=$_POST["enroll"];

$firstname=$_POST["firstname"];


$lastname=$_POST["lastname"];


$dob=$_POST["dob"];

$email=$_POST["email"];


$password=$_POST["password"];

$password2 = $_POST["con_password"];


$gender=$_POST["gender"];

if($password != $password2)
{
	echo "<script> alert('Password did not matched!')</script>";
	echo "<script>window.open('signup.php','_self')</script>";
}

else{
	

$sql_login="INSERT into advo_login(advo_user,advo_password,permission)
		VALUES('$email','$password','0')";
$advo_login=mysqli_query($con,$sql_login);
$sql_advo_id="select advo_id from advo_login where advo_user='$email'";
$result=mysqli_query($con,$sql_advo_id);
while($row=mysqli_fetch_array($result))
{
	$advo_id=$row['advo_id'];
}



$sql_advo="INSERT into advo_details(advo_id,enrollment_no,first_name,last_name,dob,email,gender)
VALUES('$advo_id','$enroll','$firstname','$lastname','$dob','$email','$gender')";
$insert_advo = mysqli_query($con, $sql_advo);
 $sql_date="insert into advo_profile (advo_id,professional_area,date_joining,experience,phone_no,office_address,residential_address,profile_photo)
                          values('$advo_id','','','','','','','')";
   $result_sql_date=mysqli_query($con,$sql_date);

echo "<script>alert('you are register and your request is under process !')</script>";
echo "<script>window.open('login.php','_self')</script>";
}
}
?>
  </body>
</html>



















