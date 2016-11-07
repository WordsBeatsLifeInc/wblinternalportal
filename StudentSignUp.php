<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
?>		
		


	
	<div class="col-sm-9 main-body">


 
 <form name="CreateUser" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
 <table class="table table-striped table-bordered centered-table table-centered-text">
	<tr>
		<h1>Ward of Residence:</h1> 
		<tr><td><input type="radio" name="wardOfResidence" value="1-8"/>1-8</td></tr>
		<tr><td><input type="radio" name="wardOfResidence" value="VA"/>Virginia</td></tr>
		<tr><td><input type="radio" name="wardOfResidence" value="MD"/>Maryland</td></tr>
    </tr>  
</table>
<table class="table table-striped table-bordered centered-table table-centered-text">
	<tr>
		<h1>Ward of Program: </h1> 
		<tr><td><input type="radio" name="wardOfProgram" value="St. Stephen\'s Church"/>St. Stephen's Church</td></tr>
		<tr><td><input type="radio" name="wardOfProgram" value="MLK Library"/>MLK Library</td></tr>
		<tr><td><input type="radio" name="wardOfProgram" value="Riverside Center"/>Riverside Center</td></tr>
		<tr><td><input type="radio" name="wardOfProgram" value="BARS"/>BARS</td></tr>
    </tr> 
</table>
<table class="table table-striped table-bordered centered-table table-centered-text">
	<tr>
		<h1>PSA of Program: </h1> 
		<tr><td><input type="radio" name="PSAOfProgram" value="St. Stephen\'s Church"/>St. Stephen's Church</td></tr>
		<tr><td><input type="radio" name="PSAOfProgram" value="MLK Library"/>MLK Library</td></tr>
		<tr><td><input type="radio" name="PSAOfProgram" value="Riverside Center"/>Riverside Center</td></tr>
		<tr><td><input type="radio" name="PSAOfProgram" value="N/A BARS"/>N/A BARS</td></tr>
    </tr> 
</table>
<table class="table table-striped table-bordered centered-table table-centered-text">  	
	<tr>
		<h1>Student Status: </h1> 
		<tr><td><input type="radio" name="studentStatus" value="Not in School"/>Not in School</td></tr>
		<tr><td><input type="radio" name="studentStatus" value="Currently Attending School"/>Currently Attending School</td></tr>
    </tr>    
</table>
<table class="table table-striped table-bordered centered-table table-centered-text">
	<tr>
		<h1>DC One Card Number: </h1> 
		<tr><td><input class="form-control" type="text" name="txtdcOneCard"/></td></tr>
	</tr>
</table>
	<tr><h1>Health Information</h1></tr>
	<tr>
		<td>Primary Care Physician/Treatment Facility:</td>
		<tr><td><input class="form-control" type="text" name="txtPhysician"/></td></tr>
	</tr>
	<tr>
		<td>Insurance Company:</td>
		<tr><td><input class="form-control" type="text" name="txtInsuranceCo"/></td></tr>
	</tr>
	<tr>
		<td>Insurance Group:</td>
		<tr><td><input class="form-control" type="text" name="txtInsuranceGroup"/></td></tr>
	</tr>
	<tr>
		<td>Insurance Policy Number:</td>
		<tr><td><input class="form-control" type="text" name="txtInsurancePolicyNum"/></td></tr>
	</tr>
<table class="table table-striped table-bordered centered-table table-centered-text">

	<tr>
		<h1>Dietary Restrictions:</h1>
		<tr><td><input type="radio" name="dietaryRestrictions" value="Vegetarian"/>Vegetarian</td></tr>
		<tr><td><input type="radio" name="dietaryRestrictions" value="Vegan"/>Vegan</td></tr>
		<tr><td><input type="radio" name="dietaryRestrictions" value="Pescatarian"/>Pescatarian</td></tr>
		<tr><td><input type="radio" name="dietaryRestrictions" value="N/A"/>N/A</td></tr>
		<tr><td><input type="radio" name="dietaryRestrictions" value="Nut Allergy"/>Nut Allergy</td></tr>
		<tr><td><input type="radio" name="dietaryRestrictions" value="Other"/>Other</td></tr>
		<tr><td><input type="text" name="txtDietaryOther"/></td></tr>
	</tr>
</table>

<table class="table table-striped table-bordered centered-table table-centered-text">
	<tr><h1>Allergies:</h1></tr>
	<tr><td><input class="form-control" type="text" name="txtAllergies"/></td></tr>
</table>

