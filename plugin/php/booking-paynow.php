<?php 

   include '../../.config/dbconnect.php';

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $fullname = $_POST['fullname'];
      $mobile = $_POST['mobile'];
      $email = $_POST['email'];

      if (empty($fullname) || empty($mobile) || empty($email)) {
         echo "error";
      } else {
         
         $_SESSION['fullname'] = $fullname;
         $_SESSION['mobile'] = $mobile;
         $_SESSION['email'] = $email;

         echo "success";
      }
   }