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
    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>
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
                                    <h2>Others...</h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">

<!--START OF USER ROLES and PERMISSION-->

<?php
        $jobs = $this -> model_admin ->getclosedjobs();
?>
<div class="hrDash-arOpen">
<?php
        if(isset($_SESSION['archived'])){
                echo $_SESSION['archived'];
        }
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Archive Opening</h3>
  </div>
<div class="panel-body">
<div class="scrollit" id="style-1">
    <table class="table">
                        <thead>
                            <th>Job Title</th>
                            <th>Date Posted</th>
                            <th>Action</th>
                        </thead>

                        <tbody>
                        <?php
                                foreach ($jobs as $closedjobs) {


                        ?>
                            <tr>
                                <td><a href="#"><?php echo $closedjobs['job_title'];?></a></td>
                                <td><?php echo $closedjobs['date_added'];?></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $closedjobs['job_id'];?>">Archive
                                    </button>

<!-- Modal -->
<div class="modal fade" id="<?php echo $closedjobs['job_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Archive Opening</h4>
      </div>
      <div class="modal-body">
        <h4>Do you really want to archived <?php echo $closedjobs['job_title'];?>?
      </div>
      <div class="modal-footer">
      <?php
        echo form_open("admin/archived");
        echo form_hidden("jobid", $closedjobs['job_id']);
        echo form_hidden("jobname", $closedjobs['job_title']);
      ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-success">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>
</td>
                            </tr>

                            <?php
                                    }
                            ?>

                    </table>
                  </tbody>
			</div>
</div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->

<hr>


<!--START OF USER ROLES and PERMISSION-->

<?php
        $jobs = $this -> model_admin ->getclosedjobs2();
?>
<div class="hrDash-arOpen">
<?php
        if(isset($_SESSION['archived'])){
                echo $_SESSION['archived'];
        }
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Archived Jobs</h3>
  </div>
<div class="panel-body">
    <table class="table table">

                            <th>Job Title</th>
                            <th>Date Posted</th>
                           <!-- <th>Action</th> -->


                        <?php
                                foreach ($jobs as $closedjobs) {

							$id  = $closedjobs['job_id'];
                        ?>

                            <tr>

								<?php echo "<td><a href=".base_url()."admin/view_archived_applicants/".$closedjobs['job_id'].">".$closedjobs['job_title']."</a></td>"; ?>
                                <td><?php echo $closedjobs['date_added'];?></td>

                            </tr>

                            <?php
                                    }
                            ?>

                    </table>

</div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->

<hr>

<!--START OF USER ROLES and PERMISSION-->

<div class="hrDash-manSkills" id="addskills">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Manage Skills</h3>
  </div>
  <?php echo form_open("admin/validate_skills");?>
<div class="panel-body">
	<div class="col-md-7">
     <select class="js-example-basic-multiple js-example-tokenizer" multiple="multiple" width="50%" name="skills[]">
            <?php
      // foreach ($skills as $skill) {
      //     echo "<option value='$skill[skill_name]'>$skill[skill_name]</option>";
      // }
        ?>
        </select>
		</div>

                    <!-- <button type="submit"class="btn btn-success pull-right">Submit</button> -->
                    <input type="submit" name="submit" value="Add skills"  class="btn btn-success" />

        <?php if(validation_errors()){?>
    <div class="alert alert-danger" role="alert">
      <font size="2px"><?php echo validation_errors();?></font>

    </div>
<?php
}

if(isset($_SESSION['error'])){

    echo $_SESSION['error'];
}

if(isset($_SESSION['success'])){

    echo $_SESSION['success'];
}
?>
<?php echo form_close();

    $employment = $this->model_admin->getemploymentprogress();

?>
</div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->

<hr>


<!--START OF USER ROLES and PERMISSION-->

