 <?php 
 

 
// array for JSON response
$response11 = array();


// include connect class
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());


$id=$_POST["appnum"];


$result = mysql_query("SELECT * FROM applicants where id='$id'") or die(mysql_error()) ;
// check for empty result

	$response11["applicantdetails"] = array();

	while ($row = mysql_fetch_array($result)) {
		// temp user array
		$applicantdetails= array();
		$applicantdetails["fname"] = $row["fname"];
		$applicantdetails["mname"] = $row["mname"];
		$applicantdetails["lname"] = $row["lname"];
		$applicantdetails["city_add"] = $row["city_add"];
		$applicantdetails["state"] = $row["state"];
		$applicantdetails["citizenship"] = $row["citizenship"];
		$applicantdetails["religion"] = $row["religion"];
		$applicantdetails["contact"] = $row["contact"];
		$applicantdetails["email"] = $row["email"];
		$applicantdetails["college"] = $row["college"];
		$applicantdetails["college_de"] = $row["college_de"];
		$applicantdetails["collegeprog"] = $row["collegeprog"];
		$applicantdetails["college_inc"] = $row["college_inc"];
		$applicantdetails["skills"] = $row["skills"];
		$applicantdetails["profilepic"] = $row["profilepic"];



		// push single idiom array into final response array
		array_push($response11["applicantdetails"], $applicantdetails);
	}
	// success
	$response11["success"] = 1;
	// echoing JSON response
	echo json_encode($response11);
	

mysql_close($con); 	

 ?>