<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main</title>
</head>
<body>
  <form method="post" action="recommendation.php" class="SearchForm">
    <h2>Show your preference </h2>
    <label> Departure date </label>
      <input type = "date" name = "DepartureDate" class="DepartureDate">
    <label> Arrival date </label>
      <input type = "date" name = "ArrivalDate" class="ArrivalDate">
    <div class="from">
    <label> From </label>
      <input type="text" name="from" list="searchOptions" placeholder="Airport initial (ex)ICN">
      <datalist id="searchOptions">
      <option value="ICN"></option>
      <option value="GMP"></option>
      <option value="TAE"></option>
      <option value="CJU"></option>
      <option value="PUS"></option>
      <option value="CJJ"></option>
      </datalist>
    </div>
    <div class="preferenceForm">
      <label> 1st </label>
        <select name="first" id="first" required="required">
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
        <label> 2nd </label>
        <select name="second" id="second" required="required">
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
        <label> 3rd </label>
        <select name="third" id="third" required="required">
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
    </div>
    <button type="submit" class="Submit" onclick="button()">
      Recommend
    </button>
  </form>
</body>
</html>