<?php 

   require '../../../../.config/dbconnect.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $price = $_POST['price'];
      $four = $_POST['four'];
      $eight = $_POST['eight'];
      $twelve = $_POST['twelve'];
      $weekday = $_POST['weekday'];
      $weekend = $_POST['weekend'];
      $adult = $_POST['adult'];
      $pet = $_POST['pet'];

      $unique_id = $_POST['unique_id'];

      $delete_qry = mysqli_query($con, "UPDATE `price` SET `price` = '$price', `four_hour` = '$four' , `eight_hour` = '$eight', `twelve_hour` = '$twelve', `weekday` = '$weekday', `weekend` = '$weekend', `adult` = '$adult', `pet` = '$pet' WHERE `unique_id` = '$unique_id'");

      if ($delete_qry) {
         echo "success";
      } else {
         echo "error";
      }
      

   }