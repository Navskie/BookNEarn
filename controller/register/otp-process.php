   <?php 

      include "../../.config/dbconnect.php";

      $generatedID = $_SESSION['generatedID'];

      $sql = mysqli_query($con, "SELECT * FROM users WHERE `generated_id` = '$generatedID'");
      $sql_data = mysqli_fetch_array($sql);

      $_otp = $sql_data['otp'];
      $_id = $sql_data['id'];

      $otp = mysqli_real_escape_string($con, $_POST['otp']);

      if ($otp == $_otp)
      {
         $sql_2 = mysqli_query($con, "UPDATE `users` SET `status` = 'active', `role` = 'user' WHERE `id` = '$_id'");

         if ($sql_2) 
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
         echo "error";
      }