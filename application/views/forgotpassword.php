<head>
  <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet">

  <meta name="description" content="Simple ideas for enhancing text input interactions" />
  <meta name="keywords" content="input, text, effect, focus, transition, interaction, inspiration, web design" />
  <meta name="author" content="Codrops" />

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/demo.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/set1.css" />
</head>

<div class="widget center">
  <div class="text center">
    <h1 class="">Forgot Password?</h1><br><br>
      <?php if(validation_errors()){?>

      <font size="2px"><?php echo validation_errors();?></font>


<?php
}

        if(isset($_SESSION['emailsent'])){
                    echo $_SESSION['emailsent'];
            }



?>
    <?php
        echo form_open('main/lostpassword');
    ?>
    <p><span class="input input--haruki">

					<input class="input__field input__field--haruki" type="text" id="input-3" name="femail" />
					<label class="input__label input__label--haruki" for="input-3">
						<span class="input__label-content input__label-content--haruki">Email</span>
					</label>
				</span>
		<center>

    		<button class="emailButton" type="submit"><font face="bebas">Send</font></button>

   	</center>
			</p>

	</form>



  </div>
  <div class="blur">
    <img src="<?php echo base_url();?>images/banner21.jpg" class="bg">
  </div>
</div>


<img src="<?php echo base_url();?>images/banner21.jpg" class="bg">


<svg version="1.1" xmlns="http://www.w3.org/2000/svg">
  <filter id="blur">
    <feGaussianBlur stdDeviation="10" />
  </filter>
</svg>


<link href='http://fonts.googleapis.com/css?family=Arvo:400,700|Lato:400,500' rel='stylesheet' type='text/css'>





<script src="<?php echo base_url();?>js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>

