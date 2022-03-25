<?php
include("../includes/database.php");
include("../includes/function.php");
session_start();
if(!isset($_SESSION['u_id']))
{
	//header("location:index.php");
echo "<script>window.open('../user/login.php','_self')</script>";
}
$advo_id=$_SESSION['u_id'];
//for getting the first name
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
	
					//this will work after submit
if($_SERVER['REQUEST_METHOD']=='POST')
{
	$case_category=format_str($_POST['case_category']);
	$case_title=format_str($_POST['case_title']);
	$case_no=format_str($_POST['case_no']);
	$client_name=format_str($_POST['client_name']);
	$client_phone_no=format_str($_POST['client_phone_no']);
	$client_address=format_str($_POST['client_address']);
	$case_detail=format_str($_POST['case_detail']);
	$case_date=format_str($_POST['case_date']);
	$next_date=format_str($_POST['next_date']);
	$fixed_for=format_str($_POST['fixed_for']);
	$judge=format_str($_POST['judge']);
	$court=format_str($_POST['court']);

if(array_key_exists('client_phone_no',$_POST))
	{
		if(!preg_match('/^\d{10}$/', $_POST['client_phone_no']))
		{
			echo "<script> alert('Invalid number!! pleasae enter a correct number');</script>";
			echo "<script> window.open('addNewcase.php','_self');</script>";
		}
		else
		{

   $sql_case="insert into case_details(advo_id,case_category,case_title,case_no,client_name,client_phone_no,client_address,case_date)
              values('$advo_id','$case_category','$case_title','$case_no','$client_name','$client_phone_no','$client_address','$case_date')";
   $result_sql=mysqli_query($con,$sql_case);
   $sql_date="insert into case_date (case_no,previous_date,case_detail,next_date,fixed_for,judge,court,edit,advo_id)values('$case_no','$case_date','$case_detail','$next_date','$fixed_for','$judge','$court','1','$advo_id')";
   $result_sql_date=mysqli_query($con,$sql_date);
   if($result_sql AND $result_sql_date)
   {
	   
	   echo"<script> alert('case details are saved');</script>";
	  ?><script>window.open('add_new_accused.php?case_no=<?php echo base64_encode($case_no); ?>','_self')</script><?php
   }
   else
   {
	    echo"<script> alert('something is wrong!!! case cant be submitted');</script>";
   }
}}
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
    

    <div class="col-lg-10" style="margin-top:15px;">
    
    <form name="form1" method="post" class="form-horizontal" action="addNewcase.php">
     <div class="form-group">
        <label class="col-xs-3 control-label">Case category</label>
        <div class="col-xs-5 selectContainer">
            <select class="form-control" name="case_category" required>
                <option value="">Choose case category</option>
                <option value="criminal">Criminal</option>
                <option value="civil">Civil</option>
                <option value="income tax">Income tax</option>
                <option value="sales tax">Sales tax</option>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Case title</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="case_title" placeholder="case title" required />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Case number</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="case_no" placeholder="case no" required/>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Client name</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="client_name" placeholder="client name"required />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Phone no.</label>
        <div class="col-xs-5">
            <input type="text" class="form-control" name="client_phone_no" placeholder="phone no"required />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Client Address</label>
        <div class="col-xs-5">
            <textarea name="client_address" class="form-control" rows="5" placeholder=" Enter Client Address here ..." required></textarea>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-xs-3 control-label">Case detail</label>
        <div class="col-xs-5">
            <textarea name="case_detail" class="form-control" rows="5" placeholder=" Enter case details here ..." required></textarea>
        </div>
    </div>
    
    
    <div class="form-group">
        <label class="col-xs-3 control-label">date</label>
        <div class="col-xs-2">
            <input type="date" class="form-control" name="case_date" required />
        </div>
        
         <label class="col-xs-1 control-label">Next date</label>
        <div class="col-xs-2">
            <input type="date" class="form-control" name="next_date" required />
        </div>
         <label class="col-xs-1 control-label">Fixed for</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="fixed_for" placeholder="Enter fixed for" required />
        </div>
    </div>
	<div class="form-group">
        <label class="col-xs-3 control-label">Judge Name</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="judge" placeholder="Enter judge name" required />
        </div>
        
         <label class="col-xs-1 control-label">Court/Room no.</label>
        <div class="col-xs-2">
            <input type="text" class="form-control" name="court" placeholder="Enter Court/Room no."required />
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-5">
            <button type="submit" class="btn btn-primary"  name="submit">Save and Next</button>
        </div>
    </div>
    </form>
    
            
    </div>
</div>





<?php include('../includes/footer.php');?>


</body>
</html>