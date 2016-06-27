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
            <li><a href="<?php base_url()?>main/view_resume">View Resume</a></li>
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
            <li><a href="<?php echo base_url();?>main/FAQs">View FAQs</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>main/logout"><span class="glyphicon glyphicon-log-out glyphicon-align-left" aria-hidden="true"></span>Sign out</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br><br><br>
<h1 align="center"><font face="Bebas">Interview Schedule</font></h1>

<center>
 <div class="container">
<nav class="navbar navbar-default">
  <div class="container-fluid">
  <table class="table table-hover" align="center">

  <th>Interview Date</th>
  <th>Day</th>
  <th>Interview Time</th>
  <th>Requirements</th>
  <th>Job Title</th>
  <th>Job Description</th>
  <th>Action</th>
   <?php
     $this->load->model('model_users');
        $id = $this->session->userdata('applicant_id');


 $interview = $this->model_users->get_interviewsched();

 $skype = $this -> model_users -> getskypeid($_SESSION['applicant_id']);


 foreach ($interview as $key) {

  echo "<tr>";

  echo "<td>".$key['int_date']."</td>";
  echo "<td>".$key['day']."</td>";
  echo "<td>".$key['time']."</td>";
  echo "<td>".$key['req_cmt']."</td>";


    echo "<td>".  $key['job_title']."</td>";

    echo   "<td>". $key['job_desc']."</td>";






  echo "<td>";



echo "

<button type='button' class='btn btn-success '  data-toggle='modal' data-target='#$key[int_id]'>
  Respond
</button>

<!-- Modal -->
<div class='modal fade' id='$key[int_id]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>Respond to Interview</h4>
      </div>
      <div class='modal-body'>";


  echo "<font face='Bebas'><b>are you going to the scheduled interview?</b></font>";
  echo "<br>";
  echo "<br>";
  echo "<B>Date:</B>";


  echo $key['int_date'];
  echo "<br>";
  echo "<B>Time:</B>";
  echo $key['time'];
  echo "<br>";


  echo form_open('main/interview_respond/'.$key['job_id']);

  echo form_hidden("hrid", $key['int_hr_id']);
  echo form_hidden('intevID', $key['int_id']);
  echo  "<select id='a' class='form-control' name='respond'>
               ";


        echo "<option value='1'>Personal Interview</option>";

        foreach ($skype as $key2) {

              if(empty($key2['skypeuser'])){
                  $disable = " disabled selected='disable' ";
                  $addon = "(you must have skypeuser)";
              }


         echo "<option value='5' $disable >Skype Interview  $addon </option>";


      }



    echo  "</select>";

   echo "</div>

      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      <input class='btn  btn-primary' type='submit' value='Okay'>
        </form>
      </div>
    </div>
  </div>
</div>
" ;









 echo "  </td>";

  echo  "</tr>";
}



  ?>

  </table>


</center>


<!-- select id="leave" onchange="leaveChange()">
  <option value="1">YES</option>
  <option value="2">NO</option>

</select>

<div id="message"><input type="text"></div>

<script>
function leaveChange() {
    if (document.getElementById("leave").value != "1"){
        document.getElementById("message").innerHTML ="asdsa";
    }
   else{
    document.getElementById("message").innerHTML = "";
   }
}
</script>
 -->

