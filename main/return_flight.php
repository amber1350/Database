<!DOCTYPE html>
<html lang="en">
<head>
  <title>Flights</title>
</head>
<style>
    .flight-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 16px;
        text-align: left;
    }
    .flight-table thead tr {
        background-color: #009879;
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
        border-bottom: 2px solid #009879;
    }
    .flight-table a {
        color: #009879;
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
        $go_flightID = $_GET['flightID'];
        $arr_date = $_GET['arr_date'];
    }

    include '../register/conn.php';
    $mysqli = new mysqli($host, $user, $pw, $db_name);
    
    $go_flightID = mysqli_real_escape_string($mysqli, $go_flightID);
    $userID = mysqli_real_escape_string($mysqli, $userID);
    
    $q1 = "UPDATE userTBL SET go_flight = '$go_flightID' WHERE userID = '$userID'";
    $r1 = mysqli_query($mysqli, $q1);

    $q2 = "SELECT 
                f.flightID,
                f.from_reg AS dep_airport,
                f.to_reg AS arr_airport,
                f.dep_date AS go_dep_date
           FROM flightTBL f
           WHERE f.flightID = '$go_flightID'";
    
    $result1 = mysqli_query($mysqli, $q2);


    if ($result1 && mysqli_num_rows($result1) > 0) {
            $go_flight = mysqli_fetch_assoc($result1);
            $dep_airport = $go_flight['dep_airport']; 
            $arr_airport = $go_flight['arr_airport']; 
            $go_dep_date = $go_flight['go_dep_date']; 

            echo "<h2>Selected Outbound Flight</h2>";
            echo "<table class='flight-table'>";
            echo "<tr><th>Flight ID</th><td>{$go_flight['flightID']}</td></tr>";
            echo "<tr><th>Departure</th><td>{$dep_airport}</td></tr>";
            echo "<tr><th>Destination</th><td>{$arr_airport}</td></tr>";
            echo "<tr><th>Departure Date</th><td>{$go_dep_date}</td></tr>";
            echo "</table>";
            
            $q3 = "SELECT 
                        f.flightID,
                        f.from_reg AS dep_airport,
                        f.to_reg AS arr_airport,
                        f.dep_date AS return_dep_date
                FROM flightTBL f
                WHERE 
                        f.from_reg = '$arr_airport'
                        AND f.to_reg = '$dep_airport'
                        AND f.dep_date > '$go_dep_date'
                        AND f.dep_date <= '$arr_date'
                ORDER BY f.dep_date ASC";

            $return_flight = mysqli_query($mysqli, $q3);

            if ($return_flight && mysqli_num_rows($return_flight) > 0) {
                echo "<h3>Available Return Flights</h3>";
                echo "<table class='flight-table'>";
                echo "<thead><tr><th>Flight ID</th><th>Departure</th><th>Destination</th><th>Dep Date</th></thead>";
                echo "<tbody>";
                while ($row = mysqli_fetch_assoc($return_flight)) {
                    $flightID = htmlspecialchars($row['flightID']);
                    $dep_airport = htmlspecialchars($row['dep_airport']);
                    $arr_airport = htmlspecialchars($row['arr_airport']);
                    $dep_date = htmlspecialchars($row['return_dep_date']);

                    echo "<tr>
                            <td><a href='book_flight.php?flightID=$flightID'>{$flightID}</a></td>
                            <td>{$dep_airport}</td>
                            <td>{$arr_airport}</td>
                            <td>{$dep_date}</td>
                        </tr>";
                }
                echo "</tbody></table>";
            }
            else {
                echo "<p>No return flights found matching your criteria.</p>";
            }
        }
        else {
            echo "<p>Invalid outbound flight ID.</p>";
        }
?>
</body>