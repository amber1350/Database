<?php
session_start();
include '../register/conn.php';
$mysqli = new mysqli($host, $user, $pw, $db_name); //db conncection
   
   $userID = $_SESSION['userID'];

   $dep_date = $_POST['DepartureDate'];
   $arr_date = $_POST['ArrivalDate'];
   $from_reg = $_POST['from'];
   $p_111 = $_POST['first'];
   $p_11 = $_POST['second'];
   $p_1 = $_POST['third'];
   
   $recommendation = shell_exec("python3 recommendation.py $p_111 $p_11 $p_1");
   $result = json_decode($recommendation, true);
   $first_recom = $result['1st'];
   $second_recom = $result['2nd'];
   $third_recom = $result['3rd'];

   $first_url = "images/" . $first_recom . ".jpg";
   $second_url = "images/" . $second_recom . ".jpg";
   $third_url = "images/" . $third_recom . ".jpg";
   
   $q1 = "INSERT INTO travelTBL (userID, from_reg, dep_date, arr_date, recom_reg)  
            VALUES('$userID', '$from_reg', '$dep_date', '$arr_date', null) 
            ON DUPLICATE KEY UPDATE 
             from_reg='$from_reg',
             dep_date='$dep_date',
             arr_date='$arr_date',
             recom_reg=null";
   $r1 = mysqli_query($mysqli, $q1);
   
   
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title>Recommend</title>
   <style>
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
    </style>
</head>
<body>
    <div class="base">
        <h2><?php echo "Recommendations for you to travel Japan are <br>1st - $first_recom <br>2nd - $second_recom <br>3rd - $third_recom"; ?></h2>
        <p>Search the flight for recommended places</p>
        <button type="button" class="first" onclick="location.href='search_flight.php?recom_reg=<?php echo urlencode($first_recom); ?>
            &dep_date=<?php echo urlencode($dep_date); ?>
            &arr_date=<?php echo urlencode($arr_date); ?>
            &from_reg=<?php echo urlencode($from_reg); ?>'">
            <img src="<?php echo $first_url; ?>" alt="Flight Icon" style="width:400px; height:300px; vertical-align:middle;">    
            <br>
            <?php echo "Flight for $first_recom";?>
        </button>
        <button type="button" class="second" onclick="location.href='search_flight.php?recom_reg=<?php echo urlencode($second_recom); ?>
            &dep_date=<?php echo urlencode($dep_date); ?>
            &arr_date=<?php echo urlencode($arr_date); ?>
            &from_reg=<?php echo urlencode($from_reg); ?>'">
            <img src="<?php echo $second_url; ?>" alt="Flight Icon" style="width:400px; height:300px; vertical-align:middle;">
            <br>
            <?php echo "Flight for $second_recom";?>
        </button>
        <button type="button" class="third" onclick="location.href='search_flight.php?recom_reg=<?php echo urlencode($third_recom); ?>
            &dep_date=<?php echo urlencode($dep_date); ?>
            &arr_date=<?php echo urlencode($arr_date); ?>
            &from_reg=<?php echo urlencode($from_reg); ?>'">
            <img src="<?php echo $third_url; ?>" alt="Flight Icon" style="width:400px; height:300px; vertical-align:middle;">
            <br>
            <?php echo "Flight for $third_recom";?>
        </button>
    </div>
</body>
</html>