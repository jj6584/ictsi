`<html>
  <head>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>js/nav.js"></script> -->

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
          <ul class="dropdown-menu".
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

<!-- START ABOUT ME -->
<div class="ep_menu">

<ul class="nav nav-pills nav-stacked " >
  <li role="presentation" ><a href="<?php echo base_url();?>main/edit_skills"><span class="glyphicon glyphicon glyphicon-list-alt" aria-hidden="true"></span> &nbsp;Skills</a></li>
  <li role="presentation"><a href="<?php echo base_url();?>main/edit_education"> <span class="glyphicon glyphicon glyphicon-book" aria-hidden="true"></span> &nbsp; Education</a></li>
  <li role="presentation" ><a href="<?php echo base_url();?>main/edit_aboutme"> <span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp; About me</a></li></a></li>
  <li role="presentation" ><a href="<?php echo base_url();?>main/edit_addinfo"><span class="glyphicon glyphicon glyphicon-align-justify" aria-hidden="true"></span> &nbsp;Additional Info</a></li>

</ul>
</div>

<div class="ep_edit_aboutme">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><h2 align="center"><font face="Bebas">About me</font></h2></h3>
  </div>
  <div class="panel-body">

<?php
 $this->load->model('model_users');
 $photos = $this->model_users->get_profpic($this->session->userdata('applicant_id'));
 $foldername = sha1($_SESSION['applicant_id']);
foreach ($photos as $key) {

?>
<!-- UPDATE PROFILE PICTURE -->
<br><br>
      <center>  <img  alt="Brand" src="<?php echo base_url();?>users/<?php  if($key){echo "$foldername/" . $key;}else{echo 'icon.gif';}?>"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100" ></center>

<!-- Button trigger modal -->
<br>
<center><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
  Upload Profile Picture
</button></center>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Profile Picture</h4>
      </div>
      <div class="modal-body">

          <?php ?>
                   <div class="form-group">
                   <?php echo form_open_multipart('main/update_profilepic');?>
                              <label for="exampleInputFile"><h3>Upload New Image</h3></label>
                              <input type="file" id="exampleInputFile" name="userfile">
                              <p class="help-block">Image size: 1500 x 700 pixels</p>

                          </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input class="btn  btn-primary" type="submit" value="Upload Image">
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end UPDATE PROFILE PICTURE -->


<?php } ?>



<?php echo form_open('main/edit_aboutme');

$this->load->model('model_users');
$vars = $this->model_users->get_education($this->session->userdata('applicant_id'));


foreach ($vars as $var) {



?>
<!--First Name Field-->
    <div class="reg-fname1 form-group <?php if(form_error('fname')){echo "has-error";}?>">
      First Name:
      <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $var['fname'];?>">

  </div>

  <!--Middle Name Field-->
  <div class="reg-mname1 form-group <?php if(form_error('mname')){echo "has-error";}?>">
    Middle Name:
    <input type="text" class="form-control" placeholder="Middle Name" name="mname" value="<?php echo $var['mname'];?>" >
  </div>

  <!--Last Name Field-->
  <div class="reg-lname1 form-group <?php if(form_error('lname')){echo "has-error";}?>">
    Last Name:
    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $var['lname'];?>" >
  </div>
  <br />
<br />
<br><br>
<br>
  <div class="reg-sex1">
    <p><font face="Nexa Light" size="3px">Sex: </font></p>
  </div>
  <!--Start of check-boxes class-->
  <div class="radio-boxes form-group <?php if(form_error('gender')){echo "has-error";}?>">
    <label class="radio-inline"><input type="radio" value="Male" name="gender">Male</label>
    <label class="radio-inline"><input type="radio" value="Female" name="gender">Female</label>

  </div>
  <!--End of check-boxes class-->


  <!--Citizenship Field-->
  <div class="reg-citizenship1 form-group <?php if(form_error('citizenship')){echo "has-error";}?>">
    Citizenship:
      <input type="text" class="form-control" placeholder="Citizehship" name="citizenship" value="<?php echo $var['citizenship'];?>">
  </div>

  <!--Religion Field-->
  <div class="reg-religion1 form-group <?php if(form_error('religion')){echo "has-error";}?>">
    Religion:
    <input type="text" class="form-control" placeholder="Religion" name="religion" value="<?php echo $var['religion'];?>">
  </div>
<br><br><br><br>
  <div class="reg-city1">
    City:
    <select class="form-control form-group <?php if(form_error('city')){echo "has-error";}?>" id="sel1" name="city">
          <option value="<?php echo $var['city_add'];?>" selected><?php echo $var['city_add'];?></option>
          <option value="Alaminos">Alaminos</option>
          <option value="Angeles">Angeles</option>
          <option value="Antipolo">Antipolo</option>
          <option value="Bacolod">Bacolod</option>
          <option value="Bacoor">Bacoor</option>
          <option value="Bago">Bago</option>
          <option value="Bago">Bais</option>
          <option value="Balanga">Balanga</option>
          <option value="Batac">Batac</option>
          <option value="Batangas">Batangas</option>
          <option value="Bayawan">Bayawan</option>
          <option value="Baybay">Baybay</option>
          <option value="Biñan">Biñan</option>
          <option value="Bislig">Bislig</option>
          <option value="Bogo">Bogo</option>
          <option value="Borongan">Borongan</option>
          <option value="Butuan">Butuan</option>
        </select>
  </div>

  <div class="reg-state1 form-group <?php if(form_error('state')){echo "has-error";}?>">
    State:
    <select class="form-control" id="sel2" name="state">
          <option value="<?php echo $var['state'];?>"><?php echo $var['state'];?></option>
          <option value="Agusan del Norte">Agusan del Norte</option>
          <option value="Agusan del Sur">Agusan del Sur</option>
          <option value="Albay">Albay</option>
          <option value="Basilan">Basilan</option>
        </select>
  </div>
<br>

  <!--Contact Number Field-->
  <div class="reg-contact1 form-group <?php if(form_error('contact')){echo "has-error";}?>">
    Contact No.:
    <input type="text" class="form-control" placeholder="Contact No." name="contact" value="<?php echo $var['contact'];?>">
  </div>

  <!--Email Address Field-->
  <div class="reg-email1 form-group <?php if(form_error('email')){echo "has-error";}?>">
    Email Address:
    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $var['email'];?>">
  </div>

  <!--Birthday Field-->
  <div class="reg-month1 form-group <?php if(form_error('bday')){echo "has-error";}?>">
    Birthday:
    <select class="form-control" id="sel3" name="bdaym">

          <option value="">Month</option>
          <option value="01">January</option>
          <option value="02">February</option>
          <option value="03">March</option>
          <option value="04">April</option>
          <option value="05">May</option>
          <option value="06">June</option>
          <option value="07">July</option>
          <option value="08">August</option>
          <option value="09">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
      </select>
  </div>

  <div class="reg-day1 form-group <?php if(form_error('bday')){echo "has-error";}?>">
    <select class="form-control" id="sel4" name="bdayd">
          <option value="">Day</option>

            <?php

              for($x =1; $x<=31; $x++){

                  echo "<option value='$x'>$x</option>";
              }
            ?>
      </select>
  </div>

  <div class="reg-year1 form-group <?php if(form_error('bday')){echo "has-error";}?>">
    <select class="form-control" id="sel5" name="bdayy">
          <option value="">Year</option>


              <?php

                  for($x=1900; $x<=date('Y'); $x++){

                      echo "<option value='$x'>$x</option>";
                  }

              ?>
      </select>
  </div>




  <?php } ?>
  <!--  <center><font face="bebas" color="red"><?php echo $_SESSION['result'];?></font></center> --><br><br><br><br>
 <br>          <center> <input class="btn btn-primary btn-lg" type="submit" value="Save Changes" role="button"></a>
            <a class="btn btn-default btn-lg" href="#" role="button">Cancel</a> </center>
</div></div></div>

<!-- END ABOUT ME -->

</form>











<script type="text/javascript">$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})</script>
