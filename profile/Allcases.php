<?php
include("../includes/database.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
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
       <span style="color:white;font-size:20px;">Welcome <?php echo"<strong> $first_name </strong>"; ?></span>
   
   		<a href="myaccount.php">Home</a> 
     
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="update_case.php">Update a Case</a>
      
    
    </div>
	
	<div class="col-lg-10" style="text-align:center;" >
	<br/><br/>
	<div class="well">
	
		<table class="table table-bordered table-striped table-hover">
	  <caption ><h2 align='center'>Case details </h2></caption>
	  <tr>
	    <td rowspan='2' align='center'><strong> serial no.</strong></td>
	    <td colspan='4'align='center'><strong>case</strong></td>
	    <td colspan='3'align='center'><strong>client</strong></td>
	    
	  </tr>
	  
	  <tr align='center'>
	  <td align='center'><strong>Number</strong></td>
	  <td align='center'><strong>Category</strong></td>
	  <td align='center'><strong>Title</td>
	   <td align='center'><strong>Date</strong></td>
	  <td align='center'><strong>Name</strong></td>
	  <td align='center'><strong>Address</strong></td>
	  <td align='center'><strong>Phone no</strong></td>
	 
	  </tr>
	  <?php
	         $sql_case="select * from case_details where advo_id='$advo_id'";
			   $result_sql=mysqli_query($con,$sql_case);
			    $si=0;
			    while($row=mysqli_fetch_array($result_sql))
				{ 
			        $case_no=$row['case_no'];
			      
					?>
					<tr height='40'>
					 <td align='center'style="min-width: 50px;" ><?php $si=$si+1;echo"$si" ?> </td>
					 <td align='center'style="min-width: 100px;" ><?php echo $case_no ?></td>
					 <td align='center'style="min-width: 100px;" ><?php echo $row['case_category'] ?></td>
					 <td align='center'style="min-width: 150px;" ><?php echo $row['case_title'] ?></td>
					 <td align='center'style="min-width: 100px;" ><?php echo $row['case_date'] ?></td>
					 <td align='center'style="min-width: 100px;"><?php echo $row['client_name'] ?></td>
					 <td align='center'style="min-width: 100px;"style="max-width: 900px;"><?php echo $row['client_address'] ?></td>
					 <td align='center'style="min-width: 100px;" ><?php echo $row['client_phone_no'] ?></td>
					
					 <td style="min-width: 100px;" ><a href="case_details.php?id=<?php  echo base64_encode($case_no); ?>" >MORE</a></td>
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