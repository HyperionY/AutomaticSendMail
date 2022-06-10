<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function automaticMailer($address, $pw, $to) {
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

    $mail->Subject = 'PHPMailer GMail SMTP test SUBJECT';
    $mail->Body = 'This is a test message body';
    $mail->AltBody = 'This is a plain-text message body test';

    $mail->Send();
    echo "Message has heen sent";
}
?>