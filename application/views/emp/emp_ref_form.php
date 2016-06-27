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
            <li><a href="">Sign out</a></li>
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

<!--Employee's Evaluation Form-->

<div class="emp-ref-form">
<div class="panel panel-primary">

  <div class="panel-heading">
    <h3 class="panel-title"><font face="bebas" size="8"><center>Referral FORM</center></font></h3>
  </div>
  <div class="panel-body">

<div class="request-form">

<form action = "<?=base_url()?>emp/referral_validation" method="post" >
  <div class="form-group <?php if(form_error('fname')){echo "has-error";}?>">
    <label for="fname">First Name:</label>
    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name"
    value="<?php echo set_value(form_error('fname'));?>"
        data-toggle="<?php if(form_error('fname')){
          echo "popover";}else{echo "";}?>"
        data-trigger="focus" data-placement="bottom"
        data-html="true" data-content="<?php echo form_error('fname');?>">
  </div>

  <div class="form-group <?php if(form_error('lname')){echo "has-error";}?>">
    <label for="lname">Last Name:</label>
    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name"
    value="<?php echo set_value(form_error('lname'));?>"
        data-toggle="<?php if(form_error('lname')){
          echo "popover";}else{echo "";}?>"
        data-trigger="focus" data-placement="bottom"
        data-html="true" data-content="<?php echo form_error('lname');?>">
  </div>
<?php
	$skills = $this->model_emp->getSkills();

?>
  <div class="form-group <?php if(form_error('year')){echo "has-error";}?>">
    <label for="skills">Skills:</label>

<select class="js-example-basic-multiple" multiple="multiple" name="skills[]" width="50%"
    value="<?php echo set_value(form_error('skills'));?>"
        data-toggle="<?php if(form_error('skills')){
          echo "popover";}else{echo "";}?>"
        data-trigger="focus" data-placement="bottom"
        data-html="true" data-content="<?php echo form_error('skills');?>">
		  <?php
      foreach ($skills as $skill) {
          echo "<option value='$skill[skill_name]'>$skill[skill_name]</option>";
      }


        ?>
</select>
  </div>

<div class="form-group <?php if(form_error('year')){echo "has-error";}?>">
    <label for="expi">Year Experience:</label>
    <input type="text" class="form-control" name="year" id="year" placeholder="How many years?"
    value="<?php echo set_value(form_error('year'));?>"
        data-toggle="<?php if(form_error('year')){
          echo "popover";}else{echo "";}?>"
        data-trigger="focus" data-placement="bottom"
        data-html="true" data-content="<?php echo form_error('year');?>">
  </div>

  <div class="form-group <?php if(form_error('pos')){echo "has-error";}?>">
    <input type="text" class="form-control" name="pos" id="pos" placeholder="Position?"
    value="<?php echo set_value(form_error('pos'));?>"
        data-toggle="<?php if(form_error('pos')){
          echo "popover";}else{echo "";}?>"
        data-trigger="focus" data-placement="bottom"
        data-html="true" data-content="<?php echo form_error('pos');?>">
  </div>

  <button class="btn btn-primary btn-block" type="submit"><font face="mohave" size="5">Send Referral</button>
</form>
</div>

  </div><!--End of panel-body-->
</div>
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
