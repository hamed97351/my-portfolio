<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('config.php');

if(isset($_POST['upload'])){
    $TYPE_DOCUMENT = $_POST['document_type']; // تم التحديث ليتطابق مع نموذج HTML
    $DOCUMENT_NUMBER = $_POST['document_number'];
    $DATE = $_POST['date'];
    
    $CONTACT = $_POST['contact'];
    $LOCATION = $_POST['loction']; // تم التصحيح ليتطابق مع نموذج HTML
  
    $descriptionRIPTION = $_POST['descriptionription'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $image_up = "images/" . $image_name;
    
    $insert = "INSERT INTO found_document (document_type, document_number, date,  contact, location,  description, image) VALUES ('$DOCUMENT_TYPE', '$DOCUMENT_NUMBER',  '$DATE', '$CONTACT', '$LOCATION',  '$descriptionRIPTION', '$image_up')";
    mysqli_query($con, $insert);
    if(move_uploaded_file($image_location, $image_up)){
        echo "<script>alert('تم رفع البيانات بنجاح!')</script>";
    } else {
        echo "<script>alert('لم يتم الرفع')</script>";
    }
    header('Location:view_found_document.php');
    exit(); // تأكد من توقف تنفيذ الكود بعد إعادة التوجيه
}
?>
