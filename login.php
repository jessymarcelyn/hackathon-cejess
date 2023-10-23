<?php include('navbar.php') ?>

<body>
    <div class="wrapper">
        <a href="../" class="text-primary"><i><u> &#171; Kembali </u> </i> </a>
        <form action="loginProcess.php" method="post">
            <h2 class="mt-2 mb-5" style="text-align:center">Login</h2>
            <div class="mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" required placeholder="Kata sandi">
            </div>
            <div class="form-group" style="display:flex; justify-content:center">
                <button type="submit" name="save" class="btn btn-secondary text-white px-4  mt-1">
                    Login</button>
            </div>
            <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo '<p class="text-danger text-center">Login gagal. Username atau password salah.</p>';
                }
                else if (isset($_GET['error']) && $_GET['error'] == 2) {
                    echo '<p class="text-danger text-center">Silahkan login terlebih dahulu.</p>';
                }
            ?>
            <!-- <p class="mt-3 text-center" id="error"></p> -->
        </form>
    </div>
</body>

</html>