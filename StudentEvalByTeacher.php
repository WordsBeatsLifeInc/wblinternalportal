<?php include 'header.php';?>		
			
<div class="col-sm-12 main-body">
	<div class="row">
		<img src="images/banner-self-eval.png" class="img-responsive" alt="Self Evaluation" style="margin-bottom: 1.5em;">
	</div><!--end row-->
	

	<div class="row" style="margin-bottom: 1em;">
		<div class="col-sm-3">
		<h1>Select a Course:</h1>
		</div><!--end col sm 3-->		
		<div class="col-sm-9">		
			<?php
				$_Session['staffID'] = 'Cole@instructor.com';
				$_Session['week']=1;
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

			<select name="selectCourse" id="course" class="form-control" required><option></option><?php echo $course;?></select>
		</div><!--end col sm 9-->
	</div><!--end row-->

	<div class="row" style="margin-bottom: 1em;">
		<div class="col-sm-3">
			<h1>Select a Student:</h1>
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
				$sql = "SELECT u.email, concat_ws(', ',u.LastName, u.FirstName) as Name from wbl_v10.User u where u.userType ='Student' and u.email in(
						Select s.email from wbl_v10.Student s where s.email in(
						Select se.studentID from wbl_v10.Student_Element se Where se.elementID in (
						Select e.elementID from wbl_v10.Element e where e.elementID in (
						select c.courseID from wbl_v10.Course c where courseID=".$courseID."))))";
				//echo "connection successful";
				$result = mysqli_query($conn, $sql);
					
					// output data of each row
					while($row = mysqli_fetch_array($result)) {
						$student.='<option value="'. $row['Name'].'">'.$row['Name']. '</option>';
						$studentID=$row['email'];
					}
				mysqli_close($conn);
			}
			?> 
			
			<select name="selectStudent" class="form-control" id="student" required><option></option><?php echo $student;?></select>	
		</div><!--end col sm 9-->
	</div><!--end row-->
	
 
 <form name="StudentEvalByTeacher" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

 <table class="table table-striped table-bordered">
 
 	<div class="text-instruction">
		<p>Rate the student's performance during the past week on a scale of 1-5 in the following categories.</p>
	</div>
	
	<tr>
		<td></td>
		<td style="text-align: center; vertical-align: middle;"><b>1</b></td>
		<td style="text-align: center; vertical-align: middle;"><b>2</b></td>
		<td style="text-align: center; vertical-align: middle;"><b>3</b></td>
		<td style="text-align: center; vertical-align: middle;"><b>4</b></td>
		<td style="text-align: center; vertical-align: middle;"><b>5</b></td>
	</tr>

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

<input type="submit" name="Save" value="Save" class="btn btn-lg btn-admin"/>
 
 <?php
 if(isset($_POST["Save"])){
	$recognition = $_POST['recognition'];
	$technology = $_POST['technology'];
	$mixing = $_POST['mixing'];
	$scratching = $_POST['scratching'];
	$professional = $_POST['professional'];
	$presentation = $_POST['presentation'];
	//hard coded evaluation type
	$evalType = 's_by_i';
	$conn = mysqli_connect('localhost', 'root', 'root');
		mysqli_select_db($conn, 'wbl_v10');
	
	if(!$conn)
	 {
		die("Connection failed: " . mysqli_connect_error);
		echo "connection failed";
	}
	else { 
		//echo "connection successful"; 
		$sql= "Insert into wbl_v10.evaluation (evalType, week, studentID, staffID, courseID) values ('".$evalType."',".$_Session['week'].",'".$studentID."',
					'".$_Session['staffID']."',".$courseID.")";
		mysqli_query($conn, $sql);

		
		$sql2 = "Update wbl_v10.student_eval_by_instructor set question1=".$recognition.",question2=".$technology.",
					question3=".$mixing.",question4=".$scratching.",question5=".$professional.",question6=".$presentation." where evalType='".$evalType."' and week=".$_Session['week']."
					and studentID='".$studentID."' and staffID='".$_Session['staffID']."' and courseID=".$courseID.""; 

		//query to insert into the database 
		mysqli_query($conn, $sql2);
		echo "Saved Successfully.";

			mysqli_close($conn);	
			}
	}
 ?>
 
 
</div><!--end main-body col-sm-9-->			 
 <?php include 'footer.php';?>
