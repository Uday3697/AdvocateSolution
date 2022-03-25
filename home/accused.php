<?php

include("../includes/database.php");

$case_no=$_GET['case_no'];
		 
		
?>

<!doctype html>
<?php include('../includes/header.php'); ?>

<body>

<div class="container-fluid">
      
      <a href="../index.php" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
      
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:700px;text-align:center">
    
    
    
    
    </div>
	<div class="col-lg-9"style="text-align:center;margin-left:40px;">
	<br/><br/>
	<div class="well">
<table border='2' class="table table-striped table-bordered table-hover">
<caption><h3  align='center'>Accused</h3></caption>
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
</tr>

<?php
}
?>
</table>
</div>	
</div>
</div>

<?php include('../includes/footer.php');?>


</body>
</html>