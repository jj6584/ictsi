<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
        <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>

    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>

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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span style="font-size:1.5em;" class="glyphicon glyphicon-user" aria-hidden="true"></span><span><?php echo $_SESSION['emp_fname']. " ". $_SESSION['emp_lname'];?></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url();?>emp/profile">Profile</a></li>
            <li><a href="#">Help</a></li>
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

<!--Employee's Evaluation Form-->
<?php

  $tobeeval = $this->model_emp->geteval();



?>
<div class="emp-eval-form">
	<font face="Mohave" size="5">
        <?php
          echo form_open('emp/getevalquestions');
        ?>
		<select class="form-control input-lg" name="evalform" id="eval-form">
              <option default selected disabled="disabled">Select employee</option>
                <?php

                  foreach ($tobeeval as $e) {
                    $date = date("Y-m-d");

                    if($date > $e['period']){
                      echo "<option disabled='disabled'>".strtoupper($e['fname'])." ".strtoupper($e['lname'])." "."(".strtoupper($e['position_name']).")(exceeded to the period given.)"."</option>";

                    }else{
                    echo "<option value='$e[id]'>".strtoupper($e['fname'])." ".strtoupper($e['lname'])." "."(".strtoupper($e['position_name']).")"."</option>";
                  }
				  }

                ?>
            </select>


            <button class="btn btn-primary pull-right" type="submit">Submit</button>
</form>
    </font>
    <br />
    <br />
    <br />
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><font face="bebas" size="8"><center>EMPLOYEE'S EVALUATION FORM</center></font></h3>
  </div>
  <div class="panel-body">

  	<table>
    <?php

    echo validation_errors();

  if(isset($_SESSION['eval'])){
    $getemp = $this->model_emp->getquestions($_SESSION['eval']);

  foreach ($getemp as $evaluation) {

}

?>

    		<tr>
    			<td><b>Employee Name: </b>&nbsp;&nbsp;</td>
    			<td><?php echo $evaluation['fname']. " ". $evaluation['lname'];?></td>
    		</tr>

    		<tr>
    			<td><b>Date Hired:</b> &nbsp;&nbsp;</td>
    			<td><?php echo $evaluation['date_hired'];?></td>
    		</tr>
    	</table>

<br><br>

  		<div class="table-legend">
    	<table>
    		<tr>
    			<td>5 - Outstanding</td>
    			<td>&nbsp;&nbsp;&nbsp;&nbsp;4 - Exceeds Expectation</td>
    			<td>&nbsp;&nbsp;&nbsp;&nbsp;3 - Meets Expectation</td>
    		</tr>

    		<tr>
    			<td>2 - Below Expectation</td>
    			<td>&nbsp;&nbsp;&nbsp;&nbsp;1- Unsatisfactory</td>
    			<!-- <td>&nbsp;&nbsp;&nbsp;&nbsp;1 - NA</td> -->
    		</tr>
    	</table>
    </div>



<br><br><br>

    	<?php
        echo form_open('emp/submiteval');
      ?>

      <?php
        $getQUESTIONS = $this->model_emp->getALLQUES($evaluation['perf_type']);

        foreach ($getQUESTIONS as $val2) {


      ?>
    <div class="eval-questions">

    	<p><?php echo $val2['eval_question']; ?></p>
	</div>

	<div class="eval-rate">

		<select class="form-control" name="evalcontrol[]" id="eval-form" value="<?php echo set_value('evalcontrol');?>">

              <option default selected disabled="disabled">--</option>
            <option value="5">Outstanding</option>
            <option value="4">Exceeds Expectation</option>
            <option value="3">Meets Expectation</option>
            <option value="2">Below Expectation</option>
            <option value="1">Unsatisfactory</option>
        </select>
    </div>

<?php
echo form_hidden("backupques", $evaluation['perf_type']);
echo form_hidden("empID", $evaluation['id']);

}



?>




    <div class="eval-submit">
    	<button class="btn btn-primary btn-block" type="submit"><font face="mohave" size="5">Submit Evaluation</font></button>
    </div>

</form>

<?php
}
?>




        <script type="text/javascript">
                   $('select').select2();
                   $(".js-example-basic-multiple").select2({placeholder: "Select employee's", width: '100%' });


        </script>
  </div><!--End of panel-body-->
</div>
</div>