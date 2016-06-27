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
                                    <h2>Status<small>For Interview, For Hiring, For Hired</small></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">



<?php

        $emp = $this -> model_admin -> getallemployees();
?>


<!--Start of EMPLOYEE RECORD-->
        <div class="hrDash-empRecord">

                <?php
                        if(isset($_SESSION['succDel'])){
                                echo $_SESSION['succDel'];
                        }

                        if(isset($_SESSION['del'])){
                                echo $_SESSION['del'];
                        }

                        if(isset($_SESSION['nresults'])){
                                echo $_SESSION['nresults'];
                        }
                        if(isset($_SESSION['searchempty'])){
                                echo $_SESSION['searchempty'];
                        }
                ?>
                <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Manage Employee Status</h3>
                      </div>
                    <div class="panel-body">
                    <?php
                            echo  form_open('admin/searcheemp');
                    ?>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="tobesearch" placeholder="Search by surname">
                        </div>

                        <button class="btn btn-success" type="submit" >Search</button>
                        </form>
                <?php

                        if(!isset($fetch)){



                ?>
                       <table class="table">
                            <thead>
                                <th>Employee Name</th>
                                <th>Job Position</th>
                                <th>Date Hired</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                            <?php
                                    foreach ($emp as $empvar ) {

                            ?>
                                <tr>
                                    <td><?php
                                            echo $empvar['fname']." ".$empvar['lname'];
                                    ?></td>
                                    <td><?php echo $empvar['position_name'];?></td>
                                    <td><?php echo $empvar['date_hired'];?></td>
                                    <td><span class="label label-primary">ACTIVE</span></td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer;"
                                         data-toggle="modal" data-target="#<?php echo $empvar['id'];?>">Remove Employee</span></td>

                                        <!-- Modal -->
                                        <div class="modal fade "  id="<?php echo $empvar['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Remove Employee</h4>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure you want to remove <?php echo $empvar['fname']." ".$empvar['lname']."'s";?> account?
                                              </div>
                                              <div class="modal-footer">
                                              <?php echo form_open('admin/deleteuser');
                                              echo form_hidden('empid', $empvar['id']);
                                              ?>

                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                <?php
                                                    echo form_close();
                                                ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>



                                </tr>
                                <?php
                                        }
                                ?>

                            </tbody>

                       </table>

                       <?php }else{ ?>

                                   <table class="table">
                            <thead>
                                <th>Employee Name</th>
                                <th>Job Position</th>
                                <th>Date Hired</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                            <?php
                                error_reporting(0);

                                    foreach ($fetch as $empvar ) {

                            ?>
                                <tr>
                                    <td><?php
                                            echo $empvar['fname']." ".$empvar['lname'];
                                    ?></td>
                                    <td><?php echo $empvar['position_name'];?></td>
                                    <td><?php echo $empvar['date_hired'];?></td>
                                    <td><span class="label label-primary">ACTIVE</span></td>
                                    <td><span class="label label-danger" role="button" style="cursor:pointer;"
                                         data-toggle="modal" data-target="#<?php echo $empvar['id'];?>">Remove Employee</span></td>

                                        <!-- Modal -->
                                        <div class="modal fade "  id="<?php echo $empvar['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Remove Employee</h4>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure you want to remove <?php echo $empvar['fname']." ".$empvar['lname']."'s";?> account?
                                              </div>
                                              <div class="modal-footer">
                                              <?php echo form_open('admin/deleteuser');
                                              echo form_hidden('empid', $empvar['id']);
                                              ?>

                                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary">Yes</button>
                                                <?php
                                                    echo form_close();
                                                ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>



                                </tr>
                                <?php
                                        }
                                ?>

                            </tbody>

                       </table>





                       <?php } ?>
            </div>

            <!-- Modal -->
                    </div> <!--End of panel-body-->
                </div><!--End of panel panel-primary-->
        </div><!--End of hrDash-empRecord class-->
<!--END OF EMPLOYEE RECORD-->


<hr>
                <div class="hrDash-appStat">
                <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Set Applicant Status</h3>
                      </div>
                    <div class="panel-body">
    <?php




    ?>
        <?php echo form_open('admin/getsearch');?>
        <div class="col-md-4">
        <input type="text" class="form-control" placeholder="Search by name or surname" name="find">
        </div>

        <button class="btn btn-success">Submit</button>

</form>
        <?php
            if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
            }

            if(isset($_SESSION['success'])){
                    echo $_SESSION['success'];
            }
            if(isset($_SESSION['deploy'])){
                    echo $_SESSION['deploy'];
            }


        ?>




<?php
   // echo $_GET['ded8dae5786fb0e9e6ffb657401fd861ba2efe11'];
    if(isset($result)){

?>
    <div class="role-tablebox">


                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Date Applied</th>
                        <th>Job Title</th>
                        <th>Action</th>
						 <th>ID</th>
                    </thead>

                    <tbody>

                    <?php

                        foreach ($result as $key2) {

                             echo "<tr>";
                              echo "<td>" . $key2['fname'] . " ".$key2['lname'] ."</td>";

                              echo "<td>" . $key2['date_applied'] . "</td>";
                              echo "<td>" . $key2['job_title'] . "</td>";
							   echo "<td>" . $key2['job_id'] . "</td>";
                              echo "<td>" . "
                            <button class='btn btn-warning' data-toggle='modal' data-target='#a$key2[job_id]'>Change Status</button>

                              <div class='modal fade' id='a$key2[job_id]' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 class='modal-title id='myModalLabel'>Set Applicant Status $key2[job_id]</h4>
                  </div>
                  <div class='modal-body'>
                  <form method='post' action=' "; echo base_url()."admin/changestat '>
                  <select class='form-control' name='status' id='status'>
                                    <option value='0'>UNDER REVIEW</option>
                                    <option value='1'>FOR INTERVIEW</option>
                                    <option value='2'>FOR HIRING</option>

                                    <option value='4'>NOT QULIFIED</option>
                                 </select>

                  </div>";
                    echo form_hidden('hiddenID', $key2['id']);
                    echo form_hidden('hiddenJobID', $key2['job_id']);


                  echo "<div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
                    <input type='submit' name='submit' value='Set status'  class='btn btn-primary' />

                  </div>
                  </form>
                </div>
              </div>
            </div>
            " . "</td>";

                            }


                    ?>





                        <!-- <tr>
                            <td>Mark John</th>
                            <td>August 03, 2015</td>
                            <td>IT Consultant</td>

                            <td> <select class="form-control" name="status" id"status">
                                    <option>FOR INTERVIEW</option>
                                    <option>FOR HIRING</option>
                                    <option>UNDER REVIEW</option>
                                    <option>NOT QULIFIED</option>
                                 </select>
                                 <button style="margin-top: 5px;" class="btn btn-success pull-right"> Save </button>
                            </td> -->
                        </tr>
                    </tbody>

                </table>


            </div>
<?php } ?>

                    </div> <!--End of panel-body-->
                </div><!--End of panel panel-primary-->
        </div><!--End of hrDash-empRecord class-->



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


</body>

</html>
