<?php
session_start();

if (!isset($_SESSION['pending_user'])) {
    header("Location: register.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_otp = $_POST['otp'];

    if ($entered_otp == $_SESSION['otp']) {

        $user = $_SESSION['pending_user'];

        $conn = new mysqli("localhost", "root", "", "hawja");

        $sql = "INSERT INTO users (name, email, password, phone, is_admin)
                VALUES ('{$user['name']}', '{$user['email']}', '{$user['password']}', '{$user['phone']}', '{$user['is_admin']}')";

        if ($conn->query($sql) === TRUE) {

            $_SESSION['is_logged_in'] = true;
            $_SESSION['email'] = $user['email'];
            $_SESSION['is_admin'] = $user['is_admin'];

            unset($_SESSION['pending_user']);
            unset($_SESSION['otp']);

            header("Location: success.php");
            exit();
        } else {
            $error = "Database Error: " . $conn->error;
        }
    } else {
        $error = "❌ رمز التحقق غير صحيح";
    }
}
?>



<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>التحقق من الرمز</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
<style>
    body {
        background-color: #f8f9fa;
        direction: rtl;
        text-align: right;
    }
    .otp-container {
        max-width: 400px;
        margin: 80px auto;
        padding: 25px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
        text-align: center;
    }
    .otp-input {
        letter-spacing: 8px;
        font-size: 22px;
        text-align: center;
        font-weight: bold;
    }
</style>
</head>
<body>

<div class="otp-container">
    <h3 class="mb-3">🔐 التحقق من البريد الإلكتروني</h3>
    <p class="text-muted">تم إرسال رمز التحقق إلى بريدك الإلكتروني</p>

    <form method="POST">
        <input type="text" name="otp" maxlength="6" class="form-control otp-input mb-3" placeholder="••••••" required>

        <button type="submit" class="btn btn-primary btn-block w-100">تأكيد الرمز</button>
    </form>

    <?php if(isset($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>

    <hr>

    <form method="POST" action="resend_otp.php">
        <button class="btn btn-link">إعادة إرسال الرمز</button>
    </form>
</div>

</body>
</html>
