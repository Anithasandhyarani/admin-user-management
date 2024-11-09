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
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">

                <?php include('nav.php'); ?>

            </div>
            <div class="col-lg-9">
                <div>
                    <?php

                    if (isset($_GET['acc'])) {
                        echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['acc']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_GET['acc']);
                    }
                    ?>
                </div>
                <div>
                    <?php

                    if (isset($_GET['rej'])) {
                        echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['rej']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_GET['rej']);
                    }
                    ?>
                </div>

                <h2>Users Posts</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Post</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "user_db");
                        $sql = "SELECT * FROM post ORDER BY id DESC";
                        $result = mysqli_query($con, $sql);
                        $cnt = 1;
                        $_SESSION['length'] = 30;
                        $len = $_SESSION['length'];

                        while ($row = mysqli_fetch_assoc($result)) {
                            $p = $row['post'];
                        ?>

                            <tr>
                                <td><?php echo $cnt++; ?></td>
                                <td><?php echo $row['name']; ?></td>

                                <td><?php
                                    if (strlen($p) > $len) {
                                        echo substr($p, 0, $len) . '...';
                                    } else {
                                        echo $p;
                                    }
                                    ?></td>
                                <td><?php
                                    if ($row['status'] == 1) {
                                        echo '<span style="color: green;">Accepted</span>';
                                    } else if ($row['status'] == 0) {
                                        echo '<span style="color: orange;">Pending</span>';
                                    } else {
                                        echo '<span style="color: red;">Rejected</span>';
                                    }
                                    ?></td>

                                <td> <a href="accepted.php?id=<?php echo $row['id']; ?>">Accepted

                                        <a href="rejected.php?id=<?php echo $row['id']; ?>">Rejected
                                </td>


                            </tr>
                        <?php


                        }
                        ?>
                    </tbody>

                    </thead>

                </table>
            </div>
        </div>
    </div>



</body>

</html>