<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
$id = $_POST['appnum'];
$years = $_POST['years'];
$pos = $_POST['position'];
$sal = $_POST['salary'];



mysql_query ("UPDATE  applicants SET salary = '$sal', working_years='$years',working_position='$pos' where id='$id' ")or die(mysql_error());

mysql_close($con); 	

 ?>