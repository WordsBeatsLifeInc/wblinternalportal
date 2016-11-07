<?php
		
			
$studentid = $_GET['studentid'];
$courseid = $_GET['courseid'];
$instructorid = $_GET['instructorid'];
$elementid = $_GET['elementid'];
			
$testquery = "select * from student_element where elementid = ".$elementid." and studentid = '".$studentid."' and elementStatus = 1";


$con1 = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con1, 'wbl_v10');

$result = mysqli_query($con1, $query);
if (!result)
{

	echo "Please enroll in element before enrolling in course";

}
else
{
	
	$query2 = "insert into enroll (studentid, staffid, courseid) values ('".$studentid."', '".$instructorid."', '".$courseid."')";
	$result2 = mysqli_query($con1, $query2);
	if ($result2 == true)
	{
		echo "Successfully enrolled in course!";
	}
	else
	{
		echo "Unable to enroll in course";
	}
}
mysqli_close($con1);

			

?>
