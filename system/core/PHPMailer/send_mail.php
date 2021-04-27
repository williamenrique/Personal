<?php
// cargo todas las dependencias
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require  'Exception.php';
require  'PHPMailer.php';
require  'SMTP.php';

$mail = new PHPMailer(true);
//Server settings
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP(true);                                            //Send using SMTP
$mail->Host       = Host;                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = Username;                     //SMTP username
$mail->Password   = Password;                               //SMTP password
// $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->SMTPSecure = SMTPSecure;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
$mail->Port       = Port;   


// Activo condificacción utf-8
$mail->CharSet    = 'UTF-8';