<?php
session_start();


    if(isset($_SESSION['is_logged_in']))
    {

    
        $_SESSION = array();
     
    }
    header("Location: home_page.php");
$conn->close();
?>
