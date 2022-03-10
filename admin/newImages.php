<?php
    include("../connect.php");
    session_start();

    if (isset($_POST["addImage"])) {
        $imageTitle = $_POST["imageTitle"];
        $postImage = $_FILES["postImage"]["name"];

        $extension = substr($postImage, strlen($postImage) - 4, strlen($postImage));

        $allowedExtension = array('.jpg', '.png', 'jpeg', '.gif');

        if (!in_array($extension, $allowedExtension)) {
            echo "<script>alert('Rasm notogri yuklanmoqda ....!!!')</script>";
        }
        else {
            $newFile = md5($postImage).$extension;

            move_uploaded_file($_FILES["postImage"]["tmp_name"], "images/".$newFile);

            $sql = "INSERT INTO images(imageTitle, postImage) VALUES ('$imageTitle', '$newFile')";

            $query = mysqli_query($connect, $sql);

            if ($query) {
                echo "<script>alert('Rasm yuklandi....')</script>";
            }

            else {
                echo "<script>alert('Rasmni yuklab bolmadi...')</script>";
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
    <title>New Images</title>
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div class="card card-body">
                    <h3 class="text-center">New Images Post</h3>
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="imageTitle">Images Title</label>
                            <input type="text" class="form-control" name="imageTitle" id="imageTitle" />
                        </div>
                        <div class="form-group">
                            <label for="postImage">Post Images</label>
                            <input type="file" class="form-control" name="postImage" id="postImage" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Add Image" name="addImage" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>