<?php
include_once '../../.config/dbconnect.php';

   // Sanitize input data
   $unique_id = mysqli_real_escape_string($con, $_POST['uniQ']);
   $price = mysqli_real_escape_string($con, $_POST['price']);
   $security = mysqli_real_escape_string($con, $_POST['security']);
   $pet = mysqli_real_escape_string($con, $_POST['pet']);
   $adult = mysqli_real_escape_string($con, $_POST['adult']);
   $four_hour = mysqli_real_escape_string($con, $_POST['four_hour']);
   $eight_hour = mysqli_real_escape_string($con, $_POST['eight_hour']);
   $twelve_hour = mysqli_real_escape_string($con, $_POST['twelve_hour']);
   $weekly = mysqli_real_escape_string($con, $_POST['weekly']);
   $monthly = mysqli_real_escape_string($con, $_POST['monthly']);
   $weekday = mysqli_real_escape_string($con, $_POST['weekday']);
   $weekend = mysqli_real_escape_string($con, $_POST['weekend']);

   // Check if all variables are empty
   if (empty($unique_id) && empty($price) && empty($security) && empty($pet) && empty($adult)) {
      echo "empty";
   } else {
      // Construct the SQL query
      $sql = "UPDATE `price` SET 
              `price`='$price',
              `four_hour`='$four_hour',
              `eight_hour`='$eight_hour',
              `twelve_hour`='$twelve_hour',
              `weekly`='$weekly',
              `monthly`='$monthly',
              `weekday`='$weekday',
              `weekend`='$weekend',
              `security`='$security',
              `adult`='$adult',
              `pet`='$pet' 
              WHERE unique_id = '$unique_id'";
  
      // Execute the SQL query
      if (mysqli_query($con, $sql)) {
          echo "success";
      } else {
          echo "error: " . mysqli_error($con); // Echo the specific MySQL error message
      }
  }
  ?>
