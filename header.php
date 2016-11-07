<?php
session_start();
$user_session = $_SESSION['user'];
$userType_session = $_SESSION['userType'];
$firstName_session = $_SESSION['firstName'];
$userAppStatus_session = $_SESSION['appStatus'];

?>	

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">

        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="images/favicon.ico">

        <title><?php echo $firstName_session ?> | Words Beats & Life</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="/js/ie-emulation-modes-warning.js"></script>

        <!-- Navbar styles for this template -->
        <link href="navbar.css" rel="stylesheet">

        <!--font awesome icons-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <!-- Footer styles for this template -->
        <link href="css/sticky-footer.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/custom.css" rel="stylesheet" type="text/css" media="screen">

        <!--Fonts-->
        <!-- Open Sans Font -->
        <link href='assets/font/open-sans/OpenSans.css' rel='stylesheet' type='text/css'>

        <!-- Anton Font -->
        <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>

        <!-- Font Awesome Icons -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


</head>
<body> 

	<!-- SCM Music Player API http://scmplayer.net -->
	<!--<script type="text/javascript" src="http://scmplayer.net/script.js" 
	data-config="{'skin':'skins/black/skin.css','volume':50,'autoplay':true,'shuffle':true,'repeat':1,'placement':'top','showplaylist':false,'playlist':[{'title':'Power Trip (Clean) - J. Cole','url':'https://www.youtube.com/watch?v=4d_Ynp5CuBU'},{'title':'Workout (Clean) - J. Cole','url':'https://www.youtube.com/watch?v=MkCwaljHc70'},{'title':'Under Pressure (Clean) - Logic','url':'https://www.youtube.com/watch?v=z1lujic3v10'}]}" ></script>-->
	<!-- SCM Music Player API script end --> 

	<div class="navbar-brand"><a class="navbar-brand" href=""><img src="images/logo.png" class="img-responsive"></a></div>

	<!-- top top navbar that is sticky -->

		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div id="navbar" class="navbar-collapse collapse">         
 
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				 <?php 
				 session_start();
				
				$user_session = $_SESSION['user'];
				
						 $conn = mysqli_connect('localhost', 'root', 'root');
							mysqli_select_db($conn, 'wbl_v10');
							//drop down list from database
				
							if(!$conn)
							 {
								die("Connection failed: " . mysqli_connect_error);
								echo "connection failed";
							}
						
							$sql = "Select u.firstName, u.SignUpStatus from wbl_v10.user u where u.email = '".$user_session."'";
							$result = mysqli_query($conn, $sql);
								
							if ($result ->num_rows >0)
							{
								while($row = $result->fetch_assoc())
								{
									echo "Hi, ".$row['firstName']." ";
								}
							}

				 ?><span class="caret"></span></a>

					<ul class="dropdown-menu">

				 <?php 
				 if ($userAppStatus_session == 'Approved')
				 {
					$statusCheck = true;
					$directory = $userType_session."dash.php";
					   //echo '<script type="text/javascript">alert("' . $directory . '")</script>';

					$output_string = '<li id="status" type="submit" name="dropdown"><a href="'.$directory.'">Dashboard</a></li>';
					
                    echo $output_string;
				 }
				 else{
					 $statusCheck = false;
				 }	 	
				 ?>
					

						<li role="separator" class="divider"></li>
						<li class="dropdown-header">Messages</li>
						<li><a href="">Inbox</a></li>
						<li><a href="">Sent</a></li>
						<li><a href="">Drafts</a></li>
						<li><a href="">Trash</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="Login.php">Log Out</a></li>
					</ul><!--end dropdown menu-->

				</li><!--end dropdown-->
			  </ul><!--end nav navbar-nav-->
	
			</div><!--end nav-collapse -->
		  </div><!--end container-->
		</nav><!--end navbar navbar-default navbar-fixed-top-->
	<!--end top top navbar that is sticky-->


	<!--bottom top navbar that is static -->

		<nav class="navbar navbar-inverse navbar-static-top">
		  <div class="container-fluid">
			<div class="row">

			  <div class="navbar-collapse collapse col-sm-12">  
				<ul class="nav navbar-nav">
				<li class="active"><a href="masterdash.php">Home</a></li>
				  <li><a href="StudentPortfolios.php">Student Portfolios</a></li>
				  <li><a href="InstructorPortfolios.php">Instructors</a></li>
				  <li><a href="Forum.php">Forum</a></li>
				  <li><a href="Events.php">Events</a></li>
				  <li><a href="OurCommunity.php">Our Community</a></li>
				  <li><a href="Donate.php">Donate</a></li>
				</ul>
			  </div>

			  </div><!--end row-->
		  </div><!--end container-->
		</nav><!--end navbar navbar-default navbar-static-top-->

	<!--end top navbar that is static-->


	<!-- body content -->

	<div class="container-fluid">
		<div class="row">
		
		