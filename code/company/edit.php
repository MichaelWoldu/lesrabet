<?php

/* Registration process, inserts user info into the database 

   and sends account confirmation email message

 */

session_start();

require '../db.php';

// Check connection

$link = mysqli_connect($host, $user, $pass, $db);

if($link === false){

    die("ERROR: Could not connect. " . mysqli_connect_error());

}



$applicant_id = $_SESSION['id'];

$first_name = mysqli_real_escape_string($link, $_REQUEST['firstName']);

$last_name = mysqli_real_escape_string($link, $_REQUEST['lastName']);

$email = mysqli_real_escape_string($link, $_REQUEST['email']);

$degree = mysqli_real_escape_string($link, $_REQUEST['degree']);

$grade = mysqli_real_escape_string($link, $_REQUEST['grade']);

$university = mysqli_real_escape_string($link, $_REQUEST['university']);

$city = mysqli_real_escape_string($link, $_REQUEST['city']);

$skill = mysqli_real_escape_string($link, $_REQUEST['skill']);

$career = mysqli_real_escape_string($link, $_REQUEST['career']);



$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

$cv_location =  $target_dir . $applicant_id . basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {

        echo "File is an image - " . $check["mime"] . ".";

        $uploadOk = 1;

    } else {

        echo "File is not an image.";

        $uploadOk = 0;

    }

}

// Check if file already exists

if (file_exists($target_file)) {

    echo "Sorry, file already exists.";

    $uploadOk = 0;

}

// Check file size

if ($_FILES["fileToUpload"]["size"] > 500000) {

    echo "Sorry, your file is too large.";

    $uploadOk = 0;

}

// Allow certain file formats

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

&& $imageFileType != "gif" ) {

    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    $uploadOk = 0;

}

// Check if $uploadOk is set to 0 by an error

if ($uploadOk == 0) {

    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file

} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $cv_location)) {

		

		



            $sql = "UPDATE students SET first_name = '$first_name', last_name = '$last_name', email = '$email', course = '$degree', grade = '$grade', university = '$university', city = '$city', career = '$career',  cv = '$cv_location', skills = '$skill' WHERE id = '$applicant_id'";







if(mysqli_query($link, $sql)){

    echo "You have succesfully applied for the Job";

    header("location: sdashboard.php");

} 

        else{

    echo "ERROR: We were not able to edit your profile. <br> Error ID : $sql. " . mysqli_error($link) . "Michael" . $first_name; 

}

         } else {

        echo "Sorry, there was an error uploading your file.";

    }

}



?>



