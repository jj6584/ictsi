<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/nav.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

    <style type ="text/css">

</style>
  </head>
<body>

<?php

$this->load->model('model_users');
 $notificationNum = $this->model_users->getInterviewNotif();

 $allnotificationNum = $notificationNum;

?>
<nav class="navbar navbar-default">
  <div class="container-fluid" style="background-color: #FB8F40">
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

          <li class="dropdown" style="background-color: #FB8F40">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">Account<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;My Applications</strong></li>
            <li><a href="#">View Application</a></li>
            <li role="separator" class="divider"></li>
            <li><strong>&nbsp;&nbsp;&nbsp;Saved Jobs</strong></li>
            <li><a href="#">View Saved Jobs</a></li>
          </ul>
        </li>


         <li class="dropdown" style="background-color: #FB8F40">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">More<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Interview</strong></li>
            <li><a href="<?php echo base_url();?>main/interviewsched">Interview Schedule</a></li>
          </ul>
        </li>
      </ul>



        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span style="font-size: 1.0em;" class="glyphicon glyphicon-bell" aria-hidden="true"></span>
          <?php if($allnotificationNum){?>
          <span class="badge badge-inverse"><?php echo $allnotificationNum;?></span>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span style="font-size: 1.5em;" class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="#">Update Profile</a></li>
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




<div class="search-box ">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Search Job</h3>
  </div>
  <div class="panel-body">
   <form action="<?=base_url()?>main/search_job" method="post">
  <div class="form-group">
    <label for="question"></label>
    <input type="question" class="form-control" id="question" name="job" placeholder="Search for a job">
  </div>
<button type="submit" class="btn btn-success pull-right"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span>   Search</button>
  </form>
  </div>
</div>
</div>

<div class="joblists">

<div class="panel panel-primary">
  <div class="panel-body">


  <center><h3>Open Jobs</h3></center>

 <?php 
$this->load->model('model_users');
if(!isset($_SESSION['pol'])){
foreach ($searched as $data   ){
  

  echo "<div class='panel-group'>";
   if ($data['job_id']%2==0){
 echo "   <div class='panel panel-info'>";
}else{
 echo "   <div class='panel panel-success'>"; 
}
echo "      <div class='panel-heading'>
        <h4 class='panel-title'>";
       
       
  echo "<a data-toggle='collapse' href=#".$data['job_id'].">".$data['job_title']."</a>
        </h4>
      </div>
      <div id=".$data['job_id']." class='panel-collapse collapse'>
       <div class='panel-body'>Work Area: <br>".$data['work_area']."</div>
       <div class='panel-body'>Skills: <br>".$data['job_skills']."</div>
       <div class='panel-body'>Work Experience: <br>".$data['work_exp']."</div>
       <div class='panel-body'>Highest Attainment: <br>".$data['highest_att']."</div>
       <div class='panel-body'>Expected Salary: <br>".$data['exp_salary']."</div>
       <div class='panel-body'>Employment Type: <br>".$data['employment_type']."</div>";

echo " <div class='panel-footer'>";
if($this->model_users->savedisable($data['job_id'])){
echo "".anchor('main/delete_sjobs/'.$data['job_id'].'',"<input type='button' class='btn btn-danger' data-toggle='tooltip' value='unsave' data-placement='right' title='Remove Jobright'");
}else{
  echo "".anchor('main/insertsavejobs/'.$data['job_id'].'',"<input type='button' class='btn btn-success' data-toggle='tooltip' value='Save job' data-placement='right' title='Remove Jobright'");

}
echo "".anchor('main/job_description/'.$data['job_id'].'',"<input type='button' class='btn btn-default' data-toggle='tooltip' value='See more description' data-placement='right' title='Remove Jobright'"); 



echo "</div>";
//         if($this->model_users->savedisable($data['job_id'])){
//   echo "meron na ";
// }else{
//   echo "wala  pa";
// }


   echo "
       
      </div>
    </div>
  </div>";

}
}else{
echo "<div class='alert alert-danger' role='alert'>".$_SESSION['pol']."</div>";

}
 ?>











  </div>
</div>

</div>

