<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

$q = intval($_GET['q']);
$courseID = intval($_GET['cid']);
$studentid = $_GET['studentid'];

$weekquery = "select distinct e.week as week, se.question1 as q1_student, si.question1 as q1_instructor, se.question2 as q2_student, si.question2 as q2_instructor, se.question3 as q3_student, si.question3 as q3_instructor, se.question4 as q4_student, si.question4 as q4_instructor,se.question5 as q5_student, si.question5 as q5_instructor from Evaluation e left join Self_Eval se on e.week = se.week and e.courseID = se.courseID and e.studentID = se.studentID and e.staffID = se.staffID left join Student_Eval_By_Instructor si on e.week = si.week and e.courseID = si.courseID and e.studentID = si.studentID and e.staffID = si.staffID where e.studentID = '".$studentid."' and e.courseID = '".$courseID."' and e.week = '".$q."'group by e.week, se.question1, si.question1, se.question2, si.question2, se.question3, si.question3,se.question4, si.question4,se.question5, si.question5 order by e.week;";

$con1 = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con1, 'wbl_v10');
// where you can edit the Week Progress table
$result = mysqli_query($con1, $weekquery);
$qstring = "<h1 id=wheader>Week ".$q." Progress</h1>";
$qstring .= '<table id="table2" class="table table-striped">
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

mysqli_close($con1);

?>


</body>
</html>