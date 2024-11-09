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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>


    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3">
                <?php include('nav.php'); ?>
            </div>
            <div class="col-lg-9">
                <div>
                    <?php

                    if (isset($_GET['msg'])) {
                        echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['msg']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_GET['msg']);
                    }
                    ?>
                </div>

                <div>
                    <?php

                    if (isset($_GET['del'])) {
                        echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['del']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_GET['del']);
                    }
                    ?>
                </div>
                <div>
                    <?php

                    if (isset($_GET['upd'])) {
                        echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['upd']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                        unset($_GET['upd']);
                    }
                    ?>
                </div>




                <h2>List of posts <a href="post.php" class="btn btn-primary float-end">Add new </a> </h2>
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>post</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $u_id = $_SESSION['$u_id'];

                        $con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');

                        $sql = "SELECT * FROM post WHERE user_id=$u_id";
                        $r = 1;
                        $len = 30;

                        $result = mysqli_query($con, $sql);


                        while ($row = mysqli_fetch_assoc($result)) {
                            $p = $row['post'];

                        ?>



                            <tr>
                                <td><?php echo $r++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php
                                    if ($row['status'] == 1) {

                                        if (strlen($p) > $len) {
                                            echo substr($p, 0, $len) . '...';
                                        } else {
                                            echo $p;
                                        }
                                    } elseif ($row['status'] == 2) {

                                        echo '<span style="color: red;">Rejected</span>';
                                    } else {

                                        echo '<span style="color: orange;">Pending</span>';
                                    }
                                    ?></td>
                                <td> <a href="post_edit.php?id=<?php echo $row['id']; ?>"> Edit</a>
                                    <a href="post_delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                </td>


                            </tr>

                        <?php
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>



</body>

</html>