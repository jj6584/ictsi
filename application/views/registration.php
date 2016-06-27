<html>
  <head>

  <!--Bootstrap and JavaScript-->


   <script  src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/rhinoslider-1.05.min.js"></script>
    <script  src="<?php echo base_url();?>js/mousewheel.js"></script>
    <script  src="<?php echo base_url();?>js/easing.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>js/select2.min.js"></script>
    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/rhinoslider-1.05.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">



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


    <!-- END OF FORM -->
  </head>
<body>

<!--  -->
<!-- <div class="reg-box">
<div class="panel panel-default">
  <div class="panel-heading" style = "background-color: #FFF">

    <h3 class="panel-title"><font face="BEBAS" size="30px"><center>Registration</center></font></h3>
  </div>
  <div class="panel-body"> -->





    <?php echo form_open('main/validate_registration');


    ?>


<div class="container reg-box">


    <ul class="nav nav-tabs">
    <?php if(validation_errors()!=NULL){
        // echo "  <li role='presentation' class='active'><a href='#'><img src='".base_url()."images/account-details.png'></a></li>";
     echo "  <li role='presentation' class='active '><a href='#'><font color='#ff1a1a'>Personal Details"."  "."<span class='glyphicon glyphicon-remove text-remove' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>";

     }
        else{
                if(isset($_SESSION['poschoice1'])!=""){
                    echo "<li role='presentation' class='active'><a href=".base_url()."main/apply><font color='#3c763d'><span class='glyphicon glyphicon-user text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Personal Details&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>
               "; }else{

                     echo "  <li role='presentation' class='active '><a href='#'><span class='glyphicon glyphicon-user text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Personal Details</a></li>";


               }


        }




        ?>
        <?php
            if(isset($_SESSION['college_de'])){
                if($_SESSION['college_de']!=""){
                  echo "<li role='presentation' ><a href=".base_url()."main/next><font color='#3c763d'><span class='glyphicon glyphicon-book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Educational Background&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>";
                }
              else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Educational Background</a></li>";


               }
            }  else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-book text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Educational Background</a></li>";


               }



        ?>
              <?php
            if(isset($_SESSION['poschoice1'])){
                 if($_SESSION['poschoice1']!=""){
                  echo "<li role='presentation' ><a href=".base_url()."main/last_validation><font color='#3c763d'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Work Details&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>";
              }else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Work Details</a></li>";


               }

           }else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-blackboard text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Work Details</a></li>";


               }

        ?>
        <?php
            if(isset($_SESSION['poschoice1'])){
                if($_SESSION['poschoice1']!=""){
                  echo "<li role='presentation' ><a href=".base_url()."main/last_validation><font color='#3c763d'><span class='glyphicon glyphicon-list-alt text-remove' style='font-size:1.5em;' aria-hidden='true'></span>&nbsp;Summary&nbsp;<span class='glyphicon glyphicon-ok text-success' style='font-size:1.5em;' aria-hidden='true'></span></font></a></li>
               "; }else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-list-alt text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Summary</a></li>";


               }
           }else{

                     echo "  <li role='presentation' ><a href='#'><span class='glyphicon glyphicon-list-alt text-remove' style='font-size:1.5em;' aria-hidden='true'></span>"."  "."Summary</a></li>";


               }

        ?>


