<?php

   include "../../.config/dbconnect.php";

   $generatedID = $_SESSION['generatedID'];

   $token = bin2hex(random_bytes(16));

   $password = md5(mysqli_real_escape_string($con, $_POST['password']));
   $retypepassword = md5(mysqli_real_escape_string($con, $_POST['repassword']));

   if ($password != '' && $retypepassword != '')
   {
      if ($password == $retypepassword)
      {
            $sql = mysqli_query($con, "UPDATE `users` SET `password` = '$password',  `_token` = '$token' WHERE `generated_id` = '$generatedID'");

            if ($sql) 
            {
               echo "success";
               $_SESSION['token'] = $token;
            }
            else 
            {
               echo "error";
            }
      }
      else 
      {
            echo "password not match";
      }
   }
   else 
   {
      echo "required";
   }