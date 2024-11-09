<?php

$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');

$id = $_GET['id'];
$sql = "UPDATE post SET status='1' WHERE id='$id'";

if ($con->query($sql) === TRUE) {

    $acc = "accepted successfully";
    header("location:userpost_all.php?acc=$acc");
} else {
    echo "Error  ";
}
