<?php
			if ( isset( $_POST['OK'] ) )
			{	
				$con = mysqli_connect("localhost", "root", "root");
				
				if (!con){
					die("cannot connect: " . mysqli_error());
				}
				mysqli_select_db($con, "wbl_v10");
				
				$subcheck = (isset($_POST['Week1Check'])) ? 1 : 0;
				
				$subcheck2 = (isset($_POST['Week2Check'])) ? 1 : 0;
				
				$subcheck3 = (isset($_POST['Week3Check'])) ? 1 : 0;
				
				$subcheck4 = (isset($_POST['Week4Check'])) ? 1 : 0;
				
				$subcheck5 = (isset($_POST['Week5Check'])) ? 1 : 0;
				
				$subcheck6 = (isset($_POST['Week6Check'])) ? 1 : 0;
				
				$subcheck7 = (isset($_POST['Week7Check'])) ? 1 : 0;
				
				$subcheck8 = (isset($_POST['Week8Check'])) ? 1 : 0;

				
			
				

				$insertQuery = "update ATTENDANCE SET WEEK1 = ". $subcheck . ", WEEK2 = ". $subcheck2 .", WEEK3= ". $subcheck3 .", WEEK4= ". $subcheck4 . ", WEEK5= ". $subcheck5 .", WEEK6 = ". $subcheck6 . ", WEEK7 =" . $subcheck7 . ", WEEK8 = " . $subcheck8 . "  WHERE ATTENDANCEID = '$_POST[attendanceID]';";

				mysqli_query($con, $insertQuery);
				
			};
?>