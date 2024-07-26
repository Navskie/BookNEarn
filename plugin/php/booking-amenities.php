<?php 
   $get_amenities = mysqli_query($con, "SELECT * FROM amenities WHERE unique_id = '$unique_id'");
   foreach ($get_amenities as $ameData) {
?>
<div class="ame-list"><i class="<?php echo $ameData['icon'] ?>"></i></div>
<?php
   }
?>