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
                                    <li><a href="javascript:;">  Profile</a>
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


        <?php

            $getalleval = $this -> model_admin -> getalleval();
            $empnames = $this -> model_admin -> getallemps();
            $getcoemp = $this -> model_admin -> getCOEMP();
            $getEVAL = $this -> model_admin -> getallfinaleval();


        ?>



            <!-- page content -->
            <div class="right_col" role="main">

                <br />
                <div class="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Edit Content<small></small></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">

<div class="hrDash-collab">
<?php
            if(isset($_SESSION['noresults'])){
                    echo $_SESSION['noresults'];
            }
            if(isset($_SESSION['empty'])){
                    echo $_SESSION['empty'];
            }

            if(isset($_SESSION['succ'])){
                    echo $_SESSION['succ'];
            }

?>
<?php echo form_open("admin/searchevaluated");?>
  <div class="hrDash-textbox">
        <input type="text" class="form-control" placeholder="Search by Surname" name="srch">
        </div>


        <div class="textbox-button">
        <button class="btn btn-success">Submit</button>
        </div>
        <?php echo form_close();?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">View Evaluated Employees for regularlization</h3>
  </div>
<div>

<style>
table, th, td {
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>

<class="panel-body">

<?php

            if(!isset($fetch)){


?>

         <table class="table" width="100%">

             <tr>
            <td align="center"><strong>Name</strong></td>
            <td align="center"><strong>Overall Rating</strong></td>
             </tr>
        <?php
            foreach ($getEVAL as $var) {

                    $numberofquestion = 0;

                    $var3 = explode(",", $var['perf_type']);

                    foreach ($var3 as $key2 ) {
                        $numberofquestion++;
                    }


                    $numberofquestion = $numberofquestion;

                    $d = 5*$numberofquestion;

                    $sumofquestion = 0;
                    $var2 = explode(",", $var['evaluated']);
                    foreach ($var2 as $key) {
                        $sumofquestion += $key;
                    }

                    $ave = $sumofquestion/$d;
                    $percentage = $ave*100;

                    $progressbarclass = "";
                    $supervar = "";


                    if($percentage <= 24){
                        $progressbarclass = "progress-bar-danger";
                        $supervar  = "POOR";
                    } if ($percentage >= 25 && $percentage <= 49){
                        $progressbarclass = "progress-bar-warning";
                        $supervar  = "SATISFACTORY";
                    } if($percentage >= 50 && $percentage <= 74){
                        $progressbarclass = "progress-bar-primary";
                        $supervar  = "AVERAGE";
                    } if($percentage >= 75 && $percentage <= 100){
                        $progressbarclass = "progress-bar-success";
                        $supervar  = "EXCELLENT";
                    }
        ?>

             <tr>
               <?php
                   $date = date("Y-m-d");

                   if($var['period'] < $date){


                ?>
                <td width="30%" align="center" style="padding-top: 25px;"><?php echo $var['fname']." ".$var['lname'];?> <a href="<?php echo base_url();?>admin/removeeval/<?php echo $var['emp_id'];?>"><span class="label label-danger">Delete</span></a></td>

                <td width="70%" align="center" style="padding-top: 25px;"><span class="label label-warning">exceeded to the period given.</span></td>

                <?php
              }else{
                ?>
                <td width="30%" align="center" style="padding-top: 25px;"><?php echo $var['fname']." ".$var['lname'];?> <a href="<?php echo base_url();?>admin/viewsummary/<?php echo $var['id'];?>"><span role="button" class="fa fa-area-chart" data-toggle="tooltip" data-placement="right" title="View Summary" aria-hidden="true"></span></a></td>

                    <td width="70%" align="center" style="padding-top: 25px;"><div class="progress">
                        <div class="progress-bar <?php echo $progressbarclass;?>" role="progressbar" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                        <?php echo $supervar;?>
                         </div>

                     <p><strong>Rating:</strong>  <?php echo $percentage;?>%</p>
                 </div>
                   <?php } ?>
                </td>
            </tr>


            <?php } ?>



         </table>
<a href="<?php echo base_url();?>admin/generatereport/"><button class="btn btn-success pull-right" >Generate report</button></a>


<?php
    }else{ ?>
                        <!-- start of search -->
                             <table class="table" width="100%">

             <tr>
            <td align="center"><strong>Name</strong></td>
            <td align="center"><strong>Overall Rating</strong></td>
             </tr>
        <?php
            foreach ($fetch as $var) {

                    $numberofquestion = 0;

                    $var3 = explode(",", $var['perf_type']);

                    foreach ($var3 as $key2 ) {
                        $numberofquestion++;
                    }


                    $numberofquestion = $numberofquestion;

                    $d = 5*$numberofquestion;

                    $sumofquestion = 0;
                    $var2 = explode(",", $var['evaluated']);
                    foreach ($var2 as $key) {
                        $sumofquestion += $key;
                    }

                    $ave = $sumofquestion/$d;
                    $percentage = $ave*100;

                    $progressbarclass = "";
                    $supervar = "";


                    if($percentage <= 24){
                        $progressbarclass = "progress-bar-danger";
                        $supervar  = "POOR";
                    } if ($percentage >= 25 && $percentage <= 49){
                        $progressbarclass = "progress-bar-warning";
                        $supervar  = "SATISFACTORY";
                    } if($percentage >= 50 && $percentage <= 74){
                        $progressbarclass = "progress-bar-primary";
                        $supervar  = "AVERAGE";
                    } if($percentage >= 75 && $percentage <= 100){
                        $progressbarclass = "progress-bar-success";
                        $supervar  = "EXCELLENT";
                    }
        ?>

             <tr>
                <?php
				   date_default_timezone_set('Asia/Taipei');
                   $date = date("Y-m-d");
				  // $date2 = "2016-02-25";
				  // $datetime1 = new DateTime($date);
				  // $datetime2 = new DateTime($var['period']);
						$today2 = strtotime($date);
						$deadline2 = strtotime($var['period']);
						$deadline = $var['period'];

					//$interval = date_diff($today, $deadline);
					//$val =  $interval->format('%a');
					//	echo $val;
					//echo $interval->format('%R%a days');
					$now = explode('-',$date);
					$dead = explode('-', $deadline);

                   if($date >= $deadline){


                ?>
                <td width="30%" align="center" style="padding-top: 25px;"><?php echo $var['fname']." ".$var['lname'];?> <a href="<?php echo base_url();?>admin/removeeval/<?php echo $var['emp_id'];?>"><span class="label label-danger">Delete</span></a></td>

                <td width="70%" align="center" style="padding-top: 25px;"><span class="label label-warning">exceeded to the period given.</span></td>

                <?php
              }else{
                ?>
                <td width="30%" align="center" style="padding-top: 25px;"><?php echo $var['fname']." ".$var['lname'];?> <a href="<?php echo base_url();?>admin/viewsummary/<?php echo $var['id'];?>"><span role="button" class="fa fa-area-chart" data-toggle="tooltip" data-placement="right" title="View Summary" aria-hidden="true"></span></a></td>

                    <td width="70%" align="center" style="padding-top: 25px;"><div class="progress">
                        <div class="progress-bar <?php echo $progressbarclass;?>" role="progressbar" aria-valuenow="25"
                        aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                        <?php echo $supervar;?>
                         </div>

                     <p><strong>Rating:</strong>  <?php echo $percentage;?>%</p>
                 </div>
                   <?php } ?>
                </td>
            </tr>

            <?php } ?>



         </table>
                        <!-- end of search -->


   <?php }

?>






</div>
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
                   $(".js-example-basic-multiple").select2({placeholder: "Select employee", width: '100%' });
        </script>


</body>

</html>
