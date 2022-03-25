<?php
include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
$case_no=base64_decode($_GET['id']);

$sql_case="select * from case_details where case_no='$case_no'";
$result_sql=mysqli_query($con,$sql_case);
while($row=mysqli_fetch_array($result_sql))
{
	$case_category=$row['case_category'];
	$case_title=$row['case_title'];
	$case_date=$row['case_date'];
	$client_name=$row['client_name'];
	$client_address=$row['client_address'];
	$client_phone_no=$row['client_phone_no'];
	
}
		$sql_profile="select profile_photo from advo_profile where advo_id='$advo_id'";		
        $result_profile=mysqli_query($con,$sql_profile);
        while($row=mysqli_fetch_array($result_profile))
		{
			$profile_photo=$row['profile_photo'];
		}
		$sql_case_accused="select name from accused_details where case_no='$case_no'";
$result_sql_accused=mysqli_query($con,$sql_case_accused);
while($row=mysqli_fetch_array($result_sql_accused))
{
	$accused_name=$row['name'];
	
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
    
     <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded'"; ?></span>
       <span style="color:white;font-size:20px;">Welcome <?php  
			
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
	<div class="col-lg-10" style="text-align:center;" >
	<br/><br/>
	<div class="well" align="center">    <!-- here the class well starts-->
<table class="table table-bordered table-striped table-hover">
 <caption><h3 align='center'>Client Details </h3></caption>
<tr align="center">
<td style="min-width: 100px;"><strong>Case Number</strong> </td>
<td style="min-width: 100px;"><strong>Category</strong></td>
<td style="min-width: 100px;"><strong>case date</strong></td>
<td style="min-width: 100px;"><strong>Title</strong></td>
<td style="min-width: 100px;"><strong>Name</strong></td>
<td style="min-width: 100px;"><strong>Accused/O.P</strong></td>
<td style="min-width: 100px;"><strong>Address</strong></td>
<td style="min-width: 100px;"><strong>Phone no</strong></td>
</tr>
<tr align='center'>
<td><?php echo $case_no ?></td>
<td><?php echo $case_category ?></td>
<td> <?php echo $case_date; ?> </td>
<td><?php echo $case_title ?></td>
<td><?php echo $client_name ?></td>
<td><?php if(isset($accused_name))echo $accused_name;?> <a href="accused.php?case_no=<?php echo base64_encode($case_no);?>">more</a> </td>
<td><?php echo $client_address ?></td>
<td><?php echo $client_phone_no ?></td>
</tr>
</table>
<a href="petition-accused.php?case_no=<?php echo base64_encode($case_no);?>">petition-Accussed</a>
&nbsp;&nbsp;&nbsp;<a href="time-petition.php?case_no=<?php echo base64_encode($case_no);?>">Time-petition </a>
</div><!-- here class well ends -->
<br/><br/>
<div class="well">
<table border='2' class="table table-striped table-bordered table-hover">
<caption><h3  align='center'>Particulars</h3></caption>
<tr>
<td style="min-width: 100px;"align='center'><strong>serial no</strong></td>
<td style="min-width: 100px;"align='center'><strong>previous date</strong></td>
<td style="min-width: 100px;"align='center'><strong>Judge</strong></td>
<td style="min-width: 400px; max-width:500px;"align='center'><strong>particulars</strong></td>
<td style="min-width: 100px;"align='center'><strong>next date</strong></td>
<td align='center'><strong>Fixed for</strong></td>

<td style="min-width: 100px;"align='center'><strong>Court/Room no.</strong></td>
</tr>
<?php
$si=0;
$sql_date="select * from case_date where case_no='$case_no'";
$result=mysqli_query($con,$sql_date);
while($row_date=mysqli_fetch_array($result))
{
	$si=$si+1;
	$date_id=$row_date['date_id'];
	$judge=$row_date['judge'];
	$court=$row_date['court'];
	$previous_date=$row_date['previous_date'];
	$next_date=$row_date['next_date'];
	$edit=$row_date['edit'];
	$sql_previous_judge="select judge,court from case_date where case_no='$case_no' and next_date='$previous_date'";
	$result_previous_judge=mysqli_query($con,$sql_previous_judge);
	while($row_judge=mysqli_fetch_array($result_previous_judge))
{
	$previous_judge=$row_judge['judge'];
	$previous_court=$row_judge['court'];
}
$ts=strtotime($next_date);
$next_date=date('d-m-Y',$ts);
$ts=strtotime($previous_date);
$previous_date=date('d-m-Y',$ts);
?>
<?php
if(isset($previous_judge)){ 

?>
<tr>
 <td colspan='7'><i>
				<mark style="color:blue;">
				Case Transfer
				<?php
				if($previous_judge != $judge)
					{
				?> 
				from Judge=<b> <?php echo $previous_judge?></b> to Judge=<b> <?php echo $judge;?></b>
				<?php 
					}
				?>
				<?php
					if($previous_judge!=$judge){
						if( isset($previous_court))
						{ 
				?>
					And
				<?php
						}
					}	
				?>
				<?php
				      if($previous_court != $court)
							{
					   ?>
					   from Court=<b> <?php echo $previous_court?></b> to Court=<b> <?php echo $court;?></b>
					   <?php 
							}
						?>	
				</mark>
				</i>
 </td>
</tr>
   <?php
 }
	?>
<tr>
<td>  <?php echo $si ?> </td>
<td>  <?php echo $previous_date; ?> </td>
<td>  <?php echo $judge;?> </td>
<td>  <?php echo $row_date['case_detail'] ?> </td>
<td style="min-width: 100px;">  <?php echo $next_date; ?> </td>
<td> <b> <?php echo $row_date['fixed_for'] ?> </b></td>


<td style="min-width: 100px;">  <?php echo $court; ?> </td>
<?php if($edit==1){?><td style="max-width: 60px;"><a href="edit_date.php?date_id=<?php  echo base64_encode($date_id) ;?>" >Edit</a></td><?php } ?>

</tr>

<?php
}
?>
<tr>
<td colspan='7'><a href="add_particular.php?id=<?php  echo base64_encode($case_no); ?>"  class="btn btn-primary">Click To ADD</a></td>
</tr>
</table>
</div>
</div>
</div>

<?php include('../includes/footer.php');?>


</body>
</html>