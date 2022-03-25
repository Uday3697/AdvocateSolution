<?php
session_start();
include("../includes/database.php");

if(!isset($_SESSION['u_id']))
{
//header('location:index.php');
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
      <span class="navbar-brand"style="margin-top:15px;color:white;">&nbsp Today:<?php  $date=date('d-M-Y ( l )'); echo$date; ?></span> 
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
	<br/>
	<div class='well'>
		Click on the button for 
			&nbsp;&nbsp;
		<a href='#today'><button class="btn btn-success">Today</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='#upcomming'><button class='btn btn-primary'>1 Week</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='#upcomming_month'><button class='btn btn-primary'>1 Month</button></a>
	</div>
	
	<h2 id='today'> Today </h2>
	<div class="well">
	  
	
	<table class="table">
	<caption><strong>Today Cases</strong></caption>
	<tr>
	 <td>serial no</td>
	 <td>case no</td>
	 <td> case title</td>
	 <td>client name</td>
	 <td>Phone no.</td>
	 <td>court</td>
	 
	 <td></td>
	</tr>
	<?php
	$today=date('y-m-d');
	$si=0;
	$sql="select * from case_date where advo_id='$advo_id' and next_date='".date('Y-m-d')."'";
	$result=mysqli_query($con,$sql);
   
	
	while($row=mysqli_fetch_array($result))
	{
		$si=$si+1;
		$case_no=$row['case_no'];
		 
		   $next_date=$row['next_date'];
		   $court=$row['court'];
		
     
       $sql_case="select case_title,client_name,client_phone_no from case_details where case_no='$case_no'";
	   $result_sql_case=mysqli_query($con,$sql_case);
	   while($row_case=mysqli_fetch_array($result_sql_case))
	   {
		  $case_title=$row_case['case_title'];
		$client_name=$row_case['client_name'];
		$client_phone_no=$row_case['client_phone_no'];
	   }
		
		?>
		<tr>
		<td><?php echo$si?></td>
		<td><a href="case_details.php?id=<?php  echo base64_encode($case_no) ?>" ><?php echo $case_no; ?></a></td>
		<td><?php echo $case_title; ?></td>
		<td><?php echo $client_name; ?></td>
		<td><?php echo $client_phone_no; ?></td>
		<td><?php echo $court; ?></td>
		
		</tr>
	<?php
	}
		?>
		<tr>
		   <td colspan='6'style="color:red;font-size:20px;">Have a nice day :-) </td>
		</tr>

	</table>
</div>
	<!-- upcomming events  -->
	<h2 id='upcomming'> Upcoming Week </h2>
	<div class="well">
	  
	<table class="table">
	<caption><strong>Upcoming events ( for 1 Week )</strong></caption>
	<tr>
	 <td>serial no</td>
	 <td>case no</td>
	 <td> case title</td>
	 <td>client name</td>
	 <td>Phone no.</td>
	 <td>court</td>
	 <td>next date</td>
	 
	 <td></td>
	</tr>
	<?php
	$today=date('y-m-d');
	$si=0;
	$sql_upcoming="select distinct case_no from case_date where advo_id='$advo_id' and next_date between '".date('Y-m-d',strtotime('+1 day'))."' and '".date('Y-m-d',strtotime('+8 day'))."'";
	$result_upcoming=mysqli_query($con,$sql_upcoming);
	$result_count_upcoming=count($result_upcoming);

	
	while($row=mysqli_fetch_array($result_upcoming))
	{
		$si=$si+1;
		$case_no=$row['case_no'];
		 
		 
		     
       $sql_case="select case_title,client_name,client_phone_no from case_details where case_no='$case_no'";
	   $result_sql_case=mysqli_query($con,$sql_case);
	   while($row_case=mysqli_fetch_array($result_sql_case))
	   {
		  $case_title=$row_case['case_title'];
		$client_name=$row_case['client_name'];
		$client_phone_no=$row_case['client_phone_no'];
		//to get last updated court and next_date;
		 $sql_date_upcoming="select court,next_date from case_date where case_no='$case_no'";
	     $result_date_upcoming=mysqli_query($con,$sql_date_upcoming);
		  while($row_upcoming=mysqli_fetch_array($result_date_upcoming))
	   {
		      $next_date=$row_upcoming['next_date'];
		      $court=$row_upcoming['court'];
		     
	   }
	    $ts=strtotime($next_date);
		$next_date=date('d-m-Y',$ts);
	   }
		
		?>
		<tr>
		<td><?php echo$si?></td>
		<td><a href="case_details.php?id=<?php  echo base64_encode($case_no) ?>" ><?php echo $case_no; ?></a></td>
		<td><?php echo $case_title; ?></td>
		<td><?php echo $client_name; ?></td>
		<td><?php echo $client_phone_no; ?></td>
		<td><?php echo $court; ?></td>
		<td><?php echo $next_date; ?></td>
		
		</tr>
	<?php
	}
