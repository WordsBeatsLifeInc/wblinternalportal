
<?php include 'header.php';?>	

	<div class="col-sm-12 main-body">
	<form name="AdminDash" method=post action="CreateCourse.php">
	
	
	 	<label for="startDateLabel">Course Name:</label>
		<input class="form-control" type="text" name="courseName"></br>
		
		<label for="courseIDLabel">Course ID:</label>
		<input class="form-control" type="number" name="courseID"></br>
		
		<label for="startDateLabel">Start Date:</label>
		<input class="form-control" type="text" name="startDate"></br>
	   
		<label for="endDateLabel">End Date:</label>
		<input class="form-control" type="text" name="endDate"></br>

		<label for="courseTimeLabel">Course Time:</label>
		<input class="form-control" type="text" name="courseTime"></br>

		<label for="courseDescriptionLabel">Course Description:</label>
		<input class="form-control" type="text" name="courseDescription"></br>
		
		<label for="ElementIDLabel">Element ID:</label>
		<select name="elementID" class="form-control">
		<option> Please Select An Element</option>
			<?php
				mysql_connect('localhost', 'root', 'root');
				mysql_select_db('wbl_v10');

				$sql = "SELECT elementID FROM Element;";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) 
				{
					echo "<option value='" . $row['elementID'] . "'>" . $row['elementID'] . "</option>";
				}
				echo "</select>";
			?>
		</select></br>
		<label for="CourseLocationLabel">Course Location:</label>
		<input class="form-control" type="text" name="courseLocation"></br>
		
		<select name="Instructor" class="form-control">
		<option> Please Select An Instructor:</option>
			<?php
				mysql_connect('localhost', 'root', 'root');
				mysql_select_db('wbl_v10');

				$sql = "SELECT email FROM Staff";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) 
				{
					echo "<option value='" . $row['email'] . "'>" . $row['email'] . "</option>";
				}
				echo "</select>";
			?>
		</select></br>
		
		<form name="createCourseButtonForm" method=post action="CreateCourse.php">
		<button type="submit" id="createCourseButton" class="btn btn-lg btn-admin" value="submit" name="createCourseButton"/>Create Course</button>
		</form>
		
		<form name="backButtonCreateCourse" method=post action="AdminDash.php">
		<button type="submit" id="userApprovalQueue" class="btn btn-lg btn-admin" value="submit" name="userApprovalQueue"/>Back</button>
		</form>
					
	</div>
	
	<!--Display Div-->
	<div id="display">
	<?php
		//insert courses
		if ( isset( $_POST['createCourseButton'] ) ) 
		{
		
		$conn = mysqli_connect('localhost','root','root');
		mysqli_select_db($conn, 'wbl_v10');
		if(!$conn)
		{
			die("Connection failed: " . mysqli_connect_error);
			echo "connection failed";
		}
		else { 
		echo "connection successful"; 
		}
			
		$sql = "INSERT INTO COURSE 
		(courseID,
		courseName, 
		startDate, 
		endDate, 
		courseTime, 
		courseDescription, 
		elementID, 
		courseLocation) 
		VALUES (
		$_POST[courseID],
		'$_POST[courseName]',
		$_POST[startDate],
		$_POST[endDate],
		'$_POST[courseTime]',
		'$_POST[courseDescription]',
		$_POST[elementID],
		'$_POST[courseLocation]')";

		//Display Success or Error Message
		
		mysqli_query($conn, $sql);
		echo $sql;
		
		$sql1= "INSERT INTO staff_course
		(staffID,
		courseID)
		Values (
		'$_POST[Instructor]',
		$_POST[courseID])";
		
		
		
		mysqli_query($conn, $sql1);
		echo $sql1;
		
		
		// close connection 
		mysql_close($conn);
		}
		?>
		 </form>
        	
	</div><!--end main-body col-sm-12-->

							 
 <?php include 'footer.php';?>
 