</ul>
                <h2>Registration Form</h2>

                <div class="form-group <?php if(form_error('fname')){echo "has-error";}?>">
                    <label for="firstName" class="col-sm-3 control-label">Full Name</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('fname')){echo "has-error";}?>">
                                <input type='text' class='form-control' placeholder='First Name' data-toggle="<?php if(form_error('fname')){echo "popover";}else{echo "";}?>"
                                       data-content="<?php $error=form_error('fname'); echo $error;?>"
                                       data-html="true" data-trigger="focus" data-placement="bottom" name='fname'

                                           <?php
                                         if(isset($_SESSION['fname'])){

                                            echo "value=".$_SESSION['fname']."";

                                        }

                                            ?>
                                >

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('mname')){echo "has-error";}?>">
                                <input type='text' class='form-control' data-toggle="<?php if(form_error('mname')){echo "popover";}else{echo "";}?>"
                                       data-content="<?php $error=form_error('mname'); echo $error;?>"
                                       data-html="true" data-trigger="focus" data-placement="bottom" placeholder="Middle Name"  name='mname'
                                           <?php
                                         if(isset($_SESSION['fname'])){

                                            echo "value=".$_SESSION['mname']."";

                                        }

                                            ?>
                                 >
                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('lname')){echo "has-error";}?>">
                                <input type='text' class='form-control' data-toggle="<?php if(form_error('lname')){echo "popover";}else{echo "";}?>"
                                       data-content="<?php $error=form_error('lname'); echo $error;?>"
                                        data-html="true" data-trigger="focus" data-placement="bottom" placeholder="Last Name" name='lname'


                                           <?php
                                         if(isset($_SESSION['lname'])){

                                            echo "value=".$_SESSION['lname']."";

                                        }

                                            ?>
                                          >
                            </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                 <label class="radio-inline"><input type="radio" value="Male" name="gender" data-toggle="<?php if(form_error('gender')){echo "popover";}else{echo "";}?>"
                                     data-content="<?php $error=form_error('gender'); echo $error;?>"

                                      <?php
                                       if(isset($_SESSION['gender'])){
                                          if($_SESSION['gender']=='Male'){
                                              echo "checked";
                                          }


                                      }
                                      ?>

                                      data-html="true" data-trigger="focus" data-placement="bottom">Male</label>
                            </div>
                            <div class="col-sm-4">
                                 <label class="radio-inline"><input type="radio" value="Female" name="gender" data-toggle="<?php if(form_error('gender')){echo "popover";}else{echo "";}?>"
                                   data-content="<?php $error=form_error('gender'); echo $error;?>"

                                        <?php
                                     if(isset($_SESSION['gender'])){
                                        if($_SESSION['gender']=='Female'){
                                            echo "checked";
                                        }


                                    }
                                    ?>




                                    data-html="true" data-trigger="focus" data-placement="bottom">Female</label>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
