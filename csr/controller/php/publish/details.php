<?php 

   require '../../../../.config/dbconnect.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $title = $_POST['title'];
      $desc = $_POST['desc'];
      $address = $_POST['address'];
      $prov = $_POST['prov'];
      $city = $_POST['city'];
      $qty = $_POST['qty'];
      $max_adult = $_POST['max_adult'];
      $max_pet = $_POST['max_pet'];
      $unique_id = $_POST['unique_id'];

      if ($title == '' || $desc == '' || $address == '' || $prov == '' || $city == '' || $qty == '' || $max_adult == '' || $max_pet == '') {
         echo 'warning';
      } else {

         $delete_qry = mysqli_query($con, "UPDATE `publish` SET `title` = '$title', `description` = '$desc' , `address` = '$address', `province` = '$prov', `city` = '$city', `qty` = '$qty', `max_adult` = '$max_adult', `pet` = '$max_pet' WHERE `unique_id` = '$unique_id'");

         if ($delete_qry) {
               echo "success";
         } else {
               echo "error";
         }
      }

   }