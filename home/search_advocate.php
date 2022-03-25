<!doctype html>
<?php include('../includes/header.php'); ?>

<body>
<div class="container-fluid">



	<p id="date"><script>document.getElementById("date").innerHTML=Date();</script></p>
	<div class="head_menu">
    <a href="../user/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
    <a href="../user/signup.php"><span class="glyphicon glyphicon-user"></span> Register</a>
   
    </div>
   
</div>


<div class="container-fluid header_img">
	 <img src="../images/finalban.jpg" class="img-responsive" />
</div>

<nav class="nav menubar">
	<ul class="nav navbar-nav">
        <li><a href="../index.php">Home</a></li>
         <li><a href="#">Supreme Court</a></li>
          <li><a href="#">High Court</a></li>
           
    </ul>
    
    <div id="search_area">
    	<form >
        	<div class="input-group">
            	<input type="text" placeholder="Search..." class="form-control">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button></div>
            </div>
        </form>
        </div>
   
</nav>

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
  
<div class="col-lg-10"> 
<br/>   
	 <div class="well">
	<form action="advo_check.php" method="post">
		    <div class="form-group">
		       <label class="col-xs-3 control-label">Advocate Name :</label>
			    <div class="col-xs-5">
			       <input type="text" name="advo_name" class="form-control"placeholder="Enter Advocate name here" required/>
			    </div>
			      <button class="btn btn-primary" id="btn_submit"> Submit</button>
		        
		       <input type="reset" name="reset " value="Reset"  class="btn btn-warning"/>
		    </div>
		 </form>
		
		  <div class="panel-heading"><strong>View all Advocates</strong></div>
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
		
		 include("../includes/database.php");
		 
		$si=0;
		 $sql_permission="select advo_id from advo_login where permission='1'" ;
         $result_permission=mysqli_query($con,$sql_permission);
         while($row_permission=mysqli_fetch_array($result_permission))
		 { 
	     $advo_id=$row_permission['advo_id'];
                  
		$sql="select * from advo_details where advo_id='$advo_id'";
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