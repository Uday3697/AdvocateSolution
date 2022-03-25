<?php
include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
$case_no=$_POST['case_no'];
$flag=0;
$sql="select case_no from case_details where case_no='$case_no' and advo_id='$advo_id'";
$result_sql=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result_sql))
{
	$flag=1;
}
if($flag==1)
{
	
 ?><script>window.open("case_details.php?id=<?php echo base64_encode($case_no); ?>",'_self')</script><?php
}
else
{
echo"<script> alert('Wrong case no please enter a valid case no press OK to see all cases')</script>";
echo"<script>window.open('Allcases.php','_self')</script>";
}

?>