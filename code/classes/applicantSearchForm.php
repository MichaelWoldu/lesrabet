<?php
echo '<div class="topbar">
			<div class="container" align=right>
				<br><br>
				<div class="col-xs-8" style="color: white">
  						<h2>Hello' . $company_name . '</h2>
  						<p class="lead">Would you like to search for applicants?</p>
  					</div>
	<form action="cresults.php" method="post">
			<input name="skill" id="skill" type="text" class="btn btn-default" placeholder="Skills you are looking for">
				<select name="reqGrade" id="reqGrade" class="btn btn-default">
					<option value="1">First class</option>
					<option value="2.1">Upper Second Class</option>
					<option value="2.2">Lower Second class</option>
					<option value="3">Third Class</option>
				</select>
			<input type="submit" class="btn btn-default"  value="Search">
		</form>
		</div>
        </div>';
?>