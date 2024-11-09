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
        <div class="row">
            <div class="col-lg-3">
                <?php include('nav.php'); ?>
            </div>
            <div class="col-lg-9">

                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="verified-tab" data-bs-toggle="tab" data-bs-target="#verified" type="button" role="tab" aria-controls="verified" aria-selected="true">verified</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="unverified-tab" data-bs-toggle="tab" data-bs-target="#unverified" type="button" role="tab" aria-controls="unverified" aria-selected="true">unverified</button>
                        </li>

                    </ul>
                </div>


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="verified" role="tabpanel" aria-labelledby="verified-tab">

                        <div>
                            <?php

                            if (isset($_GET['ver'])) {
                                echo '<div class="alert alert-success">' . htmlspecialchars($_GET['ver']) . '</div>';
                                unset($_GET['ver']);
                            }
                            ?>
                        </div>


                        <h3>users details</h3>


                        <table class=table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Password</th>

                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                $con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');


                                $sql = "SELECT id,name,password  FROM users where verified=1 ORDER BY id DESC";

                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $x = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>


                                    <tr>
                                        <td><?php echo $x++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['password']; ?></td>

                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>




                    <div class="tab-pane fade" id="unverified" role="tabpanel" aria-labelledby="unverified-tab">
                        <h3>users details</h3>


                        <table class=table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Password</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "user_db") or die('cant connect');


                                $sql = "SELECT id,name,password  FROM users where verified=0 ORDER BY id DESC";
                                $cnt = 1;
                                $result = mysqli_query($con, $sql);
                                $row = mysqli_fetch_assoc($result);

                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo $cnt++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td> <a href="verify.php?id=<?php echo $row['id']; ?>">verify</a>

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
    </div>
</body>

</html>