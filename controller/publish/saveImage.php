<?php
   // Include database connection or any necessary configurations
   include_once '../../.config/dbconnect.php';

   // Check if uniQ and frontImage are set in POST data
   if(isset($_POST['uniQ']) && isset($_FILES['frontImage'])) {
      $uniQ = $_POST['uniQ'];
      $frontImage = $_FILES['frontImage'];

      // Check if there was an error uploading the file
      if ($frontImage['error'] !== UPLOAD_ERR_OK) {
         echo "Error uploading file.";
         exit;
      }

      // Validate file type
      $allowedTypes = ['image/jpeg', 'image/png'];
      $fileType = mime_content_type($frontImage['tmp_name']); // Get MIME type of the file

      if (!in_array($fileType, $allowedTypes)) {
         echo "Invalid file type. Please upload a JPG or PNG file.";
         exit;
      }

      // Validate file size (2MB limit)
      if ($frontImage['size'] > 2000000) {
         echo "File size exceeds 2MB limit.";
         exit;
      }

      // Set upload directory and file name
      $uploadDir = '../../assets/img/publish/';
      $extension = pathinfo($frontImage['name'], PATHINFO_EXTENSION);
      $newFileName = uniqid() . '_' . date('hms') . '.' . $extension; 
      $uploadFile = $uploadDir . $newFileName;

      // Move uploaded file to desired location
      if (move_uploaded_file($frontImage['tmp_name'], $uploadFile)) {
         // Insert filename and uniQ into database
         $update_query = "INSERT INTO publish_img (`filename`, `unique_id`) VALUES ('$newFileName', '$uniQ')";
         if (mysqli_query($con, $update_query)) {
               echo "success";
         } else {
               echo "Error updating profile: " . mysqli_error($con);
         }
      } else {
         echo "Failed to move uploaded file.";
      }
   } else {
      echo "Required parameters are missing.";
   }
?>
