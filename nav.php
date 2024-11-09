<?php
$isadmin = isset($_SESSION['isadmin']) ? $_SESSION['isadmin'] : "";
?>

<ul class="navbar-nav mb-2 mb-lg-0">
    <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Home</a>
    </li>
    <?php if ($isadmin) { ?>
        <li class="nav-item">
            <a class="nav-link" href="details.php">User List</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="userpost_all.php">User Post List</a>
        </li>

    <?php
    } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="post_list.php">Posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Profile.php">Profile</a>
        </li>
    <?php
    }
    ?>

    <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
    </li>
</ul>