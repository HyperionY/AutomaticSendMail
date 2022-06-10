<?php
error_reporting(E_ALL);
ini_set('display_errors', true);

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create a new PHPMailer instance
$mail = new PHPMailer(true);

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

try {
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    //Set the SMTP port number:
    // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
    // - 587 for SMTP+STARTTLS
    $mail->Port = 465;

    //Set the encryption mechanism to use:
    // - SMTPS (implicit TLS on port 465) or
    // - STARTTLS (explicit TLS on port 587)
    $mail->SMTPSecure = "ssl";

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'your@email';

    //Password to use for SMTP authentication
    $mail->Password = 'your_pw';

    $mail->CharSet = 'utf-8';
    $mail->Encoding = "base64";

    //Set who the message is to be sent from
    //Note that with gmail you can only use your account address (same as `Username`)
    //or predefined aliases that you have configured within your account.
    //Do not use user-submitted addresses in here
    $mail->setFrom('your_@email', 'Tester');

    //Set who the message is to be sent to
    $mail->addAddress('address@email', 'who');

    $mail->isHTML(true);

    //Set the subject line
    $mail->Subject = 'PHPMailer GMail SMTP test SUBJECT';

    //Replace the plain text body with one created manually
    $mail->Body = 'This is a test message body';
    $mail->AltBody = 'This is a plain-text message body test';
    
    $mail->Send();
    echo "Message has heen sent";
} catch (phpmailerException $e) {
    echo $e->errorMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>