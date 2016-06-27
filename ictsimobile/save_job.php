 <?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());



$keyword=$_POST["app_id"];
$keyword2=$_POST["job_id"];

$result1 = mysql_query("SELECT * FROM savejobs where sj_app_id='$keyword' AND sj_job_id='$keyword2' ")
or die(mysql_error());


$result2 = mysql_query("SELECT * FROM job_applicant_transact where applicant_id_tr='$keyword' AND job_id_tr='$keyword2' ")
or die(mysql_error());
// check for empty result
if ((mysql_num_rows($result1)==0)&&(mysql_num_rows($result2)==0)) {
	// looping through all results
	
$result = mysql_query("INSERT INTO savejobs (sj_app_id,sj_job_id) VALUES ('$keyword','$keyword2')")
or die(mysql_error());
	// success
	$response3["success"] = 1;
	$response3["message"] = "Saved Job!";
	$response3["status"] = 1;
	// echoing JSON response
die( json_encode($response3));	
}


 ?>

<!--  DELETE FROM savejobs
WHERE sj_app_id ='2' AND sj_job_id = '6' -->