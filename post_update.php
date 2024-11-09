<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");
    exit();
}



$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');
$id = $_POST['id'];
$name = $_POST['name'];
$post = $_POST['post'];

$sql = "UPDATE post SET name='$name', post='$post' WHERE id='$id'";


if (mysqli_query($con, $sql)) {

    $upd = "successfully updated";
    header("location:post_list.php?upd=$upd");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
