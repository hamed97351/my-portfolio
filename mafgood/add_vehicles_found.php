<?php session_start();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- استدعاء ملف Bootstrap CSS مع دعم RTL -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- استدعاء مكتبة Font Awesome للأيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- استدعاء ملف CSS المخصص -->
    <link rel="stylesheet" href="display.css">
    <title>اضافة مركبات</title>
<style>
         .laa{
            background-color: #004d40; 
            color: white;
        }
    .lab{
    

    width: 150px;
}
</style>
 
    <script>
        function validateForm() {
            // يمكنك إضافة أي تحقق إضافي هنا إذا لزم الأمر
            alert('تم رفع البيانات بنجاح!');
            return true; // تأكد من إعادة true للسماح بإرسال النموذج
        }
    </script>
</head>
<body>
   <!-- شريط التنقل -->
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
           
            <li>
            <li class="nav-item">
            <form  method="post" action="search.php" class="d-flex">
                        <input type="text" name="query" class="form-control search-bar" placeholder="بحث..." style="padding:nane">

    </li>
    
                        <button type="submit" class="btn btn-success search-button"><i class="fas fa-search"></i></button>
    
                    </form>
            </li>
        </ul>
    </div>
</nav>
<?php
if(!isset($_SESSION['is_logged_in']))
    {
echo <<<_END
        <center style='padding-top:15%'>
            <span>يجب عليك تسجيل الدخول للمتابعه.</span>
            <div class='d-flex justify-space-between' style='padding-right:43%'>
            <a class="nav-link" href="login.html">  تسجيل دخول  &nbsp</a>
            <span class="" style='text-decoration: none;'>|</span> 
            <a class="nav-link" href="register.php.html" > &nbsp تسجيل حساب جديد &nbsp</a> 
            </div>
        </center>
_END;
die();
    }
?>
    <div class="container">
        <div class="form-title">ادخل بيانات المركبات</div>
        <form action="insert_vehicles_found.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">


        <div class="form-group" style="display: flex; gap: 10px;">
        <div style="flex: 1;">
                <label for="name">اسم المركبة</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div style="flex: 1;">
                <label for="name">اسم الشركة </label>
                <input type="text" id="vehicle_type" name="vehicle_type">
            </div>

            <div style="flex: 1;">
                <label for="plate_number">رقم اللوحة</label>
                <input type="text" id="plate_number" name="plate_number">
            </div>
        </div>


        <div class="form-group" style="display: flex; gap: 10px;">
        <div style="flex: 1;">
                <label for="shassi">رقم الشاسي</label>
                <input type="text" id="chassis" name="chassis" >
            </div>
            <div style="flex: 1;">
                <label for="model">الموديل</label>
                <input type="text" id="model" name="model"required>
            </div>

            <div style="flex: 1;">
                <label for="color">اللون</label>
                <input type="text" id="color" name="color">
            </div>

        </div>


            <div class="form-group" style="display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label for="location">مكان الفقد</label>
                <input type="text" id="location" name="loction_found" required> <!-- تأكد من تطابق الاسم مع الكود PHP -->
            </div>
            <div style="flex: 1;">
                <label for="date">التاريخ</label>
                <input type="date" id="date" name="date" required>
            </div>

            <div style="flex: 1;">
                <label for="contact" class="lab">معلومات الاتصال</label>
                <input type="text" id="contact" name="contact" required>
            </div>

            </div>





            <div>
                <label for="image">اضغط لاختيار صورة الموجود</label>
                <input type="file" id="image" name="image">
            </div>

            <div>
                <button type="submit" name="upload" class="laa">رفع البيانات</button> <!-- تأكد من وجود الاسم "upload" -->
            </div>


        </form>
   


    </div>



    <footer>
        حقوق الطبع والنشر © 2024
    </footer>
    <!-- استدعاء ملفات JavaScript الخاصة بـ Bootstrap -->
    <script src="./js/jquery-3.7.1.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        function toggleDropdown() {
            var dropdown = document.querySelector('.search-dropdown');
            dropdown.classList.toggle('show');
        }
    </script>
</body>
</html>
