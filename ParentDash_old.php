<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];
?>		
		

		
<div class="col-sm-9 main-body">
				
<h1>My Parent Dash</h1>
<label>Please select your student:</label>
<br>
<select class="form-control" id="StudentSelect" onchange="studentselect(this.value)" name="StudentSelect">
	<option value="">-- Please select a student --</option>
	<?php

		$sql = "select email as email, firstName as firstName from user where email in ( select email from Student where email in ( select studentID from Relationship where parentID = '".$user_session."'))";
		$con1 = mysqli_connect('localhost', 'root', 'root');
		mysqli_select_db($con1, 'wbl_v10');

		$result = mysqli_query($con1, $sql);
	    while ($row = mysqli_fetch_array($result))
	    {
	    	echo "<option value='".$row['email']."'>".$row['firstName']."</option>";
	    }

	?>
</select>
<br>	
<!-- DIV TO DISPLAY STUDENT'S COURSES -->
	<div id="fillcourses">
		<label>Please select a course:</label>
		<br>
		<select class="form-control" id="noclick" name="noclick">
  			<option value="">-- Select a course --</option>
  		</select>
  		<br>
	</div>
<!-- END DIV TO DISPLAY STUDENT'S COURSES -->
<!-- DIV TO DISPLAY STUDENT'S COURSE INFO -->
	<div id="showstuff">

	</div>
<!-- END DIV TO DISPLAY STUDENT'S COURSE INFO -->

<!-- JAVASCRIPT TO DETERMINE WHICH LISTBOX TO DISPLAY -->
<script type="text/javascript">

	function handlerb(myRadio) {
		currentValue = myRadio.value;
		var week = document.getElementById("weeklist");
		var question = document.getElementById("questionlist");
		if(currentValue == 'ddlWeek')
		{		
			document.getElementById("txtHint").innerHTML = "";
			week.style.display = 'block';
			document.getElementById("lblListbox").innerHTML = "<label>Select a week number:</label>";
			question.style.display = 'none';
		}
		if(currentValue == 'ddlQuestion')
		{
			document.getElementById("txtHint").innerHTML = "";
			week.style.display = 'none';
			document.getElementById("lblListbox").innerHTML = "<label>Select a question number:</label>";
			question.style.display = 'block';
		}
		if(currentValue == '')
		{
			week.style.display = 'none';
			question.style.display = 'none';
			document.getElementById("lblListbox").innerHTML = "";
		}
	}

</script>
<!-- END JAVASCRIPT TO DETERMINE WHICH LISTBOX TO DISPLAY -->

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

<!-- JAVASCRIPT TO DISPLAY PROGRESS -->
<script>
	var cid;
	var studentid;

	function studentselect(studid) 
	{
		studentid = studid;
		//alert(studentid);
		document.getElementById("weeklist").style.display = 'none';
		document.getElementById("questionlist").style.display = 'none';
		document.getElementById("txtHint").innerHTML = "";
		document.getElementById("showstuff").innerHTML = "";
		document.getElementById("rbQ").checked = false;
		document.getElementById("rbWeek").checked = false;
		document.getElementById("lblListbox").innerHTML = "";

		if (studid == "") 
		{
	        //alert("null");
	        document.getElementById("CourseSelect").value = "";
	        //document.getElementById("fillcourses").innerHTML = "<label>Please select a course:</label><br><br><select  id="noclick" name="noclick" ><option value="">-- Select a course --</option></select><br>";
	        return;
    	} 
    	else 
    	{ 
		//alert("not null");
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
	                //alert("Setting fillcourses div");
	                document.getElementById("fillcourses").innerHTML = xmlhttp.responseText;
	            }
	        };
	        //alert("Calling getstudentcourses.php");
	        xmlhttp.open("GET","getstudentcourses.php?studentid="+studentid,true);
	        xmlhttp.send();
		}
	}
	function courseselect(str) 
	{

		document.getElementById("weeklist").style.display = 'none';
		document.getElementById("questionlist").style.display = 'none';
		document.getElementById("txtHint").innerHTML = "";
		document.getElementById("rbQ").checked = false;
		document.getElementById("rbWeek").checked = false;
		cid = str;
		
		if (cid == "") 
		{
	        document.getElementById("showstuff").innerHTML = "";
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
	                document.getElementById("showstuff").innerHTML = xmlhttp.responseText;
	            }
	        };
	        xmlhttp.open("GET","getcourseinfo.php?q="+cid+"&studentid="+studentid,true);
	        xmlhttp.send();
		}
	}
	function showWeekProgress(str) 
	{
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
	        xmlhttp.open("GET","getuser.php?q="+str+"&cid="+cid+"&studentid="+studentid,true);
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
</script>
<!-- END JAVASCRIPT TO DISPLAY PROGRESS -->	
<div id="lblListbox">
	
</div>
	<!-- WEEK LISTBOX -->
	<select id="weeklist" onchange="showWeekProgress(this.value)" name="weeklist" size="8" hidden >
		<option value="1">Week One</option>
		<option value="2">Week Two</option>
		<option value="3">Week Three</option>
		<option value="4">Week Four</option>
		<option value="5">Week Five</option>
		<option value="6">Week Six</option>
		<option value="7">Week Seven</option>
		<option value="8">Week Eight</option>
	</select>
	<!-- END WEEK LISTBOX -->

	<!-- QUESTION LISTBOX -->
	<select id="questionlist" onchange="showQuestionProgress(this.value)" name="questionlist" hidden size="5">
		<option value="1">Question One</option>
		<option value="2">Question Two</option>
		<option value="3">Question Three</option>
		<option value="4">Question Four</option>
		<option value="5">Question Five</option>
	</select>
	<!-- END QUESTION LISTBOX -->

<!-- TABLE TO DISPLAY PROGRESS BASED ON SELECTIONS -->

<div id="txtHint">
</div>

</div>


	
	</div><!--end main-body col-sm-9-->

	<div class="col-sm-3 sidebar">

<form action="SupportLetter.php">
			<button type="submit" id="supportl" class="btn btn-lg btn-sidebar" value="Write a Support Letter" name="supportl"/>Write a Support Letter</button>
</form>

<!-- <button id="btnSupportLetter" class="btn btn-lg btn-sidebar">Write a Support Letter</button>
-->

<script type="text/javascript">
    document.getElementById("btnSupportLetter").onclick = function () {
        location.href = "SupportLetter.php";
    };
</script>
	
	<?php
	
		$dbc = mysqlii_connect('localhost', 'root', 'ohsballer12');
						mysqlii_select_db($dbc, 'wbl_v10');
		//grabs data from POST
		if(!$dbc)
			 {
				die("Connection failed: " . mysqlii_connect_error);
				echo "connection failed";
			}
							
		$query = "SELECT * FROM user WHERE email = '".$user_session."'";

		$res = mysqlii_query($dbc, $query);
		//login is ok so set the user ID and username cookies, redirect to homepage
		
		if(mysqlii_num_rows($res)==1)
		{
				$row = mysqlii_fetch_array($res);
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
			echo mysqlii_error($dbc);
		}
	?>
		
	 </form>	
	</div><!--end sidebar col-sm-3-->

					 

 <?php include 'footer.php';?>
					 