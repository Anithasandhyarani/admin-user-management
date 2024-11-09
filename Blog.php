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

    <div class="container mt-4">
        <h2>Blog</h2>

        <div class="row">
            <?php
            $con = mysqli_connect("localhost", "root", "", "user_db");
            $sql = "SELECT * FROM post";
            $len = "30";


            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);


            while ($row = mysqli_fetch_assoc($result)) {
                $p = $row['post'];

            ?>

                <div class="col-lg-7">

                    <div class="card" style="width:10;">

                        <div class="card-body">


                            <h5 class="card-title"><?php echo $row['name']; ?></h5>

                            <p class="card-text">
                                <?php
                                if (strlen($p) > $len) {
                                    echo substr($p, 0, $len) . '...';
                                } else {
                                    echo $p;
                                }
                                ?></p>
                            <a href="read_more.php?id=<?php echo $row['id']; ?>" class="card-link float-end">Read more</a>



                        </div>
                    </div>
                </div>


            <?php
            }

            ?>





        </div>

    </div>









</body>

</html>