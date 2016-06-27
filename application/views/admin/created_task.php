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
                                    <h2>Edit Content<small></small></h2>
                
                                    <div class="clearfix"></div>
                                </div>

                                <div class="x_content">
                                    
                                    <article class="media event">
                                        
                                        <div class="media-body">
                                            
<div class="created-task">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">To-Do </h3>
  </div>
  <div class="panel-body">
  <?php
if(isset($_SESSION['success1'])){

echo "<div class='alert alert-success' role='alert'>".$_SESSION['success1']."</div>";

}else{
    echo "";
}
?>
<?php
if(isset($_SESSION['success2'])){

echo "<div class='alert alert-danger' role='alert'>".$_SESSION['success2']."</div>";

}else{
    echo "";
}
?>

 <?php

$this->load->model('model_admin');
             $admin = $this->model_admin->get_owner($_SESSION['admin_id']);
                $assign = $this->model_admin->get_todo4($details['id']);

            ?>
   <table >
   <tr>
  <td><span class="glyphicon glyphicon-ok text-success" style="font-size:3.5em;" aria-hidden="true"></span></td><td>&nbsp;&nbsp;&nbsp;</td><td><h1><?php echo $details['title'];?></h1></td>
  </tr>
    </table>
    <div class="alert alert-success" role="alert">To-do has been created succesfully</div>

    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>  <?php echo $details['date']?>, start:<?php echo $details['start_time']?>, end at:<?php echo $details['end_time']?>
    <br>
    <?php

    foreach($assign as $key){
        $get = $this->model_admin->get_assigned($key['assigned_to']);

   echo "Owner:". $key['admin_fname']."<br>";
     echo "Assigned to:";  foreach ($get as $key) {
         echo ","." ".$key['admin_fname'];
     }
}
   ?>


 <br>
    <a href="<?php echo base_url();?>/admin/create_task"><button type="button" class="btn btn-primary pull-right" >Back</button></a>

    </div>
</div>

</div>
<!--End of add-FAQ-box class-->

<div class="task-actions">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">To-Do </h3>
  </div>
  <div class="panel-body">
  Important Actions<br>




<!-- EDIT TO-DO -->
   <!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">
Edit To-Do
</button>
<br>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit To-Do</h4>
      </div>

      <div class="modal-body">
     <form action="<?=base_url()?>admin/edit_task/<?=$details['id']?>" method="post">
         <form>
            <div class="createtask" >
            <table >
            <tr>
            <td><label for="exampleInputEmail1">Title: </label></td>
            <td><input type="text" style="margin-left:5%; margin-bottom:5%;" class="form-control" name="title" value="<?php echo $details['title'];?>" ></td>
            </tr>

             <tr>
            <td><label for="exampleInputEmail1">Details: </label></td>
            <td><textarea style="margin-left:5%; margin-bottom:5%;" input type="text" class="form-control" name="details" value="<?php echo $details['details'];?>"></textarea></td>
            </tr>



            <tr>
            <td><label for="exampleInputEmail1">Due by: </label></td>
            <td><input type="date" style="margin-left:5%;margin-bottom:5%;" class="form-control" name="date" value="<?php echo $details['date'];?>" ></td>
            </tr>

            <tr>
            <td><label for="exampleInputEmail1">At: </label></td>
            <td><input type="time" style="margin-left:5%;margin-bottom:5%;"class="form-control" name="time" value="<?php echo $details['time'];?>"></td>
            </tr>
            </table>
            </div>






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input class="btn btn-primary " type="submit" role="button" value="Edit To-Do"></a>

        </form>
      </div>
    </div>
  </div>
</div>


<!-- END EDIT TO-DO -->



<!-- DELETE TO-DO -->


   <!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteTodo">
Delete To-Do
</button>
<br>

<!-- Modal -->
<div class="modal fade" id="deleteTodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete To-Do</h4>
      </div>
      <div class="modal-body">
<form action="<?=base_url()?>admin/delete_task/<?=$details['id']?>" method="post">
        Are you sure you want to delete this?


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input class="btn btn-danger " type="submit" role="button" value="Delete To-Do"></a>
        </form>
      </div>
    </div>
  </div>
</div>









   <hr>


   <?php
if($details['status']==0){
   echo "<button type='button' class='btn btn-danger disabled'><span class='glyphicon glyphicon-time' aria-hidden='true'></span> Pending</button>";
  echo " &nbsp;&nbsp;&nbsp";
   echo "<a href=". base_url()."admin/update_task_status/".$details['id']."><input type='button'  class='btn btn-primary' data-loading-text='Loading...' value='Accomplished'></button></a>";

}else{
    echo "<button type='button' class='btn btn-success disabled'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Accomplished</button>";
 echo " &nbsp;&nbsp;&nbsp";
 echo "<a href=". base_url()."admin/updated_task_status/".$details['id']."><input type='button'  class='btn btn-danger' data-loading-text='Loading...' value='Unaccomplished'></button></a>";


}
   ?>
    </div>
</div>

</div>
<!--End of add-FAQ-box class-->



<!--END DELETE TO-DO -->
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