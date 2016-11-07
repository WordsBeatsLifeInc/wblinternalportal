<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];
error_reporting(-1);
?>		
		


<body class="instructor-dash">

  <div class="row">
	
	<div class="col-sm-3 sidebar instructor-dash"> 


    <div id="MainMenu">
      <div class="list-group panel">

        <a data-target="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">ATTENDANCE<i class="fa fa-caret-down"></i></a>

              <div class="collapse" id="demo3">
 
			  <?php
					//$user_session = $_SESSION['user'];

					$sql = "select course.courseName as courseName, staff_course.courseID as courseID from staff_course inner join course on course.courseid = staff_course.courseID where staff_course.staffID = '".$user_session."'";

					$con1 = mysqli_connect('localhost', 'root', 'root');
					mysqli_select_db($con1, 'wbl_v10');

					$result = mysqli_query($con1, $sql);

					while ($row = mysqli_fetch_array($result)) 
					{
						echo "<button onclick=showStudentAttendance(this) class=list-group-item value='" . $row['courseID'] . "'>" . $row['courseName'] . "</button>";
					}
				?>
              </div>

        <a data-target="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">EVALUATION<i class="fa fa-caret-down"></i></a>

              <div class="collapse" id="demo4">

				<?php

					$sql1 = "select course.courseName as courseName, staff_course.courseID as courseID from staff_course
						inner join course
						on course.courseid = staff_course.courseID
						where staff_course.staffID = '".$user_session."';";
					$result1 = mysqli_query($con1, $sql1);

					while ($row = mysqli_fetch_array($result1)) 
					{
						echo "<button onclick=showEvaluation(this) class=list-group-item name='courseEvalID' id='" . $row['courseID'] . "' value='" . $row['courseID'] . "'>" . $row['courseName'] . "</button>";
					}
				?>

              </div>

        <a data-target="#demo5" class="list-group-item list-group-item-success " data-toggle="collapse" data-parent="#MainMenu">PROGRESS<i class="fa fa-caret-down"></i></a>

              <div class="collapse" id="demo5">

				<?php

					$sql2 = "select course.courseName as courseName, staff_course.courseID as courseID from staff_course
						inner join course
						on course.courseid = staff_course.courseID
						where staff_course.staffID = '".$user_session."';";
					$result2 = mysqli_query($con1, $sql2);
					
					while ($row = mysqli_fetch_array($result2)) 
					{
						echo "<button onclick=showStudentProgress(this) class=list-group-item value='" . $row['courseID'] . "'>" . $row['courseName'] . "</button>";
					}
				?>

              </div>

	  </div>

      </div>
    </div>

</div>

