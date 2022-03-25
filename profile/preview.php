<?php

include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	header("location:../index.php");
}
$advo_id=$_SESSION['u_id'];
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
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" width="device-width, initial-scale=1">
<title>E - Court | Hazaribag</title>
<link type="image/png" rel="icon" href="../images/icon.png" />
<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>
<link type="text/css" rel="stylesheet" href="../style/style.css"/>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>

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
		
</div>
</div>

<?php include('../includes/footer.php');?>

</body>
</html>