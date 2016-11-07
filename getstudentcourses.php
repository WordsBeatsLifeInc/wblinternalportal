<!DOCTYPE html>
<html>
<head>
</head>
<body>


<?php
$con_string = mysqli_connect("localhost", "root", "root", "wbl_v10");

    $studentid = $_GET['studentid'];

    $con = $con_string;

    $sql = "select e.courseID as courseID, c.courseName as courseName from enroll e inner join course c on c.courseID = e.courseID where e.studentID = '".$studentid."'group by e.courseID, c.courseName";
    $output = "<label>Please select a course:</label><br>";
    $output .= '<select class="form-control" id="CourseSelect" onchange="courseselect(this.value)" name="CourseSelect">
      <option value="">-- Select a course --</option>';
    //echo $output;
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result))
    {     
      $output .= "<option value='".$row['courseID']."'>".$row['courseName']."</option>";
    }
    $output .= "</select><br>";

    echo $output;
    mysqli_close();

  ?>

  </body>
</html>