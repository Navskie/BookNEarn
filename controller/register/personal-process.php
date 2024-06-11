   <?php

      include "../../.config/dbconnect.php";

      $generatedID = $_SESSION['generatedID'];

      $fname = mysqli_real_escape_string($con, $_POST['fname']);
      $number = mysqli_real_escape_string($con, $_POST['number']);

      if ($fname == "" || $number == "") 
      {
         echo "required";
      }
      else 
      {
         $sql = mysqli_query($con, "UPDATE `users` SET `fullname` = '$fname', `contact` = '$number' WHERE `generated_id` = '$generatedID'");

         if ($sql) 
         {
               echo "success";
         }
         else 
         {
               echo "error";
         }
      }
