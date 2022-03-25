<?php
include('../includes/database.php');

session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}

$advo_id=$_SESSION['u_id'];
$case_no=base64_decode($_GET['id']);

$sql_case="select * from case_date where case_no='$case_no'";
$result_sql=mysqli_query($con,$sql_case);
while($row=mysqli_fetch_array($result_sql))
{
	$previous_date_id=$row['date_id'];
	$previous_date=$row['next_date'];

}
		$sql_profile="select profile_photo from advo_profile where advo_id='$advo_id'";		
        $result_profile=mysqli_query($con,$sql_profile);
        while($row=mysqli_fetch_array($result_profile))
		{
			$profile_photo=$row['profile_photo'];
		}
if(!isset($previous_date))
{
	$sql_case_date="select case_date form case_details where case_no='$case_no'";
	$result_sql_case_date=mysqli_query($con,$sql_case_date);
	while($row_case_date=mysqli_fetch_array($result_sql_case_date))
	{
		$previous_date=$row_case_date['case_date'];
	}
	
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

	<div class="col-lg-2" style="background:#036; height:700px;text-align:center">
    
    <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded' >"?></span>
       <span style="color:white;font-size:20px;">Welcome <?php  
			include("../includes/database.php");
			include("../includes/function.php");
			   $sql="select first_name from advo_details where advo_id='$advo_id'";
			   $result_sql=mysqli_query($con,$sql)  ;
	            while($row=mysqli_fetch_array($result_sql))
					{
						$first_name=$row['first_name'];
					}
				echo"<strong> $first_name </strong>";	
	   ?></span>
   
   		<a href="myaccount.php">Home</a> 
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="update_case.php">Update a Case</a>
             
    
    
    </div>
	<div class="col-lg-9" style="text-align:center;margin-left:40px;" >
	<br/><br/>
	<div class="well">
<form action="" method="post">
case number :<input disabled name="case_no" type="text" value=<?php echo $case_no ?> />
last hearing :<input disabled name="previous_date"type="date" value=<?php echo $previous_date ?> />
<br/>
particulars :<br/><textarea rows="8" cols="50" name="case_detail" placeholder="enter particulars here" required></textarea>
<br/>next date :<input type="date"name="next_date" min="<?php echo $previous_date; ?>"required/>
<br/>fixed for :<input type="text"name="fixed_for"required/>
<br/><br/>

      Judge Name:<input type="text"name="judge" required />&nbsp&nbsp
      Court/Room no.:<input type="text" name="court" required />

	<br/><br>
<input type="submit" name="submit" value="submit" class="btn btn-primary"/>
</form>
</div>
</div>
</div>

<?php include('../includes/footer.php');?>

</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$case_detail=format_str($_POST['case_detail']);
	$next_date=format_str($_POST['next_date']);
	$fixed_for=format_str($_POST['fixed_for']);
	$judge=format_str($_POST['judge']);
	$court=format_str($_POST['court']);
$sql_update_date_id="update case_date set edit='0' where date_id='$previous_date_id'";
$result_update_date_id=mysqli_query($con,$sql_update_date_id);
   $sql_date="insert into case_date (case_no,previous_date,case_detail,next_date,fixed_for,judge,court,edit,advo_id)values('$case_no','$previous_date','$case_detail','$next_date','$fixed_for','$judge','$court','1','$advo_id')";
   $result_sql_date=mysqli_query($con,$sql_date);
   if($result_sql_date)
   { 
     $case_no=base64_encode($case_no);
	   echo"<script> alert('case particulars are saved');</script>";
	   echo "<script>window.open('case_details.php?id=$case_no','_self')</script>";
     
   }
   else
   {  
      echo "<script> something went wrong</script>";
   }
}
?>