<?php


include('../includes/database.php');

session_start();
if(!isset($_SESSION['u_id']))
{
	//header('location:../login.php');
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
$case_no=base64_decode($_GET['case_no']);
$sql_date="select * from case_date where case_no='$case_no'";
$result_date=mysqli_query($con,$sql_date);
while($row_date=mysqli_fetch_array($result_date))
{
	$judge=$row_date['judge'];
	$next_date=$row_date['next_date'];
	
}
$sql_advo="select * from case_details where case_no='$case_no'";
$result_advo=mysqli_query($con,$sql_advo);
while($row_advo=mysqli_fetch_array($result_advo))
{
	$client_name=$row_advo['client_name'];
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
<script>
function printContent(e1){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(e1).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>

<div class="container-fluid header">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
  
     
      <a href="logout.php" class="pull-right"style="margin-top:25px;">Logout</a>
      <a href="edit_profile.php" class="pull-right" style="margin-top:25px;">Profile |</a>
    
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded'"; ?></span>
        <span style="color:white;font-size:20px;">Welcome <?php  
			include("../includes/database.php");
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
    
    
    <div class="col-lg-10">
    <div id="c">
    <div style="margin-top:150px;">
    <p style="text-align:center;">In the Court of the/Sri <label><?php echo $judge; ?></label></p>
     <p style="text-align:center;">Case no.<b> <?php echo $case_no ?></b></p>
   
    <br>
    <p style="text-align:center;"><label><?php echo $client_name?></label> Complaint/Petitioner</p>
    <br>
    <p style="text-align:center;">Versus</p>
    <br>
    <p style="text-align:center;"><label><?php
												$sql_op="select name from accused_details where case_no='$case_no'";
												$result_op=mysqli_query($con,$sql_op);
												
												while($row=mysqli_fetch_array($result_op))
												{
													?>
													<?php echo $row['name']?>,
												<?php
												}
												?></label>&nbsp;&nbsp;&nbsp;&nbsp; O.P.</p>
    <br>
    <p style="text-align:right; margin-right:200px;">The humble time <br>petiton on behalf <br> of the <b><?php echo $client_name?></b><br>is as follows:-<br></p>
    
    <br>
    <br>
    
    <p style="text-align:center;margin-right:220px;"> 1. That today is the date fixed for apperance/evidence in this case.</p>
    <p style="text-align:center;"> 2. That the unavailability of the related document war the cause of not submitting the said documents.</p>
    <p style="text-align:center;"> 3. That adjournment of at least a Week/month/15days may kindly be granted to the  <b><?php echo $client_name?></b></p>
    <br>
    <br>
    <br>
   <p style="text-align:right; margin-right:200px;">It is therefore prayed that<br> your honour may be pleased <br>to great adjournment for a <br>week/month/15 days in the case  no  <b><?php echo $case_no ?> </p>
   <p style="text-align:center;">And for the petitoner shall ever pray.</p>
    
    </div>
    </div>
    </div>
   <p style="text-align:center;"> <button  class="btn btn-success" onclick="printContent('c')">Print</button></p>
</div>

<?php include('../includes/footer.php');?>


</body>
</html>