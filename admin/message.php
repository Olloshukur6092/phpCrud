<?php
    include("../connect.php");
    session_start();

    $sql = "SELECT mTitle, message, fname FROM ";

    $query = mysqli_query($connect, $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Message</title>
    <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <h3>
                    <a href="" class="navbar-brand text-uppercase"><?= $_SESSION['admin_id'] ?></a>
                </h3>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link mr-3">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="addPost.php" class="nav-link mr-3">Add Post</a>
                        </li>
                        <li class="nav-item">
                            <a href="allPost.php" class="nav-link mr-3">All Post</a>
                        </li>
                        <li class="nav-item">
                            <a href="newImages.php" class="nav-link mr-3">New Images</a>
                        </li>
                        <li class="nav-item">
                            <a href="message.php" class="nav-link mr-3">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link mr-3">Loguot</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section>
        <div class="container mt-5">
            <?php if (mysqli_num_rows($query) > 0) : ?>
                <div class="row">
                    <?php while($row = mysqli_fetch_assoc($query)) : ?>
                        <div class="col-md-4">
                            <div class="card card-body text-center shadow border-0">
                                <strong>Name:</strong><p><?= $row["fname"] ?>&nbsp;&nbsp;Lname:<?= $row["lname"] ?></p>
                                <br>
                                <hr>
                                <p><?php echo $row["mTitle"]; ?></p>
                                <br><br>
                                <p><?php echo $row["message"]; ?></p>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            <?php endif ?>
        </div>
    </section>
</body>
</html>