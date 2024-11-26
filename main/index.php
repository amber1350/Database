<?php
session_start();
if(!isset($_SESSION['userID'])) {
    echo "<script>location.replace('login.php');</script>";   
    exit;         
}
else {
    $userID = $_SESSION['userID'];
    $name = $_SESSION['name'];
    //exit;
} 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .base {
            text-align: center;
        }
        h2 {
            margin-bottom: 50px;
        }
        .btn-large {
            display: inline-block;
            padding: 20px 40px;
            font-size: 24px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 50px;
        }
        .btn-large:hover {
            background-color: #45a049;
        }
        .logout-btn {
            position: absolute;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #f44336;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
    <div class="base">
        <h2><?php echo "Hello, $name"; ?></h2>
        <button type="button" class="btn-large" onclick="location.href='insert_flight_info.php'">
            Search for Airline
        </button>
    </div>
    <button type="button" class="logout-btn" onclick="location.href='../register/logout.php'">
        LOGOUT
    </button>
</body>
</html>
