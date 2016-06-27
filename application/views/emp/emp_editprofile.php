<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

       <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">


    <style type ="text/css">

</style>
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" style="background-color: #428bca">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="<?php echo base_url();?>emp/dashboard">
        <img alt="Brand" src="<?php echo base_url();?>images/logo.png" style="margin-top:-9px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url();?>emp/dashboard"><font color="White">Employee Evaluation</font></a></li>
        <li><a href="<?php echo base_url();?>emp/request"><font color="White">Manpower Request Form</font></a></li>
        <li><a href="<?php echo base_url();?>emp/referralform"><font color="White">Referral Form</font></a></li>

      </ul>



        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span style="font-size:1.5em;" class="glyphicon glyphicon-bell" aria-hidden="true"></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="#">Notif 1</a></li>
            <li><a href="#">Notif 2</a></li>
            <li><a href="#">Notif 3</a></li>
            <li><a href="#">Notif 4</a></li>
            <li><a href="#">Notif 5</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span style="font-size:1.5em;" class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<span><?php echo $_SESSION['emp_fname']. " ". $_SESSION['emp_lname'];?></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>emp/profile">Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>emp/logout">Sign out</a></li>
          </ul>
        </li>
      </ul>
      <!-- <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form> -->


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



    <?php
        $fullname = $_SESSION['emp_fname'] . " ". $_SESSION['emp_mname'] ." ". $_SESSION['emp_lname'];

        $fname = $_SESSION['emp_fname'];
        $mname = $_SESSION['emp_mname'];
        $lname = $_SESSION['emp_lname'];
    ?>

<style>
table, th, td {
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}
</style>

 <?php

                $empdata = $this -> model_emp ->getDetailsemp();

    ?>
										<div class="emp_profile">
										  <h2>Personal Information</h2>
                                            <hr>
                                            <table class="hr_text">
                                            <?php
                                                        foreach ($empdata as $val) {


                                            ?>
                                                <tr>
                                                    <td>First Name: </td>
                                                    <td><input type="text" class="form-control" value="<?php echo $val['c_e_name'];?>" name="fname"></td>
                                                </tr>

                                                <tr>
                                                    <td>Middle Name:</td>
                                                    <td><input type="text" class="form-control"value="<?php echo $val['c_e_mname'];;?>" name="mname"></td>
                                                </tr>

                                                <tr>
                                                    <td>Last Name:</td>
                                                    <td><input type="text" class="form-control"value="<?php echo $val['c_e_lname'];;?>" name="lname"></td>
                                                </tr>
                                            <?php
                                                }
                                            ?>
                                                    <tr>
                                                    <td><button style="margin-left:-1px;" class="hr_editbtn">Save changes</button></td>
                                                </tr>
                                              

                           
                                              </div>
                         
                                            </form>

                                            </table>

                                            <h2>Account Information</h2>
                                            <hr>
                                            <table class="hr_text">
                                                <tr>
                                                    <td>Old Password:</td>
                                                    <td><input type="password" class="form-control" name="oldpass"></td>
                                                </tr>

                                                <tr>
                                                    <td>New Password:</td>
                                                    <td><input type="password" class="form-control" name="newpass"></td>
                                                </tr>

                                                <tr>
                                                    <td>Confirm New Password</td>
                                                    <td><input type="password" class="form-control" name="cpass"></td>
                                                </tr>

                                                <tr>
                                                    <td><button style="margin-left:-1px;" class="hr_editbtn">Change password</button></td>
                                                </tr>

                                            </table>
                                        </form>
                    </div>


    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
    </script>

    <script type="text/javascript">
  $(function () {
      $('[data-toggle="popover"]').popover()
  })
  </script>
