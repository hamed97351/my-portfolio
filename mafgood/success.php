<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: register.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>تم التحقق بنجاح</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

<style>
    body {
        background-color: #f8f9fa;
        direction: rtl;
        text-align: center;
        padding-top: 100px;
    }
    .success-box {
        background: #fff;
        padding: 40px;
        max-width: 450px;
        margin: auto;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
        animation: fadeIn 1s ease-in-out;
    }
    .success-icon {
        font-size: 70px;
        color: #28a745;
        animation: pop 0.6s ease-in-out;
    }
    @keyframes pop {
        0% { transform: scale(0.5); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    setTimeout(function() {
        window.location.href = "choose_add.php";
    }, 2500);
</script>

</head>
<body>

<div class="success-box">
    <div class="success-icon">✔️</div>
    <h2 class="mt-3">تم التحقق بنجاح</h2>
    <p class="text-muted">سيتم تحويلك الآن إلى الصفحة الرئيسية</p>
</div>

</body>
</html>
