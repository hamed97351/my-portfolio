<?php
session_start();
include('config.php');

// Handle deletion
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $imagePath = $_POST['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
    mysqli_query($con, "DELETE FROM lost_vehicles WHERE id='$id'");
    header("Location: view_lost_vehicles.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المركبات المفقودة</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background: #f5f5f5;
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
        }

        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            transition: transform .2s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-body {
            background: #ffffff;
            padding: 18px;
            text-align: right;
        }

        .card-body p {
            margin-bottom: 6px;
            font-size: 15px;
        }

        .btn-custom {
            padding: 8px 20px;
            border-radius: 6px;
            font-size: 15px;
        }

        .modal-content {
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255,255,255,0.3);
        }

        footer {
            background: #004d40;
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg" style="background-color:#004d40;">
    <a class="navbar-brand" href="home_page.php">
        <img src="images/website/logo.png" alt="Logo" style="height:50px;">
    </a>
</nav>

<main class="container mt-4">
    <center><h3 class="mb-4">المركبات المفقودة</h3></center>

    <div class="row">
<?php
$result = mysqli_query($con, "SELECT * FROM lost_vehicles LIMIT 6");
$count = 0;

while ($row = mysqli_fetch_array($result)) {

    // افتح صف جديد كل 3 عناصر
    if ($count % 3 == 0 && $count != 0) {
        echo "</div><div class='row mt-4'>";
    }

    echo "
    <div class='col-lg-4 col-md-6 col-sm-12 mb-4'>
        <div class='card h-100 d-flex flex-column shadow-lg'>
            <img src='".$row['image']."' class='card-img-top' onclick='openModal(this.src)'>

            <div class='card-body flex-grow-1'>
                <h5 class='card-title fw-bold mb-3'>".$row['name']."</h5>

                <p><strong>نوع المركبة:</strong> ".$row['vehicle_type']."</p>
                <p><strong>رقم اللوحة:</strong> ".$row['plate_number']."</p>
                <p><strong>الشاسي:</strong> ".$row['chassis']."</p>
                <p><strong>الموديل:</strong> ".$row['model']."</p>
                <p><strong>اللون:</strong> ".$row['color']."</p>
                <p><strong>مكان الفقد:</strong> ".$row['location']."</p>
                <p><strong>التاريخ:</strong> ".$row['date']."</p>
                <p><strong>معلومات الاتصال:</strong> ".$row['contact']."</p>
            </div>

            <div class='mt-auto p-3 d-flex justify-content-between'>
                <a href='edit_lost_vehicles.php?id=".$row['id']."' class='btn btn-success btn-custom'>تعديل</a>

                <form method='post' action='' onsubmit='return confirmDelete()'>
                    <input type='hidden' name='id' value='".$row['id']."'>
                    <input type='hidden' name='image' value='".$row['image']."'>
                    <button type='submit' name='delete' class='btn btn-danger btn-custom'>حذف</button>
                </form>
            </div>
        </div>
    </div>";

    $count++;
}
?>
</div>

        
</main>

<a href='home_page.php' class='btn btn-dark d-block mx-auto mt-3' style='width:200px;'>عودة للرئيسية</a>

<footer>
    حقوق الطبع والنشر © 2024
</footer>

<!-- Modal -->
<div id='imageModal' class='modal' onclick='closeModal()'>
    <img class='modal-content' id='modalImage'>
</div>

<script>
function openModal(src) {
    document.getElementById('imageModal').style.display = 'block';
    document.getElementById('modalImage').src = src;
}

function closeModal() {
    document.getElementById('imageModal').style.display = 'none';
}

function confirmDelete() {
    return confirm('هل أنت متأكد من حذف هذا المنشور؟');
}
</script>

</body>
</html>
