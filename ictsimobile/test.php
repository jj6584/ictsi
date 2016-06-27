<?php

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi")
	or die(mysql_error());


	$email= "pcbanjawan@gmail.com"; 
	 
			$result =  mysql_query("SELECT * FROM `applicants`where email ='$email'");
while ($row = mysql_fetch_array($result)) {
	$applicant= array();

		
		
		 $applicant["id"] = sha1($row["id"]);
	
	if(!@copy($_SERVER['DOCUMENT_ROOT'].'/ictsi/users/upload.php',$_SERVER['DOCUMENT_ROOT'].'/ictsi/users/'.$applicant['id'].'/upload.php')){
				$errors= error_get_last();
				echo "COPY ERROR: ".$errors['type'];
				echo "<br />\n".$errors['message'];
			} else {
				echo "File copied from remote!";
			}	
		} 
			
			
			
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 mysql_close(); 
?>
