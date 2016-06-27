<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>css/styles.css">



    <title>Emp login
    </title>
</head>
<body>
<div class="box emp-login">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><strong><center>Employee's Login</center></strong></h3>
  </div>

  <div class="panel-body">

    <div class="table-responsive">
   <?php echo form_open('emp/employee_validation');?>
  <div class="form-group">
    <label for="exampleInputEmail1">Employee Id</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Employee No." name="empid">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="emppass">
  </div>
  <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
</form>
</div>
<?php echo validation_errors();?>

  </div>
</div>
</div>



</body>
</html>