
<!doctype html>
<?php include('../includes/header.php'); ?>

<body>

<div class="container-fluid">
      
      <a href="#" class="navbar-brand" style="margin-top:25px;">AdvocateSolution | Hazaribag</a>
  
      <a href="index.php" class=" navbar-brand pull-right" style="margin-top:25px;">Back To login page</a>
    
      </div>
  
</div>

<div class="row">

	<div class="col-lg-2" style="background:#036; height:1000px;text-align:center">
    
    
  
        </div>
		 
          <div class="col-lg-10">
          
          	<?php
session_start();
unset($_SESSION['admin_id']);;
if(empty($_SESSION['admin_id']))
{
	echo"<b>you are <i>logout</i> successful</b>";
	echo"<br/><br/><a href='index.php'> <i>click here to go back to admin login page</i> </a>";
	echo"<br/><br/><a href='../user/login.php'> <i>click here to go back to login page</i> </a>";
	echo"<br/><br/><a href='../index.php'> <i>click here to go back to  home page</i> </a>";
}
else
{
	echo"still login";
}
?>

           
          
          </div>  
    
    </div>
    
    

<div class="container-fluid footer">
  		<p style="text-align:center; margin-top:5px; color:white;">&copy; 2017 All rights reserved. mcavbu.</p>
        <p style="text-align:center; color:white;">Designed & Developed by - mcavbu</p>
  </div>


</body>
</html>