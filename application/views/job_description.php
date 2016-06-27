<html>
  <head>

<?php
$this->load->model('model_users');


$try = $this->model_users->getDetails($this->session->userdata('email'));

 ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?= base_url()?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

    <style type ="text/css">

</style>
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" style="background-color: <?php if($_SESSION['level'] == 2){
      echo "#428bca";
    }else{

      echo "#FB8F40";}
      ?>
  ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="<?php echo base_url()?>main">
        <img alt="Brand" src="<?= base_url()?>images/logo.png" style="margin-top:-9px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>main/joblist"><font color="White">Search Opportunities</font></a></li>

          <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">Account<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;My Applications</strong></li>
            <li><a href="<?php echo base_url();?>main/view_application">View Application</a></li>
            <li role="separator" class="divider"></li>
            <li><strong>&nbsp;&nbsp;&nbsp;Saved Jobs</strong></li>
            <li><a href="<?php echo base_url();?>main/save_jobs">View Saved Jobs</a></li>
          </ul>
        </li>


         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">More<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Interview</strong></li>
            <li><a href="<?php echo base_url();?>main/interviewsched">Interview Schedule</a></li>
          </ul>
        </li>
      </ul>
<?php

     $this->load->model('model_users');

 $notificationNum = $this->model_users->getInterviewNotif();

 $allnotificationNum = $notificationNum;



?>


        <ul class="nav navbar-nav navbar-right">

             <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span>
          <?php if($allnotificationNum){?>
          <span class="label label-danger"><?php echo $allnotificationNum;?></span>
          <?php } ?>
          <span class="caret"></span></font></a>
          <ul class="dropdown-menu">
                        <li>
                            <a href="#">Job Application
                                  <?php if($notificationNum){?>
                                <span class="label label-danger"> <?php echo $notificationNum; ?> New</span>
                                  <?php  } ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url();?>main/interviewsched">Interview schedule
                                  <?php if($notificationNum){?>
                                <span class="label label-danger"> <?php echo $notificationNum; ?> New</span>
                                  <?php  } ?>
                            </a>
                        </li>

          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>main/edit_aboutme">Update Profile</a></li>
            <li><a href="#">Help</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>main/logout">Sign out</a></li>
          </ul>
        </li>
      </ul>
      <!-- <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form> -->


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div style="width: 80%; margin:auto;">
<div class="panel panel-default table-size">
  <div class="panel-body">
    <h3>Job Description</h3><br />

      <h4><?php echo $jobdesc['job_title']; ?></h4>
      <strong>Date: </strong> <?php echo $jobdesc['date_added']; ?></br>
      <strong>Location: </strong> Philippines
    <?php

    ?>
      <br /><br /><br />
      <strong>Requisition ID: </strong><?php echo $jobdesc['job_requisition_id']; ?><br />
      <strong>Work Area: </strong><?php echo $jobdesc['work_area'];?><br />
      <strong>Skills: </strong><?php echo $jobdesc['job_skills']; ?><br />
      <strong>Work Experience </strong> at least <?php echo $jobdesc['work_exp']; ?> <br />
      <strong>Highest Attainment: </strong><?php echo $jobdesc['highest_att']; ?><br />
      <strong>Expected Salary: </strong><?php echo $jobdesc['exp_salary']; ?><br />
      <strong>Employment Type: </strong><?php echo $jobdesc['employment_type']; ?><br />
      <br /><br /><br /><br /><br />
      <p><strong>JOB DESCRIPTION</strong></p><br>
      <p><?php echo $jobdesc['job_desc']; ?></p>
      <?php
        //$dis = $this -> model_users -> disable();
      if($this->model_users->disable($jobdesc['job_id'], $_SESSION['applicant_id'])){
        echo form_open('main/cancelApp');
      }else{
        echo form_open('main/insert_applicant');
      }
        echo form_hidden('hidden_job_id', $jobdesc['job_id']);
        echo form_hidden('hidden_applicant_id', $_SESSION['applicant_id']);
      ?>
	  <br><br>
	  <div class="form-group">
	  <?php if(!$this->model_users->disable($jobdesc['job_id'], $_SESSION['applicant_id']))
         {  ?>
		<p><b>Paste link of video resume: (Optional)</b></p>
		<input type="text" class="form-control" name="vlink" id="VLink" placeholder="Video Resume Link" style="width:40%;">
		<p><font color="gray">Parameters for Video Resume:</p>
		<ul>
			<li>Name</li>
			<li>Degree</li>
			<li>Educational Background</li>
			<li>Skills</li>
			<li>Work Experience</li>
			<li>Answer the question "Why should  I hire you?"</li>
		</ul>
		<p><b>NOTE:</b> Your video resume should only take 1 minute and 30 seconds.</p></font>
		 <?php }else{
		 echo "";
		 }?>
	  </div>
	  
        <?php
         if($this->model_users->disable($jobdesc['job_id'], $_SESSION['applicant_id']))
         {    ?>

          <button type="submit" class="btn btn-warning pull-right">Cancel Application &nbsp;</span></button>

      <?php  }else{ ?>

        <button type="submit" class="btn btn-primary pull-right">Apply Now &nbsp;<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></button>

      <?php  } ?>


       <?php

  echo form_close();
  ?>
  </div>
</div>
</div>