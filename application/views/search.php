<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
  <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

  <meta name="description" content="Simple ideas for enhancing text input interactions" />
  <meta name="keywords" content="input, text, effect, focus, transition, interaction, inspiration, web design" />
  <meta name="author" content="Codrops" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/set1.css" />

  	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/default.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/component.css" />
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

	<script src="<?php echo base_url();?>js/modernizr.custom.js"></script>




</head>
	<body class="nl-blurred">
		<div class="container demo-1">
			<header>
				<h1>SEARCH JOB <span>OKAY</span></h1>
			</header>
			<div class="main clearfix">

                        <?php

                                $attributes = array(
                                        'class' => 'nl-form',
                                        'id' => 'nl-form'
                                    );

                                echo form_open("main/dosearch", $attributes);
                        ?>
					I'm a
					<select>

                                                       <option disabled selected>Target Audience</option>
						<option value="2">Fresh graduate</option>
						<option value="3">Professional</option>
					</select>

					<br / >
					looking for an opening in
					<input type="text" placeholder="Job" name="job">


					<div class="nl-submit-wrap">
						<button class="nl-submit" type="submit">Search Job</button>

					</div>
					<div class="nl-overlay"></div>
				</form>
			</div>
		</div><!-- /container -->
		<script src="<?php echo base_url();?>js/nlform.js"></script>
		<script>
			var nlform = new NLForm( document.getElementById( 'nl-form' ) );
		</script>
	</body>
</html>