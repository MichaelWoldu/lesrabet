<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = '<li><button type="button" data-toggle="modal" data-target="#reg" class="header_btn"><span class="glyphicon glyphicon-user"></span></button></li>  <li><button type="button" data-toggle="modal" data-target="#login" class="header_btn"><span class="glyphicon glyphicon-log-in"></span></button></li>';  
}
/*if ( $_SESSION['loggeds_in'] = 1 ) {
  $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';  
}*/
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    
     $_SESSION['message'] = '<li><a href="sdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
}
// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);
 $city = $mysqli->escape_string($_POST['city']);
    $job = $mysqli->escape_string($_POST['jobType']);
// Check connection
?>

<!DOCTYPE html>
<!-- 
#Created By: Michael WOldu Hiluf
#Start Date: 1st October 2018
#Project Name: Get Hired
#Page Tittle: Home Page 
-->

<html lang="en">
<head>
	
								<!--        Meta Data       -->
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Home</title>    

<meta name="description" content="Home page for get hired job board website">

<meta name="author" content="Michael Woldu Hiluf">

     						<!--        bootstrap       -->

<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


								<!--        Styler          -->
	
<link rel="stylesheet" href="css/owl.carousel.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/templet.css">
<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
<link rel="shortcut icon" href="img/logo/icon.ico" type="image/x-icon">	
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
    <link rel="stylesheet" type="text/css" href="css/all.css">
    
								<!--       reCAPTCHA       -->
<script src='https://www.google.com/recaptcha/api.js'></script>
	
  
	<style>
		.header_btn {
			border: none;
			color: white;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			margin: 2px;
			-webkit-transition-duration: 0.4s; /* Safari */
			transition-duration: 0.4s;
			cursor: pointer;
			background-color: white;
			color: black;
		}
		.header_btn:hover {
			background-color: #555555;
			color: white;
		}
		.tablink {
			background-color: #555;
			color: white;
			float: left;
			border: none;
			outline: none;
			cursor: pointer;
			padding: 14px 16px;
			font-size: 17px;
			width: 50%;
		}

		.tablink:hover {
			background-color: #777;
		}

/* Style the tab content */
		.tabcontent {
			color: black;
			display: none;
			padding: 50px;
			text-align: center;
			height: 40vh;
		}
		
		.client_section{
			border-top: 1px solid gray;
		}
		.client {
		vertical-align: middle;
			width: 15%;
			height: 15%;
			border-radius: 50%;
			margin-left: 3%;
			margin-right: 3%;
			margin-bottom: 4%;
			opacity: 0.3;
		}
		
		.client:hover{
			opacity: 0.9;
			
		}
		
		.result_section{
			height: 60vh;
		}
        
        .myFooter{
           position:absolute;
           bottom: -50em;
           width:100%; 
           background-color: lightgray;
        }
		
	</style>
</head>
	
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<!-- Begining of Visable Page-->
<body>	
	
<nav class="navbar navbar-inverse" style="margin-bottom: 0%;padding-bottom: 0%;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="img/logo/OrigainalLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
		 <li class="active"><a href="search.php">Jobs</a></li>
		  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Employeer</a>
          <ul class="dropdown-menu">
			<li><a href="cportal.php">Accounts</a></li>
            <li><a href="#">Post Vacancy</a></li>
            <li><a href="clients.php">Other Employeers</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-search"></span> Information</a>
          <ul class="dropdown-menu">
			<li><a href="#">Invest In Ethiopia</a></li>
            <li><a href="#">Student Help</a></li>
            <li><a href="#">About Us</a></li>
          </ul>
        </li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
        <?= $_SESSION['message'] ?>
        </ul>
     
    </div>
  </div>
	</nav>
    <section class="home" style="height: 25vh; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
		<div>
			<div class="container" align=right>
				<br><br>
				<div class="col-8 md" style="color: white">
  						<h2>Welcome to Get Hired</h2>
  						<p class="lead">Search, Find, Apply.</p>
              <p class="home-text">We are a young company that strives to help students find the prefect work enviroment for themselevs.</p>
					<br>
  					</div>
			<form action="result.php" method="post">
			<input name="jobType" id="jobType" type="text" class="btn btn-default" placeholder="Job">
				<select name="city" id="city" class="btn btn-default">
					<option value="Adama">Adama</option>
					<option value="Addis Ababa">Addis Ababa</option>
					<option value="Arba Minch">Arba Minch</option>
					<option value="Awasa">Awasa</option>
					<option value="Debrezet">Debrezet</option>
					<option value="Gonder">Gonder</option>
					<option value="Mekele">Mekele</option>
				</select>
			<input type="submit" class="btn btn-default"  value="Search">
		</form>
		</div>
	</div>

