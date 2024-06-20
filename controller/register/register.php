<?php

   include "../../.config/dbconnect.php";

   $result = "";
   $result2 = "";

   $generator = "1357469280XYZABC";
   $generator2 = "1357469280ABCDEFGXYZQRST";

   $n = 6;

   for ($i = 1; $i <= $n; $i++) {
      $result .= substr($generator, rand() % strlen($generator), 1);
   }

   for ($i = 1; $i <= $n; $i++) {
      $result2 .= substr($generator2, rand() % strlen($generator2), 1);
   }

   $otp = $result;
   $generated_id = "BNE".$result2;

   $email = mysqli_real_escape_string($con, $_POST['email']);

   if (filter_var($email, FILTER_VALIDATE_EMAIL)!==false)
   {
      $process = mysqli_query($con, "
      INSERT INTO `users` 
      (`generated_id`, `email_address`, `otp`, `status`, `role`) 
      VALUES 
      ('$generated_id', '$email', '$otp', 'OTP Queu', 'user')");

      echo "success";
      $_SESSION['generatedID'] = $generated_id;

      // OTP Process
   }
   else 
   {
      echo "invalid email";
   }