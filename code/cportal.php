<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
session_start();

if ( ($_SESSION['loggeds_in'] != 1) & ($_SESSION['logged_in'] != 1)  ) {
 	$_SESSION['message'] = '<li><button type="button" data-toggle="modal" data-target="#reg" class="header_btn"><span class="glyphicon glyphicon-user"></span></button></li>  <li><button type="button" data-toggle="modal" data-target="#login" class="header_btn"><span class="glyphicon glyphicon-log-in"></span></button></li>'; 
}
else if( $_SESSION['logged_in'] = 1 ){ 
	$_SESSION['message'] = '<li><a href="sdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
	
}
elseif ( $_SESSION['loggeds_in'] = 1 ) {
             
   $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
	
	// Makes it easier to read
	$contactName = $_SESSION['contact_name'];
    $company = $_SESSION['company_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
  
}

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
	
	
<?php include 'classes/nav.php';?>

	
	<div>
	  <div class="clientsection">
		<h2 align="center"> Some of our clients</h2>
        </div>
		<div class="container">
			<p align=center;>
			<img src="img/clients/bgi2.jpg" alt="bgi" class="client">
            <img src="img/clients/cocacola3.jpg" alt="coca" class="client">
			<img src="img/clients/meta-abo-beer1.png" alt="meta" class="client">
			<img src="img/clients/Dashen1.png" alt="dashen" class="client">
			<img src="img/clients/ambo3.jpg" alt="ambo" class="client">
			<img src="img/clients/awash2.png" alt="ambo" class="client">
			<img src="img/clients/habehsa2.png" alt="ambo" class="client">
			<img src="img/clients/habehsa2.png" alt="ambo" class="client">
				
				</p>
		<a href="clients.php"><p align=right>All Companies</p></a>
		</div>
		
		
		 <hr>
	</div>
    
    	<section class="container">
            <div class="row">
        <div class="col-xs-7" style="text-align: justify; text-justify: inter-word;">
        <p>The Career Development Service is made up of people with a huge amount of experience from all sectors and sizes of organisations. We’re able to provide you with insight into a wide range of careers, help build employer relations and provide a personalised service to all those who we engage with. </p>

        <p>In fact our team were delighted to have been awarded twice by graduate employers for having the best strategy for preparing students for work after university. Found out more on our About Us page.</p>

        <p>Our dedicated and experienced team work with employers to understand their needs and how we can tailor our offering to students to support them to the best we can throughout their time at University and after they graduate. Also embedded into the curriculum, students are involved from day one.</p>
        </div>
       
        <div class="col-xs-5" align=center>
            
            <button type="button" data-toggle="modal" data-target="#reg" class="btn">  Sign Up</button>
              <br><br>
            <button type="button" data-toggle="modal" data-target="#login" class="btn"><span class="glyphicon glyphicon-log-in"></span>  Log in</button>
     
        </div>
            </div>
</section>	
	<section>
	<!--   Modals 	 -->
			<!-- Footer modal -->
            <?php include 'classes/footer.php';?>
            <!-- Login modal -->
            																						
            <?php include 'modals/cloginModal.php';?>
									
			<!-- Register modal -->
            <?php include 'modals/cregisterModal.php';?>
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
		<script>


</script>
												
											<!-- End Of Website-->
	</body>

												<!-- End of Visable Page-->		
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</html>

