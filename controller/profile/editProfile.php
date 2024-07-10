<?php

   include "../../.config/dbconnect.php"; 

   $fullName = $_POST['fullName'];
   if ($fullName == '') {
      $fullName = $fullname;
   }
   $mobileNumber = $_POST['mobileNumber'];
   if ($mobileNumber == '') {
      $mobileNumber = $contact;
   }
   $bio = $_POST['bio'];
   if ($bio == '') {
      $bio = $Profilebio;
   }
   $frontImage = $_FILES['frontImage'];

   if ($frontImage != '') {
      $uploadDir = '../../assets/img/profile/';
      $extension = pathinfo($frontImage['name'], PATHINFO_EXTENSION);
      $newFileName = uniqid() . '_' . date('hms') . '.' . $extension; 
      $uploadFile = $uploadDir . $newFileName;
   
      if ($img != 'default.png' && !empty($img) && file_exists($uploadDir . $img)) {
         unlink($uploadDir . $img);
      }
   } else {
      $newFileName = $img;
   }

   move_uploaded_file($frontImage['tmp_name'], $uploadFile);
   $update_query = "UPDATE users SET img = '$newFileName', fullname = '$fullName', bio = '$bio', contact = '$mobileNumber' WHERE _token = '$token'";
   if (mysqli_query($con, $update_query)) {
      echo "success";
   } else {
      echo "Error updating profile: " . mysqli_error($con);
   }

?>
