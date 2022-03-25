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
   <div class="well">
          <form action="case_check.php" method="post">
		    <div class="form-group">
		       <label class="col-xs-3 control-label"> case number :</label>
			    <div class="col-xs-5">
			       <input type="text" name="case_no" class="form-control"placeholder="Enter case no. here " required/>
			    </div>
			      <button class="btn btn-primary" id="btn_submit"> Submit</button>
		        
		       <input type="reset" name="reset " value="Reset"  class="btn btn-warning"/>
		    </div>
		 </form>
		
	    </div>
		
<?php include('../includes/footer.php');?>
</body>
</html>