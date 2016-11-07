<!DOCTYPE html>
<html>
<head>
</head>
<body>



<?php

$courseID = intval($_GET['cid']);
$instructorID = $_GET['instructorID'];
	
$sql = "select e.studentid as email, concat_ws(' ',u.firstName, u.lastName) as StudentName from Enroll e inner join User u on u.email = e.studentID where u.userType = 'Student' and u.email in ( Select email from Student where email in ( Select studentID from enroll where staffID = '".$instructorID."' and courseID = ".$courseID.")) and e.courseid = ".$courseID.";";
	
$con5 = mysqli_connect("localhost", "root", "root");
mysqli_select_db($con5, "wbl_v10");

$result = mysqli_query($con5, $sql);
$string = "";
$string .= '<select name=students id=students required>';
$string .= '<option value=""> -- Select a student -- </option>';
while($row = mysqli_fetch_array($result)) 
{
	$string .= '<option value="' . $row['email'] . '">' . $row['StudentName'] . '</option>';
}
$string .= "</select>";
echo $string;
mysqli_close($con5);

?> 


</body>
</html>