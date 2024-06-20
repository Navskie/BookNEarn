<?php 

   require '../../../../.config/dbconnect.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $price = $_POST['price'];
      $four = $_POST['four'];
      $eight = $_POST['eight'];
      $twelve = $_POST['twelve'];
      $weekday = $_POST['weekday'];
      $weekend = $_POST['weekend'];
      $weekly = $_POST['weekly'];
      $monthly = $_POST['monthly'];
      $adult = $_POST['adult'];
      $pet = $_POST['pet'];

      $security = $_POST['security'];

      $unique_id = $_POST['unique_id'];
      
      $check_price = mysqli_query($con, "SELECT * FROM `price` WHERE `unique_id` = '$unique_id'");

      if (mysqli_num_rows($check_price) > 0) {
         $update_qry = mysqli_query($con, "UPDATE `price` SET `security` = '$security',`weekly` = '$weekly' , `monthly` = '$monthly',`price` = '$price', `four_hour` = '$four' , `eight_hour` = '$eight', `twelve_hour` = '$twelve', `weekday` = '$weekday', `weekend` = '$weekend', `adult` = '$adult', `pet` = '$pet' WHERE `unique_id` = '$unique_id'");
      } else {
         $update_qry = mysqli_query($con, "INSERT INTO `price` (`security`, `weekly`, `monthly`,`price`, `four_hour`, `eight_hour`, `twelve_hour`, `weekday`, `weekend`, `adult`, `pet`, `unique_id`) VALUES ('$security', '$weekly' ,'$monthly','$price','$four' ,'$eight','$twelve','$weekday','$weekend','$adult','$pet', '$unique_id')");
      }

      if ($update_qry) {
         echo "success";
      } else {
         echo "error";
      }
      

}