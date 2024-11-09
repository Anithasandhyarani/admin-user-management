<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container mt-4">
        <form action="password_update.php" method="post">
            <div style="font-size:14px;color:red">

                <?php
                $error_array = [
                    0 => "",
                    1 => 'password is required',
                    2 => 'confirm password is required',
                    3 => 'password minimum length should be 8,
at least one uppercase letter,
& lowercase letter,
and one digit. ',
                    4 => 'password not match'

                ];
                $error_number = $_GET['error'] ?? 0;
                echo $error_array[$error_number];
                ?>
            </div>



            <h2>Password change</h2>
            <div class="mb-3">
                <label for="password" class="form-label">Enter the New password:</label>
                <input type="password" class="form-control w-25" name="password" value="">
            </div>
            <div class=" mb-3">
                <label for="confirm_password" class="form-label">confirm_password:</label>
                <input type="password" class="form-control w-25" name="confirm_password" value="">
            </div>

            <button type="submit" class="btn btn-primary">save</button><br><br>

</body>

</html>