<?php 
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: adminLogin.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4 offset-4">
                    <div class="card border-none shadow">
                        <div class="card-header bg-primary">
                            <div class="block">
                                <img class="img-fluid" src="images/admin.jpg" alt="Admin Image" />
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-uppercase"><?= $_SESSION["admin_id"]; ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>