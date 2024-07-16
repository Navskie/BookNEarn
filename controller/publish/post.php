<?php

   include_once '../../.config/dbconnect.php';

   $id = $_SESSION['pubUNIQ'];

   $sql_update = mysqli_query($con, "UPDATE `publish` SET `status` = 'Pending', `visible` = 'OFF' WHERE unique_id = '$id'");

   unset($_SESSION['publishON']);
   unset($_SESSION['priceType']);
   unset($_SESSION['pubUNIQ']);

   echo 'success';