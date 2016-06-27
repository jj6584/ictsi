<html>
  <head>
  <!--Bootstrap and JavaScript-->
  <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
  <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url();?>js/select2.min.js"></script>



   <!--PARA TO DUN SA DYNAMIC DROPDOWN FOR STATES AND CITY-->
    <script type="text/javascript">
      var XMLHttpRequestObject=false;
    function display(state_id)
    {
    if(window.XMLHttpRequest)
    {
    XMLHttpRequestObject=new XMLHttpRequest();
    }
    else if(window.ActiveXObject)
    {
    XMLHttpRequestObject=new ActiveXObject("Microsoft.XMLHTTP");
    }
    XMLHttpRequestObject.onreadystatechange=function()
    {
    if (XMLHttpRequestObject.readyState==4 && XMLHttpRequestObject.status==200)
    {
    document.getElementById("show_city").innerHTML=XMLHttpRequestObject.responseText;
    }
    }
    XMLHttpRequestObject.open("GET","<?php echo base_url();?>main/getcity/"+state_id,true);
    XMLHttpRequestObject.send();
    }
    </script>
    <!-- END OF SCRIPT -->









  </head>
<body>







<?php

$this->load->model('model_users');
// mysqli_query($this->db_link, $query) or die(mysqli_error($this->db_link));

// echo mysqli_errno($this->db_link);
$jobs = $this->model_users->getPosition();
$skills = $this->model_users->getSkills();
?>


<?php echo form_open('main/submit');?>

<div class="container reg-box">

  <ul class="nav nav-tabs">
         <li role="presentation"><a href="<?php echo base_url()?>main/apply"><font color="#3c763d"><span class='glyphicon glyphicon-user text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Personal Details&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>
         <li role="presentation"><a href="<?php echo base_url()?>main/next"><font color="#3c763d"><span class='glyphicon glyphicon-Book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Educational Background&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>
        <li role="presentation"><a href="<?php echo base_url()?>main/last_validation"><font color="#3c763d"><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Work Details&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>
        <li role="presentation" class="active"><a href="#"><font color="#3c763d"><span class='glyphicon glyphicon-list-alt text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Summary&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>




