 <?php include 'header.php';?>		

 
 <div class="col-sm-12 main-body">
 
	<img src="images/banner-self-eval.png" class="img-responsive" alt="Self Evaluation" style="margin-bottom: 1.5em;">

 <form name="SelfEvaluation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

<div class="eval-element"> 
	<div class="row">
		
		<div class="col-sm-3">
			<h1>Select a Course:</h1>
		</div><!--end col sm 3-->
		
		<div class="col-sm-9">
			<?php
				session_start();
				$user_session = $_SESSION['user'];
				
				$conn = mysqli_connect('localhost', 'root', 'root');
				mysqli_select_db($conn, 'wbl_v10');
				//drop down list from database
				
			if(!$conn)
			 {
				die("Connection failed: " . mysqli_connect_error);
				echo "connection failed";
			}
			else { 
				$sql = "select * FROM Course";
				//echo "connection successful";
				$result = mysqli_query($conn, $sql);
					
					// output data of each row
					while($row = mysqli_fetch_array($result)) {
						$course.='<option value="'. $row['courseID'].'">'.$row['courseName']. '</option>';
						$courseID = $row['courseID'];
					}
				mysqli_close($conn);
			}
			?>
			
			<!--SELECT COURSE DROPDOWN BUTTON-->
			<select class="form-control" name="selectCourse" id="course" ><option></option><?php echo $course;?></select>
			<!--END SELECT COURSE DROPDOWN BUTTON-->
			
			<?php
				$conn = mysqli_connect('localhost', 'root', 'root');
				mysqli_select_db($conn, 'wbl_v10');
				
				//calling stored procedure
				if ($result = mysqli_query($conn, "call wbl_v10.GetWeek('".$user_session."',".$courseID.")"))
				{
					while ($row = mysqli_fetch_array($result)){
						$_Session['week']= $row['weeknumber'];
					}
					mysqli_free_result($result);
				}
			
			?>
		</div><!--end col sm 9-->
	</div><!--end row-->
</div><!--end eval element-->
	
<div class="eval-element">
	<div class="row">
		<div class="col-sm-3">
			<h1>Select an Instructor:</h1>
		</div><!--end col sm 3-->
		
		<div class="col-sm-9">
			<?php
					$conn = mysqli_connect('localhost', 'root', 'root');
					mysqli_select_db($conn, 'wbl_v10');
					//drop down list from database
					
				if(!$conn)
				 {
					die("Connection failed: " . mysqli_connect_error);
					echo "connection failed";
				}
				else {
					
					$sql = "select u.email as email, concat_ws(', ', u.LastName , u.FirstName) as Name from wbl_v10.User u where u.userType ='Instructor' and u.email in(
							Select s.email from wbl_v10.Staff s where s.email in(
							Select sc.staffID from wbl_v10.Staff_Course sc where courseID = ".$courseID."))";
							//course is currently hard coded--how to fix that?
					//echo "connection successful";
					$result = mysqli_query($conn, $sql);
						
						// output data of each row
						while($row = mysqli_fetch_array($result)) {
							$instructor.='<option value="'. $row['email'].'">'.$row['Name']. '</option>';
							//$instructorID=$row['email'];
						}
					mysqli_close($conn);
				}
			?> 
	
			<!--SELECT INSTRUCTOR DROPDOWN BUTTON-->
			<select class="form-control" name="selectInstructor" id="instructor"><option></option><?php echo $instructor;?></select>
			<!--END SELECT INSTRUCTOR DROPDOWN BUTTON-->
		</div><!--end col sm 3-->
	</div><!--end row-->
</div><!--end eval element-->
	
