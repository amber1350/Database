<?php
session_start();
include '../register/conn.php';

$mysqli = new mysqli($host, $user, $pw, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$userID = $_SESSION['userID'];
$dep_date = $_POST['DepartureDate'];
$arr_date = $_POST['ArrivalDate'];
$from_reg = $_POST['from'];
$p_111 = $_POST['first'];
$p_11 = $_POST['second'];
$p_1 = $_POST['third'];


$recommendation = shell_exec("/Library/Frameworks/Python.framework/Versions/3.9/bin/python3 recommendation.py $p_111 $p_11 $p_1");
$result = json_decode($recommendation, true);

if (!$result || !isset($result['1st'], $result['2nd'], $result['3rd'])) {
    die("Error: Could not retrieve recommendations. Check Python script output.");
}

$first_recom = $result['1st'];
$second_recom = $result['2nd'];
$third_recom = $result['3rd'];

$first_url = "images/" . $first_recom . ".jpg";
$second_url = "images/" . $second_recom . ".jpg";
$third_url = "images/" . $third_recom . ".jpg";

$q1 = "INSERT INTO travelTBL (userID, from_reg, dep_date, arr_date, recom_reg)
       VALUES ('$userID', '$from_reg', '$dep_date', '$arr_date', null)
       ON DUPLICATE KEY UPDATE
       from_reg = '$from_reg',
       dep_date = '$dep_date',
       arr_date = '$arr_date',
       recom_reg = null";
$r1 = mysqli_query($mysqli, $q1);
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Recommend</title>
   <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('images/sky4.jpg') no-repeat center center/cover;
        }
        
        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 60px;
            border-radius: 5px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 1500px;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 32px;
            color: #558BCF;
        }
        text {
            margin-bottom: 15px;
            font-size: 26px;
            color: #558BCF;
            transition: transform 0.3s ease;

        }

        .recommendation {
            display: flex;
            justify-content: space-between;
            gap: 40px;
        }
        .recommendation button {
            border: none;
            background: none;
            cursor: pointer;
        }
        .recommendation img {
            width: 450px;
            height: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .recommendation img:hover {
            transform: scale(1.05);
        }
    
   </style>
</head>
<body>
    <div class="container">
        <h2><?php echo "Recommendations for you to travel Japan are:"; ?></h2><br><br>
        <div class="recommendation">
            <button onclick="location.href='search_flight.php?recom_reg=<?php echo urlencode($first_recom); ?>&dep_date=<?php echo urlencode($dep_date); ?>&arr_date=<?php echo urlencode($arr_date); ?>&from_reg=<?php echo urlencode($from_reg); ?>'">
                <img src="<?php echo $first_url; ?>" alt="1st Recommendation">
                <text><p><?php echo "Flight for $first_recom"; ?></p></text>

            </button>
            <button onclick="location.href='search_flight.php?recom_reg=<?php echo urlencode($second_recom); ?>&dep_date=<?php echo urlencode($dep_date); ?>&arr_date=<?php echo urlencode($arr_date); ?>&from_reg=<?php echo urlencode($from_reg); ?>'">
                <img src="<?php echo $second_url; ?>" alt="2nd Recommendation">
                <text><p><?php echo "Flight for $second_recom"; ?></p></text>

            </button>
            <button onclick="location.href='search_flight.php?recom_reg=<?php echo urlencode($third_recom); ?>&dep_date=<?php echo urlencode($dep_date); ?>&arr_date=<?php echo urlencode($arr_date); ?>&from_reg=<?php echo urlencode($from_reg); ?>'">
                <img src="<?php echo $third_url; ?>" alt="3rd Recommendation">
                <text><p><?php echo "Flight for $third_recom"; ?></p></text>

            </button>
        </div>
    </div>
</body>
</html>
