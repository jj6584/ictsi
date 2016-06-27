<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>css/styles.css">


<style type="text/css">

.margin{
  margin-top: 10%;
  margin-left: 33%;
}

</style>

<div class="tint-login">

  <img src="<?php echo base_url();?>images/bgadmin.jpg" height="100%" width="100%">
  <h1 class="login-text2"><font face="bebas">ADMIN LOGIN</font></h1>

<div class="login-admin-page">  

  <div class="panel-body">
   <?php echo form_open('admin/admin_validation');?>
  <div class="form-group <?php if(form_error('adminuser')){echo 'has-error';} ?>">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control login-textbox" id="exampleInputEmail1" placeholder="Username" name="adminuser">
  </div>
  <div class="form-group <?php if(form_error('adminpass')){echo 'has-error';} ?>">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control login-textbox" id="exampleInputPassword1" placeholder="Password" name="adminpass">
  </div>
  <button type="submit" class="adminBTN">Login</button>
</div>
<?php echo form_close();?>

  </div>
</div>