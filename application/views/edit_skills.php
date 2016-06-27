<html>
  <head>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>js/nav.js"></script> -->
    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">


  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" style=" background-color: <?php if($_SESSION['level'] == 2){
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

          <li class="dropdown">
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


<div class="ep_menu">
<ul class="nav nav-pills nav-stacked " >
   <li role="presentation" ><a href="<?php echo base_url();?>main/edit_skills"><span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp;Skills</a></li>
  <li role="presentation"><a href="<?php echo base_url();?>main/edit_education"> <span class="glyphicon glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp; Education</a></li>
  <li role="presentation" ><a href="<?php echo base_url();?>main/edit_aboutme"> <span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; About me</a></li></a></li>
  <li role="presentation" ><a href="<?php echo base_url();?>main/edit_addinfo"><span class="glyphicon glyphicon glyphicon-align-justify" aria-hidden="true"></span> &nbsp;Additional Info</a></li>
</ul>
</div>

<?php
echo form_open('main/edit_skills');
  $this ->load->model('model_users');
$selectedskills = $this->model_users->appSkills();
$skills = $this->model_users->getSkills();

?>

<!-- SKILLS -->
<div class="ep_edit_skills">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><h2 align="center"><font face="Bebas">Skills</font></h2></h3>
  </div>
  <div class="panel-body">
        <!--Start of skills-box class-->

        <br><br>
          <div class="skills-box">


 <?php



                          echo "<h4><b>". "Your current skills:" . "</b></h4>";

                            foreach ($selectedskills as $oskills) {

                              $val = $oskills['skills'];
                              $removedcomma = explode(",", $val);

                              foreach ($removedcomma as $key) {
                                 echo "<p><span class='label label-primary'>$key</span></p>";

                              }
                            }
                  ?>



              <select class="js-example-basic-multiple" multiple="multiple" width="50%" name="skills[]">
                <?php

                             foreach ($skills as $oskills) {

                               echo "<option value='$oskills[skill_name]'>$oskills[skill_name]</option>";
                                 }
                      ?>

              </select>          </div>
          <?php echo form_error('skills');?>
          <!--End of skills-boxes class-->
          <br><br><br>
         <center> <input class="btn btn-primary btn-lg" type="submit" value="Save Changes" role="button"></a>
          <a class="btn btn-default btn-lg" href="#" role="button">Cancel</a> </center>

</div>

<!-- SKILLS -->
</div></div></form>
<script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
    </script>