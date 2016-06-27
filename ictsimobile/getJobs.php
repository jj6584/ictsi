<?php 
// include connect class
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());




$DB_USER='ictsi_superuser'; 
		$DB_PASS='5r7UbfPNFjBnqv8CS1'; 
		$DB_HOST='localhost';
		$DB_NAME='ictsi';
		$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		/* check connection */
		if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}






$mysqli->query("SET JOBS 'utf8'");
		$sql="SELECT job_title FROM jobs";
		$result=$mysqli->query($sql);
		while($e=mysqli_fetch_assoc($result)){
		$output[]=$e; 
		}	

		print(json_encode($output)); 
		$mysqli->close();	



?>