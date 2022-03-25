<?php

include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
		 $sql="select first_name from advo_details where advo_id='$advo_id'";
			   $result_sql=mysqli_query($con,$sql)  ;
	            while($row=mysqli_fetch_array($result_sql))
					{
						$first_name=$row['first_name'];
					}							
		$sql_profile="select profile_photo from advo_profile where advo_id='$advo_id'";		
        $result_profile=mysqli_query($con,$sql_profile);
        while($row=mysqli_fetch_array($result_profile))
		{
			$profile_photo=$row['profile_photo'];
		}
$sql_password="select advo_password from advo_login where advo_id='$advo_id'";
   $result_password=mysqli_query($con,$sql_password)  ;
			    while($row=mysqli_fetch_array($result_password))
					{
						$advo_password=$row['advo_password'];
					}			
		
?>
<!doctype html>
<?php include('../includes/header.php'); ?>

<body>


<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
  
      <a href="logout.php" class="pull-right"style="margin-top:25px;">Logout</a>
      <a href="edit_profile.php" class="pull-right" style="margin-top:25px;">Profile |</a>
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    
    <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded' >"?></span>
       <span style="color:white;font-size:20px;">Welcome <?php echo$first_name ?></span>
   
   		<a href="myaccount.php">Home</a> 
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="update_case.php">Update a Case</a>
  
        </div>
        	<div class="col-lg-10" style="margin-top:20px;">
		
		 <div class="well">
         <form method="post" class="form-horizontal">
	
	<div class="form-group">
	 <label class="col-xs-3 control-label">Enter your current password</label>
	 <div class="col-xs-5">
	 <input class="form-control" type="password" name="previous_password" required/>
	 </div>
	 </div>
	 
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
	 <button class="btn btn-primary" type="submit" name="submit">Submit</button>&nbsp;&nbsp;<button class="btn btn-primary" type="reset" name="reset">Reset</button></div>
	</form>
	  </div>
       </div>
</div>
		<?php
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
				$previous_password=$_POST['previous_password'];
				$new_password=$_POST['new_password'];
				$confirm_password=$_POST['confirm_password'];
				
				 if($advo_password == $previous_password)
				 {
					 if($new_password == $confirm_password)
					 {
						 $sql_password_update="update advo_login set advo_password='$new_password' where advo_id='$advo_id'";
                         $result_password_update=mysqli_query($con,$sql_password_update);
						 if($result_password_update)
						 {
							 echo"<script> alert('Password change successfully.');</script>";
					          echo "<script>window.open('myaccount.php','_self')</script>";
						 }
						 else
						 {
							echo"<script> alert('Something went wrong. Try again');</script>";
					         echo "<script>window.open('change_password.php','_self')</script>"; 
						 }
					 }
					 else
					 {
					  echo"<script> alert('New password doesnot match with confirm password .Try again');</script>";
					  echo "<script>window.open('change_password.php','_self')</script>";
				 
					 }
					 
				 }
				 else
				 {
					 echo"<script> alert(' Entered previous password is wrong. Try again');</script>";
					 echo "<script>window.open('change_password.php','_self')</script>";
				 }
		}
		?>
		
	  
 
   
 
<?php include('../includes/footer.php');?>

</body>
</html>        