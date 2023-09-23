<?php
session_start();
require "connect.php";
include('navbar.php')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Galeri Gumitir</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

    <script src="jquery-3.6.1.js" type="text/javascript"></script>

    <!-- buat date picker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="sweetalert2.all.min.js"></script> -->

    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/201ca005c3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Favicon - generated from https://favicon.io/favicon-converter/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png" />
    <link rel="manifest" href="./assets/favicon/site.webmanifest" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

    <style>
        body {
            min-height: 80vh;
            background: linear-gradient(#1e4e34, #E9EEF2);
            background-size: contain;
            height: 100%;
            overflow: hidden;
        }

        .wrapper {
            background-color: #E9EEF2;
            width: 600px;
            padding: 20px;
            margin: auto;
            border-style: solid;
            border-radius: 20px;
            padding: -2px;
            /* margin-top: 5%; */
            margin-bottom: 8px;
        }
    </style>
</head>
<script>
    //buat date picker booking form check in
    $(function () {
        $('#tglLahir').datepicker({
            format: "yyyy/mm/dd",
            language: "fr",
            changeMonth: true,
            changeYear: true
        });


        <?php if (isset($_GET['status']) && $_GET['status'] == 0): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email sudah terdaftar, silahkan gunakan email lain.',
                footer: ''
            })
        <?php endif ?>

        <?php if (isset($_GET['status2']) && $_GET['status2'] == 0): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal lahir tidak valid',
                footer: ''
            })
        <?php endif ?>

        <?php if (isset($_GET['status3']) && $_GET['status3'] == 0): ?>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tanggal lahir tidak valid',
                footer: ''
            })
        <?php endif ?>
    });

</script>



<body>
    <div class="main-banner">
        <?php
        $tgl = $_GET['tgl'];
        $q1 = $_GET['q1'];
        $q2 = $_GET['q2'];
        $q3 = $_GET['q3'];
        $q4 = $_GET['q4'];
        $q5 = $_GET['q5'];
        $q6 = $_GET['q6'];
        $q7 = $_GET['q7'];
        $q8 = $_GET['q8'];
        $q9 = $_GET['q9'];
        $q10 = $_GET['q10'];
        ?>
        <div class="wrapper">
            <a href="custom.php" class="text-primary"><i><u> &#171; kembali </u> </i> </a>
            <h2 style='text-align: center;'>Sign Up</h2>
            <!-- <p>Please fill this form to create an account</p> -->
            <form action="regist.php" method="post">
                <input class="form-control" type="hidden" name="tgl" value="<?php echo ($tgl); ?>">
                <input class="form-control" type="hidden" name="q1" value="<?php echo ($q1); ?>">
                <input class="form-control" type="hidden" name="q2" value="<?php echo ($q2); ?>">
                <input class="form-control" type="hidden" name="q3" value="<?php echo ($q3); ?>">
                <input class="form-control" type="hidden" name="q4" value="<?php echo ($q4); ?>">
                <input class="form-control" type="hidden" name="q5" value="<?php echo ($q5); ?>">
                <input class="form-control" type="hidden" name="q6" value="<?php echo ($q6); ?>">
                <input class="form-control" type="hidden" name="q7" value="<?php echo ($q7); ?>">
                <input class="form-control" type="hidden" name="q8" value="<?php echo ($q8); ?>">
                <input class="form-control" type="hidden" name="q9" value="<?php echo ($q9); ?>">
                <input class="form-control" type="hidden" name="q10" value="<?php echo ($q10); ?>">

                <div class="container text-center">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap"
                            required>
                    </div>
                </div>
                <div class="container text-center">
                    <div class="row align-items-start">
                        <div class="col">
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nomor" id="nomor"
                                    placeholder="Nomor Telepon" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" required
                                    aria-describedby="emailHelp" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" style="display:flex; justify-content:center">
                    <button type="submit" name="save" class="btn text-white px-4  mt-1"
                        style="background: #1e4e34">Lanjutkan ke
                        Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>