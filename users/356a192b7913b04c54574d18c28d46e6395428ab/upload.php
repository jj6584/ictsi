<?php
$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());
    $id = $_POST['id'];
    $file_path = "";
     
    $file_path = $file_path . basename( $_FILES['uploaded_file']['name']);

    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
		
							 $name = basename( $_FILES['uploaded_file']['name']);

		
		
		mysql_query ("UPDATE  file_applicant_transact SET file_pc = '$name', file_pc_status=1 where app_id=2 ")or die(mysql_error());
		
		
		
    } else{
					
        echo "fail";
    }
 ?>
