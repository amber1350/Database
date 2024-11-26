<?php
session_start();
print_r($_SESSION);
if (!isset($_SESSION['userID'])) {
    echo "<script>alert('로그인 상태가 아닙니다.'); location.replace('../register/login.php');</script>";
    exit;
}

include '../register/conn.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_SESSION['userID']; 
    $available_dep = $_POST['DepartureDate']; 
    $available_ari = $_POST['ArrivalDate'];     
    $from = $_POST['from'];                   
    $to = $_POST['to'];                       

    $sql = "INSERT INTO Flightdb.flightTable (userID, DepartureDate, ArrivalDate, `from`, `to`)
            VALUES ('$userID', '$available_dep', '$available_ari', '$from', '$to')";

    // if (mysqli_query($conn, $sql)) {
    //     echo "<script>alert('여행 정보가 성공적으로 저장되었습니다!');</script>";
    // } else {
    //     echo "데이터 저장 중 오류 발생: " . mysqli_error($conn);
    // }

    // mysqli_close($conn);
    echo "<script>alert('Successfully update')</script>";
    echo "<script>location.replace('../main/index.php');</script>";

}
?>
