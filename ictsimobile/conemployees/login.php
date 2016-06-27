<?php

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());


	$empnum= $_POST['empnum']; 
	$emppass = $_POST['emppass']; 
	
	if(!empty($_POST)){

		if (empty($_POST['empnum']) || empty($_POST['emppass'])) {
		$response["success"] = 0;
		$response["message"] = "One or both of the fields are empty";
		die(json_encode($response));
		}


		$query = " SELECT * FROM c_emp WHERE c_e_id = '$empnum' and c_e_password=sha1('$emppass')"; 
		$sql1=mysql_query($query); 
		$row = mysql_fetch_array($sql1); 
		if (!empty($row)) { 

			

			$response["c_emp_id"] = $row["c_emp_id"];
			$response["c_e_id"] = $row["c_e_id"];
			$response["c_e_name"] = $row["c_e_name"];
			$response["c_e_mname"] = $row["c_e_mname"];
			$response["c_e_lname"] = $row["c_e_lname"];
			$response["c_e_email"] = $row["c_e_email"];
			$response["c_e_password"] = $row["c_e_password"];

			$response["success"] = 1; 
			$response["message"] = "You have been sucessfully login"; 
		
			die(json_encode($response)); 
			// die(json_encode($row)); 

			
		} 
		else{ 
			$response["success"] = 0; 
			$response["message"] = "invalid username or password "; 
			die(json_encode($response)); 
		}


	}  
	else{
	 $response["success"] = 0; 
	 $response["message"] = " One or both of the fields are empty"; 
	 die(json_encode($response)); 
	 } 
	 mysql_close(); 
?>
