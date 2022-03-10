<?php

    include ("../connect.php");

    if (isset($_GET["id"])) {
        $deleteId = $_GET["id"];

        $sql = "DELETE FROM post WHERE id='$deleteId'";

        $query = mysqli_query($connect, $sql);

        if ($query) {
            header("Location: allPost.php");
        }

        else {
            echo "<script>alert('Xatolikkkk!!!!')</script>";
        }

    }



?>