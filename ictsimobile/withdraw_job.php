 <?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

$keyword=$_POST["app_id"];
$keyword2=$_POST["job_id"];

$result1 = mysql_query("SELECT * FROM job_applicant_transact where applicant_id_tr='$keyword' AND job_id_tr='$keyword2' ")
or die(mysql_error());
// check for empty result
if (mysql_num_rows($result1)!=0) {
	// looping through all results
$result = mysql_query("DELETE FROM job_applicant_transact
WHERE applicant_id_tr ='$keyword' AND job_id_tr = '$keyword2'")
or die(mysql_error());
$response4["tbstat"] = 0;
	$response4["success"] = 0;
	$response4["message"] = "Your application has been withdrawn";

	// echo no users JSON
	die( json_encode($response4));
	// echoing JSON response
die( json_encode($response4));	
} 


 ?>