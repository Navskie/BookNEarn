<?php

include_once '../../.config/dbconnect.php';

if (isset($_POST['ids']) && !empty($_POST['ids'])) {
   $ids = $_POST['ids'];

   foreach ($ids as $id) {
      // Fetch image data from database
      $imgSql = mysqli_query($con, "SELECT * FROM publish_img WHERE id = '$id'");
      if (!$imgSql) {
         die('Error fetching image data: ' . mysqli_error($con));
      }

      $imgData = mysqli_fetch_array($imgSql);
      $img = $imgData['filename'];
      $uploadDir = '../../assets/img/publish/';
      $filePath = $uploadDir . $img;

      // Delete image file
      if (file_exists($filePath)) {
         if (!unlink($filePath)) {
            die('Error deleting image file');
         }
      } else {
         die('Image file not found: ' . $filePath);
      }

      // Delete record from database
      $delete_sql = mysqli_query($con, "DELETE FROM publish_img WHERE id = '$id'");
      if (!$delete_sql) {
         die('Error deleting record: ' . mysqli_error($con));
      }
   }

   echo 'success';
} else {
   echo 'error: No IDs provided';
}

?>
