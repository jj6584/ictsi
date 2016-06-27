<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ICTSI - HR Administrator </title>
    <link rel="shortcut icon" href="<?php echo base_url();?>images/favicon.ico" type="image/ico">
    <!-- Bootstrap core CSS -->

    <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>fonts/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->

    <link href="<?php echo base_url();?>css/admin/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo base_url();?>css/admin/css/icheck/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/admin/css/floatexamples.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>js/jquery.datetimepicker.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>js/admin/js/jquery.min.js"></script>

    <script src="<?php echo base_url();?>js/jquery.datetimepicker.full.js"></script>

	    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>


<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo base_url();?>admin/hr_dashboard" class="site_title"><i class="fa fa-cogs"></i> <span>HR Administrator</span></a>
                    </div>
                    <div class="clearfix"></div>
  <?php


         $foldername = sha1($_SESSION['admin_id']);

        $image1 = $this->model_admin->getadmindp($_SESSION['admin_id']);




    ?>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                        <?php
                                    foreach ($image1 as $img1) {
                        ?>
                            <img src="<?php echo base_url();?>adminusers/<?php echo $foldername;?>/<?php echo $img1['profile_pic'];?>" alt="..." class="img-circle profile_img">
                            <?php
                        }
                            ?>
                        </div>
    <?php
        $fullname = $_SESSION['admin_fname'] . " ". $_SESSION['admin_mname'] ." ". $_SESSION['admin_lname'];
    ?>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2><?php echo $fullname;?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li>
                                    <a href="<?php echo base_url();?>admin/hr_dashboard"><i class="fa fa-bar-chart"></i>Dashboard</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>admin/manageEmp"><i class="fa fa-users"></i>Employees & Applicants &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Management</a>
                                </li>
								<li>
                                    <a href="<?php echo base_url();?>admin/manage_announcement"><i class="fa fa-bullhorn"></i>Manage Announcements</a>
                                </li>
                                <li><a><i class="fa fa-cog"></i> Job Management <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url();?>admin/managejobs">Create Job</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/hr_editjob">Update Job</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/job_management">Others...</a>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-line-chart"></i>Performance Evalualtion &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Form<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url();?>admin/send_PEF">Send Evaluation Form</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/update_default">Update Evaluation Form</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/manage_evaluation">Manage Evaluation Form</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/viewEvaluated">View Evaluated Employees</a>
                                        </li>
                                    </ul>
                                </li>

                                <?php
                                  if($_SESSION['admin_level'] == 32){
                                ?>
                                <li><a><i class="fa fa-calendar"></i>Schedule Activity<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">

                                        <li><a href="<?php echo base_url();?>admin/create_task">Task Management</a>

                                        </li>
                                        <li><a href="<?php echo base_url();?>admin/view_interview_sched">Interview Schedule</a>
                                        </li>

                                        <?php
                                      }else{
                                        ?>
                                        <li><a><i class="fa fa-calendar"></i>Assigned Tasks<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu" style="display: none">
                                                <li>
                                                    <a href="<?php echo base_url();?>admin/activitylist"><i class="fa fa-calendar"></i>To-do List</a>
                                                </li>
                                                <li><a href="<?php echo base_url();?>admin/view_interview_sched">Interview Schedule</a>
                                                </li>
                                                <?php } ?>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url();?>adminusers/<?php echo $foldername;?>/<?php echo $img1['profile_pic'];?>" alt=""><?php echo $fullname;?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url();?>admin/profile">  Profile</a>
                                    </li>
                                    <li><a href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>


                        <?php
                            $this -> load ->view('admin/notifs');
                        ?>
            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">

                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Job Application Summary<small> Track Applicant </small></h2>

                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

<?php
    $jobs = $this->model_admin->jobOpen();
    $getemps = $this->model_admin->getemp();
   // $tracksapp = $this ->model_admin->trackapplicant();
?>


<!--START OF APPLIED EMPLOYEES-->
<div class="hrDash">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Select Applied Employees</h3>
  </div>
  <div class="panel-body">

    <?php echo form_open(base_url()."admin/get_applicants"); ?>

    <div class="col-md-4">
        <div class="form-group">
            <select class="form-control" id="sel1" name="thejob">
                <option disabled selected>Select Availeble Job</option>
                <?php

      foreach ($jobs as $job) {
        $allcapsjobtitle = strtoupper($job['job_title']);
         echo "<option value='$job[job_id]'>$allcapsjobtitle</option>";
      }

  ?>
            </select>
        </div>
    </div>
        <div class="select-button">
            <button type="submit" class="btn btn-success ">Submit</button>
        </div>

</form>


<?php echo validation_errors();?>





<!--Start of add-FAQ-box class-->



    <!--             <?php if(validation_errors()){?>
    <div class="alert alert-danger" role="alert">
      <font size="2px"><?php echo validation_errors();?></font>

    </div>
<?php
}

