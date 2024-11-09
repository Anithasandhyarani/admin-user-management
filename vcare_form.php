<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vacare_form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">

        <h2>Vcare-form</h2><br>

        <div class="mb-3">

            <input type="text" class="form-control w-25" name="name" value="" placeholder="Name" required>
        </div>
        <div class="mb-3">

            <input type="text" class="form-control w-25" name="email" value="" placeholder="Email" required>
        </div>
        <div class="mb-3">

            <input type="tel" class="form-control w-25" name="phone" value="" placeholder="Phone number" required>
        </div>

        <div class="mb-3">
            <select class="form-control w-25" name="dropdown-menu">
                <option selected>Select locations</option>
                <option value="1">TN-CHENNAI-TNAGAR</option>
                <option value="2">TN-CHENNAI-ANNA NAGAR</option>
                <option value="3">TN-CHENNAI-AMBATTUR</option>
                <option value="4">TN-CHENNAI-VELACHERY</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">submit</button>



    </div>

</body>

</html>