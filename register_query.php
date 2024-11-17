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
      $rePW = $_POST['repw'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $birthyear = $_POST['birthyear'];
      $mobile = $_POST['mobile'];
      
      if ($userPW != $rePW){
         echo "<script>alert('Password mismatch')</script>";
         echo "<script>location.replace('register.php');</script>";
         exit;
      }
      else{
         $q = "INSERT INTO userTBL VALUES('$userID', '$userPW', '$fname', '$lname', '$birthyear', '$mobile')";
         $result = mysqli_query($mysqli, $q);
         echo "<script>alert('Successfully created new account')</script>";
         echo "<script>location.replace('login.php');</script>";
         exit;
      }
      
      ?>
   </body>      
