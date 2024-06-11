<?php 

   require '../../../../.config/dbconnect.php';

   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $map = $_POST['map'];
      $unique_id = $_POST['unique_id'];

      if ($map == '') {
         echo 'warning';
      } else {

         $delete_qry = mysqli_query($con, "UPDATE `publish` SET `google_map` = '$map' WHERE `unique_id` = '$unique_id'");

         if ($delete_qry) {
               echo "success";
         } else {
               echo "error";
         }
      }

   }