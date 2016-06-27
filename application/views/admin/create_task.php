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
                                    <h2>Task Management<small>Create To-do Task and View Calendar</small></h2>

                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">

                                    <article class="media event">

                                        <div class="media-body">






<div class="todo-box">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">To-Do</h3>


  </div>
  <div class="panel-body">
	  <?php

        if(isset($_SESSION['not'])){
            echo $_SESSION['not'];
        }
    ?>
    <div class="container-fluid">
        <table class="table table-hover ">
        <thead>
            <th>Title</th>
            <th>Due Date</th>

            <th>Assigned to:</th>

            <th>Status</th>

        </thead>
        <?php
        $datas  = $this -> model_admin -> get_todo33($_SESSION['admin_id']);
         $d = date("Y-m-d");
         $t = date("H:i:s");
        $this -> load -> model('model_admin');
        foreach($datas as $data)
        {


                $get = $this->model_admin->get_assigned($data['assigned_to']);
				$due = $data['date'].$data['end_time'];
                $deadline = date("F j, Y, g:i a", strtotime($due));
            if($data['date']<=$d ){

            echo "<tr class='danger'>";

        }else{
                echo "<tr>";
            }
            echo "<td>".anchor('admin/old_created_task/'.$data['id'].'',$data['title'])."</td>";
              echo "<td>".$deadline."</td>";
            echo "<td>";
            foreach ($get as $ww) {
               echo $ww['admin_fname'].",";
            }


            echo "</td>";



            if($data['status']==0){
            echo "<td><span   class='label label-danger '>Unaccomplished</td>";
            }
            else{

                echo "<td><span   class='label label-success '>Accomplished</td>";
            }
            echo "<tr>";

        }



         ?>




        </table>
    </div>


 <div class="pull-right">
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<span class="fa fa-plus-square-o" aria-hidden="true"></span> Create To-Do
</button>

<a href="<?php echo base_url();?>admin/view_calendar"><button type="button" class="btn btn-success" >
<span class="fa fa-calendar" aria-hidden="true"></span> View Calendar
</button></a>


</div>


<div class="to-do1">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top:-10%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create To-Do</h4>
      </div>
      <div class="modal-body">

        <?php
         $admin_id= $_SESSION['admin_id'];

         echo form_open('admin/create_task/'.$admin_id);
             $this -> load ->model('model_admin');
             $admin = $this->model_admin->get_admin();

        ?>



       <!--  <form action = "<?=base_url()?>admin/create_task" method="post" > -->
            <div class="createtask" >

            <table >
            <tr>
            <td><label for="exampleInputEmail1">Title: </label></td>
            <td><input type="text" style="margin-left:5%; margin-bottom:5%;" class="form-control" id="title" name="title"></td>
            </tr>

             <tr>
            <td><label for="exampleInputEmail1">Details: </label></td>
            <td><textarea style="margin-left:5%; margin-bottom:5%;" input type="text" class="form-control" name="details"></textarea></td>
            </tr>

            <tr>
            <td><label for="exampleInputEmail1">Assign to: </label></td>
            <td>
              <select class="js-example-basic-multiple" style="margin-left:5%; margin-bottom:5%;" multiple="multiple"  name="assigned[]">

              <?php

              foreach($admin as $key){
                   echo "<option value=".$key['admin_id'].">".$key['admin_fname']."</option>";
              }
            ?>


              </select>
            </td>
            </tr>

            <tr>
            <td><label for="exampleInputEmail1">Due by: </label></td>
            <td><input type="date" style="margin-left:5%;margin-bottom:5%;" class="form-control" id="date" name="date"></td>
            </tr>

              <tr>
            <td><label for="exampleInputEmail1">start at: </label></td>
            <td><input type="time" style="margin-left:5%;margin-bottom:5%;"class="form-control" id="time" name="time" ></td>
            </tr>
            <tr>
            <td><label for="exampleInputEmail1">end at: </label></td>
            <td><input type="time" style="margin-left:5%;margin-bottom:5%;"class="form-control" id="time" name="end_time" ></td>
            </tr>
            </table>
            </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input class="btn btn-primary " type="submit" role="button" value="Create To-Do"></a>
         <?php echo form_close();?>
      </div>
    </div>
  </div>
</div>
  </div>


  <!-- DULO  -->








  </div>
</div>
</div>

<br>





<?php
if(isset($_SESSION['success'])){

echo "<div class='alert alert-danger' role='alert'>".$_SESSION['success']."</div>";

}else{
    echo "";
}
?>



</div><!--End of add-FAQ-box class-->
<div id="calendar"></div>
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
