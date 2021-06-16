<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
require ('php/paginator.php');
session_start();
    $conn = mysqli_connect($host, $user, $pass, $db);
    $company_id = $_SESSION['company_id'];
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
			<h2 align=center>Invest In Ethiopia</h2>
			<hr>
		</div>	

        <div class="container">
 		<h3>Population and skills</h3>
 
<p>Ethiopia’s population is estimated to be around 105 million, making it the second-most populous country of Africa after Nigeria. </p>

<p>More than 63% of the total population is below the age of 24. 
The student population is around half a million at over 50 universities. In the year 2016/17, the total undergraduate enrolment (government and non-government) in all programs was 788,033 while 1,300 technical and vocational education centres had an annual enrolment figure 302,000.</p>
			<h3>Wages</h3>
			
			<p>Wages are set either at the company level or are based on negotiation between the employer and the employee. Wages shall be paid in cash, if mutually agreed to. Wages paid in kind may not exceed the market value and in no case may exceed 30% of the wages paid in cash.</p>

<p>Ethiopia does not currently have minimum wage legislation. </p>

<p>The prevalent average wage levels in Ethiopia are summarized in the table below.</p>

<p>Average wages per month in 2018 </p>
			<ul>
				<li>Unskilled labourer USD 40 </li>
				<li>Semi-Skilled labourer USD 150</li>
				<li>Skilled labourer USD 300</li>
			</ul>
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
