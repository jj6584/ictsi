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


<div class="ep_edit_addinfo">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><p align="center"><font face="Bebas" size="10px">Additional Information </font></p></h3>
  </div>
  <div class="panel-body">

<!-- SKILLS -->

 <?php echo form_open('main/edit_addinfo')?>

        <p align="center"><font face="Nexa Light" size="3px">Expected Salary: </font></p>
  <div class="dropdown3">

  <!--1st Choice Dropdown-->
  <div class="form-group">

    <select class="form-control" id="sel1" name="salary">
      <option value="">Choose a Salary</option>
      <option value="10000">P 10,000.00</option>
      <option value="20000">P 20,000.00</option>
      <option value="30000">P 30,000.00</option>
      <option value="40000">P 40,000.00</option>
      <option value="50000">P 50,000.00</option>
      <option value="60000">P 60,000.00</option>
      <option value="70000">P 70,000.00</option>
      <option value="80000">P 80,000.00</option>
      <option value="90000">P 90,000.00</option>
      <option value="100000">P 100,000.00</option>
    </select>


  </div>  <!--End of form-group class-->
  </div> <!--End of dropdown1 class-->
  <br><br><br>
 <p align="center"><font face="Nexa Light" size="3px">Working Experience: </font></p>



  <div class="expi">
    Year:
    <input type="text" class="form-control" name="year" placeholder="How many years?" name="years">
  </div>

    <div class="expi-as">
    as a/an:
    <input type="text" class="form-control"  placeholder="Position" name="position">
  </div>




<br><br><br><br>

         <center> <input class="btn btn-primary btn-lg" type="submit" value="Save Changes" role="button"></a>
          <a class="btn btn-default btn-lg" href="#" role="button">Cancel</a> </center>


</div>
<!-- SKILLS -->
</form>
</div>
</div>

