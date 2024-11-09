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
    <title>user details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

                    if (isset($_GET['update'])) {
                        echo '<div class="alert alert-success w-50">' . htmlspecialchars($_GET['update']) . '<button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button> </div>';
                        unset($_GET['update']);
                    }
                    ?>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');



                        $id = $_SESSION['$u_id'];

                        $sql = "SELECT * FROM users";
                        $cnt = 1;
                        $result = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($result);


                        if ($count > 0) {
                            $_SESSION['userisloggedin'] = true;


                            $row = mysqli_fetch_assoc($result);
                            $result = mysqli_query($con,  "SELECT users.id, users.name,
                        users.password
                     FROM users
                     WHERE id='$id'");



                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr>


                                    <td><?php echo $cnt++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><a href="password.php" class="btn btn-primary">change password</a> </td>




                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                </table>
            </div>
        </div>
    </div>

<?php
                        }
?>

</body>

</html>