<?php

   include "../.config/dbconnect.php";

   $email = mysqli_real_escape_string($con, $_POST['email']);
   $password = md5(mysqli_real_escape_string($con, $_POST['password']));

   if ($email != "" && $password != "")
   {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)!==false)
      {
            $credentials = mysqli_query($con, "SELECT * FROM `users` WHERE `email_address` = '$email' AND `password` = '$password'");
            $data = mysqli_fetch_array($credentials);

            if (mysqli_num_rows($credentials) > 0) {
               $data_role = $data['role'];
               $data_token = $data['_token'];

               if ($data_role == 'user') 
               {
                  echo "user success";

                  $_SESSION['token'] = $data_token;
               }
            } else {
               $credentials = mysqli_query($con, "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password'");
               $data = mysqli_fetch_array($credentials);

               if (mysqli_num_rows($credentials) > 0)
               {
                  $data_token = $data['_token'];
                  echo "admin";

                  $_SESSION['token'] = $data_token;
               }
               else 
               {
                  echo "not match";
               }
            }
      }
      else 
      {
            echo "invalid email";
      }
   }
   else 
   {
      echo "error";
   }