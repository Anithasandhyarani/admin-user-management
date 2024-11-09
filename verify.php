<?php
$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');

$id = $_GET['id'];
$sql = "UPDATE users SET verified='1' WHERE id='$id'";

if ($con->query($sql) === TRUE) {
    $ver = "verified successfully";
    header("location:details.php?ver=$ver");
} else {
    echo "Error  ";
}
