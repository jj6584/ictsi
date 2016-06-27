<?php 

$con = mysql_connect("localhost", "ictsi_superuser", "5r7UbfPNFjBnqv8CS1");
mysql_select_db("ictsi") or die(mysqli_error());

	
$r_fname = $_POST['fname'];
$r_mname = $_POST['mname'];
$r_lname = $_POST['lname'];
$r_gender = $_POST['gender'];
$r_pass = $_POST['pass'];
$r_cnum = $_POST['cnum'];
$r_bday = $_POST['bday'];
$r_state = $_POST['state'];
$r_city = $_POST['city'];
$r_citizenship = $_POST['citizenship'];
$r_religion = $_POST['religion'];
$r_email = $_POST['email'];
$r_college = $_POST['college'];
$r_yeargrad = $_POST['yeargrad'];
$r_degree = $_POST['degree'];
$r_course = $_POST['course'];
$r_pos1 = $_POST['pos1'];
$r_pos2 = $_POST['pos2'];
$r_sal = $_POST['sal'];
$r_skills = $_POST['skills'];
$code = md5(uniqid());

mysql_query("INSERT INTO applicants (fname,mname,lname,gender,contact,birthday,password,email,citizenship,religion,city_add,state,poschoice1,poschoice2,salary,college,college_de,collegeprog,college_inc,skills,verified) 
					VALUES ('$r_fname','$r_mname','$r_lname','$r_gender','$r_cnum','$r_bday',sha1('$r_pass'),'$r_email','$r_citizenship','$r_religion','$r_city','$r_state','$r_pos1','$r_pos2','$r_sal','$r_college','$r_degree','$r_course','$r_yeargrad','$r_skills', '$code')
					
					");
$result =  mysql_query("SELECT * FROM `applicants`order by id desc limit 1");
while ($row = mysql_fetch_array($result)) {
	$applicant= array();

		echo $applicant["id"] = sha1($row["id"]);
		mkdir("/home/ugmeme/public_html/ictsi/users/".$applicant['id'],0755);
		
		
		if(!@copy($_SERVER['DOCUMENT_ROOT'].'/ictsi/images/profilepic/SavePicture.php',$_SERVER['DOCUMENT_ROOT'].'/ictsi/users/'.$applicant['id'].'/SavePicture.php')){
	$errors= error_get_last();
    echo "COPY ERROR: ".$errors['type'];
    echo "<br />\n".$errors['message'];
} else {
    echo "File copied from remote!";
}	











		
}


$to = $r_email;
$subject = "Verify your email address";
$txt = "
<html><head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
    <!-- Latest compiled and minified CSS -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' integrity='sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==' crossorigin='anonymous'>

<!-- Optional theme -->
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css' integrity='sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX' crossorigin='anonymous'>

<!-- Latest compiled and minified JavaScript -->
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js' integrity='sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==' crossorigin='anonymous'></script>

</head>


<style type='text/css'>

.verifButton {
    background-color:transparent;
    height: 35px;
    width: 100px;
    border-radius: 3px;
    border: 0.5px solid #428bca;
    cursor:pointer;
    color:#000000;
    font-family:Arial;
    font-size:17px;
    text-decoration:none;
}

</style>


<div style='
            width: 40%;
            margin: auto;
            margin-top: 5%;

'>
 <img src='http://3.bp.blogspot.com/_FGYg8MzvWqQ/TUVxttfdb3I/AAAAAAAAAGc/1bVQc4K4K8M/s250/345px-ICTSI_Logo.svg.png'>

<div class='panel panel-primary'>
  <div class='panel-body'>
    <h4>Welcome ".$r_fname.",</h4>
    <br>

    <p>Thank you for signing up to the ICTSI.</p>
    <p>Once you verify your email address, you may use it to sign in in our website. You will also receive an email if the HR Administrator
    opens job that matches your skills.</p>


    <p>Please click the button below to verify your email. Thank you!</p>

    <div class='verifButton'>
        <div class='panel panel-primary'>
		            <a href='http://ugmeme.com/ictsi/main/verify/$code'><button class='verifButton'><font face='Nexa Light'>Click here</font></button></a>

        </div>
    </div>
    <hr>
    <br>


    <br>
    <br>


  </div>
</div>



</div></html>";

// Always set content-type when sending HTML email
 $headers  .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-type: text/html; charset: utf8\r\n";
$headers .= "From: autoresponder@ugmeme.com";

mail($to,$subject,$txt,$headers);







		
mysql_close($con); 	

 ?>