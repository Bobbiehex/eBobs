<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

$host = "sunshine-hills.com";
$username = "register@sunshine-hills.com";
$sender = "register@sunshine-hills.com";
$hostPassword = "accLK#$%x4&";

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = $host;
$mail->SMTPAuth   = true;
$mail->Username   = $username;
$mail->Password   = $hostPassword;
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port       = 465;

$logo = "<center><img src='https://URL/images/logo_email.png'/> <h2>E-commerce Application</h2></center><hr/><br/>";