<br><br><br><br>

                 <div class="form-group  <?php if(form_error('citizenship')){echo "has-error";}?>">
                    <label for="firstName" class="col-sm-3 control-label">Citizenship & Religion</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('citizenship')){echo "has-error";}?>">
                                 <input type="text" class="form-control" placeholder="Citizehship" name="citizenship"  data-toggle="<?php if(form_error('citizenship')){echo "popover";}else{echo "";}?>"
                                         data-content="<?php $error=form_error('citizenship'); echo $error;?>"
                                          data-html="true" data-trigger="focus" data-placement="bottom"
                                                 <?php
                                           if(isset($_SESSION['citizenship'])){

                                              echo "value=".$_SESSION['citizenship']."";

                                          }

                                              ?>
                                            >

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="form-group <?php if(form_error('religion')){echo "has-error";}?>">
                                <input type="text" class="form-control" placeholder="Religion" name="religion"  data-toggle="<?php if(form_error('religion')){echo "popover";}else{echo "";}?>"
                                       data-content="<?php $error=form_error('religion'); echo $error;?>"
                                        data-html="true" data-trigger="focus" data-placement="bottom"
                                                 <?php
                                         if(isset($_SESSION['religion'])){

                                            echo "value=".$_SESSION['religion']."";

                                        }

                                            ?>
                                          >
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
                         <select name="state" class="form-control <?php if(form_error('state')){echo "has-error";}?>" onChange="display(this.value)" data-toggle="<?php if(form_error('state')){echo "popover";}else{echo "";}?>"
                             data-content="<?php $error=form_error('state'); echo $error;?>"
                              data-html="true" data-trigger="focus" data-placement="bottom">

                            <option value="" selected="selected" >Select state</option>

                              <?php
                                foreach ($states as $row){
                                              if(isset($_SESSION['state'])!=$row['state_name']){
                                                $clean = str_replace( ' ', '',$row['state_name']);
                                  echo "<option value=". $clean.">".$row['state_name']."</option>";
                                              }else{
                                                  echo "<option selected='selected' value=". $row['state_name'].">".$row['state_name']."</option>";
                                              }
                                }
                              ?>
                          </select>
                    </div>
                </div> <!-- /.form-group -->
                <br><br><br><br>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">Select City</label>
                    <div class="col-sm-9" id="show_city">
                        <select name="city" class="form-control">
                          <option value="" selected="selected">Select city</option>


                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br><br>

                <div class="form-group <?php if(form_error('contact')){echo "has-error";}?>">
                    <label for="email" class="col-sm-3 control-label">Contact Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Contact Number" name="contact"  data-toggle="<?php if(form_error('contact')){echo "popover";}else{echo "";}?>"
                               data-content="<?php $error=form_error('contact'); echo $error;?>"
                                data-html="true" data-trigger="focus" data-placement="bottom"
                                             <?php
                                 if(isset($_SESSION['contact'])){

                                    echo "value=".$_SESSION['contact']."";

                                }

                                    ?>

                        >
                    </div>
                </div>
                 <br><br>


                <div class="form-group <?php if(form_error('email')){echo "has-error";}?>">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="Email" name="email"  data-toggle="<?php if(form_error('email')){echo "popover";}else{echo "";}?>"
                               data-content="<?php $error=form_error('email'); echo $error;?>"
                                data-html="true"data-trigger="focus" data-placement="bottom"
                                           <?php
                                 if(isset($_SESSION['email'])){

                                    echo "value=".$_SESSION['email']."";

                                }

                                    ?>


                        >
                    </div>
                </div>
                <br><br>

               <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('password')){echo "has-error";}?>">
                                 <input type="password" class="form-control" placeholder="Password" name="password"   data-toggle="<?php if(form_error('password')){echo "popover";}else{echo "";}?>"
                                               data-content="<?php $error=form_error('password'); echo $error;?>"
                                                data-html="true" data-trigger="focus" data-placement="bottom" >

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('cpassword')){echo "has-error";}?>">
                                 <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword"   data-toggle="<?php if(form_error('cpassword')){echo "popover";}else{echo "";}?>"
                                               data-content="<?php $error=form_error('cpassword'); echo $error;?>"
                                                data-html="true" data-trigger="focus" data-placement="bottom" >
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
                <br>

                <div class="form-group <?php if(form_error('bday')){echo "has-error";}?>">
                    <label for="bdaym" class="col-sm-3 control-label">Date of Birth</label>
                    <div class="col-sm-3">
                        <select class="form-control" id="sel3" name="bdaym">
                          <option value="">Month</option>
                              <?php
                               if(isset($_SESSION['bdaym'])){
                                  echo "<option selected value=".$_SESSION['bdaym'].">".$_SESSION['bdaym']."</option>";
                               }
                              ?>

                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br><br>

                <div class="form-group">
                    <label for="bdayd" class="col-sm-3 control-label"></label>
                    <div class="col-sm-3">
                        <select class="form-control" id="sel4" name="bdayd">
                            <option value="">Day</option>

                              <?php

                                for($x =1; $x<=31; $x++){
                                      if(isset($_SESSION['bdayd'])!=$x){
                                    echo "<option value='$x'>$x</option>";
                                      }else{
                                  echo "<option selected value='$x'>$x</option>";

                                      }
                                }
                              ?>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br>
                <div class="form-group">
                    <label for="bdayy" class="col-sm-3 control-label"></label>
                    <div class="col-sm-3">
                        <select class="form-control" id="sel5" name="bdayy">
                            <option value="">Year</option>


                                <?php

                                    for($x=1900; $x<=date('Y'); $x++){

                                        if(isset($_SESSION['bdayy'])!=$x){
                                    echo "<option value='$x'>$x</option>";
                                      }else{
                                  echo "<option selected value='$x'>$x</option>";

                                      }
                                    }

                                ?>
                        </select>
                    </div>
                </div> <!-- /.form-group -->
                <br><br>

                <div class="form-group">
                    <label for="pass" class="col-sm-3 control-label">SSS No. & TIN</label>
                    <div class="col-sm-9">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('sss')){echo "has-error";}?>">
                                <input type="text" class="form-control" placeholder="SSS No." name="sss" value="<?php echo set_value('sss');?>">

                            </div>
                          </div>

                          <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group <?php if(form_error('tin')){echo "has-error";}?>">
                                 <input type="text" class="form-control" placeholder="T.I.N" name="tin" value="<?php echo set_value('tin');?>">
                            </div>
                          </div>

                        </div>
                    </div>
                </div>
                    </div>
                </div> <!-- /.form-group -->


                  <nav>



  <ul class="pager">

    <li><?php echo form_submit('submit', 'Next');?></li>
  </ul>
</nav>
            </form> <!-- /form -->
        </div> <!-- ./container -->



    <?php echo form_close();?>


</div>


    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
    </script>
    <script>
    $(function () {
      $('[data-toggle="popover"]').popover()
    })
  </script>
</body>
</html>
