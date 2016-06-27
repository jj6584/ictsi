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

    <link href="<?php echo base_url();?>css/admin/css/styles.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>fonts/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/admin/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo base_url();?>css/admin/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo base_url();?>css/admin/css/icheck/flat/green.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/admin/css/floatexamples.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>js/admin/js/jquery.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>tinymce/js/tinymce/tinymce.min.js"></script>
    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>


    <script>
tinymce.init({
    selector: "textarea#elm1",
    theme: "modern",
    width: 500,
    height: 250,
    plugins: [
         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
   ],
   content_css: "css/content.css",
   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
   style_formats: [
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
 });
</script>

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


  $getmanpower = $this -> model_admin -> getmanpower1($this->uri->segment(3));
    // echo "<pre>";
    // print_r($getmanpower);
    // echo "</pre>";

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
                                            <a href="<?php echo base_url();?>admin/see_all_alerts">
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
                                    <h2>Create New Job</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">

<!--Start of add-FAQ-box class-->

<div style="margin-left: 90px;" class="col-md-10">
<div class="panel panel-primary">
<?php

    if(isset($_SESSION['jobcreated'])){
            echo $_SESSION['jobcreated'];
    }
?>
  <div class="panel-heading">
    <h3 class="panel-title">Manage Job</h3>
  </div>
<div class="panel-body">
            <?php
                        foreach ($getmanpower as $mp) {


            ?>
        <?php echo form_open('admin/validateapprove');?>
                <?php
                    echo form_hidden("hideid", $mp['mp_id']);
                ?>
            <div class="form-group <?php if(form_error('job_title')){echo "has-error";}?>">
                <label for="jobTitle"><font face="caviar dreams" size="4%">Job Title:</font></label>
                <div class="manage_title">
                <input type="text" class="form-control" id="jobTitle" placeholder="Job Title" name="job_title" value="<?php echo $mp['job_position'];?>">
                </div>
            </div>

            <div class="form-group">
                <label for="jobTitle"><font face="caviar dreams" size="4%">Requisition ID:</font></label>
                <div class="manage_id">
                <input type="text" class="form-control" id="jobTitle" placeholder="Requisition ID" name="req_id">
                </div>
            </div>





        <div class="form-group">
                <label for="job_desc"><font face="caviar dreams" size="4%">Job Description: </font></label>
                <textarea placeholder="Job Description" class="form-control" rows="2" id="elm1" name="job_desc"></textarea>
        </div>

        <div class="form-group col-md-4">
                <label><font face="caviar dreams" size="4%">Qulaifications:</font> </label>
                <select class="form-control " id="sel1" name="ha">
                      <option default selected>Select Attainment</option>
                      <option value="Vocational">Vocational Diploma / Short Couse Certificate</option>
                      <option value="Bachelors/College Degree">Bachelor's/College Degree</option>
                      <option value="Graduate Studies">Post Graduate Diploma / Master's Degree</option>
                      <option value="doctorate">Doctorate Degree</option>
                      <option value="Passed Licensure Exam">Professional License (Passed Board/Bar/Professional License Exam)</option>


                </select>
        </div>
<?php

$skills = $this->model_users->getSkills();
        $ownskill = explode(',', $mp['skills_requirements']);

?>
        <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <select class="js-example-tokenizer form-control" multiple="multiple" name="skills[]">
                    <?php
                      foreach ($ownskill as $skill) {
                          echo "<option selected value='$skill'>$skill</option>";
                      }
                    ?>
                </select>
            </div>
        </div>

<br><br><br><br><br><br>

        <div class="form-group col-md-4">
             <select class="form-control" id="sel1" name="program">
              <option disabled selected>Program</option>
                    <option value="Information Technology,Computer Scince">Information Technology/Computer Science</option>

                      <option value="Engineering,Civil">Engineering (Civil)</option>
                      <option value="Engineering,Industrial">Engineering (Industrial)</option>
                      <option value="Engineering,Electrical,Electronic">Engineering (Electrical/Electronic)</option>
                      <option value="Engineering,Computer,Telecommunication">Engineering (Computer/Telecommunication)</option>
                      <option value="Engineering,Mechanical">Engineering (Mechanical)</option>
                       <option value="Engineering,Health,Safety,Environmental">Engineering (Health/Safety/Environmental)</option>
                        <option value="Human Resource Management">Human Resource Management</option>




                </select>
        </div>
<br><br>

        <div class="form-group col-md-4">
             <select class="form-control" id="sel1" name="emp_type">
              <option disabled selected>Employment type</option>
                            <?php
                                        if($mp['employment_type'] == "Full Time"){


                            ?>
                      <option selected value="Full Time">Regular Full Time</option>
                      <?php
                            }else{
                      ?>
                      <option selected value="Part time">Part time</option>

                      <?php
                        }
                      ?>
                </select>
        </div>

         <br><br><label><font face="caviar dreams" size="4%">&nbsp;&nbsp;Work Experience:</font> </label><br>
         <div class="form-group ">

            <div class="col-md-2">
                <select class="form-control input-lg" id="sel1" name="number">
                <option disabled selected>number</option>
                <option selected value="<?php echo $mp['work_expi'];?>"><?php echo $mp['work_expi'];?></option>

                </select>
            </div>

            <div class="col-md-2">
                <select class="form-control input-lg" id="sel1" name="year/month">
                <option disabled selected>Year/Month</option>
                <option selected value="Year/s">Year/s</option>
                <option value="Month/s">Month/s</option>
                </select>
            </div>
        </div>

        <br><br>
        <div class="form-group col-md-4">
            <label><font face="caviar dreams" size="4%">Salary:</font> </label>
            <select class="form-control input-lg" id="sel1" name="salary">
                <option disabled selected>Salary</option>
                <option value="10000,20000">P 10, 000.00 - P 20, 000.00</option>
                <option value="20000,30000">P 20, 000.00 - P 30, 000.00</option>
                <option value="30000,40000">P 30, 000.00 - P 40, 000.00</option>
                <option value="40000,50000">P 40, 000.00 - P 50, 000.00</option>
                <option value="50000,20000">P 50, 000.00 above</option>

            </select>
			<br>
              <label><font face="caviar dreams" size="4%">Job slots:</font> </label>
            <select class="form-control input-lg" id="sel1" name="jobslots">
            <option disabled selected>Job slot</option>
            <option selected value="<?php echo $mp['job_slots'];?>"><?php echo $mp['job_slots'];?></option>

            </select>

    <?php
            }
    ?>

        </div>
        <br><br><br><br><br><br>
        <button class="btn btn-primary pull-right" type="submit"><font face="bebas" size="4%">Post Job</font></button>


<?php echo form_close();?>

<?php if(validation_errors()){?>
    <div class="alert alert-danger" role="alert">
      <font size="2px"><?php echo validation_errors();?></font>

    </div>
<?php
}

?>



                  </div> <!--End of panel-body-->
                </div><!--End of panel panel-primary-->
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
    <!-- select2 -->
    <script src="<?php echo base_url();?>js/admin/js/select/select2.full.js"></script>

    <script type="text/javascript">
       $('select').select2();
       $('.js-example-tokenizer').select2({
            tags: true,
            maximumSelectionLength: 5,

            placeholder: "Select skills"
        });
    </script>


    <!-- select2 -->
        <script>
            $(document).ready(function () {

            });
        </script>
        <!-- /select2 -->

</body>

</html>