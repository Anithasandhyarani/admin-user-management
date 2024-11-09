<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");
    exit();
}

$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');

//delete the data
$id = $_GET['id'];
$sql = "DELETE FROM post WHERE id='$id'";

if ($con->query($sql) === TRUE) {
    $del = "Record deleted successfully";
    header("Location:post_list.php?del=$del");
} else {
    echo "Error deleting record: " . $con->error;
}
