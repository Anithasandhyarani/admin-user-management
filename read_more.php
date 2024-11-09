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
        <div class="row">

            <?php
            $con = mysqli_connect("localhost", "root", "", "user_db");
            $id = $_GET['id'];

            $sql = "SELECT * FROM post WHERE id=$id";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {

                $user_id = $row['user_id'];



            ?>
                <div class="col-lg-5">
                    <div class="card">

                        <div class="card-body">
                            <h2 class="card-title text-left mb-3">Title: <?php echo $row['name']; ?></h2>

                            <p class="card-text"><?php echo $row['post']; ?></p>

                        </div>


                    </div>
                    <div><a href="blog.php">Back to post</a></div>
                <?php
            }
                ?>
                </div>

                <div class="col-sm-5">
                    <img class="card-img" src="https://media.sproutsocial.com/uploads/2017/01/Instagram-Post-Ideas.png">

                </div>

        </div>

    </div>

    <div class="container sm">
        <h2>User Post list </h2>

        <div class="row">
            <?php
            $con = mysqli_connect("localhost", "root", "", "user_db");


            $sql = "SELECT * FROM post WHERE user_id= $user_id";
            $len = "30";

            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);




            while ($row = mysqli_fetch_assoc($result)) {

                $p = $row['post'];


            ?>

                <div class="col-lg-3">

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