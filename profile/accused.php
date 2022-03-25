<?php

include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
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
	<div class="well">
<table border='2' class="table table-striped table-bordered table-hover">
<caption><h3  align='center'>Accused/O.P</h3></caption>
<tr>
<td style="min-width: 100px;"align='center'><strong>serial no</strong></td>
<td style="min-width: 100px;"align='center'><strong>Name</strong></td>
<td style="min-width: 100px; max-width:150px;"align='center'><strong>Father name</strong></td>
<td style="min-width: 100px;"><strong>phone no</strong></td>
<td style="min-width: 100px;"align='center'><strong>Address line1</strong></td>
<td style="min-width: 100px;"align='center'><strong>Address line2</strong></td>
<td style="min-width: 100px;"align='center'><strong>Address line3</strong></td>
</tr>
<?php
$si=0;
$sql_date="select * from accused_details where case_no='$case_no'";
$result=mysqli_query($con,$sql_date);
while($row_date=mysqli_fetch_array($result))
{
	$si=$si+1;
	$accused_id=$row_date['accused_id'];
	$name=$row_date['name'];
	$father_name=$row_date['father_name'];
	$phone_no=$row_date['phone_no'];
	$address_line1=$row_date['address_line1'];
	$address_line2=$row_date['address_line2'];
	$address_line3=$row_date['address_line3'];
	
?>
<tr>
<td>  <?php echo $si ?> </td>
<td>  <?php echo $name; ?> </td>
<td>  <?php echo $father_name; ?> </td>
<td>  <?php echo $phone_no; ?> </td>
<td>  <?php echo $address_line1; ?> </td>
<td>  <?php echo $address_line2;?> </td>
<td>  <?php echo $address_line3; ?> </td>
<td style="max-width: 60px;"><a href="edit_accused.php?accused_id=<?php  echo base64_encode($accused_id) ;?>&case_no=<?php echo base64_encode($case_no); ?>" >Edit</a></td>
<td style="max-width: 60px;"><a href="delete_accused.php?accused_id=<?php  echo base64_encode($accused_id) ;?>&case_no=<?php echo base64_encode($case_no); ?>" >Delete</a></td>
</tr>

<?php
}
?>
<tr>
<td colspan='7'><a href="add_accused.php?case_no=<?php  echo $case_no ?>"  class="btn btn-primary">Click To ADD</a></td>
</tr>
</table>
</div>	
</div>
</div>
<?php include('../includes/footer.php');?>


</body>
</html>