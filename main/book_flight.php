<?php
    session_start();
    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
        $back_flightID = $_GET['flightID'];
    }

    include '../register/conn.php';
    $mysqli = new mysqli($host, $user, $pw, $db_name);
    
    $back_flightID = mysqli_real_escape_string($mysqli, $back_flightID);
    $userID = mysqli_real_escape_string($mysqli, $userID);
    
    $q1 = "UPDATE userTBL SET back_flight = '$back_flightID' WHERE userID = '$userID'";
    $r1 = mysqli_query($mysqli, $q1);
?>
<script>
    alert("Successfully saved!");
    location.replace('index.php');
</script>