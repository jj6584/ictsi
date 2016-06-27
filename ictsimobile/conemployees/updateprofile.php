<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
$id = $_POST['c_e_id'];

$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$email = $_POST['email'];



mysql_query ("UPDATE  c_emp SET c_e_name = '$fname', c_e_mname='$mname',c_e_lname='$lname',c_e_email='$email' where c_e_id='$id' ")or die(mysql_error());

mysql_close($con); 	

 ?>