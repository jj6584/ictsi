 <?php 
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());



$keyword=$_POST["appnum"];
$keyword1=$_POST["jobnum"];
$keyword2=$_POST["answer"];

$result1 = mysql_query("SELECT * FROM interview_sched where int_user_id='$keyword' AND int_job_id='$keyword1' ")
or die(mysql_error());
// check for empty result
if (mysql_num_rows($result1)!=0) {
	// looping through all results


$result2 = mysql_query("update job_applicant_transact set app_status = 1 where applicant_id_tr='$keyword' AND job_id_tr='$keyword1' ")
	or die(mysql_error());

	if($keyword2=='Personal Interview'){
	$result = mysql_query("update interview_sched set response = 1 , status = 1 where int_user_id='$keyword' AND int_job_id='$keyword1'")
or die(mysql_error());
	}else{
	$result = mysql_query("update interview_sched set response = 5 ,status = 1 where int_user_id='$keyword' AND int_job_id='$keyword1'")
or die(mysql_error());
	}
	// success
	$response9["success"] = 1;
	$response9["message"] = "Responded succesfully!";
	$response9["status"] = 1;
	// echoing JSON response
die(json_encode($response9));	
} else { 	
	// no products found

	$response9["success"] = 0;
	$response9["message"] = "You have already responded to this interview";
	$response9["status"] = 0;
	// echo no users JSON
	die(json_encode($response9));
}


 ?>