<table class="table table-striped table-bordered centered-table table-centered-text">
	<tr><h1>Educational Information</h1></tr>
	<tr><td>Current Year in School:</td></tr>
	<tr><td><input class="form-control" type="text" name="txtCurrentYear"/></td></tr>
	
	<tr><td>Name of School:</td></tr>
	<tr><td><input class="form-control" type="text" name="txtSchoolName"/></td></tr>
	
	<tr><td>Expected Year of Graduation :</td></tr>
	<tr><td><input class="form-control" type="text" name="txtExpectedGrad"/></td></tr>
	
	<tr><td>Do you plan on going to College/Trade School?</td></tr>
	<tr><td><input type="radio" name="collegePlans" value="yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="collegePlans" value="no"/>No</td></tr>
	<tr><td><input type="radio" name="collegePlans" value="I am currently in College/Trade School"/>I am currently in College/Trade School</td></tr>
	<tr><td><input type="radio" name="collegePlans" value="I don\'t know"/>I don't know</td></tr>
	
	<tr><td>What College/Trade School do you want to go to?</td></tr>
	<tr><td><input class="form-control" type="text" name="txtFutureSchoolName"/></td></tr>
	
	<tr><td>Major/Planned Major:</td></tr>
	<tr><td><input class="form-control" type="text" name="txtPlannedMajor"/></td></tr>
</table>
<table class="table table-striped table-bordered centered-table table-centered-text">
	<tr><h1>Past Education Information</h1></tr>
	<tr><td>Last School Attended: </td></tr>
	<tr><td><input class="form-control" type="text" name="txtLastSchool"/></td></tr>
	
	<tr><td>Past Graduation Date: </td></tr>
	<tr><td><input class="form-control" type="text" name="txtYearOfGrad"/></td></tr>
	
	<tr><td>What did you study? </td></tr>
	<tr><td><input type="text" name="txtPastAreaStudy"/></td></tr>
	
	<tr><td>Do you plan on furthering your education? </td></tr>
	<tr><td><input type="radio" name="furtherEdu" value="Yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="furtherEdu" value="No"/>No</td></tr>
	<tr><td><input type="radio" name="furtherEdu" value="I don\'t know"/>I don't know</td></tr>
</table>

