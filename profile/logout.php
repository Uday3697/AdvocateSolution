<!doctype html>
<?php include('../includes/header.php'); ?>

<body>

<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
  
     
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    
    
  
        </div>
		 
          <div class="col-lg-10">
          
          	<?php
			session_start();
session_destroy();
unset($_SESSION['u_id']);
unset($_SESSION['user_name']);
if(empty($_SESSION['u_id']))
{
	echo"<b>you are <i>logged out</i> successful</b>";
	echo"<br/><br/><a href='../index.php'> <i>click here to go back to home page</i> </a>";
}
else
{
	echo"still login";
echo "<script>window.open('../user/login.php','_self')</script>";
}
?>

           
          
          </div>  
    
    </div>
    
    
<?php include('../includes/footer.php');?>


</body>
</html>