<?php 
    include("../connect.php");
    session_start();

    if (!isset($_SESSION["session_id"])) {
        header("Location: login.php");
    }

    $sql = "SELECT * FROM images";

    $query = mysqli_query($connect, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <h3>
                    <a href="" class="navbar-brand text-uppercase"><?= $_SESSION["session_id"]; ?></a>
                </h3>
                <div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link mr-3">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="messages.php" class="nav-link mr-3" >Messages</a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link mr-3">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>  

    <section>
        <div class="container mt-4">
            <?php if(mysqli_num_rows($query) > 0) : ?>
                <div class="row">
                <?php while($row = mysqli_fetch_assoc($query)) : ?>
                        <div class="col-md-4">
                            <div class="card border-0 shadow mb-4">
                                <div class="card-header text-center">
                                    <h3><?= $row['imageTitle'] ?></h3>
                                </div>
                                <div class="card-body">
                                    <div class="block">
                                        <img class="img-fluid" src="../admin/images/<?php echo $row["postImage"]; ?>" alt="<?php echo $row["imageTitle"]; ?>">
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <p>Copy &copy; <?= $row["postDate"] ?> </p>
                                </div>
                            </div>
                        </div>
                <?php endwhile ?>
                </div>
            <?php endif ?>
        </div>
    </section>
</body>
</html> 