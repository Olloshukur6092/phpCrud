<?php 
    include("connect.php");

    $sql = "SELECT * FROM post";

    $query = mysqli_query($connect, $sql);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="./plugins/css/bootstrap.min.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <h3>
                    <a href="" class="navbar-brand text-uppercase">Brand</a>
                </h3>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link mr-3">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="./users/register.php" class="nav-link">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="./users/login.php" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>  

    <section>
        <div class="container mt-4">
            <div class="row mt-3">
            <?php if(mysqli_num_rows($query) > 0) : ?>
                <?php while($row = mysqli_fetch_assoc($query)) : ?>
                        <div class="col-md-4">
                            <div class="card border-0 shadow">
                                <div class="card-header text-center">
                                    <h3><?= $row['postName'] ?></h3>
                                </div>
                                <div class="card-body">
                                    <strong class="text-center"><?= $row["postTitle"] ?></strong>
                                    <hr>
                                    <p><?= $row["postBody"] ?></p>
                                </div>
                                <div class="card-footer text-center">
                                    <p>Copy &copy;2021.12.23</p>
                                </div>
                            </div>
                        </div>
                <?php endwhile ?>
            <?php endif ?>
            </div>
        </div>
    </section>
</body>
</html> 