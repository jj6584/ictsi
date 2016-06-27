<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());


$r_email = $_POST['email'];
$temp_pass = md5(uniqid());


$result = mysql_query("SELECT * FROM applicants where email ='$r_email'") or die(mysql_error());
$row = mysql_fetch_array($result);
if (!empty($row)) { 
mysql_query("UPDATE applicants set reset_pass='$temp_pass' where email='$r_email'");
$to = $r_email;
$subject = "Verify your email address";
 $message = "<p>This email has been sent as a request to reset our password</p>";
            $message .= "<p><a href='http://ugmeme.com/ictsi/main/reset_password/$temp_pass'>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";

// Always set content-type when sending HTML email
 $headers  .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-type: text/html; charset: utf8\r\n";
$headers .= "From: ICTSI Password recovery <autoresponder@ugmeme.com>";

mail($to,$subject,$message,$headers);
}








		
mysql_close($con); 	

 ?>