<?php

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());

	$id = $_POST['c_e_id'];
	$oldpass = sha1($_POST['oldpass']);
	$newpass = sha1($_POST['newpass']);
	
	$result = mysql_query("SELECT * FROM c_emp where c_e_id ='$id' and c_e_password='$oldpass'")
	or die(mysql_error());
	
	if (mysql_num_rows($result)==1) {
		mysql_query("UPDATE c_emp set c_e_password='$newpass' where c_e_id='$id'")
		or die(mysql_error());
	}

	

?>