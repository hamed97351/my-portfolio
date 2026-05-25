<?php
session_start();
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $name= $_POST['name'];
    $message = $_POST['message'];
    // Hash the password for security

    $sql = "INSERT INTO CONTACT_US(name ,email ,message) values('$name' ,'$email' ,'$message')";
    
    $result = mysqli_query($conn,$sql);
    
        header("Location:connect.php?message_submitted=true");
    
}

$conn->close();
?>
