


<select name="city"  style="padding:10px;width:200px;font-size:20px;">
<option value="" selected="selected">-- Select city --</option>
<?php 
$this->load->model('model_users');
foreach ($city as $row){
echo "<option value=".$row['id'].">".$row['city_name']."</option>";

?>
</select>






