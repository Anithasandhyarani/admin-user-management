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
    <div class="container">

        <?php

        $con = mysqli_connect("localhost", "root", "", "user_db");
        $id = $_GET['id'];

        $sql = "SELECT * FROM post WHERE id=$id";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {

        ?>

            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-3"><?php echo $row['name']; ?></h2>
                        <p class="card-text"><?php echo $row['post']; ?></p>
                    </div>
                </div>

            <?php
        }
            ?>
            </div>
    </div>
    </div>




</body>

</html>