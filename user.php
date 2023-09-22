<?php
session_start();
require "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mulung</title>
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

    <script src = "jquery-3.6.1.js" type= "text/javascript"></script>

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

    <style>
    body {
        min-height: 80vh;
        background: linear-gradient(#A1D1E2, #E9EEF2);
        height: 100%;
    }

    .wrapper {
        background-color: #E9EEF2;
        width: 600px;
        padding: 20px;
        margin: auto;
        border-style: solid;
        border-radius: 20px;
        padding: -2px;
        margin-top: 5%;
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
<?php
		$tgl=$_GET['tgl'];
		$q1=$_GET['q1'];
        $q2=$_GET['q2'];
        $q3=$_GET['q3'];
        $q4=$_GET['q4'];
        $q5=$_GET['q5'];
        $q6=$_GET['q6'];
        $q7=$_GET['q7'];
        $q8=$_GET['q8'];
        $q9=$_GET['q9'];
        $q10=$_GET['q10'];
        ?>
    <div class="wrapper">
        <a href="../" class="text-primary"><i><u> &#171; kembali </u> </i> </a>
        <h2 style='text-align: center;'>Sign Up</h2>
        <!-- <p>Please fill this form to create an account</p> -->
        <form action="regist.php" method="post">
        <input type="hidden" name="tgl" value="<?php echo ($tgl); ?>">
        <input type="hidden" name="q1" value="<?php echo ($q1); ?>">
        <input type="hidden" name="q2" value="<?php echo ($q2); ?>">
        <input type="hidden" name="q3" value="<?php echo ($q3); ?>">
        <input type="hidden" name="q4" value="<?php echo ($q4); ?>">
        <input type="hidden" name="q5" value="<?php echo ($q5); ?>">
        <input type="hidden" name="q6" value="<?php echo ($q6); ?>">
        <input type="hidden" name="q7" value="<?php echo ($q7); ?>">
        <input type="hidden" name="q8" value="<?php echo ($q8); ?>">
        <input type="hidden" name="q9" value="<?php echo ($q9); ?>">
        <input type="hidden" name="q10" value="<?php echo ($q10); ?>">

        <div class="container text-center">
            <div class="mb-3">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
            </div>
        </div>
        <div class="container text-center">
            <div class="row align-items-start">
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor Telepon" required>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" id="email" required aria-describedby="emailHelp"
                        placeholder="Email">
                    </div>
                </div>
            </div>
        </div>
            <div class="container" style="display:flex; justify-content:center">
                <button type="submit" name="save" class="btn btn-secondary text-white px-4  mt-1">Lanjutkan ke Pembayaran</button>
            </div>
        </form>
    </div>

</body>

</html>