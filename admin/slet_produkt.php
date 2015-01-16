<?php


include_once "../includes/db_connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM produkter WHERE Id=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);


$sql = "DELETE FROM produkter WHERE Id=$id";
$result = mysqli_query($connection, $sql);

header("Location: produkter.php");exit;

?>