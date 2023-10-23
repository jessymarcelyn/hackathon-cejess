<?php
session_start();
require 'connect.php';

if (isset($_POST['save'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = :username AND password = :password";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $_SESSION["id"] = $row['username'];
        header("location: admindashbord.php");
        exit;
    } else {
        header('location: login.php?error=1');
    }
}
?>
