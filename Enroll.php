<?php include 'header.php';
 session_start();
$user_session = $_SESSION['user'];
?>	

<script>
		var cid;
		var studentid = "<?php echo $_SESSION['user'] ?>";
		var elementid;
		function Course(element) 
		{
			elementid = element;
			//alert(elementid);
			//alert (studentid);

			if (studentid == "") 
			{
				//document.getElementById("showstuff").innerHTML = "";
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
						if (elementid == 1)
						{
							document.getElementById("djcoursediv").innerHTML = xmlhttp.responseText;
							document.getElementById("mccoursediv").innerHTML = "";
							document.getElementById("graffiticoursediv").innerHTML = "";
							document.getElementById("bboycoursediv").innerHTML = "";
						}
						if (elementid == 2)
						{
							document.getElementById("djcoursediv").innerHTML = "";
							document.getElementById("mccoursediv").innerHTML = xmlhttp.responseText;
							document.getElementById("graffiticoursediv").innerHTML = "";
							document.getElementById("bboycoursediv").innerHTML = "";
						}
						if (elementid == 3)
						{
							document.getElementById("djcoursediv").innerHTML = "";
							document.getElementById("mccoursediv").innerHTML = "";
							document.getElementById("graffiticoursediv").innerHTML = xmlhttp.responseText;
							document.getElementById("bboycoursediv").innerHTML = "";
						}
						if (elementid == 4)
						{
							document.getElementById("djcoursediv").innerHTML = "";
							document.getElementById("mccoursediv").innerHTML = "";
							document.getElementById("graffiticoursediv").innerHTML = "";
							document.getElementById("bboycoursediv").innerHTML = xmlhttp.responseText;
						}
					}
				};
				//alert("getting");
				xmlhttp.open("GET","fillElementCourse.php?studentid="+studentid+"&elementid="+elementid,true);
				xmlhttp.send();
			}
		}
		function courseEnroll(course) 
		{
			var x = course.cells;
			var courseid = x[0].innerHTML;

			var instructorid = x[2].innerHTML;

			if (studentid == "") 
			{
				//document.getElementById("showstuff").innerHTML = "";
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
						var a = xmlhttp.responseText;
						alert(a);
						location.reload();						
					}
				};
				xmlhttp.open("GET","courseEnroll.php?studentid="+studentid+"&courseid="+courseid+"&instructorid="+instructorid+"&elementid="+elementid,true);
				xmlhttp.send();
			}
		}
</script>	



