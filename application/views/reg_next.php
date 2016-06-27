<html>
  <head>

    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

    <style type ="text/css"></style>

    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>



  </head>
<body>

  <?php echo form_open('main/last_validation');

$this -> load -> model('model_users');
$jobs = $this->model_users->getPosition();
$skills = $this->model_users->getSkills();


?>

  <div class="container reg-box">

      <ul class="nav nav-tabs">
         <li role="presentation"><a href="<?php echo base_url()?>main/apply"><font color="#3c763d"><span class='glyphicon glyphicon-user text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Personal Details&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>
         <li role="presentation"><a href="<?php echo base_url()?>main/next"><font color="#3c763d"><span class='glyphicon glyphicon-Book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Educational Background&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>

    <?php if(validation_errors()!=NULL){
     echo "  <li role='presentation' class='active '><a href='#'><font color='#ff1a1a'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Work Details &nbsp;<span class='glyphicon glyphicon-remove text-remove' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>";

        }else{

 if(isset($_SESSION['poschoice1'])){
       if($_SESSION['poschoice1']!=""){
                    echo "<li role='presentation' class='active'><a href=".base_url()."main/last_validation><font color='#3c763d'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Work Details&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>
               "; }else{

                     echo "  <li role='presentation' class='active '><a href='#'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Work Details</a></li>";


               }

}

        }
        ?>
  <?php
            if(isset($_SESSION['poschoice1'])){
                if($_SESSION['poschoice1']!=""){
                  echo "<li role='presentation' ><a href=".base_url()."main/last_validation><font color='#3c763d'><span class='glyphicon glyphicon-list-alt text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Summary&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>
               "; }else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-list-alt text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Summary</a></li>";


               }

             }
        ?>

</ul>


                <h2>Registration Form</h2>

               <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">Position Applied for</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('password')){echo "has-error";}?>">

                                <select class="form-control" id="sel1" name="firstc">
                                  <option disabled selected>1st Choice</option>
                                   <?php

                                   foreach ($jobs as $job) {
                                              if(isset($_SESSION['poschoice1'])){
                                                if($_SESSION['poschoice1']==$job['job_title']){
                                              echo "<option selected  value=$job[job_title]>$job[job_title]</option>";
                                              }else{
                                              echo "<option  value='$job[job_title]'>$job[job_title]</option>";
                                              }
                                          }

                                    }


                                   ?>
                                </select>

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('cpassword')){echo "has-error";}?>">
                                 <select class="form-control" id="sel1" name="secondc">
                                    <option disabled selected>2nd Choice</option>
                                      <?php
                                        foreach ($jobs as $job) {
                                            if(isset($_SESSION['poschoice2'])){
                                              if($_SESSION['poschoice2']==$job['job_title']){
                                                echo "<option selected  value=$job[job_title]>$job[job_title]</option>";
                                            }else{
                                                echo "<option value='$job[job_title]'>$job[job_title]</option>";
                                                  }
                                            }
                                        }
                                      ?>
                                  </select>
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label">Expected Salary</label>
                    <div class="col-sm-3">
                      <center>
                        <select class="form-control" id="sel1" name="salary">
                          <?php
                            if(isset($_SESSION['salary'])){
                               echo "<option selected value=".$_SESSION['salary'].">".$_SESSION['salary']."</option>";
                                       }
                          ?>
                          <option value="10000,20000">P 10,000.00 - P 20,000.00</option>
                          <option value="20000,30000">P 20,000.00 - P 30,000.00</option>
                          <option value="30000,40000">P 30,000.00 - P 40,000.00</option>
                          <option value="40000,50000">P 40,000.00 - P 50,000.00</option>
                          <option value="50000">P 50,000.00  above</option>
                        </select>
                      </center>
                    </div>
                </div> <!-- /.form-group -->
                <br><br>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Skills</label>
                    <div class="col-sm-9">
                        <select class="js-example-basic-multiple" multiple="multiple" width="50%" name="skills[]">
                          <?php
                              foreach ($skills as $skill) {
                                  echo "<option value='$skill[skill_name]'>$skill[skill_name]</option>";
                              }
                          ?>
                        </select>
                    </div>
                </div>

                <br><br>
               <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">Work Experience</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('password')){echo "has-error";}?>">
                                <span class="help-block">Years</span>
                                <input type="text" class="form-control" name="year" placeholder="How many years?" name="years">

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('cpassword')){echo "has-error";}?>">
                                 <span class="help-block">as a/an</span>
                                 <input type="text" class="form-control" name="year" placeholder="Position" name="position">

                            </div>
                          </div>

                        </div>
                    </div>
                </div>
                <br><br><br>

                <div class="form-group">
                    <label class="control-label col-sm-3">Reference / Source of Job Vacancy</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="radio-inline"><input type="radio" value="Newspaper Ad" name="ref"

                                    <?php
                                        if(isset($_SESSION['ref'])){
                                          if($_SESSION['ref']=='Newspaper Ad'){
                                            echo "checked";
                                          }
                                        }

                                    ?>

                                    >Newspaper Ad</label>
                            </div>
                            <div class="col-sm-2">
                                <label class="radio-inline"><input type="radio" value="Walk-in" name="ref"

                                    <?php
                                        if(isset($_SESSION['ref'])){
                                          if($_SESSION['ref']=='Walk-in'){
                                            echo "checked";
                                          }
                                        }
                                    ?>

                                    >Walk-in</label>
                            </div>
                            <div class="col-sm-3">
                                <label class="radio-inline"><input type="radio" value="School Campaign" name="ref"


                                    <?php
                                        if(isset($_SESSION['ref'])){
                                          if($_SESSION['ref']=='School Campaign'){
                                            echo "checked";
                                          }
                                        }
                                    ?>

                                    >School Campaign</label>
                            </div>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="others" placeholder="Others" name="ref">
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <br><br><br><br>

                <div class="form-group">
                    <label class="control-label col-sm-3">Date Available for Employment</label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <label class="radio-inline"><input type="radio" value="Immediately" name="ava"


                                    <?php
                                        if(isset($_SESSION['date_ava'])){
                                          if($_SESSION['date_ava']=='Immediately'){
                                            echo "checked";
                                          }
                                        }
                                    ?>

                                    >Immediately</label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline"><input type="radio" value="Needs Few Weeks Notice" name="ava"

                                    <?php
                                        if(isset($_SESSION['date_ava'])){
                                          if($_SESSION['date_ava']=='Needs Few Weeks Notice'){
                                            echo "checked";
                                          }
                                        }
                                      ?>

                                      >Needs Few Weeks Notice</label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->

        </div> <!-- ./container -->

<nav>
  <ul class="pager">

    <li class="next"><?php echo form_submit('submit', 'Next');?></li>
  </ul>
</nav>
    <!--End of Pager-->

  <!--End of Date Available for Employment-->
    <!--Pager: Next and Back-->
<?php if(validation_errors()){?>
    <div class="alert alert-danger" role="alert">
      <font size="2px"><?php echo validation_errors();?></font>

    </div>
<?php
}

?>


    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
    </script>

</body>
</html>
