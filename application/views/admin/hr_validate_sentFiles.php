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

    <script src="<?php echo base_url();?>js/admin/js/jquery.min.js"></script>

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
        $fullname = $_SESSION['admin_fname'] . " ". $_SESSION['admin_mname'] ." ". $_SESSION['admin_lname'];
    ?>
                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url();?>images/admin/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
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
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
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
                                    <img src="<?php echo base_url();?>images/admin/img.jpg" alt=""><?php echo $fullname;?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url();?>admin/profile">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Help</a>
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





             <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            HR Administrator <small>Notification</small>
                        </h1>
                    </div>
                </div>


<?php

$employment = $this->model_admin->getappfiles();


?>



<!--Start of EMPLOYEE RECORD-->
        <div class="hrDash-receivedFiles">
                <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Check Received Files from Applicant</h3>
                      </div>
                    <div class="panel-body">

                        <div class="check-table">
                        <table class="table table-hover">
                            <thead>
                                <th>File Uploaded</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>


            <?php

                foreach ($employment as $key) {

                $path = sha1($key['id']);

            ?>
                            <tbody>
                                <tr>
                                    <td>Police Clearance</td>
                                    <td>


                                    <?php if($key['file_pc_status'] ==  0 ) { ?>
                                    <span style="font-size: 1.5em; color: red;" class="fa fa-times" aria-hidden="true">
                                   <?php } else{ ?>

                                      <span style="font-size: 1.5em; color: green;" class="fa fa-check" aria-hidden="true"></span>
                                   <?php  }?>

                                    </td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer; " data-toggle="modal" data-target="#myModal">CHECK FILE</span>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" style="margin-top: -10%;"role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                              <div class="modal-body">
                                              <?php  echo "<img src=' ". base_url() . "users/$path/$key[file_pc]' class='img-thumbnail'>"; ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <span class="label label-primary" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#remarksModal">REMARKS</span>
                                        <!-- Modal -->
                                        <div class="modal fade" id="remarksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">File Remarks</h4>
                                              </div>
                                              <div class="modal-body">
                                              <?php echo form_open('admin/changepcstatus'); ?>
                                                <strong>Remarks: </strong>
                                                    <select class="form-control" name="stat">
                                                        <option value="1">VALID</option>
                                                        <option value="0">NOT VALID</option>
                                                    </select>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Remarks</button>
                                              </div>
                                                <?php echo form_hidden('hiddenID', $key['id']); ?>
                                              <?php echo form_close();?>
                                            </div>
                                          </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Birth Certificate</td>
                                    <td><?php if($key['file_birth_status'] ==  0 ) { ?>
                                    <span style="font-size: 1.5em; color: red;" class="fa fa-times" aria-hidden="true">
                                   <?php } else{ ?>

                                    <span style="font-size: 1.5em; color: green;" class="fa fa-check" aria-hidden="true"></span>
                                   <?php  }?></td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#ds">CHECK FILE</span>
                                          <span class="label label-primary" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#12">REMARKS</span>

                                              <div class="modal fade" id="ds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                              <div class="modal-body">
                                              <?php  echo "<img src=' ". base_url() . "users/$path/$key[file_birth]' class='img-thumbnail'>"; ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>




                                        <div class="modal fade" id="12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">File Remarks</h4>
                                              </div>

                                              <div class="modal-body">
                                              <?php echo form_open('admin/changebc');?>
                                                <strong>Remarks: </strong>
                                                    <select class="form-control" name="stat2">
                                                        <option value="1">VALID</option>
                                                        <option value="0">NOT VALID</option>
                                                    </select>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Remarks</button>
                                              </div>
                                              <?php echo form_hidden('applicantID', $key['id']); ?>
                                              <?php echo form_close();?>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- end of bc -->


                                        <tr>
                                    <td>SSS ID</td>
                                    <td><?php if($key['file_sss_status'] ==  0 ) { ?>
                                    <span style="font-size: 1.5em; color: red;" class="fa fa-times" aria-hidden="true">
                                   <?php } else{ ?>

                                    <span style="font-size: 1.5em; color: green;" class="fa fa-check" aria-hidden="true"></span>
                                   <?php  }?></td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#ssscheck">CHECK FILE</span>
                                          <span class="label label-primary" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#sss">REMARKS</span>

                                              <div class="modal fade" id="ssscheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                              <div class="modal-body">
                                              <?php  echo "<img src=' ". base_url() . "users/$path/$key[file_sss]' class='img-thumbnail'>"; ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>




                                        <div class="modal fade" id="sss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">SSS</h4>
                                              </div>

                                              <div class="modal-body">
                                              <?php echo form_open('admin/changesss');?>
                                                <strong>Remarks: </strong>
                                                    <select class="form-control" name="stat3">
                                                        <option value="1">VALID</option>
                                                        <option value="0">NOT VALID</option>
                                                    </select>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Remarks</button>
                                              </div>
                                              <?php echo form_hidden('applicantID', $key['id']); ?>
                                              <?php echo form_close();?>
                                            </div>
                                          </div>
                                        </div>

                                        <!-- end of SSS -->


                                           <tr>
                                    <td>PAGIBIG ID</td>
                                    <td><?php if($key['file_pagibig_status'] ==  0 ) { ?>
                                    <span style="font-size: 1.5em; color: red;" class="fa fa-times" aria-hidden="true">
                                   <?php } else{ ?>

                                    <span style="font-size: 1.5em; color: green;" class="fa fa-check" aria-hidden="true"></span>
                                   <?php  }?></td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#pagibigcheck">CHECK FILE</span>
                                          <span class="label label-primary" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#pagibigs">REMARKS</span>

                                              <div class="modal fade" id="pagibigcheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                              <div class="modal-body">
                                              <?php  echo "<img src=' ". base_url() . "users/$path/$key[file_pagibig]' class='img-thumbnail'>"; ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>




                                        <div class="modal fade" id="pagibigs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">File Remarks</h4>
                                              </div>

                                              <div class="modal-body">
                                              <?php echo form_open('admin/changepagbig');?>
                                                <strong>Remarks: </strong>
                                                    <select class="form-control" name="stat4">
                                                        <option value="1">VALID</option>
                                                        <option value="0">NOT VALID</option>
                                                    </select>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Remarks</button>
                                              </div>
                                              <?php echo form_hidden('applicantID', $key['id']); ?>
                                              <?php echo form_close();?>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- end of pagibigID -->


                                           <tr>
                                    <td>NBI Clearance</td>
                                    <td><?php if($key['file_nbi_status'] ==  0 ) { ?>
                                    <span style="font-size: 1.5em; color: red;" class="fa fa-times" aria-hidden="true">
                                   <?php } else{ ?>

                                    <span style="font-size: 1.5em; color: green;" class="fa fa-check" aria-hidden="true"></span>
                                   <?php  }?></td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#nbicheck">CHECK FILE</span>
                                          <span class="label label-primary" role="button" style="cursor:pointer;" data-toggle="modal" data-target="#nbiremkrs">REMARKS</span>

                                              <div class="modal fade" id="nbicheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                              <div class="modal-body">
                                              <?php  echo "<img src=' ". base_url() . "users/$path/$key[file_nbi]' class='img-thumbnail'>"; ?>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>




                                        <div class="modal fade" id="nbiremkrs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">File Remarks</h4>
                                              </div>

                                              <div class="modal-body">
                                              <?php echo form_open('admin/changenbi');?>
                                                <strong>Remarks: </strong>
                                                    <select class="form-control" name="stat5">
                                                        <option value="1">VALID</option>
                                                        <option value="0">NOT VALID</option>
                                                    </select>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Remarks</button>
                                              </div>
                                              <?php echo form_hidden('applicantID', $key['id']); ?>
                                              <?php echo form_close();?>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- end of nbi -->











                                </tr>
                                <?php  if($key['file_pc_status'] == 1 && $key['file_birth_status'] == 1 && $key['file_nbi_status'] == 1 && $key['file_sss_status'] == 1 && $key['file_pagibig_status'] == 1 ){?>

                                <?php echo form_open('admin/makeithired');?>

                                <button type="submit" class="btn btn-success">Set this applicant as hired</button>
                                <?php echo form_hidden('hide', $key['id']); ?>
                                <?php echo form_hidden('jobid', $key['job_id']); ?>
                                <?php echo form_close();?>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        </div>
                    </div> <!--End of panel-body-->
                </div><!--End of panel panel-primary-->
        </div><!--End of hrDash-empRecord class-->





            </div>
            <!-- /.container-fluid -->


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


</body>

</html>
