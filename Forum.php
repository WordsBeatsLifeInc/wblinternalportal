<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
//$row_id = $_SESSION['hiddenForumID']
//$_SESSION['hiddenForumID'] = $_GET['hiddenForumID'];
$_SESSION['forumIDNumber'] = $_POST['forumID'];


?>		

  
		
<div class="col-sm-12 main-body">	
	<div class="row">
		<img src="images/banner_studentdash.png" alt="Welcome to the Forum!" class="img-responsive" style="margin-bottom: 1.5em;">
		<h1 style="margin-bottom: .5em;">Welcome to the Forum!</h1>
			  <p style="margin-bottom: 1em;">Have questions, comments, or concerns?  This is the place to discuss them! Check to see if your question has already been asked/answered, and if not, go ahead and post a new thread to the community.</p>
		
	</div><!--end row-->
	<form method="post" action="forum.php" >
<!--CHOOSE AN ELEMENT-->	
	<div class="row eval-element">
		<h1>Choose an Element:</h1>
		<select name="dropdown" id="dropdown" class="form-control">
			<!--<option value="0">--Select Element--</option>-->
			<option value="1">DJ</option>
			<option value="2">MC</option>
			<option value="3">Graffitti</option>
			<option value="4">B-Boy</option>
		</select>
		</div><!--end eval element-->
		
		
<!--END CHOOSE AN ELEMENT-->
		
<!--ASK A QUESTION-->


		<div class="row eval-element">
			<h1>Ask a question:</h1>
			
			<input type="text" name="questionTextBox" class="form-control">
			<input type="submit" value = "Post New Thread" name="submitThread" class="btn btn-lg btn-admin">

			<?php
			
		
			
			
			if(isset ($_POST['submitThread']))
			 { 
				
			
				 //datetime
				 date_default_timezone_set('America/New_York');
				 $date = date('y-m-d h:i:s', time());
				 
				 $conn = mysqli_connect('localhost','root','root');
				 mysqli_select_db($conn, 'wbl_v10');
				 
				$option = $_POST['dropdown'];
				
				$sql="INSERT INTO `wbl_v10`.`forum` (`email`, `datePosted`, `titleID`, `question`) VALUES ('$_SESSION[user]', '".$date."', '".$option."', '".$_POST[questionTextBox]."')";

				mysqli_query($conn, $sql);
				//echo $sql;
			 }
			 
			 if ( isset( $_POST['hiddenForumID'] ) ){
				$row_id = $_POST['hiddenForumID'];
				//echo '<script type="text/javascript">alert("' . $row_id . '")</script>';
				echo '<script>window.location="/ForumThread.php"</script>';
			}; 

			?>
			</form>
		</div><!--end eval element-->
<!--END ASK A QUESTION-->

<!--FORUM SPACE-->
	<div class="row">
		<?php
		$con = mysqli_connect ("localhost", "root", "root");

		$sql= "SELECT * FROM wbl_v10.forum order by datePosted asc;";
		$myData = mysqli_query($con, $sql);
		echo "<table class ='table table-striped'>
		<tr>
		<th>Forum ID</th>
		<th>Email</th>
		<th>Date Posted</th>
		<th>Element ID</th>
		<th>Question</th>
		</tr>";
		//call the method hiddenforumid and set session variable, then redirect to forumthread
		while($record = mysqli_fetch_array($myData)) {
			echo "<form action=Forum.php method=post>";
			echo "<tr>";
			echo "<td>" . "<input type=text readonly id=forumID name=forumID value=". $record['forumID'] . " </td>";
			echo "<td>" . "<input type=text readonly name=email value=". $record['email'] . " </td>";
			echo '<td> <input type=text readonly name=datePosted value="'. $record['datePosted'] . '"/> </td>';
			echo "<td>" . "<input type=text readonly name=titleID value=". $record['titleID'] . " </td>";
			echo '<td> <input type=text readonly name=question value="'. $record['question'] . '"/> </td>';
			echo "<td>" . "<input type=hidden name=hiddenForumID value=". $record['forumID'] . " </td>";
			echo "<td>" . "<input class='btn btn-lg btn-admin' type=submit name=Select value=Select" . " </td>";
			echo "</tr>";
			echo "</form>";
			
		}
			
		echo "</table>";
		
		mysqli_close($con);
		
		?>
	</div><!--end row-->
<!--END FORUM SPACE-->
		
</div><!--end main-body col-sm-12-->

		
					 
 <?php include 'footer.php';?>
 