</ul>


                <h2>Review and Submit Application Form</h2>

                <br>
                <h3>PERSONAL DETAILS</h3>
                <div class="form-group <?php if(form_error('fname')){echo "has-error";}?>">
                    <label for="firstName" class="col-sm-3 control-label">Full Name</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['fname']; ?>" value="<?php echo $_SESSION['fname']; ?>" name="fname" >
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group ">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['mname']; ?>" value="<?php echo $_SESSION['mname']; ?>" name="mname" >
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['lname']; ?>" value="<?php echo $_SESSION['lname']; ?>" name="lname" >
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" placeholder="<?php echo $_SESSION['gender']; ?>" value="<?php echo $_SESSION['gender']; ?>" name="gender">
                    </div>
                </div>

                <br><br>

                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Citizenship & Religion</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('citizenship')){echo "has-error";}?>">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['citizenship']; ?>" value="<?php echo $_SESSION['citizenship']; ?>" name="citizenship">
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('religion')){echo "has-error";}?>">
                                <input type="text" class="form-control" placeholder="<?php echo $_SESSION['religion']; ?>" value="<?php echo $_SESSION['religion']; ?>" name="religion">
                            </div>
                          </div>

                        </div>
                    </div>
                </div>


                <!--GETTING THE STATES-->
                <?php
                  $states = $this->model_users->get_states();
                ?>

                <div class="form-group">
                    <label for="state" class="col-sm-3 control-label">Select State</label>
                    <div class="col-sm-9">
                        <select name="state" class="form-control asd" onChange="display(this.value)" data-toggle="<?php if(form_error('state')){echo "popover";}else{echo "";}?>"
                                 data-content="<?php $error=form_error('state'); echo $error;?>" data-trigger="focus" data-placement="bottom">
                            <option value="<?php echo $_SESSION['state']; ?>" selected="selected" ><?php echo $_SESSION['state']; ?></option>
                                <?php
                                    foreach ($states as $row){
                                      echo "<option value=". $row['state_name'].">".$row['state_name']."</option>";
                                    }
                                ?>
                        </select>
                    </div>
                </div> <!-- /.form-group -->

                <br><br><br><br>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">Select City</label>
                    <div class="col-sm-9" id="show_city">
                        <select name="city" class="form-control asd">
                            <option value="<?php echo $_SESSION['city']; ?>" selected="selected"><?php echo $_SESSION['city']; ?></option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br><br>



                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Contact Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="<?php echo $_SESSION['contact']; ?>" value="<?php echo $_SESSION['contact']; ?>" name="contact">
                    </div>
                </div>
                 <br><br>


                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="<?php echo $_SESSION['email']; ?>" value="<?php echo $_SESSION['email']; ?>" name="email">
                    </div>
                </div>
                <br><br>

               <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="<?php echo $_SESSION['password']; ?>" value="<?php echo $_SESSION['password']; ?>" name="password">
                    </div>
                </div>
                <br><br>



                <br>
                <h3>EDUCATIONAL BACKGROUND</h3>

                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">School, Degree, Program & Year Graduated</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  placeholder="<?php echo $_SESSION['college']; ?>" value="<?php echo $_SESSION['college']; ?>" name="college" >
                    </div>
                </div>

                <br><br>
                <div class="form-group">
                    <div class="col-sm-3">
                        <select class="form-control" id="sel1" name="college_de" value="">
                          <option value="<?php echo $_SESSION['college_de']; ?>"><?php echo $_SESSION['college_de']; ?>"</option>
                          <option value="Bachelor of Arts (B.A.)">Bachelor of Arts (B.A.)</option>
                          <option value="Bachelor of Science (B.S.)">Bachelor of Science (B.S.)</option>
                          <option value="Bachelor of Fine Arts (B.F.A.)">Bachelor of Fine Arts (B.F.A.)</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br>
                <div class="form-group">
                    <label for="country" class="col-sm-3 control-label"></label>
                    <div class="col-sm-3">
                         <select class="form-control asd" id="sel1" name="collegeprog" value="">
                          <option value="<?php echo $_SESSION['collegeprog']; ?>"><?php echo $_SESSION['collegeprog']; ?></option>
                          <optgroup label="Engineering">
                          <option value="Engineering, Civil Engineering">Civil Engineering</option>
                          <option value="Engineering, Industrial Engineering">Industrial Engineering</option>
                          <option value="Engineering, Electrical Engineering">Electrical Engineering</option>
                          <option value="Engineering, Computer Engineering">Computer Engineering</option>
                          <option value="Engineering, Mechanical Engineering">Mechanical Engineering</option>
                          </optgroup>
                          <optgroup label="Computer Studies">
                          <option value="Computer Studies, Information Technology">Information Technology</option>
                          <option value="Computer Studies, Computer Science">Computer Science</option>
                          <option value="Computer Studies, Multimedia Arts">Multimedia Arts</option>
                          </optgroup>

                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br>

                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="college_inc" placeholder="<?php echo $_SESSION['college_inc']; ?>" value="<?php echo $_SESSION['college_inc']; ?>">
                    </div>
                </div>

                <br><br>



                <br>
                <h3>WORK DETAILS</h3>

                <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">Position Applied for</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('password')){echo "has-error";}?>">

                                <select class="form-control asd" id="sel1" name="poschoice1">
                                    <option disabled selected>1st Choice</option>
                                    <option disabled selected="selected" value="<?php echo $_SESSION['poschoice1']; ?>"><?php echo $_SESSION['poschoice1']; ?></option>
                                      <?php

                                        foreach ($jobs as $job) {
                                          echo "<option value='$job[job_title]'>$job[job_title]</option>";
                                        }
                                      ?>
                                </select>

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('cpassword')){echo "has-error";}?>">
                                <select class="form-control asd" id="sel1" name="poschoice2">
                                    <option disabled selected>2nd Choice</option>
                                    <option disabled   selected="selected"value="<?php echo $_SESSION['poschoice2']; ?>"><?php echo $_SESSION['poschoice2']; ?></option>
                                      <?php
                                        foreach ($jobs as $job) {
                                          echo "<option value='$job[job_title]'>$job[job_title]</option>";
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
                        <select class="form-control asd" id="sel1" name="salary">
                          <option value="">Choose a Salary</option>
                          <option selected="selected" value="<?php echo $_SESSION['salary']; ?>"><?php echo $_SESSION['salary']; ?></option>
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
                        <?php
                          $sk = $_SESSION['skills'];

                          $rsk = explode(",", $sk);
                        ?>

                        <select class="js-example-basic-multiple asd" multiple="multiple" width="50%" name="skills[]">

                        <?php
                            foreach ($rsk as $varskill){
                        ?>
                              <option  selected="selected"value="<?php echo $varskill; ?>"><?php echo $varskill; ?></option>
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>

        </div> <!-- ./container -->
<nav>
  <ul class="pager">

    <li class="next"><?php echo form_submit('submit', 'Register');?></li>
  </ul>
</nav>




<script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
    </script>
</body>
</html>
