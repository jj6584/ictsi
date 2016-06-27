 <?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

$keyword=$_POST["app_id"];
$keyword2=$_POST["job_id"];
$keyword3=$_POST["videolink"];


$result1 = mysql_query("SELECT * FROM job_applicant_transact where applicant_id_tr='$keyword' AND job_id_tr='$keyword2' ")
or die(mysql_error());
$result3 = mysql_query("SELECT * FROM savejobs,jobs,applicants where 
	savejobs.sj_app_id = '$keyword' and applicants.id = '$keyword' and savejobs.sj_job_id = jobs.job_id ")
or die(mysql_error());
// check for empty result
if (mysql_num_rows($result1)==0) {
	// looping through all results
if($keyword==""){
$result = mysql_query("INSERT INTO job_applicant_transact (applicant_id_tr,job_id_tr,date_applied) VALUES ('$keyword','$keyword2','DateTImeCol')")
or die(mysql_error());
}else{
	$result = mysql_query("INSERT INTO job_applicant_transact (applicant_id_tr,job_id_tr,date_applied,video_link) VALUES ('$keyword','$keyword2','DateTImeCol','$keyword3')")
or die(mysql_error());
}
if(mysql_num_rows($result3)!=0){
$result2 = mysql_query("DELETE FROM savejobs
WHERE sj_app_id ='$keyword' AND sj_job_id = '$keyword2'");
}
	// success
	$response4["tbstat"] = 1;

	$response4["success"] = 1;
	$response4["message"] = "Applied Job!";
	// echoing JSON response
die( json_encode($response4));	
} 

 ?>