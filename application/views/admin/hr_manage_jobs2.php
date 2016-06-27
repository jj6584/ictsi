<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICTSI - Admin Dashboard</title>

    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

    <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="<?php echo base_url();?>admin/hr_dashboard">ICTSI - HR Admin</a>
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
<?php
        $fullname = $_SESSION['admin_fname'] . " ". $_SESSION['admin_mname'] ." ". $_SESSION['admin_lname'];
        $this -> load -> model('model_users');
        $skills = $this->model_users->getSkills();
    ?>
                <!--Start of Account Bar-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $fullname;?>  <b class="caret"></b></a>
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
                            <a href="<?php echo base_url();?>admin/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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

                    <li>
                        <a href="<?php echo base_url();?>admin/hr_dashboard">Dashboard</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#eaManagement">
                            Employee's & Applicant Management<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="eaManagement" class="collapse">
                            <li>
                                <a href="<?php echo base_url();?>admin/manageEmp">Manage Employee's Record</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active">
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
                        <a href="#">Send Performance Evaluation Form</a>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#schedActivity">
                            Schedule Activity<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="schedActivity" class="collapse">
                            <li>
                                <a href="#">Create To-do List</a>
                            </li>
                            <li>
                                <a href="#">Interview Schedules</a>
                            </li>
                            <li>
                                <a href="#">Recruiter's Event</a>
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
                            HR Administrator <small>Job Management</small>
                        </h1>
                    </div>
                </div>


<!--Start of add-FAQ-box class-->

<div class="hrDash-manjobs">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Manage Job</h3>
  </div>
<div class="panel-body">
        <?php echo form_open('admin/validateinsert');?>
            <div class="form-group <?php if(form_error('job_title')){echo "has-error";}?>">
                <label for="jobTitle"><font face="caviar dreams" size="4%">Job Title:</font></label>
                <div class="manage_title">
                <input type="text" class="form-control" id="jobTitle" placeholder="Job Title" name="job_title">
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



        <div class="form-group manage_qualifications">
                <label><font face="caviar dreams" size="4%">Qulaifications:</font> </label>
                <select class="form-control" id="sel1" name="ha">
                      <option default selected>Select Attainment</option>
                      <option value="Vocational">Vocational Diploma / Short Couse Certificate</option>
                      <option value="Bachelors/College Degree">Bachelor's/College Degree</option>
                      <option value="Graduate Studies">Post Graduate Diploma / Master's Degree</option>
                      <option value="doctorate">Doctorate Degree</option>
                      <option value="Passed Licensure Exam">Professional License (Passed Board/Bar/Professional License Exam)</option>


                </select>
        </div>

        <select class="js-example-basic-multiple" multiple="multiple" width="50%" name="skills[]">
            <?php
      foreach ($skills as $skill) {
          echo "<option value='$skill[skill_name]'>$skill[skill_name]</option>";
      }
        ?>
        </select>
    <br><br><label><font face="caviar dreams" size="4%">Work Experience:</font> </label><br>
         <div class="form-group manage_exp">

            <div class="work-work">
                <select class="form-control input-lg" id="sel1" name="number">
                <option disabled selected>number</option>
                <option value="1">1</option>
                <option value="5">5</option>
                <option value="10">10</option>
                </select>
            </div>

            <div class="work-work2">
                <select class="form-control input-lg" id="sel1" name="year/month">
                <option disabled selected>Year/Month</option>
                <option value="Year/s">Year/s</option>
                <option value="Month/s">Month/s</option>
                </select>
            </div>
        </div>
<br><br>
        <div class="form-group manage_salary">
            <select class="form-control input-lg" id="sel1" name="salary">
                <option disabled selected>Expected Salary</option>
                <option value="P 10, 000.00 - P 20, 000.00">P 10, 000.00 - P 20, 000.00</option>
                <option value="P 20, 000.00 - P 30, 000.00">P 20, 000.00 - P 30, 000.00</option>
                <option value="P 30, 000.00 - P 40, 000.00">P 30, 000.00 - P 40, 000.00</option>
                <option value="P 40, 000.00 - P 50, 000.00">P 40, 000.00 - P 50, 000.00</option>
                <option value="P 50, 000.00 above">P 50, 000.00 above</option>

            </select>


        </div>

        <div class="form-group manage_program">
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


        <div class="form-group manage_empType">
             <select class="form-control" id="sel1" name="emp_type">
              <option disabled selected>Employment type</option>

                      <option value="Regular Full Time">Regular Full Time</option>
                      <option value="Part time">Part time</option>
                </select>
        </div>




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
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->

    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select Skills", width: '45%', limit: '5' });
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo base_url();?>js/plugins/morris/morris-data.js"></script>



</body>

</html>
