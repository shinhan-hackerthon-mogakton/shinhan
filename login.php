<?php

session_start();
include_once("dbcon.php");
$stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$hash = md5($_POST['password']);
if ($row['password'] === $hash) {
    echo "Welcome!";
} else {
    echo "아이디 혹은 비밀번호를 확인해 주세요!";
}
$_SESSION["loggedin"] = true;
$_SESSION["username"] = $_POST['username'];

$stmt->close();
$conn->close();

?>