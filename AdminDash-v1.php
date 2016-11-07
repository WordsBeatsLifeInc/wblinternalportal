<?php include 'header.php';?>	

<form name="AdminDash" method=post action="AdminDash.php">
	<div class="row">	
		<div class="col-sm-3 admin-dash">
			<form action="CreateCourse.php">
				<input type="submit" class="btn btn-lg btn-sidebar" value="Create Course">
			</form>
			<form action="CreateEvent.php">
				<input type="submit" class="btn btn-lg btn-sidebar" value="Create Event">
			</form>		             
		<Label ID="DisplayInfo" runat="server" Text="" Visible="false"></Label>
			<button type="submit" id="viewStudentsButton" class="btn btn-lg btn-sidebar" value="submit" name="viewStudentsButton"/>View Students</button>
			<button type="submit" id="viewEmployeesButton" class="btn btn-lg btn-sidebar" value="submit" name="viewEmployeesButton"/>View Employees</button>
			<button type="submit" id="viewCourseButton" class="btn btn-lg btn-sidebar" value="submit" name="viewCourseButton"/>View Courses</button>
			<button type="submit" id="elementApprovalQueue" class="btn btn-lg btn-sidebar" value="submit" name="elementApprovalQueue"/>Element Approval Queue</button>
			<button type="submit" id="userApprovalQueue" class="btn btn-lg btn-sidebar" value="submit" name="userApprovalQueue"/>User Approval Queue</button>
			<form action="exportToExcel.php">
			<button type="submit" id="exportDataButton" class="btn btn-lg btn-sidebar" value="submit" name="exportDataButton"/>Export Users To Excel</button>
			</form> 
		</div><!--end col sm 3-->
			
		<div class="col-sm-9" style="float: right;">
			<div class="admingrids">
					<?php
				if ( isset( $_POST['viewStudentsButton'] ) ) 
				{
				
				$query="SELECT CONCAT(firstName, ' ', lastName) AS Name, email FROM User WHERE userType = 'student';";
				
				$server="localhost";
				$user="root";
				$password="root";
				$database="wbl_v10";

				$con = mysql_connect($server, $user, $password);
					if (!empty($con)) 
					  {
						if (mysql_select_db($database,$con)) 
						{
						  $resultset = mysql_query($query,$con);
						  if ($resultset==true) 
						  {
							$output_string = '<table id="displaytable" class="table table-striped" style="overflow-x:auto;">';
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

							  $output_string .= '<tr>';

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


				// close connection 
				mysql_close($con);
				//echo $output_string;
				}

			?>
							
			<?php
				if ( isset( $_POST['viewEmployeesButton'] ) ) 
				{
				
				$query="SELECT CONCAT(firstName, ' ', lastName) AS Name, email FROM User WHERE userType = 'instructor';";
				$server="localhost";
				$user="root";
				$password="root";
				$database="wbl_v10";

				$con = mysql_connect($server, $user, $password);
				
				
				if (!empty($con)) 

					  {

						if (mysql_select_db($database,$con)) 

						{

						  $resultset = mysql_query($query,$con);

						  if ($resultset==true) 

						  {

							$output_string = '<table id="displaytable" class="table table-striped" style="overflow-x:auto;">';

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

							  $output_string .= '<tr>';

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


				// close connection 
				mysql_close($con);
				}

							?>

				<?php
				if ( isset( $_POST['viewCourseButton'] ) ) 
				{
				
				$query="SELECT * FROM Course;";
				$server="localhost";
				$user="root";
				$password="root";
				$database="wbl_v10";

				$con = mysql_connect($server, $user, $password);
				
				
				if (!empty($con)) 

					  {

						if (mysql_select_db($database,$con)) 

						{

						  $resultset = mysql_query($query,$con);

						  if ($resultset==true) 

						  {

							$output_string = '<table id="displaytable" class="table table-striped" style="overflow-x:auto;">';

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

							  $output_string .= '<tr>';

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
				

				// close connection 
				mysql_close($con);
				}

							?>
							<script type="text/javascript">
							function approveCourse(obj){
								var par=obj.parentNode;
								while(par.nodeName.toLowerCase()!='tr') {
									par=par.parentNode;
								}
								var approveRowIndex = par.rowIndex;
								alert(par.rowIndex);
							}
							function denyCourse(obj){
								var par=obj.parentNode;
								while(par.nodeName.toLowerCase()!='tr') {
									par=par.parentNode;
								}
								//alert(par.rowIndex);
								var denyRowIndex = par.rowIndex;
							}
							</script>
							
					
					
					
			</div><!--end admin grids-->
		</form>
			


			 
			 
		<?php
				//user  approval
				$con = mysql_connect ("localhost", "root", "root");
				
				if (!con){
					die("cannot connect: " . mysql_error());
				}
				mysql_select_db("wbl_v10", $con);
				
			
				if ( isset( $_POST['Delete'] ) ){
				$DeleteQuery = "DELETE FROM User WHERE email = '$_POST[hidden]'";
				mysql_query($DeleteQuery, $con);
				};
			
				if ( isset( $_POST['Approved'] ) ){
					$UpdateQuery = "UPDATE User SET SignUpStatus = 'Approved' WHERE email = '$_POST[hidden]'";
					mysql_query($UpdateQuery, $con);
				};
			
				if ( isset( $_POST['userApprovalQueue'] ) ) {
				$sql= "select email,userType,firstName,age,SignUpStatus from User where SignUpStatus = 'Pending';";
				$myData = mysql_query($sql, $con);
				echo "<table class ='table table-striped' style='overflow-x:auto;'>
				<tr>
				<th>Email</th>
				<th>User Type</th>
				<th>First Name</th>
				<th>Age</th>
				<th>Sign Up Status</th>
				</tr>";
			
		while($record = mysql_fetch_array($myData)) {
			echo "<form action=AdminDash.php method=post>";
			echo "<tr>";
			echo "<td>" . "<input type=text readonly name=email value=". $record['email'] . " </td>";
			echo "<td>" . "<input type=text readonly name=userType value=". $record['userType'] . " </td>";
			echo "<td>" . "<input type=text readonly name=firstName value=". $record['firstName'] . " </td>";
			echo "<td>" . "<input type=text readonly name=age value=". $record['age'] . " </td>";
			echo "<td>" . "<input type=text readonly name=SignUpStatus value=". $record['SignUpStatus'] . " </td>";
			echo "<td>" . "<input type=hidden name=hidden value=". $record['email'] . " </td>";
			echo "<td>" . "<input class='btn btn-lg btn-approve' type=submit name=Approved value=Approve" . " </td>";
			echo "<td>" . "<input class='btn btn-lg btn-approve' type=submit name=Delete value=Delete" . " </td>";
			echo "</tr>";
			echo "</form>";
			
		}
			
		echo "</table>";
		
		mysql_close($con);
				}
			?>


		<?php
				//element approval		
				$con = mysql_connect ("localhost", "root", "root");
				
				if (!con){
					die("cannot connect: " . mysql_error());
				}
				mysql_select_db("wbl_v10", $con);
				
			
				if ( isset( $_POST['DeleteElementRequest'] ) ){
				$DeleteQuery = "DELETE FROM Student_Element WHERE studentID = '$_POST[hiddenElement]'";
				mysql_query($DeleteQuery, $con);
				};
			
				if ( isset( $_POST['ApprovedElementRequest'] ) ){
					$UpdateQuery = "UPDATE Student_Element SET elementStatus = 1 WHERE studentID = '$_POST[hiddenElement]'";
					mysql_query($UpdateQuery, $con);
				};
			
				if ( isset( $_POST['elementApprovalQueue'] ) ) {
				$sql= "SELECT * FROM STUDENT_ELEMENT WHERE elementStatus = 0;";
				$myData = mysql_query($sql, $con);
				echo "<table class ='table table-striped' style='overflow-x:auto;'>
				<tr>
				<th>studentID</th>
				<th>elementID</th>
				<th>elementStatus</th>
				</tr>";
				



			
		while($record = mysql_fetch_array($myData)) {
			echo "<form action=AdminDash.php method=post>";
			echo "<tr>";
			echo "<td>" . "<input type=text readonly name=email value=". $record['studentID'] . " </td>";
			echo "<td>" . "<input type=text readonly name=userType value=". $record['elementID'] . " </td>";
			echo "<td>" . "<input type=text readonly name=firstName value=". $record['elementStatus'] . " </td>";
			echo "<td>" . "<input type=hidden name=hiddenElement value=". $record['studentID'] . " </td>";
			echo "<td>" . "<input class='btn btn-lg btn-approve' type=submit name=ApprovedElementRequest value=Approve" . " </td>";
			echo "<td>" . "<input class='btn btn-lg btn-approve' type=submit name=DeleteElementRequest value=Delete" . " </td>";
			echo "</tr>";
			echo "</form>";
			
		}
			
		echo "</table>";
		
		mysql_close($con);
				}
			?>

		</div><!--end sidebar col sm 9-->
	</div><!--end row-->
	
 <?php include 'footer.php';?>
 