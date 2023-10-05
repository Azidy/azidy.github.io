<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp-relay.brevo.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "azidyaleatorio@gmail.com";
$mail->Password = "xsmtpsib-9a57ebfa35bee3e0486f92f635660b5c130d3260fb83a8e52752a6bd4f1a7af9-WqfY8hzRHw15LSQZ";

$mail->setFrom($email, $name);
$mail->addAddress("azidyaleatorio@gmail.com", "Heitor");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: index.html");
?>