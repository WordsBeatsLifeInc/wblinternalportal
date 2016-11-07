<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];
$con_string = mysqli_connect("localhost", "root", "root", "wbl_v10");
?>		
		

		
<div class="col-sm-9 main-body">
	<div class="row">				
		<h1>My Student Dashboard</h1>
		<!-- TABLE PHP TO DISPLAY STUDENT'S COURSES -->
		<!--<label>Please select a course:</label>-->
		<select class="form-control eval-element" id="CourseSelect" onchange="courseselect(this.value)" name="CourseSelect">
			<option value="">-- Please select a course --</option>
				<?php
					$con = $con_string;

					$sql = "select e.courseID as courseID, c.courseName as courseName from enroll e inner join course c on c.courseID = e.courseID where e.studentID = '".$user_session."' group by e.courseID, c.courseName;";

					$result = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($result))
					{
						echo "<option value='".$row['courseID']."'>".$row['courseName']."</option>";
					}

				?>
		</select>
		
		<!-- DIV TO DISPLAY STUDENT'S COURSES -->
			<div id="showstuff">	
			</div>
		<!-- END DIV TO DISPLAY STUDENT'S COURSES -->

			<!-- JAVASCRIPT TO DETERMINE WHICH LISTBOX TO DISPLAY -->
			<script>
				function handlerb(myRadio) 
				{
					currentValue = myRadio.value;
					var week = document.getElementById("weeklist");
					var question = document.getElementById("questionlist");
					
					if(currentValue == 'ddlWeek')
					{
						document.getElementById("txtHint").innerHTML = "";
						week.style.visibiltiy = 'visible';
						document.getElementById("lblListbox").innerHTML = "<label>Select week:</label>";
						question.style.visibiltiy = 'hidden';
					}
					if(currentValue == 'ddlQuestion')
					{
						document.getElementById("txtHint").innerHTML = "";
						week.style.visibiltiy = 'hidden';
						document.getElementById("lblListbox").innerHTML = "<label>Select question:</label>";
						question.style.visibiltiy = 'visible';
					}
					if(currentValue == '')
					{
						week.style.visibiltiy = 'hidden';
						question.style.visibiltiy = 'hidden';
						document.getElementById("lblListbox").innerHTML = "";
					}
				}

			</script><!-- END JAVASCRIPT TO DETERMINE WHICH LISTBOX TO DISPLAY -->

			<div id="Filters">
				<!-- FILTER BY WEEK/BY QUESTION DROP DOWN LIST -->
				<label style="margin-bottom: 1em; margin-top: .5em; margin-right: .5em;"><p>View course progress:</p></label>
				<label class="radio-inline">
					<input type="radio" name="Filter" onclick="handlerb(this)" id="rbWeek" value="ddlWeek">By Week
				</label>
				<label class="radio-inline">
					<input type="radio" name="Filter" onclick="handlerb(this)" id="rbQ" value="ddlQuestion">By Question
				</label>
				<!-- END FILTER BY WEEK/BY QUESTION DROP DOWN LIST -->
			</div><!--end div id filters-->
	</div><!--end row-->
	
	<div class="row">
		<div class="col-sm-2">	
			<!-- JAVASCRIPT TO DISPLAY PROGRESS -->
			<script>
				var cid;
				var studentid = "<?php echo $_SESSION['user'] ?>";

				function courseselect(str) 
				{

					//document.getElementById("weeklist").style.display = 'none';
					//document.getElementById("questionlist").style.display = 'none';
					document.getElementById("txtHint").innerHTML = "";
					document.getElementById("rbQ").checked = false;
					document.getElementById("rbWeek").checked = false;
					cid = str;
					//alert(str);
					//alert(studentid);
					if (str == "") 
					{
						document.getElementById("showstuff").innerHTML = "";
						return;
					} 
					else 
					{ 
						//alert(str);
						//document.getElementById('txtHint').innerHTML = "yes";

					
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
								document.getElementById("showstuff").innerHTML = xmlhttp.responseText;
							}
						};
						//alert("getting");
						xmlhttp.open("GET","getcourseinfo.php?q="+str+"&studentid="+studentid,true);
						xmlhttp.send();
					}
				}
				function showWeekProgress(str) 
				{
					var week = str;
					//alert(week);
					//alert(studentid);
					//alert(cid);
					if (str == "") 
					{
						document.getElementById("txtHint").innerHTML = "No data to display for this week";
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
								document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","getuser.php?q="+week+"&cid="+cid+"&studentid="+studentid,true);
						xmlhttp.send();
					}
				}
				function showQuestionProgress(str) 
				{
					if (str == "") 
					{
						document.getElementById("txtHint").innerHTML = "No data to display for this question";
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
								document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
							}
						};
						xmlhttp.open("GET","getquestion.php?q="+str+"&cid="+cid+"&studentid="+studentid,true);
						xmlhttp.send();
					}
				}

				/*function highlight() 
				{
					var table = document.getElementById('courseTable');
					var selection;
					 for (var i=0;i < table.rows.length;i++)
					 {
					  table.rows[i].onclick= function () 
					  {
					   if(!this.hilite)
					   {
						unhighlight();
						this.origColor=this.style.backgroundColor;
						this.style.backgroundColor='#BCD4EC';
						this.hilite = true;
						var yes = this.id;
						alert(yes);
						cid = yes;
					   }
					   else{
						this.style.backgroundColor=this.origColor;
						this.hilite = false;

					   }
						}
					 }
					}
					function unhighlight()
					{
						var table = document.getElementById('courseTable');
						for (var i=0;i < table.rows.length;i++){
						var row = table.rows[i];
						row.style.backgroundColor=this.origColor;
						row.hilite = false;
						}
					}*/

			</script><!-- END JAVASCRIPT TO DISPLAY PROGRESS -->	

			<div id="lblListbox">
				
			</div>
				<!-- WEEK LISTBOX -->
				<select id="weeklist" onchange="showWeekProgress(this.value)" name="weeklist" size="8">
					<option value="1">Week One</option>
					<option value="2">Week Two</option>
					<option value="3">Week Three</option>
					<option value="4">Week Four</option>
					<option value="5">Week Five</option>
					<option value="6">Week Six</option>
					<option value="7">Week Seven</option>
					<option value="8">Week Eight</option>
				</select><!-- END WEEK LISTBOX -->

				<!-- QUESTION LISTBOX -->
				<select id="questionlist"  onchange="showQuestionProgress(this.value)" name="questionlist" hidden size="5">
					<option value="1">Question One</option>
					<option value="2">Question Two</option>
					<option value="3">Question Three</option>
					<option value="4">Question Four</option>
					<option value="5">Question Five</option>
				</select><!-- END QUESTION LISTBOX -->
		</div><!--end col sm 2-->
		
		<div class="col-sm-10">			
				
			<!-- TABLE TO DISPLAY PROGRESS BASED ON SELECTIONS -->
			<div id="txtHint">
			</div>

		</div><!--end col sm 10-->
	</div><!--end row-->
