<?php

include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:../index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
		 $sql="select * from advo_details where advo_id='$advo_id'";
			   $result_sql=mysqli_query($con,$sql)  ;
	            while($row=mysqli_fetch_array($result_sql))
					{
						$enrollment_no=$row['enrollment_no'];
						$first_name=$row['first_name'];
						$last_name=$row['last_name'];
						$dob=$row['dob'];
						$email=$row['email'];
						$gender=$row['gender'];
					}							
		$sql_profile="select * from advo_profile where advo_id='$advo_id'";		
        $result_profile=mysqli_query($con,$sql_profile);
        while($row=mysqli_fetch_array($result_profile))
		{
			$professional_area=$row['professional_area'];
			$date_joining=$row['date_joining'];
			$experience=$row['experience'];
			$phone_no=$row['phone_no'];
			$office_address=$row['office_address'];
			$residential_address=$row['residential_address'];
			$profile_photo=$row['profile_photo'];
		}
		$sql_count="select case_no from case_details where advo_id='$advo_id'";
		$result_count=mysqli_query($con,$sql_count);
		$total_case=0;
		while($row=mysqli_fetch_array($result_count))
		{
			$total_case=$total_case+1;
		}
		
?>
<!doctype html>
<?php include('../includes/header.php'); ?>

<body>

<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
  
      <a href="myaccount.php" class=" navbar-brand pull-right" style="margin-top:25px;">Back To Dashboard</a>
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    
    <span><?php echo "<img src = 'post_images/$profile_photo' width='200' class='img-responsive img-rounded' >"?></span>
       <span style="color:white;font-size:20px;">Welcome <?php echo$first_name ?></span>
   
   		<a href="myaccount.php">Home</a> 
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="update_case.php">Update a Case</a>
  
        </div>
        
          <div class="col-lg-10">
          <br/>
          	<div class="well"><b>Click to&nbsp;<a  href="change_password.php"><div class="btn btn-primary">change password</div></a>&nbsp;for login into your account</b>
          	</div>
            		<table border="2" bgcolor="#000066" align="center" width="700">
            			<tr>
                       <h2> Personal Information</h2>
                        </tr>
                        
                        <tr align="center">
                        	<td style="min-width: 300px;"><h4>First name</h4></td>
                            <td style="min-width: 600px; max-width:750px;"> <?php echo$first_name ?></td>
                        </tr>
                        
                        <tr align="center">
                        	<td style="min-width: 300px;"><h4>Last name</h4></td>
                            <td style="min-width: 600px; max-width:750px;"> <?php echo$last_name ?></td>
                        </tr>
                        
                        <tr align="center">
                        	<td style="min-width: 300px;"><h4>Date of Birth</h4></td>
                            <td style="min-width: 600px; max-width:750px;"> <?php echo$dob ?></td>
                        </tr>
						
                        <tr align="center">
                        	<td style="min-width: 300px;"><h4>Gender</h4></td>
                            <td style="min-width: 600px; max-width:750px;"> <?php echo$gender ?></td>
                        </tr>
                        <tr align="center">
                        	<td style="min-width: 300px;"><h4>Enrollment number</h4></td>
                            <td style="min-width: 600px; max-width:750px;"> <?php echo$enrollment_no ?></td>
                        </tr>
                        </table>
                        
                        <table border="2" bgcolor="#000066" align="center" width="700">
                        <tr><h2>Contact details</h2></tr>
                        
                        <tr align="center">             
                        	<td style="min-width: 300px;"><h4>Phone number</h4> </td>
                            <td style="min-width: 600px; max-width:750px;"> <?php echo$phone_no ?></td>
                        </tr>
                        <tr align="center">
                        	<td style="min-width: 300px;"><h4>Email</h4></td>
                            <td style="min-width: 600px; max-width:750px;"><?php echo$email ?></td>
                        </tr>
                        </table>
                        
                        <table border="2" bgcolor="#000066" align="center" width="700">
                         <tr><h2>Professional Information</h2></tr>
                           <tr align="center">
                           		<td style="min-width: 300px;"><h4>Professional area</h4></td>
                                <td style="min-width: 600px; max-width:750px;"><?php echo$professional_area ?></td>
                           </tr>
                           
                           <tr align="center">
                           		<td style="min-width: 300px;"><h4>Experience</h4></td>
                                <td style="min-width: 600px; max-width:750px;"><?php echo$experience ?></td>
                           </tr>
                           <tr align="center">
                           		<td style="min-width: 300px;"><h4>Date of joining</h4></td>
                                <td style="min-width: 600px; max-width:750px;"><?php echo$date_joining ?></td>
                           </tr>
						   <tr align="center">
                           		<td style="min-width: 300px;"><h4>Total number of Cases</h4></td>
                                <td style="min-width: 600px; max-width:750px;"><?php echo$total_case ?></td>
                           </tr>
                        
                        </table>
                        <table border="2" bgcolor="#000066" align="center" width="700">
                        	<tr><h2>Address</h2></tr>
                            <tr align="center">
                            	<td style="min-width: 300px;"><h4>Office address</h4></td>
                                <td style="min-width: 600px; max-width:750px;"><?php echo$office_address ?></td>
                            </tr>
                            <tr align="center">
                            	<td style="min-width: 200px;">
                                	<h4>Residential address</h4>
                                </td>
                                <td style="min-width: 600px; max-width:750px;"><?php echo$residential_address ?></td>
                            </tr align="center">
                        
                        </table>
                        
                        
                       <a style="margin-top:5px;margin-left:400px;" class="btn btn-primary" href="aboutyou.php">Update Information</a>
            
            
            		
           
          
          </div>  
    
    </div>
    
    

<?php include('../includes/footer.php');?>


</body>
</html>