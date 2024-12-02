<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flights</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            height: 100vh;
            /* display: flex; */
            align-items: center;
            /* background: url('images/sky4.jpg') no-repeat center center/cover; */
        }

    h2 {
        margin-left: 20px;
        margin-bottom: 20px;
        font-size: 32px;
        color: #0D1E44;
        }
    h3 {
        margin-left: 20px;
        margin-bottom: 15px;
        font-size: 26px;
        color: #0D1E44;

    }
    .flight-table {
        width: 95%;
        border-collapse: collapse;
        margin: 20px;
        font-size: 16px;
        text-align: left;
    }
    .flight-table thead tr {
        background-color: #558BCF;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }
    .flight-table th, .flight-table td {
        padding: 12px 15px;
        border: 1px solid #dddddd;
    }
    .flight-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }
    .flight-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }
    .flight-table tbody tr:last-of-type {
        border-bottom: 2px solid #558BCF;
    }
    .flight-table a {
        color: #558BCF;
        text-decoration: none;
    }
    .flight-table a:hover {
        text-decoration: underline;
    }
</style>
<body>
    <h2>Select your journey</h2>
<?php
session_start();
    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
        $recom_reg = trim($_GET['recom_reg']);
        $from_reg = $_GET['from_reg'];
        $dep_date = $_GET['dep_date'];
        $arr_date = $_GET['arr_date'];
    }

    include '../register/conn.php';
    $mysqli = new mysqli($host, $user, $pw, $db_name);
    
    $userID = mysqli_real_escape_string($mysqli, $userID);
    $q1 = "UPDATE travelTBL SET recom_reg = '$recom_reg' WHERE userID = '$userID'";
    $r1 = mysqli_query($mysqli, $q1);

    $q2 = "SELECT
                f.flightID,
                f.from_reg AS dep_airport,
                f.to_reg AS arr_airport,
                a_to.region as arr_region,
                f.dep_date
            FROM flightTBL f
            JOIN airportTBL a_to ON f.to_reg = a_to.airportID
            WHERE
                f.from_reg = '$from_reg'
                AND a_to.region = '$recom_reg'
                AND f.dep_date >= '$dep_date'
                AND f.dep_date <= '$arr_date'
            ORDER BY
                f.dep_date ASC";
    
    $go_flight = mysqli_query($mysqli, $q2);


if ($go_flight && mysqli_num_rows($go_flight) > 0) {
    echo "<h3>One-way Flights</h3>";
    echo "<table class='flight-table'>";
    echo "<thead><tr><th>Flight ID</th><th>Departure</th><th>Destination</th><th>Dep Date</th></tr></thead>";
    echo "<tbody>";
    while ($row = mysqli_fetch_assoc($go_flight)) {
        $flightID = htmlspecialchars($row['flightID']);
        $to_reg = $row['arr_airport'];
        $dep_airport = htmlspecialchars($row['dep_airport']);
        $arr_airport = htmlspecialchars($row['arr_airport']);
        $arr_region = htmlspecialchars($row['arr_region']);
        $dep_date = htmlspecialchars($row['dep_date']);
        echo "<tr>
                <td>
                <a href='return_flight.php?flightID=" . urlencode($flightID) . "&arr_date=" . urlencode($arr_date) . "'>" . htmlspecialchars($flightID) . "</a>
                </td>
                <td>" . htmlspecialchars($dep_airport) . "</td>
                <td>" . htmlspecialchars($arr_airport) . " (" . htmlspecialchars($arr_region) . ")</td>
                <td>" . htmlspecialchars($dep_date) . "</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No flights found for the selected criteria.</p>";
}
?>