<?php
include("../includes/database.php");
$advo_name=$_POST['advo_name'];

 ?>
 <!doctype html>
<?php include('../includes/header.php'); ?>

<body>

<div class="container-fluid">
      
      <a href="../index.php" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
  
   
      </div>
  
</div>
<div class="row">

		<div class="col-lg-2" style="background:#036; color:white;">
	<div><h3 style="text-align:center;">About Us</h3></div>
	 <a href="../history">History</a>
	 <a href="../calender/calander_civil_court2017_3.pdf">Civil Court Calender</a>
	 <a href="../calender/calander_high_court2017.pdf">High Court Calender</a>
	 
	 <div><h3 style="text-align:center;">Case Status</h3></div>
	 <a href="../home/search_case.php">Case Number</a>
	 <a href="../home/search_advocate.php">Advocate Name</a>
	 
	 
  </div>
	<div class="col-lg-10" style="text-align:center;" >
	<br/><br/>
	<!-- here class well ends -->
<br/><br/>
<div class="well">
<table class="table table-striped table-bordered table-hover table-responsive">
    
    	<tr>
        
        	<th>S. No.</th>
            <th>Enrollment number</th>
            <th>Advocate name</th>
            <th>E-mail</th>
            <th>Office address</th>
            <th>Phone no</th>
            <th>Profile</th>
        </tr>
        <?php
		$si=0;
		 $sql_permission="select * from advo_details where first_name like '%$advo_name' or last_name like '%$advo_name'";
         $result_permission=mysqli_query($con,$sql_permission);
         while($row=mysqli_fetch_array($result_permission))
		 { 
	     $advo_id=$row['advo_id'];
          
	
			$enrollment_no=$row['enrollment_no'];
			$first_name=$row['first_name'];
			$last_name=$row['last_name'];
			$email=$row['email'];
		$sql_profile="select office_address,phone_no from advo_profile where advo_id='$advo_id'";		
         $result_profile=mysqli_query($con,$sql_profile);
         while($row_profile=mysqli_fetch_array($result_profile))
		 {
			
			$phone_no=$row_profile['phone_no'];
			$office_address=$row_profile['office_address'];
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
            
            <td><a href="view_profile.php?advo_id=<?php echo base64_encode($advo_id); ?>" class="btn btn-success"> view Profile</a></td>
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
