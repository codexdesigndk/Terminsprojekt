<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "terminsprojekt";


$connection = mysqli_connect($host, $user, $password, $database) or die("No database connection!");

$charset = mysqli_set_charset($connection, "utf8");
?>