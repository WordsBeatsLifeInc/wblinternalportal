<?php include 'header.php';
session_start();
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];
?>		
		
		<div class="col-sm-9 main-body">
			
				<!-- carosel for event highlights -->	    
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- wrapper for slides -->
				  <div class="carousel-inner" role="listbox">	        
					<div class="item active">
					  <img src="images/highlights-1.png" alt="...">
					</div><!--end item-->
					<div class="item">
					  <img src="images/highlights-2.png" alt="...">
					</div><!--end item-->
					<div class="item">
					  <img src="images/highlights-3.png" alt="...">
					</div><!--end item-->
				  </div>
				  <!-- controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			<!-- end carosel for event highlights -->

			<!-- call to action buttons -->
				<div class="row">
					<div class="container-fluid call-to-action">
						<a href="StudentPortfolios.php"><img src="images/see-the-work-we-do.png" class="call-to-action img-responsive col-sm-4"></a>
						<a href="InstructorPortfolios.php"><img src="images/meet-our-instructors.png" class="call-to-action img-responsive col-sm-4"></a>
						<a href="Donate.php"><img src="images/support-our-cause.png" class="call-to-action img-responsive col-sm-4"></a>
					</div><!--end container-fluid call-to-action-->
				</div><!--end row-->
			<!-- end call to action buttons -->  
		</div><!--end main-body col-sm-9-->

		<div class="col-sm-3 sidebar">
						<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
					<div class="container">
					  <div class="row">
							<div class="card hovercard">
								<div class="cardheader">
									</div>

									<div class="avatar">
										<img alt="" src="images/antonio.png">
									</div>

									<div class="info">
										<div class="title">
											<a target="" href="StudentPortfolios.php">Antonio</a>
										</div>
										<div class="desc"><b>Student Spotlight</b><p>Antonio embodies what it means to push boundaries. He is constantly striving to learn and create new techniques and patterns in his graffiti work and is known around WB&L for his smooth line work.</p></div>
											<input onclick="location.href='StudentPortfolios.php'" type="button" class="btn btn-lg btn-admin btn-spotlight" value="Visit Portfolio">
									</div>
							</div><!--end student spotlight-->


							<div class="card hovercard">
								<div class="cardheader">
								</div>

								<div class="avatar">
									<img alt="" src="images/mana.png">
								</div>

								<div class="info">
									<div class="title">
										<a target="" href="StudentPortfolios.php">Mana</a>
									</div>
									<div class="desc"><b>Instructor Spotlight</b><p>Mana empowers other female MCs artists and poets to express themselves, throught the 'Lipstic Revolt,' as well as raise awareness about various political and social issues.</p></div>
										<input onclick="location.href='StudentPortfolios.php'" type="button" class="btn btn-lg btn-admin btn-spotlight" value="Visit Portfolio">
								</div>
							</div><!--end instructor spotlight-->
						</div><!--end row-->
					</div><!--end container-->
		</div><!-- col sm 3end sidebar-->
					


 <?php include 'footer.php';?>
 