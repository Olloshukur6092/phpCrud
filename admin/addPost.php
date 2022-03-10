<?php
    include ("../connect.php");
    session_start();

    $postName = "";
    $postTitle = "";
    $postBody = "";

    $errors = array();
    
    if (isset($_POST['submit'])) {
        $postName = $_POST['postName'];
        $postTitle = $_POST['postTitle'];
        $postBody = $_POST['postBody'];

        if (empty($postName)) {
            array_push($errors, "Post Name is required");
        }
        if (empty($postTitle)) {
            array_push($errors, "Post title is required");
        }
        if (empty($postBody)) {
            array_push($errors, "Post body is required");
        }

        if (count($errors) == 0) {

            $sql = "INSERT INTO post(postName, postTitle, postBody) VALUES ('$postName', '$postTitle', '$postBody')";

            $query = mysqli_query($connect, $sql);

            if ($query) {
                $_SESSION["post_id"] = $postName;
                header("Location: addPost.php");
            }

            else {
                "<script>alert('Sizda Xatolik!!!')</script>";
            }

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
    <section id="addpost">
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-body">
                        <h3 class="text-center">Add New Post</h3>
                        <hr />
                        <form method="post">
                            <?php if(count($errors) > 0) : ?>
                                <div class="alert alert-danger">
                                    <?php foreach($errors as $error) : ?>
                                        <p><?php echo $error; ?></p>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
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
                                <input type="submit" value="Submit" name="submit" class="btn btn-primary" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>