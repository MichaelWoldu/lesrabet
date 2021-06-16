<?php
echo '
<form method="post" action="apply.php">
                <div class="row">
                    <div class="col-md-4">
                        <p>
        <label for="fullName">Full Name:</label><br>
        <input class="btn btn-default" type="text" name="fullName" id="fullName" value="' .  $first_name . ' '. $last_name .'">
    </p>
    <p>
        <label for="jobDescription">Email Address:</label><br>
        <input class="btn btn-default" type="email" rows="10" cols="40" name="email" id="email" value="' . $email . '">
    </p>    
                <p>
        <label for="jobDescription">Degree:</label><br>
                    <select class="btn btn-default" name="degree" id="degree" required>
                    <option value="' . $course . '">' . $course . '</option>
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
          <option value="' . $grade . '">' . $grade .'</option>
          <option value="First">First</option>
          <option value="Upper Second">Upper Second</option>
          <option value="Lower Second">Lower Second</option>
          <option value="Third">Third</option>
       </select>
    </p>
                <p>
        <label for="jobDescription">University Attened:</label><br>
        <input class="btn btn-default" type="text" rows="10" cols="40" name="university" id="university" value="'. $university . '">
    </p>
                <p>
        <label for="jobDescription">City:</label><br>
        <input class="btn btn-default" type="text" name="city" id="city">
    </p>

                    </div>
                    <div class="col-md-4">
                          <p>
        <label for="forappdeadline">Top 5 Role Specific Skills :</label><br>
        <input class="btn btn-default" type="text" name="skill" id="skill" value="' . $skills . '">
    <small id="skillinfo" class="text-muted">Seprate Each skill with a comma.</small>
    </p>
                          <p>
        <label for="forappdeadline">CV: </label><br>
        <input class="btn btn-default" type="file" name="cv" id="cv">
                        </p>
                        <p>
        <label for="forappdeadline">Cover Letter: </label><br>
        <textarea class="input-group-text" type="text" name="coverLetter" id="coverLetter" rows="10" cols="80%" maxlength="4000"></textarea>
        <small id="coveletterinfo" class="text-muted">Please copy and paste your cover letter here. Your cover letter should not be more than 4000 characters.</small>
                            
                        </p>
                    <strong>Application ID: </strong><input type="text" name="application" id="application" value=' . $_GET['id'] . '><br>
                    <strong>Company ID: </strong><input name="company" id="company" type="text" value=' . $_GET['companyid'] . '><br>
                    <strong>appliacnt ID: </strong><input name="applicant" id="applicant" type="text" value=' . $applicant_id . '>
                </div>
                </div>
        <hr>
                <div align=right>
                   <input class="btn btn-success" type="submit" value="Apply">
                    <input class="btn btn-danger" type="button" value="Cancel">
              </div>
            </form>';
?>