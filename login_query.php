<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
   session_start();
   include 'conn.php';
   $mysqli = new mysqli($host, $user, $pw, $db_name); //db conncection
      
      //id and pw from login.php
      $userID = $_POST['id'];
      $userPW = $_POST['pw'];
      
      $q = "SELECT * FROM userTBL WHERE userID = '$userID' AND userPW = '$userPW'";
      $result = $mysqli->query($q);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      
      //if selected, create session
      if ($row != null) {
         $_SESSION['userID'] = $row['userID'];
         $_SESSION['name'] = $row['firstName'];
         echo "<script>location.replace('index.php');</script>";
         exit;
      }
      
      //No selected, pop out invalidation
      if($row == null){
         echo "<script>alert('Invalid username or password')</script>";
         echo "<script>location.replace('login.php');</script>";
         exit;
      }
      ?>
   </body>