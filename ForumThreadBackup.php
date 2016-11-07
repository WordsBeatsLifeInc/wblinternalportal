<?php include 'header.php';?>		

  
		
	<div class="col-sm-9 main-body">

<h1>Reply to the Question:<h1>
<form method="post" action="" >
<input type="text" name = "replyTextBox">&nbsp;
<input type="submit" value = "Reply" name="submitThread">
</form>
<?php
if(isset ($_POST["replyTextBox"]))
 { 
	echo "<script type='text/javascript'>alert('YOU POSTED');</script>";

	 $pwd=($_POST["select"]);

	 //datetime
	 date_default_timezone_set('America/New_York');
	 $date = date('y-m-d h:i:s', time());
	 
	 $conn = mysqli_connect('localhost','root','root');
	 mysqli_select_db($conn, 'wbl_v10');
	 
	$sql="INSERT INTO `wbl_v10`.`forumthread` (`forumid`, `answer`, `email`, `datetime`) VALUES ('$_SESSION['hiddenForumID']', '$_POST[replyTextBox]', 'mj1@student.com', '$date')";

	mysqli_query($conn, $sql);
	//echo $sql;
 }
?>

<p>
<?php
		//show threads
		$query="SELECT * FROM Forum WHERE forumID = $_SESSION['hiddenForumID']";
		$server="localhost";
		$user="root";
		$password="root";
		$database="wbl_v10";

		$con = mysql_connect($server, $user, $password);
		
		if (!empty($con)) 
		echo "$val<br />\n";
              {

                if (mysql_select_db($database,$con)) 

                {

                  $resultset = mysql_query($query,$con);

                  if ($resultset==true) 

                  {

                    $output_string = '<table id="displaytable" class="table table-striped">';

                    $header=false;

                    while ($row=mysql_fetch_assoc($resultset)) 

                    {

                      if(!$header)

                      {

                        $output_string .= '<tr>';

                        foreach($row as $header => $value)

                        {

                          $output_string .= "<th>{$header}</th>";

                        }
						 //no select for reply
						 //$output_string .= '<td>Select</td>';

                        $output_string .= '</tr>';

                      }

                      $output_string .= '<tr>';

                      foreach($row as $value)

                      {

                        $output_string .= "<td>{$value}</td>";

                      }
						  //no select for reply
						  //$output_string .= '<td><input type="submit" name="selectThreadButton" id="selectThreadButton" value = "Select"/></td>';
						  
                      $output_string .= "</tr>";

                    }

                    // end table

                    echo $output_string;

                    echo '</table>';

                  }

                }

              }


		// close connection 
		mysql_close($con);
		//echo $output_string;
		

					?>
</p>

<form action="Forum.php">
			<button type="submit" id="bbself" class="btn btn-lg btn-admin" value="submit" name="bbself"/>Back</button>
</form>


	</div><!--end main-body col-sm-9-->

	<div class="col-sm-3 sidebar">
			<button type="submit" id="bbself" class="btn btn-lg btn-admin" value="submit" name="bbself"/>Back</button>



	</div><!--end sidebar col-sm-3-->
		
					 
 <?php include 'footer.php';?>
 