?> -->
<div class="applied-tablebox">
<?php
    if(isset($_SESSION['noapplicants'])){
            echo $_SESSION['noapplicants'];
    }

if(isset($datas)){                  ?>
 <table class="table">

                <th>Name</th>
                <!-- <th>Job Decription</th> -->
                <th>last name</th>
                <th>Date added</th>
				<th>Video Resume</th>
                <th>Action</th>

            <?php



              foreach($datas as $data)
                           {

                                echo "<tr>";
                              echo "<td>" . $data['fname'] . "</td>";

                              echo "<td>" . $data['lname'] . "</td>";
                              echo "<td>" . $data['date_added'] . "</td>";
                              if(empty($data['video_link'])){
                                echo "<td>None</td>";
                              }else{
                              echo "<td width='20%'>" . "<a href ='$data[video_link]' target='_blank'> <button type='button' class='btn btn-success' >
                                                  View video resume
                                                </button></a>

                                                ";
                                  }

                                echo "</td>" ;
                              echo  "<td width='20%'><a href=".base_url("admin/view_application_info/$data[id]")." target='_blank' class='btn btn-danger'>View Application Details</a>
                                                     <a href=".base_url("admin/interview_sched/$data[id]/$data[job_id]")." class='btn btn-primary'>Send Interview Schedule

                                    </td>";


                           }





            ?>


                                    <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" style="margin-top: -10%" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Video Resume of APPLICANT'S NAME</h4>
                              </div>
                              <div class="modal-body">
                                <!-- 4:3 aspect ratio -->
                                   <iframe width="560" height="315" src="https://www.youtube.com/embed/MA1n16iyaeg" frameborder="0" allowfullscreen></iframe>
                              </div>
                            </div>
                          </div>
                        </div>

 </table>


 <?php }?>

 <?php

        if(isset($_SESSION['noapplied'])){
                echo $_SESSION['noapplied'];
        }
 ?>
 </div> <!--End of Table box-->
</div> <!--End of Panel Body-->
 </div> <!--End of panel info-->
</div><!--End of hrDash class-->
<!--END OF SELECT APPLIED EMPLOYEES-->

                                </div> <!-- /x_content -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Status<small>For Interview, For Hiring, For Hired</small></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">

<!--START OF TRACK APPLICANT STATUS-->

<div class="hrDash-track">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Track Applicant Status</h3>
  </div>
<div class="panel-body">



                <?php echo form_open('admin/trck_applicants');?>
                    <div class="col-md-4">
                        <select class="form-control" name="trkjob">
                            <option disabled selected>Select Job</option>
                            <?php

                                foreach($jobs as $job) {
                                    $capsjobtitle = strtoupper($job['job_title']);
         echo "<option value='$job[job_id]'>$capsjobtitle</option>";
      }



                            ?>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-success ">Submit</button>

                 </form>

            <?php
            $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
           $this->load->helper('date');

                    if(isset($tracksapp)){
            ?>
            <div class="track-tablebox">
                <table class="table table-hover">
                    <thead>
                        <th>Applicant's Name</th>
                        <th>Date Applied</th>
                        <th>Applicant's Status</th>
                    </thead>

                    <tbody>

                    <?php

                        foreach ($tracksapp as $key) {

                               echo "<tr>";
                              echo "<td>" . $key['fname'] . " ".$key['lname'] ."</td>";

                              echo "<td>" . $key['date_applied'] . "</td>";

                              if($key['app_status'] == 0) {
                                echo "<td>" . "<span class='label label-default'>UNDER REVIEW</span>";
                                } else if($key['app_status'] == 1) {
                                echo "<td>" . "<span class='label label-primary'>FOR INTERVIEW</span>";
                                }  else if($key['app_status'] == 2) {
                                echo "<td>" . "<span class='label label-info'>FOR HIRING</span>";
                                }  else if($key['app_status'] == 3) {
                                echo "<td>" . "<span class='label label-success'>HIRED</span>";
                                }else if($key['app_status'] == 4) {
                                echo "<td>" . "<span class='label label-danger'>NOT QULIFIED</span>";
                                }

                        }

                    ?>
                    </tbody>

                </table>
            </div>
            <?php } ?>

    </div>
    <?php

                    if(isset($_SESSION['trck'])){
                            echo $this->session->userdata('trck');
                    }

                    if(isset($_SESSION['error'])){
                            echo $this->session->userdata('error');
                    }



                ?>
</div>
</div>


<!--END OF TRACK APPLICANT STATUS-->
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Manage Access Level</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">


<!--START OF USER ROLES and PERMISSION-->

<div class="hrDash-role">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">User Roles and Permission</h3>
  </div>
