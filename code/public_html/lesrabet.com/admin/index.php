<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
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
  
}
?>
<!DOCTYPE html>
<!-- 
#Created By: Michael WOldu Hiluf
#Start Date: 1st October 2018
#Project Name: Lesrabet
#Page Tittle: Home-Page 
-->
<html lang="en">
<head>
	
								<!--        Meta Data       -->
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Welcome to Lesrabet</title>    

<meta name="description" content="Home page for get hired job board website">

<meta name="author" content="Michael Woldu Hiluf">

     						<!--        bootstrap       -->

<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


								<!--        Styler          -->
	
<link rel="stylesheet" href="css/owl.carousel.css" media="screen">
<link rel="shortcut icon" href="img/logo/icon.ico" type="image/x-icon">	
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/all.css">

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8454069294796978",
    enable_page_level_ads: true
  });
</script>
	
	<style>
		@media only screen and (max-width: 720px) {
		.divid{
			height: 80vh;
		}
		}
	</style>
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-8454069294796978",
    enable_page_level_ads: true
  });
</script>
</head>
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<!-- Begining of Visable Page-->
<body>	
	<?php include 'classes/nav.php';?>
	
	<section class="home" style="height: 75vh; background: url(img/bg/bg_1.jpg) no-repeat center center; background-size: cover; opacity: .8;">
		<?php include 'classes/vacancySearchForm.php';?>
    </section>	
	
	<div class="divid">
		<button class="tablink" onclick="openCity('student', this, '#777')" id="defaultOpen" >Student</button>
		<button class="tablink" onclick="openCity('company', this, '#777')" align=center>Employeer</button>
		<div class="container">
			<div id="student" class="tabcontent">
				<h1>Student</h1>
				
				<p align=left>The Career Development Service is made up of people with a huge amount of experience from all sectors and sizes of organisations. We’re able to provide you with insight into a wide range of careers, help build employer relations and provide a personalised service to all those who we engage with.</p>

				<p>In fact our team were delighted to have been awarded twice by graduate employers for having the best strategy for preparing students for work after university. Found out more on our About Us page.</p>
            	<br>
            <div>
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#reg" class="header_btn"><span class="glyphicon glyphicon-user"></span> Sign-up</button>
				
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#login" class="header_btn"><span class="glyphicon glyphicon-log-in"></span> Log-in</button>
            </div>
		</div>
			<div id="company" class="tabcontent">
				<h1>Employeer</h1>
				
				<p align=left>We take the time to get to know our students and what makes them tick – that way we can run a series of carefully designed events and engagement activities to ensure your brand is known and recognised as an employer of choice for our enthusiastic and ambitious students.</p>
				
				<p>With a team consisting of graduate recruitment specialists we know and understand the ever evolving challenges in the area of attracting, engaging, recruiting and developing future talent. Get in touch with us to find out how you can meet and recruit our students.</p>
				<br>
				<br>
				<div>
					<a href="cportal.php"><button class="btn btn-default"> Find out more</button></a>
            	</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="client_section">
			<h2 align=center> Companies Hiring</h2>
			
			<div class="container">
				<img src="img/clients/bgi2.jpg" alt="Avatar" class="client">
				<img src="img/clients/meta-abo-beer1.png" alt="Avatar" class="client">
				<img src="img/clients/Dashen1.png" alt="Avatar" class="client">
				<img src="img/clients/ambo3.jpg" alt="Avatar" class="client">
			</div>
			
			<a href="clients.php"><p align=right>All Companies</p></a>
		</div>
	</div>
    <section>
		<?php include 'classes/footer.php';?>

        <?php include 'modals/loginModal.php'; ?>
        
        <?php include 'modals/registerModal.php';?>
	</section>
								<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 

													<!-- Scripts --> 

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
		<script type="text/javascript" src="js/bootstrap.js"></script> 

		<script type="text/javascript" src="js/SmoothScroll.js"></script> 

		<script type="text/javascript" src="js/wow.min.js"></script> 

		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 

		<script type="text/javascript" src="js/jquery.isotope.js"></script> 

		<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
			
								<!--       reCAPTCHA       -->
		<script src='https://www.google.com/recaptcha/api.js'></script>
	
		<script>
			var check = function() {
				if (document.getElementById('psw1').value == document.getElementById('psw2').value) {
					document.getElementById('message').style.color = 'green';
    				document.getElementById('message').innerHTML = 'Password matchs';
	  				document.getElementById('registerbtn').disabled =false;
  				} 
				else {
    				document.getElementById('message').style.color = 'red';
    				document.getElementById('message').innerHTML = 'Password does not match';
					document.getElementById('registerbtn').disabled =true;
  				}

			}

			function openCity(cityName,elmnt,color) {
  				var i, tabcontent, tablinks;
				
  				tabcontent = document.getElementsByClassName("tabcontent");
  				for (i = 0; i < tabcontent.length; i++) {
    				tabcontent[i].style.display = "none";
  				}
				
  				tablinks = document.getElementsByClassName("tablink");
  				for (i = 0; i < tablinks.length; i++) {
    				tablinks[i].style.backgroundColor = "";
  				}
				
  				document.getElementById(cityName).style.display = "block";
  				elmnt.style.backgroundColor = color;

				}
				// Get the element with id="defaultOpen" and click on it
				document.getElementById("defaultOpen").click();
		</script>
												
											<!-- End Of Website-->
	</body>

												<!-- End of Visable Page-->		
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</html>

