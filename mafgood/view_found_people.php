<?php
session_start();
include('config.php');

// Handle deletion
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $imagePath = $_POST['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath); // Delete the image file
    }
    mysqli_query($con, "DELETE FROM found_people WHERE id='$id'");
    header("Location: view_found_people.php"); // Redirect after deletion
    exit(); // Ensure no further code is executed
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شاشة البحث عن الموجودات</title>
    <link rel="stylesheet" href="display.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card-img-top {
            width: 100%; /* عرض الصورة بالكامل */
            height: 50%; /* ارتفاع الصورة لنصف الكارد */
            object-fit: cover; /* لضمان أن الصورة تغطي المساحة المحددة */
        }
        .card-body {
            padding: 20px; /* مسافة داخلية */
            text-align: right; /* محاذاة النص إلى اليمين */
        }
        /* تعديل خاصية التكبير */
        .modal {
            display: none; /* إخفاء المودال */
            position: fixed; /* تثبيت المودال في الشاشة */
            z-index: 1; /* ز-اندكس */
            padding-top: 100px; /* المسافة من أعلى الشاشة */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0); /* اللون الأسود */
            background-color: rgba(0,0,0,0.9); /* اللون الأسود بشفافية */
        }
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }
        .btn-custom {
            margin: 20px;
            border: 7px;
            background-color: #00695c; /* لون الخلفية */
            border-color: #004d40; /* لون الحدود */
            color: #ffffff; /* لون النص */
            font-size: 16px; /* حجم النص */
            padding: 10px 20px; /* المسافة الداخلية */
            border-radius: 5px; /* حواف دائرية */
            transition: background-color 0.3s, border-color 0.3s; /* تأثيرات انتقالية */
        }

        .btn-custom:hover {
            background-color: #004d40; /* لون الخلفية عند التمرير */
            border-color: #00332e; /* لون الحدود عند التمرير */
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
            <li class="nav-item"><a class="nav-link" href="we.html">من نحن</a></li>
            <li class="nav-item"><a class="nav-link" href="connect.php">اتصل بنا</a></li>
            <li class="nav-item">
                <form method="post" action="search.php" class="d-flex">
                    <input type="text" name="query" class="form-control search-bar" placeholder="بحث..." style="padding: none;">
                    <button type="submit" class="btn btn-success search-button"><i class="fas fa-search"></i></button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<center>
    <h3>الاشخاص المفقودين</h3>
</center>

<div class="container">
    <div class="row">
        <?php
        $result = mysqli_query($con, "SELECT * FROM found_people");
        while ($row = mysqli_fetch_array($result)) {
            echo "
            <div class='col-lg-4 col-md-6 col-sm-12 mb-6  roww'>
                <div class='card h-100'>
                    <img src='".$row['image']."' class='card-img-top' alt='...' onclick='openModal(this.src)'>
                    <div class='col-md-8'>
                        
                            <h5 class='card-title'>الاسم: ".$row['name']."</h5>
                            <p class='card-text'>الجنس: ".$row['gender']."</p>
                            <p class='card-text'>الوصف: ".$row['description']."</p>
                            <p class='card-text'>التاريخ: ".$row['date']."</p>
                            <p class='card-text'>مكان الفقد: ".$row['location']."</p>
                            <p class='card-text'>معلومات الاتصال: ".$row['contact']."</p>";
            if (isset($_SESSION['is_logged_in'])) {
                echo "
                            <div class='btn-group' role='group' aria-label='Basic example'>
                                <a href='edit_found_people.php?id=".$row['id']."' class='btn btn-primary btn-custom'>تعديل المنشور</a>
                                <form method='post' action='' style='display: inline;' onsubmit='return confirmDelete()'>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <input type='hidden' name='image' value='".$row['image']."'>
                                    <button type='submit' name='delete' class='btn btn-danger'>حذف المنشور</button>
                                </form>
                            </div>";
            }
            echo "
                        
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>

<footer>
    حقوق الطبع والنشر © 2024
</footer>

<script src="./js/jquery-3.7.1.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>

<!-- Modal للتكبير -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
<script>
    function toggleDropdown() {
        var dropdown = document.querySelector('.search-dropdown');
        dropdown.classList.toggle('show');
    }
    function openModal(src) {
        var modal = document.getElementById("imageModal");
        var modalImage = document.getElementById("modalImage");
        modal.style.display = "block";
        modalImage.src = src;
    }
    function closeModal() {
        var modal = document.getElementById("imageModal");
        modal.style.display = "none";
    }
    function confirmDelete() {
        return confirm('هل أنت متأكد من أنك تريد حذف هذا المنشور؟');
    }
</script>
</body>
</html>
