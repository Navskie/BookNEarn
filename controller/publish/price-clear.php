<?php

   include_once '../../.config/dbconnect.php';

   if (isset($_GET['unique_id'])) {
      $unique_id = $_GET['unique_id'];

      $sql = mysqli_query($con, "DELETE FROM price WHERE unique_id = '$unique_id'");

      if ($sql) {
         unset($_SESSION['priceType']);

         echo json_encode(['success' => true]);
         exit;
      } else {
         echo json_encode(['success' => false, 'error' => mysqli_error($con)]);
         exit;
      }
   } else {
      echo json_encode(['success' => false, 'error' => 'unique_id not set']);
      exit;
   }
   
?>
