<?php

   // Include database connection or configuration if needed
   include "../../.config/dbconnect.php";

   $walletSQL = mysqli_query($con, "SELECT * FROM `wallet` WHERE `_token` = '$token'");
   $walletDATA = mysqli_fetch_array($walletSQL);

   $balance = $walletDATA['balance'];
   $withdrawal = $walletDATA['withdrawal'];
   $rebates = $walletDATA['rebates'];

   $balance_decimal = number_format($balance, '2');
   $withdrawal_decimal = number_format($withdrawal, '2');
   $rebates_decimal = number_format($rebates, '2');

   $check_

?>