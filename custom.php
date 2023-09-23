<?php session_start();
require "connect.php";
include('navbar.php'); ?>
<style>
    /* Your custom CSS styles */
    .plusminus {
        margin-top: 3%;
        height: 60%;
        width: 30%;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #0D33EE;
        color: white;
        border-radius: 8px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .spanplusminus {
        width: 35%;
        text-align: center;
        font-size: 110%;
        cursor: pointer;
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

<body>

    <div id="testimoni" class="testimoni section">
        <div class="container">
            <form action="booking.php" method="post">
                <div class="row">
                    <div class="col-lg-12 align-self-center">
                        <div class="section-heading">
                            <h4>Pilih Paket Wisata yang Anda Inginkan</h4>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eismod tempor incididunt ut labore et dolore magna.
                            </p>
                        </div>

                        <div class="row">
                            <?php
                            for ($i = 1; $i <= 10; $i++) {
                                $sql = "SELECT * FROM wisata WHERE id_wisata = '$i'";
                                $res1 = mysqli_query($con, $sql);

                                if (!empty($res1)) {
                                    while ($row = mysqli_fetch_array($res1)) {
                                        ?>

                                        <div class="col-lg-3">
                                            <div class="box-item">
                                                <h4><a href="#">
                                                        <?= $row["nama"] ?>
                                                    </a></h4>
                                                <input style="color:#fff" type="hidden" name="idQ<?= $i ?>" id="quantity<?= $i ?>">
                                                <div class="plusminus">
                                                    <span class="text-white me-2" id="minus<?= $i ?>" class="spanplusminus">-</span>
                                                    <span class="text-white" id="num<?= $i ?>" class="spanplusminus">01</span>
                                                    <span class="text-white ms-2" id="plus<?= $i ?>" class="spanplusminus">+</span>
                                                </div>
                                            </div>
                                        </div>


                                        <script>
                                            let quantity<?= $i ?> = 0;

                                            // Function to update quantity and display
                                            function updateQuantity<?= $i ?>(value) {
                                                // Ensure the quantity doesn't go below 0
                                                if (quantity<?= $i ?> === 0 && value === -1) {
                                                    return;
                                                }

                                                quantity<?= $i ?> += value;

                                                // Update the input and display
                                                let quantityInput<?= $i ?> = document.getElementById("quantity<?= $i ?>");
                                                quantityInput<?= $i ?>.value = quantity<?= $i ?>;

                                                let num<?= $i ?> = document.getElementById("num<?= $i ?>");
                                                num<?= $i ?>.innerText = quantity<?= $i ?>;

                                                // Disable/Enable minus button based on quantity
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

                                            // Call the function to set initial state to '0'
                                            updateQuantity<?= $i ?>(0);
                                        </script>
                                        <?php
                                    }
                                }
                            }
                            ?>

                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <input type="date" class="form-control mb-2" id="tgl">

                                    <button type="button" class="btn btn-secondary" onclick="detail1()">Book</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <script>
                        // Get today's date in the format YYYY-MM-DD
                        let tomorrow = new Date();
                        tomorrow.setDate(tomorrow.getDate() + 2);
                        let tomorrowFormatted = tomorrow.toISOString().split('T')[0];

                        // Set the minimum attribute of the date input to today
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

                            // Use backticks (`) for string interpolation
                            location.href = `user.php?tgl=${tgl}&q1=${a1}&q2=${a2}&q3=${a3}&q4=${a4}&q5=${a5}&q6=${a6}&q7=${a7}&q8=${a8}&q9=${a9}&q10=${a10}`;
                        }
                    </script>
            </form>
        </div>
    </div>


</body>