<?php
    include("../connect.php");
    session_start();

    $mtitle = "";
    $message = "";
    $errors = array();
    if (isset($_POST["send"])) {
        $mtitle = $_POST["mTitle"];
        $message = $_POST["message"];

        if (empty($mtitle)) {
            array_push($errors, "Title is required...");
        }
        if (empty($message)) {
            array_push($errors, "Message is required...");
        }

        if (count($errors) == 0) {
            $sql = "INSERT INTO messages(mTitle, message) VALUES ('$mtitle', '$message')";

            $query = mysqli_query($connect, $sql);

            if ($query) {
                echo "<script>alert('Xabar jonatildi!!!')</script>";
            }
            else {
                echo "<script>alert('Xabarni yuborib bolmadi...!!!')</script>";
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
    <title>Message Page</title>
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
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card card-body shadow border-0 mt-4">
                        <h4 class="text-center">Message...</h4>
                        <form method="post">
                            <div class="form-group">
                                <label for="mTitle">Description</label>
                                <input type="text" class="form-control" name="mTitle" id="mTitle" placeholder="message title..." />    
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="message write..." ></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send" class="btn btn-primary px-2 py-1" name="send">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>