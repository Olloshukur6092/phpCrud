<?php 

session_start();
session_destroy();

header("location: users/login.php");

?>