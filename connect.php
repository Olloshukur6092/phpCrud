<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$connect = mysqli_connect($servername, $username, $password, $dbname);

if (!$connect) {
    die("Ulanishda Xatolik !!!");
}

?>