?>
	<tr>
		   <td colspan='7'style="color:red;font-size:20px;">Have a nice Week :-) </td>
		</tr>

	</table>
	
	
</div>
	<div class='well'>
		Click on the button for &nbsp;&nbsp;
		<a href='#today'><button class="btn btn-primary">Today</button></a>
	     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='#upcomming'><button class='btn btn-success'>1 Week</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='#upcomming_month'><button class='btn btn-primary'>1 Month</button></a>
	</div>
<!-- upcomming month  -->
	<h2 id='upcomming_month'> Upcoming Month </h2>
	<div class="well">
	  
	<table class="table">
	<caption><strong>Upcoming events ( for 1 Month )</strong></caption>
	<tr>
	 <td>serial no</td>
	 <td>case no</td>
	 <td> case title</td>
	 <td>client name</td>
	 <td>Phone no.</td>
	 <td>court</td>
	 <td>next date</td>
	 
	 <td></td>
	</tr>
	<?php
	$today=date('y-m-d');
	$si=0;
	$sql_upcoming="select distinct case_no from case_date where advo_id='$advo_id' and next_date between '".date('Y-m-d',strtotime('+9 day'))."' and '".date('Y-m-d',strtotime('+39 day'))."'";
	$result_upcoming=mysqli_query($con,$sql_upcoming);
	$result_count_upcoming=count($result_upcoming);

	
	while($row=mysqli_fetch_array($result_upcoming))
	{
		$si=$si+1;
		$case_no=$row['case_no'];
		 
		 
		     
       $sql_case="select case_title,client_name,client_phone_no from case_details where case_no='$case_no'";
	   $result_sql_case=mysqli_query($con,$sql_case);
	   while($row_case=mysqli_fetch_array($result_sql_case))
	   {
		  $case_title=$row_case['case_title'];
		$client_name=$row_case['client_name'];
		$client_phone_no=$row_case['client_phone_no'];
		//to get last updated court and next_date;
		 $sql_date_upcoming="select court,next_date from case_date where case_no='$case_no'";
	     $result_date_upcoming=mysqli_query($con,$sql_date_upcoming);
		  while($row_upcoming=mysqli_fetch_array($result_date_upcoming))
	   {
		      $next_date=$row_upcoming['next_date'];
		      $court=$row_upcoming['court'];
		     
	   }
	    $ts=strtotime($next_date);
		$next_date=date('d-m-Y',$ts);
	   }
		
		?>
		<tr>
		<td><?php echo$si?></td>
		<td><a href="case_details.php?id=<?php  echo base64_encode($case_no) ?>" ><?php echo $case_no; ?></a></td>
		<td><?php echo $case_title; ?></td>
		<td><?php echo $client_name; ?></td>
		<td><?php echo $client_phone_no; ?></td>
		<td><?php echo $court; ?></td>
		<td><?php echo $next_date; ?></td>
		
		</tr>
	<?php
	}
?>
	<tr>
		   <td colspan='7'style="color:red;font-size:20px;">Have a nice Month :-) </td>
		</tr>

	</table>
	
	
</div>
	<div class='well'>
		Click on the button for &nbsp;&nbsp;
		<a href='#today'><button class="btn btn-primary">Today</button></a>
	     	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='#upcomming'><button class='btn btn-primary'>1 Week</button></a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href='#upcomming_month'><button class='btn btn-success'>1 Month</button></a>
	</div>
		
</div>

</div>
<?php include('../includes/footer.php');?>

</body>
</html>