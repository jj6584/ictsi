<?php 
   $id = $_GET['id'];

?>
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

<!--Employee's Evaluation Form-->
<?php
 
$_SESSION["emp_id"] = $id;

  $tobeeval = $this->model_emp->geteval();



?>
<div class="row">
  <div class="col-xs-12 col-sm-6 col-md-8">
  
  <div class="">
	<font face="Mohave" size="5">
        <?php
          echo form_open('emp/getevalquestions_mobile');
		  echo form_hidden("sessionID", $id);
        ?>
		<div class="col-xs-9">
		<br>
		<select class="form-control" name="evalform" id="eval-form">
              <option default selected disabled="disabled">Select employee</option>
                <?php

                  foreach ($tobeeval as $e) {
                    echo "<option value='$e[id]'>".strtoupper($e['fname'])." ".strtoupper($e['lname'])." "."(".strtoupper($e['position_name']).")"."</option>";
                  }

                ?>
            </select>
		</div>
			<br>
            <button class="btn btn-primary" type="submit">Submit</button>
</form>
    </font>
    <br />
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

<br><br><br>

    	<?php
        echo form_open('emp/submiteval_mobile');
      ?>

      <?php
        $getQUESTIONS = $this->model_emp->getALLQUES($evaluation['perf_type']);

        foreach ($getQUESTIONS as $val2) {

      ?>
    <div class="eval-questions_mobile">

    	<p><?php echo $val2['eval_question']; ?></p>
	</div>
	<div class="eval-rate_mobile">

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
echo form_hidden("sessionID2",$id);
}



?>




    <div class="eval-submit">
    	<button class="btn btn-primary" type="submit"><font face="mohave" size="5">Submit Evaluation</font></button>
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
</div>
