<?php
/* Displays user information and some useful messages */
require 'db.php';
session_start();
require ('php/paginator.php');

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the student dashboard page!";
  header("location: company/error.php");   
}

else {
         $_SESSION['message'] = '<li><a href="sdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
    
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $city = $_SESSION['city'];
    $skills = $_SESSION['skills'];
    $university = $_SESSION['university'];
    $degreee = $_SESSION['course'];
	$career =  $_SESSION['career'];
    $grade = $_SESSION['grade'];
    $cv = $_SESSION['cv'];
    
    $conn = mysqli_connect($host, $user, $pass, $db);
    
/*these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 9; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
*/}
//$image = $mysqli->query("SELECT logo FROM company WHERE email ='$email'")  or die($mysqli->error());;
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $$first_name  ?></title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/owl.carousel.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/templet.css">
<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
<link rel="shortcut icon" href="img/logo/icon.ico" type="image/x-icon">	
<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/all.css">
	
</head>
<body>
  
    <?php include '/classes/nav.php';?>

    
    <section class="home" style="height: 33vh; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
<?php include '/classes/vacancySearchForm.php';?>

</section>
   <section> 
    <div class="container">
        <h1 align=center><strong> Edit your Profile Information</strong></h1>
    </div>
	<section style="height: auto;">
		    <div class="container">
<form method="post" action="edit.php" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 vl">
                        <p>
        <label for="firstName">First Name:</label><br>
        <input class="btn btn-default" type="text" name="firstName" id="firstName" value="<?php echo $first_name; ?>">
    </p>
                         <p>
        <label for="lastName">Last Name:</label><br>
        <input class="btn btn-default" type="text" name="lastName" id="lastName" value="<?php echo $last_name; ?>">
    </p>
    <p>
        <label for="jobDescription">Email Address:</label><br>
        <input class="btn btn-default" type="email" rows="10" cols="40" name="email" id="email" value="<?php echo $email; ?>">
    </p>    
                <p>
        <label for="jobDescription">Degree:</label><br>
                    <select class="btn btn-default" name="degree" id="degree" required>
                    <option value="<?php echo $degreee; ?>"> <?php echo $degreee; ?></option> 
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
        <label for="jobDescription"> Select Grade:</label><br>
        <select class="btn btn-default" name="grade" id="grade">
          <option value="<?php echo $grade; ?>"><?php echo $grade; ?></option>
          <option value="1">First</option>
          <option value="2.1">Upper Second</option>
          <option value="2.2">Lower Second</option>
          <option value="3">Third</option>
       </select>
    </p>
			<p>
        <label for="jobDescription">Career Sector:</label><br>
          <select class="btn btn-default" name="career" id="career" required>
                    <option value="<?php echo $degreee; ?>"> <?php echo $degreee; ?></option> 
					<option value="Accountant">Accountant</option>
					<option value="Agriculture">Agriculture</option>				
					<option value="Application Developer"> Software Developer</option>
					<option value="Engineer">Engineer</option>
					<option value="Finance">Finance</option>
					<option value="Health Service Provider">Health Service Provider</option>
               		<option value="Lawyer">Lawyer</option>
					<option value="Manager">Manager</option>
					<option value="Marketing">Marketing</option>
					<option value="Media">Media</option>
					<option value="Public Sector">Public Sector</option>
       </select>
    </p>			
                <p>
        <label for="jobDescription">University Attened:</label><br>
        <input class="btn btn-default" type="text" rows="10" cols="40" name="university" id="university" value="<?php echo $university; ?>">
    </p>
                <p>
        <label for="jobDescription">City:</label><br>
        <select name="city" id="city" class="btn btn-default">
                   <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
					<option value="Adama">Adama</option>
					<option value="Addis Ababa">Addis Ababa</option>
					<option value="Arba Minch">Arba Minch</option>
					<option value="Awasa">Awasa</option>
					<option value="Debrezet">Debrezet</option>
					<option value="Gonder">Gonder</option>
					<option value="Mekele">Mekele</option>
				</select>
    </p>

                    </div>
                    <div class="col-md-6">
                          <p>
        <label for="forappdeadline">Top 5 Role Specific Skills :</label><br>
        <input class="btn btn-default" type="text" name="skill" id="skill" value="<?php echo $skills; ?>">
    <small id="skillinfo" class="text-muted">Seprate Each skill with a comma.</small>
    </p>
                          <p>
        <label for="forappdeadline">CV: </label><br>
        <input type="file" name="fileToUpload" id="fileToUpload">
                        </p>
                </div>
                </div>
        <hr>
                <div align=right>
                   <input class="btn btn-success" type="submit" value="Apply">
                    <input class="btn btn-danger" type="button" value="Cancel">
              </div>
            </form>
                </div>
    </section>
    </section>
    <section>
            <?php include 'classes/footer.php';?>
            											

        </section>
</body>
</html>
