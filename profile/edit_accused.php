<?php

include("../includes/database.php");
include("../includes/function.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
$accused_id=base64_decode($_GET['accused_id']);
$case_no=base64_decode($_GET['case_no']);
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
		$sql_date="select * from accused_details where accused_id='$accused_id'";
$result=mysqli_query($con,$sql_date);
while($row_date=mysqli_fetch_array($result))
{
	
	
	$name=$row_date['name'];
	$father_name=$row_date['father_name'];
	$phone_no=$row_date['phone_no'];
	$address_line1=$row_date['address_line1'];
	$address_line2=$row_date['address_line2'];
	$address_line3=$row_date['address_line3'];
}	
?>

<!doctype html>
<?php include('../includes/header.php'); ?>

<body>

<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
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
	<div class="col-lg-10" style="margin-top:50px;">
	
	<form method="post" class="form-horizontal" >
		
		 <div class="form-group">
        <label class="col-xs-3 control-label">Accused name/O.P</label>
        <div class="col-xs-5">
        <input class="form-control" required name="accused_name" type="text" value="<?php echo $name ?>"/>
        </div>
        </div>
		 
         
         <div class="form-group">
         <label class="col-xs-3 control-label">Father name</label>
         <div class="col-xs-5">
         <input class="form-control" required name="father_name" type="text"value="<?php echo $father_name ?>"/>
         </div>
		 </div>
		
         <div class="form-group">
         <label class="col-xs-3 control-label">Phone no.</label>
         <div class="col-xs-5">
         <input class="form-control" required name="phonr_no" type="text" value="<?php echo $phone_no ?>"/>
         </div>
         </div>
		 
         <div class="form-group">
         <label class="col-xs-3 control-label">Address line1</label>
         <div class="col-xs-5">
         <input class="form-control" required name="address_line1" type="text" value="<?php echo $address_line1 ?>"/>
         </div>
         </div>
		 
         <div class="form-group">
         <label class="col-xs-3 control-label">Address line2</label>
         <div class="col-xs-5">
         <input class="form-control" required name="address_line2" type="text" value="<?php echo $address_line2 ?>"/>
         </div>
         </div>
		 
         <div class="form-group">
         <label class="col-xs-3 control-label">Address line3</label>
         <div class="col-xs-5">
         <input class="form-control" required name="address_line3" type="text" value="<?php echo $address_line3 ?>"/>
         </div>
         </div>
		 
         <div class="form-group">
		 <div class="col-xs-5 col-xs-offset-5">
		 <button class="btn btn-primary" type="submit">Edit Accused</button>
		 </div></div>

		  </form>
</div>
</div>
<?php include('../includes/footer.php');?>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$accused_name=format_str($_POST['accused_name']);
	$father_name=format_str($_POST['father_name']);
	$phone_no=format_str($_POST['phone_no']);
	$address_line1=format_str($_POST['address_line1']);
	$address_line2=format_str($_POST['address_line2']);
	$address_line3=format_str($_POST['address_line3']);
	
$sql_accused="update accused_details set 
								name='$accused_name',
								father_name='$father_name',
								phone_no='$phone_no',
								address_line1='$address_line1',
								address_line2='$address_line2',
								address_line3='$address_line3' 
								where accused_id='$accused_id'";
$result_accused=mysqli_query($con,$sql_accused);
   
   if($result_accused)
   {
	   echo"<script> alert('Accused saved');</script>";
	   ?><script>window.open('accused.php?case_no=<?php echo base64_encode($case_no); ?>','_self')</script><?php
     
   }
   else
   {  
      echo "<script> something went wrong</script>";
   }
}
?>