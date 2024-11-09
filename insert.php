
<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');


$name = $_POST['name'];
$password = $_POST['password'];

$_SESSION['name'] = $_POST['name'];


$error = "";

if (empty($_POST["name"])) {
    $error = 1;
} else if (!preg_match("/^[a-zA-z]*$/", htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
    $error = 2;
} else if (empty($_POST['password'])) {
    $error = 3;
} else if (empty($_POST['confirm_password'])) {
    $error = 4;
} else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $_POST['password'])) {
    $error = 5;
} else if (preg_match('/^[0-9]{10}+$/', $_POST['password'])) {
    $error = 6;
} else if ($_POST['password'] !== $_POST['confirm_password']) {
    $error = 7;
}




if ($error == "") {




    $s = mysqli_query($con, "SELECT * FROM users where BINARY name = '$name'");
    //echo mysqli_num_rows($s);
    //exit(0);
    if (mysqli_num_rows($s) >= 1) {
        $user = 'User Already exists';
        header("location:register.php?user=$user");
        exit(0);
    } else {
        $sql = "INSERT INTO users(name,password) values('" . $_POST['name'] . "','" . $_POST['password'] .  "')";

        if (mysqli_query($con, $sql)) {
            $msg = "New record created successfully";

            header("Location:login.php?msg=$msg");
            unset($_SESSION['name']);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
    header("location:register.php?error=" . $error);
}
