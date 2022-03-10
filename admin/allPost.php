<?php
    include("../connect.php");
    session_start();

    $sql = "SELECT * FROM post";

    $query = mysqli_query($connect, $sql);

    $count = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Post</title>
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
    <section id="allPost">
        <div class="container mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Post Name</th>
                        <th>Post Title</th>
                        <th>Post Body</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <?php while($row = mysqli_fetch_assoc($query)) { ?>
                    <tbody>
                        <tr>
                            <td><?= $count; ?></td>
                            <td><?= $row['postName']; ?></td>
                            <td><?= $row['postTitle']; ?></td>
                            <td><?= substr($row['postBody'], 0, 20). "... "; ?></td>
                            <td class="text-center">
                                <a href="editPost.php?id=<?= $row['id'] ?>" class="btn btn-success px-3 py-1 mr-2">Edit</a>
                                <a href="deletePost.php?id=<?= $row['id'] ?>" class="btn btn-danger px-2 py-1">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                <?php $count++; }?>
            </table>
        </div>
    </section>
</body>
</html>