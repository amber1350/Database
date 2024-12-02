<?php
session_start();
include '../register/conn.php';

if (!isset($_SESSION['userID'])) {
    echo "<script>location.replace('login.php');</script>";
    exit;
} else {
    $userID = $_SESSION['userID'];
}

$mysqli = new mysqli($host, $user, $pw, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$userQuery = "SELECT userID, firstName, lastName, mobile, back_flight FROM userTBL WHERE userID = '$userID'";
$userResult = mysqli_query($mysqli, $userQuery);
if (!$userResult) {
    die("Query failed: " . mysqli_error($mysqli));
}
$userInfo = mysqli_fetch_assoc($userResult);

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

?>
<!DOCTYPE html>
<html>
<head>
    <title>My Page</title>
    <style>
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
            margin: 0; 
            /* background: linear-gradient(to bottom, #A8D1FF, #558BCF); */
            background: url('../main/images/airplane1.jpg') no-repeat center center/cover;

        }

        .container {
            text-align: center;
            width: 800px;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
        }
        h2 {
            font-size: 28px
            margin-bottom: 20px;
            color: #558BCF;
        }
        p {
            font-size: 18px;
            margin: 10px 0;
            color: #333333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        table th {
            background-color: #558BCF;
            color: white;
        }
        .back-btn {
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 16px;
            color: white;
            background-color: #558BCF;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background-color: #426BAF;
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
        <?php else: ?>
            <p>No user information found.</p>
        <?php endif; ?>
        <br>
        <br><h2>Booked Flights</h2>
        <?php if (mysqli_num_rows($bookingResult) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Flight ID</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Departure Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($bookingResult)): ?>
                        <tr>
                            <td><?php echo $row['flightID']; ?></td>
                            <td><?php echo $row['from_reg']; ?></td>
                            <td><?php echo $row['to_reg']; ?></td>
                            <td><?php echo $row['dep_date']; ?></td>
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
