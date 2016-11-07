<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
		
			
	if ( isset( $_POST['DJCourse'] ) ) 
		{
			echo $_POST['DJCourse'];
			
/*$query = "select c.courseID, c.courseName, s.staffID FROM course c LEFT JOIN staff_Course s ON c.courseID=s.courseID WHERE elementID = 1";

					
						
$q = intval($_GET['q']);
$courseID = intval($_GET['cid']);
$studentid = $_GET['studentid'];


$con1 = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con1, 'wbl_v10');
// where you can edit the Week Progress table
$result = mysqli_query($con1, $query);

$qstring = '<table id="table2" class="table table-striped">
<thead>
<th>Week</th>
<th>Student1</th>
<th>Instructor1</th>
<th>Student2</th>
<th>Instructor2</th>
<th>Student3</th>
<th>Instructor3</th>
<th>Student4</th>
<th>Instructor4</th>
<th>Student5</th>
<th>Instructor5</th>
</thead>';


while($row = mysqli_fetch_array($result)) 
{
    $qstring .= "<tr>";
    $qstring .= "<td>" . $row['week'] . "</td>";
    $qstring .= "<td>" . $row['q1_student'] . "</td>";
    $qstring .= "<td>" . $row['q1_instructor'] . "</td>";
	$qstring .= "<td>" . $row['q2_student'] . "</td>";
    $qstring .= "<td>" . $row['q2_instructor'] . "</td>";
    $qstring .= "<td>" . $row['q3_student'] . "</td>";
    $qstring .= "<td>" . $row['q3_instructor'] . "</td>";
    $qstring .= "<td>" . $row['q4_student'] . "</td>";
    $qstring .= "<td>" . $row['q4_instructor'] . "</td>";
    $qstring .= "<td>" . $row['q5_student'] . "</td>";
    $qstring .= "<td>" . $row['q5_instructor'] . "</td>";
    $qstring .= "</tr>";
}


$qstring .= "</table>";

echo $qstring;

mysqli_close($con1);*/

			
		}
?>

</body>
</html>