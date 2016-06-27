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

 $notificationNum = $this->model_users->getInterviewNotif();

 $allnotificationNum = $notificationNum;



?>
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
            <li role="separator" class="divider"></li>
            <li><strong>&nbsp;&nbsp;&nbsp;Checklist</strong></li>
            <li><a href="<?php echo base_url();?>main/uploadfiles">Upload Files</a></li>
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

<div class="upload-box">


      

      <hr>

      <br> <br>

                   <?php
                        if(isset($_SESSION['uploadedsuccess'])){
                            echo $_SESSION['uploadedsuccess'];
                        }
                        if(isset($_SESSION['uploadedfailed'])){
                            echo $_SESSION['uploadedfailed'];
                        }

                        $check = $this -> model_users -> checkfilestatus($_SESSION['applicant_id']);
                        foreach ($check as $nvar) {



                ?>

    <div class="upload1">

      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Upload Police Clearance
        </a>
          <?php
             if($nvar['file_pc_status'] == 1){


          ?>
        <span class="glyphicon glyphicon-check pull-right" aria-hidden="true"></span>
        <?php } ?>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <br>

<br>
          <div class="upload-content-box">
            <div class="form-group">
                    <label for="exampleInputFile"><h3>Upload File</h3></label>
                    <p class="help-block">Upload your image as (.jpg or .png) file format.</p>

                  <?php
                        if($nvar['file_pc_status'] == 0){
                  echo form_open_multipart('main/upload_files');?>
                    <input type="file" id="exampleInputFile" name="userfile">
                    <p class="help-block">Image must be in High resolution</p>
                    <input class="btn btn-primary pull-right" type="submit" value="Upload File">
                    <?php echo form_close();
                            }
                     ?>
            </div>
          </div>
      </div>
    </div>
  </div>


</div>
<!-- end of pc -->


<div class="panel-group" id="birth" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="birthasd">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#birth" href="#222" aria-expanded="true" aria-controls="collapseOne">
          Upload Birth certificate
        </a>
         <?php
             if($nvar['file_birth_status'] == 1){


          ?>
        <span class="glyphicon glyphicon-check pull-right" aria-hidden="true"></span>
        <?php } ?>
      </h4>
    </div>
    <div id="222" class="panel-collapse collapse" role="tabpanel" aria-labelledby="birthasd">
      <div class="panel-body">
        <br>

<br>
          <div class="upload-content-box">
            <div class="form-group">
                    <label for="exampleInputFile"><h3>Upload File</h3></label>
                    <p class="help-block">Upload your image as (.jpg or .png) file format.</p>

                  <?php
                    if($nvar['file_birth_status'] == 0){
                  echo form_open_multipart('main/upload_files1');?>
                    <input type="file" id="exampleInputFile" name="uploadbirth">
                    <p class="help-block">Image must be in High resolution</p>
                    <input class="btn btn-primary pull-right" type="submit" value="Upload File">
                    <?php echo form_close();
                      }
                    ?>
            </div>
          </div>
      </div>
    </div>
  </div>


</div>
<!-- end of BIRTHcert -->

  <div class="panel-group" id="sss" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="sss123">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#sss" href="#sssasd" aria-expanded="true" aria-controls="collapseOne">
          Upload SSS ID
        </a>
        <?php
             if($nvar['file_sss_status'] == 1){


          ?>
        <span class="glyphicon glyphicon-check pull-right" aria-hidden="true"></span>
        <?php } ?>
      </h4>
    </div>
    <div id="sssasd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sss123">
      <div class="panel-body">
        <br>

<br>
          <div class="upload-content-box">
            <div class="form-group">
                    <label for="exampleInputFile"><h3>Upload File SSS</h3></label>
                    <p class="help-block">Upload your image as (.jpg or .png) file format.</p>

                  <?php

                  if($nvar['file_sss_status'] ==0 ){
                  echo form_open_multipart('main/upload_sss');?>
                    <input type="file" id="exampleInputFile" name="uploadsss">
                    <p class="help-block">Image must be in High resolution</p>
                    <input class="btn btn-primary pull-right" type="submit" value="Upload File">
                    <?php echo form_close();
                      }
                     ?>
            </div>
          </div>
      </div>
    </div>
  </div>


</div>
<!-- end of SSS -->


<div class="panel-group" id="pagibig" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="pagibig123">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#pagibig" href="#pagibigasd" aria-expanded="true" aria-controls="collapseOne">
          Upload PAGIBIG ID
        </a>
        <?php
             if($nvar['file_pagibig_status'] == 1){


          ?>
        <span class="glyphicon glyphicon-check pull-right" aria-hidden="true"></span>
        <?php } ?>
      </h4>
    </div>
    <div id="pagibigasd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="pagibig123">
      <div class="panel-body">
        <br>

<br>
          <div class="upload-content-box">
            <div class="form-group">
                    <label for="exampleInputFile"><h3>Upload File PAGIBIG ID</h3></label>
                    <p class="help-block">Upload your image as (.jpg or .png) file format.</p>

                  <?php

                    if($nvar['file_pagibig_status'] == 0){
                  echo form_open_multipart('main/upload_pagibig');?>
                    <input type="file" id="exampleInputFile" name="uploadpagibig">
                    <p class="help-block">Image must be in High resolution</p>
                    <input class="btn btn-primary pull-right" type="submit" value="Upload File">
                    <?php echo form_close();
                      }
                    ?>
            </div>
          </div>
      </div>
    </div>
  </div>


</div>
<!-- end of PAGIBIG -->



<div class="panel-group" id="nbi" role="tablist" aria-multiselectable="true">
  <div class="panel panel-primary">
    <div class="panel-heading" role="tab" id="nbi123">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#nbi" href="#nbiasd" aria-expanded="true" aria-controls="collapseOne">
          Upload NBI Clearance
        </a>
        <?php
             if($nvar['file_nbi_status'] == 1){


          ?>
        <span class="glyphicon glyphicon-check pull-right" aria-hidden="true"></span>
        <?php } ?>
      </h4>
    </div>
    <div id="nbiasd" class="panel-collapse collapse" role="tabpanel" aria-labelledby="nbi123">
      <div class="panel-body">
        <br>

<br>
          <div class="upload-content-box">
            <div class="form-group">
                    <label for="exampleInputFile"><h3>Upload File</h3></label>
                    <p class="help-block">Upload your image as (.jpg or .png) file format.</p>

                  <?php
                    if($nvar['file_nbi_status'] == 0){
                  echo form_open_multipart('main/upload_nbi');?>
                    <input type="file" id="exampleInputFile" name="uploadnbi">
                    <p class="help-block">Image must be in High resolution</p>
                    <input class="btn btn-primary pull-right" type="submit" value="Upload File">
                    <?php echo form_close();
                      }
                     ?>
            </div>
          </div>
      </div>
    </div>
  </div>


</div>
<!-- end of PAGIBIG -->








</div>
<?php
    }
?>




</html>