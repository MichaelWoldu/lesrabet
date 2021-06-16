<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
require ('php/paginator.php');
session_start();
if ( ($_SESSION['loggeds_in'] != 1) & ($_SESSION['logged_in'] != 1)  ) {
 	$_SESSION['message'] = '<li><button type="button" data-toggle="modal" data-target="#reg" class="header_btn"><span class="glyphicon glyphicon-user"></span></button></li>  <li><button type="button" data-toggle="modal" data-target="#login" class="header_btn"><span class="glyphicon glyphicon-log-in"></span></button></li>'; 
}
else if( $_SESSION['logged_in'] = 1 ){ 
	$_SESSION['message'] = '<li><a href="sdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
		$city = $_SESSION['city'];
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	
}
elseif ( $_SESSION['loggeds_in'] = 1 ) {
             
   $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
	
	// Makes it easier to read
	$contactName = $_SESSION['contact_name'];
    $company = $_SESSION['company_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
	$company_id = $_SESSION['company_id'];
}
    $conn = mysqli_connect($host, $user, $pass, $db);
    
?>

<!DOCTYPE html>
<html>
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
    <body>

<?php include 'classes/nav.php';?>

	  <section class="topbar" style="background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
	
<?php include 'classes/vacancySearchForm.php';?>
    
</section>
	<section>
	<div class="container">
		<div>
			<h2 align=center>Help for Applicants</h2>
			<hr>
		</div>	

        <div class="container">
 
<p>Your CV should inform an employer of your skills and experience, and provides an opportunity to persuade employers that you have the skills, qualities and knowledge that they are looking for, based on the job description and selection criteria they have provided.  To ensure your CV is properly targeted, you need to review and amend your CV for every job application, highlighting your own skills and experience that are relevant to each opportunity. </p>

<p>More than 63% of the total population is below the age of 24. 
The student population is around half a million at over 50 universities. In the year 2016/17, the total undergraduate enrolment (government and non-government) in all programs was 788,033 while 1,300 technical and vocational education centres had an annual enrolment figure 302,000.</p>
			<h3>When would you use a CV?</h3>
			
			<ul>
				<li>an employer has specified this is required in a job advertisement; or </li>
				<li>you are approaching employers speculatively about jobs.</li>
			</ul>
	
				<p>Your CV is your chance to tell your story in such a way as to impress an employer sufficiently to invite you to the next stage of the recruitment process - usually an assessment centre or interview. Additionally, your CV is a useful developmental tool.  It can help you to identify gaps in your skills, experience and knowledge.  It is a dynamic document so ensure that you keep it up-to-date.</p>
			<br>
    </div>
</div> 
        </section>
	
                    <section>
            <?php include 'classes/footer.php';?>
            											<!-- Login modal -->
            											<!--   Modals 	 -->
											<!-- Login modal -->
            <?php include 'modals/loginModal.php';?>
									
											<!-- Register modal -->
            <?php include 'modals/registerModal.php';?>

        </section>
 									<!-- End Register modal -->
	
</body>
</html>