<!--end sidebar-->
	<form action=InstructorDash.php method=post>
	<div  id ="attendance" class="col-sm-9 main-body instructor-dash">
	
	<div id="selectStudent">
	</div>
	
	<div id="txtHint">
		<?php
			if ( isset( $_POST['OK'] ) )
			{	
				$con = mysqli_connect("localhost", "root", "ohsballer12");
				
				if (!con){
					die("cannot connect: " . mysqli_error());
				}
				mysqli_select_db($con, "wbl_v10");
				
				$subcheck = (isset($_POST['Week1Check'])) ? 1 : 0;
				
				$subcheck2 = (isset($_POST['Week2Check'])) ? 1 : 0;
				
				$subcheck3 = (isset($_POST['Week3Check'])) ? 1 : 0;
				
				$subcheck4 = (isset($_POST['Week4Check'])) ? 1 : 0;
				
				$subcheck5 = (isset($_POST['Week5Check'])) ? 1 : 0;
				
				$subcheck6 = (isset($_POST['Week6Check'])) ? 1 : 0;
				
				$subcheck7 = (isset($_POST['Week7Check'])) ? 1 : 0;
				
				$subcheck8 = (isset($_POST['Week8Check'])) ? 1 : 0;

				$insertQuery = "update ATTENDANCE SET WEEK1 = ". $subcheck . ", WEEK2 = ". $subcheck2 .", WEEK3= ". $subcheck3 .", WEEK4= ". $subcheck4 . ", WEEK5= ". $subcheck5 .", WEEK6 = ". $subcheck6 . ", WEEK7 =" . $subcheck7 . ", WEEK8 = " . $subcheck8 . "  WHERE ATTENDANCEID = '$_POST[attendanceID]';";

				$output = mysqli_query($con, $insertQuery);
				if (output == true)
				{echo "<h1>Successfully updated attendance</h1>";}
				else {"<h1>Error updating attendance</h1>";}
				mysqli_close($con);
			};
		?>
		
		<!-- <div id="lblListbox"></div> -->

	</div>
	<br>
	<!-- Evaluation table -->
	<div id="Marissa" style="display: none;">
		<table class="table table-striped">
			<thead>
				<th></th>
				<th>1 (poor)</th>
				<th>2 (below average)</th>
				<th>3 (average)</th>
				<th>4 (above average)</th>
				<th>5 (excellent)</th>
			</thead>
			<tr>
				<td>Recognition</td>
				<td><input type="radio" name="recognition" value="1"/></td>
				<td><input type="radio" name="recognition" value="2"/></td>
				<td><input type="radio" name="recognition" value="3"/></td>
				<td><input type="radio" name="recognition" value="4"/></td>
				<td><input type="radio" name="recognition" value="5"/></td>
			</tr>
			<tr>
				<td>Technology</td>
				<td><input type="radio" name="technology" value="1"/></td>
				<td><input type="radio" name="technology" value="2"/></td>
				<td><input type="radio" name="technology" value="3"/></td>
				<td><input type="radio" name="technology" value="4"/></td>
				<td><input type="radio" name="technology" value="5"/></td>
			</tr>
			<tr>
				<td>Mixing</td>
				<td><input type="radio" name="mixing" value="1"/></td>
				<td><input type="radio" name="mixing" value="2"/></td>
				<td><input type="radio" name="mixing" value="3"/></td>
				<td><input type="radio" name="mixing" value="4"/></td>
				<td><input type="radio" name="mixing" value="5"/></td>
			</tr>
			<tr>
				<td>Scratching</td>
				<td><input type="radio" name="scratching" value="1"/></td>
				<td><input type="radio" name="scratching" value="2"/></td>
				<td><input type="radio" name="scratching" value="3"/></td>
				<td><input type="radio" name="scratching" value="4"/></td>
				<td><input type="radio" name="scratching" value="5"/></td>
			</tr>
			<tr>
				<td>Being Professional</td>
				<td><input type="radio" name="professional" value="1"/></td>
				<td><input type="radio" name="professional" value="2"/></td>
				<td><input type="radio" name="professional" value="3"/></td>
				<td><input type="radio" name="professional" value="4"/></td>
				<td><input type="radio" name="professional" value="5"/></td>
			</tr>
			<tr>
				<td>Presentation</td>
				<td><input type="radio" name="presentation" value="1"/></td>
				<td><input type="radio" name="presentation" value="2"/></td>
				<td><input type="radio" name="presentation" value="3"/></td>
				<td><input type="radio" name="presentation" value="4"/></td>
				<td><input type="radio" name="presentation" value="5"/></td>
			</tr>
		</table>
		<button class="btn btn-lg btn-sidebar" onclick="saveEval()" name="Eval" id="Eval" value="Submit Evaluation">Submit Evaluation</button>
 
	</div>
	<!-- END Evaluation table -->
	
	<div class="InstructorButtons">
	<br />
			<br />
<br>


