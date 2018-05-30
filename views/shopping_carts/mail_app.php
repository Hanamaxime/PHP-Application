<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

//Load Composer's autoloader
require "vendor/autoload.php";

function send_mail($email_from, $email_to, $subject, $msg) {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    try {
      $mail->IsSMTP(); // enable SMTP

      $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "ssl://smtp.googlemail.com";
      $mail->Port = 465;
      $mail->IsHTML(true);

      $mail->Username = "dazzlin.star.park@gmail.com";
      $mail->Password = "toilatoi";

      $mail->SetFrom($email_from, 'Dazzlin Online Store');
      $mail->Subject = $subject;
      $mail->Body = $msg;
      $mail->AddAddress($email_to);

       $mail->Send();
    } catch (Exception $e) {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

}


 ?>
