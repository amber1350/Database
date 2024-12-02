<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: Arial, sans-serif;
      /* background-color: #FF7F5D; */
      background: url('../main/images/airplane1.jpg') no-repeat center center/cover;
      /* background: linear-gradient(45deg, #FB6544, #FDB297); */
    }
    .login-container {
      width: 700px;
      padding: 30px 20px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 5px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      font-size: 28px;
      color: #558BCF;
    }
    input[type="text"], input[type="password"] {
      width: 90%;
      padding: 10px;
      margin-bottom: 15px;
      border: 2px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
    }
    button {
      width: 95%;
      padding: 10px;
      font-size: 16px;
      color: white;
      background-color: #558BCF;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #3B6FA1;
    }
    .links {
      margin-top: 15px;
      font-size: 14px;
    }
    .links a {
      text-decoration: none;
      color: #558BCF;
      margin: 0 5px;
    }
    .links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2><br><br>
    <form method="post" action="login_query.php">
      <input type="text" name="id" placeholder="User ID - xxx@email.com" required>
      <input type="password" name="pw" placeholder="Password" required>
      <button type="submit">LOGIN</button>
    </form>
    <div class="links">
      <a href="find_pw.php">Forgot Password?</a> | 
      <a href="register.php">Create Account</a>
    </div>
    <br>
  </div>
</body>
</html>
