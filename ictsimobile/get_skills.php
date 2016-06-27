
 <?php 

$response19 = array();


$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

$result = mysql_query("SELECT * FROM skills") or die(mysql_error());

	$response19["skills"] = array();
	while ($row = mysql_fetch_array($result)) {
		$skills= array();
		$skills["skill_id"] = $row["skill_id"];
		$skills["skill_name"] = $row["skill_name"];
		array_push($response19["skills"], $skills);
	}

	$response19["success"] = 1;
	echo json_encode($response19);
 ?>