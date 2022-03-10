<?php
    include ("../connect.php");
    session_start();
    $errors = array();
    
    $login = "";
    $password = "";

    if (isset($_SESSION["admin_id"])) {
        header("location: dashboard.php");
    }

    if (isset($_POST["submit"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        if (empty($login)) {
            array_push($errors, "Login is required!");
        }
        if (empty($password)) {
            array_push($errors, "Password is required!");
        }

        if (count($errors) == 0) {
            $sql = "SELECT * FROM admin WHERE login = '$login' AND password = '$password'";   

            $query = mysqli_query($connect, $sql);

            if ($query->num_rows == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION["admin_id"] = $row["username"];
                header("location: dashboard.php");
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="../plugins/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
               <div class="card">
                   <div class="card-header text-center">
                       <h3>Admin Login</h3>
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
                            <label for="login">Enter Login</label>
                            <input type="text" class="form-control" name="login" id="login" value="<?php echo $login; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="password">Enter Password</label>
                            <input type="text" class="form-control" name="password" id="password" value="<?php echo $password; ?>" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                        </div>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</body>
</html>