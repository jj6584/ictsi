<?php
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
     $id = $_REQUEST['id'];
	$id2 = sha1($id);
    $file_path = "/home/ugmeme/public_html/ictsi/users/".$id2."/";
     
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
		
							 $name = basename( $_FILES['uploaded_file']['name']);

		
		
		mysql_query ("UPDATE  file_applicant_transact SET file_pagibig = '$name' where app_id='$id' ")or die(mysql_error());
		
		
		
    } else{
					
        echo "fail";
    }
 ?>
