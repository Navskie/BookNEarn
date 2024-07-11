<?php
   include_once '../../.config/dbconnect.php';

   $amenities_sub = $_POST['ameNities'];
   $amenities = str_replace("'", "", $amenities_sub);

   $unique_id = $_SESSION['pubUNIQ'];

   $sql = "INSERT INTO `amenities` (`unique_id`, `icon`) VALUES ('$unique_id','$amenities')"; 
   $sql_execute = mysqli_query($con, $sql);

   echo 'success';