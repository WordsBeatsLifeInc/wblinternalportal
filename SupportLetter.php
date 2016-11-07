<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];
?>		
		
<form method="post" action="SupportLetter.php">
		
<div class="col-sm-12 main-body">
				
<h1>Write a Support Letter</h1>
<p>Tell us how Words, Beats & Life has made a difference in your child's life!</p>
<select class="form-control eval-element" id="StudentSelect" onchange="studentselect(this.value)" name="StudentSelect">
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

	<textarea class="form-control" id="letterbox" name="letterbox" rows="20" cols="75" placeholder="Write your support letter here"></textarea>

	<form action="ParentDash.php" method="post">
		<input type="button" id="bbself" class="btn btn-lg btn-sidebar" value="Back" name="bbself" onclick="location.href='ParentDash.php'"/>
	</form>

	<input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-lg btn-sidebar">



<?php
	if (isset($_POST['btnSubmit']))
	{
    	$studentID = $_POST['StudentSelect'];
    	$textbox = $_POST['letterbox'];
    	$parentID = $_SESSION['user'];
    	$d = getdate(date("U"));
    	$year = $d[year];
    	$month = $d[mon];
    	$day = $d[mday];
    	$datestring = $year. "-" .$month. "-" .$day;
    	if ($studentID == "") {
    		echo "Please select a student first<br>";
    	}
    	else if ($textbox == "") {
    		echo "Please write a letter first<br>";
    	}
    	else 
    	{
    		$query="select * from support_letter where dateWritten = '".$datestring."' and studentID = '".$studentID."' and parentID = '".$parentID."';"; 
			
			$con1 = mysqli_connect('localhost', 'root', 'root');
			mysqli_select_db($con1, 'wbl_v10');

			$resultset = mysqli_query($con1, $query);

			if (mysqli_num_rows($resultset)>0) 
			{
				echo "Already submitted letter for this student today!";
				mysqli_close($con1);
			}
			else 
			{
				$query2="Insert into support_letter (dateWritten, studentID, parentID, letterOfSupport) values ('".$datestring."','".$studentID."', '".$parentID."', '".$textbox."');";      
				$resultset2 = mysqli_query($con1, $query2);
				if ($resultset2 == true) {
					echo "Submitted support letter successfully";
				}
				else {
					echo "<br>Error submitting support letter";
					echo mysqli_error();
				}	
			}
	
			mysqli_close($con1);
    	}
    }


?>

</div><!--end main-body col-sm-12-->



	
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
		
	 </form>	

		
					 
 <?php include 'footer.php';?>
 