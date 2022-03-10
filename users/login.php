<?php
    include ("../connect.php");
    session_start();
    $errors = array();
    
    $email = "";
    $password = "";

    if (isset($_SESSION["session_id"])) {
        header("location: profile.php");
    }

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (empty($email)) {
            array_push($errors, "Email is required!");
        }
        if (empty($password)) {
            array_push($errors, "Password is required!");
        }

        if (count($errors) == 0) {
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";   

            $query = mysqli_query($connect, $sql);

            if ($query->num_rows == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION["session_id"] = $row["fname"];
                header("location: profile.php");
            }

            else {
                echo "<script>alert('Xatolik Yuz berdi!!!')</script>";
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
    <title>Document</title>
    <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">
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
                            <a href="../index.php" class="nav-link mr-3">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="../users/register.php" class="nav-link mr-3">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="../users/login.php" class="nav-link mr-3">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
               <div class="card">
                   <div class="card-header text-center">
                       <h3>Users Login</h3>
                   </div>
                   <div class="card-body">
                    <form method="post">
                        <? if(count($errors)) : ?>
                            <div class="alert alert-danger">
                                <? foreach($errors as $error) :?>
                                    <p><? echo $error; ?></p>
                                <? endforeach ?>
                            </div>
                            <? endif ?>
                        <div class="form-group">
                            <label for="email">Enter Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="password">Enter Password</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?php echo $password; ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                        </div>
                        <p>Ro'yhatdan o'tmaganmisiz? &nbsp;&nbsp; <a href="register.php" style="text-decoration: none !important;">Register</a></p>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</body>
</html>