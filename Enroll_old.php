<?php include 'header.php';
 session_start();
$user_session = $_SESSION['user'];
?>		

<div class="col-sm-12 fluid main-body">		
	
	<div class="row">
		<div class="col-sm-12">
		
		<form id="form1" method="post" action="Enroll.php">

		<h1>How to Enroll:</h1>
		<p>1) Enroll in the desired element if you have not already done so </p>
		<p>2) Select element courses </p>
		<p>3) Click on the course </p>
		<p>4) Click "Enroll in Selected Course" button</p>
		
		<input id="mytext" class="form-control" type="text" name="mytext" style="margin-top: .5em; margin-bottom: .5em;" readonly />
		<input id="myID" class="form-control" type="text" value="<?php echo $user_session;?> "name="myID" style="margin-top: .5em; margin-bottom: .5em;" readonly />

		</div><!--end col sm 12-->
	</div><!--end row-->
	
		
	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_dj.png" alt="DJ" class="img-responsive">
			<button type="submit" id="DJElement" class="btn btn-lg btn-enroll" value="submit" name="DJElement"/>Enroll in DJ Element</button>
			<button type="submit" id="DJCourse" class="btn btn-lg btn-enroll" value="submit" name="DJCourse"/>Enroll in DJ Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->

	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_mc.png" alt="MC" class="img-responsive">
			<button type="submit" id="MCElement" class="btn btn-lg btn-enroll" value="submit" name="MCElement"/>Enroll in MC Element</button>
			<button type="submit" id="MCCourse" class="btn btn-lg btn-enroll" value="submit" name="MCCourse"/>Enroll in MC Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->
	
	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_graffiti.png" alt="DJ" class="img-responsive">
			<button type="submit" id="GraffitiElement" class="btn btn-lg btn-enroll" value="submit" name="GraffitiElement"/>Enroll in Graffiti Element</button>
			<button type="submit" id="GraffitiCourse" class="btn btn-lg btn-enroll" value="submit" name="GraffitiCourse"/>Enroll in Graffiti Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->

	<div class="row">
		<div class="col-sm-12 row-enroll">
			<img src="images/banner_bboy.png" alt="MC" class="img-responsive">
			<button type="submit" id="BboyElement" class="btn btn-lg btn-enroll" value="submit" name="BboyElement"/>Enroll in Bboy Element</button>
			<button type="submit" id="BboyCourse" class="btn btn-lg btn-enroll" value="submit" name="BboyCourse"/>Enroll in Bboy Courses</button>
		</div><!--end col sm 12-->
	</div><!--end row-->
	

	<?php 
	
	if ( isset( $_POST['enrollCourse'] ) ) 
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
				$sql = $_POST['mytext'];
				mysqli_query($conn, $sql);
				echo "Enrolled in Course Successfully!";

				}	
		// close connection 
		mysql_close($conn);
		}
		?>
	
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
				mysqli_query($conn, $sql);
				echo "DJ Enrollment Now Pending Admin Approval!";
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
				mysqli_query($conn, $sql);
				echo "MC Enrollment Now Pending Admin Approval!";
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
				mysqli_query($conn, $sql);
				echo "Graffiti Enrollment Now Pending Admin Approval!";
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
				mysqli_query($conn, $sql);
				echo "BBoy Enrollment Now Pending Admin Approval!";

				}	
		// close connection 
		mysql_close($con);
		}

		?>
	</form>
	<form id="form2" method="post" type="hidden">
	
<?php 
$query = $_POST['query1'];
echo $query1;
?>
	</form>
		
		
		<script>
function myFunction(x) {
	
			var i = x.rowIndex;
	
			var e = document.getElementById("myID").value;
			var x = document.getElementById('displaytable').tBodies[0].rows[i].cells[0].innerHTML;
			var y = document.getElementById('displaytable').tBodies[0].rows[i].cells[2].innerHTML;
			var a = "INSERT INTO ENROLL VALUES ('";
			var b = "','";
			var c = ")";
			var f = "',"
			var z =  a +=e +=b +=y +=f +=x +=c;

			//document.write(z);
			document.getElementById("mytext").value = z;
		}
