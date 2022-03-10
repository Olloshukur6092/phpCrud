<?php

    include "../connect.php";
    session_start();
    // maydonchalar
    $firstname = "";
    $lastname = "";
    $email = "";
    $telnumber = "";
    $password = "";

    // Xatoliklarni yozadigan massiv
    $errors = array();

    if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $telnumber = $_POST["telnumber"];
        $password = $_POST["password"];

        if (empty($firstname)) {
            array_push($errors, "Firstname is required!!!");
        }
        if (empty($lastname)) {
            array_push($errors, "Lastname is required!!!");
        }
        if (empty($email)) {
            array_push($errors, "Email is required!!!");
        }
        if(empty($telnumber)) {
            array_push($errors, "Your Phone is required!!!");
        }
        if (empty($password)) {
            array_push($errors, "Password is required!!!");
        }

        if (count($errors) == 0) {
            $sql = "INSERT INTO users(fname, lname, email, telnumber, password) VALUES ('$firstname', '$lastname', '$email', '$telnumber', '$password')";

            $query = mysqli_query($connect, $sql);
            // echo $query;
            if ($query) {
                $_SESSION["session_id"] = $firstname;
                header("Location: profile.php");
            }
            else {
                echo "<script>alert('Siz royhatdan ota olmadingiz ???? ??? ')</script>";
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
    <title>Registeration form</title>
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
                            <a href="register.php" class="nav-link mr-3">Register</a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link mr-3">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card border-0 shadow">
                    <div class="card-header text-center">
                        <h4>Register Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <? if (count($errors) > 0) : ?>
                                <div class="alert alert-danger">
                                    <? foreach($errors as $error) : ?>
                                        <p><? echo $error; ?></p>
                                    <? endforeach ?>
                                </div>
                            <? endif ?>
                            <!-- Register start -->
                            <div class="form-group">
                                <label for="firstname">Enter Your Firstname</label>
                                <input type="text" class="form-control"  name="firstname" id="firstname" />
                            </div>
                            <div class="form-group">
                                <label for="lastname">Enter Your Lastname</label>
                                <input type="text" class="form-control"  name="lastname" id="lastname" />
                            </div>
                            <div class="form-group">
                                <label for="email">Enter Your Email</label>
                                <input type="text" class="form-control"  name="email" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="telnumber">Enter Your Phone</label>
                                <input type="text" class="form-control"  name="telnumber" id="telnumber" />
                            </div>
                            <div class="form-group">
                                <label for="password">Enter Your password</label>
                                <input type="text" class="form-control"  name="password" id="password" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit" >
                            </div>
                            <!-- End register form -->
                            <p>Royhatdan otganmisiz? &nbsp;&nbsp; <a href="login.php" style="text-decoration: none !important;">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>