<?php
include("../includes/database.php");
	session_start();
if(!isset($_SESSION['admin_id']))
{
	header("location:login.php");
}
if(isset($_GET['advo_id']))
{
	$advo_id=$_GET['advo_id'];
}
if(isset($_GET['approve']))
{
if($_GET['approve']=='true')
{
	
	$sql="update advo_login set permission='1' where advo_id='$advo_id'";
	$result_sql=mysqli_query($con,$sql);
	echo"<script>alert('Approved')</script>";
	 echo "<script>window.open('admin.php','_self')</script>";
}
else
{
	
	$sql="update advo_login set permission='0' where advo_id='$advo_id'";
	$result_sql=mysqli_query($con,$sql);
	echo"<script>alert('Permission revoked')</script>";
	 echo "<script>window.open('admin.php','_self')</script>";
}
}

?>