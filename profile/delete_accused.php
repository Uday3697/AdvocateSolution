<?php
include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
$accused_id=base64_decode($_GET['accused_id']);
$case_no=base64_decode($_GET['case_no']);
$flag=0;
$sql="delete from accused_details where accused_id='$accused_id'";
$result_sql=mysqli_query($con,$sql);
if($result_sql)
{
	$flag=1;
}
if($flag==1)
{
	echo"<script> alert('Accused Deleted')</script>";
 ?><script>window.open("accused.php?case_no=<?php echo base64_encode($case_no); ?>",'_self')</script><?php
}
else
{
echo"<script> alert('Wrong case no please enter a valid case no press OK to see all cases')</script>";
echo"<script>window.open('Allcases.php','_self')</script>";
}