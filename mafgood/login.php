<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "hawja";

// Create connection
$con = new mysqli($host, $user, $password, $database);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = hash('sha256', $password);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashed_password'";
    
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['is_logged_in'] = true;
        $_SESSION['is_admin'] = ($row['type'] === 'admin'); // تحديد إذا كان المستخدم إداريًا بناءً على عمود type

        header("Location: add_found&lost.php");
    } else {
        echo "البريد الإلكتروني أو كلمة المرور غير صحيحة";
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <title>تسجيل الدخول</title>
    <style>
        body {
            background-color: #f8f9fa;
            direction: rtl;
            text-align: right;
            margin: 10px;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .bottom-text {
            text-align: center;
            margin: 10px;
            padding: 10px;
        }
    </style>
     
</head>
<body>

    <div class="login-container">
        <img src="images/website/logo.png" alt="Profile Picture">
        <h2 class="text-center">تسجيل الدخول</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">الدخول</button>
        </form>

        <div class="bottom-text">
            <span>ليس لديك حساب؟</span>
            <a href="register.php">تسجيل</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