</div><!--end col sm 9-->
	

<div class="col-sm-3 sidebar">
	<form action="SelfEval.php">
		<input type="submit" class="btn btn-lg btn-sidebar" name="rdSelf" value="Self Evaluation" /><br />
	</form>
	<form action="TeacherEvalByStudent.php">
		<input type="submit" class="btn btn-lg btn-sidebar" name="rdTeacherEval" value="Teacher Evaluation"/><br />
	</form>
	<form action="CourseEval.php">
		<input type="submit" class="btn btn-lg btn-sidebar" name="rdCourseEval" value="Course Evaluation"/><br />
	</form>
	<form action="Enroll.php">
		<input type="submit" class="btn btn-lg btn-sidebar" name="rdCourseEnroll" value="Enroll"/><br />
	</form>

	<button type="button" class="btn btn-lg btn-sidebar btn-bonus-bucks">bonus bucks 
	<?php echo '<span class="badge">' . round($bucks) . '</span>';?>
	</button>


	<?php

		$dbc = mysqli_connect('localhost', 'root', 'root');
						mysqli_select_db($dbc, 'wbl_v10');
		//grabs data from POST
		if(!$dbc)
			 {
				die("Connection failed: " . mysqli_connect_error);
				echo "connection failed";
			}
							
		$query = "SELECT * FROM user WHERE email = '".$user_session."'";

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
		

</div><!--end sidebar col-sm-3-->
		
					 
 <?php include 'footer.php';?>
 