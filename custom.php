<?php
session_start();
require "connect.php";
include('navWisata.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .plusminus {
            margin-top: 3%;
            height: 30px;
            /* width: 30%; */
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            background-color: #1e4e34;
            color: white;
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        }

        .spanplusminus {
            width: 35%;
            text-align: center;
            font-size: 110%;
            cursor: default;
            user-select: none;
        }

        body {
            box-sizing: border-box;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #f7f8fa;
        }
    </style>
</head>

<body>
    <div id="testimoni" class="testimoni section">
        <div class="container">
            <form action="booking.php" method="post">
                <div class="row">
                    <div class="rounded-info">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Pilih Paket Wisata yang Anda Inginkan</h4>
                                <p class="text-start">
                                    Kunjungi lokasi-lokasi favoritmu dengan pilihan yang tersedia.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="date" class="form-control mb-2" id="tgl">

                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn mb-5 text-white" style="background:#1e4e34"
                                            onclick="detail1()">Book</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <?php
                        // Establish a PDO connection
                        try {
                            $con = new PDO("mysql:host=localhost;dbname=hackathon23", 'root', '');
                            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                            die();
                        }
                        for ($i = 1; $i <= 10; $i++) {
                            $stmt = $con->prepare("SELECT * FROM wisata WHERE id_wisata = :id_wisata");
                            $stmt->bindParam(':id_wisata', $i, PDO::PARAM_INT);
                            $stmt->execute();

                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($row) {
                                ?>
                                <div class="col-md-6">
                                    <div class="box-item">

                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5>
                                                    <?= $row["nama"] ?>
                                                </h5>
                                                <h7>Rp
                                                    <?= number_format($row["harga"], 0, ',', '.') ?>
                                                </h7>
                                            </div>
                                            <div class="col-md-4">
                                                <input style="color:#fff" type="hidden" name="idQ<?= $i ?>"
                                                    id="quantity<?= $i ?>">
                                                <div class="plusminus">
                                                    <span class="text-white me-2 spanplusminus" id="minus<?= $i ?>">-</span>
                                                    <span class="text-white" id="num<?= $i ?>" class="spanplusminus">01</span>
                                                    <span class="text-white ms-2 spanplusminus" id="plus<?= $i ?>">+</span>
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                </div>
                                <script>
                                    let quantity<?= $i ?> = 0;

                                    function updateQuantity<?= $i ?>(value) {
                                        if (quantity<?= $i ?> === 0 && value === -1) {
                                            return;
                                        }
                                        quantity<?= $i ?> += value;
                                        let quantityInput<?= $i ?> = document.getElementById("quantity<?= $i ?>");
                                        quantityInput<?= $i ?>.value = quantity<?= $i ?>;

                                        let num<?= $i ?> = document.getElementById("num<?= $i ?>");
                                        num<?= $i ?>.innerText = quantity<?= $i ?>;

                                        let minus<?= $i ?> = document.getElementById("minus<?= $i ?>");
                                        if (quantity<?= $i ?> === 0) {
                                            minus<?= $i ?>.classList.add('disabled');
                                        } else {
                                            minus<?= $i ?>.classList.remove('disabled');
                                        }
                                    }

                                    document.getElementById("plus<?= $i ?>").addEventListener("click", () => {
                                        updateQuantity<?= $i ?>(1);
                                    });

                                    document.getElementById("minus<?= $i ?>").addEventListener("click", () => {
                                        updateQuantity<?= $i ?>(-1);
                                    });
                                    updateQuantity<?= $i ?>(0);
                                </script>
                                <?php
                            }
                        }
                        ?>
                    </div>

                </div>
                <script>
                    let tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 2);
                    let tomorrowFormatted = tomorrow.toISOString().split('T')[0];

                    document.getElementById('tgl').setAttribute('min', tomorrowFormatted);

                    function detail1() {
                        let tgl = document.getElementById("tgl").value;
                        let a1 = document.getElementById("quantity1").value;
                        let a2 = document.getElementById("quantity2").value;
                        let a3 = document.getElementById("quantity3").value;
                        let a4 = document.getElementById("quantity4").value;
                        let a5 = document.getElementById("quantity5").value;
                        let a6 = document.getElementById("quantity6").value;
                        let a7 = document.getElementById("quantity7").value;
                        let a8 = document.getElementById("quantity8").value;
                        let a9 = document.getElementById("quantity9").value;
                        let a10 = document.getElementById("quantity10").value;
                        if (tgl === "" || (a1 == 0 && a2 == 0 && a3 == 0 && a4 == 0 && a5 == 0 && a6 == 0 && a7 == 0 && a8 == 0 && a9 == 0 && a10 == 0)) {
                            // Handle the case where tgl is empty or a1 and a2 are both empty
                            alert("Mohon lengkapi form");
                        }
                        else {
                            location.href = `user.php?tgl=${tgl}&q1=${a1}&q2=${a2}&q3=${a3}&q4=${a4}&q5=${a5}&q6=${a6}&q7=${a7}&q8=${a8}&q9=${a9}&q10=${a10}`;
                        }
                    }
                </script>
            </form>
        </div>
    </div>
</body>

</html>