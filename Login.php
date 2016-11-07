<?php
ob_start();
session_start();

unset($_SESSION['email']);
unset($_SESSION['user']);
unset($_SESSION['userType']);
unset($_SESSION['firstName']);
unset($_SESSION['appStatus']);

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
//checks the session to see if the user is logged in
if (isset($_POST['submit1']))
{
  $dbc = mysqli_connect('localhost', 'root', 'root');
  mysqli_select_db($dbc, 'wbl_v10');

  //grabs data from POST
  if(!$dbc){
    die("Connection failed: " . mysqli_connect_error);
    //echo "connection failed";
  }
  else {
    //echo "connection successful";
  }

  $user_username = mysqli_real_escape_string($dbc, $_POST['email']);
  $user_password = md5($_POST['password']);

    //lookup username and password in the database
    if (!empty($user_username) || !empty($user_password))
    {

      $query = "SELECT * FROM wbl_v10.user WHERE email = '".$user_username."' AND password ='".$user_password."'";

      $res = mysqli_query($dbc, $query);
      //echo $query;
      //login is ok so set the user ID and username cookies, redirect to homepage
      if(!$res){ echo "Please enter a valid username and password";}

        if(mysqli_num_rows($res)==1)
        {
            header('location: masterDash.php');
            $row = mysqli_fetch_array($res);
            setcookie('userType', $row['userType']);
            setcookie('firstName', $row['firstName']);
            setcookie('appStatus', $row['SignUpStatus']);
            //redirect after successful login


            $_SESSION['user'] = $row['email'];
            $_SESSION['userType'] = $row['userType'];
            $_SESSION['firstName'] = $row['firstName'];
            $_SESSION['appStatus'] = $row['SignUpStatus'];
            //echo mysqli_error($dbc);
            //echo "hello world";
      }
      else
      {
        //the username and password are incorrect so set error message
        $error_msg = 'Sorry, you must enter a valid username and password to log in.';
      }
    }
    else
    {
      $error_msg = 'Please enter a username and password to log in.';
      echo $error_msg;
      echo mysqli_error($dbc);
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Create User</title>

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
    <link href="css/navbar.css" rel="stylesheet">

    <!-- Footer styles for this template -->
    <link href="css/sticky-footer.css" rel="stylesheet">

    <!--custom login CSS-->
    <link href="css/login.css" rel="stylesheet" type="text/cs" media="screen">

    <!-- Custom CSS -->
    <link href="css/custom.css" rel="stylesheet" type="text/css" media="screen">

	<!-- Anton Font -->
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>



    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,800italic,800,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>

  <div class="container-fluid" id="bg">
    <div class="row">
      <div class="col-xs-6 login-logo">
        <img src="images/logo.png" class="img-responsive">
      </div>
      <div class="col-xs-6 login-form">

          <form class="form-signin" name="login" method="post">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address..." required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password..." required>
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me" id="remember-me"> remember me for next time
              </label>
            </div>
            <button class="btn btn-lg btn-sidebar" type="submit" name="submit1" value="Login">Log In</button>
          </form>

 <form class="form-signin" name="createUser" method="post" action="CreateUser2.php">
 	<button class="btn btn-lg btn-sidebar" type="submit" name="submit1" value="createUser">Sign Up</button>
</form>

      </div>
    </div>
  </div>


<!-- footer -->

<footer class="footer">
  <div class="container col-sm-12">
    <p class="text-muted" style="color: #FFFFFF;">© Words Beats & Life Inc. | All Rights Reserved 2016</p>
  </div>
</footer>

<!--end footer-->

<!-- end body content -->

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
