<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());

	
$vacantposition = $_POST['vacantposition'];
$departmentname = $_POST['departmentname'];
$yearexperience = $_POST['yearexperience'];
$workexperience = $_POST['workexperience'];
$skillss = $_POST['skillss'];
$emptypes = $_POST['emptypes'];
$id = $_POST['c_e_id'];


mysql_query("INSERT INTO `mp_request`(`job_position`, `dept_name`, `skills_requirements`, `work_expi`, `employment_type`) VALUES ('$vacantposition','$departmentname','$skillss','$workexperience','$emptypes')
					");

mysql_query("INSERT INTO `notifications`(`type_id`, `sender_id`, `receiver_id`) VALUES ('8','$id','0')
					");

		
mysql_close($con); 	

 ?>