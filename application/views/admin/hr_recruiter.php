<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICTSI - Admin Dashboard</title>

    <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">ICTSI - HR Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret">
                    </b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <!--Start Messages bar-->
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>

                <!--End of Message Bar-->

                <!--Start of Notification Bar-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <!--End of Notification Bar-->

                <!--Start of Account Bar-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!--End of Account Bar-->

            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">

                    <li>
                        <p><font color="white" size="4px"><center>Content Management</center></font></p>
                    </li>

                    <li class="active">
                        <a href="<?php echo base_url();?>admin/hr_dashboard">Dashboard</a>
                    </li>


                    <li>
                        <a href="<?php echo base_url();?>admin/manageEmp">Employee's  and Applicant's Management</a>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#jobManagement">
                            Job Management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="jobManagement" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/managejobs">Create Jobs</a>
                            </li>
                             <li>
                                <a href="<?php echo base_url();?>admin/hr_editjob">Update Jobs</a>
                            </li>


                            <li>
                                <a href="<?php echo base_url();?>admin/job_management">Others</a>
                            </li>
                        </ul>
                    </li>

                     <li>
                        <a href="<?php echo base_url();?>admin/send_PEF">Send Performance Evaluation Form</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#schedActivity">
                            Schedule Activity<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="schedActivity" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/create_task">Create To-do List</a>
                            </li>
                            <li>
                                <a href="#">Interview Schedules</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/recruiter">Recruiter's Event</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            HR Administrator <small>Track Recruiter's Log</small>
                        </h1>
                    </div>
                </div>
                
    <!--START OF RECRUITER EVENT-->
        <div class="hrDash-appStat">
                <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Track Recuiter's Log</h3>
                      </div>
                    <div class="panel-body">

                    	<center><h1><font face="Nexa Light">RECRUITER'S LOG</font></h1></center>


                    	<form>
                   <div class="recruiter-select">
                     <select class="form-control">
                     	<option>Select Recruiter's Name</option>
                     	<option>Mark Idio</option>
                     	<option>Paul Banjawan</option>
                     </select>
                 </div>
                     <button class="btn btn-primary">Select</button>
                 </form>

                 <br><br>
                 	
                 	<p><b>Recruiter's Name: </b> Mark Idio</p>
                 	<p><b>Date: </b>November 27, 2015</p>
                 	<br>
            <div class="recruiter-box">
                 <div class="recruiter-answer">

                 	<p>Conducted an Interview?</p>
                 </div>

					<p>YES</p>
                 	<!--if YES-->

                 <div class="recruiter-appName">
                 	<p><b>Name of Applicant</b>: </p>
                 </div>

                 	<p>Joshua Manaol</p>

                 <div class="recruiter-date">
                 	<p><b>Date of Interview</b>: </p>
                 </div>

                 	<p>November 27, 2015</p>

                 <div class="recruiter-time">
                 	<p><b>Time of Interview</b>: </p>
                 </div>

                 	<p>9:00 AM</p>

                 <div class="recruiter-remarks">
                 	<p><b>Remarks:</b> </p>
                 </div>

                 	<p>PASSED</p>
            </div>

<br>

        <p><b>Date: </b>November 28, 2015</p>
                 	<br>
            <div class="recruiter-box">
                 <div class="recruiter-answer">
                 	
                 	<p>Conducted an Interview?</p>
                 </div>

					<p>YES</p>
                 	<!--if YES-->

                 <div class="recruiter-appName">
                 	<p><b>Name of Applicant</b>: </p>
                 </div>

                 	<p>Marie Gabrielle Pelagio</p>

                 <div class="recruiter-date">
                 	<p><b>Date of Interview</b>: </p>
                 </div>

                 	<p>November 28, 2015</p>

                 <div class="recruiter-time">
                 	<p><b>Time of Interview</b>: </p>
                 </div>

                 	<p>3:00 PM</p>

                 <div class="recruiter-remarks">
                 	<p><b>Remarks:</b> </p>
                 </div>

                 	<p>FAILED</p>
            </div>

<hr>

				<!--if NO-->
			
				<h3>Recruiter's Log</h3>
                 	
                 	<p><b>Recruiter's Name: </b> Mark Idio</p>

                 	<br>
				<div class="recruiter-box">
                 <div class="recruiter-answer">
                 	<p>Conducted and Interview?</p>
                 </div>

                 	<p>NO</p>
<br>
                 	<span class="alert alert-info">WALANG NA INTERVIEW</span> 
                 </div>
                    </div> <!--End of panel-body-->
                </div><!--End of panel panel-primary-->
        </dropdowniv><!--End of hrDash-empRecord class-->


<!--END OF RECRUITER EVENT-->



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris-data.js"></script>

</body>

</html>
