
<?php

	$courseID = $_GET['cid'];
	$studentID = $_GET['sID'];
	$instructorID = $_GET['instructorID'];
	$sqlweek = "select cast((datediff(curdate(),startdate)/7) as SIGNED) as weeknumber from course where courseID = 1";

	$conn = mysqli_connect("localhost", "root", "root");
	mysqli_select_db($conn, "wbl_v10");	

	if ($result = mysqli_query($conn, $sqlweek))
	{
		while ($row = mysqli_fetch_array($result)){
			$_SESSION["week"] = $row['weeknumber'];
			
		}
		mysqli_free_result($result);
	} 
	//echo $_SESSION["week"];
	//echo $studentID;
	//echo $courseid;

	/*$recognition = $_POST['recognition'];
	$technology = $_POST['technology'];
	$mixing = $_POST['mixing'];
	$scratching = $_POST['scratching'];
	$professional = $_POST['professional'];
	$presentation = $_POST['presentation'];*/
	

	$recognition = '1';
	$technology = '1';
	$mixing = '1';
	$scratching = '1';
	$professional = '1';
	$presentation = '1';
	
	

	//echo "connection successful"; 
	$sqleval = "Insert into evaluation (evalType, week, studentID, staffID, courseID) values ('s_by_i','".$_SESSION["week"]."','".$studentID."','".$instructorID."',".$courseID.")";	
	$output1 = mysqli_query($conn, $sqleval);
	mysqli_close($conn);

	$conn2 = mysqli_connect("localhost", "root", "ohsballer12");
	mysqli_select_db($conn2, "wbl_v10");
	$sqleval2 = "Insert into student_eval_by_instructor (evalType, week, studentID, staffID, courseID) values ('s_by_i','".$_SESSION["week"]."','".$studentID."','".$instructorID."',".$courseID.")";
	$output2 = mysqli_query($conn2, $sqleval2);
	mysqli_close($conn2);


	$conn3 = mysqli_connect("localhost", "root", "ohsballer12");
	mysqli_select_db($conn3, "wbl_v10");

	$sqleval3 = "Update wbl_v10.student_eval_by_instructor set question1=".$recognition.",question2=".$technology.", question3=".$mixing.",question4=".$scratching.",question5=".$professional.",question6=".$presentation." where evalType='s_by_i' and week=".$_SESSION["week"]." and studentID='".$studentID."' and staffID='".$instructorID."' and courseID=".$courseID.";"; 
	$output3 = mysqli_query($conn3, $sqleval3);
	mysqli_close($conn3);


?>

