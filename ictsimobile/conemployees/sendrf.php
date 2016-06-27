<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());

	
$fname = $_POST['fnames'];
$lname = $_POST['lnames'];
$yearexperience = $_POST['yearexperience'];
$workexperience = $_POST['workexperience'];
$skillss = $_POST['skillss'];



mysql_query("INSERT INTO `referral_form`(`fname`, `lname`, `skills`, `years_expi`, `work_position`) VALUES ('$fname','$lname','$skillss','$yearexperience','$workexperience')
					");


		
mysql_close($con); 	

 ?>