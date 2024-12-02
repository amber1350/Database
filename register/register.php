<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create Account</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(to bottom, #0D1E44, #558BCF);
    }

    .back-btn {
      position: absolute;
      top: 20px;
      left: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50px;
      height: 50px;
      font-size: 40px;
      color: white;
      background-color: #0D1E44;
      border: 2px solid white;
      border-radius: 50%;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .back-btn:hover {
      background-color: white;
      color: #558BCF;
    }

    .container {
      text-align: center;
      width: 400px;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #558BCF;
    }

    input {
      width: calc(100% - 20px);
      padding: 10px;
      margin: 10px 0;
      font-size: 16px;
      border: 2px solid #558BCF;
      border-radius: 5px;
      outline: none;
    }

    input:focus {
      border-color: #426BAF;
    }

    .btn {
      display: block;
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
      color: white;
      background-color: #558BCF;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: #426BAF;
    }
  </style>
</head>
<body>
  <a href="login.php" class="back-btn">⇦</a>
  <div class="container">
    <h2>Create Account</h2>
    <form method="post" action="register_query.php" class="registerForm">
      <input type="text" name="id" class="id" placeholder="User ID - xxx@email.com" required>
      <input type="password" name="pw" class="pw" placeholder="Password" required>
      <input type="password" name="repw" class="repw" placeholder="Confirm Password" required>
      <input type="text" name="fname" class="fname" placeholder="First Name" required>
      <input type="text" name="lname" class="lname" placeholder="Last Name" required>
      <input type="number" name="birthyear" class="birthyear" placeholder="Birth Year" required>
      <input type="text" name="mobile" class="mobile" placeholder="Mobile (without -)" required>
      <button type="submit" class="btn">Register</button>
    </form>
  </div>
</body>
</html>
