<?php include 'header.php';?>		
			
<div class="col-sm-12 main-body">
	<img src="images/banner-self-eval.png" class="img-responsive" alt="Self Evaluation" style="margin-bottom: 1.5em;">
	 <form name="CourseEval" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<div class="row eval-element">
			<div class="col-sm-3">
				<h1>Select a Course</h1>
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
				
				<select name="selectCourse" id="course" class="form-control" required><option></option><?php echo $course;?></select>
				
				<?php
					$conn = mysqli_connect('localhost', 'root', 'root');
					mysqli_select_db($conn, 'wbl_v10');
					
					//calling stored procedure
					if ($result = mysqli_query($conn, "call wbl_v10.GetWeek('".$_Session['studentID']."',".$courseID.")"))
					{
						while ($row = mysqli_fetch_array($result)){
							$_Session['week']= $row['weeknumber'];
						}
						mysqli_free_result($result);
					}
				
				?>
			</div><!--end col sm 9-->
		</div><!--end row-->
	
		
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
					$sql = "SELECT u.email, concat_ws(', ', u.LastName, u.FirstName) as Name from wbl_v10.User u where u.userType ='Instructor' and u.email in(
							Select s.email from wbl_v10.Staff s where s.email in(
							Select sc.staffID from wbl_v10.Staff_Course sc where courseID =".$courseID."))";
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
				
				<select name="selectInstructor" id="instructor" class="form-control" required><option></option><?php echo $instructor;?></select>
			</div><!--end col sm 9-->
		</div><!--end row-->
	
	<div class="row">
		<div class="col-sm-12">

	<div class="eval-element">	
		<table class="table table-striped">
			<tr>
				<h1>How did you hear about the class?</h1>
			</tr>
				<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Facebook"/>
					Facebook
				</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Twitter"/>
					Twitter</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Friend"/>
					Friend</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Parent/Guardian"/>
					Parent/Guardian</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Teacher/Counselor"/>
					Teacher/Counselor</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Not Sure"/>
					Not Sure</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="learnOfClass" value="Other"/>
					Other</label>
			</tr>
			</br>

		</table>
	</div><!--END EVAL ELEMENT-->
	
	<div class="eval-element">	
		<table class="table table-striped">
			<tr>
				<h1>Do you feel safe/comfortable in class?</h1>
			</tr>
			<tr>
				<label>
					<input type="radio" name="safe" value="Always"/>
					Always
				</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="safe" value="Most of the time"/>
					Most of the time</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="safe" value="Sometimes"/>
					Sometimes</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="safe" value="Never"/>
					Never</label>
			</tr>
			</br>
			<tr>
				<i>If never, what needs to change?</i>
			</tr>
			<tr>
			<input type="text" class="form-control" name="txtSafe"/>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->

	<div class="eval-element">
		<table class="table table-striped">
			<tr>
				<h1>What skills have you developed?</h1>
			</tr>
			<tr>
				<input type="text" class="form-control" name="txtSkillsDeveloped"/>
			</tr>

		<table class="table table-striped">
			<tr>
				<h1>How would you describe your participation in class?</h1>
			</tr>
				<tr>
				<label>
					<input type="radio" name="participation" value="I always participate to my fullest"/>
					I always participate to my fullest
				</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="participation" value="I sometimes wait for others to participate and I'll join"/>
					I sometimes wait for others to participate and I'll join</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="participation" value="I like just being in class but don't always speak or participate"/>
					I like just being in class but don't always speak or participate</label>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->
	
	<div class="eval-element">	
		<table class="table table-striped">
			<tr>
				<h1>Did you finish a final piece of work for All City?</h1>
			</tr>
			<tr>
				<label>
					<input type="radio" name="allCity" value="Yes"/>
					Yes</label>
			</tr>
			</br>
			<tr>
				<label>
					<input type="radio" name="allCity" value="No"/>
					No</label>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->
		
	<div class="eval-element" style="overflow-x:auto;">	
		<table class="table table-striped">
				<h1>In class I get to...</h1>
			<thead>
				<th style="text-align: center; vertical-align: middle;"></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Neither Agree or Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Agree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Agree</b></th>
			</thead>
			<tr><td>1. Try new things</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="newThings" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="newThings" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="newThings" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="newThings" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="newThings" value="5"/></td>
			 </tr>
			 <tr><td>2. Learn what it takes to be an artist</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="artist" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="artist" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="artist" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="artist" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="artist" value="5"/></td>
			</tr>
			<tr><td>3. Use different art mediums</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="art" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="art" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="art" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="art" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="art" value="5"/></td>
			</tr>
			<tr><td>4. Make friends</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="Friends" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="Friends" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="Friends" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="Friends" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="Friends" value="5"/></td>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->

	<div class="eval-element" style="overflow-x:auto;">
		<table class="table table-striped">
			<h1>This class has helped me to...</h2>
			<thead>
				<th style="text-align: center; vertical-align: middle;"></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Neither Agree or Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Agree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Agree</b></th>
			</thead>
			
			<tr>
			<td>1. Be motivated to learn new things</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="motivated" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="motivated" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="motivated" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="motivated" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="motivated" value="5"/></td>
			</tr>
			<tr>
				<td>2. Feel happy with myself</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="happy" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="happy" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="happy" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="happy" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="happy" value="5"/></td>
			</tr>
			<tr>
				<td>3. Feel positive about my future</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="positive" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="positive" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="positive" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="positive" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="positive" value="5"/></td>
			</tr>
			<tr>
				<td>4. Work with other young artists like me</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="work" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="work" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="work" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="work" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="work" value="5"/></td>
			</tr>
			<tr>
				<td>5. Use art to deal with stress</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="stress" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="stress" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="stress" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="stress" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="stress" value="5"/></td>
			</tr>
			<tr>
				<td>6. Respect people who are different than me</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="respect" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="respect" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="respect" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="respect" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="respect" value="5"/></td>
			</tr>
			<tr>
				<td>7. Resist negativity or negative peer influences</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="negative" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="negative" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="negative" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="negative" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="negative" value="5"/></td>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->
	
	<div class="eval-element" style="overflow-x:auto;">
		<table class="table table-striped">
			<h1>By participating in class...</h1>
			<thead>
				<th style="text-align: center; vertical-align: middle;"></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Neither Agree or Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Agree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Agree</b></th>
			</thead>
			<tr>
				<td>1. I feel comfortable being creative around my peers</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="creative" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="creative" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="creative" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="creative" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="creative" value="5"/></td>
			</tr>
			<tr>
				<td>2. I can talk about careers I'm interested in </td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="careers" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="careers" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="careers" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="careers" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="careers" value="5"/></td>
			</tr>
			<tr>
				<td>3. I know the steps needed to reach my career goals</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="goals" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="goals" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="goals" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="goals" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="goals" value="5"/></td>
			</tr>
			<tr>
				<td>4. I better understand the importance of helping others in my community</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="community" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="community" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="community" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="community" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="community" value="5"/></td>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->
	
	<div class="eval-element" style="overflow-x:auto;">
		<table class="table table-striped">
			<h1>I am sure that I will...</h1>
			<thead>
				<th style="text-align: center; vertical-align: middle;"></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Neither Agree or Disagree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Agree</b></th>
				<th style="text-align: center; vertical-align: middle;"><b>Completely Agree</b></th>
			</thead>
			<tr>
				<td>1. Continue growing as an artist</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="grow" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="grow" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="grow" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="grow" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="grow" value="5"/></td>
			</tr>
			<tr>
				<td>2. Finish School (High School/College)</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="finishSchool" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="finishSchool" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="finishSchool" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="finishSchool" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="finishSchool" value="5"/></td>
			</tr>
			<tr>
				<td>3. Be ableto find and do well in a job that I enjoy</td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="job" value="1"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="job" value="2"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="job" value="3"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="job" value="4"/></td>
				<td style="text-align: center; vertical-align: middle;"><input type="radio" name="job" value="5"/></td>
			</tr>
		</table>
	</div><!--END EVAL ELEMENT-->
	
	<!--SAVE BUTTON-->
	<input type="submit" name="Save" class="btn btn-lg btn-sidebar" value="Save"/>
		 
		 <?php
			if(isset($_POST["Save"])){
				$learnOfClass = $_POST['learnOfClass'];
				$safe =$_POST['safe'];
				$txtSafe = $_POST['txtSafe'];
				$txtSkillsDeveloped = $_POST['txtSkillsDeveloped'];
				$participation = $_POST['participation'];
				$allCity =$_POST['allCity'];
				$newThings = $_POST['newThings'];
				$artist = $_POST['artist'];
				$art = $_POST['art'];
				$Friends = $_POST['Friends'];
				$motivated = $_POST['motivated'];
				$happy = $_POST['happy'];
				$positive = $_POST['positive'];
				$work = $_POST['work'];
				$stress = $_POST['stress'];
				$respect = $_POST['respect'];
				$negative = $_POST['negative'];
				$creative = $_POST['creative'];
				$careers = $_POST['careers'];
				$goals = $_POST['goals'];
				$community = $_POST['community'];
				$grow = $_POST['grow'];
				$finishSchool = $_POST['finishSchool'];
				$job = $_POST['job'];
				$evalType = 'c_by_s';
				
				
			
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
					
					$sql2 ="Update wbl_v10.class_eval_by_student set question1='".$learnOfClass."',question2='".$safe."',question3='".$txtSafe."',question4='".$txtSkillsDeveloped."',question5='".$participation."',
					question6='".$allCity."',question7=".$newThings.",question8=".$artist.",question9=".$art.",question10=".$Friends.",
					question11=".$motivated.",question12=".$happy.",question13=".$positive.",question14=".$work.",question15=".$stress.",
					question16=".$respect.",question17=".$negative.",question18=".$creative.",question19=".$careers.",question20=".$goals.",
					question21=".$community.",question22=".$grow.",question23=".$finishSchool.",question24=".$job." 
					where evalType='".$evalType."' and week=".$_Session['week']." and studentID='".$user_session."' and staffID='".$instructorID."' and courseID=".$courseID."";
					
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
	<button type="submit" id="bbself" class="btn btn-lg btn-sidebar" value="submit" name="bbself"/>Back</button>
</form>

	</div>
	</div><!--end row-->
</div><!--end main-body col-sm-9-->			 

<?php include 'footer.php';?>
