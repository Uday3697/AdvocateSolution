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
		
?>

<!doctype html>

<?php include('../includes/header.php'); ?>
<body>

<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">E - Court Hazaribag</a>
      <span class="navbar-brand"style="margin-top:15px;color:white;">&nbsp Today:<?php $date=date('y-m-d'); echo$date; ?></span> 
      <a href="logout.php" class="pull-right"style="margin-top:25px;">Logout</a>
      <a href="edit_profile.php" class="pull-right" style="margin-top:25px;">Profile |</a>
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:700px;text-align:center">
    
    <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded' >"?></span>
       <span style="color:white;font-size:20px;">Welcome <?php echo"<strong> $first_name </strong>";?></span>
   
   		<a href="myaccount.php">Home</a> 
     
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="update_case.php">Update a Case</a>
         
    
    
    </div>
	<div class="col-lg-9"style="text-align:center;margin-left:40px;">
	<br/><br/> 
	<form method="post" class="form-horizontal">
		
		 <div class="form-group">
                  <label class="col-xs-3 control-label">Accused name/O.P <span style='color:red;'>*</span></label>
                  <div class="col-xs-5"><input required class="form-control" name="accused_name" type="text" placeholder='O/P name'/></div>
                  </div>
                   
                 <div class="form-group">
		 <label class="col-xs-3 control-label">Father name <span style='color:red;'>*</span></label>
                  <div class="col-xs-5"><input class="form-control" required name="father_name" type="text"placeholder='O/P father name'/></div>
                 </div>
		 
                   <div class="form-group">
                   <label class="col-xs-3 control-label">Phone no.</label>
                  <div class="col-xs-5"><input class="form-control" name="phone_no" type="text"placeholder='O/P phone no'/></div>
                   </div>
		
                 <div class="form-group">
                  <label class="col-xs-3 control-label">Address line1 <span style='color:red;'>*</span></label>
                  <div class="col-xs-5"><input class="form-control"  required name="address_line1" type="text"placeholder='O/P address line1'/></div>
                  </div>

		 
                 <div class="form-group"> 
                  <label class="col-xs-3 control-label">Address line2 <span style='color:red;'>*</span></label>
                <div class="col-xs-5"><input class="form-control" name="address_line2" type="text"placeholder='O/P address line2'/></div>
                </div>
		 
                 <div class="form-group">
                 <label class="col-xs-3 control-label"> Address line3 <span style='color:red;'>*</span></label>
                 <div class="col-xs-5"><input class="form-control"name="address_line3"type="text"placeholder='O/P address line3'/></div>
                  </div>

                 <div class="form-group">
                 <div class="col-xs-5 col-xs-offset-5">
		 <button class="btn btn-primary" type="submit"name="submit"/>Add new accused</button>
		</div>
   

		  </form>
		  <span style='color:red;'> * are the mandatory fields</span>
		  	</div>
</div>
</div>
<?php include('../includes/footer.php');?>


</body>
</html>
<?php
$case_no=$_GET['case_no'];
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$accused_name=$_POST['accused_name'];
	$father_name=$_POST['father_name'];
	$phone_no=$_POST['phone_no'];
	$address_line1=$_POST['address_line1'];
	$address_line2=$_POST['address_line2'];
	$address_line3=$_POST['address_line3'];
	
$sql_accused="insert into accused_details (case_no,name,father_name,phone_no,address_line1,address_line2,address_line3)values('$case_no','$accused_name','$father_name','$phone_no','$address_line1','$address_line2','$address_line3')";
$result_accused=mysqli_query($con,$sql_accused);
   
   if($result_accused)
   {
	   echo"<script> alert('New Accused saved');</script>";
	   ?><script>window.open('accused.php?case_no=<?php echo $case_no; ?>','_self')</script><?php
     
   }
   else
   {  
      echo "<script> something went wrong</script>";
   }
}
?>