<?php
require "connect.php";
// include('adminverification.php');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="jquery-3.6.1.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.2.0/css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
		integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
			box-sizing: border-box;
			overflow-x: hidden;
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;


		}

		.nav-link {
			text-decoration: none;
			color: rgba(34, 54, 69, 7);
			font-weight: 500;
			margin-top: 0.2rem;

		}

		hr {
			border: none;
			height: 1px;
			/* Set the hr color */
			color: #333;
			/* old IE */
			background-color: #333;
			/* Modern Browsers */
		}

		.nav-link:hover {
			color: rgb(143, 124, 112);
		}

		ul {
			list-style-type: none;
		}

		.navbar {
			background: white;
			height: 0rem;
			min-height: 10vh;

		}

		.navbar .navbar-brand a {
			padding: 1rem 0;
			display: block;
			text-decoration: none;
		}

		.navbar-brand {
			font-family: 'patrick', cursive;
			margin-right: 2%;
			margin-top: 0.2rem;
		}

		button {
			margin-left: 10px;
		}

		#judul {
			text-align: center;
			color: white;
			font-weight: bold;
			font-size: 1.5rem;
			padding-top: 0.2rem;
			background-color: black;
		}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="admindashbord.php">Welcome Admin</a>
			<button class="navbar-toggler" id="navbartoggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<a class="nav-link " href="admindashbord.php" style="margin-right: 2ex">View Database</a>
			<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
			</div>
		</div>
	</nav>
	<br>
	<p id="judul"
		style=" height : 3rem; text-align: center; margin-right:5rem; margin-left:5rem;">Dashboard
	</p>
	<div class=" dbcard container" style="margin-left : 11rem;">
		<div class="row">
			<div class="card text-bg-primary mb-3 col-4 me-3" style="max-width: 18rem;">
				<div class="card-header">Transaction</div>
				<div class="card-body">
					<p class="card-text">
					<div class="row justify-content-start" style="text-align:center">
						<div class="col-5" style="margin-right:-1.5rem;">
						<?php
							$sql = "SELECT count(*) as total FROM transaksi";
							$stmt = $con->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetch(PDO::FETCH_ASSOC);
							echo "<p style='font-size:2.3rem; padding-left: 1.5rem;'>" . $data['total'] . "</p>";
							?>

							<p style='font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Transaksi</p>

						</div>

						<div class="col-4" style="margin-left: 2rem">
							<i class="fas fa-database fa-4x" style="margin-left:0.5rem"></i>
							<a href="transaksiA.php"><button class="btn btn-light"
									style="margin-top: 0.5rem; margin-left:-0.5rem">Transaksi</button></a>
						</div>
					</div>
					</p>
				</div>
			</div>

			<div class="card text-bg-secondary mb-3 col-4 me-3" style="max-width: 18rem;">
				<div class="card-header">Detail Transaksi</div>
				<div class="card-body">
					<p class="card-text">
					<div class="row justify-content-start" style="text-align:center">
						<div class="col-4" style="margin-right:0.5rem;">
						<?php
							$sql = "SELECT COUNT(*) as total FROM detail_transaksi";
							$stmt = $con->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetch(PDO::FETCH_ASSOC);
							echo "<p style='font-size:2.5rem; padding-left: 1.5rem; margin-right:-1rem;'>" . $data['total'] . "</p>";
							?>

							<p style='font-size:1.2rem; padding-left:0.5rem; margin-top:-1.4rem; margin-right:-2rem;'>
								Detail Transaksi</p>

						</div>

						<div class="col-4" style="margin-left: 2rem">
							<i class="fas fa-info-circle fa-4x"></i>
							<a href="dTransaksiA.php"><button class="btn btn-light"
									style="margin-top: 0.3rem; margin-left:-0.8rem;">Detail Transaksi</button></a>
						</div>
					</div>
					</p>
				</div>
			</div>
			<div class="card text-bg-success mb-3 col-4 me-3" style="max-width: 18rem;">
				<div class="card-header">Pengguna</div>
				<div class="card-body">
					<p class="card-text">
					<div class="row justify-content-start" style="text-align:center">
						<div class="col-6" style="margin-right:-1.5rem;">
						<?php
							$sql = "SELECT COUNT(*) as total FROM user";
							$stmt = $con->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetch(PDO::FETCH_ASSOC);
							echo "<p style='font-size:2.5rem; padding-left: 1.5rem;'>" . $data['total'] . "</p>";
							?>

							<p style='font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Pengguna</p>

						</div>

						<div class="col-4" style="margin-left: 2rem">
							<i class="fas fa-user  fa-4x"></i>
							<a href="memberAdmin.php"><button class="btn btn-light"
									style="margin-top: 0.3rem; margin-left:-0.8rem;">Pengguna</button></a>
						</div>
					</div>
					</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="card text-bg-primary mb-3 col-4 me-3" style="max-width: 18rem;">
				<div class="card-header">Quiz</div>
				<div class="card-body">
					<p class="card-text">
					<div class="row justify-content-start" style="text-align:center">
						<div class="col-4" style="margin-right:-0.8rem;">
						<?php
							$sql = "SELECT COUNT(*) as total FROM quiz";
							$stmt = $con->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetch(PDO::FETCH_ASSOC);
							echo "<p style='font-size:2.5rem; padding-left: 1.5rem; margin-right: -0.5rem'>" . $data['total'] . "</p>";
							?>

							<p style='font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Quiz</p>

						</div>

						<div class="col-4" style="margin-left: 3rem">
							<i class="far fa-lightbulb fa-4x"></i>
							<a href="quizA.php"><button class="btn btn-light"
									style="margin-top: 0.3rem; margin-left:-0.0rem;">Quiz</button></a>
						</div>
					</div>
					</p>
				</div>
			</div>



			<div class="card text-bg-secondary mb-3 col-4 me-3" style="max-width: 18rem;">
				<div class="card-header">Wisata</div>
				<div class="card-body">
					<p class="card-text">
					<div class="row justify-content-start" style="text-align:center">
						<div class="col-4" style="margin-right:0.5rem;">
						<?php
							$sql = "SELECT COUNT(*) as total FROM wisata";
							$stmt = $con->prepare($sql);
							$stmt->execute();
							$data = $stmt->fetch(PDO::FETCH_ASSOC);
							echo "<p style='font-size:2.5rem; padding-left: 1.5rem; margin-right:-1rem;'>" . $data['total'] . "</p>";
							?>

							<p style='font-size:1.2rem; padding-left:0.5rem; margin-top:-1.4rem; margin-right:-2rem;'>
								Wisata</p>

						</div>

						<div class="col-4" style="margin-left: 2rem">
							<i class="fas fa-umbrella-beach fa-4x"></i>
							<a href="wisataA.php"><button class="btn btn-light"
									style="margin-top: 0.3rem; margin-left:-0.0rem;">Wisata</button></a>
						</div>
					</div>
					</p>
				</div>
			</div>
		</div>
	</div>

	</div>


</body>

</html>