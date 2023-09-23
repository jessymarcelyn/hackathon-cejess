<?php
require "connect.php";

if(isset($_POST['pay'])) {
    
    $idUser = $_POST['idUser'];
    $tanggalTransaksi = date("Y/m/d");
    $status = "0"; 
    
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
    $nama_rekening = $_POST['name'];
    $foto = $_POST['photo'];
    $totalAmount = 0;


    // Insert the main transaction
    $sql0 = "INSERT INTO transaksi (id_transaksi, tanggal_transaksi, total_transaksi, status, id_user, nama_rekening, foto) 
             VALUES (null, '$tanggalTransaksi', 0, '$status', '$idUser', '$nama_rekening', '$foto')";

if (mysqli_query($con, $sql0)) {
    $id_transaksi = mysqli_insert_id($con);

    // Insert detail transactions for wisatas from 1 to 10
    for ($i = 1; $i <= 10; $i++) {

        $sql = "SELECT * FROM wisata WHERE id_wisata = $i";
            $result = mysqli_query($con, $sql);
          
            if ($result) {
            $row = mysqli_fetch_assoc($result);
            
            $quantityVar = "q" . $i;

            $quantity[$i] = isset($_POST[$quantityVar]) ? $_POST[$quantityVar] : 0;

            $amount = $quantity[$i] * $row['harga'];


            }
        $totalAmount += $amount; // Accumulate total amount

        $sql_insert_detail = "INSERT INTO detail_transaksi (id_detail, quantity, amount, id_wisata, id_transaksi) VALUES (null, $quantity[$i], $amount, $i, $id_transaksi)";
        $query_insert_detail = mysqli_query($con, $sql_insert_detail);

        if (!$query_insert_detail) {
            echo "Error inserting detail transaction for wisata $i: " . mysqli_error($con);
        }
    }

    // Update the total with the calculated total amount
    $sql_update_total = "UPDATE transaksi SET total_transaksi = $totalAmount WHERE id_transaksi = $id_transaksi";
    if (mysqli_query($con, $sql_update_total)) {
        echo "Transaction successful. ID: $id_transaksi";
        header("Location: index.php");
    } else {
        echo "Error updating total: " . mysqli_error($con);
    }
} else {
    echo "Error: " . mysqli_error($con);
}
}
?>
