<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LOGIN</title>
</head>
<body>
  <form method="post" action="login_query.php" class="loginForm">
    <h2>Login</h2>
    <div class="idForm">
      <input type="text" name="id" class="id" placeholder="User ID - xxx@email.com">
    </div>
    <div class="passForm">
      <input type="password" name="pw" class="pw" placeholder="Password">
    </div>
    <button type="submit" class="btn" onclick="button()">
      LOGIN
    </button>
  </form>
  <div class="bottomText1">
    <a href="find_pw.php">Forgot Password?</a>  
  </div>
  <div class="bottomText2">
    <a href="register.php">Create Account</a>  
  </div>
</body>
</html>