<table class="table table-striped table-bordered centered-table table-centered-text">	
	<tr><h1>Employment Information</h1></tr>
	<tr><td>Do you currently have a job? </td></tr>
	<tr><td><input type="radio" name="Job" value="Yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="Job" value="No"/>No</td></tr>
	
	<tr><td>Job description: </td></tr>
	<tr><td><input class="form-control" type="text" name="txtJobDescription"/></td></tr>
	
	<tr><td>Name of Employer: </td></tr>
	<tr><td><input class="form-control" type="text" name="txtEmployerName"/></td></tr>
	
	<tr><td>How much do you make per hour? </td></tr>
	<tr><td><input type="radio" name="wage" value="$7-10"/>$7-10</td></tr>
	<tr><td><input type="radio" name="wage" value="$10-15"/>$10-15</td></tr>
	<tr><td><input type="radio" name="wage" value="$15-20"/>$15-20</td></tr>
	<tr><td><input type="radio" name="wage" value="$20-25"/>$20-25</td></tr>
	<tr><td><input type="radio" name="wage" value="$25-30"/>$25-30</td></tr>
	<tr><td><input type="radio" name="wage" value="$30 or more"/>$30 or more</td></tr>
	<tr><td><input type="radio" name="wage" value="Salaried"/>Salaried</td></tr>
	<tr><td><input type="radio" name="wage" value="Other"/>Other</td></tr>
	<tr><td><input type="text" name="txtWageOther"/></td></tr>
	
	<tr><td>Career Goals: </td></tr>
	<tr><td><input class="form-control" type="text" name="txtCareerGoals"/></td></tr>
	
	<tr><td>How much do you want to make per hour? </td></tr>
	<tr><td><input type="radio" name="desiredWage" value="$7-10"/>$7-10</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="$10-15"/>$10-15</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="$15-20"/>$15-20</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="$20-25"/>$20-25</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="$25-30"/>$25-30</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="$30 or more"/>$30 or more</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="Salaried"/>Salaried</td></tr>
	<tr><td><input type="radio" name="desiredWage" value="Other"/>Other</td></tr>
	<tr><td><input type="text" name="txtDesiredOther"/></td></tr>
	
	<tr><td>Do you currently have a resume? </td></tr>
	<tr><td><input type="radio" name="resume" value="Yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="resume" value="No"/>No</td></tr>
	<tr><td><input type="radio" name="resume" value="What\'s a resume?"/>What's a resume?</td></tr>
	
	<tr><td>Do you currently have an artistic resume? </td></tr>
	<tr><td><input type="radio" name="artisticResume" value="Yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="artisticResume" value="No"/>No</td></tr>
	<tr><td><input type="radio" name="artisticResume" value="What\'s a resume?"/>What's an artistic resume?</td></tr>
	
	<tr><td>Which workshops would you participate in?</td></tr>
	<tr><td><input type="checkbox" name="workshops" value="Interviewing Skills"/>Interviewing Skills</td></tr>
	<tr><td><input type="checkbox" name="workshops" value="Resume Development"/>Resume Development</td></tr>
	<tr><td><input type="checkbox" name="workshops" value="Intellectual Property"/>Intellectual Property</td></tr>
	<tr><td><input type="checkbox" name="workshops" value="Portfolio Building"/>Portfolio Building</td></tr>
	<tr><td><input type="checkbox" name="workshops" value="None"/>None</td></tr>
	
	<tr><td>Have you taken classes with WBL in the past? </td></tr>
	<tr><td><input type="radio" name="pastClasses" value="Yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="pastClasses" value="No"/>No</td></tr>
	
	<tr><td>If yes, Which classes and when? </td></tr>
	<?php
		$conn = mysqli_connect('localhost', 'root', 'password');
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
	<tr><td><select name="selectCourse" id="course" required><option></option><?php echo $course;?></select></td></tr>
	
	<tr><td>Are you an Apprentice? </td></tr>
	<tr><td><input type="radio" name="apprentice" value="Yes"/>Yes</td></tr>
	<tr><td><input type="radio" name="apprentice" value="No"/>No</td></tr>
	
	<tr><td>Skill Mastery</td></tr>
	<tr><td>DJ'ing</td></tr>
	<td><input type="radio" name="DJ" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="DJ" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="DJ" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="DJ" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="DJ" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Graffiti</td></tr>
	<td><input type="radio" name="Graffiti" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Graffiti" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Graffiti" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Graffiti" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Graffiti" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>MC'ing/Rapping</td></tr>
	<td><input type="radio" name="MC" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="MC" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="MC" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="MC" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="MC" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Poetry/Spoken Word</td></tr>
	<td><input type="radio" name="Poetry" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Poetry" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Poetry" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Poetry" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Poetry" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Murals/Public Art</td></tr>
	<td><input type="radio" name="Murals" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Murals" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Murals" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Murals" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Murals" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Breakdancing</td></tr>
	<td><input type="radio" name="Breakdancing" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Breakdancing" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Breakdancing" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Breakdancing" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Breakdancing" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Music Production</td></tr>
	<td><input type="radio" name="Production" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Production" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Production" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Production" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Production" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Chess</td></tr>
	<td><input type="radio" name="Chess" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Chess" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Chess" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Chess" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Chess" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Photography</td></tr>
	<td><input type="radio" name="Photography" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="Photography" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="Photography" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="Photography" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="Photography" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>Hip-Hop Dance</td></tr>
	<td><input type="radio" name="HipHop" value="No Experience"/>No Experience</td>
	<td><input type="radio" name="HipHop" value="Beginner"/>Beginner</td>
	<td><input type="radio" name="HipHop" value="Intermediate"/>Intermediate</td>
	<td><input type="radio" name="HipHop" value="Advanced"/>Advanced</td>
	<td><input type="radio" name="HipHop" value="Interested in Learning"/>Interested in Learning</td>
	
	<tr><td>T-Shirt Size: </td></tr>
	<tr><td><input type="radio" name="size" value="Small"/>Small</td></tr>
	<tr><td><input type="radio" name="size" value="Medium"/>Medium</td></tr>
	<tr><td><input type="radio" name="size" value="Large"/>Large</td></tr>
	<tr><td><input type="radio" name="size" value="XL"/>XL</td></tr>
	<tr><td><input type="radio" name="size" value="XXL"/>XXL</td></tr>
	<tr><td><input type="radio" name="size" value="Other"/>Other</td></tr>
	<tr><td><input type="text" name="txtShirtOther"/></td></tr>
	
</table>
<input type="submit" name="Save" value="Save"/>

