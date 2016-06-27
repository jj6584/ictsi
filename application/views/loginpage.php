<html>
<head>
	<title>User Login</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">


    <!--Bootstrap and JavaScript-->
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>js/nav.js"></script> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

   	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css" />
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/set1.css" />


</head>

<body>

	<div class="tint-login col-md-13">

	<img src="<?php echo base_url();?>images/banner21.jpg" height="100%" width="100%">

		<div class="login-text col-md-5">
				<p><font face="bebas" size="10em">INTERNATIONAL CONTAINER TERMINAL SERVICE INC.</font></p>
		

		<hr>
			


<br>

			 <?php
                                                            if(isset($_SESSION['acctopened'])){
                                                                    echo $_SESSION['acctopened'];
                                                            }
															if(isset($_SESSION['notvery'])){
                                                                    echo $_SESSION['notvery'];
                                                            }
                                                    ?>
			<?php echo form_open('main/login_validation');?>
			
			<div class="<?php if(form_error('email')){echo 'has-error';} ?>">
			<input type="text" class="form-control textbox input-lg" placeholder="Email Address" name="email" value="<?php echo set_value(form_error('email'));?>"
				data-toggle="<?php if(form_error('email')){
					echo "popover";}else{echo "";}?>"
				data-trigger="focus" data-placement="bottom"
				data-html="true" data-content="<?php echo form_error('email');?>">
			</div>


			<br />
			<div class="<?php if(form_error('password')){echo 'has-error';} ?>">
			<input type="password" class="form-control textbox input-lg" placeholder="Password" name="password"
			data-toggle="<?php if(form_error('password')){
					echo "popover";}else{echo "";}?>"
			data-trigger="focus" data-placement="bottom"
			data-html="true" data-content="<?php echo form_error('password');?>">
			</div>
			
			<br />
			<input type="submit" class="btn-login" value="Login">

			<br /><br />
			<a href="<?php echo base_url()?>main/forgotpassword" class="btn-lg anchor-color">Forgot password?</a>
			
			<?php echo form_close(); ?>
		</div>

</div>

	<script type="text/javascript">
	$(function () {
  		$('[data-toggle="popover"]').popover()
	})
	</script>


</body>
</html>