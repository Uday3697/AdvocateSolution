<!doctype html>
<?php include('includes/header.php'); ?>

<body>
<div class="container-fluid">



	<p id="date"><script>document.getElementById("date").innerHTML=Date();</script></p>
	<div class="head_menu">
    <a href="user/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a>
    <a href="user/signup.php"><span class="glyphicon glyphicon-user"></span> Register</a>
   
    </div>
   
</div>


<div class="container-fluid header_img">
	 <img src="images/finalban.jpg" class="img-responsive" />
</div>

<nav class="nav menubar">
	<ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
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
	 <a href="history">History</a>
	 <a href="calender/calander_civil_court2017_3.pdf">Civil Court Calender</a>
	 <a href="calender/calander_high_court2017.pdf">High Court Calender</a>
	 
	 <div><h3 style="text-align:center;">Case Status</h3></div>
	 <a href="home/search_case.php">Case Number</a>
	 <a href="home/search_advocate.php">Advocate Name</a>
	
	 
  </div>
  
   <div class="col-lg-10">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29156.898901884277!2d85.33907815534216!3d24.00946185556908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc026b9b7e74c4db!2sCivil+Court+Hazaribagh!5e0!3m2!1sen!2sin!4v1506156369797" width="1100" height="370" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
  </div>
  
  
<?php include('includes/footer.php');?>
</body>
</html>