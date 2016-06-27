<html>


<head>
<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>
</head>

    <body>

    <div class="reg-state">

        <select name="city" class="form-control" style="width:200px;">
        <option value="" selected="selected">Select city</option>
        <?php
        $this->load->model('model_users');
        foreach ($city as $row){
        echo "<option value=".$row['city_name'].">".$row['city_name']."</option>";
        }
        ?>
        </select>

    </div>
    </body>

</html>