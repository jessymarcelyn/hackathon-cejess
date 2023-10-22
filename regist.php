<?php
require "connect.php";

if (isset($_POST['save'])) {
    $tgl = $_POST['tgl'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $email = $_POST['email'];

    // Check if the email already exists
    $sql = $con->prepare("SELECT * FROM user WHERE email = :email");
    $sql->bindParam(':email', $email, PDO::PARAM_STR);
    $sql->execute();

    // Insert a new user
    $insertUser = $con->prepare("INSERT INTO user (nama, email, no_telp) VALUES (:nama, :email, :nomor)");
    $insertUser->bindParam(':nama', $nama, PDO::PARAM_STR);
    $insertUser->bindParam(':email', $email, PDO::PARAM_STR);
    $insertUser->bindParam(':nomor', $nomor, PDO::PARAM_STR);
    $insertUser->execute();

    $idUser = $con->lastInsertId();

    header("Location: payment.php?id_user=${idUser}&tgl=${tgl}&q1=${q1}&q2=${q2}&q3=${q3}&q4=${q4}&q5=${q5}&q6=${q6}&q7=${q7}&q8=${q8}&q9=${q9}&q10=${q10}");
}
?>
