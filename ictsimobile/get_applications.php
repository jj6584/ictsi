 <?php 
// array for JSON response
$response2 = array();

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());




$keyword=$_GET["appnum2"];

$result = mysql_query("SELECT * FROM job_applicant_transact,jobs,applicants where job_applicant_transact.applicant_id_tr = '$keyword'
and applicants.id = '$keyword' and job_applicant_transact.job_id_tr = jobs.job_id") 
or die(mysql_error());



// check for empty result
if (mysql_num_rows($result) > 0 ) {
	// looping through all results
	$response2["appliedjobs"] = array();

	while ($row = mysql_fetch_array($result)) {
		// temp user array
		$appliedjobs= array();

		$appliedjobs["job_id"] = $row["job_id"];
		$appliedjobs["job_title"] = $row["job_title"];
		$appliedjobs["job_desc"] = $row["job_desc"];
		$appliedjobs["job_requirement"] = $row["job_requirement"];
		$appliedjobs["app_status"] = $row["app_status"];

		// push single idiom array into final response array
		array_push($response2["appliedjobs"], $appliedjobs);
	}
	
//	if(mysql_num_rows($result1)>0)
//	{
//		$response2["savedjobsstat"] = 1;
//	}else{
//		$response2["savedjobsstat"] = 0;
//	}
	// success
	$response2["success"] = 1;
	// echoing JSON response
	echo json_encode($response2);
	
} else {
	// no products found
	$response2["success"] = 0;
	$response2["message"] = "No job found";

	// echo no users JSON
	echo json_encode($response2);
}


 ?>