<?php include "conn.php";

// fetch all records
$fetch_tb  = "SELECT * FROM `s_crud`";
$result = mysqli_query($conn, $fetch_tb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            padding: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #2563eb;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }
    </style>
</head>

<body>
    <h2>Registered Students</h2>
    <table>
        <tr>
            <!-- <th>ID</th> -->
            <th>Name</th>
            <th>Gender</th>
            <th>City</th>
            <th>Courses</th>
            <th>Fees</th>
            <th>Education</th>
            <th>Date</th>
        </tr>

        <?php if (mysqli_num_rows($result) > 0) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['s_name'] ?></td>
                    <td><?= $row['s_gender'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td><?= $row['course'] ?></td>
                    <td><?= $row['fees'] ?></td>
                    <td><?= $row['education'] ?></td>
                    <td><?= $row['dt'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['s_id'] ?>"
                            style="background-color: #2563eb; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none; margin-right: 8px;">
                            Edit
                        </a>

                        <a href="delete.php?id=<?= $row['s_id'] ?>"
                            onclick="return confirm('Are you sure to delete this record?');"
                            style="background-color: #dc2626; color: white; padding: 6px 12px; border-radius: 5px; text-decoration: none;">
                            Delete
                        </a>
                    </td>

                </tr>
            <?php endwhile ?>
        <?php else : ?>
            <tr>
                <td colspan="8">No Data Found ☠</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>