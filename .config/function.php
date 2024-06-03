<?php

    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    define("MAILHOST", "smtp-gmail.com");
    define("USERNAME", "email address");
    define("PASSWORD", "your password");
    define("SEND_FROM", "email address send email");
    define("REPLY_TO_NAME", "name");

    function sendMail($email, $subject, $message) 
    {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = MAILHOST;
        $mail->Username = USERNAME;
    }