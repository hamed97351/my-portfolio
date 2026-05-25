<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (!isset($_SESSION['pending_user'])) {
    header("Location: register.php");
    exit();
}

$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;

$email = $_SESSION['pending_user']['email'];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = '1d8827b921c9af';
    $mail->Password   = 'f0ed6fb0e4350a'; // ضع كلمة المرور الكاملة هنا
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('no-reply@hawja.com', 'OTP Verification');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'رمز التحقق الجديد';
    $mail->Body    = "رمز التحقق الجديد هو: <b>$otp</b>";

    $mail->send();

} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
    exit();
}

header("Location: verify_otp.php?resent=1");
exit();
?>
