<?php
echo '
<form method="post" action="student/apply.php?&id='. $application_detail .'&companyid=' . $company_detail. '">
                <div class="row">
                    <div class="col-md-6 vl">
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
        <label for="forappdeadline">CV: </label><br>
        <input class="btn btn-default" type="file" name="cv" id="cv">
                        </p>
                         <p>
        <label for="forappdeadline">Cover Letter: </label><br>
        <input class="btn btn-default" type="file" name="coverLetter" id="coverLetter">
                        </p>

                    </div>
                    <div class="col-md-4">
                <p>
        <label for="jobDescription"> Select Grade:</label><br>
        <select class="btn btn-default" name="grade" id="grade">
          <option value="' . $grade . '">' . $grade .'</option>
          <option value="1">First</option>
          <option value="2.1">Upper Second</option>
          <option value="2.2">Lower Second</option>
          <option value="3">Third</option>
       </select>
    </p>
                <p>
        <label for="jobDescription">University Attened:</label><br>
        <input class="btn btn-default" type="text" rows="7" cols="35" name="university" id="university" value="'. $university . '">
    </p>
                <p>
        <label for="jobDescription">City:</label><br>
        <select name="city" id="city" class="btn btn-default">
                   <option value="' . $city . '">' . $city .'</option>
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
        <label for="forappdeadline">Top 5 Role Specific Skills :</label><br>
        <input class="btn btn-default" type="text" name="skill" id="skill" value="' . $skills . '">
		<br>
    <small id="skillinfo" class="text-muted">Seprate Each skill with a comma.</small>
    </p>
                    </div>
                </div>
        <hr>
                <div align=right>
                   <input class="btn btn-success" type="submit" value="Apply">
                    <input class="btn btn-danger" type="button" value="Cancel">
              </div>
            </form>';
?>