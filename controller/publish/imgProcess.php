<?php

   include "../../.config/dbconnect.php"; 

   $unique_id = $_SESSION['pubUNIQ'];

   $sql = mysqli_query($con, "SELECT * FROM publish_img WHERE unique_id = '$unique_id'");
   $num_rows = mysqli_num_rows($sql);

   if ($num_rows <= 5) {

      $frontImage = $_FILES['frontImage'];

      $uploadDir = '../../assets/img/publish/';
      $extension = pathinfo($frontImage['name'], PATHINFO_EXTENSION);
      $newFileName = uniqid() . '_' . date('hms') . '.' . $extension; 
      $uploadFile = $uploadDir . $newFileName;

      if ($img != 'default.png' && !empty($img) && file_exists($uploadDir . $img)) {
         unlink($uploadDir . $img);
      }

      move_uploaded_file($frontImage['tmp_name'], $uploadFile);
      $update_query = "INSERT INTO publish_img (`unique_id`,`filename`) VALUES ('$unique_id', '$newFileName')";
      if (mysqli_query($con, $update_query)) {
         echo "success";
      } else {
         echo "Error updating profile: " . mysqli_error($con);
      }

   } else {

      echo "max image";

   }

?>
