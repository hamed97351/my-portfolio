<?php 
session_start(); 
include('config.php'); 

// Check if the user is logged in
if (!isset($_SESSION['is_logged_in'])) {
    header("Location: login.php");
    exit;
}

// Fetch existing data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM lost_vehicles WHERE id='$id'");
    $row = mysqli_fetch_array($result);
    if (!$row) {
        echo "No record found!";
        exit;
    }
    // Allow admins and logged-in users to edit or delete the record
} else {
    header("Location: view_lost_vehicles.php");
    exit;
}

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $document_type = $_POST['vehicle_type'];
    $plate_number = $_POST['plate_number'];
    $chassis = $_POST['chassis'];
    $model = $_POST['model'];
    $color = $_POST['color'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $contact = $_POST['contact'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = "images/document/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        $image = $row['image'];
    }

    $query = "UPDATE lost_vehicles SET
              name = '$name',
              vehicle_type= '$vehicle_type',
              plate_number= '$plate_number',
              chassis= '$chassis',
              model= '$model',
              color= '$color',
              location= '$location',
              date= '$date',
              contact='$contact',
              image='$image'
              WHERE id='$id'";
    
    if (mysqli_query($con, $query)) {
        header("Location: view_lost_vehicles.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
}

// Handle deletion
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $imagePath = $_POST['image'];
    unlink($imagePath); // Delete the image file
    mysqli_query($con, "DELETE FROM lost_vehicles WHERE id='$id'");
    header("Location: view_lost_vehicles.php"); // Redirect after deletion
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>شاشة البحث عن المفقودات</title>
    <link rel="stylesheet" href="display.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
                   .laa{
            background-color: #004d40; 
            color: white;
        }
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
    </style>
</head>
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
        <h2 class="text-center mt-4">تعديل المركبات المفقودة</h2>
        <form action="" method="post" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="form-group" style="display: flex; gap: 10px;">
<div style="flex: 1;">
                <label for="name">اسم الشركة</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            </div>

          
        <div style="flex: 1;">
                <label for="vehicle_type">نوع المركبة</label>
                <input type="text" name="vehicle_type" class="form-control" value="<?php echo $row['vehicle_type']; ?>" required>
            </div>
         
        <div style="flex: 1;">
                <label for="plate_number">رقم اللوحة</label>
                <textarea name="plate_number" class="form-control" required><?php echo $row['plate_number']; ?></textarea>
            </div>
</div>



<div class="form-group" style="display: flex; gap: 10px;">
<div style="flex: 1;">
                <label for="chassis">رقم الشاسي</label>
                <input type="text" name="chassis" class="form-control" value="<?php echo $row['chassis']; ?>" required>
            </div>
            <div style="flex: 1;">
                <label for="model">الموديل</label>
                <input type="text" name="model" class="form-control" value="<?php echo $row['model']; ?>" required>
            </div>
            <div style="flex: 1;">
                <label for="color">اللون</label>
                <input type="text" name="color" class="form-control" value="<?php echo $row['color']; ?>" required>
            </div>

</div>
            <div class="form-group" style="display: flex; gap: 10px;">
            <div style="flex: 1;">
                <label for="location">مكان الفقد</label>
                <input type="text" name="location" class="form-control" value="<?php echo $row['location']; ?>" required>
            </div>
            <div style="flex: 1;">
                <label for="date">التاريخ</label>
                <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
            </div>
         
            <div style="flex: 1;">
            <label for="contact"  class="lab">معلومات الاتصال</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required>
            </div>

            </div>

            <div class="form-group">
                <label for="image">صورة</label>
                <input type="file" name="image" class="form-control">
                <img src="<?php echo $row['image']; ?>" width="100" alt="Image">
            </div>
            <button type="submit" name="update" class="btn btn-primary btn-block laa ">تحديث</button>
        </form>
    </div>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
