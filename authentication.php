<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');
$name = $_POST['name'];
$password = $_POST['password'];

$_SESSION['name'] = $_POST['name'];


$sql = "SELECT * FROM users WHERE BINARY name='$name' AND BINARY password='$password' ";

$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
    $_SESSION['userisloggedin'] = true;
    $row = $result->fetch_assoc();

    $user_id = $row["id"];

    $_SESSION['isadmin'] = $row['isadmin'];
    $_SESSION['$u_id'] =  $user_id;


    if ($row['verified'] == 1) {

        header("Location:dashboard.php");
        exit();
    } else {
        $acc = "Account not verified";
        header("Location:login.php?acc=$acc");
    }
} else {
    $log = "invalid details";

    header("Location:login.php?log=$log");
}
