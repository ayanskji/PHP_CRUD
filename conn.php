<?php
$conn = mysqli_connect("localhost", "root", "", "crud");
if (!$conn) {
    echo "<script>alert('Connection Failed ?')</script>";
}
