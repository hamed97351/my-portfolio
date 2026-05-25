<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config.php');

if(isset($_POST['upload'])){
    $TYPE_CAR = $_POST['name'];
    $TYPE_CAR = $_POST['vehicle_type']; // تم التحديث ليتطابق مع نموذج HTML
    $PLATE_NUMBER = $_POST['plate_number'];
    $CHASSIS = $_POST['chassis'];
    $MODEL = $_POST['model'];
    $COLOR = $_POST['color'];
    $LOCATION = $_POST['loction_lost']; // تم التصحيح ليتطابق مع نموذج HTML
    $DATE = $_POST['date'];
    $CONTACT = $_POST['contact'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/" . $image_name;
    
    $insert = "INSERT INTO lost_vehicles (vehicle_type, plate_number, chassis, model, color, location, date, contact, image) VALUES ('$vehicle_type', '$PLATE_NUMBER', '$CHASSIS', '$MODEL', '$COLOR', '$location', '$date', '$CONTACT', '$image_up')";
    mysqli_query($con, $insert);
    if(move_uploaded_file($image_location, $image_up)){
        echo "<script>alert('تم رفع البيانات بنجاح!')</script>";
    } else {
        echo "<script>alert('لم يتم الرفع')</script>";
    }
    header('Location:view_lost_vehicles.php');
    exit(); // تأكد من توقف تنفيذ الكود بعد إعادة التوجيه
}
?>
