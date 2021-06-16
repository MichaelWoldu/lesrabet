<?php

/* Registration process, inserts user info into the database 

   and sends account confirmation email message

 */


// Set session variables to be used on profile.php page

    $_SESSION['email'] = $_POST['email'];

    $_SESSION['company_name'] = $_POST['companyName'];

    $_SESSION['contact_name'] = $_POST['contactName'];

    $_SESSION['contact_no'] = $_POST['contact_no'];

    $_SESSION['company_description'] = $_POST['company_description'];

    $_SESSION['logo'] = $_POST['logo'];



    // Escape all $_POST variables to protect against SQL injections

    $company_name = $mysqli->escape_string($_POST['companyName']);

    $contact_name = $mysqli->escape_string($_POST['contactName']);

    $email = $mysqli->escape_string($_POST['email']);

    $contact_no = $mysqli->escape_string($_POST['number']);

    $logo = $mysqli->escape_string($_POST['logo']);

    $company_decription = $mysqli->escape_string($_POST['company_decription']);

    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));

    //$avatar_path = $mysqli->real_escape_string('image/'.$_FILES['logo']['name']);

    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );

    $today = date("Y-m-d");

      

    // Check if user with that email already exists

    $result = $mysqli->query("SELECT * FROM companys WHERE email='$email'") or die($mysqli->error());



    // We know user email exists if the rows returned are more than 0

    if ( $result->num_rows > 0 ) {

        $_SESSION['message'] = 'User with this email already exists!';

        header("location: company/error.php");      

    }

    else { // Email doesn't already exist in a database, proceed...

        $target_dir = "uploads/";

        $target_file = $target_dir . basename($_FILES["logo"]["name"]);

        $cv_location =  $target_dir . $applicant_id . basename($_FILES["logo"]["name"]);

        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image

        if(isset($_POST["submit"])) {

            $check = getimagesize($_FILES["logo"]["tmp_name"]);

            if($check !== false) {

                echo "File is an image - " . $check["mime"] . ".";

                $uploadOk = 1;

            }
            else {
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

        if ($_FILES["logo"]["size"] > 500000) {

            echo "Sorry, your file is too large.";

            $uploadOk = 0;

        }

        // Allow certain file formats

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {

            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;

        }

        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 0) {

            echo "Sorry, your file was not uploaded.";
        
        } 
        // if everything is ok, try to upload file
    else {

        if (move_uploaded_file($_FILES["logo"]["tmp_name"], $cv_location)) {

            $sql = "INSERT INTO companys (company_name, contact_name, email,contact_no, logo, company_description password, hash, date_registered) " 

                . "VALUES ('$company_name','$contact_name','$email', '$contact_no', '$logo', '$company_decription', '$password', '$hash', '$today')";

            // Add user to the database

            if ( $mysqli->query($sql) ){

                $_SESSION['active'] = 0; //0 until user activates their account with verify.php

                $_SESSION['logged_in'] = true; // So we know the user has logged in
                
                $_SESSION['active'] = 1; //0 until user activates their account with verify.php

                $_SESSION['logged_in'] = true; // So we know the user has logged in

                $_SESSION['message'] = "Thank you for Signin up!";

                header("location: /dissertation/cdashboard.php"); 
            }
        
            else {

                $_SESSION['message'] = 'Registration failed!';

                header("location: company/error.php");
            }

        }

    }
}

?>