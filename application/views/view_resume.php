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


    $fullname = $fname ." ". $mname .". ". $lname;

     $this->load->model('model_users');
 $photos = $this->model_users->get_profpic($this->session->userdata('applicant_id'));

 $notificationNum = $this->model_users->getInterviewNotif();

 $allnotificationNum = $notificationNum;



?>
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
       <a class="navbar-brand" href="<?php echo base_url();?>main/dashboard">
        <img alt="Brand" src="<?php echo base_url();?>images/logo.png" style="margin-top:-9px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>main/joblist"><font color="White">Search Opportunities</font></a></li>

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">Account<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Resume</strong></li>
            <li><a href="<?php echo base_url()?>main/view_resume">View Resume</a></li>
            <li role="separator" class="divider"></li>
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

<BR>
<font face="Bebas"><center><h1>RESUME</h1></center></font>
<div class ="resume">

<div class="name">
      <h1><?php
      echo $fullname;
      ?></h1>
      <p><?php echo $college;?></p>
</div>


  <!-- IMAGE BOX -->
    <div class="img-box">
	<?php
   $foldername = sha1($_SESSION['applicant_id']);
  ?>
       <?php foreach ($photos as $key) { ?>
       <img src="<?php echo base_url();?>users/<?php  if($key){echo "$foldername/" . $key;}else{echo 'icon.gif';}?>" alt="..." width="200px" height="200px"class="img-thumbnail">
<?php } ?>
     </div>
  <!-- END IMAGE BOX -->
<br />
      <h1>&nbsp;&nbsp;&nbsp;&nbsp;<b>Personal Details</b></h1>
     <center><b>____________________________________________________________________________________________</b></center>






     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

     <table border="0" style="width:90%; margin-left:6%" align="center">
     <tr>
      <td>
       <i> Birth </i>
      </td>
       <td>
        <?php  echo "<font face='Century Gothic'>".$details['birthday']."</font>"; ?>
      </td>
     </tr>

      <tr>
      <td>
        <i>Address</i>
      </td>

       <td>
        <?php echo "<font face='Century Gothic'>".$details['city_add'].",".$details['state']."</font>"; ?>
      </td>
     </tr>

      <tr>
      <td>
      <i>  Contact</i>
      </td>

       <td>
        <?php       echo "<font face='Century Gothic'>".$details['contact']."</font>"; ?>
      </td>
     </tr>


      <tr>
      <td>
       <i> Email</i>
      </td>

       <td>
        <?php       echo "<font face='Century Gothic'>".$details['email']."</font>"; ?>
      </td>
     </tr>


     </table>
      <br>


       <h1>&nbsp;&nbsp;&nbsp;&nbsp;<b>Education</b></h1>
     <center><b>____________________________________________________________________________________________</b></center>

     <div style="width=90%; margin-left:6%;">
     <font style="Century Gothic">
     <?php
     echo "<b>".$details['college']."</b>";
     echo "<br>";
     echo $details['collegeprog'];
     echo "<br>";
     echo $details['highest_att'];
     echo "<br>";
     echo $details ['college_inc'];

     ?>
     </font>
     </div>

     <br>



      <h1>&nbsp;&nbsp;&nbsp;&nbsp;<b>Skills</b></h1>
     <center><b>____________________________________________________________________________________________</b></center>
  <!-- END OF INFO BOX -->

</div>
