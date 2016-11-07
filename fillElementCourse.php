<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
		
			
$studentid = $_GET['studentid'];
$elementid = $_GET['elementid'];
			

$query1 = "select c.courseID as courseID, c.courseName as courseName, s.staffID as staffID FROM course c LEFT JOIN staff_Course s ON c.courseID=s.courseID WHERE elementID = ".$elementid." and c.courseid not in ( select courseid from enroll where studentid = '".$studentid."')";
					

$con1 = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con1, 'wbl_v10');

$result = mysqli_query($con1, $query1);

$qstring = '<table id="table2" class="table table-striped">
<thead>
<th>Course ID</th>
<th>Course Name</th>
<th>Staff ID</th>

</thead>';


while($row = mysqli_fetch_array($result)) 
{
    $qstring .= '<tr onclick="courseEnroll(this)" value="'.$elementid.'">';
    $qstring .= '<td id="'. $row['courseID'] .'">' . $row['courseID'] . '</td>';
    $qstring .= '<td>' . $row['courseName'] . '</td>';
    $qstring .= '<td>' . $row['staffID'] . "</td>";
    $qstring .= "</tr>";
}


$qstring .= "</table>";

echo $qstring;

mysqli_close($con1);

			

?>

</body>
</html>