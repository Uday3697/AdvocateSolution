<?php
session_start();
include("../includes/database.php");
if(!isset($_SESSION['admin_id']))
{
	header("location:login.php");
}
$id=$_SESSION['admin_id'];

?>
<!doctype html>
<?php include('../includes/header.php'); ?>

<body>
<nav class="navbar navbar-inverse">
	<div class="container">
    
      <a class="navbar-brand" href="#">AdvocateSolution | Hazaribag</a>
       <a class="navbar-brand pull-right" href="logout.php">Logout</a>
    </div>

</nav>

<div class="container">
	
    <div class="panel panel-primary">
    <div class="panel-heading"><strong>View all Advocates</strong></div>
	<table class="table table-striped table-bordered table-hover table-responsive">
    
    	<tr>
        
        	<th>S. No.</th>
            <th>Enrollment number</th>
            <th>Advocate name</th>
            <th>E-mail</th>
            <th>Office address</th>
            <th>Phone no</th>
            <th>Permission</th>
            <th>Profile</th>
        </tr>
        <?php
		$si=0;
		 $sql_permission="select advo_id,permission from advo_login";
         $result_permission=mysqli_query($con,$sql_permission);
         while($row_permission=mysqli_fetch_array($result_permission))
		 { 
	     $advo_id=$row_permission['advo_id'];
         $permission=$row_permission['permission'];
         
		$sql="select * from advo_details where advo_id='$advo_id' ";
		$result=mysqli_query($con,$sql);
		while($row=mysqli_fetch_array($result))
		{
			$enrollment_no=$row['enrollment_no'];
			$first_name=$row['first_name'];
			$last_name=$row['last_name'];
			$email=$row['email'];
			$sql_profile="select profile_photo,office_address,phone_no from advo_profile where advo_id='$advo_id'";		
         $result_profile=mysqli_query($con,$sql_profile);
         while($row_profile=mysqli_fetch_array($result_profile))
		 {
			$profile_photo=$row_profile['profile_photo'];
			$phone_no=$row_profile['phone_no'];
			$office_address=$row_profile['office_address'];
		 }
		}
		$si=$si+1;
		?>	
		 <tr>
        	<td><?php echo$si ?></td>
            <td><?php echo $enrollment_no;?></td>
            <td><?php echo $first_name. ' '.$last_name;?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $office_address ?></td>
            <td><?php echo $phone_no ?></td>
            <td><?php
				if($permission==1)
				{
					?><a href="permission.php?approve=false&advo_id=<?php echo$advo_id?>"><b>Unapprove</b></a><?php
				}
				else
				{
				?>	<a href="permission.php?approve=true&advo_id=<?php echo$advo_id?>"><b>Approve</b></a><?php
				}
			
			?></td>
            <td><a href="view_profile.php?advo_id=<?php echo $advo_id ?>" class="btn btn-success"> view Profile</a></td>
        </tr> 
		<?php
		  
		}
        ?>
       

    
    </table>
       </div>
</div>

</body>
</html>