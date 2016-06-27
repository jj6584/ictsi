<!DOCTYPE html>
<html>
<head>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
     <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>


    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>
      <script src="<?php echo base_url();?>js/select/select2.full.js"></script>
      <script src='https://www.google.com/recaptcha/api.js'></script>

    <title>Share via email</title>

    <style type="text/css">
        .box{
            width: 30%;
            margin-left: 35%;
            margin-top: 3%;
        }

    </style>
</head>
<body bgcolor="black">

            <div class="box">

                          <?php
                                echo form_open('main/shareviaemail');
								
                            if(isset($_SESSION['sent'])){
                                    echo $_SESSION['sent'];
                            }
                    
                          ?>
                                    <h3><strong><font color="gray">Your Information:</font></strong></h3>
                                    <div class="form-group">
                                    <label for="exampleInputName1">First Name:</label>
                                    <input type="text" class="form-control input-lg textbox" id="exampleInputEmail2" placeholder="First name" name="fname">
                                    </div>

                                    <div class="form-group">
                                    <label for="exampleInputName1">Last Name:</label>
                                    <input type="text" class="form-control input-lg textbox" id="exampleInputEmail2" placeholder="Last name" name="lname">
                                    </div>
                                    <hr>
                                    <h3><strong><font color="gray">Share to your friend:</font></strong></h3>
                                  <div class="form-group">
                                  <label for="exampleInputName1">Email Address:</label>
                                  <select class="js-example-basic-multiple" multiple="multiple" width="50%" name="emails[]">
                                    </select>
                                  </div>
                                    <div class="form-group">
                                        <?php echo $this->recaptcha->render();

                                        echo form_hidden('jobid', $this->uri->segment(3));
                                        ?>

                                    </div>

                                    <div>

                                        <?php
                                                    if(validation_errors()){
                                                            echo validation_errors();
                                                    }
                                        ?>
                                    </div>
                                  <button type="submit" class="btn btn-primary input-lg"><font face="bebas" size="4em">Share Job</button>
                            </form>
            </div>


    <!-- select2 -->

    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Enter email address", width: '100%', tags: true,
  tokenSeparators: [',', ' '] });
    </script>


</body>
</html>