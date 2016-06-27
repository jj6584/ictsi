<!DOCTYPE html>
<html>
<head>
    <title>Test</title>


        <!--Bootstrap and JavaScript-->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
        <script src="<?php echo base_url();?>js/jquery-1.11.3.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">

        <style type ="text/css"></style>

    <link href="<?php echo base_url();?>css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>js/select2.min.js"></script>
	<script>
	conversation.selfParticipant.video.channels(0).container(document.getElementById("renderWindow"));
conversation.videoService.start().then(function () {
    // Successfully added video to the conversation
    conversation.selfParticipant.video.channels(0).isStarted.set(true);
});
	
	</script>


</head>
<body>
<?php
$this -> load -> model('model_users');


?>

<?php echo form_open('main/asd');?>
<div class="skills-box">
<br>
  <input type="text" name="state" placeholder="state name"><br>
  <textarea name="citynames" placeholder="Write city names" style="height: 250px; width: 550px;"></textarea>
  </div>

  <ul class="pager">

    
  </ul>
 <a href="skype:pc.banjawan?call&video=true">Call BANJAWAN</a>
 
 <?php
 //getting skype status icon
$status = $this->model_users->get_skype_status("jj6584", true, true);
echo "<p>Skype status:</p>";
echo "<p>".$status."</p>";
 ?>
 
 
 
 
 
 
 
 

    <script type="text/javascript">
       $('select').select2();
       $(".js-example-basic-multiple").select2({placeholder: "Select your Skills", width: '100%' });
       $(".js-example-tokenizer").select2({
        tags: true,
        tokenSeparators: [',', ' ']

        });

    </script>

</body>
</html>