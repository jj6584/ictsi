<?php

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

	$id = $_POST['appnum'];
	$oldpass = sha1($_POST['oldpass']);
	$newpass = sha1($_POST['newpass']);
	
	$result = mysql_query("SELECT * FROM applicants where id ='$id' and password='$oldpass'")
	or die(mysql_error());
	
	if (mysql_num_rows($result)==1) {
		mysql_query("UPDATE applicants set password='$newpass' where id='$id'")
		or die(mysql_error());
	}

	

?>