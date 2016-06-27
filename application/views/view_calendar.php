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
    <link href="<?php echo base_url();?>css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

       <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>




    <!--  END CALENDAR-->
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
    ?>
                <!--Start of Account Bar-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $fullname;?> <b class="caret"></b></a>
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
                                <a href="<?php echo base_url();?>admin/managejobs">Manage Jobs Available</a>
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
                                <a href="<?php echo base_url();?>admin/create_task">Create To-do List</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>admin/track_interviewSched">Interview Schedules</a>
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
                            HR Administrator <small>Dashboard</small>
                        </h1>
                    </div>
                </div>

<?php
    $jobs = $this->model_admin->jobOpen();
?>
                </div>

<div class="add-FAQ-box">
                








<div class="box-cal ">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Calendar</h3>


  </div>
  <div class="panel-body">
    
    <div class="container-fluid">
      <div id="calendar"></div>
    </div>
<br>
<a href="<?php echo base_url();?>admin/create_task"><button type="button" class="btn btn-primary pull-right" >
 Back
</button></a>
     


<div class="to-do2">
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create To-Do</h4>
      </div>
      <div class="modal-body">

        <?php echo form_open('admin/create_task');
             $this -> load ->model('model_admin');
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
            <td><label for="exampleInputEmail1">Due by: </label></td>
            <td><input type="date" style="margin-left:5%;margin-bottom:5%;" class="form-control" id="date" name="date"></td>
            </tr>

            <tr>
            <td><label for="exampleInputEmail1">At: </label></td>
            <td><input type="time" style="margin-left:5%;margin-bottom:5%;"class="form-control" id="time" name="time" ></td>
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


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
       <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

 

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url();?>js/raphael.min.js"></script>
    <script src="<?php echo base_url();?>js/morris.min.js"></script>
    <script src="<?php echo base_url();?>js/morris-data.js"></script>


<script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
    </script>


<script type="text/javascript">
    
    $('#asd').popover(options);
</script>











<!-- CALENDAR -->

      <link href="<?php echo base_url();?>fullcalendar.css" rel="stylesheet" />
<link href="<?php echo base_url();?>fullcalendar.print.css" rel='stylesheet' media='print' />
<script src='<?php echo base_url();?>lib/moment.min.js'></script>
<script src='<?php echo base_url();?>lib/jquery.min.js'></script>
<script src='<?php echo base_url();?>fullcalendar.min.js'></script>

<?php 


                 $datas  = $this -> model_admin -> get_todo2();

                $this -> load -> model('model_admin');
//                 foreach($datas as $data)
//                 {
//                 echo $data['title'];
                   
              
//                 }
                $d = date("Y-m-d");
echo "<script>

    $(document).ready(function() {
        
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '$d',
            editable: true,
            eventLimit: true, // allow 'more' link when too many events
            events: [";

            foreach($datas as $data){
            
            echo "    {

                    title: '".$data['title']."' ,
                    url : '".base_url()."admin/old_created_task/".$data['id']."',
                    start: '".$data['date']."T".$data['time']."',

                  },
                ";
            }

               echo  " {
                    title: 'd',
                    start: '2015-02-12',
                 
                }


               


       













              
            ]
        });
        
    });


</script>";


?>
<style>

    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
    }

    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }

</style>








</body>

</html>
