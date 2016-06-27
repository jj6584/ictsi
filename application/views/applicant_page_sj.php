<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>js/nav.js"></script> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

    <style type ="text/css">
      th, td {
        padding: 15px;
        text-align: left;
      }
    </style>
  </head>
<body>
<?php
$fname = $this->session->userdata('fname');
    $mname = $this->session->userdata('mname');
    $lname = $this->session->userdata('lname');
    $college = $this->session->userdata('college');
    $college_yr = $this->session->userdata('college_inc');
    $course = $this->session->userdata('college_de');
    $program = $this->session->userdata('collegeprog');

$middlename = mb_substr($mname,0,1);
    $fullname = $fname ." ". $middlename .". ". $lname;

     $this->load->model('model_users');
 $photos = $this->model_users->get_profpic($this->session->userdata('applicant_id'));

 $notificationNum = $this->model_users->getInterviewNotif();

 $allnotificationNum = $notificationNum;



?>
<nav class="navbar navbar-default">
  <div class="container-fluid" style="

  background-color: <?php if($_SESSION['level'] == 2){
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
       <a class="navbar-brand" href="<?php echo base_url();?>main/dashboard">
        <img alt="Brand" src="<?php echo base_url();?>images/logo.png" style="margin-top:-9px;">
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


         <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">More<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Interview</strong></li>
            <li><a href="<?php echo base_url();?>main/interviewsched">Interview Schedule</a></li>

                <li role="separator" class="divider"></li>
                <li><strong>&nbsp;&nbsp;&nbsp;Checklist</strong></li>
            <li><a href="<?php echo base_url();?>main/checklist">Upload files </a></li>



          </ul>
        </li>
      </ul>



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
            <li><a href="<?php echo base_url();?>main/FAQs">View FAQs</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>main/logout"><span class="glyphicon glyphicon-log-out glyphicon-align-left" aria-hidden="true"></span>Sign out</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php
  $foldername = sha1($_SESSION['applicant_id']);
 foreach ($photos as $key) {

  ?>
<div class="sj2">
<div class="applicant-img">
<img src="<?php echo base_url();?>users/<?php  if($key){echo "$foldername/" . $key;}else{echo 'icon.gif';}?>" alt="..." width="200px" height="200px"class="img-thumbnail">
</div>
<?php } ?>

<h4 class="applicant-name"><?php echo $fullname;?></h4>
<div class="applicant-info">

  <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <small>San Jose Del Monte Bulacan</small>
  <br>
  <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <small>Web Designer</small>
  <br>
  <span class="glyphicon glyphicon-education" aria-hidden="true"></span> <small><?php echo $college;?></small>
</div>

<br>
<a href="<?php echo base_url();?>main/edit_skills" class="btn btn-info edit-profile" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Edit Profile</a>
<?php
    $skills =  $_SESSION['skills'];

    $var = explode(',', $skills);



?>

<p class="skills-info">Skills</p>
<div class="applicant-skills">
<?php
  foreach ($var as $newskills) {


?>
<span class="badge badge-success" style=""><?php echo $newskills; ?></span>

<?php
}
?>
</div>
</div>

<div class="sj">
<a href="<?php echo base_url();?>main/dashboard"><button class="nav3">Job Suggestion</button></a>
<a href="<?php echo base_url();?>main/savejobs"><button class="nav4">Saved Jobs</button></a>

<div class="">
    <table class="table" width="100%" cellpadding="10">
      <thead>
          <th>Job Title</th>
          <th>Date Added</th>
          <th></th>
      </thead>
        <?php

                    $datas  = $this -> model_users -> getSavejobs();

                        $this -> load -> model('model_users');
                          foreach($datas as $data)
                           {

                                // $str = $this -> model_users -> convert_datetime($data['date_added']);
                                // $timestamp = $this -> model_users -> makeAgo($str);
                              echo "<tr>";
                              echo "<td>" . anchor('main/job_description/'.$data['job_id'].'',$data['job_title']) . "</td>";

                            //  echo "<td>" . $data['job_skills'] . "</td>";
                              echo "<td>" . $data['date_added'] . "</td>";

                           }
                    ?>


    </table>
</div>

</div>

<p class="announcements-info">ANNOUNCEMENTS</p>
        <div class="announcements col-md-3">
            <div class="panel-body">
                <div class="scrollit" id="style-1">
                  <table>
                    <tr>
                  <?php
                    $this->load->model('model_users');
                    $announcement2 = $this -> model_users -> get_announcement();
                    foreach ($announcement2 as $value) {
                      echo "<tr>";
                      echo "<td>";
                      echo "<div class='list-group list-group-item'>
                             

                                <p class='list-group-item-heading'><font color='red'><b>" . $value['announcement_title'] ."</b></font></p>
                                <p class='list-group-item-text'>". $value['announcement_desc'] ."</p>
                              
                            </div>";
                      echo "</td>";
                      echo "</tr>";
                    }

                  ?>
                </tr>
                </table>
                    
                    
                </div>
            </div>
        </div>


</body>

</html>