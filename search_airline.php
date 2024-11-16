<!DOCTYPE html>
<html>
<head>
    <title>Search Airline</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        h2 {
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, select, button {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 16px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Search for Airline</h2>
    <form method="post" action="process_search.php">
        <label for="region">region:</label>
        <select name="region" id="region" required>
            <option value="">select</option>
            <option value="asia">Asia</option>
            <option value="europe">Europe</option>
            <option value="america">America</option>
            <option value="africa">어쩌고</option>
        </select>

        <label for="start_date">from:</label>
        <input type="date" name="start_date" id="start_date" required>

        <label for="end_date">to:</label>
        <input type="date" name="end_date" id="end_date" required>

        <button type="submit">search</button>
    </form>
</body>
</html>
