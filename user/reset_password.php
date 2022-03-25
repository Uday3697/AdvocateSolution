<?php

include("../includes/database.php");
include("../includes/function.php");

$enroll=base64_decode($_GET['enroll']);
$tid=base64_decode($_GET['tid']);

$sql= "select advo_id from advo_details where enrollment_no='$enroll'";
$result_sql=mysqli_query($con,$sql);
			    while($row=mysqli_fetch_array($result_sql))
					{
						$advo_id=$row['advo_id'];
					}			

//check about the link experiy by using time i.e date function
//get the advo_id by use of get information
$sql_password="select advo_password from advo_login where advo_id='$advo_id'";
   $result_password=mysqli_query($con,$sql_password)  ;
			    while($row=mysqli_fetch_array($result_password))
					{
						$advo_password=$row['advo_password'];
					}			
		
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
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>

<body>


<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">E - Court Hazaribag</a>
  
      </a>
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    </div>
        	<div class="col-lg-10" style="margin-top:20px;">
<?php
$ts=time();
//echo $ts;
  if(($ts-$tid)  < 600 && ($ts-$tid)  > 10)
  {	  
?>
		 <div class="well">
         <form method="post" class="form-horizontal">
	

	 
      <div class="form-group">
      <label class="col-xs-3 control-label">New password</label>
      <div class="col-xs-5">
      <input class="form-control" type="password" name="new_password" required />
      </div>
      </div>
      
      <div class="form-group">
      <label class="col-xs-3 control-label">confirm password</label>
      <div class="col-xs-5">
      <input class="form-control" type="password" name="confirm_password" required />
      </div>
      </div>
	 
	<div style="text-align:center;"> 
	 <button class="btn btn-success" type="submit" name="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-warning" type="reset" name="reset">Reset</button></div>
	</form>
	  </div>
       </div>
</div>
		<?php
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
				
				$new_password=format_str($_POST['new_password']);
				$confirm_password=format_str($_POST['confirm_password']);
				
				
					 if($new_password == $confirm_password)
					 {
						 $sql_password_update="update advo_login set advo_password='$new_password' where advo_id='$advo_id'";
                         $result_password_update=mysqli_query($con,$sql_password_update);
						 if($result_password_update)
						 {
							 echo"<script> alert('Password reset successfully.');</script>";
					          echo "<script>window.open('login.php','_self')</script>";
						 }
						 else
						 {
							echo"<script> alert('Something went wrong. Try again');</script>";
					        
						 }
					 }
					 else
					 {
					  echo"<script> alert('New password doesnot match with confirm password .Try again');</script>";
					  echo "<script>window.open('change_password.php','_self')</script>";
				 
					 }
					 
				
		}
		?>
  <?php
  }
else{ ?>
<div class="well">
  <h3>session time out please retry!!! .....</h3>
</div>

<?php
}	
	 ?> 
 
   
 
<?php include('../includes/footer.php');?>

</body>
</html>        