<?php

	$conn = mysqli_connect('localhost','root','password');
	mysqli_select_db($conn, 'wbl_v10');
	if(!$conn)
	{
		die("Connection failed: " . mysqli_connect_error);
		echo "connection failed";
	}
	else { 
	echo "connection successful"; 
	}
	$wardOfResidence=$_POST['wardOfResidence'];
	$wardOfProgram = $_POST['wardOfProgram'];
	$PSAOfProgram =$_POST['PSAOfProgram'];
	$studentStatus =$_POST['studentStatus'];
	$DCOne = $_POST['txtdcOneCard'];
	$physician = $_POST['txtPhysician'];
	$insuranceCo = $_POST['txtInsuranceCo'];
	$insuranceGroup = $_POST['txtInsuranceGroup'];
	$insurancePolicyNum = $_POST['txtInsurancePolicyNum'];

	if($_POST['dietaryRestrictions']=='Other')
	{ 
		$diet = $_POST['txtDietaryOther'];
	}
	else{ 
		$diet = $_POST['dietaryRestrictions'];
	}

	$allergies = $_POST['txtAllergies'];
	$currentYear = $_POST['txtCurrentYear'];
	$schoolName = $_POST['txtSchoolName'];
	$expectedGrad = $_POST['txtExpectedGrad'];
	$collegePlans = $_POST['collegePlans'];
	$futureSchool = $_POST['txtFutureSchoolName'];
	$plannedMajor = $_POST['txtPlannedMajor'];
	$lastSchool = $_POST['txtLastSchool'];
	//$yearOfGrad = $_POST['txtYearOfGrad'];
	
	
	$pastAreaStudy = $_POST['txtPastAreaStudy'];
	$furtherEdu = $_POST['furtherEdu'];
	$job = $_POST['Job'];
	$jobDescr = $_POST['txtJobDescription'];
	$employerName = $_POST['txtEmployerName'];
	if($_POST['wage']=='Other')
	{ 
		$wage= $_POST['txtWageOther'];
	}
	else{ 
		$wage = $_POST['wage'];
	}

	$careerGoals = $_POST['txtCareerGoals'];
	if($_POST['desiredWage']=='Other')
	{ 
		$desiredWage= $_POST['txtDesiredOther'];
	}
	else{ 
		$desiredWage = $_POST['desiredWage'];
	}
	

	$resume = $_POST['resume'];
	$artisticResume = $_POST['artisticResume'];
	$workshops = $_POST['workshops'];
	$pastClasses = $_POST['pastClasses'];
	$className =$_POST['selectCourse'];

	//$courseID 
	$apprentice = $_POST['apprentice'];
	$DJ = $_POST['DJ'];
	$graffiti = $_POST['Graffiti'];
	$MC = $_POST['MC'];
	$poetry = $_POST['Poetry'];
	$murals = $_POST['Murals'];
	$breakdancing = $_POST['Breakdancing'];
	$production = $_POST['Production'];
	$chess = $_POST['Chess'];
	$photography = $_POST['Photography'];
	$hiphop = $_POST['HipHop'];
	$Time = strtotime($_POST['txtYearOfGrad']);
		$newformat= date('Y-m-d', $Time); 
		$dateOfGrad = $newformat;
		echo $dateOfGrad;
		
	if($_POST['size']=='Other')
	{ 
		$size = $_POST['txtShirtOther'];
	}
	else{ 
		$size = $_POST['size'];
	}
	
	if(isset ($_POST['Save']))
	{
		
		$sql1="Insert into wbl_v10.student values ('".$user_session."','".$wardOfResidence."','".$wardOfProgram."','".$PSAOfProgram."','".$DCOne."',NULL,
		'".$physician."','".$insuranceCo."','".$insuranceGroup."','".$insurancePolicyNum."','".$allergies."','".$diet."','".$currentYear."','".$schoolName."','".$expectedGrad."',
		'".$collegePlans."','".$futureSchool."','".$plannedMajor."','".$lastSchool."','".$dateOfGrad."','".$pastAreaStudy."','".$furtherEdu."','".$job."',
		'".$jobDescr."','".$employerName."','".$wage."','".$careerGoals."','".$desiredWage."','".$resume."','".$artisticResume."','".$workshops."','".$pastClasses."','".$className."',
		'".$apprentice."','".$DJ."','".$graffiti."','".$MC."','".$poetry."','".$murals."','".$breakdancing."','".$production."','".$chess."','".$photography."',
		'".$hiphop."','".$size."',NULL,NULL,NULL)";
		
		
            
		mysqli_query($conn, $sql1);
		echo $sql1;
	 }
	 
 
 ?>
	</div><!--end main-body col-sm-9-->
</form>
</html>
