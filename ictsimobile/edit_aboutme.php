<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
$id = $_POST['appnum'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$cnum = $_POST['cnum'];
$bday = $_POST['bday'];
$state = $_POST['state'];
$city = $_POST['city'];
$citizenship = $_POST['citizenship'];
$religion = $_POST['religion'];
$email = $_POST['email'];



mysql_query ("UPDATE  applicants SET fname = '$fname', mname='$mname' ,lname = '$lname' , contact='$cnum',birthday='$bday',
citizenship='$citizenship',city_add='$city', state='$state',religion='$religion',email='$email' where id='$id' ")or die(mysql_error());

mysql_close($con); 	

 ?>