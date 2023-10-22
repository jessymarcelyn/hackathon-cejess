<?php
require "connect.php";

if (isset($_POST['pay'])) {
    echo "masuk";
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
    // $foto = $_POST['photo'];
    $total = $_POST['total'];

    try {
        // Insert the main transaction
        $sql0 = "INSERT INTO transaksi (id_transaksi, tanggal_transaksi, total_transaksi, status, id_user, nama_rekening) 
        VALUES (null, :tanggalTransaksi, :total, :status, :idUser, :nama_rekening)";

        $stmt0 = $con->prepare($sql0);
        $stmt0->bindParam(':tanggalTransaksi', $tanggalTransaksi);
        $stmt0->bindParam(':total', $total);
        $stmt0->bindParam(':status', $status);
        $stmt0->bindParam(':idUser', $idUser);
        $stmt0->bindParam(':nama_rekening', $nama_rekening);
        echo "g $tanggalTransaksi ";
        echo "h $total ";
        echo  "k $status ";
        echo "l $idUser ";
        echo "D $nama_rekening ";

        if ($stmt0->execute()) {
            $id_transaksi = $con->lastInsertId();

            // Insert detail transactions for wisatas from 1 to 10
            for ($i = 1; $i <= 10; $i++) {
                $sql = "SELECT * FROM wisata WHERE id_wisata = :id_wisata";
                $stmt = $con->prepare($sql);
                $stmt->bindParam(':id_wisata', $i, PDO::PARAM_INT);
                $stmt->execute();

                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $quantityVar = "q" . $i;
                $quantity[$i] = isset($_POST[$quantityVar]) ? $_POST[$quantityVar] : 0;
                $amount = $quantity[$i] * $row['harga'];

                // Build the WhatsApp message
                $whatsappMessage = "*Detail pesanan =* \n";
                        
                // Check q1 and add it to the message if it's greater than 0
                if ($q1 > 0) {
                    $whatsappMessage .= "Raja Domba=" . $q1 . "\n";
                }
                if ($q2 > 0) {
                    $whatsappMessage .= "Rumah Batik=" . $q2 . "\n";
                }
                if ($q3 > 0) {
                    $whatsappMessage .= "Rumah Akar=" . $q3 . "\n";
                }
                if ($q4 > 0) {
                    $whatsappMessage .= "Sendang Tirto Gumitir=" . $q4 . "\n";
                }
                if ($q5 > 0) {
                    $whatsappMessage .= "PPG Wisata Pinus=" . $q5 . "\n";
                }
                if ($q6 > 0) {
                    $whatsappMessage .= "Cafe Gumitir=" . $q6 . "\n";
                }
                if ($q7 > 0) {
                    $whatsappMessage .= "Terowongan Mrawan=" . $q7 . "\n";
                }
                if ($q8 > 0) {
                    $whatsappMessage .= "Stasiun Mrawan=" . $q8 . "\n";
                }
                if ($q9 > 0) {
                    $whatsappMessage .= "Kopi Ketakasi=" . $q9 . "\n";
                }
                if ($q10 > 0) {
                    $whatsappMessage .= "Pabrik Kopi Mrawan=" . $q10. "\n";
                }
        
                $whatsappMessage .= "*Total Pembayaran=" . $total. "*\n";
                $whatsappMessage .= "(kirim bukti transfer)";

                // URL encode the WhatsApp message
                $encodedMessage = rawurlencode($whatsappMessage);
            
                // Construct the WhatsApp URL
                $whatsappURL = "https://wa.me/6285707003873?text=" . $encodedMessage;
            
                // Redirect to WhatsApp
                header("Location: $whatsappURL");
                exit; // Make sure to exit to prevent further execution
            }
        } else {
            echo "Error: " . $stmt0->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
