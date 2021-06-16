<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
require 'php/paginator.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = '<li><button type="button" data-toggle="modal" data-target="#reg" class="header_btn"><span class="glyphicon glyphicon-user"></span></button></li>  <li><button type="button" data-toggle="modal" data-target="#login" class="header_btn"><span class="glyphicon glyphicon-log-in"></span></button></li>';
    
$form = 'student/newForm.php';
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    //$Ocity = $_SESSION['city'];
    $skills = $_SESSION['skills'];
    $university = $_SESSION['university'];
    $grade = $_SESSION['grade'];
    $cv = $_SESSION['cv'];
    $course = $_SESSION['course'];
    $applicant_id = $_SESSION['id'];
    $city = $_SESSION['city'];
    $app_id = $_SESSION['id'];
    $job = $_SESSION['job'];
    $name = $_SESSION['name'];
    $rname = $name;

    
     $_SESSION['message'] = '<li><a href="sdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
    $form = 'student/loggedInApply.php';
}
$_SESSION['company'] = $_GET['companyid'];
$_SESSION['application_id'] = $_GET['id'];
$application_detail = $_SESSION['application_id']; 
$company_detail = $_SESSION['company'];

    
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "SELECT * FROM jobs WHERE company_id  = '$company_detail' AND id_jobs = '$application_detail'";

   $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 4; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);

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

<title>Apply!</title>    

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
		.vl {
  border-right: 3px solid green;
  height: auto;
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
	<?php include 'classes/vacancySearchForm.php';?>

</section>	
      <?php
                            for ($p = 0; $p < count($results->data); $p++): ?>
                            <?php
                                $app = $results->data[$p];
                            ?>
	<section>
            <div class="container" style="height: auto;">
                <br>
		<h1 align=center>Role Details</h1>
                <br>
            <div class="row">
            <div class="col-md-6 vl">      
                    <strong>Job Title: </strong><p><i> <?php echo $_GET["role"];?> </i></p>
                    <strong>Role Description: </strong><p><i> <?= $app['job_description']?></i></p>
                    <strong>Grade Requirment: </strong><p><i><?= $app['grades'] ?></i></p>
                    <strong>Vacancy Location: </strong><p><i><?= $app['city'] ?></i></p>
                    <strong>Application Deadline: </strong><p><i> <?= $app['app_deadline'] ?></i></p>
                 </div>
            <div class="col-md-6">
                    <strong>Company name: </strong><p><i><?= $app['company'] ?></i></p>
                    <strong>Company Detail: </strong><p><i><?= $app['com_description'] ?></i></p>
            </div>
                    <?php endfor; ?>
               
            </div>    
    <div class="row">
    <section>
        <hr>
        <h1 align=center>Apply to Role</h1>
			<div class="container" >
                   <?php include $form; ?>
		</div>
      
    </section>
        </div>
            </div>
</section>
    <div class="container">
		</div>
        <section>
            <?php include 'classes/footer.php';?>
            											<!-- Login modal -->
            											<!--   Modals 	 -->
											<!-- Login modal -->
            <?php include 'modals/loginModal.php';?>
									
											<!-- Register modal -->
            <?php include 'modals/registerModal.php';?>

        </section>							
											<!-- End Of Website-->
	</body>

											<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 

													<!-- Scripts --> 

	
		<script type="text/javascript" src="js/bootstrap.js"></script> 

		<script type="text/javascript" src="js/SmoothScroll.js"></script> 

		<script type="text/javascript" src="js/wow.min.js"></script> 

		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 

		<script type="text/javascript" src="js/jquery.isotope.js"></script> 

		<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 											<!-- End of Visable Page-->		
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</html>

