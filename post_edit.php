<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location:login.php");
    exit();
}
$id = $_GET['id'];
$_SESSION['id'] = $id;

$con = mysqli_connect("localhost", "root", "", "user_db");
$sql = "SELECT name,post FROM post WHERE id=$id";
$result = mysqli_query($con, $sql);
$user = mysqli_fetch_assoc($result);

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
            <form action="post_update.php" method="post">

                <input type="hidden" class="form-control w-25" name="id" value="<?php echo $id; ?>">
                <h2>Post form</h2>
                <div class="mb-3">
                    <label for="name" class="form-label">Enter the name</label>
                    <input type="text" class="form-control w-25" name="name" value="<?php echo $user['name']; ?>">
                </div>

                <div class=" mb-3">
                    <label for="post" class="form-label">Enter the post</label>
                    <textarea class="form-control w-50" rows="4" name="post"><?php echo $user['post']; ?></textarea>
                </div>
                <div>
                    <button type="update" class="btn btn-primary px-3">update</button><br><br>
                </div>
            </form>
        </div>
    </div>

</body>

</html>