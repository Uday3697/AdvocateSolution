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
    <span><?php echo "<img style='margin-top:5px; margin-left:5px;' src = 'post_images/$profile_photo' width='200' alt='Smiley face' height='42' width='42'class='img-responsive img-rounded'>"; ?></span>
       <span style="color:white;font-size:20px;">Welcome <?php echo"<strong> $first_name </strong>"; ?></span>
   
   		<a href="myaccount.php">Home</a>     
        <a href="addNewcase.php">Add New Cases</a>
        <a href="Allcases.php">All Case</a>
        <a href="update_case.php">Update a Case</a>
          
    
    
    </div>
    
    
    <div class="col-lg-10" style="margin-top:15px;">
    		<form method="post" class="form-horizontal" action="#" enctype="multipart/form-data" name="form1">
     <div class="form-group">
        <label class="col-xs-3 control-label">Professional area</label>
        <div class="col-xs-5 selectContainer">
            <select class="form-control" name="professional_area" value="<?php echo $professional_area ?> required >
                <option value="Professional Area" >Professional Area</option>
                <option value="criminal">Criminal</option>
                <option value="civil">Civil</option>
                <option value="income tax">Income tax</option>
                <option value="sales tax">Sales tax</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Experience</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="experience" value="<?php echo$experience ?>" required/>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Date of joining</label>
        <div class="col-xs-5">
            <input type="date" class="form-control" name="date_joining" value="<?php echo$date_joining ?>"required/>
        </div>
        
        
    </div>
    
    
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Add Phone no.</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="phone_no" value="<?php echo$phone_no ?>" required />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Office Address</label>
        <div class="col-xs-5">
            <textarea  class="form-control" rows="5" name="office_address" required><?php echo$office_address ?></textarea>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Residential Address</label>
        <div class="col-xs-5">
            <textarea class="form-control" rows="5" name="residential_address"  required><?php echo$residential_address ?></textarea>
        </div>
    </div>
    
    <div class="form-group">
    
    <label class="col-xs-3 control-label">Upload picture</label>
    <div class="col-xs-5">
    <input type="file" name="profile_photo" size='60' required />
    </div>
    
    </div>
    
    
    
    
    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-5">
            <button type="submit" class="btn btn-primary" name="submit" onclick="phonenumber(document.form1.phone_no)">Submit</button>
        </div>
    </div>
    </form>
    
    </div>
</div>
	
	</div>

<?php include('../includes/footer.php');?>
</body>
</html>

<?php
include("../includes/database.php");
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$professional_area=$_POST['professional_area'];
	$experience=$_POST['experience'];
	$date_joining=$_POST['date_joining'];
	$phone_no=$_POST['phone_no'];
	$office_address=$_POST['office_address'];
	$residential_address=$_POST['residential_address'];
	$profile_photo=$_FILES['profile_photo']['name'];
	$profile_photo_tmp=$_FILES['profile_photo']['tmp_name'];

	
	move_uploaded_file($profile_photo_tmp,"post_images/$profile_photo");
   $sql_date="update advo_profile set professional_area='$professional_area',date_joining='$date_joining',experience='$experience',phone_no='$phone_no',office_address='$office_address',residential_address='$residential_address',profile_photo='$profile_photo' where advo_id='$advo_id'";
   $result_sql_date=mysqli_query($con,$sql_date);
   if($result_sql_date)
   {
	   echo"<script> alert('profile deatails are saved');</script>";
	   echo "<script>window.open('edit_profile.php','_self')</script>";
     
   }
   else
   {  
      echo "<script> something went wrong</script>";
   }

}
?>