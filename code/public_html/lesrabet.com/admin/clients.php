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
    $company_id = $_SESSION['company_id'];
    $query = "SELECT * FROM companys ORDER BY `accountType` DESC";

//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 9; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
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
		.vl {
  			border-right: 3px dotted black;
  			height: auto;
			}
	
		.acountType {
			border: solid 1px black;
			background: yellow;
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
			<h2 align=center>All Companies</h2>
			<hr>
		</div>	

        <div class="container">
 <?php
    for ($p = 0; $p < count($results->data); $p++): ?>
<?php
    $app = $results->data[$p];
?>
    
<div class='app-container'>
    <div class="row">
        <div class="col-md-2">
            <img align='center' width='100px' height='100px' src='<?= $app['logo'] ?>'>
					<div class="acountType" align=center>
				<?php
		if($app['accountType'] == 3){
			echo '<span><strong>Recommended</strong></span><br>';
		}
		elseif ($app['accountType'] == 2)
		{
			echo '<span><strong>Featured</strong></span><br>';
		}
		?>
        </div>
        </div>
        <div class="col-md-9">
            <div class='header'>
            	<h2><?= $app['company_name'] ?></h2>
            	<span class='year'><i><?= $app['company_description'] ?></i></span>
			</div>
            <div class='content description'>
				<br>
				<div class="row">
					<div class="col-xs-6 vl">
						<span><a href='companyProfile.php?companyid=<?= $app["company_id"]?>'>View Company Profile</a></span>
					</div>
					<div class="col-xs-6">
						<span><a href='companyVacancies.php?companyid=<?= $app["company_id"]?>'>View Company's Vacancies</a></span>
					</div>
				</div>  
			</div>
            <hr>
        </div>
    </div>
    </div>
<?php endfor; ?>
            
         <div align=center> 
    
        <?php
   
    echo $paginator->createLinks($links, 'pagination pagination-sm');
   
        ?>
    </div>
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
