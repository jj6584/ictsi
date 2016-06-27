<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
$id = $_POST['appnum'];
$skills = $_POST['skills'];




mysql_query ("UPDATE  applicants SET skills = '$skills' where id='$id' ")or die(mysql_error());

mysql_close($con); 	

 ?>