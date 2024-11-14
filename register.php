<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>SIGNUP</title>
</head>
<body>
  <form method="post" action="register_query.php" class="registerForm">
    <h2>Signup</h2>
    <div class="idForm">
      <input type="text" name="id" class="id" placeholder="UserID">
    </div>
    <div class="passForm">
      <input type="password" name="pw" class="pw" placeholder="Password">
    </div>
    <div class="fnameForm">
      <input type="text" name="fname" class="fname" placeholder="First Name">
    </div>
    <div class="LnameForm">
      <input type="text" name="lname" class="lname" placeholder="Last Name">
    </div>
    <div class="ageForm">
      <input type="number" name="birthyear" class="birthyear" placeholder="Birth Year">
    </div>
    <div class="mobileForm">
      <input type="text" name="mobile" class="mobile" placeholder="Mobile (except -)">
    </div>
    <button type="submit" class="btn" onclick="button()">
      REGISTER
    </button>
  </form>
</body>
</html>
