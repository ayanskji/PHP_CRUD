<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            overflow: hidden;
            /* Disable scroll */
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #e0f2fe, #dbeafe);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1e3a8a;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .radio-group,
        .checkbox-group {
            margin-bottom: 15px;
        }

        .radio-group input,
        .checkbox-group input {
            margin-right: 5px;
            margin-left: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            border: none;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Student Registration</h2>
        <form action="crud.php" method="post">
            <label>Name:</label>
            <input type="text" name="s_name" required>

            <label>Gender:</label>
            <div class="radio-group">
                <input type="radio" name="s_gender" value="Male" required> Male
                <input type="radio" name="s_gender" value="Female" required> Female
            </div>

            <label>City:</label>
            <select name="city" required>
                <option value="">--Select--</option>
                <option value="Karachi">Karachi</option>
                <option value="Lahore">Lahore</option>
                <option value="Punjab">Punjab</option>
                <option value="Quetta">Quetta</option>
            </select>

            <label>Courses:</label>
            <div class="checkbox-group">
                <input type="checkbox" name="course[]" value="PHP"> PHP
                <input type="checkbox" name="course[]" value="MYSQL"> MYSQL
                <input type="checkbox" name="course[]" value="PYTHON"> PYTHON
            </div>

            <label>Fees:</label>
            <input type="number" name="fees" required>

            <label>Education:</label>
            <input type="text" name="education" required>

            <input type="submit" value="Submit" name="btn">
        </form>
    </div>
</body>

</html>