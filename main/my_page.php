<?php
session_start();
include '../register/conn.php'; // DB 연결 파일 포함

if (!isset($_SESSION['userID'])) {
    echo "<script>location.replace('login.php');</script>";
    exit;
} else {
    $userID = $_SESSION['userID'];
}

// DB 연결
$mysqli = new mysqli($host, $user, $pw, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// 사용자 정보 가져오기
$userQuery = "SELECT userID, firstName, lastName, mobile, back_flight FROM userTBL WHERE userID = '$userID'";
$userResult = mysqli_query($mysqli, $userQuery);
if (!$userResult) {
    die("Query failed: " . mysqli_error($mysqli));
}
$userInfo = mysqli_fetch_assoc($userResult);

// 예매 항공 정보 가져오기
$bookingQuery = "
    SELECT
        userTBL.go_flight AS flightID,
        flightTBL.from_reg,
        flightTBL.to_reg,
        flightTBL.dep_date
    FROM
        userTBL
    JOIN
        flightTBL
    ON
        userTBL.go_flight = flightTBL.flightID
    WHERE
        userTBL.userID = '$userID'
    UNION
    SELECT
        userTBL.back_flight AS flightID,
        flightTBL.from_reg,
        flightTBL.to_reg,
        flightTBL.dep_date
    FROM
        userTBL
    JOIN
        flightTBL
    ON
        userTBL.back_flight = flightTBL.flightID
    WHERE
        userTBL.userID = '$userID'
";
$bookingResult = mysqli_query($mysqli, $bookingQuery);

// back_flight 업데이트 (GET 파라미터 기반)
if (isset($_GET['flightID'])) {
    $back_flightID = mysqli_real_escape_string($mysqli, $_GET['flightID']);
    $updateQuery = "UPDATE userTBL SET back_flight = '$back_flightID' WHERE userID = '$userID'";
    if (mysqli_query($mysqli, $updateQuery)) {
        echo "<script>alert('Return flight successfully updated!');</script>";
    } else {
        echo "<script>alert('Failed to update return flight: " . mysqli_error($mysqli) . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333333;
        }
        p {
            font-size: 18px;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        .back-btn {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>My Information</h2>
        <?php if ($userInfo): ?>
            <p><strong>User ID:</strong> <?php echo $userInfo['userID']; ?></p>
            <p><strong>First Name:</strong> <?php echo $userInfo['firstName']; ?></p>
            <p><strong>Last Name:</strong> <?php echo $userInfo['lastName']; ?></p>
            <p><strong>Mobile:</strong> <?php echo $userInfo['mobile']; ?></p>
            <p><strong>Return Flight ID:</strong> <?php echo $userInfo['back_flight'] ?: 'Not set'; ?></p>
        <?php else: ?>
            <p>No user information found.</p>
        <?php endif; ?>
        
        <h2>Booked Flights</h2>
        <?php if (mysqli_num_rows($bookingResult) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Flight ID</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($bookingResult)): ?>
                        <tr>
                            <td><?php echo $row['flightID']; ?></td>
                            <td><?php echo $row['from_reg']; ?></td>
                            <td><?php echo $row['to_reg']; ?></td>
                            <td><?php echo $row['dep_date']; ?></td>
                            <td>
                                <a href="my_page.php?flightID=<?php echo $row['flightID']; ?>">Set as Return Flight</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No flight bookings found.</p>
        <?php endif; ?>

        <button class="back-btn" onclick="location.href='index.php'">Back to Home</button>
    </div>
</body>
</html>
