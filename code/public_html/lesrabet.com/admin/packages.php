<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
require 'php/paginator.php';
session_start();

if ( $_SESSION['loggeds_in'] = 1 ) {
             
   $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
	
	// Makes it easier to read
	$contactName = $_SESSION['contact_name'];
    $company = $_SESSION['company_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	$company_id = $_SESSION['company_id'];
	$_SESSION['city'] = $_POST['city'];
	 //$skill = $mysqli->escape_string($_POST['skill']);
    $grade = $mysqli->escape_string($_POST['reqGrade']);
	$_SESSION['skill']= $_POST['skill'];
	$skill =  $_SESSION['skill'];
	$company_name = $_SESSION['company_name'];
	
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "SELECT * FROM students WHERE MATCH (course, skills) AGAINST ('$skill') AND grade <= '$grade'";
}

else{
 $_SESSION['message'] = "You must log in as a company before viewing this page!";
  header("location: company/error.php"); 
}

//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 5; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);

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

<title>Find the Perfect Candidate</title>    

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
		.box {
			border: 2px solid black;
			margin-right: 3px;
			margin-left: 3px;
		}
		.info_box {
			margin-left: 3px;
		}
		.topbar{
			height: 35vh;
		}
		@media only screen and (max-width: 620px) {
			.topbar{
				height:55vh;
			}
		}
		
	</style>
</head>
	
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<!-- Begining of Visable Page-->
<body>	
	
<nav class="navbar navbar-inverse" style="margin-bottom: 0%;padding-bottom: 0%;">
 <?php include 'classes/nav.php';?>
	</nav>
    <section class="topbar" style="background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">

		<?php include 'classes/applicantSearchForm.php';?>
</section>		
	<section>
		<br>
		<br>
		<div class="row">
			<div class="col-xs-3 info_box">
					<div class="row">
						<p>check</p>
					</div>
			</div>
			<div class="col-xs-2 box">
					<div class="row">
						<p>check</p>
						<hr>
					</div>
					<div class="row">
						<p>More Infromation</p>
						<p>Second Infromation</p>
						<p>Link Information</p>
					</div>
				</div>
			<div class="col-xs-2 box">
					<div class="row">
						<p>check</p>
						<hr>
					</div>
					<div class="row">
						<p>More Infromation</p>
						<p>Second Infromation</p>
						<p>Link Information</p>
				</div>
				</div>
			<div class="col-xs-2 box">
					<div class="row">
						<p>check</p>
						<hr>
					</div>
					<div class="row">
						<p>More Infromation</p>
						<p>Second Infromation</p>
						<p>Link Information</p>
					</div>
				</div>
			<div class="col-xs-2 box">
					<div class="row">
						<p>check</p>
						<hr>
					</div>
					<div class="row">
						<p>More Infromation</p>
						<p>Second Infromation</p>
						<p>Link Information</p>
					</div>
				</div>					
			</div>
    </section>
    <section>
        <hr>
    <div class="container">
			<h2 align=center> Companies Hiring</h2>
		
		<div class="container">
			<img src="img/clients/bgi2.jpg" alt="Avatar" class="client">
			<img src="img/clients/meta-abo-beer1.png" alt="Avatar" class="client">
			<img src="img/clients/Dashen1.png" alt="Avatar" class="client">
			<img src="img/clients/ambo3.jpg" alt="Avatar" class="client">
		</div>
		
		<a href="clients.php"><p align=right>All Companies</p></a>
		</div>
            </section>
        
    <section>
            <?php include 'classes/footer.php';?>
											

        </section>

	
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
</html>