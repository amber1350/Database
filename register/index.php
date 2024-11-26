<?php
session_start();
if(!isset($_SESSION['userID'])) {
    echo "<script>location.replace('login.php');</script>";   
    exit;         
}
else {
    $userID = $_SESSION['userID'];
    $name = $_SESSION['name'];
    echo "<script>location.replace('../main/index.php');</script>";
} 
?>
