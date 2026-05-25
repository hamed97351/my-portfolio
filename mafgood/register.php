<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$host = "localhost";
$user = "root";
$password = "";
$database = "hawja";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    $hashed_password = hash('sha256', $password);
    $is_admin = ($email === 'Admin@gmail.com') ? 1 : 0;

    // حفظ بيانات المستخدم مؤقتًا
    $_SESSION['pending_user'] = [
        "name" => $name,
        "email" => $email,
        "password" => $hashed_password,
        "phone" => $phone,
        "is_admin" => $is_admin
    ];

    // إنشاء رمز OTP
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    // إرسال OTP عبر Mailtrap
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Username   = '1d8827b921c9af'; // من Mailtrap
        $mail->Password   = 'f0ed6fb0e4350a'; // ضع كلمة المرور الكاملة هنا
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('no-reply@hawja.com', 'OTP Verification');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'رمز التحقق الخاص بك';
        $mail->Body    = "رمز التحقق هو: <b>$otp</b>";

        $mail->send();

    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
        exit();
    }

    header('Location: verify_otp.php');
    exit();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>تسجيل حساب جديد</title>
    <style>
        body {
            background-color: #f8f9fa;
            direction: rtl;
            text-align: right;
            margin: 10px;
        }
        .register-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .register-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .bottom-text {
            text-align: center;
            margin: 10px;
            padding: 10px;
        }
    </style>
         <script>
        function validateForm() {
// Get form elements
 var name = document.getElementById("name").value;
  var email = document.getElementById("email").value; 
  var phone = document.getElementById("phone").value; 
  var message = document.getElementById("message").value;
   // Simple validation logic
    if (name == "" || email == "" || phone == "" || message == "") { 
        alert("All fields must be filled out"); 
        return false; // Prevent form submission 
        } 
        // Email format check 
        var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/; 
        if (!email.match(emailPattern)) {
             alert("Please enter a valid email address"); 
             return false; // Prevent form submission 
             } 
             // Phone number format check (example: should be digits only)
              var phonePattern = /^\d{10}$/; 
              if (!.match(phonePattern)) {
                 alert("Please enter a valid 10-digit phone number"); 
                 return false; // Prevent form submission 
} 
// If all validations pass 
alert('Form submitted successfully!'); 
return true; // Allow form submission
        }
    </script>
</head>
<body>

    <div class="register-container">
        <img src="images/website/logo.png" alt="Profile Picture">
        <h2 class="text-center">تسجيل حساب جديد</h2>
        <form action="register.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">رقم الهاتف</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">تسجيل</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            // Implement any client-side validation if needed
            return true; // Return false to prevent form submission
        }
    </script>
</body>
</html>
