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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">

                <?php include('nav.php'); ?>


            </div>
            <div class="col-lg-3">
                <h4>welcome</h4>
            </div>
        </div>
    </div>


</body>

</html>

</body>

</html>