<div class="col-sm-12 fluid main-body">		
	
	<div class="row">
		<div class="col-sm-12">
		<?php 
	
	if ( isset( $_POST['DJElement'] ) ) 
		{
			$conn = mysqli_connect('localhost','root','root');
			mysqli_select_db($conn, 'wbl_v10');
			if(!$conn)
				{
					die("Connection failed: " . mysqli_connect_error);
					echo "connection failed";
				}
			else 
				{ 
				//echo "connection successful"; 
				$sql = "INSERT INTO Student_Element (studentID, elementID, elementStatus) VALUES ('".$user_session."', 1, 0)";
				$results = mysqli_query($conn, $sql);
				if (!results)
				{
					echo "DJ Enrollment Now Pending Admin Approval!";
				}
				else {
					echo "Already Enrolled in element";
				}
				}	
		// close connection 
		mysql_close($con);
		}
		?>
		
		<?php 

		if ( isset( $_POST['MCElement'] ) ) 				
		{
			$conn = mysqli_connect('localhost','root','root');
			mysqli_select_db($conn, 'wbl_v10');
			if(!$conn)
				{
					die("Connection failed: " . mysqli_connect_error);
					echo "connection failed";
				}
			else 
				{ 
				//echo "connection successful"; 
				$sql = "INSERT INTO Student_Element (studentID, elementID, elementStatus) VALUES ('".$user_session."', 2, 0)";
				$results = mysqli_query($conn, $sql);
				if (!results)
				{
					echo "MC Enrollment Now Pending Admin Approval!";
				}
				else {
					echo "Already Enrolled in element";
				}
				}	
		// close connection 
		mysql_close($con);
		}
		?>
		
		<?php
		
		if ( isset( $_POST['GraffitiElement'] ) ) 
		{
			$conn = mysqli_connect('localhost','root','root');
			mysqli_select_db($conn, 'wbl_v10');
			if(!$conn)
				{
					die("Connection failed: " . mysqli_connect_error);
					echo "connection failed";
				}
			else 
				{ 
				//echo "connection successful"; 
				$sql = "INSERT INTO Student_Element (studentID, elementID, elementStatus) VALUES ('".$user_session."', 3, 0)";
				$results = mysqli_query($conn, $sql);
				if (!results)
				{
					echo "Graffiti Enrollment Now Pending Admin Approval!";
				}
				else {
					echo "Already Enrolled in element";
				}
			}
		// close connection 
		mysql_close($con);
		}
		?>
		
		<?php
		if ( isset( $_POST['BboyElement'] ) ) 
		{
			$conn = mysqli_connect('localhost','root','root');
			mysqli_select_db($conn, 'wbl_v10');
			if(!$conn)
				{
					die("Connection failed: " . mysqli_connect_error);
					echo "connection failed";
				}
			else 
				{ 
				//echo "connection successful"; 
				$sql = "INSERT INTO Student_Element (studentID, elementID, elementStatus) VALUES ('".$user_session."', 4, 0)";
				$results = mysqli_query($conn, $sql);
				if (!results)
				{
					echo "BBoy Enrollment Now Pending Admin Approval!";
				}
				else {
					echo "Already Enrolled in element";
				}

				}	
		// close connection 
		mysql_close($con);
		}

		?>
	 

		<h1>How to Enroll:</h1>
		<p>1) Enroll in the desired element if you have not already done so </p>
		<p>2) Select element courses </p>
		<p>3) Click on the course </p>
		<p>4) Click "Enroll in Selected Course" button</p>
		

		</div><!--end col sm 12-->
	</div><!--end row-->
	
		
	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_dj.png" alt="DJ" class="img-responsive">
			<form id="form1" method="post" action="Enroll.php"><button type="submit" id="DJElement" class="btn btn-lg btn-enroll" value="submit" name="DJElement"/>Enroll in DJ Element</button></form>
			<button type="submit" id="DJCourse" class="btn btn-lg btn-enroll" value="1" onclick="Course(this.value)" name="DJCourse"/>Enroll in DJ Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->


	<div id="djcoursediv">
	</div>

	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_mc.png" alt="MC" class="img-responsive">
			<form id="form1" method="post" action="Enroll.php"><button type="submit" id="MCElement" class="btn btn-lg btn-enroll" value="submit" name="MCElement"/>Enroll in MC Element</button></form>
			<button type="submit" id="MCCourse" onclick="Course(this.value)" class="btn btn-lg btn-enroll" value="2" name="MCCourse"/>Enroll in MC Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->
	
	<div id="mccoursediv">
	</div>

	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_graffiti.png" alt="DJ" class="img-responsive">
			<form id="form1" method="post" action="Enroll.php"><button type="submit" id="GraffitiElement" class="btn btn-lg btn-enroll" value="submit" name="GraffitiElement"/>Enroll in Graffiti Element</button></form>
			<button type="submit" onclick="Course(this.value)" id="GraffitiCourse" class="btn btn-lg btn-enroll" value="3" name="GraffitiCourse"/>Enroll in Graffiti Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->

	<div id="graffiticoursediv">
	</div>

	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_bboy.png" alt="MC" class="img-responsive">
			<form id="form1" method="post" action="Enroll.php"><button type="submit" id="BboyElement" class="btn btn-lg btn-enroll" value="submit" name="BboyElement"/>Enroll in Bboy Element</button></form>
			<button type="submit" onclick="Course(this.value)" id="BboyCourse" class="btn btn-lg btn-enroll" value="4" name="BboyCourse"/>Enroll in Bboy Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->
	
	<div id="bboycoursediv">
	</div>
	

     
	</div><!--end container fluid-->

	</div><!--end main-body col-sm-12-->
</div><!--end row-->


		
					 
 <?php include 'footer.php';?>
 