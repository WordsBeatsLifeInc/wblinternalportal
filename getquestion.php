<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php

$se = "se.question";
$si = "si.question";
$studentid = $_GET['studentid'];

$q = intval($_GET['q']);
$courseID = intval($_GET['cid']);

$self = "Q".$q."_Student";
$instructor = "Q".$q."_Instructor";
$si .= $q;
$se .= $q;

$weekquery = "select distinct e.week as week,
	            ".$se." as Self, 
	            ".$si." as Instructor
            from Evaluation e 
            left join Self_Eval se
	            on e.week = se.week
	            and e.courseID = se.courseID
	            and e.studentID = se.studentID
	            and e.staffID = se.staffID
            left join Student_Eval_By_Instructor si
	            on e.week = si.week
	            and e.courseID = si.courseID
	            and e.studentID = si.studentID
	            and e.staffID = si.staffID
            where e.studentID = '".$studentid."'
	            and e.courseID = '".$courseID."'
            group by e.week, se.question1, si.question1
            order by week";

$con1 = mysqli_connect('localhost', 'root', 'root');

mysqli_select_db($con1, 'wbl_v10');

$result = mysqli_query($con1, $weekquery);
$qstring = "<h1 id=qheader>Question ".$q." Progress</h1>";
// where you can edit the Question Progress table
$qstring .= '<table id="courseTable" class="table table-striped">
<thead>
<th>Week</th>
<th>Self</th>
<th>Instructor</th>
</thead>';
//$qstring = "<table>";
while($row = mysqli_fetch_array($result)) 
{
    $qstring .= '<tr>';
    $qstring .= "<td>" . $row['week'] . "</td>";
    $qstring .= "<td>" . $row['Self'] . "</td>";
    $qstring .= "<td>" . $row['Instructor'] . "</td>";
    $qstring .= "</tr>";
}

/*while($row = mysqli_fetch_array($result)) 
{
    $qstring .= "<tr>";
    $qstring .= "<td>" . $row['courseID'] . "</td>";
    $qstring .= "</tr>";
}*/
$qstring .= "</table>";

echo $qstring;

mysqli_close($con1);

?>


</body>
</html>