<?php
//search.php
/*
* Following code will search idiom based on keywords
*/

// array for JSON response
$response = array();

// include connect class
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());



$keyword=$_GET["keyword"];

$result = mysql_query("SELECT * FROM jobs WHERE job_title LIKE '%$keyword%' ") 
or die(mysql_error());

// check for empty result
if (mysql_num_rows($result) > 0) {
	// looping through all results
	$response["jobs"] = array();

	while ($row = mysql_fetch_array($result)) {
		// temp user array
		$jobs= array();

		$jobs["job_id"] = $row["job_id"];
		$jobs["job_title"] = $row["job_title"];
		$jobs["job_desc"] = $row["job_desc"];
		$jobs["job_requirement"] = $row["job_requirement"];


		// push single idiom array into final response array
		array_push($response["jobs"], $jobs);
	}
	// success
	$response["success"] = 1;
	
	// echoing JSON response
	echo json_encode($response);
	
} else {
	// no products found
	$response["success"] = 0;
	$response["message"] = "No job found";

	// echo no users JSON
	echo json_encode($response);
}

?>