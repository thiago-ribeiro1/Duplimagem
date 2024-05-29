<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = 'teste@quadrodigital.online';
$mail->Password = 'J32u2olv.';
$mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
$mail->addReplyTo('claudiogsn2@gmail.com', 'Your Name');
$mail->addAddress('claudiogsn2@gmail.com', 'Receiver Name');
$mail->Subject = 'Testing PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'This is a plain text message body';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}
?>