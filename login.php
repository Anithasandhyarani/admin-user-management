<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container mt-4">
        <form action="authentication.php" method="post">
            <h2>login form</h2>
            <div>
                <?php

                if (isset($_GET['msg'])) {
                    echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['msg']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
                    unset($_GET['msg']);
                }
                ?>
            </div>

            <div>
                <?php

                if (isset($_GET['log'])) {
                    echo '<div class="alert alert-danger w-50">' . htmlspecialchars($_GET['log']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_GET['log']);
                }
                ?>
            </div>

            <div>
                <?php

                if (isset($_GET['acc'])) {
                    echo '<div class="alert alert-danger w-50">' . htmlspecialchars($_GET['acc']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    unset($_GET['acc']);
                }
                ?>
            </div>


            <div class="mb-3">
                <label for="name" class="form-label">Enter Name:</label>
                <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>">
            </div>
            <div class=" mb-3">
                <label for="password" class="form-label">Enter the password:</label>
                <input type="password" class="form-control w-25" name="password" value="">
            </div>

            <button type="submit" class="btn btn-primary">login</button><br><br>

            <div>
                Create account <a href='register.php'>Register</a>
            </div>

        </form>

    </div>
</body>


</html>