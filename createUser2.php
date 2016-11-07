<?php
session_start();
$_SESSION['user'] = $_POST['email'];
?>



<!--HEADER INFORMATION-->
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


				$user_session = $_SESSION['user'];

						 $conn = mysqli_connect('localhost', 'root', 'root');
							mysqli_select_db($conn, 'wbl_v10');
							//drop down list from database

							if(!$conn)
							 {
								//die("Connection failed: " . mysqli_connect_error);
								//echo "connection failed";
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

				 ?></span></a>

					<ul class="dropdown-menu">




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

				  <li><a href="Login.php">Sign-In</a></li>
				</ul>
			  </div>

			  </div><!--end row-->
		  </div><!--end container-->
		</nav><!--end navbar navbar-default navbar-static-top-->

	<!--end top navbar that is static-->


	<!-- body content -->

	<div class="container-fluid">
		<div class="row">
<!--END HEADER INFORMATION-->



 <script type="text/javascript">
	window.onload=function()
	{
		document.getElementById("Next").style.display ='none';
	}
	function showButton(){
		if(document.getElementById("userType").value == 'student'){
			document.getElementById("Next").style.display='block';
			document.getElementById("Create").style.display='none';
		}
		else{
			document.getElementById("Next").style.display='none';
			document.getElementById("Create").style.display='block';
		}

	}

 </script>

<div class="col-sm-2">
</div><!--end col sm 3-->

<div class="col-sm-9">
	<form name="CreateUser"  method="post">


	<?php
	//$conn = mysqli_connect('localhost','root','root');
  $conn = mysqli_connect('localhost','root','root');
	 mysqli_select_db($conn, 'wbl_v10');
	 if(!$conn)
	 {
		die("Connection failed: " . mysqli_connect_error);
		echo "connection failed";
	}
	else {
	//echo "connection successful";
	}
 $Time = strtotime($_POST['dateOfBirth']);
 $newformat= date('Y-m-d', $Time);
 $dateOfBirth = $newformat;
 $age = (int)$_POST["age"];
 $pwd=md5($_POST["password"]);
 $zip = (int)$_POST["zipcode"];
 ini_set('display_errors',1);
 //echo $Time, $newformat, $dateOfBirth;
 if(isset ($_POST["submit1"]))
 {
	 $conn = mysqli_connect('localhost','root','root');
	 mysqli_select_db($conn, 'wbl_v10');

	$sql="insert into wbl_v10.user (email, userType, firstName, lastName,cellPhone, homePhone,dateOfBirth, age, genderIdentification, homeAddress,
			city, stateAbbreviation, zipCode, password, passwordHash, passwordSalt, SignUpStatus)
		values('".$_SESSION['user']."','$_POST[userType]','$_POST[firstName]','$_POST[lastName]','$_POST[cellPhone]','$_POST[homePhone]','".$dateOfBirth."',".$age.",'$_POST[genderIdentification]','$_POST[homeAddress]','$_POST[city]','$_POST[stateAbbreviation]',".$zip.",'".$pwd."',NULL,NULL,'pending')";
	mysqli_query($conn, $sql);
	//echo $sql;
 }
 if(isset ($_POST["Next"]))
 {
	 $conn = mysqli_connect('localhost','root','root');
	 mysqli_select_db($conn, 'wbl_v10');
	 $sql="insert into wbl_v10.user (email, userType, firstName, lastName,cellPhone, homePhone,dateOfBirth, age, genderIdentification, homeAddress,
				city, stateAbbreviation, zipCode, password, passwordHash, passwordSalt, SignUpStatus)
			values('".$_SESSION['user']."','$_POST[userType]','$_POST[firstName]','$_POST[lastName]','$_POST[cellPhone]','$_POST[homePhone]','".$dateOfBirth."',".$age.",'$_POST[genderIdentification]','$_POST[homeAddress]','$_POST[city]','$_POST[stateAbbreviation]',".$zip.",'".$pwd."',NULL,NULL,'pending')";
		mysqli_query($conn, $sql);

		header("Location: StudentSignUp.php");
 }

 ?>
	 <div class="row eval-element">
		<div class="col-sm-3">
			<h1>Email Address:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="email">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Choose User Type:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<select class="form-control" name="userType" id="userType" onchange="showButton();">
			<option></option>
			<option value="admin">Administrator</option>
			<option value="cipher">Cipher</option>
			<option value="parent">Parent</option>
			<option value="student">Student</option>
			<option value="teacher">Teacher</option>
			</select>
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>First Name:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="firstName">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Last Name:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="lastName">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Cell Phone Number:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="cellPhone">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Home Phone Number:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="homePhone">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Birthday:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="dateOfBirth">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Age:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="age">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Gender Identification:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<select class="form-control" name="genderIdentification">
			<option></option>
			<option value="Boy/Young Man">Boy/Young Man</option>
			<option value="Girl/Young Woman">Girl/Young Woman</option>
			<option value="Genderqueer">Genderqueer</option>
			<option value="Trans/Transgender">Trans/Transgender</option>
			<option value="Other">Other</option>
			</select>
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Home Street Address:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="homeAddress">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>City:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="city">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>State:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<select class="form-control"name="stateAbbreviation">
				<option value="AL">AL</option>
				<option value="AK">AK</option>
				<option value="AZ">AZ</option>
				<option value="AR">AR</option>
				<option value="CA">CA</option>
				<option value="CO">CO</option>
				<option value="CT">CT</option>
				<option value="DE">DE</option>
				<option value="DC">DC</option>
				<option value="FL">FL</option>
				<option value="GA">GA</option>
				<option value="HI">HI</option>
				<option value="ID">ID</option>
				<option value="IL">IL</option>
				<option value="IN">IN</option>
				<option value="IA">IA</option>
				<option value="KS">KS</option>
				<option value="KY">KY</option>
				<option value="LA">LA</option>
				<option value="ME">ME</option>
				<option value="MD">MD</option>
				<option value="MA">MA</option>
				<option value="MI">MI</option>
				<option value="MN">MN</option>
				<option value="MS">MS</option>
				<option value="MO">MO</option>
				<option value="MT">MT</option>
				<option value="NE">NE</option>
				<option value="NV">NV</option>
				<option value="NH">NH</option>
				<option value="NJ">NJ</option>
				<option value="NM">NM</option>
				<option value="NY">NY</option>
				<option value="NC">NC</option>
				<option value="ND">ND</option>
				<option value="OH">OH</option>
				<option value="OK">OK</option>
				<option value="OR">OR</option>
				<option value="PA">PA</option>
				<option value="RI">RI</option>
				<option value="SC">SC</option>
				<option value="SD">SD</option>
				<option value="TN">TN</option>
				<option value="TX">TX</option>
				<option value="UT">UT</option>
				<option value="VT">VT</option>
				<option value="VA">VA</option>
				<option value="WA">WA</option>
				<option value="WV">WV</option>
				<option value="WI">WI</option>
				<option value="WY">WY</option>
			</select>
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Zip Code:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="zipcode">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->

	<div class="row eval-element">
		<div class="col-sm-3">
			<h1>Password:</h1>
		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="form-control" type="text" name="password">
		</div><!--end col sm 9-->
	</div><!--end row eval element-->


	<div class="row eval-element">
		<div class="col-sm-3">

		</div><!--end col sm 3-->
		<div class="col-sm-9">
			<input class="btn btn-lg btn-admin form-control" type="submit" name="submit1" value="Create" id="Create"/>
			<input class="btn btn-lg btn-admin form-control" type="submit" name="Next" value="Next" id="Next" style="margin-bottom: 4em;"/>
		</div><!--end col sm 9-->
	</div><!--end row eval element-->


</div><!--end col sm 6-->

<div class="col-sm-1">
</div>


 </form>
 </div><!--end col sm 12-->
 <?php include 'footer.php';?>
