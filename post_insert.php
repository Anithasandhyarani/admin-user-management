<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");
    exit();
}
$name = $_POST['name'];
$post = $_POST['post'];

$_SESSION['postname'] = $_POST['name'];

$u_id = $_SESSION['$u_id'];

$error = "";

if (empty($_POST["name"])) {
    $error = 1;
} else if (!preg_match("/^[a-zA-z]*$/", htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
    $error = 2;
} else if (empty($_POST['post'])) {
    $error = 3;
}
if ($error == "") {



    $con = mysqli_connect("localhost", "root", "", "user_db");


    $sql = "INSERT INTO post(name,post,user_id)VALUES ('$name','$post',' $u_id ')";

    if (mysqli_query($con, $sql)) {
        $msg = "successfully inserted ";

        header("location:post_list.php?msg=$msg");
        unset($_SESSION['postname']);
    } else {
        echo "Error: " . $sql;
    }
} else {
    echo "Error: " . $sql . "<br>";
    header("location:post.php?error=" . $error);
}
