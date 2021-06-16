<?php
echo '<div class="topbar">
			<div class="container" align=right>
				<br><br>
				<div class="col-8 xs" style="color: white">
  						<h2>Welcome to Get Hired</h2>
  						<p class="lead">Search, Find, Apply.</p>
              <p class="home-text">We are a young company that strives to help students find the prefect work enviroment for themselevs.</p>
					<br>
  					</div>
			<form action="result.php" method="post">
			<input name="jobName" id="jobName" class="btn btn-default" Placeholder="Role" placeholder="Role">
				<select name="city" id="city" class="btn">
                    <option value="">All Cities</option>
					<option value="Adama">Adama</option>
					<option value="Addis Ababa">Addis Ababa</option>
					<option value="Arba Minch">Arba Minch</option>
					<option value="Awasa">Awasa</option>
					<option value="Debrezet">Debrezet</option>
					<option value="Gonder">Gonder</option>
					<option value="Mekele">Mekele</option>
				</select>
			<input type="submit" class="btn btn-default"  value="Search">
		</form>
		</div>
	</div>';
?>