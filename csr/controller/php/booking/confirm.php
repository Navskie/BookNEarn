<?php 

   require '../../../../.config/dbconnect.php';

   $billing_id = $_GET['billing_id'];

   $booking_sql = mysqli_query($con, "UPDATE `booking` SET `status` = 'Block' WHERE `billing_id` = '$billing_id'");
   $block_sql = mysqli_query($con, "UPDATE `block` SET `status` = '1' WHERE `billing_id` = '$billing_id'");

   $remarks = $billing_id. " Confirm by ". $token;
   $activities_sql = mysqli_query($con, "INSERT INTO `activities` (`remarks`, `users`) VALUES ('$remarks', '$token')");

   header('location: ../../../booking-list-expand?billing_id='.$billing_id.'');