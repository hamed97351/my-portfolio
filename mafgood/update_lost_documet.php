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
    $result = mysqli_query($con, "SELECT * FROM lost_document WHERE id='$id'");
    $row = mysqli_fetch_array($result);
    if (!$row) {
        echo "No record found!";
        exit;
    }
    // Allow only if the user is an admin or the user who added the record
    if ($_SESSION['is_admin'] != 'admin' && $row['user_id'] != $_SESSION['user_id']) {
        echo "You do not have permission to edit or delete this record!";
        exit;
    }
} else {
    header("Location: view_lost_document.php");
    exit;
}

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $document_type = $_POST['document_type'];
    $document_number = $_POST['document_number'];
    $date_lost = $_POST['date_lost'];
    $contact = $_POST['contact'];
    $location_lost = $_POST['location_lost'];
    $description = $_POST['description'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = "images/document/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        $image = $row['image'];
    }

    $query = "UPDATE lost_document SET
              document_type='$document_type',
              document_number='$document_number',
              date_lost='$date_lost',
              contact='$contact',
              location_lost='$location_lost',
              description='$description',
              image='$image'
              WHERE id='$id'";
    
    if (mysqli_query($con, $query)) {
        header("Location: view_lost_document.php");
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
    mysqli_query($con, "DELETE FROM lost_document WHERE id='$id'");
    header("Location: view_lost_document.php"); // Redirect after deletion
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الوثيقة المفقودة</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">تعديل الوثيقة المفقودة</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="document_type">نوع الوثيقة</label>
                <input type="text" name="document_type" class="form-control" value="<?php echo $row['document_type']; ?>" required>
            </div>
            <div class="form-group">
                <label for="document_number">رقم الوثيقة</label>
                <input type="text" name="document_number" class="form-control" value="<?php echo $row['document_number']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date_lost">التاريخ</label>
                <input type="date" name="date_lost" class="form-control" value="<?php echo $row['date_lost']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">معلومات الاتصال</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required>
            </div>
            <div class="form-group">
                <label for="location_lost">الموقع</label>
                <input type="text" name="location_lost" class="form-control" value="<?php echo $row['location_lost']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" class="form-control" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">صورة</label>
                <input type="file" name="image" class="form-control">
                <img src="<?php echo $row['image']; ?>" width="100" alt="Document Image">
            </div>
            <button type="submit" name="update" class="btn btn-primary btn-block">تحديث</button>
        </form>
    </div>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
