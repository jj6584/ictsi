<?php

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());


	$email= $_POST['email']; 
	$pass = $_POST['password']; 
	
	if(!empty($_POST)){

		if (empty($_POST['email']) || empty($_POST['password'])) {
		$response["success"] = 0;
		$response["message"] = "One or both of the fields are empty";
		die(json_encode($response));
		}


		$query = " SELECT * FROM applicants WHERE email = '$email' and password=sha1('$pass') and verified=1"; 
		$sql1=mysql_query($query); 
		$row = mysql_fetch_array($sql1); 
		if (!empty($row)) { 

			

			$response["success"] = 1; 
			$response["message"] = "You have been sucessfully login"; 
			$response["id"] = $row["id"];
			$response["id2"] = sha1($row["id"]);
			$response["fname"] = $row["fname"];
			$response["mname"] = $row["mname"];
			$response["lname"] = $row["lname"];
			$response["password"] = $row["password"];

			$response["city_add"] = $row["city_add"];
			$response["state"] = $row["state"];
			$response["email"] = $row["email"];
			$response["citizenship"] = $row["citizenship"];
			$response["citizenship"] = $row["citizenship"];
			$response["religion"] = $row["religion"];
			$response["contact"] = $row["contact"];
			$response["email"] = $row["email"];
			$response["gender"] = $row["gender"];
			$response["college"] = $row["college"];
			$response["college_de"] = $row["college_de"];
			$response["collegeprog"] = $row["collegeprog"];
			$response["college_inc"] = $row["college_inc"];
			$response["skills"] = $row["skills"];
			$response["birthday"] = $row["birthday"];
			$response["working_years"] = $row["working_years"];
			$response["working_position"] = $row["working_position"];
			$response["salary"] = $row["salary"];
			$response["profilepic"] = $row["profilepic"];
			$response["skypeuser"] = $row["skypeuser"];
			

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
