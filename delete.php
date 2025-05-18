<?php
include "conn.php";

// ID check karo: agar nahi hai ya number nahi hai to rok do
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<script>alert('Galat ID hai!');</script>";
    exit();
}

$id = $_GET['id']; // ID lo

// Record delete karne ka secure (prepared) tareeqa
$query = "DELETE FROM s_crud WHERE s_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id); // "i" matlab integer

if ($stmt->execute()) {
    echo "<script>alert('Record delete ho gaya!'); window.location.href= 'viewdata.php' </script>";
} else {
    echo "<script>alert('Delete nahi ho saka!');  window.location.href= 'viewdata.php' </script>";
}

// Band karo
$stmt->close();
$conn->close();
