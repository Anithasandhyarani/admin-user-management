<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "user_db");
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];
$id = $_SESSION['$u_id'];

$error = "";

if (empty($_POST['password'])) {
    $error = 1;
} else if (empty($_POST['confirm_password'])) {
    $error = 2;
} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['password'])) {
    $error = 3;
} elseif (($password !== $confirm_password)) {
    $error = 4;
}


if ($error == "") {




    $sql = "UPDATE users SET password='$password' WHERE id='$id'";

    if (mysqli_query($con, $sql)) {
        $update = "password changed successfully";
        header("location:profile.php?update=$update");
    } else {
        echo "error";
    }
} else {
    echo "Error: " . $sql . "<br>";
    header("location:password.php?error=" . $error);
}
