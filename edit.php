<?php include "conn.php"; ?>
<?php
include "conn.php";

// Check if ID is set and is a number
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Invalid ID'); window.location.href='index.php';</script>";
    exit();
}

$Idget = intval($_GET['id']); // Sanitize ID

// Use prepared statement for security
$stmt = $conn->prepare("SELECT * FROM s_crud WHERE s_id = ?");
$stmt->bind_param("i", $Idget);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "<script>alert('No Record found')</script>";
    exit();
}

$fetchData = $result->fetch_assoc();
$checkEdit = $fetchData['course'];
$chk = explode(",", $checkEdit); // Convert to array
?>


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
            background-color: rgb(248, 68, 13);
            width: 100%;
            padding: 12px;
            border: none;
            color: white;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: rgb(248, 117, 77);
        }

        /* <style> */
        .custom-radio {
            position: relative;
            padding-left: 30px;
            margin-right: 20px;
            cursor: pointer;
            font-size: 16px;
            user-select: none;
        }

        .custom-radio input[type="radio"] {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .custom-radio .checkmark {
            position: absolute;
            left: 0;
            top: 2px;
            height: 18px;
            width: 18px;
            background-color: #ccc;
            border-radius: 50%;
        }

        .custom-radio input:checked~.checkmark {
            background-color: rgb(255, 0, 0);
            /* Blue */
        }

        .custom-radio .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-radio input:checked~.checkmark:after {
            display: block;
        }

        .custom-radio .checkmark:after {
            top: 4px;
            left: 4px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Records Update</h2>
        <form action="crud.php" method="post">
            <input type="hidden" name="s_id" value="<?= $fetchData['s_id'] ?>">
            <label>Name:</label>
            <input type="text" name="s_name" required value="<?= $fetchData['s_name'] ?>">

            <label>Gender:</label>
            <div class="radio-group">
                <input type="radio" name="s_gender" value="Male" <?= $fetchData['s_gender'] === "Male" ? "checked" : "" ?> required> Male
                <input type="radio" name="s_gender" <?= $fetchData['s_gender'] === "Female" ? "checked" : "" ?> value="Female" required> Female
            </div>

            <label>City:</label>
            <select name="city" required>
                <option value="">--Select--</option>
                <option value="Karachi" <?= $fetchData['city'] === "Karachi" ? "selected" : "" ?>>Karachi</option>
                <option value="Lahore" <?= $fetchData['city'] === "Lahore" ? "selected" : "" ?>>Lahore</option>
                <option value="Punjab" <?= $fetchData['city'] === "Punjab" ? "selected" : "" ?>>Punjab</option>
                <option value="Quetta" <?= $fetchData['city'] === "Quetta" ? "selected" : "" ?>>Quetta</option>
            </select>

            <label>Courses:</label>
            <div class="checkbox-group">
                <input type="checkbox" name="course[]" value="PHP" <?= in_array("PHP", $chk) ? "checked" : "" ?>> PHP
                <input type="checkbox" name="course[]" value="MYSQL" <?= in_array("MYSQL", $chk) ? "checked" : "" ?>> MYSQL
                <input type="checkbox" name="course[]" value="PYTHON" <?= in_array("PYTHON", $chk) ? "checked" : "" ?>> PYTHON
            </div>

            <label>Fees:</label>
            <input type="number" name="fees" value="<?= $fetchData['fees'] ?>" required>


            <label>Education:</label>
            <input type="text" name="education" value="<?= $fetchData['education'] ?>" required>
            <input type="submit" value="Update" name="update">
        </form>
    </div>
</body>

</html>