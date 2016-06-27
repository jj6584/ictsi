<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
$id = $_POST['appnum'];
$college = $_POST['college'];
$degree = $_POST['degree'];
$program = $_POST['program'];
$yeargrad = $_POST['yeargrad'];



mysql_query ("UPDATE  applicants SET college = '$college', college_de='$degree',collegeprog='$program',college_inc='$yeargrad' where id='$id' ")or die(mysql_error());

mysql_close($con); 	

 ?>