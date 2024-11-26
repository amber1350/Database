<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search the Flight</title>
  <style>
    body {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    height: 100vh;
    /* background-color: lightblue; */
    }
    input {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      margin-bottom: 10px;
    }
    label {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      margin-bottom: 10px;
    }
    button {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
    }
    select {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      margin-bottom: 10px;
      /* margin-top: 10px; */
    }
  </style>
</head>
<body>
  <form method="post" action="search_flight.php" class="SearchForm">
    <h2>Ready to leave?</h2>
    <label> Departure date
      <input type = "date" name = "DepartureDate" class="DepartureDate">
    </label>
    <label> Arrival date
    <input type = "date" name = "ArrivalDate" class="ArrivalDate">
    </label>
    <label for="from">From
    <input type="text" name = "from" list="searchOptions" placeholder="Airport initial (ex)ICN">
    <datalist id="searchOptions">
      <option value="ICN"></option>
      <option value="GMP"></option>
    </datalist>
    </label>
    <label for="to">To
    <select name="to" id="to" required="required">
      <optgroup label = "Asia">
        <option value="" selected disabled hidden>Select the region</option>
        <option value="SouthKorea">South Korea</option>
        <option value="Japan">Japan</option>
      </optgroup>
      <optgroup label = "Europe">
        <option value="Portugal">Portugal</option>
        <option value="UK">UK</option>
      </optgroup>
    </select>
    </label>
    <button type="submit" class="Submit" onclick="button()">
      Search
    </button>
  </form>
</body>
</html>