</script>

		<?php
		
		$server="localhost";
			$user="root";
			$password1="root";
			$database="wbl_v10";
			$con = mysql_connect($server, $user, $password1);
			
	if ( isset( $_POST['DJCourse'] ) ) 
		{
			
			
			$query = "SELECT c.courseID, c.courseName, s.staffID
						FROM course c
						LEFT JOIN staff_Course s
						ON c.courseID=s.courseID
						WHERE elementID=1";

					
						
				if (!empty($con)) 
					  {
						if (mysql_select_db($database,$con)) 
						{
						  $resultset = mysql_query($query,$con);
						  if ($resultset==true) 
						  {
							$output_string = '<table id="displaytable" class="table table-striped">';
							$header=false;
							while ($row=mysql_fetch_assoc($resultset)) 
							{
							  if(!$header)
							  {
								  
								$output_string .= '<tr>';
								//$output_string .="<th>SELECT</th>";
								foreach($row as $header => $value)
								{
									
								  $output_string .= "<th>{$header}</th>";
								}
								
								$output_string .= '</tr>';
							  }
							  
							  $output_string .= '<tr onclick="myFunction(this)">';
							  
							  foreach($row as $value)
							  {
								
								$output_string .= "<td>{$value}</td>";
							  }
							  $output_string .= "</tr>";
							}
							// end table
							echo $output_string;
							echo '</table>';							
							
						}
							
							
				}
			}
			
		}
					  
							
			
			
			if ( isset( $_POST['MCCourse'] ) ) 
		{

			
			$query = "select c.courseID, c.courseName, s.staffID
						FROM course c
						LEFT JOIN staff_Course s
						ON c.courseID=s.courseID
						WHERE elementID=2 ";

				if (!empty($con)) 
					  {
						if (mysql_select_db($database,$con)) 
						{
						  $resultset = mysql_query($query,$con);
						  if ($resultset==true) 
						  {
							$output_string = '<table id="displaytable" class="table table-striped">';
							$header=false;
							while ($row=mysql_fetch_assoc($resultset)) 
							{
							  if(!$header)
							  {
								  
								$output_string .= '<tr>';
								foreach($row as $header => $value)
								{
									
								  $output_string .= "<th>{$header}</th>";
								}
								
								$output_string .= '</tr>';
							  }
							  
							  $output_string .= '<tr onclick="myFunction(this)">';

							  foreach($row as $value)
							  {
								  
								$output_string .= "<td>{$value}</td>";
							  }
							  $output_string .= "</tr>";
							}
							// end table
							echo $output_string;
							echo '</table>';
						  }
						}
					  }

			


					  }

			
			if ( isset( $_POST['GraffitiCourse'] ) ) 
		{
			
			$query = "SELECT c.courseID, c.courseName, s.staffID
						FROM course c
						LEFT JOIN staff_Course s
						ON c.courseID=s.courseID
						WHERE elementID=3 ";

				if (!empty($con)) 
					  {
						if (mysql_select_db($database,$con)) 
						{
						  $resultset = mysql_query($query,$con);
						  if ($resultset==true) 
						  {
							$output_string = '<table id="displaytable" class="table table-striped">';
							$header=false;
							while ($row=mysql_fetch_assoc($resultset)) 
							{
							  if(!$header)
							  {
								  
								$output_string .= '<tr>';
								foreach($row as $header => $value)
								{
									
								  $output_string .= "<th>{$header}</th>";
								}
								
								$output_string .= '</tr>';
							  }
							  
							  $output_string .= '<tr onclick="myFunction(this)">';

							  foreach($row as $value)
							  {
								  
								$output_string .= "<td>{$value}</td>";
							  }
							  $output_string .= "</tr>";
							}
							// end table
							echo $output_string;
							echo '</table>';
						  }
						}
					  }
			}
			
			if ( isset( $_POST['BboyCourse'] ) ) 
		{

			
			$query = "SELECT c.courseID, c.courseName, s.staffID
						FROM course c
						LEFT JOIN staff_Course s
						ON c.courseID=s.courseID
						WHERE elementID=4";

				if (!empty($con)) 
					  {
						if (mysql_select_db($database,$con)) 
						{
						  $resultset = mysql_query($query,$con);
						  if ($resultset==true) 
						  {
							$output_string = '<table id="displaytable" class="table table-striped">';
							$header=false;
							while ($row=mysql_fetch_assoc($resultset)) 
							{
							  if(!$header)
							  {
								  
								$output_string .= '<tr>';
								foreach($row as $header => $value)
								{
									
								  $output_string .= "<th>{$header}</th>";
								}
								
								$output_string .= '</tr>';
							  }
							  
							  $output_string .= '<tr onclick="myFunction(this)">';

							  foreach($row as $value)
							  {
								  
								$output_string .= "<td>{$value}</td>";
							  }
							  $output_string .= "</tr>";
							}
							// end table
							echo $output_string;
							echo '</table>';
						  }
						}
					  }
			}
	?>
	

	<!-- </form> -->
     
	</div><!--end container fluid-->

	</div><!--end main-body col-sm-12-->
</div><!--end row-->


		
					 
 <?php include 'footer.php';?>
 