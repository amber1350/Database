<!DOCTYPE html>
<html lang="en">
<head>
  <title>Preferences</title>
  <style>
    /* Global Reset */
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
      /* background: linear-gradient(to bottom, #F2F2F2, #EAEAEA); */
      background: url('images/sky4.jpg') no-repeat center center/cover;
      opacity: 0;
      animation: fadeIn 0.7s ease-in forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    .container {
      width: 600px;
      padding: 30px;
      background-color: #FFFFFF;
      border-radius: 20px;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    h2 {
      font-size: 28px;
      margin-bottom: 20px;
      color: #558BCF;
    }

    .form-group {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-top: 20px;
    }

    .form-group .column {
      width: 48%;
    }

    label {
      display: block;
      text-align: left;
      margin-top: 10px;
      font-size: 14px;
      color: #333333;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 2px solid #EAEAEA;
      border-radius: 10px;
      outline: none;
      font-size: 14px;
    }

    input:focus, select:focus {
      border-color: #558BCF;
      box-shadow: 0 0 5px rgba(85, 139, 207, 0.5);
    }

    .btn {
      display: block;
      width: 100%;
      padding: 15px;
      margin-top: 30px;
      font-size: 16px;
      font-weight: bold;
      color: #FFFFFF;
      background-color: #558BCF;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn:hover {
      background-color: #426BAF;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Show Your Preference</h2>
    <form method="post" action="recommendation.php">
      <label>Departure Date</label>
      <input type="date" name="DepartureDate" required>

      <label>Arrival Date</label>
      <input type="date" name="ArrivalDate" required>

      <label>From</label>
      <input type="text" name="from" list="searchOptions" placeholder="Airport initial (e.g., ICN)" required>
      <datalist id="searchOptions">
        <option value="ICN"></option>
        <option value="GMP"></option>
        <option value="TAE"></option>
        <option value="CJU"></option>
        <option value="PUS"></option>
        <option value="CJJ"></option>
      </datalist>
          <br><br><label>1st Preference</label>
          <select name="first" required>
            <option value="" selected disabled hidden>Select 1st</option>
            <option value="adventure">Adventure</option>
            <option value="relaxation">Relaxation</option>
            <option value="culture">Culture</option>
            <option value="foodie">Foodie</option>
            <option value="shopping">Shopping</option>
            <option value="nature">Nature</option>
            <option value="luxury">Luxury</option>
            <option value="budget_friendly">Budget-friendly</option>
            <option value="photography">Photography</option>
            <option value="nightlife">Night life</option>
          </select>

          <label>3rd Preference</label>
          <select name="third" required>
            <option value="" selected disabled hidden>Select 3rd</option>
            <option value="adventure">Adventure</option>
            <option value="relaxation">Relaxation</option>
            <option value="culture">Culture</option>
            <option value="foodie">Foodie</option>
            <option value="shopping">Shopping</option>
            <option value="nature">Nature</option>
            <option value="luxury">Luxury</option>
            <option value="budget_friendly">Budget-friendly</option>
            <option value="photography">Photography</option>
            <option value="nightlife">Night life</option>
          </select>
        
          <label>2nd Preference</label>
          <select name="second" required>
            <option value="" selected disabled hidden>Select 2nd</option>
            <option value="adventure">Adventure</option>
            <option value="relaxation">Relaxation</option>
            <option value="culture">Culture</option>
            <option value="foodie">Foodie</option>
            <option value="shopping">Shopping</option>
            <option value="nature">Nature</option>
            <option value="luxury">Luxury</option>
            <option value="budget_friendly">Budget-friendly</option>
            <option value="photography">Photography</option>
            <option value="nightlife">Night life</option>
          </select>

      <button type="submit" class="btn">Recommend</button>
    </form>
  </div>
</body>
</html>
