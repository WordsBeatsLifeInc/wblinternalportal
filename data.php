<table border="1">
    <tr>
    	<th>Student Email</th>
		<th>First Name</th>
		<th>Last Name</th>
    	<th>User Type</th>
		<th>Cell Phone</th>
		<th>Home Phone</th>
    	<th>Date of Birth</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Home Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip</th>
	</tr>
	<?php
	//connection to mysql
	//mysql_connect("localhost", "root", "root"); //server , username , password
  mysql_connect("localhost", "root", "root"); //server , username , password
	mysql_select_db("WBL_v10");

	//query get data
	$sql = mysql_query("SELECT * FROM User ORDER BY userType");
	$no = 1;

	while($data = mysql_fetch_assoc($sql)){
		echo '
		<tr>

			<td>'.$data['email'].'</td>
			<td>'.$data['firstName'].'</td>
			<td>'.$data['lastName'].'</td>
			<td>'.$data['userType'].'</td>
			<td>'.$data['cellPhone'].'</td>
			<td>'.$data['homePhone'].'</td>
			<td>'.$data['dateOfBirth'].'</td>
			<td>'.$data['age'].'</td>
			<td>'.$data['genderIdentification'].'</td>
			<td>'.$data['homeAddress'].'</td>
			<td>'.$data['city'].'</td>
			<td>'.$data['stateAbbreviation'].'</td>
			<td>'.$data['zipCode'].'</td>
			</tr>
		';
		$no++;
	}
	?>
</table>
