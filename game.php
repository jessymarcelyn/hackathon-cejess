<?php
// require "connect.php";

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
//         header("location: quiz.php");

//     }


// }

// header('location: quiz.php');
require "connect.php";

if (isset($_POST['play'])) {
    $nama = $_POST["nama"];
    $nomer = $_POST["noTelp"];
    $email = $_POST["emailk"];
    $tanggalMain = date("Y/m/d");
    $status = 0;

    $stmt = $con->prepare("SELECT * FROM quiz WHERE email = :email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['menang'] == 0) {
            header('location: quiz.php');
        } else {
            header('location: index.php?status=0');
        }
    } else {
        $sql0 = "INSERT INTO quiz (id, email, tanggal_main, no_telp, menang) VALUES (NULL, :email, :tanggalMain, :nomer, :status)";
        $stmt0 = $con->prepare($sql0);
        $stmt0->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt0->bindParam(':tanggalMain', $tanggalMain, PDO::PARAM_STR);
        $stmt0->bindParam(':nomer', $nomer, PDO::PARAM_STR);
        $stmt0->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt0->execute();

        $idUser = $con->lastInsertId();
        header("location: quiz.php?userId=$idUser");
    }
}

header('location: quiz.php');

?>