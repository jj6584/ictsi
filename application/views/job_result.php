<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
 <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <!--
  Calls the necessary javascript files from the AwardSpace file server.
  -->
<script src="<?php echo base_url();?>js/list.js"></script>
<script src="list.js"></script>
<script src="list.pagination.js"></script>
<script src="list.fuzzysearch.js"></script>


<link rel="stylesheet" href="<?php echo base_url();?>css/result.css">

<meta charset=utf-8 />
<title>Career Concept Job Board</title>

<style type="text/css">

    .box{
        margin-left: 10%;
    }
</style>
</head>
<body>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <div id="jobs">

  <!--
  Creates the input button. ID = Input, used later in code
  -->
  <?php
        echo form_open("main/dosearch");
  ?>



  <!--
  Defines the filter categories as text. Clicking on these filters the job results.
  -->
<!--
  <div class="filter">
     <li class="btn" id="filter-none">Show All Categories <span id="allResults" /></li>
     <li class="btn" id="filter-welding">Welding <span id="weldingResults"/></li>
     <li class="btn" id="filter-electrical">Electrical <span id="electricalResults"/></li>
     <li class="btn" id="filter-fabrication">Fabrication <span id="fabricationResults"/></li>
     <li class="btn" id="filter-warehouse">Warehouse <span id="warehouseResults"/></li>
     <li class="btn" id="filter-skilled">Skilled Labor <span id="skilledResults"/></li>
     <li class="btn" id="filter-general">General Labor <span id="generalResults"/></li>
     <li class="btn" id="filter-clerical">Clerical <span id="clericalResults"/></li>
     <li class="btn" id="filter-management">Management <span id="managementResults"/></li>
  </div> -->
  <!--
  Complete list of jobs. Each job has five parts: job name, category, county, date posted, and brief job description
  -->

  <br>
  <br>
  <br>
<div class="box col-md-10">
    <div class="col-md-4">
  <input type="text" class="search form-control" name="job" placeholder="Search Job" />
  </div>
  <button class="sort" type="submit">
    Search by category
  </button>

  </form>
    <a href="<?php echo base_url();?>main"><button class="sort">
    Back to home
  </button></a>

  <br/><br/>
  <ul class="list">

            <?php
                foreach ($match as $value) {
            ?>
    <li>
      <p class="Management" />

      <h3 class="name"><font color="red"><?php echo $value['job_title'];?></font></h3>
      <p class="category">Category: <?php echo $value['work_area'];?></p>
      <p class="category"><?php echo $value['exp_salary'];?></p>
        <p class="category"><?php echo "Working experience:"." ".$value['work_exp'];?></p>
      <p class="county"><?php echo "Employment type:"." ".$value['employment_type'];?></p>
      <p class="date"><?php echo "Date added:"." ".$value['date_added'];?></p>
      <br><?php
        echo $value['job_desc'];
        $var = $value['job_id'];
      ?>
      <p><a href="<?php echo base_url();?>main/apply" role="button">Apply</a> | <a href="<?php echo base_url();?>main/share_job/<?php echo $var;?>" role="button" target="_blank">Share via Email</a>
        <br>

      </li>



<?php
        }
?>
</ul>
</div>
</body>
</html>