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
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSoltion | Hazaribag</a>
  
      <a href="logout.php" class="pull-right"style="margin-top:25px;">Logout</a>
      <a href="edit_profile.php" class="pull-right" style="margin-top:25px;">Profile |</a>
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    
   <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded' >"?></span>
       <span style="color:white;font-size:20px;">Welcome <?php  
			include("../includes/database.php");
			   $sql="select first_name,last_name from advo_details where advo_id='$advo_id'";
			   $result_sql=mysqli_query($con,$sql)  ;
	            while($row=mysqli_fetch_array($result_sql))
					{
						$first_name=$row['first_name'];
						$last_name=$row['last_name'];
					}
				echo"<strong> $first_name </strong>";	
	   ?></span>
   
   		<a href="myaccount.php">Home</a> 
     
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="aboutyou.php">Add your personal details</a>        
    
    
    </div>
    
    
    <div class="col-lg-10">
    <div id="c">
    <div style="margin-top:150px;">
    <p style="text-align:center;">In the Court of the Sri/smt.<label>&nbsp;<?php echo $judge; ?></label></p>
     <p style="text-align:center;">Hazaribag</p>
    <p style="text-align:center;">Case No.<label><?php echo $case_no ?></label> of <label> <?php echo $next_date; ?></label></p>
    <br>
    <p style="text-align:center;">&nbsp;&nbsp;<label><br/><?php echo $client_name?></label></p>
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
												?>
												
												</label>&nbsp;&nbsp;&nbsp;&nbsp;</p>
    <br>
    <p style="text-align:right; margin-right:120px;">The humble petition for<br> representation U/s 317<br> Cr.P.C on behalf of the<br> petitioner noted below<br> to the margin.</p>
    
    <br>
    <br>
    <h4 style="text-align:center;"><u>Most respectfully sheweth:-</u></h4>
    <p style="text-align:center;"> 1. That today is the date fixed for<label>..............</label> in this case.</p>
    <p style="text-align:center;"> 2. That the following petitioner/accused could not come to the court today due to <label>...................</label></p>
    <p style="text-align:center;"><label>..........................................................................</label></p>
    <br>
    <br>
    <br>
    <h4>Petitioner/Accused</h4><P style="text-align:center;">It is, therefore, prayed that the petitioner/accused 
    allowed to be represented throught their lawyer 
    Mr.<b><?php echo $first_name.' '.$last_name;?>
  </b>  , Hazaribag for which they shall ever pay.</P>
    
    </div>
    </div>
    </div>
   <p style="text-align:center;"> <button  class="btn btn-success" onclick="printContent('c')">Print</button></p>
</div>

<?php include('../includes/footer.php');?>


</body>
</html>