<div class="eval-element">
	<table class="table table-striped">
		<thead>
			<th></th>
			<th>1 (poor)</th>
			<th>2 (below average)</th>
			<th>3 (average)</th>
			<th>4 (above average)</th>
			<th>5 (excellent)</th>
		</thead>
		<tr>
			<td>Recognition</td>
			<td><input type="radio" name="recognition" value="1"/></td>
			<td><input type="radio" name="recognition" value="2"/></td>
			<td><input type="radio" name="recognition" value="3"/></td>
			<td><input type="radio" name="recognition" value="4"/></td>
			<td><input type="radio" name="recognition" value="5"/></td>
		</tr>
		<tr>
			<td>Technology</td>
			<td><input type="radio" name="technology" value="1"/></td>
			<td><input type="radio" name="technology" value="2"/></td>
			<td><input type="radio" name="technology" value="3"/></td>
			<td><input type="radio" name="technology" value="4"/></td>
			<td><input type="radio" name="technology" value="5"/></td>
		</tr>
		<tr>
			<td>Mixing</td>
			<td><input type="radio" name="mixing" value="1"/></td>
			<td><input type="radio" name="mixing" value="2"/></td>
			<td><input type="radio" name="mixing" value="3"/></td>
			<td><input type="radio" name="mixing" value="4"/></td>
			<td><input type="radio" name="mixing" value="5"/></td>
		</tr>
		<tr>
			<td>Scratching</td>
			<td><input type="radio" name="scratching" value="1"/></td>
			<td><input type="radio" name="scratching" value="2"/></td>
			<td><input type="radio" name="scratching" value="3"/></td>
			<td><input type="radio" name="scratching" value="4"/></td>
			<td><input type="radio" name="scratching" value="5"/></td>
		</tr>
		<tr>
			<td>Being Professional</td>
			<td><input type="radio" name="professional" value="1"/></td>
			<td><input type="radio" name="professional" value="2"/></td>
			<td><input type="radio" name="professional" value="3"/></td>
			<td><input type="radio" name="professional" value="4"/></td>
			<td><input type="radio" name="professional" value="5"/></td>
		</tr>
		<tr>
			<td>Presentation</td>
			<td><input type="radio" name="presentation" value="1"/></td>
			<td><input type="radio" name="presentation" value="2"/></td>
			<td><input type="radio" name="presentation" value="3"/></td>
			<td><input type="radio" name="presentation" value="4"/></td>
			<td><input type="radio" name="presentation" value="5"/></td>
		</tr>
	</table><!--end striped evaluation-->
</div><!--end eval element-->
	
<input type="submit" class="btn btn-lg btn-sidebar" name="Save" value="Save"/>
 
	 <?php
	 if(isset($_POST["Save"])){
		$recognition = $_POST['recognition'];
		$technology = $_POST['technology'];
		$mixing = $_POST['mixing'];
		$scratching = $_POST['scratching'];
		$professional = $_POST['professional'];
		$presentation = $_POST['presentation'];
		//hard coded evaluation type
		$evalType = 'self';
		$conn = mysqli_connect('localhost', 'root', 'root');
			mysqli_select_db($conn, 'wbl_v10');
		
			if(!$conn)
			 { 
				die("Connection failed: " . mysqli_connect_error);
				echo "connection failed";
			}
			else { 
				echo "connection successful"; 
				$sql= "Insert into wbl_v10.evaluation (evalType, week, studentID, staffID, courseID) values ('".$evalType."',".$_Session['week'].",'".$user_session."',
							'".$instructorID."',".$courseID.")";
				echo $sql;
				mysqli_query($conn, $sql);

				
				$sql2 = "Update wbl_v10.self_eval set question1=".$recognition.",question2=".$technology.",
							question3=".$mixing.",question4=".$scratching.",question5=".$professional.",question6=".$presentation." 
							where evalType='".$evalType."' and week=".$_Session['week']." and studentID='".$user_session."' and 
							staffID='".$instructorID."' and courseID=".$courseID.""; 

				echo $sql2;
				//query to insert into the database 
				mysqli_query($conn, $sql2);
				echo "saved successfully.";

				
				$sql3 = "Update wbl_v10.student set bucks=bucks + 5 WHERE email = '".$user_session."'";

				echo $sql3;
				//query to insert into the database 
				mysqli_query($conn, $sql3);
				echo "saved successfully.";

				mysqli_close($conn);	
			}
		}
		
		
	?>
			
</form><!--END SELF EVALUATION FORM-->

<form action="StudentDash.php">
	<button type="submit" id="bbself" class="btn btn-lg btn-sidebar" value="submit" name="bbself"/>Back</button>
</form>
  
 <?php include 'footer.php';?>
