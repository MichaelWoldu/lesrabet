<?php
/* This is where Companies get redirected when they login. This is there Portal For everything on lesrabet */
#Created By: Michael Woldu Hiluf
#Start Date: 1st October 2018
#Project Name: lesrabet
#Page Tittle: Company Dashbard
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

require 'db.php';
require ('php/paginator.php');
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['loggeds_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the student dashboard page!";
  header("location: company/error.php");    
}
else {
		 $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
    // Makes it easier to read
    $company_name = $_SESSION['company_name'];
    $contact_name = $_SESSION['contact_name'];
    $email = $_SESSION['email'];
    $contact_no = $_SESSION['contact_no'];
    $company_description = $_SESSION['company_description'];
    $logo = $_SESSION['logo'];
    $active = $_SESSION['active'];
    $company_id =  $_SESSION['company_id'];
	$hash = $_SESSION['hash'];

    
    $conn = mysqli_connect($host, $user, $pass, $db);
   $queryy = "SELECT DISTINCT messages.studentId, students.first_name, students.last_name, students.sector FROM ( messages INNER JOIN students ON messages.studentId = students.id) WHERE companyId = '$company_id'";
    $query = "SELECT * FROM jobs WHERE company = '$company_name'  ORDER BY `app_deadline` ASC";

//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 3; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
    $paginatorr = new Paginator ( $mysqli, $queryy); //__constructor is called
    $resultss = $paginatorr->getData( $limit, $page);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $company_name  ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
  	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
	
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	
  	<link rel="stylesheet" href="style.css">
	
    <link rel="stylesheet" href="css/owl.carousel.css" media="screen">
	
	<link rel="stylesheet" type="text/css" href="css/templet.css">
	
	<link rel="shortcut icon" href="img/logo/icon.ico" type="image/x-icon">	
	
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
	
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">
	
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
  	<link rel="stylesheet" href="css/home.css">
	
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/all.css">
	
</head>

    	    <?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['changeName'])) { //user logging in

        require 'company/change_cname.php';
        
    }
    
    elseif (isset($_POST['addJob'])) { //user registering
        
        require 'company/addjob.php';
        
    }
}
?>
<body>
  
<?php include 'classes/nav.php';?>
    
    <section class="home" style="height: 30vh; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
		<?php include 'classes/applicantSearchForm.php';?>

</section>
    
<div class="dashboard">
    <div class="container">
        <h1 align=center>Welcome to the Employeer dashboard: <strong><?php echo $company_name; ?></strong></h1>
    </div>
 <div class="board">
    
     <div class="dashtab">
  <button class="tablinks" onclick="viewDash(event, 'Welcome')" id="defaultOpen">Welcome</button>
  <button class="tablinks" onclick="viewDash(event, 'Profile')">Profile</button>
  <button class="tablinks" onclick="viewDash(event, 'newJob')">Post Vacancy</button>
  <button class="tablinks" onclick="viewDash(event, 'oldJob')">Previous Vacancies</button>
  <button class="tablinks" onclick="viewDash(event, 'Message')">Messages</button>
</div>

<div id="Welcome" class="dashcontent">
  <div class="dashinfo">
    <h3>Hello <?php echo $contact_name; ?>,</h3>
  <p>We want you to enjoy your experience with us and these pages are designed to help you find lots of important information to help you quickly settle in to your new life at Leicester. We hope you find your time here successful and enjoyable – good luck as you begin your time at Leicester!</p>
  <p> Once you are registered, we can prepare your University ID card so that it’s ready for you to pick up at the start of term. Once you have your card, you can access everything you need on campus, from meals to lectures.</p>
    <p align=right> Kind Reagrds,</p>
    <p align=right> The GetHired team</p>
</div>
</div>
<div id="Profile" class="dashcontent">
  <div class="container"><br>
      <div class="row">
          <div class="col-sm-6">
        Company name: 
            </div>
          <div class="col-sm-6">
           <?php echo $company_name; ?>
               <button type="button" data-toggle="modal" data-target="#changeCname" class="header_btn"><span class="glyphicon glyphicon-log-in"></span></button>
          </div>
      </div>
      <br><hr>
      <div class="row">
          <div class="col-sm-6">
        Company Logo
            </div>
          <div class="col-sm-6">
              <?php 
                
              ?>
              <span><img src="<?= $logo ?>" style="width:100px; height:100px"></span>
          </div>
      </div>
      <br><hr>

              <div class="row">
          <div class="col-sm-6">
        Contact Name
            </div>
          <div class="col-sm-6">
             <?php echo $contact_name; ?>
                </div>
      </div>
      <br><hr>
            <div class="row">
          <div class="col-sm-6">
        Company email
            </div>
          <div class="col-sm-6">
             <?php echo $email; ?>
                </div>
      </div>
      <br><hr>
               <div class="row">
          <div class="col-sm-6">
        Company Number
            </div>
          <div class="col-sm-6">
             <?php echo $contact_no; ?>
                </div>
      </div>
      <br><hr>
      <div class="row">
          <div class="col-sm-6">
        Company Description
            </div>
          <div class="col-sm-6">
             <?php echo $company_description; ?>
                </div>
      </div>
      <br><hr>
    </div>
</div>

<div id="newJob" class="dashcontent">
    <h2>New Vanacy</h2>
    <br>
    <div class="container">
       
