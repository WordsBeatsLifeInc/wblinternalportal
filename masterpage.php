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

        <title>*NAME*'s Dashboard</title>

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

	<div class="navbar-brand"><a class="navbar-brand" href=""><img src="images/logo.png" class="img-responsive"></a></div>

	<!-- top top navbar that is sticky -->

		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div id="navbar" class="navbar-collapse collapse">         
 
			  <ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  Hi, *NAME*<span class="caret"></span></a>
	  
				  <ul class="dropdown-menu">
					<li id="status" runat="server"><a href="">Dashboard</a></li>
					<!--<li><a href="#">Portfolio</a></li>-->

					<li role="separator" class="divider"></li>
					<li class="dropdown-header">Messages</li>
					<li><a href="#">Inbox</a></li>
					<li><a href="#">Sent</a></li>
					<li><a href="#">Drafts</a></li>
					<li><a href="#">Trash</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="">Log Out</a></li>
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
				  <li class="active"><a href="">Home</a></li>
				  <li><a href="">Student Portfolios</a></li>
				  <li><a href="">Instructors</a></li>
				  <li><a href="">Forum</a></li>
				  <li><a href="">Events</a></li>
				  <li><a href="">Our Community</a></li>
				  <li><a href="">Donate</a></li>
				</ul>
			  </div>

			  </div><!--end row-->
		  </div><!--end container-->
		</nav><!--end navbar navbar-default navbar-static-top-->

	<!--end top navbar that is static-->


	<!-- body content -->

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-9 main-body">
			

			</div><!--end main-body col-sm-9-->

			<div class="col-sm-3 sidebar">



			</div><!--end sidebar col-sm-3-->
		</div><!--end row-->
	</div><!--end container-fluid-->

	<!--end body content-->



	<!-- footer -->

	<footer class="footer navbar-fixed-bottom">
	  <div class="container col-sm-12">
		<p class="text-muted" style="color: #FFFFFF;">© Words Beats & Life Inc. | All Rights Reserved 2016</p>

	  </div>
	</footer>

	<!--end footer-->



		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
		<script src="js/bootstrap.min.js"></script>
		<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
		<script src="js/vendor/holder.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
