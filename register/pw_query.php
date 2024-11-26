<?php
   session_start();
   include 'conn.php';
   $mysqli = new mysqli($host, $user, $pw, $db_name); //db conncection

      //id and mobile check
      $userID = $_POST['id'];
      $mobile = $_POST['mobile'];

      $q = "SELECT * FROM userTBL WHERE userID = '$userID' AND mobile = '$mobile'";
      $result = $mysqli->query($q);
      $row = $result->fetch_array(MYSQLI_ASSOC);
      
      if ($row != null) {
        $userPW = $row['userPW'];
      }
      //No selected, pop out invalidation
      if($row == null){
        echo "<script>alert('Check your ID or mobile number')</script>";
        echo "<script>location.replace('find_pw.php');</script>";
        exit;
      }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <div class="base">
        <h2><?php echo "Your password id $userPW";?></h2>
        <button type="button" class="btn" onclick="location.href='login.php'">
            Return to LOGIN
        </button>
    </div>
</body>
</html>