<div class="hrDash-manSkills" id="weightpercentage">

  <?php
    if(isset($_SESSION['fillupfields'])){
      echo $_SESSION['fillupfields'];
    }
    if(isset($_SESSION['not100'])){
      echo $_SESSION['not100'];
    }
    if(isset($_SESSION['changesuccu'])){
      echo $_SESSION['changesuccu'];
    }
  ?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Customize Job Matching</h3>
  </div>
    <div class="panel-body">

    <?php

        echo form_open("admin/changeweight");
      ?>
        <table class="table" >
            <th>Job Matching Parameters</th>
            <th>Current Percentage</th>
            <th>New Percentage</th>
<?php

    $percent = $this -> model_admin -> getweightpercentage();
    foreach ($percent as $keypercent) {

?>

            <tr>
                <td><b><font size="5px">Skills</font></b></td>

                <td><font size="5px"><?php echo $keypercent['skills']."%";?></font></td>

                <td>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="skills">
                    </div>
                    <font size="5px">%</font>
                </td>
            </tr>

            <tr>
                <td><b><font size="5px">Degree</font></b></td>

                <td><font size="5px"><?php echo $keypercent['degree']."%";?></font></td>

                <td>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="degree">
                    </div>
                    <font size="5px">%</font>
                </td>
            </tr>

            <tr>
                <td><b><font size="5px">Working Experience</font></b></td>

                <td><font size="5px"><?php echo $keypercent['workexp']."%";?></font></td>

                <td>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="workexp">
                    </div>
                    <font size="5px">%</font>
                </td>
            </tr>

            <tr>
                <td><b><font size="5px">Expected Salary</font></b></td>

                <td><font size="5px"><?php echo $keypercent['salary']."%";?></font></td>

                <td width="20%">
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="salary">
                    </div>
                    <font size="5px">%</font>
                </td>
            </tr>

            <tr>

                <td align="right"><font size="5px">TOTAL: </font></td>

                <td><font size="5px">100%</font></td>

                <td width="20%">

                </td>
            </tr>
            <?php
                }
            ?>
        </table>

        <button class="btn btn-primary pull-right">Save Changes</button>

    </form>

    </div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->

<hr>
<?php

$getmanpower = $this -> model_admin -> getmanpower();

?>

<!--START OF USER ROLES and PERMISSION-->

<div class="hrDash-manSkills" id="mp2">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Manpower Request Summary</h3>
  </div>
<div class="panel-body">
	<?php
      if(isset($_SESSION['jobcreated'])){
          echo $_SESSION['jobcreated'];
      }
  ?>

    <table class="table">
        <th>Requesting for a</th>
        <th>Department Manager</th>
        <th>Department Name</th>
        <th>Date Received</th>
        <th>Action</th>


         <?php
        $getmanpower = $this -> model_admin -> getmanpower();
        foreach ($getmanpower as $key) {
            $cname = $this -> model_admin -> getcoempname($key['emp_id']);
            $coemp = "";
			$date = date("F j, Y, g:i a", strtotime($key['date_add']));
            foreach ($cname as $key2) {
              $coemp = $key2['c_e_name']." ".$key2['c_e_lname'];
            }
        ?>
        <tr>
            <td><?php echo $key['job_position'];?></td>
            <td><?php echo $coemp?></td>

          <td><?php echo $key['dept_name'];?></td>
               <td><?php echo $date;?></td>
            <td><a href="<?php echo base_url();?>admin/approvereq/<?php echo $key['mp_id'];?>"><span class="label label-primary" role="button" style="cursor:pointer;">CREATE JOB</span></a></td>
        </tr>

        <?php
      }
        ?>
    </table>



</div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->


<hr>


<!--START OF USER ROLES and PERMISSION-->

<div class="hrDash-manSkills" id="addskills">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Referral Form Summary</h3>
  </div>
 <?php
 $getref = $this -> model_admin -> get_referral();

 ?>
