<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config.php');

if(isset($_POST['upload'])){
    $NAME = $_post['name'];
    $other_type = $_post['other_type'];
    $DESCRIPTION = $_POST['description'];
    $date = $_POST['date'];
    $location = $_POST['loction_found']; // تم التصحيح ليتطابق مع نموذج HTML
    $CONTACT = $_POST['contact'];
    $IMAGE = $_FILES['image'];


        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "images/" . $image_name;
        
        $insert = "INSERT INTO found_others (name , other_type, description, date, location, contact, image) VALUES (   '$NAME', '$OTHER_TYPE', '$DESCRIPTION', '$date', '$location', '$CONTACT', '$image_up')";
        mysqli_query($con, $insert);
        if(move_uploaded_file($image_location, $image_up)){
            echo "<script>alert('تم رفع البيانات بنجاح!')</script>";
        } else {
            echo "<script>alert('لم يتم الرفع')</script>";
        }
    
    header('Location:view_found_others.php');
    exit(); // تأكد من توقف تنفيذ الكود بعد إعادة التوجيه
}
?>
