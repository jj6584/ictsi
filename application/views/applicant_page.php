<html>
  <head>
<?php
		error_reporting(0);
?>
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
    $province = $this->session->userdata('province');
    $city = $this -> session -> userdata('city');



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


         <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">More<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Interview</strong></li>
            <li><a href="<?php echo base_url();?>main/interviewsched">Interview Schedule</a></li>

                <?php
            if($_SESSION['status'] == 2){
    ?>
                <li role="separator" class="divider"></li>
                <li><strong>&nbsp;&nbsp;&nbsp;Checklist</strong></li>
            <li><a href="<?php echo base_url();?>main/checklist">Upload files </a></li>

<?php   } ?>



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

  <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <small><?php echo $_SESSION['city'].",".$_SESSION['province'];?></small>
  <br>

  <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <small><?php echo $program?></small>
  <br>
  <span class="glyphicon glyphicon-education" aria-hidden="true"></span> <small><?php echo $college;?></small>
</div>

<br>
<a href="<?php echo base_url();?>main/edit_skills" class="btn btn-info edit-profile" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;&nbsp;Edit Profile</a>
<?php
    $skills =  $_SESSION['skills'];
	$ff = "";
	$sd = $this -> model_users -> getskillsz();
	  foreach ($sd as $keyskill) {
                        $ff = $keyskill['skills'];
                      }
    $var = explode(',', $ff);



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

<a href="<?php echo base_url();?>main/dashboard"><button class="nav1">Job Suggestion</button></a>
<a href="<?php echo base_url();?>main/savejobs"><button class="nav2">Saved Jobs</button></a>

<div class="">
  <?php
      if(isset($_SESSION['insertsucc'])){
          echo $_SESSION['insertsucc'];
      }

       if(isset($_SESSION['existingsavejob'])){
          echo $_SESSION['existingsavejob'];
      }


?>
<?php

    $getskype = $this -> model_users -> skypeuser($_SESSION['applicant_id']);
    foreach ($getskype as $skype) {


      if(empty($skype['skypeuser'])){
?>
<div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>

        <strong><?php echo $fname.",";?></strong> You may add your username in <strong>Skype</strong> to enable video call. &nbsp;<strong><span style="cursor: pointer" class="label label-danger" role="button" data-toggle="modal" data-target="#skype">click here!</span></strong>
    </div>





    <?php  } }

                   $ppp  = $this -> model_users -> doMatch($_SESSION['applicant_id']);
                    $datas = $this -> model_users -> doskills($_SESSION['applicant_id']);

                    $this->load->library('calendar');
                     $this -> load -> model('model_users');
    ?>

<style type="text/css">
  .table1{
    float: left;
  }

  .table2{
    float: left;
  }

  .table-size{
    width: 60%;
  }
</style>

    <table class="table" width="100%" cellpadding="10">

          <th>JOB TITLE</th>
          <th>REQUIRED SKILLS</th>
          <th>DATE ADDED</th>
          <th></th>

          <tr>

                    <?php

                     if(empty($datas)){
                          echo "<div class='alert alert-info' role='alert'><center><font size='2px'>No job matched your skills or jobs that matched your skills are closed.</font></center></div>";
                      }

                        // echo "<pre>";
                        //   print_r($datas);
                        //   echo "</pre>";
                            foreach($datas as $data)
                           {

                                //$str = $this -> model_users -> convert_datetime($data['date_added']);
                                $tr = $data['job_skills'];
                                $SKILLS = explode(",", $tr);


                  echo "<tr>";
                    echo "<td>" . anchor('main/job_description/'.$data['job_id'].'',$data['job_title']) . "</td>";
                    echo "<td>"; foreach ($SKILLS as $key) {
                                      echo "<span class='badge badge-success'>$key". "</span><br/>";
                                  }   echo"</td>";


                      echo "<td>" . $data['date_added'] . "</td>";
                      echo "<td>" . anchor('main/insertsavejobs/'.$data['job_id'].'',"<span class='label label-primary' class='btn btn-default' data-toggle='tooltip' data-placement='bottom' title='Click to save job' role='button' aria-hidden='true'>Save Job") . "</span></td>";


                      //foreach($ppp[0] as $keys)
                           //{
                              

                 echo "</tr>";

                           }

                    ?>
          </tr>

    </table>

    <div class="table-size">
  <div class="panel panel-primary">
  <div class="panel-body">
    <div class="table1">
    <table class="table">
        <tr>
          <?php 

            foreach ($datas as $key) {
            
        echo "<tr>";
        echo "<td height='43'>" . $key['job_title'] . "</td>";

}
  echo "</tr>";
?>
        </tr>
    </table>
  </div>

    <div class="table2">
      <table class="table" border="0"cellpadding="10">

          <tr>
            <?php

            echo "<tr>";
          echo "<td>";
                foreach ($ppp[0] as $keys) {
                                  echo $keys ."<br><br>";
                              }
          echo "</td>";
          echo "</tr>";
         

            ?>

          </tr> 
      </table>

    </div>
  </div>
</div>
</div>

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











<br><br><br><br>


<!-- Modal -->
                                <div class="modal fade" id="skype" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content"> 
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add skype username</h4>
                                      </div>
                                      <div class="modal-body">
                                        <?php echo form_open('main/addskype');?>


                                                                                      <div class="input-group">
                                                  <span class="input-group-addon">
                                                      <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABvElEQVQ4T31TwU3DUAx9zpcqQVsRJoAN6AakE5ReaDkBG5QJKBNAJyA3KBfKBCQblA2yAZESJED6MXZC2qQp+JJ8x//Z7z2H8BvOPJkCNCCgx4wIRD6YYyLElkyE052wrK0+pR5wHtOlFB5tKyhzDI6l8i5r7c4wJHkvgrQzga7/u1z9xsAya7X7JQht786hUrCWI71sDB1yhkk5ZRWEzDyVcyWYX+y4e4Jnds33x8CyjDtuv+jZ+foI1iB8k426U50gkuRBCWEz7uOsG5h5EgjDY82LqLNs3JlU6aomArDf0MCChhi1F3hIPEOYMMETjfYEZiGj6rtbbaYTKLfbtdoiUmaGONvJ+efxlPYcFg2A8xpdwiWZp/QCjPumC9KRKcgchDjtLPV7oxnjivJRHXpdTSBJELt1a3lhR91h7khFdNHhplikeRIXPAHbau+rx3V7ORQA79eZ9yrdEmC1TKK4L4pfajE+015eLK4UjVJ/U4ccYNNj0SQAwc//AR2b7aHkLiTn1bXisADYBtJUtZFZaVAD+U4nchbLCk3+CqH6JlR76wk2K9Wd4h9w1RUwnRRrzKEsVKBrrFd+AETi3qLFVHDVAAAAAElFTkSuQmCC"/></span>
                                                      <input type="text" class="form-control" placeholder="skype username" name="skypeuser">

                                              </div>
                                              Dont have an skype account?. <a href="https://login.skype.com/account/signup-form?client_id=360605&redirect_uri=https%3A%2F%2Fsecure.skype.com%2Fportal%2Flogin%3Freturn_url%3Dhttps%253A%252F%252Fsecure.skype.com%252Fportal%252Foverview">go to skype</a>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success">Add username</button>
                                      </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>


</body>

</html>