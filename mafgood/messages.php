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
    <title>الصفحة الرئيسية</title>
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
                
                <?php
                if(isset($_SESSION['is_logged_in']) )
                {
                    if($_SESSION['is_admin'] =='admin')
                    {

                        echo <<<_END
                        <li class="nav-item"><a class="nav-link" href="messages.php">الرسائل</a></li>
                        _END;

                    }else
                    {
                     
                    echo <<<_END
                    <li class="nav-item"><a class="nav-link" href="connect.php">اتصل بنا</a></li>
_END;   
                    }
                }else
                {
                    echo <<<_END
                    <li class="nav-item"><a class="nav-link" href="connect.php">اتصل بنا</a></li>
_END;
                }

                ?>
                <!-- <li class="nav-item search-dropdown">
                    <button class="btn btn-success search-button" onclick="toggleDropdown()">بحث عن</button>
                    <div class="search-dropdown-content">
                        <a href="cars.html">سيارات</a>
                        <a href="documents.html">أوراق</a>
                        <a href="people.html">أشخاص</a>
                    </div>
                </li> -->
                <li class="nav-item">
                    <form method='post' action='search.php'>
                    <input type="text" class="form-control search-bar" name='keyword' id='keyword' placeholder="بحث...">
                </li>

                <li class="nav-item">
                    <button class="btn btn-success search-button" type='submit'><i class="fas fa-search"></i></button>
                </li>
</form>
            </ul>
        </div>
        <div class="auth-links d-flex justify-content-between" style='color:white'>
        <?php if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'])
        {
            $email = $_SESSION["email"];
            echo <<<_END
<span class='nav-link' href='#'>&nbsp&nbsp&nbsp Welcome $email | <a href='logout.php'>logout</a>  </span>
_END;
        }
    else
    {
echo <<<_END
       <a class="nav-link" href="login.html">  تسجيل دخول  &nbsp</a>
            <span class="" style='text-decoration: none;'>|</span> 
            <a class="nav-link" href="register.php.html" > &nbsp تسجيل حساب جديد &nbsp</a> 
_END;
    }
        ?>
        
        </div>
    </nav>
    <div class="container">
        <div class="content">
        <table>
            <tr>
                <th>
                    <th>الاسم</th>
                    <th>الايميل</th>
                    <th>الرسالة</th>
                </th>
            </tr>

            <?php

$host = "localhost";
$user = "root";
$password = "";
$database = "hawja";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select * from contact_us";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result ,MYSQLI_ASSOC) ;

    
    for($i=0 ;$i < $result->num_rows;$i++)
    {
            echo "<tr><td></td>";
            echo "<td>" . $row['name'] . "</td>".
             "<td>" . $row['email'] . "</td>".
             "<td>" . $row['message'] . "</td>".
             
            "</tr>";
            $row = mysqli_fetch_array($result ,MYSQLI_ASSOC) ;
    }
    if($result->num_rows == 0)
    {
        echo "<tfoot><td>No result found </td> </tfoot>";
    }



            ?>

        </table>
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
