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
<!-- EDUCATION -->
<?php echo form_open('main/edit_education');?>
<div class="ep_edit_education">
<br><div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">  <p align="center"><font face="Bebas" size="10px">Educational Background</font></p></h3>
  </div>
  <div class="panel-body">
  <?php $this->load->model('model_users');
$vars = $this->model_users->get_education($this->session->userdata('applicant_id'));

    foreach ($vars as $var) {



  ?>
  <div class="reg-attainment form-group <?php if(form_error('ha')){echo "has-error";}?>">
  Highest Attainment:
   <select class="form-control" id="sel1" name="ha" value="<?php echo $var['highest_att'] ?>">
                      <option value="<?php echo $var['highest_att']; ?>" selected><?php echo $var['highest_att'] ?></option>
                      <option value="Vocational">Vocational Diploma / Short Couse Certificate</option>
                      <option value="Bachelors/College Degree">Bachelor's/College Degree</option>
                      <option value="Graduate Studies">Post Graduate Diploma / Master's Degree</option>
                      <option value="doctorate">Doctorate Degree</option>
                      <option value="Passed Licensure Exam">Professional License (Passed Board/Bar/Professional License Exam)</option>


                </select>
  </div>

  <!--Start of College-->
  <!--College Field-->


    <div class="reg-college form-group <?php if(form_error('college')){echo "has-error";}?>">
      College:
      <input type="text" class="form-control" placeholder="School" name="college" value="<?php echo $var['college'];?>">
  </div>

  <!--Degree Earned Field-->
  <div class="reg-college-deg form-group <?php if(form_error('college_de')){echo "has-error";}?>">
  Degree Earned:
    <select class="form-control" id="sel1" name="college_de" value="<?php echo $var['college_de'];?>">
      <option value="<?php echo $var['college_de'];?>"><?php echo $var['college_de'];?></option>
      <option value="Bachelor of Arts (B.A.)">Bachelor of Arts (B.A.)</option>
      <option value="Bachelor of Science (B.S.)">Bachelor of Science (B.S.)</option>
      <option value="Bachelor of Fine Arts (B.F.A.)">Bachelor of Fine Arts (B.F.A.)</option>
    </select>
  </div>

     <!--Program Field-->

  <div class="reg-college-program form-group <?php if(form_error('collegeprog')){echo "has-error";}?>">
   Program:
    <select class="form-control" id="sel1" name="collegeprog" value="<?php echo $var['collegeprog'];?>">
      <option value="<?php echo $var['collegeprog'];?>" selected>Current Program:<?php echo $var['collegeprog'];?></option>
      <optgroup label="Engineering">
      <option value="Engineering, Civil Engineering">Civil Engineering</option>
      <option value="Engineering, Industrial Engineering">Industrial Engineering</option>
      <option value="Engineering, Electrical Engineering">Electrical Engineering</option>
      <option value="Engineering, Computer Engineering">Computer Engineering</option>
      <option value="Engineering, Mechanical Engineering">Mechanical Engineering</option>
      </optgroup>
      <optgroup label="Computer Studies">
      <option value="Computer Studies, Information Technology">Information Technology</option>
      <option value="Computer Studies, Computer Science">Computer Science</option>
      <option value="Computer Studies, Multimedia Arts">Multimedia Arts</option>
      </optgroup>

    </select>
  </div>
  <!--End of Program Field-->

     <!--Inclusive Dates Field-->
  <div class="reg-college-indates form-group <?php if(form_error('college_inc')){echo "has-error";}?>">
  Year Graduated:
    <input type="text" class="form-control" placeholder="year graduated" name="college_inc" value="<?php echo $var['college_inc'];?>">
  </div>
  <!--End of College-->

  <?php }


  ?>
  <br>
  <center><font face="bebas" color="red"><?php echo $_SESSION['result'];?></font></center>
  <br>
         <center> <input class="btn btn-primary btn-lg" type="submit" value="Save Changes" role="button"></a>
          <a class="btn btn-default btn-lg" href="#" role="button">Cancel</a> </center>

</div></div></div></form>
<!-- END EDUCATION -->