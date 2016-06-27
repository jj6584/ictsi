
 <?php 
// array for JSON response
$response30 = array();
// include connect class
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());
	
$keyword=$_GET["appnum"];

$result = mysql_query(" SELECT * FROM interview_sched where  int_user_id='$keyword' and int_seen = 0 ")or die(mysql_error());
// check for empty result
if (mysql_num_rows($result) != 0) {
	// looping through all results
	$response30["notifs"] = array();

	while ($row = mysql_fetch_array($result)) {
		// temp user array
		$notifs= array();

		$notifs["int_id"] = $row["int_id"];
			//$notifs["int_date"] = $row["int_date"];
						$notifs["int_seen"] = $row["int_seen"];

		//	$notifs["time"] = $row["time"];
		//	$notifs["day"] = $row["day"];
		//	$notifs["req_cmt"] = $row["req_cmt"];
		//	$notifs["response"] = $row["response"];

		array_push($response30["notifs"], $notifs);
	}
			$response30["success"] = 1;
	echo json_encode($response30);

}else{
		$response30["success"] = 0;
}
mysql_close($con); 	
 ?>











