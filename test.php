<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function automaticMailer($address, $pw, $to, $type=0) {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mail->Username = $address;
    $mail->Password = $pw;

    $mail->CharSet = 'utf-8';
    $mail->Encoding = "base64";

    $mail->setFrom($address, 'Remainder');
    $mail->addAddress($address, $to);
    $mail->isHTML(true);

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