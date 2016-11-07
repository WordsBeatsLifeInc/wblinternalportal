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
<form method="post" action="addChild.php" >
<select class="form-control" id="StudentSelect" onchange="studentselect(this.value)" name="StudentSelect">
	<option value="">-- Please select a student --</option>
	<?php

		$sql = "select email as email, firstName as firstName, lastName as lastName from user where userType='student'";
		$con1 = mysqli_connect('localhost', 'root', 'root');
		mysqli_select_db($con1, 'wbl_v10');

		$result = mysqli_query($con1, $sql);
	    while ($row = mysqli_fetch_array($result))
	    {
	    	echo "<option value='".$row['email']."'>".$row['firstName'].$row['lastName']."</option>";
	    }

	?>
	</select>
<br>

		<h1>Relationship:</h1>
		<select name="dropdown" id="dropdown" class="form-control">
			<!--<option value="0">--Select Element--</option>-->
			<option value="">-- Please select a relationship --</option>
			<option value="Father">Father</option>
			<option value="Mother">Mother</option>
			<option value="Guardian">Guardian</option>
			<option value="Other">Other</option>
		</select>
	
	

			<button type="submit" id="addChild" class="btn btn-lg btn-sidebar" value="Add Your Child" name="addChild"/>Add Your Child</button>
			
			<?php
			
			
			

			
			
			if(isset ($_POST['addChild']))
			 {

			$student = $_POST['StudentSelect'];

			$relationship = $_POST['dropdown'];	
			
			
			
			
			
			echo '<script language="javascript">';
			echo 'alert("'.$relationship.'")';
			echo '</script>';
			
			
				
			
				 //datetime
				 date_default_timezone_set('America/New_York');
				 $date = date('y-m-d h:i:s', time());
				 
				 $conn = mysqli_connect('localhost','root','root');
				 mysqli_select_db($conn, 'wbl_v10');
				 
				$option = $_POST['dropdown'];
				
				$sql="INSERT INTO wbl_v10.relationship VALUES ('".$student."', '".$user_session."', '".$relationship."')";
				
				//$sql="INSERT INTO wbl_v10.relationship VALUES ('student@gmail.com', 'parent@gmail.com', 'mother')";
				mysqli_query($conn, $sql);
				//echo $sql;
			 }
			 

		
		mysqli_close($con);
		
		?>
	
			
</form>

	
	</div><!--end main-body col-sm-9-->








	


					 

 <?php include 'footer.php';?>
					 