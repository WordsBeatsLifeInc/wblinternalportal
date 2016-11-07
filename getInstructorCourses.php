<!DOCTYPE html>
<html>
<head>
</head>
<body>




<?php 		
		
$instructorID = $_GET['instructorID'];
$courseID = intval($_GET['cid']);
		
$sqlattendance = "select a.ATTENDANCEID as AttendanceID, u.email as StudentEmail, concat(u.firstname , ' ' , u.lastname) as StudentName, a.week1 as WEEK1, a.week2 as WEEK2, a.week3 as WEEK3, a.week4 as WEEK4, a.week5 as WEEK5, a.week6 as WEEK6, a.week7 as WEEK7, a.week8 as WEEK8 from user u left join Attendance a on a.studentid = u.email where u.email in (select email from student where email in ( select studentid from enroll where staffid ='".$instructorID."' and courseid = ".$courseID."));";
	
echo '<table class="table table-striped">
<thead>
<th>Attendance ID</th>
<th>Student Email</th>
<th>Student Name</th>
<th>Week One</th>
<th>Week Two</th>
<th>Week Three</th>
<th>Week Four</th>
<th>Week Five</th>
<th>Week Six</th>
<th>Week Seven</th>
<th>Week Eight</th>
<th>Save</th>
</thead>';

$con4 = mysqli_connect("localhost", "root", "root");
mysqli_select_db($con4, "wbl_v10");

$myData = mysqli_query($con4, $sqlattendance);

while($record = mysqli_fetch_array($myData)) 
{
	echo "<tr id=".$record['AttendanceID'].">";
	echo "<td>" . "<input type readonly name=attendanceID value=". $record['AttendanceID'] . " </td>";
	echo "<td>" . "<input type readonly name=email value=". $record['StudentEmail'] . " </td>";
	echo "<td>" . "<input type readonly name=name value=". $record['StudentName'] . " </td>";
	echo "<td>" ."<input type='checkbox' name='Week1Check'";
	
	//db loading checks
	if ($record['WEEK1'] == 1){
	echo "checked='checked' value='1'";	
	}
	echo " </td>";

	echo "<td>" ."<input type='checkbox' name='Week2Check'";
	if ($record['WEEK2'] == 1){
	echo "checked='checked' value= 1";
	}
	echo " </td>";
	echo "<td>" ."<input type='checkbox' name='Week3Check'"; 
	if ($record['WEEK3'] == 1){
	echo "checked='checked' value= 1";
	}
	echo " </td>";
	echo "<td>" ."<input type='checkbox' name='Week4Check'"; 
	if ($record['WEEK4'] == 1){
	echo "checked='checked' value=1";	
	}
	echo " </td>";
	echo "<td>" ."<input type='checkbox' name='Week5Check'";
	if ($record['WEEK5'] == 1){
	echo "checked='checked' value=1";	
	}
	echo " </td>";		
	echo "<td>" ."<input type='checkbox' name='Week6Check'"; 
	if ($record['WEEK6'] == 1){
	echo "checked='checked' value=1";	
	}
	echo " </td>";
	echo "<td>" ."<input type='checkbox' name='Week7Check'";
	if ($record['WEEK7'] == 1){
	echo "checked='checked' value=1";	
	}
	echo " </td>";
	echo "<td>" ."<input type='checkbox' name='Week8Check'";
	if ($record['WEEK8'] == 1){
	echo "checked='checked' value=1";
	}
	echo " </td>";	
	echo "<td>" . "<input type=submit onclick=updateAttendance(this) name=OK value=OK" . " </td>";
	echo "</tr>";

}

echo "</table>";

mysqli_close($con4);

?>
		
		
</body>
</html>