<?php
/* Displays user information and some useful messages */
require 'db.php';
require ('php/paginator.php');
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['loggeds_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing this section. This is for registered companies only!";
  header("location: company/error.php");    
}
else {
    // Makes it easier to read
			 $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
    $company_name = $_SESSION['company_name'];
    $contact_name = $_SESSION['contact_name'];
    $email = $_SESSION['email'];
    $contact_no = $_SESSION['contact_no'];
    $company_description = $_SESSION['company_description'];
    $logo = $_SESSION['logo'];
    $active = $_SESSION['active'];
    $_SESSION['job_id'] = $_GET[id];
    $job_id = $_SESSION['job_id'];
	$_SESSION['company_id'] = $_GET[companyid];
	$company_id = $_SESSION['company_id'];
	$_SESSION['role'] = $_GET["role"];
	$role =  $_SESSION['role'];
	$_SESSION['grade'] = $_POST['grade'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['appName']= $_POST['appName'];
	$_SESSION['course'] = $_POST['course'];
  	$grade = $_SESSION['grade'];
    $city = $_SESSION['city'];
 	$appName = $_SESSION['appName'];
    $course = $_SESSION['course'];
        
 
	
    $conn = mysqli_connect($host, $user, $pass, $db);
    $query = "SELECT * FROM application WHERE jobs_id = '$job_id' AND city LIKE '%$city%' AND grade LIKE '%$grade%' AND course LIKE '%$course%' AND full_name LIKE '%$appName%'";
	//$query = "SELECT * FROM jobs WHERE MATCH (title, job_description) AGAINST ('$name') AND city LIKE '%$city%' AND job_type LIKE '%$job%' AND company LIKE '%$company%'";

//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 9; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
}
//$image = $mysqli->query("SELECT logo FROM company WHERE email ='$email'")  or die($mysqli->error());;
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $company_name  ?></title>
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
	
	<style>
		.vl {
  border-right: 3px dotted green;
  height: auto;
}
		.results-container{
			margin-left: 3%;
			margin-right: 3%;
			height: auto;
		}
	</style>
</head>
<body>
  
    <?php include 'classes/nav.php';?>

    
    <section class="home" style="height: 35vh; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">
<?php include 'classes/applicantSearchForm.php';?>
</section>
   <section> 
    <div class="container">
        <h1 align=center>Report for: <strong><?php echo $role; ?></strong></h1>
	   </div>
	   
	   	<section class="results-container">
			   <div class="row">
		   <div class="col-md-6">
			   <span class="btn btn-info" style="float: left;"><a href="vacancies.php"> <font size="5.5em"> Other Vacancies </font></a></span>
	
		   </div>
		   <div class="col-md-6">
			   <span class="btn btn-info" style="float: right;" ><a href='company/declineAll.php?&id=<?= $job_id ?>'> <font size="5.5em">Found Applicant </font></a></span> 

		   </div>
	   </div>
			<div class="row">
				<div class="col-md-3">
                <div style="background-color: rgb(252, 235, 239);">     
                    <h3> Vacancy Summary: </h3>
                    <strong>Job Title: </strong><p><i> <?php echo $role;?> </i></p>

					<p><strong> Total Number of Applicants:  </strong> </p> 
					
					<p><strong> Total Number of Applicants Accecpted:  </strong> </p> 
                  
					<p><strong> Total Number of Applicants Declined:  </strong> </p> 
                  
					<p><strong> Total Number of Applicants waiting to be reviewed: </strong></p> 
                   
									
                    <h3> Filter Search</h3>
                    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
						
                        Candidate Full Name:  
                        <input name="appName" id="appName" type="text" value="<?php echo $appName?>"><br>
                        Candidate City:                         
                        <?php
             $sql = "SELECT DISTINCT city FROM application WHERE jobs_id = '$job_id' AND city LIKE '%$city%'";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 echo "<select name= 'city' id= 'city' class='btn btn-default'>";
                 echo "<option value=''> All Cities</option>";
                 while($row = $result->fetch_assoc()) {
                echo "<option value=" . $row["city"] . "'>" . $row["city"] . "</option>";
                 }
                 echo "</select>";
             }
             else {
        echo "No Applicants";
             }     ?>
                        
                      <br>
                        <br>
                <span>Candidates with gardes higher than or equal to: </span><br>
                        <ul>
                    <input type='radio' name='grade'  value='1'> 1<br>
                     <input type='radio' name='grade'  value='2.1'> 2.1<br>
                     <input type='radio' name='grade'  value='2.2'> 2.2<br>
                     <input type='radio' name='grade'  value='3'> 3<br>
							
                        </ul>
						
            <span> Candidate Degree: </span> 
                        <?php
             $sql = "SELECT DISTINCT course FROM application WHERE jobs_id = '$job_id' AND city LIKE '%$city%'";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 echo "<select name= 'city' id= 'city' class='btn btn-default'>";
                 echo "<option value=''> All Degree's</option>";
                 while($row = $result->fetch_assoc()) {
                echo "<option value=" . $row["course"] . "'>" . $row["course"] . "</option>";
                 }
                 echo "</select>";
             }
             else {
        echo "No Applicants";
             }     
						?>
                        <br>
                        <button type="submit" class="btn btn-success" align='right'>Filter</button>
                        </form>
                    
            </div>   
                <br>
			</div>
       
        
			<div class="col-md-9">
				<br>
 <?php
    $y=0;
    if ($y == ($results->data)){
        echo'
            <div class="app-container">
                <div class="row">
                    <h1>No appicants have applied yet.</h1>
                </div>
              <hr>
            </div>';
    } 
                else {
    for ($p = 0; $p < count($results->data); $p++): ?>
<?php
    $job = $results->data[$p];
?>
<div>
	 <div class="row" style="background-color: rgb(247, 235, 239)">
    <div class="row">
    <div class="col-md-9 vl">
            <div class='header'>
            <span><strong>Full Name: </strong><?= $job['full_name'] ?></span><br>
            <span><strong>Course: </strong><?= $job['course'] ?></span><br>
            <span><strong>Grade: </strong><?= $job['grade'] ?></span><br>
    </div>
    <div class='content description'><strong>University Attended :</strong>  <?= $job['university']?></div>
        <a href='applicant.php?role=<?= $job["jobs_id"] ?>&id=<?= $job["id"]?>&title=<?= $title ?>'><font size="5.5em" align=center><strong>More detail!</strong></font></a>
    </div>
        <div class="col-md-2">
            <br><br>
            
				<?php
		if($job["id_responses"] == 1){
			echo '<span class="btn btn-success">Applicant Accepted</span>';
		}
		elseif ($job["id_responses"] == 2)
		{
			echo '<span class="btn btn-warning">Applicant Awaiting Response</span>';
		}
		elseif ($job["id_responses"] == 3) {
			echo '<span class="btn btn-danger">Applicant Declined</span>';
		}
				?>
        </div>
        </div>
    <hr>
  </div>
				</div>       
<?php endfor; ?>
    <div align=center> 
        <?php
 
    echo $paginator->createLinks($links, 'pagination pagination-sm');
        }
        ?>
    </div>

             </div>
         
		</div>
    </section>
    </section>
    <section>
            <?php include 'classes/footer.php';?>
		<?php include 'modals/acceptModal.php';?>
		<?php include 'modals/declineModal.php';?>

        </section>
</body>
</html>
