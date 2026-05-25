<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- استدعاء ملف Bootstrap CSS مع دعم RTL -->
   <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- استدعاء مكتبة Font Awesome للأيقونات -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <!-- استدعاء ملف CSS المخصص -->
    <link href="home_page.css" rel="stylesheet">
    <title>اتصل بنا</title>
</head>
<body>
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg text-white  "style=background-color:#004d40  class="header">
        <a class="navbar-brand" href="home_page.php">
        <img src="images/website/logo.png" alt="Logo image" id="logo-img" class="d-inline-block align-top">
        </a>
        <!-- زر التبديل لشريط التنقل في الشاشات الصغيرة -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- عناصر شريط التنقل -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="home_page.php">الرئيسية</a></li>
               
                <li class="nav-item"><a class="nav-link" href="we.html">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="conncet.php">اتصل بنا</a></li>
               
                <li class="nav-item">
                    <input type="text" class="form-control search-bar" placeholder="بحث...">
                </li>
                <li class="nav-item">
                    <button class="btn btn-success search-button" onclick="search()">بحث</button>
                </li>
            </ul>
        </div>
    </nav>

    <?php 
    if(isset($_GET['message_submitted'])){

    
echo <<<_END
    <center style='padding-top:0%;background-color:white;margin-top:20%;margin-bottom:10%'>
    <span style='color:white'>تم ايصال رسالتك بنجاح .سيتم التواصل معك في أقرب فرصة.</span>
    </center>
       <!-- تذييل الصفحة -->
    <footer class="text-white text-center py-3"style=background-color:#004d40>
        <p>حقوق الطبع والنشر © 2024</p>
    </footer>
    <!-- استدعاء ملف Bootstrap JS -->
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
_END;
die();
    }
    ?>

    <!-- محتوى الصفحة -->
    <div class="container mt-4">
        <h2>اتصل بنا</h2>
        <p>نحن هنا لمساعدتك! يمكنك التواصل معنا عبر النموذج أدناه أو باستخدام معلومات الاتصال التالية.</p>
        <form action='insert_contact.php' method="post">
            <div class="form-group">
                <label for="name">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسمك">
            </div>
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="أدخل بريدك الإلكتروني">
            </div>
            <div class="form-group">
                <label for="message">الرسالة</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="أدخل رسالتك"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">إرسال</button>
        </form>
        <div class="contact-info mt-4">
            <h4>معلومات الاتصال</h4>
            <p><strong>البريد الإلكتروني:</strong> info@example.com</p>
            <p><strong>الهاتف:</strong> +123 456 7890</p>
            <p><strong>العنوان:</strong> شارع الملك فهد، الرياض، السعودية</p>
            <div id="map" style="height: 300px;"></div>
        </div>
    </div>
    <!-- تذييل الصفحة -->
    <footer class="text-white text-center py-3"style=background-color:#004d40>
        <p>حقوق الطبع والنشر © 2024</p>
    </footer>
    <!-- استدعاء ملف Bootstrap JS -->
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
