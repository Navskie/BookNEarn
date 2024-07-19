<?php
   include_once '../../.config/dbconnect.php';

   $unique_id = mysqli_real_escape_string($con, $_POST['uniQ']);
   $title = mysqli_real_escape_string($con, $_POST['title']);
   $qty = mysqli_real_escape_string($con, $_POST['qty']);
   $description = mysqli_real_escape_string($con, $_POST['description']);
   $address = mysqli_real_escape_string($con, $_POST['address']);
   $province = mysqli_real_escape_string($con, $_POST['province']);
   $city = mysqli_real_escape_string($con, $_POST['city']);
   $min_adult = mysqli_real_escape_string($con, $_POST['min_adult']);
   $max_adult = mysqli_real_escape_string($con, $_POST['max_adult']);
   $petChoose = mysqli_real_escape_string($con, $_POST['petChoose']);

   // Check if all required fields are empty
   if (empty($title) && empty($qty) && empty($description) && empty($address) && empty($province) && empty($city) && empty($min_adult) && empty($max_adult) && empty($petChoose)) {
      echo "empty";
   } else {
      // Update the database record
      $updateSQL = "UPDATE `publish` SET 
         `title`='$title',
         `description`='$description',
         `province`='$province',
         `city`='$city',
         `address`='$address',
         `qty`='$qty',
         `min_adult`='$min_adult',
         `max_adult`='$max_adult',
         `pet`='$petChoose' 
         WHERE `unique_id`='$unique_id'";

      if (mysqli_query($con, $updateSQL)) {
         echo "success";
      } else {
         echo "error";
      }
   }
?>
