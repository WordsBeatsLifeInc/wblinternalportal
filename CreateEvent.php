<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">

</head>

<?php include 'header.php';
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];

?>	

		

	<div class="col-sm-9 main-body">
	<form name="AdminDash" method=post action="CreateEvent.php">
	    <h1>Create An Event</h1>
	
	 	<label for="startDateLabel">Event Title:</label>
		<input class="form-control" type="text" name="eventTitle"></br>
		
		<label for="startDateLabel">Event Date:</label>
		<input class="form-control" type="text" name="eventDate"></br>
	   
		<label for="endDateLabel">Event Description:</label>
		<input class="form-control" type="text" name="eventDescription"></br>

		
		<form name="createEventButtonForm" method=post action="CreateEvent.php">
			<button type="submit" id="createEventButton" class="btn btn-lg btn-admin" value="submit" name="createEventButton"/>Create Event</button>
		</form>
		
		<form name="backButtonCreateEvent" method=post action="AdminDash.php">
			<button type="submit" id="backButton" class="btn btn-lg btn-admin" value="submit" name="backButton"/>Back</button>
		</form>			
					
	</div>
	
	<!--Display Div-->
	<div id="display">
	<?php
		//insert courses
		if ( isset( $_POST['createEventButton'] ) ) 
		{
		
		$servername =  "localhost";
		$username = "root";
		$password = "root";
		$database = "wbl_v10";

		$conn = new mysqli($servername,$username,$password, $database);
			
		//Create Connection
		if ($conn->connect_error) {
		die("Connection failed: ".$conn->connect_earror);
		} 
		{
		echo "Connected Succesfully, ";
		}

		$sql = "insert into event (eventTitle, eventDescription, eventDateTime, email) values (
		'$_POST[eventTitle]',
		'$_POST[eventDescription]',
		$_POST[eventDate],
		'".$user_session."')";
		
				

		//Display Success or Error Message
		if (mysqli_multi_query($conn, $sql)) {
		echo "Emlpoyee Inserted";
		} else {
		echo "Error: Please Enter All Information Correctly";
		}
		// close connection 
		mysql_close($conn);
		}
		
		?>
				
		 </form>
        
				
	</div><!--end main-body col-sm-9-->

	<div class="col-sm-3 sidebar">
		
                   

	</div>
		
					 
 <?php include 'footer.php';?>
 