<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- استدعاء ملف Bootstrap CSS مع دعم RTL -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- استدعاء مكتبة Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- استدعاء ملف CSS المخصص -->
    <link href="home_page.css" rel="stylesheet">
    <title>اضافة المفقودات والموجودات</title>
    <style>
        .auth-message {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 20px 0;
        }
        .auth-message a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .auth-message a:hover {
           
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: white;
            text-decoration: none;
        }
        .auth-links {
            align-items: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color:#004d40;">
        <a class="navbar-brand" href="home_page.php">
            <img src="images/website/logo.png" alt="Logo image" id="logo-img" class="d-inline-block align-top">
        </a>
        <!-- زر التبديل لشريط التنقل في الشاشات الصغيرة -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- عناصر شريط التنقل -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="home_page.php">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="we.php">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="connect.php">اتصل بنا</a></li>
                <?php
                if (isset($_SESSION['is_logged_in'])) {
                    if ($_SESSION['is_admin'] == 'admin') {
                        echo '<li class="nav-item"><a class="nav-link" href="messages.php">الرسائل</a></li>';
                    }
                }
                ?>
                <li class="nav-item">
                    <form method="post" action="search.php" class="d-flex">
                        <input type="text" name="query" class="form-control search-bar" placeholder="بحث...">
                        <button type="submit" class="btn btn-success search-button"><i class="fas fa-search"></i></button>
                    </form>
                </li>
            </ul>
           
        </div>
        <?php
            if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']) {
                echo '<a class="btn-custom ml-auto" href="logout.php">تسجيل خروج</a>';
            }
            ?>
    </nav>
    <div class="container">
        <div class="content">
           
            <div class="box">
                <div class="label">اضافة المفقودات والموجودات</div>
                <div class="sub-box">
                    <a href="add_lost.php">
                        <img src="images/website/add_losts.png" alt="اضافة المفقودات" class="full-image">
                    </a>
                    <a href="add_found.php">
                        <img src="images/website/add_founded.png" alt="اضافة الموجودات" class="full-image">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <p>حقوق الطبع والنشر © 2024</p>
    </footer>
    <!-- استدعاء ملفات JavaScript الخاصة بـ Bootstrap -->
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        function toggleMenu() {
            const nav = document.querySelector('.nav');
            nav.classList.toggle('active');
        }
        function search() {
            const query = document.querySelector('.search-bar').value;
            if (query) {
                alert('بحث عن: ' + query); // هذا للتأكد من أن البحث يعمل
                window.location.href = `search_results.html?query=${query}`;
            }
        }
        function toggleDropdown() {
            var dropdown = document.querySelector('.search-dropdown');
            dropdown.classList.toggle('show');
        }
    </script>
</body>
</html>
