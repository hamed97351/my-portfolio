<?php
session_start();

// حماية الصفحة: لا دخول بدون تسجيل
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>اختيار الإضافة</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            direction: rtl;
            text-align: center;
            background: #f5f5f5;
            font-family: Arial;
        }

        .title {
            margin-top: 60px;
            font-size: 26px;
            font-weight: bold;
        }

        .container-box {
            margin-top: 50px;
        }

        .card-box {
            display: inline-block;
            width: 250px;
            margin: 20px;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 0 10px #ccc;
            text-decoration: none;
            color: black;
            transition: 0.3s;
        }

        .card-box:hover {
            transform: scale(1.05);
            background: #e9ecef;
        }

        .icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="title">اختر نوع الإضافة</div>

<div class="container-box">

    <!-- إضافة مفقودات -->
    <a href="add_lost.php" class="card-box">
        <div class="icon">❌</div>
        <h4>إضافة مفقودات</h4>
    </a>

    <!-- إضافة موجودات -->
    <a href="add_found.php" class="card-box">
        <div class="icon">✔</div>
        <h4>إضافة موجودات</h4>
    </a>

</div>

</body>
</html>