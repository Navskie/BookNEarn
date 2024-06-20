<?php 

   include "../../.config/dbconnect.php";

   $unique_id = mysqli_real_escape_string($con, $_POST['unique_id']);
   $message = mysqli_real_escape_string($con, $_POST['message']);
   $rating = mysqli_real_escape_string($con, $_POST['rating']);

   $rating_sql = mysqli_query($con, "INSERT INTO `review` (`unique_id`, `comment`, `star`, `sender`) VALUES ('$unique_id', '$message', '$rating', '$token')");

   if ($rating_sql) {
      echo "success";
   } else {
      echo "error";
   }

?>