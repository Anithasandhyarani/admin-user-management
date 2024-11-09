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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>


    <div class="container py-5">

        <div class="col-lg-9">
            <form action="post_insert.php" method="post">
                <div style="font-size:14px;color:red">

                    <?php
                    $error_array = [
                        0 => "",
                        1 => 'Name is required',
                        2 => 'Name contains special characters',
                        3 => 'post is required'
                    ];
                    $error_number = $_GET['error'] ?? 0;
                    echo $error_array[$error_number];
                    ?>
                </div>




                <h2>Post form</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Enter the name</label>
                    <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['postname']) ? $_SESSION['postname'] : '' ?>">
                </div>

                <div class="mb-3">
                    <label for="post" class="form-label">Enter the post</label>
                    <textarea class="form-control w-50" rows="4" name="post"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary px-3">save</button><br><br>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>