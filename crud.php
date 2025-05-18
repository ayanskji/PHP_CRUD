<?php
include "conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn'])) {
        $s_name = htmlspecialchars($_POST['s_name']);
        $s_gender = ($_POST['s_gender']);
        $city = ($_POST['city']);
        $course = ($_POST['course']);
        $fees = trim(($_POST['fees']));
        $education = trim(($_POST['education']));
        $str_c = implode(",", $course); #convert into string 

        #insert query
        $query = "INSERT INTO `s_crud` (`s_name`, `s_gender`, `city`, `course`, `fees`, `education`) VALUES ('$s_name', '$s_gender', '$city', '$str_c', '$fees', '$education')";
        $ok_query = mysqli_query($conn, $query);


        if ($ok_query) {
            echo "<script>alert('Data inserted 👌'); window.location.href = 'viewdata.php'</script>";
        } else {
            echo "<script>alert('Data insert failed ❌');</script>";
        }
    }
}


// ye update ke lia
if (isset($_POST['update'])) {
    $id = $_POST['s_id'];
    $s_name = htmlspecialchars($_POST['s_name']);
    $s_gender = $_POST['s_gender'];
    $city = $_POST['city'];
    $course = implode(",", $_POST['course']);
    $fees = trim($_POST['fees']);
    $education = trim($_POST['education']);

    $update_query = "UPDATE s_crud SET s_name='$s_name', s_gender='$s_gender', city='$city', course='$course', fees='$fees', education='$education' WHERE s_id=$id";

    $ok = mysqli_query($conn, $update_query);

    if ($ok) {
        echo "<script>alert('Data Updated ✔'); window.location.href='viewdata.php';</script>";
    } else {
        echo "<script>alert('Update Failed ❌');</script>";
    }
}
