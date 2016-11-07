<?php include 'header.php';?>		
		

		
	<div class="col-sm-12 main-body">
	<h1>Evaluations</h1>
	<form name="EvalPage" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<input class="form-control btn btn-lg btn-admin" type="submit" name="rdSelf" value="Self Evaluation" /><br />
	<input class="form-control btn btn-lg btn-admin" type="submit" name="rdTeacherEval" value="Teacher Evaluation"/><br />
	<input class="form-control btn btn-lg btn-admin" type="submit" name="rdCourseEval" value="Course Evaluation"/><br />
	</div><!--end main-body col-sm-9-->


 

 

 <?php
 if (isset ($_POST['rdSelf'])){
	
		header("Location: /SelfEval.php");
 }
 if (isset ($_POST['rdTeacherEval'])){
	
		header("Location: /TeacherEvalByStudent.php");
 }
 if (isset ($_POST['rdCourseEval'])){
	
		header("Location: /CourseEval.php");
 }
	
	
 ?>

		
	 </form>				 
 <?php include 'footer.php';?>