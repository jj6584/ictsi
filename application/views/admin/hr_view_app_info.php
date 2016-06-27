<html>
<head>
<link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">
<link href="<?php echo base_url();?>css/admin/css/bootstrap.min.css" rel="stylesheet">



<style type="text/css">

.info-box2{
	width: 50%;
	margin: auto;
	margin-top: 5%;
	border: 1px solid #428bca;
}

.info-box3{
	margin: auto;
}


</style>
</head>

<body>


  <?php
        $getapp = $this -> model_admin ->getapplicants($this->uri->segment(3));

  ?>
<div class="info-box2">
	<center><h1><b>APPLICATION DETAILS</b></h1></center>
<div class="row info-box3">
  <div class="col-xs-12 col-sm-6 col-md-8">

  	<font color="gray">
  	<h2>Personal Information</h2>
    <?php
      foreach ($getapp as $data) {

    ?>
  	<br>
  	<p><b>Name: </b><?php echo $data['fname']." ".$data['mname']."".$data['lname'];?></p>
  	<p><b>Gender: </b><?php echo $data['gender']; ?> </p>
	<p><b>Citizenship: </b><?php echo $data['citizenship']; ?></p>
	<p><b>Religion: </b><?php echo $data['religion']; ?></p>
	<p><b>Contact Number: </b><?php echo $data['contact']; ?></p>
	<p><b>Email Address: </b><?php echo $data['email']; ?></p>

	<br><br>

	<h2>Educational Background</h2>
	<p><b>School: </b><?php echo $data['college']; ?></p>
	<p><b>Degree: </b><?php echo $data['college_de']; ?></p>
	<p><b>Program: </b> <?php echo $data['collegeprog']; ?></p>
	<p><b>Year Graduated: </b> <?php echo $data['college_inc']; ?></p>
	<br><br>

	<h2>Other Information</h2>
	<p><b>Skills: </b><?php echo $data['skills']; ?></p>
	<p><b>Expected Salary: </b> <?php echo $data['salary']; ?> and above</p>
  <?php
    if(!empty($data['working_position'])){
  ?>
	<p><b>Work Experience: </b> <?php echo $data['working_position']; ?>, <?php echo $data['working_years']; ?> years</p>

      <?php } ?>
    </font>
<?php
    }
 ?>
  <!-- <br><br>
  	<a href="<?php echo base_url();?>admin/hr_dashboard"><button class="btn btn-primary">Back to Dashboard</button></a>
  <br><br> -->
  </div>

</div>

</div>

<br><br><br>

</body>
</html>
