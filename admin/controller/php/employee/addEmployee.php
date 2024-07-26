<?php 

   require '../../../../.config/dbconnect.php';

   $fullName = $_POST['fullName'];
   $role = $_POST['role'];
   $emailAddress = $_POST['emailAddress'];
   $password = md5($_POST['password']);

   if ($fullName == '' || $role == '' || $emailAddress == '' || $password == '') {
      echo 'empty';
   } else {
      $token = bin2hex(random_bytes(16));

      $result2 = "";
      $n = 6;
      $generator2 = "1357469280ABCDEFGXYZQRST";

      for ($i = 1; $i <= $n; $i++) {
         $result2 .= substr($generator2, rand() % strlen($generator2), 1);
      }
      $generated_id = "EMP" . $result2;

      $emp_sql = "INSERT INTO users (`fullname`, `role`, `status`, `generated_id`, `email_address`, `password`, `_token`) VALUES ('$fullName', '$role', 'active', '$generated_id', '$emailAddress', '$password', '$token')";
      $emp_execute = mysqli_query($con, $emp_sql);

      echo "success";
   }