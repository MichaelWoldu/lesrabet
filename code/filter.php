<?php
echo '<div class="col-md-3" style="background-color:yellow;">
                <div style="margin-left:1%;">
                    <h3> Search Results: </h3>
                <p><strong>Job Type avaible with this search: </strong></p>
                   <?php
             $sql = "SELECT DISTINCT job_type FROM jobs WHERE city LIKE '%$city%' AND job_type LIKE '%$job%' AND title LIKE '%$name%'";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 echo "<ul>";
                 while($row = $result->fetch_assoc()) {
                echo " <p> " . "<i>" . $row["job_type"]. "</i>" . "</p>";
                 }
                 echo "</ul>";
             }
             else {
        echo "0 results";
             }
             ?>
                    <p><strong>Number of Jobs: <?php $sql = "SELECT DISTINCT job_type FROM jobs WHERE city LIKE '%$city%' AND job_type LIKE '%$job%' AND title LIKE '%$name%'"; ?></strong></p>
 
                <hr>
                    <h3> Filter Search</h3>
                    <form action="result.php" method="post">
                        Job:  
                        <input name="jobName" id="jobName" type="text" value="<?php echo $rname?>"><br>
                        City: 
                        <select name="city" id="city" class="btn btn-default">
					<option value="<?php echo $city ?>"><?php echo $city ?></option>
					<option value="Adama">Adama</option>
					<option value="Addis Ababa">Addis Ababa</option>
					<option value="Arba Minch">Arba Minch</option>
					<option value="Awasa">Awasa</option>
					<option value="Debrezet">Debrezet</option>
					<option value="Gonder">Gonder</option>
					<option value="Mekele">Mekele</option>
				</select>
                      <br>
                        <br>
                Job types avalable:<br>
                        <ul>
                            <?php
             $sql = "SELECT DISTINCT job_type FROM jobs WHERE city LIKE "%$city%" AND job_type LIKE "%$job%" AND title LIKE "%$name%"";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 while($row = $result->fetch_assoc()) {
                echo "<input type="radio" name="jobType" name value='" . $row["job_type"] . "'>" . $row["job_type"]. "</br>";
                 }
                 echo "</br>";
             }
             else {
        echo "0 results";
             }     ?>

                        <br>
                        Company: 
                        <?php
             $sql = "SELECT DISTINCT company FROM jobs WHERE city LIKE "%$city%" AND job_type LIKE "%$job%" AND title LIKE "%$name%";
             
             $result = $conn->query($sql);
             if ($result->num_rows > 0) {
            // output data of each row
                 echo "<select name= "companys" id= "companys" class="btn btn-default">";
                 while($row = $result->fetch_assoc()) {
                echo "<option value=' .$row["company"] . "'> . $row["company"]. </option>';
                 }'
                 echo "</select>";
             }
             else {
        echo "0 results";
             }     ?>
                        <br>
                        <button type="submit" class="btn btn-success">Filter</button>
                        </ul>
                        </form>
                    
            </div>    
                <br>
			</div>'
    ?>