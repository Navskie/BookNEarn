<?php

   include "../../.config/dbconnect.php"; 

   $oldPassword = md5($_POST['oldPassword']);
   $newPassword = md5($_POST['newPassword']);

   if ($password == $oldPassword) {

      $password_sql = mysqli_query($con, "UPDATE users SET `password` = '$newPassword' WHERE _token = '$token'");

      echo 'success';
   } else {
      echo "wrong password";
   }