<form action="verify_login.php" method="post">
    <div class="row">
    <div class="col-md-6">
    <p>
        <label for="jobTitle">Job Title:</label><br>
        <input class="btn btn-default" type="text" name="jobTitle" id="firstName">
    </p>
    <p>
        <label for="jobDescription">Job Description:</label><br>
        <textarea class="btn btn-default" type="textarea" rows="10" cols="50" name="job_description" id="job_description"></textarea>
    </p>
     <p>
        <label for="forappdeadline">Application Deadline:</label><br>
        <input class="btn btn-default" type="date" name="app_deadline" id="app_deadline">
    </p>
      <p>
        <select class="btn btn-default" name="jobType" id="jobType">
          <option value="">Select Job Type:</option>
          <option value="Full Time">Full Time</option>
          <option value="Graduate Job">Graduate Job</option>
          <option value="Internship">Internship</option>
          <option value="Temporary">Temporary</option>
       </select>
    </p>
    </div>
     <div class="col-md-6">
      <p>
        <label for="forlocation">Where is the Vacancy:</label><br>
        <select class="btn btn-default" name="city" id="city" required>
					<option value="Adama">Adama</option>
					<option value="Addis Ababa">Addis Ababa</option>
					<option value="Arba Minch">Arba Minch</option>
					<option value="Awasa">Awasa</option>
					<option value="Debrezet">Debrezet</option>
					<option value="Gonder">Gonder</option>
					<option value="Mekele">Mekele</option>
       </select>
    </p>
         <p>
        <label for="forlocation">What is the Academic Disciplines:</label><br>
        <select class="btn btn-default" name="degree" id="degree" required>
                    <option value="">Any Disciplines</option>
					<option value="Agriculture & Food">Agriculture &amp; Food</option>
					<option value="Architecture & Construction">Architecture &amp; Construction</option>
					<option value="Business, Economics & Accounting">Business, Economics &amp; Accounting</option>
					<option value="Computer Sciences & Technology">Computer Sciences &amp; Technology</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Healthy & Veterinary">Healthy, Medical &amp; Veterinary</option>
					<option value="Historical & Philosophical Studies">Historical &amp; Philosophical Studies</option>
					<option value="Languages & Literature">Languages &amp; Literature</option>
					<option value="Law">Law</option>
					<option value="Media & Communications">Media &amp; Communications</option>
					<option value="Political & Government">Political &amp; Government</option>
       </select>
    </p>
         <p>
           <label for="forlocation">What is the mimimum grade required:</label><br>
				<select name="grade" id="grade" class="btn btn-default">
					<option value="1">First class</option>
					<option value="2.1">Upper Second Class</option>
					<option value="2.2">Lower Second class</option>
					<option value="3">Third Class</option>
				</select>  
         </p>
     <p>
        <label for="jobDescription">Requirments:</label><br>
        <textarea type="textarea" rows="10" cols="50" name="requirments" id="requirments"></textarea>
    </p>
         
    </div>
    </div>
    <hr>
    <input class="btn btn-success" type="submit" value="Submit" name="addJob">
</form>
           
        </div>
</div>
     
<div id="oldJob" class="dashcontent">
 <?php
    for ($p = 0; $p < count($results->data); $p++): ?>
<?php
    $app = $results->data[$p];
?>
    
<div class='app-container'>
            <div class='header'>
            <h3><?= $app['title'] ?></h3>
            <span class='year'><i><?= $app['job_description'] ?></i></span>
            </div>
            <div class='content description'><span><strong> Application Deadline:</strong> <strong><font color="red"><?= $app['app_deadline']?></font></strong></span></div> 
            <div class='content description'><span><strong>City: </strong> <?= $app['city']?></span></div>
            <div class='content description'><span><a href="report.php?role=<?= $app["title"] ?>&id=<?= $app["id_jobs"]?>&companyid=<?php echo $company_id; ?>">View Report</a></span></div>
            <hr>
  </div>
<?php endfor; ?>
    <p align=right><a href="vacancies.php"> View All Posts</a></p>
</div>

<div id="Message" class="dashcontent">
  <h3>Messages With Employers</h3><hr>
     <?php
    for ($p = 0; $p < count($resultss->data); $p++): ?>
<?php
    $app = $resultss->data[$p];
?>
    
<div class='app-container'>
        <div class="row">
          <div class="col-md-9">
            <div class='header'>
            <span><h4><i><?= $app['first_name'] . " " . $app['last_name'] ?></i></h4></span>
            <span><p><i><?= $app['sector']?></i></p></span>
            </div> 
           </div>
           <div class="col-md-3">
               <br>
               <br>
               <div class='content description'><span><a href="<?= $app['name']?>"><strong> View all messages from <?= $app['first_name']?></strong> </a></span></div> 
           </div>
  </div>
    <hr>
    </div>
<?php endfor; ?>
    <p align=right><a href="mymessages.php"> All my messages</a></p>
      <br><hr>
</div>
	</div>
	</div>
	<section>
		<?php include 'classes/footer.php' ?>
	</section>
	 
  
 
	</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="index.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
function viewDash(evt, section) {
  var i, dashtabcontent, tablinks;
  tabcontent = document.getElementsByClassName("dashcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(section).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>  

</html>
