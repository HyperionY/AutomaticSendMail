<?php
// refer to phpmailer lib.
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/*
  automaticMailer( $address :: "Your email address for sending.",
                   $pw      :: "Your email account password.",
                   $to      :: "Your account username.",
                   $type    :: "Parameters that determine which content to mail."
                                0 == start program.
                                1 == send email when morning.
                                2 == send email when activity time.
                                3 == send email when get to sleep.)
*/
function automaticMailer($address, $pw, $to, $type=0) {
    // defaults to using php "mail()" and SMTP sever setting.
    // if you need to debug use '$mail->SMTPDebug'
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // set the google SMTP setting.
    // if you use a different email, please set SMTP settings for that email.
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    // set the email address and password for send email.
    $mail->Username = $address;
    $mail->Password = $pw;

    // encording set
    $mail->CharSet = 'utf-8';
    $mail->Encoding = "base64";

    // set mail sneder and receiver.
    $mail->setFrom($address, 'Remainder');
    $mail->addAddress($address, $to);

    // set content type.
    $mail->isHTML(true);

    /*
      $mail->Subject :: mail title
      $mail->Body    :: mail content (HTML only)
      $mail->AltBody :: mail content (non-HTML only)
    */
    if($type === 0)
    {
        $mail->Subject = 'Automaic send remainder mail program start';
        $mail->Body = 'Active program.';
        $mail->AltBody = 'Active program.';
    }
    else if($type === 1)
    {
        $mail->Subject = 'Get up and Start your schedule';
        $mail->Body = 'Let\'s have a fruitful day today! and check your TODO List.';
        $mail->AltBody = 'Let\'s have a fruitful day today! and check your TODO List.';
    }
    else if($type === 2)
    {
        $mail->Subject = 'Remainder';
        $mail->Body = 'Focus on your task.';
        $mail->AltBody = 'Focus on your task.';
    }
    else if($type === 3)
    {
        $mail->Subject = 'Need to sleep';
        $mail->Body = 'Check your schedule and TODO list for next day. And get to sleep for tomorrow';
        $mail->AltBody = 'Check your schedule and TODO list for next day. And get to sleep for tomorrow';
    }

    $mail->Send();
    echo "Message has heen sent";
}
?>