<?php
/* Main page with two forms: sign up and log in */
require 'db.php';
require 'php/paginator.php';
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
    $_SESSION['job'] = $_POST['jobType'];
    $_SESSION['city'] = $_POST['city'];
    $_SESSION['name'] = $_POST['jobName'];
    $_SESSION['company'] = $_POST['companys'];
    $city = $_SESSION['city'];
    $job = $_SESSION['job'];
    $name = $_SESSION['name'];
    $company = $_SESSION['company'];
    $rname = $name;
    $today =  date("Y-m-d");

$conn = mysqli_connect($host, $user, $pass, $db);
$query = "SELECT * FROM jobs WHERE MATCH (title, job_description) AGAINST ('$name') AND city LIKE '%$city%' AND job_type LIKE '%$job%' AND company LIKE '%$company%' AND app_deadline > '$today'";



//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 5; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);

    $today =  date("Y-m-d");


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
		.topbar{
			height: 35vh;
		}
		@media only screen and (max-width: 620px) {
			.topbar{
				height:55vh;
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
	
<nav class="navbar navbar-inverse" style="margin-bottom: 0%;padding-bottom: 0%;">
 <?php include 'classes/nav.php';?>
	</nav>
    <section class="topbar" style="background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
	<?php include 'classes/vacancySearchForm.php';?>
</section>		
	<section>
		<div class="row">
				<div class="col-xs-3">
                <div style="background-color: rgb(252, 235, 239);">
                      <?php 
                        $sql = "SELECT DISTINCT job_type  FROM jobs WHERE MATCH (title, job_description) AGAINST ('$name') AND city LIKE '%$city%' AND job_type LIKE '%$job%' AND company LIKE '%$company%' AND app_deadline > '$today'";
                        $x = 0;
                        if (($results->data)>0){
                        $number = count($results->data);
                            }
                        else {
                            $number = 0;
                        }
                        ?>
                        
                    <h3> Search Results: </h3>
                    <p><i> There are <strong> <?php echo $number;?></strong> vacancies with your search criteria. Please use the filtering mode in the bottom to narrow down what you would like.</i></p>
               
                    <h3> Filter Search</h3>
                    <form action="result.php" method="post">
                        Job:  
                        <input name="jobName" id="jobName" type="text" value="<?php echo $rname?>"><br>
                        City:                         
                        <?php
             $sql = "SELECT DISTINCT city FROM jobs WHERE MATCH (title, job_description) AGAINST ('$name') AND city LIKE '%$city%' AND job_type LIKE '%$job%' AND company LIKE '%$company%' AND app_deadline > '$today'";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 echo "<select name= 'city' id= 'city' class='btn btn-default'>";
                 echo "<option value=''> All Cities</option>";
                 while($row = $result->fetch_assoc()) {
                echo "<option value=" .' ' . $row["city"] . "'>" . $row["city"] . "</option>";
                 }
                 echo "</select>";
             }
             else {
        echo "No vacancies Available";
             }     ?>
                        
                      <br>
                        <br>
                <span>Job types avalable: </span><br>
                        <ul>
                            <?php
             $sql = "SELECT DISTINCT job_type  FROM jobs WHERE MATCH (title, job_description) AGAINST ('$name') AND city LIKE '%$city%' AND job_type LIKE '%$job%' AND company LIKE '%$company%' AND app_deadline > '$today'";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 while($row = $result->fetch_assoc()) {
                echo "<input type='radio' name='jobType' name value='" . $row["job_type"] . "'>" . $row["job_type"]. "</br>";
                 }
                 echo "</br>";
             }
             else {
        echo "No vacancies Available";
             }     ?>
                        </ul>
            <span>Company: </span> 
                        <?php
             $sql = "SELECT DISTINCT company FROM jobs  WHERE MATCH (title, job_description) AGAINST ('$name') AND city LIKE '%$city%' AND job_type LIKE '%$job%'";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 echo "<select name= 'companys' id= 'companys' class='btn btn-default'>";
                 echo "<option value= '' >All companies</option>";
                 while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["company"] . "'>" . $row["company"] . "</option>";
                 }
                 echo "</select>";
             }
             else {
        echo "0 results";
             }     ?>
                        <br>
                        <button type="submit" class="btn btn-success" align='right'>Filter</button>
                        </form>
                    
            </div>    
			</div>
       
        
			<div class="col-md-9">
 <?php
    $y=0;
    for ($p = 0; $p < count($results->data); $p++): ?>
<?php
    $job = $results->data[$p];
    if ($results->num_rows = 0) {
        echo 'You might have spelled the word incorrectly, please try again ';
    }
?>
    
<div class='app-container'>
         <br>
    <div class="row" style="background-color: rgb(247, 235, 239)">
    <div class="col-md-9">
            <div class='header'>
            <h2><?= $job['title'] ?></h2>
            <span class='year'><strong>Compnay: </strong><?= $job['company'] ?></span><br>
            <span class='year'><strong>Job Description: </strong><?= substr($job['job_description'],0, 200); ?>...</span><br>
            <span class='year'><strong>City: </strong><?= $job['city'] ?></span><br>
    </div>
    <div class='content description'><strong>Application Deadline :</strong>  <?= $job['app_deadline']?></div>
        <a href='applyform.php?role=<?= $job["title"] ?>&id=<?= $job["id_jobs"]?>&companyid=<?= $job["company_id"]?>'><font size="5.5em" align=center><strong>More Detail!</strong></font></a>
        </div>
    <div class="col-md-3">
        <img width='<?php 67*1.8 ?>' height='<?= 98*2.0 ?>' src='<?= $job['logo'] ?>'>
    
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
            											<!-- Login modal -->
            											<!--   Modals 	 -->
											<!-- Login modal -->
            <?php include 'modals/loginModal.php';?>
									
											<!-- Register modal -->
            <?php include 'modals/registerModal.php';?>

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