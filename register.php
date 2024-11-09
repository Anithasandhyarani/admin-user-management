<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container mt-4">
        <form action="insert.php" method="post">
            <div>
                <?php

                if (isset($_GET['user'])) {
                    echo '<div class="alert alert-danger w-50">' . htmlspecialchars($_GET['user']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_GET['user']);
                }
                ?>
            </div>


            <div>
                <?php

                if (isset($_GET['password'])) {
                    echo '<div class="alert alert-danger w-50">' . htmlspecialchars($_GET['password']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_GET['password']);
                }
                ?>
            </div>
            <div style="font-size:14px;color:red">

                <?php
                $error_array = [
                    0 => "",
                    1 => 'Name is required',
                    2 => 'Name contains special characters',
                    3 => 'password is required',
                    4 => 'confirm password is required',
                    5 => 'password minimum length should be 8,
at least one uppercase letter,
& lowercase letter,
and one digit. ',
                    6 => 'phone number contains 0-9 numbers only',
                    7 => 'password is not match'
                ];
                $error_number = $_GET['error'] ?? 0;
                echo $error_array[$error_number];
                ?>
            </div>



            <h2>Registration form</h2>


            <div class="mb-3">
                <label for="name" class="form-label">Enter Name:</label>
                <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>"
                    </div>
                <div class=" mb-3">
                    <label for="password" class="form-label">Enter the password:</label>
                    <input type="password" class="form-control w-25" name="password" value="">
                </div>

                <div class=" mb-3">
                    <label for="confirm_password" class="form-label">confirm the password:</label>
                    <input type="password" class="form-control w-25" name="confirm_password" value="">
                </div><br>

                <button type="submit" class="btn btn-primary">Submit</button>
                <div><br>

                    <div>
                        Already have account <a href='login.php'>Goback</a>
                    </div>





                </div>

        </form>

    </div>
</body>


</html>