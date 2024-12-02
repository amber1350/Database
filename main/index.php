<?php
session_start();
if (!isset($_SESSION['userID'])) {
    echo "<script>location.replace('login.php');</script>";
    exit;
} else {
    $userID = $_SESSION['userID'];
    $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        /* Global Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('images/airplane1.jpg') no-repeat center center/cover;
            color: #ffffff;
            opacity: 0;
            animation: fadeIn 1s ease-in forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.4);
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        h1 {
            font-size: 70px;
            font-weight: 500;
            margin-bottom: 50px;
            color: white;
        }

        .btn {
            display: inline-block;
            width: 300px;
            padding: 15px;
            margin: 10px 10px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            background-color: #558BCF;
            border: none;
            border-radius: 30px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background-color: #426BAF;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .logout-btn {
            display: block;
            margin: 20px auto 0;
            font-size: 16px;
            color: white;
            background: none;
            border: none;
            cursor: pointer;
        }

        .logout-btn:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo "Hello, $name"; ?></h1>
        <button class="btn" onclick="location.href='insert_info.php'">Travel to Japan</button>
        <button class="btn" onclick="location.href='my_page.php'">My Page</button><br><br>
        <button class="logout-btn" onclick="location.href='../register/logout.php'">Logout</button>
    </div>
</body>
</html>
