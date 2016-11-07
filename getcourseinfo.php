<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php         
//$con_string = mysqli_connect('localhost', 'root', 'root');

$q = intval($_GET['q']);
$studentid = $_GET['studentid'];


$query="select distinct e.courseID as courseID, c.courseName as courseName,e.staffID as staffID, DATE_FORMAT(c.startDate, '%b %e, %Y') as Start_Date,DATE_FORMAT(c.endDate, '%b %e, %Y') as End_Date, COALESCE(a.week1 + a.week2,+ a.week3, + a.week4, + a.week5, + a.week6, + a.week7, + a.week8) AS Attendance from enroll e inner join course c  on c.courseID = e.courseID left join Attendance a on (a.staffID, a.studentID, a.courseID) in (select staffID, studentID, courseID from enroll where studentID = '".$studentid."') where e.studentID = '".$studentid."' and e.courseID = '".$q."' group by e.courseID, c.courseName, e.staffID, attendance, c.startDate, c.enddate";


$con1 = mysqli_connect('localhost', 'root', 'root');
mysqli_select_db($con1, 'wbl_v10');

$result = mysqli_query($con1, $query);
// where you can edit the selected course table
$qstring = '<table id="courseTable" class="table table-striped">
<thead>
<th>Course ID</th>
<th>Course Name</th>
<th>Staff Email</th>
<th>Start Date</th>
<th>End Date</th>
<th>Attendance</th>
</thead>';
while($row = mysqli_fetch_array($result)) 
{
    $qstring .= '<tr id="'.$row['courseID'].'" onclick="highlight()">';
    $qstring .= "<td>" . $row['courseID'] . "</td>";
    $qstring .= "<td>" . $row['courseName'] . "</td>";
    $qstring .= "<td>" . $row['staffID'] . "</td>";
    $qstring .= "<td>" . $row['Start_Date'] . "</td>";
    $qstring .= "<td>" . $row['End_Date'] . "</td>";
    $qstring .= "<td>" . $row['Attendance'] . "</td>";
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