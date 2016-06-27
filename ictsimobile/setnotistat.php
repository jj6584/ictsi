<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
$id = $_POST['appnum'];




mysql_query ("UPDATE  interview_sched SET int_seen = 1 where int_user_id='$id'")or die(mysql_error());

mysql_close($con); 	
 ?>