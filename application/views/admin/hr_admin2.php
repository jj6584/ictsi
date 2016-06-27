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


                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php echo base_url();?>images/admin/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Paul Christian C. Banjawan</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">        
                                <li>
                                    <a href="<?php echo base_url();?>admin/hr_admin"><i class="fa fa-calendar"></i>To-do List</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url();?>admin/finished_task"><i class="fa fa-check"></i>Finished Task</a>
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
                                    <img src="<?php echo base_url();?>images/admin/img.jpg" alt="">John Doe
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo base_url();?>admin/profile">  Profile</a>
                                    </li>
                                    <li><a href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="<?php echo base_url();?>images/admin/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="<?php echo base_url();?>images/admin/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="images/img.jpg" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where... 
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

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
                                    <h2>To-do List <small>Assigned by HR Coordinator</small></h2>
                
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    
                                    <article class="media event">
                                        
                                        <div class="media-body">
                                            <ul class="list-unstyled timeline">
                                    <li>
                                        <div class="block">
                                           
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a href="#">Task Title</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span>
                                                </div>
                                                <p class="excerpt">Task Description
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a href="#">Task Title</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span>
                                                </div>
                                                <p class="excerpt">Task Description
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="block">
                                            
                                            <div class="block_content">
                                                <h2 class="title">
                                                    <a href="#">Task Title</a>
                                                </h2>
                                                <div class="byline">
                                                    <span>13 hours ago</span>
                                                </div>
                                                <p class="excerpt">Task Description
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul> 
                                        
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