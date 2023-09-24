<?php
require "connect.php";

// if (isset($_POST['play'])) {
//     $nama = $_POST["nama"];
//     $nomer = $_POST["noTelp"];
//     $email = $_POST["emailk"];
//     $tanggalMain = date("Y/m/d");
//     $status = 0;

//     $sql = mysqli_query($con, "SELECT * FROM quiz where email='$email'");
//     if (mysqli_num_rows($sql) > 0) {
//         if ($row['menang' == 0]) {
//             header('location: quiz.php');
//         } else {
//             header('location: index.php?status=0');
//         }

//     } else {
//         $sql0 = "INSERT INTO quiz (id, email, tanggal_main, no_telp, menang) VALUES (NULL, '$email', '$tanggalMain', '$nomer', '$status')";
//         mysqli_query($con, $sql0);
//         $idUser = mysqli_insert_id($con);
//         header("location: quiz.php?userId=$idUser");

//     }


// }

header('location: quiz.php');
?>