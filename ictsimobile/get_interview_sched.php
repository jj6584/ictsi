<?php 
$reponse0 = array();

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

$keyword=$_GET["appnum"];

$result = mysql_query("SELECT * FROM interview_sched,applicants,jobs where interview_sched.int_user_id = '$keyword' and applicants.id = '$keyword' 
	and jobs.job_id = interview_sched.int_job_id and interview_sched.status=0") 
or die(mysql_error());

if (mysql_num_rows($result) > 0) {

	$reponse0["interview_sched"] = array();
	
	while ($row = mysql_fetch_array($result)) {

		$savedjobs= array();
		$interview_sched["job_id"] = $row["job_id"];
		$interview_sched["id"] = $row["id"];
		$interview_sched["int_id"] = $row["int_id"];
		$interview_sched["int_date"] = $row["int_date"];
		$interview_sched["time"] = $row["time"];
		$interview_sched["day"] = $row["day"];
		$interview_sched["req_cmt"] = $row["req_cmt"];
		$interview_sched["job_title"] = $row["job_title"];
		$interview_sched["job_desc"] = $row["job_desc"];

		array_push($reponse0["interview_sched"], $interview_sched);
	}

	$reponse0["success"] = 1;

	echo json_encode($reponse0);
	
} else {

	$reponse0["success"] = 0;
	$reponse0["message"] = "No job found";
	echo json_encode($reponse0);
}


 ?>