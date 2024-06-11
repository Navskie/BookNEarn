<?php 

   require '../../../../.config/dbconnect.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $img_id = $_POST['main_img'];
      $unique_id = $_POST['unique_id'];

      if ($img_id == '') {
         echo 'warning';
      } else {
         $loop_img = mysqli_query($con, "UPDATE `publish_img` SET `status` = '' WHERE `unique_id` = '$unique_id'");

         $delete_qry = mysqli_query($con, "UPDATE `publish_img` SET `status` = 'main' WHERE `filename` = '$img_id'");

         if ($delete_qry) {
               echo "success";
         } else {
               echo "error";
         }
      }

   }