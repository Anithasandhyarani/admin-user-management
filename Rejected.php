<?php

$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');

$id = $_GET['id'];
$sql = "UPDATE post SET status='2' WHERE id='$id'";

if ($con->query($sql) === TRUE) {

    $rej = "Rejected successfully";
    header("location:userpost_all.php?rej=$rej");
} else {
    echo "Error  ";
}
