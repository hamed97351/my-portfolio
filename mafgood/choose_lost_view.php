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
    <title>الصفحة الرئيسية</title>
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
<div class="container">
    <div class="content">
        <div class="box">
         <div class="label">اختار نوع المفقودات</div>
            <div class="sub-box">
                <a href="view_lost_people.php">
                    <img src="images/website/view_lost_people.png" alt="عرض الاشخاص المفقودين" class="full-image">
                    
                </a>
                
                <a href="view_lost_vehicles.php">
                    <img src="images/website/view_lost_vehicles.png" alt="عرض المركبات المفقودة" class="full-image">
                   
                </a>
                
                <a href="view_lost_document.php">
                    <img src="images/website/view_lost_id.png" alt="عرض الوثائق المفقودة" class="full-image">
                  
                </a>
                <a href="view_lost_others.php">
                    <img src="images/website/view_lost_others.png" alt="عرض المقتنيات الاخرى " class="full-image">
                 
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
