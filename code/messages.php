<?php
/* This is where companies can view applicants that they have searched for and details */
#Created By: Michael Woldu Hiluf
#Start Date: 1st October 2018
#Project Name: Lesrabet
#Page Tittle: Lucky Applicant Page
////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
require 'db.php';
require 'php/paginator.php';
session_start();
///////////<!-- Check If user is logged in -->//////////
if ( $_SESSION['loggeds_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the student dashboard page!";
  header("location: company/error.php"); 
    
$form = 'newForm.php';
}
else {
    
    $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
    $form = 'loggedInApply.php';
}
////////////////////////////////////////////////////////

$applicationId = $_GET["applicantId"];
$applicant = $_GET["name"];
$company_id =  $_SESSION['company_id'];


////////////////////////////////////////////////////////
$conn = mysqli_connect($host, $user, $pass, $db);
   $query = "SELECT messages.message, messages.studentId, messages.timeSent, messages.sentBy, students.first_name, students.last_name, students.sector FROM ( messages INNER JOIN students ON messages.studentId = students.id) WHERE companyId = '$company_id' AND messages.studentId = '$applicationId'"; 
$limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 4; // items per page
$page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
$links = 5;

$paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
////////////////////////////////////////////////////////
?>

/////////////////////Public Page////////////////////////
<!DOCTYPE html>
<html lang="en">
<head>
	
								<!--        Meta Data       -->
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Applicant</title>    

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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/all.css">
    
								<!--       reCAPTCHA       -->
<script src='https://www.google.com/recaptcha/api.js'></script>
	
</head>
	
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
														<!-- Begining of Visable Page-->
<body>	
	
<nav class="navbar navbar-inverse" style="margin-bottom: 0%;padding-bottom: 0%;">
 <?php include 'classes/nav.php';?>
	</nav>
    <section class="home" style="height: 35vh; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
	<?php include 'classes/applicantSearchForm.php';?>

	</section>	
    		<h1 align=center>Messages with <?= $applicant?>  </h1>
      <?php
                            for ($p = 0; $p < count($results->data); $p++): ?>
                            <?php
                                $app = $results->data[$p];
                            ?>
      
            <div class="container">
                <br>
            <div>      
                    <div class="col-md-9">
                <p><i> <?= $app['message']?></i></p>
                        </div>
                <div class="col-md-3">
                <p><i> <?= $app['timeSent']?> </i></p>
                </div>
          <hr>
                </div>
                <br>
                    <?php endfor; ?>
                <br>
                <div align=right>
    <span class="btn btn-success" data-toggle="modal" data-target="#contact" class="header_btn">Reply</span>
           </div>
                <br>
        </div>

    <div class="container">
		</div>
        <section>
            <?php include 'classes/footer.php';?>
            
			<?php include 'company/contactModal.php';?>

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

		<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
	   
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- End of Visable Page-->		
	<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
</html>