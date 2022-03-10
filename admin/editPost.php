<?php
    include ("../connect.php");
    session_start();

    if (isset($_GET["id"])) {
        $postid = $_GET['id'];
        $sql = "SELECT * FROM post WHERE id='$postid'";
        $query = mysqli_query($connect, $sql);

        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_assoc($query);
            $postName = $row["postName"];
            $postTitle = $row["postTitle"];
            $postBody = $row["postBody"];
        }

    }

    if (isset($_POST["update"])) {
        $postid = $_GET["id"];
        $postName = $_POST["postName"];
        $postTitle = $_POST["postTitle"];
        $postBody = $_POST["postBody"];

        $sql = "UPDATE post SET postName = '$postName', postTitle = '$postTitle', postBody = '$postBody' WHERE id = '$postid'";

        $query = mysqli_query($connect, $sql);

        if ($query) {
            header("Location: allPost.php");
        }
        else {
            echo "<script>alert('Malumot yangilanmadi...')</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
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
                            <a href="logout.php" class="nav-link mr-3">Loguot</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section id="addpost">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-body">
                        <h3 class="text-center">Add New Post</h3>
                        <hr />
                        <form method="post">
                            <div class="form-group">
                                <label for="postName">Post name</label>
                                <input type="text" class="form-control" name="postName" id="postName" value="<?= $postName; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="postTitle">Post title</label>
                                <input type="text" class="form-control" name="postTitle" id="postTitle" value="<?= $postTitle; ?>" />
                            </div>
                            <div class="form-group">
                                <label for="postBody">Post body</label>
                                <textarea name="postBody" id="postBody" cols="30" rows="10" class="form-control"><?= $postBody; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="postid" />
                                <input type="submit" value="Update" name="update" class="btn btn-primary" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>