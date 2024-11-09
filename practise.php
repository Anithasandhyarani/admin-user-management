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
        <h2>blog</h2>

        <div class="row">
            <?php
            $con = mysqli_connect("localhost", "root", "", "user_db");
            $sql = "SELECT *FROM post";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $p = $row['post'];
                $len = 30;

            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title"><?php echo $row['name']; ?></h2>
                            <p class="card=text">
                                <?php
                                if (strlen($p) > $len) {
                                    echo substr($p, 0, $len) . '...';
                                } else {
                                    echo $p;
                                }
                                ?></p>
                            <a href="practise2.php?id=<?php echo $row['id']; ?>" class="class-link float-end">read more</a>

                        </div>

                    <?php
                }
                    ?>
                    </div>
                </div>
        </div>
    </div>


</body>

</html>