</section>		
	<section class="apply_section" style="height: 100vh;">
        
	</section>
    
	<div class="section footer background-brand dark-bg" id="footer" style="background-color: lightgray">
  			<div class="container">
				<hr>
  				<div class="row">
  					<div class="col-md-3">
  						<h3 class="text-uppercase font-size-sm letter-spacing-md font-weight-lg margin-bottom-md ">About Us</h3>
  						<p>We are a young company that strives to help students find the prefect work enviroment for themselevs.</p>
  					</div>
  					<div class="col-md-3 col-md-offset-1">
  						<h3 class="text-uppercase font-size-sm letter-spacing-md font-weight-lg margin-bottom-md ">Contact</h3>
  						<address>
							<strong>Michael Woldu Hiluf</strong><br>
						 	University Of Leciester<br>
						 	Leciester United Kingdom<br>
							<a href="mailto:Michael.woldu12@gmail.com">mwh17@student.le.ac.uk</a>
						</address>
  					</div>
            <div class="col-md-4 col-md-offset-1">
            <h3 class="margin-bottom-md">Our Parent Company</h3>
              <p class="home-text">We are a company located here in the beautiful Addis Abebe. We are a family run business focused on our client’s satisfaction. Our company currently focuses on the import and installation of Geomembranes and Geotextiles.</p>
            </div>
  					<div class="col-md-12 margin-top-md margin-bottom-md" style="opacity: .1;">
  						<hr/>
  					</div>
  					<div class="col-md-12 margin-top-md text-center letter-spacing-md font-size-sm text-upercase">
  						<p>COPYRIGHT © 2018 Asselefi Intergrated Trading</p>
  					</div>
  				</div>
  			</div>
</div>
											<!--   Modals 	 -->
											<!-- Login modal -->
		<div class="modal fade in" id="login">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-blue">
						<a class="close" data-dismiss="modal">x</a>
						<h5 class="modal-title text-uppercase">Add Person</h5>
					</div>
					<div class="modal-body">
						<form action="" name="cform" id="cform" method="GET" class="form-grou">
							<ul class="nav nav-list">
			
								<li class="nav-header">Key</li>
								<li><input type="text" class="form-control" placeholder="Please Enter Key" name="name" id="key" required></li>
				
						
								<li class="nav-header">Full Name</li>
								<li><input type="text" class="form-control" placeholder="Please Enter Full Name" name="name" id="name" required></li>
						
						
								<li class="nav-header">Mother's Key</li>
								<li><input type="text" class="form-control" placeholder="Please Enter Mother's Key" name="m" id="m"></li>
						
						
								<li class="nav-header">Father's Key</li>
								<li><input type="text" class="form-control" placeholder="Please Enter Father's Key" name="f" id="f" ></li>
					
						
								<li class="nav-header">Date of Birth</li>
								<li><input type="text" class="form-control" placeholder="Date Of Birth" name="dob" id="dob" required=""></li>
								
								<li class="nav-header">Gender</li>
								<li><input type="radio" name="g" value="male"> Male<br></li>
								<li><input type="radio" name="g" value="female"> Female<br></li>
							</ul>
						
							<div class="modal-footer">
								<input type="submit" class="btn btn-success" value="Add">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
											<!-- End Login modal -->
											<!-- Register modal -->
	<div class="w3-modal" id="register_modal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-uppercase">Sign Up</h5>
						<span onclick="document.getElementById('register_modal').style.display='none'" class="w3-button w3-display-topright" align=right>&times;</span>
				</div>
				<div class="modal-body">
					<form action="php/register.php" name="register_form" id="register_form" method="post">
						<div class="form-group">
							<label for="full_name" class="col-form-label">Full Name</label>
							<input type="text" class="form-control" placeholder="First Name" name="r_name" id="r_name" required="">
						</div>
						<div class="form-group">
							<label for="email" class="col-form-label">Email Address</label>
							<input type="email" class="form-control" placeholder="Email Address" name="r_email" id="r_email" required="">
						</div>
						<div class="form-group">
							<label for="date_of_birth" class="col-form-label">Date Of Birth</label>
							<input type="date" class="form-control" placeholder="MM/DD/YYYY" name="dob" id="dob" required="">
						</div>
						<div class="form-group">
							<label for="mobile_number" class="col-form-label">Mobile Number</label>
							<input type="text" class="form-control" placeholder="Mobile Number" name="tel" id="tel" required="">
						</div>
						<div class="form-group">
							<label for="password" class="col-form-label">Password</label>
							<input type="password" class="form-control" placeholder="Password" name="psw1" id="psw1" required="" onkeyup='check();' pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
						</div>
						<div class="form-group">
							<label for="confirmpsw" class="col-form-label">Confrim Password</label>
							<input type="password" class="form-control" placeholder="Password" name="psw2" id="psw2" required="" onkeyup='check();'>
						</div>
						<div class="right-w3l mt-4 mb-3">
							<input id="registerbtn"type="submit" class="form-control" value="Sign Up">
						</div>
					</form>
					<div><span id='message'></span></div>
					
					<div class="g-recaptcha" data-sitekey="6LedcH0UAAAAAO3k8oRdZQr6EjubymxSHP_eiMWU"></div>

				</div>
			</div>
		</div>
	</div>

											<!-- End Register modal -->
	
								<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 

													<!-- Scripts --> 

	
		<script type="text/javascript" src="js/bootstrap.js"></script> 

		<script type="text/javascript" src="js/SmoothScroll.js"></script> 

		<script type="text/javascript" src="js/wow.min.js"></script> 

		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 

		<script type="text/javascript" src="js/jquery.isotope.js"></script> 

		<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 									
											<!-- End Of Website-->
	</body>

												<!-- End of Visable Page-->		
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</html>

