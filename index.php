<?php
session_start();
if(!isset($_SESSION['userID'])) {
    echo "<script>location.replace('login.php');</script>";   
    exit;         
}
else {
    $userID = $_SESSION['userID'];
    $name = $_SESSION['name'];
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome!!!!!!!!!</title>
</head>
<body>
    <div class="base">
        <h2><?php echo "Hello, $name";?></h2>
        <button type="button" class="btn" onclick="location.href='logout.php'">
            LOGOUT
        </button>
    </div>
</body>
</html>