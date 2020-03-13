<?php

require 'phpmailer/class.phpmailer.php';

require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output


$mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'smtp.gmail.com';              // Specify main and backup SMTP servers
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Host = 'smtp.gmail.com';
// $mail->Port = 465;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'apandey0826@gmail.com';                 // SMTP username
$mail->Password = 'atul123456';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = 'apandey0826@gmail.com';
$mail->FromName = 'ATP';
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress($_POST['email']);               // Name is optional

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>