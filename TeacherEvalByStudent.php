<?php include 'header.php';?>		
			
	<div class="col-sm-12 main-body">
	
	<img src="images/banner-self-eval.png" class="img-responsive" alt="Self Evaluation" style="margin-bottom: 1.5em;">

<div class="row eval-element">
	
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
					$sql = "SELECT u.email, concat_ws(', ',u.LastName,u.FirstName) as Name from wbl_v10.User u where u.userType ='Instructor' and u.email in(
							Select s.email from wbl_v10.Staff s where s.email in(
							Select sc.staffID from wbl_v10.Staff_Course sc where courseID =".$courseID."))";;
					//echo "connection successful";
					$result = mysqli_query($conn, $sql);
						
						// output data of each row
						while($row = mysqli_fetch_array($result)) {
							$instructor.='<option value="'. $row['Name'].'">'.$row['Name']. '</option>';
							$instructorID = $row['email'];
						}
					mysqli_close($conn);
				}
				?> 
				
				<select name="selectInstructor" class="form-control" id="instructor" required><option></option><?php echo $instructor;?></select>

	</div><!--end col sm 9-->
</div><!--end row-->
		
<div class="row eval-element">

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
		<select name="selectCourse" class="form-control" id="course" required><option></option><?php echo $course;?></select>
		
	</div><!--end col sm 9-->
	
</div><!--end row-->
		
<div class="row eval-element">	
	<form name="TeacherEvaluationByStudent" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table class="table table-striped">

	<thead>
		<th></th>
		<th style="text-align: center; vertical-align: middle;"><b>Unsatisfactory</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>Needs Improvement</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>Meets Expectations</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>Consistently Meets Expectations</b></th>
		<th style="text-align: center; vertical-align: middle;"><b>Exceeds Expectations</b></th>
	</thead>
	</tr><td>Teacher regularly shows up to class</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="attendance" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="attendance" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="attendance" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="attendance" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="attendance" value="5"/></td>
	</tr>
	</tr><td>Teacher is consistently on time</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="timely" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="timely" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="timely" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="timely" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="timely" value="5"/></td>
	</tr>
	</tr><td>Teacher managed students well and maintained the learning environment</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="managed" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="managed" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="managed" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="managed" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="managed" value="5"/></td>
	</tr>
	</tr><td>Teacher was organized</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="organized" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="organized" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="organized" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="organized" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="organized" value="5"/></td>
	</tr>
	</tr><td>Teacher offered clear feedback on how I could improve</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="feedback" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="feedback" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="feedback" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="feedback" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="feedback" value="5"/></td>
	</tr>
	</tr><td>Teacher fostered a safe and welcoming environment</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="environment" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="environment" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="environment" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="environment" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="environment" value="5"/></td>
	</tr>
	</tr><td>Teacher challenged me to learn and develop skills</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="challenged" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="challenged" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="challenged" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="challenged" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="challenged" value="5"/></td>
	</tr>
	</tr><td>Activities were planned</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="activities" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="activities" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="activities" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="activities" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="activities" value="5"/></td>
	</tr>
	</tr><td>Teacher did their job well</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="wellDone" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="wellDone" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="wellDone" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="wellDone" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="wellDone" value="5"/></td>
	</tr>
	</tr><td>Teacher was supportive of my development as a young artist</td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="supportive" value="1"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="supportive" value="2"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="supportive" value="3"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="supportive" value="4"/></td>
		<td style="text-align: center; vertical-align: middle;"><input type="radio" name="supportive" value="5"/></td>
	</tr>
	</table>
	
<div class="row eval-element">
	<div class="col-sm-12">

		<h1>Short Anwer Questions</h1>
		
		<p>1. What are the teacher's strengths?</p>
		<input type="text"  class="form-control" name="txtstrengths" style="margin-bottom: 1em;"/>
		
		<p>2. What are the teacher's areas for growth and development?</p>
		<input type="text" class="form-control" name="txtdevelopment" style="margin-bottom: 1em;"/>
		
		<input type="submit" class="btn btn-lg btn-sidebar" name="Save" value="Save"/>
 
 <?php
	if(isset($_POST["Save"])){
		$attendance = $_POST['attendance'];
		$timely =$_POST['timely'];
		$managed = $_POST['managed'];
		$organized = $_POST['organized'];
		$feedback = $_POST['feedback'];
		$environment =$_POST['environment'];
		$challenged = $_POST['challenged'];
		$activities = $_POST['activities'];
		$wellDone = $_POST['wellDone'];
		$supportive = $_POST['supportive'];
		$txtstrengths = $_POST['txtstrengths'];
		$txtdevelopment = $_POST['txtdevelopment'];
		$evalType = 'i_by_s';
		 
		
	
		$conn = mysqli_connect('localhost', 'root', 'root');
			mysqli_select_db($conn, 'wbl_v10');
		
		if(!$conn)
		 {
			die("Connection failed: " . mysqli_connect_error);
			echo "connection failed";
		}
		else { 
			//echo "Connection Successful"; 
			$sql= "Insert into wbl_v10.evaluation (evalType, week, studentID, staffID, courseID) values ('".$evalType."',".$_Session['week'].",'".$user_session."',
						'".$instructorID."',".$courseID.")";
			mysqli_query($conn, $sql);
			
			$sql2 ="Update wbl_v10.instructor_eval_by_student set question1=".$attendance.",question2=".$timely.",question3=".$managed.",question4=".$organized.",question5=".$feedback.",question6=".$environment.",
			question7=".$challenged.",question8=".$activities.",question9=".$wellDone.",question10=".$supportive.",question11='".$txtstrengths."',question12='".$txtdevelopment."'
			where evalType='".$evalType."' and week=".$_Session['week']." and studentID='".$user_session."'and staffID='".$instructorID."' and courseID=".$courseID."";
			
			mysqli_query($conn, $sql2);		
			
			$sql3 = "Update wbl_v10.student set bucks=bucks + 5 WHERE email = '".$user_session."'";

			//query to insert into the database 
			mysqli_query($conn, $sql3);
			mysqli_close($conn);	

			
		}
	}
	?>
	</form>	
	
	<form action="StudentDash.php">
		<button type="submit" id="bbTS" class="btn btn-lg btn-sidebar" value="submit" name="bbTS"/>Back</button>
	</form>
	
</div><!--end col sm 12-->
</div><!--end row-->
</div><!--end row-->

	 <?php include 'footer.php';?>