<div class="panel-body">
    <form>
        <div class="col-md-4">
        <input type="text" class="form-control" placeholder="Search Name">
        </div>


        <button class="btn btn-success">Submit</button>


    </form>

    <div class="role-tablebox">
                <table class="table table-hover">



                    <thead>
                        <th>Name</th>
                        <th>Date Hired</th>
                        <th>Position</th>
                        <!-- <th>Department</th> -->
                        <!-- <th>Level</th> -->
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <tr>
                         <?php foreach ($getemps as $wd) {?>
                            <?php echo "<td>". $wd['fname']." ".$wd['lname']."</td>"; ?>
                            <?php echo "<td>".$wd['date_hired']."</td>";?>
                            <?php echo "<td>".$wd['job_title']."</td>";?>

                            <!-- <td>IT Department</td> -->

                            <td><span style="cursor: pointer" class="label label-danger" role="button" data-toggle="modal" data-target="#<?php echo $wd['id'];?>">EDIT LEVEL</span>

                                <!-- Modal -->
                                <div class="modal fade" id="<?php echo $wd['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit User Role and Permission</h4>
                                      </div>
                                      <div class="modal-body">
                                        <?php echo form_open('admin/changelevel');?>
                                        <p><b>Name: </b> <?php echo $wd['fname']." ".$wd['lname']; ?></p>
                                        <!-- <p><b>Level: </b></p> -->
                                        <div class="edit-status">

                                        <select class="form-control" id="sel1" name="levelid">
                                        <option disabled selected>Select Level</option>
                                        <option value="2">Employee</option>
                                        </select>
                                        <?php echo form_hidden('appID', $wd['id']);?>
                                        <?php echo form_hidden('jobname', $wd['job_title']);?>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Edit Status</button>
                                      </div>
                                        </form>
                                    </div>
                                  </div>
                                </div>
                            </div>



                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>

                </table>
            </div>



</div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->


                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>


					                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Manage Access Code</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">
                                           <div class="hrDash-gen">
                                        <div class="panel panel-primary">
                                          <div class="panel-heading">
                                            <h3 class="panel-title">Generate Access Code</h3>
                                          </div>
                                        <div class="panel-body">
                                            <h3>Access Code:</h3>
                                            <h1><b><font color="red">H1d03frX</font></b></h1>
                                            <br>
                                            <form>
                                            <button class="btn btn-success">Generate Code</button>
                                        </form>

                                        <form>
                                            <br><br>
                                            <div class="col-md-5">
                                            <select class="js-example-basic-multiple js-example-tokenizer" multiple="multiple" name="emails[]">

                                            </select>
                                            </div>
                                            <button class="btn btn-success">Send</button>
                                        </div>
                                    </div>
                                </div>


                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Generate Report<small>Uneditable Excel File</small></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">

<!--START OF GENERATE REPORT-->

<div class="hrDash-gen">
<div class="panel panel-primary" id="generateReport">
  <div class="panel-heading">
    <h3 class="panel-title">Generate Report</h3>
  </div>
<div class="panel-body">

<?php
        if(isset($_SESSION['nodate'])){
                echo $_SESSION['nodate'];
        }
        if(isset($_SESSION['generate'])){
                echo $_SESSION['generate'];
        }

?>
            <div class="gen-box">
				<h3><b><font color="red">*JOB APPLICATION</font></b></h3>
                <p>Generate your record now, as of: </p>
                <?php echo form_open('admin/specificdate');?>
                    <div class="date-gen-box">
                    <input type="date" class="form-control" name="specific">
                </div>


                    <div class="button-gen">
                        <button class="btn btn-success" data-toggle="modal" data-target="#generateModal"> Generate in Excel file </button>
						<p>*Uneditable Excel file.</p>
					</div>
            </div>
 <?php echo form_close();?>

            <!-- Modal -->



<br><br><br><br>


                        <div class="gen-box">
                <p>Generate your record  </p>
                <?php echo form_open('admin/fromto');?>
                    <div class="date-gen-box">

                    from<input type="date" class="form-control" name="datefrom">To<input type="date" class="form-control" name="dateto">
                </div>

<br><br>
                    <div class="button-gen">
                        <button class="btn btn-success" data-toggle="modal" data-target="#fromtomodal"> Generate in Excel file </button>
						<p>*Uneditable Excel file.</p>
					</div>
<?php echo form_close();?>


            </div>
        <!-- end of genbox -->


            <br><br>
            <div class="gen-box">
                <h3><b><font color="red">*HIRED APPLICANTS</font></b></h3>
				<?php
						echo form_open('admin/hiredspec');
				?>
                <p>Generate your record now, as of: </p>

                    <div class="date-gen-box">
                        <input type="date" class="form-control" name="specifichired">
                    </div>


                    <div class="button-gen">
                        <button class="btn btn-success" data-toggle="modal" data-target="#generateModal"> Generate in Excel file </button>
                        <p>*Uneditable Excel file.</p>
                    </div>
            </div>
			<?php echo form_close();?>

            <br><br><br><br>


            <div class="gen-box">
			  <?php
                  echo form_open('admin/fromtohired');
                 ?>
                   <p>Generate your record  </p>
                       <div class="date-gen-box">

                           from<input type="date" class="form-control" name="datefromhired">To<input type="date" class="form-control" name="datetohired">
                       </div>

   <br><br>
                       <div class="button-gen">
                           <button class="btn btn-success" data-toggle="modal" data-target="#fromtomodal"> Generate in Excel file </button>
                           <p>*Uneditable Excel file.</p>
                       </div>
                     </form>

</div>
</div>
</div>

<!--END OF GENERATE REPORT-->
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Recruitment Workflow</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">

<!--START OF CUSTOMIZE WORKFLOW-->

    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Recruitment Workflow</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">
<?php
     $workflow = $this -> model_admin ->getworkflow();
?>
<!--START OF CUSTOMIZE WORKFLOW-->
    <div class="row">
        <div class="col-md-6">
            <div class="hrDash-customize" id="workflow">
            <?php
                        if(isset($_SESSION['emptyfields'])){
                                echo $_SESSION['emptyfields'];
                        }

                        if(isset($_SESSION['suc'])){
                                echo $_SESSION['suc'];
                        }
                       date_default_timezone_set('Asia/Taipei');
                        $date = date('Y-m-d H:i:s a', time());
                    echo $date;
                  ?>
                <div class="panel panel-primary">
                  <div class="panel-heading">

                    <h3 class="panel-title">Customize Workflow</h3>
                  </div>
                <div class="panel-body">
                <?php
                                    foreach ($workflow as $work) {

                            ?>

                    <h3><font face="bebas">Recruitment Workflow  (<?php echo $work['workflow_name'];?>)</font></h3>
                            <h4>Effective as of <?php echo $work['effective_date'];?></h4>

                        <font face="Mohave" size="5px"><p><b>1st Process:</b></p></font>
                        <font size="3px"><p><?php echo $work['1st'];?></p></font>
                        <br>
                        <font face="Mohave" size="5px"><p><b>2nd Process</b></p></font>
                        <font size="3px"><p><?php echo $work['2nd'];?></p></font>
                        <br>
                        <font face="Mohave" size="5px"><p><b>3rd Process</b></p></font>
                        <font size="3px"><p><?php echo $work['3rd'];?></p></font>
                        <br>
                        <font face="Mohave" size="5px"><p><b>4th Process</b></p></font>
                        <font size="3px"><p><?php echo $work['4th'];?></p></font>
                        <br>
                        <font face="Mohave" size="5px"><p><b>5th Process</b></p></font>
                        <font size="3px"><p><?php echo $work['5th'];?></p></font>

                        <?php
                                }
                        ?>
                    </div>
        </div></div></div>
        <div class="col-md-5">
            <div class="process-box2">
            <?php
                echo form_open("admin/addworkflow");
            ?>
            <div class="form-group">
                <label>Workflow name</label>
                <input type="text" name="workflowname">
            </div>
            <div class="form-group">
                <label>1st Process</label>
                <input type="text" name="work1">
            </div>
            <div class="form-group">
                <label>2nd Process:</label>
                <input type="text" name="work2">
            </div>
            <div class="form-group">
                <label>3rd Process:</label>
                <input type="text" name="work3">
            </div>
            <div class="form-group">
                <label>4th Process:</label>
               <input type="text" name="work4">
            </div>
            <div class="form-group">
                <label>5th Process:</label>
               <input type="text" name="work5">
            </div>
            <div class="form-group">
                <label>Effective date:</label>
               <input type="text" name="effectivedate" id="datetimepicker3">
            </div>
                <br><br>
                <button class="btn btn-success btn-block" type="submit">Save</button>
        </form>
        </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

<!--END OF CUSTOMIZE WORKFLOW-->
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </doloriv>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right"> International Container Terminal Services, Inc. |
                            <span class="lead"> <i class="fa fa-cogs"></i> HR Administrator</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>


    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <script src="<?php echo base_url();?>js/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/admin/js/custom.js"></script>



        <script type="text/javascript">
                   $('select').select2();
                   $(".js-example-basic-multiple").select2({width: '100%' });

					$('.js-example-tokenizer').select2({
				tags: true,
				tokenSeparators: [','], width: '100%',

				placeholder: "Enter Email Address"
			});
        </script>
		   <script type="text/javascript">
                jQuery('#datetimepicker3').datetimepicker({
                format:'Y-m-d H:i:s',
            });
</script>


</body>

</html>
