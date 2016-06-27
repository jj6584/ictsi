
 <?php 
// array for JSON response
$response1 = array();

// include connect class
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

$keyword=$_GET['appnum'];

$result = mysql_query("SELECT * FROM savejobs,jobs,applicants where 
	savejobs.sj_app_id = '$keyword' and applicants.id = '$keyword' and savejobs.sj_job_id = jobs.job_id and jobs.job_status=1") 
or die(mysql_error());
// check for empty result
if (mysql_num_rows($result) != 0) {
	// looping through all results
	$response1["savedjobs"] = array();

	while ($row = mysql_fetch_array($result)) {
		// temp user array
		$savedjobs= array();

		$savedjobs["job_id"] = $row["job_id"];
		$savedjobs["job_title"] = $row["job_title"];
		$savedjobs["job_desc"] = $row["job_desc"];
		$savedjobs["job_requirement"] = $row["job_requirement"];
		// push single idiom array into final response array
		array_push($response1["savedjobs"], $savedjobs);
	}
	// success
	$response1["success"] = 1;
	// echoing JSON response
	echo json_encode($response1);
	
} else {
	// no products found
	$response1["success"] = 0;
	$response1["message"] = "No job found";
	// echo no users JSON
	echo json_encode($response1);
}

 ?>