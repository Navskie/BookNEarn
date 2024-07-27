<?php 

   require '../../../../.config/dbconnect.php';

   $billing_id = $_GET['billing_id'];

   // get billing details 
   $booking_details = mysqli_query($con, "SELECT * FROM booking as p1 INNER JOIN payment as p2 ON p1.billing_id = p2.billing_id WHERE p1.billing_id = '$billing_id'");
   $booking_data = mysqli_fetch_array($booking_details);

   $generated_id = $booking_data['encoder_id'];
   $total = $booking_data['total'];

   $earnings = $total * 0.08;

   // get users token 
   $users_details = mysqli_query($con, "SELECT * FROM users WHERE generated_id = '$generated_id'");
   $users_data = mysqli_fetch_array($users_details);

   $users_token = $users_data['_token'];

   // get users wallet
   $wallet_details = mysqli_query($con, "SELECT * FROM wallet WHERE _token = '$users_token'");
   $wallet_data = mysqli_fetch_array($wallet_details);

   if (mysqli_num_rows($wallet_details) > 0) {

      $balance = $wallet_data['balance'];
      $rebates = $wallet_data['rebates'];

      $new_balance = $balance + $earnings;
      $new_rebates = $rebates + $earnings;

      $update_wallet = mysqli_query($con, "UPDATE wallet SET balance = '$new_balance', rebates = '$new_rebates' WHERE _token = '$users_token'");

   } else {

      $update_wallet = mysqli_query($con, "INSERT INTO wallet (`_token`, `balance`, `withdraw`, `rebates`) VALUES ('$users_token', '$earnings', '0', '$earnings')");

   }

   $wallet_remarks = 'You have received amount of '.$earnings.' from Success Booking';

   $wallet_history = mysqli_query($con, "INSERT INTO wallet_history (`billing_id`, `generated_id`, `remarks`, `amount`, `status`) VALUES ('$billing_id', '$generated_id', '$wallet_remarks', '$earnings', 'Success Booking')");

   $booking_sql = mysqli_query($con, "UPDATE `booking` SET `status` = 'Success' WHERE `billing_id` = '$billing_id'");
   $block_sql = mysqli_query($con, "UPDATE `block` SET `status` = '1' WHERE `billing_id` = '$billing_id'");

   $remarks = $billing_id. " Reject by ". $token;
   $activities_sql = mysqli_query($con, "INSERT INTO `activities` (`remarks`, `users`) VALUES ('$remarks', '$token')");

   header('location: ../../../booking-list-expand?billing_id='.$billing_id.'');