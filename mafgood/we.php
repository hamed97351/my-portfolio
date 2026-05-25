<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="home_page.css" rel="stylesheet">
   
 <!-- استدعاء ملف Bootstrap CSS مع دعم RTL -->
 <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <!-- استدعاء مكتبة Font Awesome للأيقونات -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <!-- استدعاء ملف CSS المخصص -->
 
    <title>من نحن</title>
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
    <!-- محتوى الصفحة -->
    <div class="container mt-4">
        <h2>من نحن</h2>
        <p>مرحبًا بكم في موقع مشروع تخرجنا! نحن مجموعة من الطلاب من [جامعة النيلين]، ونسعى من خلال هذا المشروع إلى تقديم حلول مبتكرة في مجال [المفقودات].</p>
        
        <h3>هدف المشروع</h3>
        <p>يهدف مشروعنا إلى [ايجاد المفقودات] الذي يساعد في [ارجاع ممتكلات الناس وكذلك في ايجاد من فقد احبايه ].</p>
        
        <h3>أعضاء الفريق</h3>
        <ul>
            <li>الاسم: [ابراهيم مصطفى عبدالله] - التخصص: [تقانة معلومات] </li>
            <li>الاسم: [حامد احمد حامد] - التخصص: [تقانة معلومات] </li>
            <li>الاسم: [حسن زروق] - التخصص: [تقانة معلومات] </li>
            <li>الاسم: [محمد خضر ] - التخصص: [تقانة معلومات] </li>
            <li>الاسم: [مصطفى محمد مصطفى] - التخصص: [تقانة معلومات] </li>
        </ul>
        
        <h3>الجامعة</h3>
        <p>نحن طلاب في جامعة [جامعة النيلين]، ونتطلع إلى تقديم هذا المشروع كجزء من متطلبات التخرج.</p>
        
        <h3>التحديات والإنجازات</h3>
        <p>واجهنا العديد من التحديات خلال تطوير هذا المشروع، مثل [ضيق الوقت ]، ولكن بفضل العمل الجماعي والتوجيه من أساتذتنا، تمكنا من تحقيق [من اكمال المشروع].</p>
        
        <h3>الشكر والتقدير</h3>
        <p>نتوجه بالشكر الجزيل إلى أساتذتنا ومشرفتنا الذين قدموا لنا الدعم والإرشاد طوال فترة المشروع.</p>
    </div>
    <!-- تذييل الصفحة -->
    <footer class="text-white text-center py-3" style="background-color:#004d40">
        <p>حقوق الطبع والنشر © 2024</p>
    </footer>
    <!-- استدعاء ملفات JavaScript -->
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
