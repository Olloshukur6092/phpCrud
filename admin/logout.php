<?php 

session_start();
session_destroy();

header("location: adminLogin.php");

?>