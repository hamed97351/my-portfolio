<?php 
session_start();

// عرض الأخطاء أثناء التطوير
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="home_page.css" rel="stylesheet">
    <title>الصفحة الرئيسية</title>

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

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

            <li class="nav-item"><a class="nav-link" href="home_page.php">الرئيسية</a></li>
            <li class="nav-item"><a class="nav-link" href="we.php">من نحن</a></li>
            <li class="nav-item"><a class="nav-link" href="connect.php">اتصل بنا</a></li>

            <?php if (!empty($_SESSION['is_logged_in'])): ?>

                <li class="nav-item search-dropdown">
                    <button class="btn btn-success search-button" onclick="toggleDropdown()">اضافة</button>
                    <div class="search-dropdown-content">
                        <a href="add_lost.php">اضافة مفقودات</a>
                        <a href="add_found.php">اضافة موجودات</a>
                    </div>
                </li>

                <?php if (!empty($_SESSION['is_admin']) && $_SESSION['is_admin'] === 'admin'): ?>
                    <li class="nav-item"><a class="nav-link" href="messages.php">الرسائل</a></li>
                <?php endif; ?>

            <?php endif; ?>

            <li class="nav-item">
                <form method="post" action="search.php" class="d-flex">
                    <input type="text" name="query" class="form-control search-bar" placeholder="بحث...">
                    <button type="submit" class="btn btn-success search-button"><i class="fas fa-search"></i></button>
                </form>
            </li>

        </ul>
    </div>

    <?php if (!empty($_SESSION['is_logged_in'])): ?>
        <a class="btn-custom ml-auto" href="logout.php">تسجيل خروج</a>
    <?php endif; ?>

</nav>

<div class="container">
    <div class="content">

        <?php if (empty($_SESSION['is_logged_in'])): ?>

            <div class="auth-message">
                <p>أنت غير مسجل، يمكنك تصفح المفقودات والموجودات من الأسفل.</p>
                <a href="login.php" class="btn-custom">تسجيل الدخول للإضافة</a>
            </div>

        <?php else: ?>

            <div class="auth-message">
                <p>مرحباً 👋 يمكنك الآن إضافة مفقودات أو موجودات من القائمة بالأعلى.</p>
            </div>

        <?php endif; ?>

        <div class="box">
            <div class="label">عرض المفقودات والموجودات</div>
            <div class="sub-box">
                <a href="choose_lost_view.php">
                    <img src="images/website/view_losted.png" class="full-image">
                </a>
                <a href="choose_found_view.php">
                    <img src="images/website/view_founded.png" class="full-image">
                </a>
            </div>
        </div>

    </div>
</div>

<footer>
    <p>حقوق الطبع والنشر © 2024</p>
</footer>

<script src="./js/jquery-3.7.1.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>

<script>
function toggleDropdown() {
    document.querySelector('.search-dropdown').classList.toggle('show');
}
</script>

</body>
</html>
