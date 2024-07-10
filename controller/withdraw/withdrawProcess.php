<?php

   // Include database connection or configuration if needed
   include "../../.config/dbconnect.php";

   $bank = $_POST['bank'];
   $accName = $_POST['accName'];
   $accNumber = mysqli_real_escape_string($con, $_POST['accNumber']);
   $accAmount = mysqli_real_escape_string($con, $_POST['accAmount']);
   $accPassword = md5(mysqli_real_escape_string($con, $_POST['accPassword']));

   if ($accPassword == $password) {

      $wallet = mysqli_query($con, "SELECT * FROM `wallet` WHERE `_token` = '$token'");
      $data = mysqli_fetch_array($wallet);

      $balance = $data['balance'];
      $withdrawal = $data['withdrawal'];
      $rebates = $data['rebates'];

      if ($accAmount > $balance) {
         echo "no balance";
      } else {
         function generateUniqueID() {
            $letters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $numbers = substr(str_shuffle('0123456789'), 0, 3);
            return substr($letters, 0, 3) . $numbers;
         }

         $reference = generateUniqueID();

         $sukli = $balance - $accAmount;

         $remarks = 'Withdraw request amount of '.$accAmount.' available balance is '.$sukli;

         $history_sql = mysqli_query($con, "INSERT INTO `wallet_history` (`billing_id`, `generated_id`, `remarks`, `amount`, `status`) VALUES ('$reference', '$generated_id', '$remarks', '$accAmount', 'Request')");

         $withdraw_sql = mysqli_query($con, "INSERT INTO `withdraw` (`generated_id`, `bank`, `account_number`, `account_name`, `amount`, `status`) VALUES ('$generated_id', '$bank', '$accNumber', '$accName', '$accAmount', 'Pending')");

         $updateWallet = mysqli_query($con, "UPDATE `wallet` SET `balance` = '$sukli', `withdrawal` = '$accAmount' WHERE `_token` = '$token'");

         echo "success";
      }
   } else {
      echo 'wrong password';
   }