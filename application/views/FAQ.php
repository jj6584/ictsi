<html>
  <head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap and JavaScript-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
        <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>js/nav.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

    <style type ="text/css">

</style>
  </head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid" style=" background-color: <?php if($_SESSION['level'] == 2){
      echo "#428bca";
    }else{

      echo "#FB8F40";}
      ?>
  ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="<?php echo base_url();?>main/dashboard">
        <img alt="Brand" src="<?php echo base_url();?>images/logo.png" style="margin-top:-9px;">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#"><font color="White">Search Opportunities</font></a></li>

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">Account<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Resume</strong></li>
            <li><a href="#">View Resume</a></li>
            <li role="separator" class="divider"></li>
            <li><strong>&nbsp;&nbsp;&nbsp;My Applications</strong></li>
            <li><a href="#">View Application</a></li>
            <li role="separator" class="divider"></li>
            <li><strong>&nbsp;&nbsp;&nbsp;Saved Jobs</strong></li>
            <li><a href="#">View Saved Jobs</a></li>
          </ul>
        </li>


         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White">More<span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><strong>&nbsp;&nbsp;&nbsp;Interview</strong></li>
            <li><a href="#">Interview Schedule</a></li>
          </ul>
        </li>
      </ul>



        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="#">Notif 1</a></li>
            <li><a href="#">Notif 2</a></li>
            <li><a href="#">Notif 3</a></li>
            <li><a href="#">Notif 4</a></li>
            <li><a href="#">Notif 5</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><font color="White"><span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="caret"></span></font></a>
          <ul class="dropdown-menu">
            <li><a href="#">Update Profile</a></li>
            <li><a href="#">Help</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url();?>main/logout">Sign out</a></li>
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
<div class="faq">
<div class="panel panel-default">
  <div class="panel-body">
    <h3>Frequently Asked Question's</h3>
  </div>







<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

<?php
$this -> load -> model('model_users');
    foreach($datas as $data)
      {
 echo "<div class='panel panel-default'>
    <div class='panel-heading' role='tab' id='faq'>
      <h4 class='panel-title'>
        <a role='button' data-toggle='collapse' data-parent='#accordion' href=#".$data['id']." aria-expanded='true' aria-controls='collapseOne'>

         ".$data['question'] ."
        </a>
      </h4>
    </div>


    <div id=".$data['id']." class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne'>
      <div class='panel-body'>
        ".$data['answer']."
           </div>
    </div>
  </div> ";

}?>
</div>

</div>




</div>



<div class="faq-question">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Send Your Question</h3>
  </div>
  <div class="panel-body">
    <form>
  <div class="form-group">
    <label for="question">Question</label>
    <input type="question" class="form-control" id="question" placeholder="What's on your mind?">
  </div>
<button type="submit" class="btn btn-primary pull-right">Send</button>
  </form>
  </div>
</div>
</div>