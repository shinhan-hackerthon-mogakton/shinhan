<?php
session_start();
$conn = mysqli_connect(
    'localhost',
    'root',
    'mariadb',
    'shinhan');
$sql = "SELECT * FROM techtrade";
$result = mysqli_query($conn, $sql);
$conn->set_charset("utf8mb4");

?>