<?php include 'header.php';?>		


<?php
    session_start();
	$user_session = $_SESSION['user'];
?>
  
		
	<div class="col-sm-9 main-body">

<h1>Reply to the Question:</h1>
<form method="post" action="" >
<input type="text" name = "replyTextBox">
<input style="width: 6em;" class="form-control btn btn-lg btn-approve" type="submit" value = "Reply" name="submitThread">
</form>
<?php
if(isset ($_POST["replyTextBox"]))
 { 
	//echo "<script type='text/javascript'>alert('YOU POSTED');</script>";

	 $pwd=($_POST["select"]);

	 //datetime
	 date_default_timezone_set('America/New_York');
	 $date = date('y-m-d h:i:s', time());
	 
	 $conn = mysqli_connect('localhost','root','root');
	 mysqli_select_db($conn, 'wbl_v10');
	 
	//$sql="INSERT INTO wbl_v10.forumthread ('forumid', 'answer', 'email', 'datetime') VALUES ('$_SESSION['hiddenForumID']', '$_POST[replyTextBox]', 'mj1@student.com', '$date')";
 $sql= "insert forumthread (forumID, answer, email, dateTime) values (".$_SESSION['forumIDNumber'].", '$_POST[replyTextBox]', '$_SESSION[user]', '$date')";

	mysqli_query($conn, $sql);
	//echo $sql;
 }
?>

<p>

		<?php
		$con = mysqli_connect ("localhost", "root", "root");

	     $sql= "SELECT * FROM wbl_v10.forumthread where FORUMID = '".$_SESSION['forumIDNumber']."' ORDER BY datetime desc";

		$myData = mysqli_query($con, $sql);
		echo "<table class ='table table-striped'>
		<tr>
		<th>Thread ID</th>
		<th>Forum ID</th>
		<th>Reply</th>
		<th>Email</th>
		<th>Date</th>
		</tr>";
		//call the method hiddenforumid and set session variable, then redirect to forumthread
		while($record = mysqli_fetch_array($myData)) {
			echo "<form action=Forum.php  method=post>";
			echo "<tr>";
			echo "<td>" . "<input type=text readonly name=forumID value=". $record['threadID'] . " < /td>";
			echo "<td>" . "<input type=text readonly name=email value=". $record['forumID'] . " < /td>";
			echo '<td> <input type=text readonly name=answer value="'. $record['answer'] . '"/> </td>';
			echo "<td>" . "<input type=text readonly name=titleID value=". $record['email'] . " < /td>";
			echo '<td> <input type=text readonly name=datePosted value="'. $record['dateTime'] . '"/> </td>';
			echo "<td>" . "<input type=hidden name=hiddenForumID value=". $record['threadID'] . " < /td>";
			echo "</tr>";
			echo "</form>";
			
		}
			
		echo "</table>";
		
		mysqli_close($con);
		
		?>
		
		
</p>

<form action="Forum.php">
			<button type="submit" id="bbself" class="btn btn-lg btn-admin " value="submit" name="bbself"/>Back</button>
</form>


	</div><!--end main-body col-sm-9-->
					 
 <?php include 'footer.php';?>
 