<div class="panel-body">
    <table class="table">
        <th>Person Referred</th>
       <th>Skills</th>
        <th>Years Experience</th>
		        <th>Work Position</th>





		<?php
		foreach($getref as $ref){
			echo "<tr>";
            echo "<td>".$ref['fname']." ".$ref['lname']."</td>";
            echo "<td>".$ref['skills']."</td>";
			    echo "<td>".$ref['years_expi']."</td>";
			    echo "<td>".$ref['work_position']."</td>";
echo "<td><font size='4em'><a href=\"" . base_url() . "admin/delete_ref/". $ref['id'] ."\"><span class='label label-danger' style='cursor:pointer' role='button'>DELETE</span></a></font></td>";
				echo "</tr>";


		}
			?>





    </table>
</div>
</div>
</div>


<!--END OF USER ROLE and PERMISSION-->

<hr>





<!--START OF USER ROLES and PERMISSION-->

<div class="hrDash-peProgress" id="employment">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Pre-employment progress</h3>
  </div>
<div class="panel-body">
        <?php

                if(isset($_SESSION['hired'])){
                        echo $_SESSION['hired'];
                }

        ?>
<div class="scrollit" id="style-1">
     <table class="table">

                            <th>Applicant Name</th>
                            <th>Job</th>
                            <th>Progress</th>


                        <tr>
     <?php
        foreach ($employment as $val) {


   if($val['file_pc_status'] == 1 && $val['file_birth_status'] == 1 && $val['file_nbi_status'] == 1 && $val['file_sss_status'] == 1 && $val['file_pagibig_status'] == 1 ){
            $color = "success";
   }else{
            $color = "warning";
   }


             // echo "<td>" . anchor('main/job_description/'.$data['job_id'].'',$data['job_title']) . "</td>";
              echo "<td>" . anchor('admin/viewfiles/'.$val['id'].'',$val['fname']." ".$val['lname']) . "</td>";

            // echo "<td>". $val['fname']." ". $val['lname']. "</td>";
             echo "<td>". $val['job_title']."</td>";
             echo " <td> <div class='progress'>
  <div class='progress-bar progress-bar-$color' role='progressbar' aria-valuenow='60' aria-valuemin='0' aria-valuemax='100' style='width:";

 $pc_sss = 0;
 $pc_stat = 0;
 $pc_birth = 0;
   $pc_nbi = 0;
    $pc_pagibig = 0;

if($val['file_pc_status'] == 1){
        $pc_stat = 20;
}
if($val['file_birth_status'] == 1){
        $pc_birth = 20;
}
if($val['file_nbi_status'] == 1){
        $pc_nbi = 20;
}
if($val['file_pagibig_status'] == 1){
        $pc_pagibig = 20;
}
if($val['file_sss_status'] == 1){
        $pc_sss = 20;
}

$percent = $pc_sss + $pc_stat + $pc_nbi + $pc_birth + $pc_pagibig."%";



echo "$percent;' ";
 echo ">";
    echo "  $percent
  </div>
</div></td>";
    echo "<td>";
    echo "";



?>






                                <td>

                            </tr>
                               <?php } ?>
                        <!-- </tbody> -->
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
       $(".js-example-basic-multiple").select2({placeholder: "Select Skills", width: '45%', limit: '5' });
    </script>

    <!-- select2 -->
        <script>
            $(document).ready(function () {
                $(".select2_single").select2({
                    placeholder: "Select a state",
                    allowClear: true
                });
                $(".select2_group").select2({});
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "Select Skills (Max. selection of 4)",
                    allowClear: true

                });
            });


            $('.js-example-tokenizer').select2({
            tags: true,
            tokenSeparators: [','], width: '100%',

            placeholder: "Add Skill"
        });
        </script>
        <!-- /select2 -->

    <!-- tags -->
    <script type="text/javascript" src="<?php echo base_url();?>js/admin/js/tags/jquery.tagsinput.min.js"></script>

    <!-- input tags -->
        <script>
            function onAddTag(tag) {
                alert("Added a Skills: " + tag);
            }

            function onRemoveTag(tag) {
                alert("Removed a Skills: " + tag);
            }

            function onChangeTag(input, tag) {
                alert("Changed a Skills: " + tag);
            }

            $(function () {
                $('#tags_1').tagsInput({
                    width: 'auto'
                });
            });
        </script>
        <!-- /input tags -->
</body>

</html>
