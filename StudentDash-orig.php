<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
					$bucks = $_SESSION['bucks'];

?>		
		

		
	<div class="col-sm-9 main-body">
				
	<h1>Student Dashboard</h1>
	
	</div><!--end main-body col-sm-9-->

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
								
			$query = "SELECT * FROM wbl_v10.Student WHERE email = '".$user_session."'";

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
	</div><!--end sidebar col-sm-3-->
		
					 
 <?php include 'footer.php';?>
 