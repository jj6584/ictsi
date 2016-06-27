<html>
  <head>

    <!--Bootstrap and JavaScript-->

 <script src="<?php echo base_url();?>js/jquery.min.js"></script>
       <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>

    <!-- ADD EDUCATION FIELD DYNAMICALLY -->
    <script type="text/javascript">
        $(document).ready(function() {
      var max_fields      = 10; //maximum input boxes allowed
      var wrapper         = $(".input_fields_wrap"); //Fields wrapper
      var add_button      = $("#add_field_button"); //Add button ID
      var form = document.getElementById("as").innerHTML;

      var x = 1; //initlal text box count
      $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
              x++; //text box increment
              $(wrapper).append('<div>'+form+'<a href="#" class="remove_field"><button class="btn btn-default btn-danger" ><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button></a></div>');

               //add input box
          }
      });

      $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
      })
     });
    </script>
  </head>
<body>



<?php echo form_open('main/resume_validation');?>


<!--DYNAMIC FORM -->




      <div class="container reg-box">


         <ul class="nav nav-tabs">
         <li role="presentation"><a href="<?php echo base_url()?>main/apply"><font color="#3c763d"><span class='glyphicon glyphicon-user text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Personal Details&nbsp;<span class="glyphicon glyphicon-ok text-success" style="font-size:1.5em;" aria-hidden="true"></span></font></a></li>

    <?php if(validation_errors()!=NULL){
     echo "  <li role='presentation' class='active '><a href='#'><font color='#ff1a1a'><span class='glyphicon glyphicon-book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Educational Background &nbsp;<span class='glyphicon glyphicon-remove text-remove' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>";

        }else{

              if(isset($_SESSION['college_de'])){
                if($_SESSION['college_de']!=""){
                    echo "<li role='presentation' class='active'><a href=".base_url()."main/apply'><font color='#3c763d'><span class='glyphicon glyphicon-book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Educational Background&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>
               "; }else{

                     echo "  <li role='presentation' class='active '><a href='#'><span class='glyphicon glyphicon-book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Educational Background</a></li>";


               }
             }
        }
        ?>

<?php
            if(isset($_SESSION['poschoice1'])){
              if($_SESSION['poschoice1']!=""){
                  echo "<li role='presentation' ><a href=".base_url()."main/last_validation><font color='#3c763d'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Work Details&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>
               "; }else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Work Details</a></li>";


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

                  <div class="input_fields_wrap" id="as">
                                    <br><br>
                <div class="form-group  <?php if(form_error('college')){echo "has-error";}?>">
                    <label for="firstName" class="col-sm-3 control-label">School, Degree, Program & Year Graduated</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="School" name="college"


                          <?php
                            if(isset($_SESSION['college'])){
                              echo "value=".$_SESSION['college']."";
                            }

                          ?>


                        >
                    </div>
                </div>
                <br><br>
                <div class="form-group">

                    <div class="col-sm-3">
                        <select class="form-control" id="sel1" name="college_de" value="<?php echo set_value('college_de');?>">
                          <option selected value="">Degree Earned</option>
                          <?php
                               if(isset($_SESSION['college_de'])){
                                if($_SESSION['college_de']!=""){
                              echo "<option selected value=".$_SESSION['college_de'].">".$_SESSION['college_de']."</option>";
                            }
                                else {
                                  echo "<option selected value=''>Degree Earned</option>";
                                }
                              }

                            ?>
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
                        <select class="form-control" id="sel1" name="collegeprog" value="<?php echo set_value('collegeprog');?>">

                          <optgroup label="Engineering">
                             <?php
                               if(isset($_SESSION['collegeprog'])){
                                 if($_SESSION['college_de']!=""){
                              echo "<option selected value=".$_SESSION['collegeprog'].">".$_SESSION['collegeprog']."</option>";
                                }else {
                                  echo "<option selected value=''>Program</option>";
                                }

                              }

                            ?>
                          <option value="Engineering, Civil Engineering">Civil Engineering</option>
                          <option value="Engineering, Industrial Engineering">Industrial Engineering</option>
                          <option value="Engineering, Electrical Engineering">Electrical Engineering</option>
                          <option value="Engineering, Computer Engineering">Computer Engineering</option>
                          <option value="Engineering, Mechanical Engineering">Mechanical Engineering</option>
                             <option value="Engineering, Aeronotical Engineering">Aeronotical Engineering</option>
                                <option value="Engineering, Chemical Engineering">Chemical Engineering</option>
                                   <option value="Engineering, Electronics and Communication Engineering">Electronics and Communication Engineering</option>
                                     <option value="Engineering, Geodetic Engineering">Geodetic Engineering</option>

                          </optgroup>
                          <optgroup label="Computer Studies">
                          <option value="Computer Studies, Information Technology">Information Technology</option>
                          <option value="Computer Studies, Computer Science">Computer Science</option>
                          <option value="Computer Studies, Multimedia Arts">Multimedia Arts</option>
                           <option value="Computer Studies, Information Systems">Information Systems</option>
                             <optgroup label="Mathematics">
                            <option value="Mathematics, Applied Mathematics">Applied Mathematics</option>
                             <option value="Mathematics, Statistics">Statistics</option>
                              <option value="Mathematics, Accountancy">Accountancy</option>
                              <optgroup label="Business Administration">
                            <option value="Business Administration, Business Economics">Business Economics</option>
                            <option value="Business Administration, Financial Management">Financial Management</option>
                            <option value="Business Administration, Human Resource Development">Human Resource Development</option>
                            <option value="Business Administration, Marketing Management">Marketing Management</option>
                            <option value="Business Administration, Operations Management">Operations Management</option>





                          </optgroup>

                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br>

                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label"></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control"  name="college_inc"


              <?php
                  if(isset($_SESSION['college_inc'])){
                    if($_SESSION['college_inc']!=0){
                    echo "value=".$_SESSION['college_inc']."";
                  }
                  else{
                    echo "placeholder='year graduated'";
                  }
                }
                ?>

            >
                    </div>
                </div>
            </div>
  <button id="add_field_button" type="button" class="btn btn-default  btn-success pull-right"
                                data-toggle="tooltip" data-placement="right"
                                title="Add educational form"><span class="glyphicon glyphicon-plus"
                                aria-hidden="true"></span></button>    <!--PAG ADD NG FIELDS-->
                <br><br>

                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">Licensure Examination Taken</label>
                    <div class="col-sm-9">
                             <input type="text" class="form-control" placeholder="Licensure Examination Taken" >
                    </div>
                </div>
                <br><br>
                <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">Date Taken & Rating</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                 <input type="date" class="form-control" placeholder="Dates Taken">

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Rating">
                          </div>

                        </div>
                    </div>
                </div>
              </div>
        </div> <!-- ./container -->


  <nav>
  <ul class="pager">

    <li class="next"><?php echo form_submit('submit', 'Next');?></li>
  </ul>
</nav>
    <!--End of Pager-->
    <?php echo form_close();?>

    <?php if(validation_errors()){?>

<?php
}

?>
  </div><!--Closing Panel Body-->

  </div><!--Closing Whole Panel-->
</div>



    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });



    </script>


    <script type="text/javascript">
      $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    </script>
</body>
</html>
