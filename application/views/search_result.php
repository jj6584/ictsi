<html>
	<head>

		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>css/styles.css">
		<script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 		<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

 	</head>
 <body>

 			<center>
 				<h1 style="margin-top: 5%;">Search Job <small>Results for <em>JOB</em></small></h1>
 			</center>

 	<table class="table table-hover table-search">
 		<thead>
 			<tr style="background-color:#428bca; color:white;">
 			<th>Job Title</th>
 			<th>Date Posted</th>
 			<th>Action</th>
 			</tr>
 		</thead>

 		<tbody>
 			<tr>
 				<td>Mark John</td>
 				<td>August 03, 2015</td>
 				<td>
 					<a href="<?php echo base_url();?>main/apply"><button class="apply-button">Apply</button></a> 
 					|
 					<a href="<?php echo base_url();?>"><button class="share-button">Share with freinds</button></a> 
 				</td>
 			</tr>
 		</tbody>

</body>
</html>