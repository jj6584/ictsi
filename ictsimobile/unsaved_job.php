 <?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());



$keyword=$_POST["app_id"];
$keyword2=$_POST["job_id"];

$result1 = mysql_query("SELECT * FROM savejobs where sj_app_id='$keyword' AND sj_job_id='$keyword2' ")
or die(mysql_error());
// check for empty result
if (mysql_num_rows($result1)!=0) {
		// no products found
	$result = mysql_query("DELETE FROM savejobs
WHERE sj_app_id ='$keyword' AND sj_job_id = '$keyword2'")
or die(mysql_error());
	$response3["success"] = 0;
	$response3["message"] = "Unsaved Job";
	$response3["status"] = 0;
	// echo no users JSON
	die( json_encode($response3));
}

 ?>