<!-- Javascript -->
<script>

	var cid;
	var instructorID = "<?php echo $user_session;?>";
	var ProgressCourseID;
	function showStudentAttendance(str) 
	{
		cid = str.value;
		alert(cid);
		alert(instructorID);
		document.getElementById("selectStudent").innerHTML = "";
		document.getElementById("Marissa").style.display = "none";
		if (cid == "") 
		{

	        document.getElementById("txtHint").innerHTML = "<h1>Attendance will be displayed here</h1>";
	        return;
    	} 
    	else 
    	{ 
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                document.getElementById("txtHint").innerHTML = "<h1>Attendance</h1><br>";
					document.getElementById("txtHint").innerHTML += xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open("GET","getInstructorCourses.php?cid="+cid+"&instructorID="+instructorID,true);
	        xmlhttp.send();
		}
	}
	
	function showEvaluation(courseid) 
	{
		cid = courseid.value;
		//alert(instructorID);
		//alert(cid);
		if (cid == "") 
		{

	        //document.getElementById("txtHint").innerHTML = "<h1>Attendance will be displayed here</h1>";
	        return;
    	} 
    	else 
    	{ 
			document.getElementById("txtHint").innerHTML = "";
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                //alert("setting");
					document.getElementById("selectStudent").innerHTML = "<h1>Evaluation</h1><br>";
					document.getElementById("selectStudent").innerHTML += "<label>Select a student:</label><br>";
					document.getElementById("selectStudent").innerHTML += xmlhttp.responseText;
					document.getElementById("Marissa").style.display = "block";
	            }
	        };
			//alert("getting from php");
	        xmlhttp.open("GET","getSelectStudentEval.php?cid="+cid+"&instructorID="+instructorID,true);
	        xmlhttp.send();
		}
	}
	function saveEval() 
	{
		var sID = document.getElementById("students").value;
		//var rval = document.getElementByName("recognition").value;
		//alert(rval);
		alert("studentID is: " + sID);
		alert(instructorID);
		alert(cid);
		if (cid == "") 
		{
			alert("no course");
	        //document.getElementById("txtHint").innerHTML = "<h1>Attendance will be displayed here</h1>";
	        return;
    	} 
    	else 
    	{ 
			//document.getElementById("txtHint").innerHTML = "";
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                alert("setting");
					document.getElementById("txtHint").innerHTML = "Evaluation Submitted";
	            }
	        };
			alert("getting from php");
	        xmlhttp.open("GET","saveEval.php?cid="+cid+"&sID="+sID+"&instructorID="+instructorID,true);
	        xmlhttp.send();
		}
	}
	function showStudentProgress(courseid) 
	{
		document.getElementById("txtHint").innerHTML = "";
		ProgressCourseID = courseid.value;
		//alert("courseID is: " + ProgressCourseID);
		//alert("InstructorID is: " + instructorID);
		if (ProgressCourseID == "") 
		{
			alert("no course");
	        //document.getElementById("txtHint").innerHTML = "<h1>Attendance will be displayed here</h1>";
	        return;
    	} 
    	else 
    	{ 
			alert("else reached");
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                //alert("setting");
	                document.getElementById("selectStudent").innerHTML = "<h1>Student Progress</h1><br>";
					document.getElementById("selectStudent").innerHTML += "<label>Select a student:</label><br>";
					document.getElementById("txtHint").innerHTML += xmlhttp.responseText;
					document.getElementById("txtHint").innerHTML += "<br><br><label>View course progress:</label><br><label><input type=radio name=Filter onclick=handlerb(this) id=rbWeek value=ddlWeek>By Week</label> <br><label><input type=radio name=Filter onclick=handlerb(this) id=rbQ value=ddlQuestion>By Question</label><br><br>";
					document.getElementById("txtHint").innerHTML += "<div id=wqDiv><label hidden id=lblWeek>Select a week number:</label><select id=weeklist onchange=showWeekProgress(this.value) name=weeklist size=8 hidden ><option value=1>Week One</option><option value=2>Week Two</option><option value=3>Week Three</option><option value=4>Week Four</option><option value=5>Week Five</option><option value=6>Week Six</option><option value=7>Week Seven</option><option value=8>Week Eight</option></select><label hidden id=lblQ>Select a question number:</label><select id=questionlist onchange=showQuestionProgress(this.value) name=questionlist hidden size=5><option value=1>Question One</option><option value=2>Question Two</option><option value=3>Question Three</option><option value=4>Question Four</option><option value=5>Question Five</option></select></div><div id=DisplayTables></div>";
	            }
	        };
			//alert("getting from php");
	        xmlhttp.open("GET","InstructorDash_Progress.php?pID="+ProgressCourseID+"&instructorID="+instructorID,true);
	        xmlhttp.send();
		}
	}
	function selectStudent()
	{
		var week = document.getElementById("weeklist");
		var question = document.getElementById("questionlist");

		var lblWeek = document.getElementById("lblWeek");
		var lblQ = document.getElementById("lblQ");

		lblWeek.style.display = 'none';
		week.style.display = 'none';

		question.style.display = 'none';
		lblQ.style.display = 'none';
		
	}
	// DETERMINE WHICH LISTBOX TO DISPLAY
	function handlerb(myRadio) 
	{
		currentValue = myRadio.value;
		var week = document.getElementById("weeklist");
		var question = document.getElementById("questionlist");

		var lblWeek = document.getElementById("lblWeek");
		var lblQ = document.getElementById("lblQ");

		if(currentValue == 'ddlWeek')
		{		
			lblWeek.style.display = 'block';
			week.style.display = 'block';

			question.style.display = 'none';
			lblQ.style.display = 'none';

		}
		if(currentValue == 'ddlQuestion')
		{
			lblWeek.style.display = 'none';
			week.style.display = 'none';

			question.style.display = 'block';
			lblQ.style.display = 'block';
		}
		if(currentValue == '')
		{
			week.style.display = 'none';
			question.style.display = 'none';
			lblQ.style.display = 'none';
			lblWeek.style.display = 'none';
		}
	}
	function showWeekProgress(str) 
	{
		alert("week is " + str);
		alert("Course id is: " + ProgressCourseID);
		var studentID = document.getElementById("SelectStudProgress");
		var sID = studentID.value;
		alert("student id is: " + sID);

		if (str == "") 
		{
	     
	        return;
    	} 
    	else 
    	{ 
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                document.getElementById("DisplayTables").innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open("GET","getuser.php?q="+str+"&cid="+ProgressCourseID+"&studentid="+sID,true);
	        xmlhttp.send();
		}
	}
	function showQuestionProgress(str) 
	{
		alert("week is " + str);
		alert("Course id is: " + ProgressCourseID);
		var studentID = document.getElementById("SelectStudProgress");
		var sID = studentID.value;
		alert("student id is: " + sID);

		if (str == "") 
		{
	        return;
		} 
		else 
		{ 

			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } 
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() 
	        {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	            {
	                document.getElementById("DisplayTables").innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open("GET","getquestion.php?q="+str+"&cid="+ProgressCourseID+"&studentid="+sID,true);
	        xmlhttp.send();
		}
	}
	
</script>
	<!-- END Javascript for onchange of week listbox -->


	
	


	</div>

   
    </div>
	<!--end class col-sm-9-->
<?php
	
		$dbc = mysqli_connect('localhost', 'root', 'ohsballer12');
						mysqli_select_db($dbc, 'wbl_v10');
		//grabs data from POST
		if(!$dbc)
			 {
				die("Connection failed: " . mysqli_connect_error);
				echo "connection failed";
			}
							
		$query = "select * FROM user WHERE email = '".$user_session."'";

		$res = mysqli_query($dbc, $query);
		//login is ok so set the user ID and username cookies, redirect to homepage
		
		if(mysqli_num_rows($res)==1)
		{
				$row = mysqli_fetch_array($res);
				$_SESSION['bucks'] = $row['bucks'];
				$bucks = $_SESSION['bucks'];
				//echo $bucks;
				setcookie('userType', $row['userType']);
				setcookie('firstName', $row['firstName']);
				setcookie('appStatus', $row['SignUpStatus']); 
		}  	
		else 
		{
			//the username and password are incorrect so set error message
			$error_msg = 'Sorry, wrong.';

			echo $error_msg;
			echo mysqli_error($dbc);
		}
	?>
		
	 </form>	
</body> 	
					 
 <?php include 'footer.php';?>