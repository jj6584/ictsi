

<html>
	<head>

		<!--Bootstrap and JavaScript-->
		<link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">

		<script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
 		<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/select2.min.css">
    <link href="<?php echo base_url();?>css/stylish-portfolio.css" rel="stylesheet">

      <!-- Plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>css/creative.css" type="text/css">
	   <link rel="stylesheet"  href="<?php echo base_url();?>css/font-awesome.min.css" type="text/css">

    <!-- Custom CSS -->
<!--     <link href="<?php echo base_url();?>css/grayscale.css" rel="stylesheet"> -->
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom Fonts -->
 
    <link href="<?php echo base_url();?>http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

		<style type ="text/css">



</style>

	<script type="text/javascript">
  		$('select').select2();
	</script>
	</head>

<body>
 


   <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a><font color="white">Menu</font></a>
            </li>
            <li>
                <a href="#top" onclick = $("#menu-close").click(); >Home</a>
            </li>
            <li>
                <a href="#about" onclick = $("#menu-close").click(); >About</a>
            </li>
            <li>
                <a href="#services" onclick = $("#menu-close").click(); >Services</a>
            </li>
            <li>
                <a href="#contact" onclick = $("#menu-close").click(); >Contact</a>
            </li>
 

            <li class="sidebar-brand">
                <a><font color="white">Other Navigation</font></a>
            </li>

            <li>
                <a href="<?php echo base_url();?>main/search" onclick = $("#menu-close").click(); >Search Job</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>main/login_page" onclick = $("#menu-close").click(); >Login</a>
            </li>
        </ul>

    </nav>

<div class="tint">
<div id="top" class="banner-text">
	             <h2><font face="BEBAS">WELCOME TO</font></h2>
               <h1><font face="BEBAS">INTERNATIONAL CONTAINER
                <br>TERMINAL SERVICES, INC.</font></h1>
               <br><br>
               <p><font face="">Global Port Operator. EXCELLENCE UNCONTAINED. A Leader in Global Port Management. 
                <br>State of the Art Information Technology. </p>
               <br><br>
               <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>

</div>
<?php
 $this->load->model('model_admin');
//foreach ($photo as $key) {

?>
<img src="<?php echo base_url();?>images/<?php echo $photo['banner'];?>" width="100%" height="100%">


</div>



<div id="about" class="">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

<?php
    $getbanner = $this -> model_admin ->get_carousel123();



?>
  <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php
            foreach ($getbanner as $img) {

        ?>
          <div class="item active">
            <img src="<?php echo base_url();?>images/<?php echo $img['c1'];?>">
          </div>
          <div class="item">
            <img src="<?php echo base_url();?>images/<?php echo $img['c2'];?>" alt="...">

          </div>
          <div class="item">
            <img src="<?php echo base_url();?>images/<?php echo $img['c3'];?>" alt="...">

          </div>
          <?php
        }
          ?>

        </div>
</div>
</div>

  <!-- About -->
    <section class="bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><font face="bebas">International Container Terminals Services, Inc.</font></h1>

                    <p class="lead"><font face="Nexa Light">Riding from Crest to Crest</font></p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

      
        <!-- Callout -->
    <aside class="callout">
        <div class="text-vertical-center">
            <h1>VALUES<br> <small><font color="white">Diligence, Compasion, Accountability and Growth</font></small></h1>
        </div>
    </aside>




    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>OUR SERVICES</h2>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pie-chart fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>ACQUIRING</strong>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>DEVELOPING</strong>
                                </h4>                      
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-gears fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>MANAGING</strong>
                                </h4>                                
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-laptop fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>OPERATING</strong>
                                </h4>                               
                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    <aside class="callout2">
        <div class="text-vertical-center">
            <h1>1,305 EMPLOYEES (As of 2007)</h1>
        </div>
    </aside>





    <!-- Call to Action -->
    <aside class="call-to-action bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Do you want to become part of us?</h3>
                    <a href="<?php echo base_url();?>main/apply" class="btn btn-lg btn-dark">Apply Now</a>
                </div>
            </div>
        </div>
    </aside>

    <!-- Map -->
    <section id="contact" class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d493622.0978598907!2d120.78050482141268!3d14.857627224088432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ca68f9a3ffad%3A0xee2be6f610388c83!2sInternational+Container+Terminal+Services%2C+Inc.!5e0!3m2!1sen!2sph!4v1457877054402" width="100%" height="450" frameborder="0" style="border:0; margin-top: -8%;" allowfullscreen></iframe>
    </section>

    <!-- Footer -->
    <footer>
        <div id="contact" class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>International Container Terminals Services, Inc.</strong>
                    </h4>
                    <p>MICT, South Access Road Port Area, Manila City,<br>NCR - First District 1012,<br>Tondo, Manila, Metro Manila</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">name@example.com</a>
                        </li>
                    </ul>
                    <br>
                    <p class="text-muted"><?php echo $posts['copyright']?></p>
                </div>
            </div>
        </div>
    </footer>




    <!-- jQuery -->
    <script src="<?php echo base_url();?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.fittext.js"></script>
    <script src="<?php echo base_url();?>/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });

    

    </script>

     <!-- Plugin JavaScript -->
    <script src="<?php echo base_url();?>js/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>js/grayscale.js"></script>

<!--<?php echo validation_errors();?>-->
<?php
                    $this->load->model('model_admin');
?>

	</body>
</html>