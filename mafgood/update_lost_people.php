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
    $result = mysqli_query($con, "SELECT * FROM lost_people WHERE id='$id'");
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
    header("Location: view_lost_people.php");
    exit;
}

// Handle update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $location_lost = $_POST['location_lost'];
    $contact = $_POST['contact'];
 


    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image = "images/document/" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    } else {
        $image = $row['image'];
    }

    $query = "UPDATE lost_people SET
              name='$name',
              gender='$gender',
              description='$description',
              date='$date',
              location_lost='$location_lost',
              contact='$contact',
              image='$image'
              WHERE id='$id'";
    
    if (mysqli_query($con, $query)) {
        header("Location: view_lost_people.php");
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
    mysqli_query($con, "DELETE FROM lost_people WHERE id='$id'");
    header("Location: view_lost_people.php"); // Redirect after deletion
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
                <label for="name">الاسم</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">الجنس</label>
                <input type="text" name="gender" class="form-control" value="<?php echo $row['gender']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">الوصف</label>
                <textarea name="description" class="form-control" required><?php echo $row['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="date">التاريخ</label>
                <input type="date" name="date" class="form-control" value="<?php echo $row['date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="location_lost">الموقع</label>
                <input type="text" name="location_lost" class="form-control" value="<?php echo $row['location_lost']; ?>" required>
            </div>
            <div class="form-group">
                <label for="contact">معلومات الاتصال</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required>
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
