
 <?php 
$response29 = array();

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

$keyword=$_GET["appnum"];

$result = mysql_query("select * from jobs,applicants,file_applicant_transact where file_applicant_transact.app_id='$keyword' and  file_applicant_transact.app_id = applicants.id and file_applicant_transact.job_id = jobs.job_id and file_status=0") 
or die(mysql_error());

if (mysql_num_rows($result) != 0) {
	$response29["checklist"] = array();

	while ($row = mysql_fetch_array($result)) {
		$checklist= array();

		$checklist["job_id"] = $row["job_id"];
		$checklist["job_title"] = $row["job_title"];
		$checklist["file_id"] = $row["file_id"];
		$checklist["file_pc"] = $row["file_pc"];
		$checklist["file_birth"] = $row["file_birth"];
		$checklist["file_sss"] = $row["file_sss"];
		$checklist["file_pagibig"] = $row["file_pagibig"];
		$checklist["file_nbi"] = $row["file_nbi"];
		$checklist["file_pc_status"] = $row["file_pc_status"];
		$checklist["file_birth_status"] = $row["file_birth_status"];
		$checklist["file_sss_status"] = $row["file_sss_status"];
		$checklist["file_pagibig_status"] = $row["file_pagibig_status"];
		$checklist["file_nbi_status"] = $row["file_nbi_status"];
		$checklist["file_status"] = $row["file_status"];

		array_push($response29["checklist"], $checklist);
	}
	$response29["success"] = 1;
	echo json_encode($response29);
	
} else {
	$response29["success"] = 0;
	$response29["message"] = "No Checklist";
	echo json_encode($response29);
}

 ?>