<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>FindPW</title>
</head>
<body>
  <form method="post" action="pw_query.php" class="findpwForm">
    <h2>Find Password</h2>
    <div class="idForm">
      <input type="text" name="id" class="id" placeholder="User ID - xxx@email.com">
    </div>
    <div class="mobileForm">
      <input type="text" name="mobile" class="mobile" placeholder="Mobile (except -)">
    </div>
    <button type="submit" class="btn" onclick="button()">
      Find Pasword
    </button>
  </form>
</body>
</html>
