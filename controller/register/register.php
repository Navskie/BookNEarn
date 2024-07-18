<?php
   session_start();

   include "../../.config/dbconnect.php";

   require '../../vendor/PHPMailer/src/Exception.php';
   require '../../vendor/PHPMailer/src/PHPMailer.php';
   require '../../vendor/PHPMailer/src/SMTP.php';

   use PHPMailer\PHPMailer\PHPMailer;

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
   $generated_id = "BNE" . $result2;

   $logoUrl = "../../assets/img/logo.svg";

   $email = mysqli_real_escape_string($con, $_POST['email']);

   if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {

      $check_email = mysqli_query($con, "SELECT * FROM `users` WHERE `email_address` = '$email'");
      $emailDuplicate = mysqli_num_rows($check_email);

      if ($emailDuplicate > 0) {
         echo "email is not available";
      } else {
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = "mail.smtp2go.com";
         $mail->SMTPAuth = true;
         $mail->Username = "booknearn";
         $mail->Password = "@User2022";
         $mail->SMTPSecure = "tls";
         $mail->Port = "2525";
         $mail->From = "booknearn@upticorporationph.com";
         $mail->FromName = "BOOK N EARN";
         $mail->addAddress($email, "Register");
         $mail->isHTML(true);
         $mail->Subject = "BOOK N EARN OTP";
         $mail->Body = "
                        <html>
                           <head>
                                 <style>
                                    /* CSS styles */
                                    body {
                                       font-family: Arial, sans-serif;
                                       line-height: 1.6;
                                       background-color: #f2f2f2;
                                       padding: 20px;
                                    }
                                    .container {
                                       max-width: 600px;
                                       margin: 0 auto;
                                       background-color: #ffffff;
                                       padding: 30px;
                                       border-radius: 10px;
                                       box-shadow: 0 0 10px rgba(0,0,0,0.1);
                                    }
                                    .header {
                                       background-color: #4CAF50;
                                       color: #ffffff;
                                       text-align: center;
                                       padding: 10px;
                                       border-top-left-radius: 10px;
                                       border-top-right-radius: 10px;
                                    }
                                    .logo {
                                       text-align: center;
                                       margin-bottom: 20px;
                                    }
                                    .logo img {
                                       max-width: 100%;
                                       height: auto;
                                    }
                                    .content {
                                       padding: 20px;
                                    }
                                    .otp {
                                       font-size: 24px;
                                       font-weight: bold;
                                       background-color: #f0f0f0;
                                       padding: 10px;
                                       border-radius: 5px;
                                       display: inline-block;
                                    }
                                    .footer {
                                       margin-top: 20px;
                                       font-size: 12px;
                                       color: #888888;
                                       text-align: center;
                                    }
                                 </style>
                           </head>
                           <body>
                                 <div class='container'>
                                    <div class='header'>
                                       <h2>BOOK N EARN</h2>
                                    </div>
                                    <div class='logo'>
                                       <img src='$logoUrl' alt='BOOK N EARN Logo'>
                                    </div>
                                    <div class='content'>
                                       <p>Dear User,</p>
                                       <p>Thank you for registering with BOOK N EARN. Please use the following One-Time Password (OTP) to complete your registration:</p>
                                       <p class='otp'>$otp</p>
                                       <p>This OTP is valid for 5 minutes. Please do not share this OTP with anyone for security reasons.</p>
                                       <p>If you did not request this OTP or need any assistance, please contact our support team.</p>
                                    </div>
                                    <div class='footer'>
                                       <p>Best regards,<br>BOOK N EARN Team</p>
                                    </div>
                                 </div>
                           </body>
                           </html>
                        ";

         if(!$mail->send()) {
            echo "mail error". $mail->ErrorInfo;
         } else {
            $query = "INSERT INTO `users` (`generated_id`, `email_address`, `otp`, `status`, `role`) 
            VALUES ('$generated_id', '$email', '$otp', 'OTP Queue', 'user')";
            $process = mysqli_query($con, $query);

            if ($process) {
               echo "success";
               $_SESSION['generatedID'] = $generated_id;
            } else {
               echo "Error: " . mysqli_error($con);
            }
         }
      }
   } else {
      echo "Invalid email";
   }
?>
