 <?php include 'header.php';?>		
			
<div class="col-sm-12 main-body">
  
<img src="images/banner-self-eval.png" class="img-responsive" alt="Self Evaluation" style="margin-bottom: 1.5em;">
  
 <form name="SelfEvaluation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

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
				$sql = "SELECT * FROM Course";
				echo "connection successful";
				$result = mysqli_query($conn, $sql);
					
					// output data of each row
					while($row = mysqli_fetch_array($result)) {
						$course.='<option value="'. $row['courseID'].'">'.$row['courseName']. '</option>';
						$courseID = $row['courseID'];
					}
				mysqli_close($conn);
			}
			?>
			<select name="selectCourse" class="form-control" id="course" ><option></option><?php echo $course;?></select>
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
					
					$sql = "SELECT u.email, concat_ws(', ', u.LastName , u.FirstName) as Name from wbl_v10.User u where u.userType ='Instructor' and u.email in(
							Select s.email from wbl_v10.Staff s where s.email in(
							Select sc.staffID from wbl_v10.Staff_Course sc where courseID = ".$courseID."))";
							//course is currently hard coded--how to fix that?
					echo "connection successful";
					$result = mysqli_query($conn, $sql);
						
						// output data of each row
						while($row = mysqli_fetch_array($result)) {
							$instructor.='<option value="'. $row['Name'].'">'.$row['Name']. '</option>';
							$instructorID=$row['email'];
						}
					mysqli_close($conn);
				}
			?> 
			<select name="selectInstructor" id="instructor" class="form-control"><option></option><?php echo $instructor;?></select>
	</div><!--end col sm 9-->
</div><!--end row-->

<table class="table table-striped">
	
	<div class="text-instruction">
	<p>Rate your performance during the past week on a scale of 1-5 in the following categories.</p>
	</div>
	
	<thead>
		<th></th>
		<th style="text-align: center; vertical-align: middle;"><b>1</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>2</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>3</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>4</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>5</b></th>
	</thead>
	
	<tr>
		<td>Recognition</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="recognition" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="recognition" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="recognition" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="recognition" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="recognition" value="5"/></td>
	</tr>

	<tr>
		<td>Technology</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="technology" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="technology" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="technology" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="technology" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="technology" value="5"/></td>
	</tr>

	<tr>
		<td>Mixing</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="mixing" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="mixing" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="mixing" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="mixing" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="mixing" value="5"/></td>
	</tr>

	<tr>
		<td>Scratching</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="scratching" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="scratching" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="scratching" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="scratching" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="scratching" value="5"/></td>
	</tr>

	<tr>
		<td>Professionalism</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="professional" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="professional" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="professional" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="professional" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="professional" value="5"/></td>
	</tr>

	<tr>
		<td>Presentation</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="presentation" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="presentation" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="presentation" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="presentation" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="presentation" value="5"/></td>
	</tr>
</table>

<input type="submit" class="btn btn-lg btn-admin" name="Save" value="Save"/>
 
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
				//echo "connection successful"; 
				$sql= "Insert into wbl_v10.evaluation (evalType, week, studentID, staffID, courseID) values ('".$evalType."',".$_Session['week'].",'".$user_session."',
							'".$instructorID."',".$courseID.")";
				mysqli_query($conn, $sql);

				
				$sql2 = "Update wbl_v10.self_eval set question1=".$recognition.",question2=".$technology.",
							question3=".$mixing.",question4=".$scratching.",question5=".$professional.",question6=".$presentation." 
							where evalType='".$evalType."' and week=".$_Session['week']." and studentID='".$user_session."' and 
							staffID='".$instructorID."' and courseID=".$courseID.""; 

				echo $sql2;
				//query to insert into the database 
				mysqli_query($conn, $sql2);
				echo "Saved Successfully.";

				
				$sql3 = "Update wbl_v10.student set bucks=bucks + 5 WHERE email = '".$user_session."'";

				//query to insert into the database 
				mysqli_query($conn, $sql3);

				mysqli_close($conn);	
			}
		}
		
		
	?>
					
</form>

<form action="StudentDash.php">
	<button type="submit" id="bbself" class="btn btn-lg btn-admin" value="submit" name="bbself"/>Back</button>
</form>
  
 <?php include 'footer.php';?>
