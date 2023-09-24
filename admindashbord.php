<?php
require 'connect.php';
// include('adminverification.php');
if (isset($_POST['def'])) {
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 1rem;" >View Database</p>';
	exit();
}
if (isset($_POST['transaksi'])) {
	$sql = "SELECT * FROM transaksi";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Transaksi</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID</th>
			      <th scope='col' class='text-center'>Tanggal Transaksi</th>
			      <th scope='col' class='text-center'>Total</th>
			      <th scope='col-md-4' class='text-center'>Status</th>
			      <th scope='col' class='text-center'>ID User</th>
			      <th scope='col' class='text-center'>nama_rekening</th>
			      
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
			  		<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
					<td class='text-center'>$row[4]</td>
					<td class='text-center'>$row[5]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['dt'])) {
	$sql = "SELECT * FROM detail_transaksi";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Detail Transaksi</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID Detail</th>
			      <th scope='col' class='text-center'>Kuantitas</th>
			      <th scope='col' class='text-center'>Jumlah</th>
			      <th scope='col-md-4' class='text-center'>ID Wisata</th>
			      <th scope='col' class='text-center'>ID Transaksi</th>
			      
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
			  		<td class='text-center' >$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
					<td class='text-center'>$row[4] </td>
					
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['user'])) {
	$sql = "SELECT * FROM user ORDER BY id ASC";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >User</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
					<th scope='col' class='text-center'>ID User</th>
			      <th scope='col' class='text-center'>Nama</th>
			      <th scope='col' class='text-center'>Email</th>
				  <th scope='col' class='text-center'>Nomor Telepon</th>
			   	  
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
				  	<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['payment'])) {
	$sql = "SELECT * FROM kartu_kredit";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Payment</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      
			      <th scope='col' class='text-center'>ID Card</th>
			      <th scope='col' class='text-center'>Name</th>
			      <th scope='col' class='text-center'>CVV</th>
			   	  <th scope='col' class='text-center'>Expiration Date</th>
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
			  		<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['quiz'])) {
	$sql = "SELECT * FROM quiz";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Quiz</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID Quiz</th>
			      <th scope='col' class='text-center'>Email</th>
			      <th scope='col' class='text-center' style = 'width:40%'>Tanggal Main</th>
			      <th scope='col' class='text-center'>Nomor Telepon</th>
				  <th scope='col' class='text-center'>Menang</th>
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
					<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
					<td class='text-center'>$row[4]</td>
				</tr>";
	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['wisata'])) {
	$sql = "SELECT * FROM wisata";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Wisata</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>ID Wisata</th>
			      <th scope='col' class='text-center'>Nama</th>
			      <th scope='col' class='text-center'>Harga</th>
			      
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
					<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['detail'])) {
	$sql = "SELECT * FROM detail_transaksi";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Transaction Details</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col-md-4' class='text-center'>Detail ID</th>
			      <th scope='col' class='text-center' >Check In</th>
			      <th scope='col' class='text-center' >Check Out</th>
			      <th scope='col-md-4' class='text-center'>Nights</th>
			      <th scope='col' class='text-center' >Quantity</th>
			      <th scope='col' class='text-center' >Price</th>
			      <th scope='col' class='text-center'>Total Price</th>
			      <th scope='col' class='text-center' style = width:25%;'>Detail</th> 
			      <th scope='col' class='text-center'>Room ID</th> 
			      
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
			  		<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
					<td class='text-center'>$row[4]</td>
					<td class='text-center'>$row[5]</td>
					<td class='text-center'>$row[6]</td>
					<td class='text-center'>$row[7]</td>
					<td class='text-center'>$row[8]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['admin'])) {
	$sql = "SELECT * FROM admin";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Admin</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col' class='text-center'>Username</th>
			      <th scope='col'class='text-center'>Password</th>
			      <th scope='col' class='text-center'>Nama</th>
			   	  
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
					<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
if (isset($_POST['wishlist'])) {
	$sql = "SELECT * FROM wishlist";
	$result = mysqli_query($con, $sql);
	echo '<p class ="judul" style = " height : 3rem; text-align: center; margin-top: 1rem;" >Wishlist</p>';
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col' class='text-center'>ID Wishlist</th>
			      <th scope='col' class='text-center'>ID Member</th>
			      <th scope='col' class='text-center'>Detail</th>
			   	  <th scope='col' class='text-center'>Check In Date</th>
				  <th scope='col' class='text-center'>Check Out Date</th>
			   	  <th scope='col' class='text-center'>Room ID</th>
				  <th scope='col' class='text-center'>Breakfast</th>
				  <th scope='col' class='text-center'>Smoking</th>
				  <th scope='col' class='text-center'>Quantity</th>
			    </tr>
			  </thead>
			  <tbody>";
	while ($row = mysqli_fetch_array($result)) {
		echo "
			  	<tr>
					<td class='text-center'>$row[0]</td>
					<td class='text-center'>$row[1]</td>
					<td class='text-center'>$row[2]</td>
					<td class='text-center'>$row[3]</td>
					<td class='text-center'>$row[5]</td>
					<td class='text-center'>$row[4]</td>
					<td class='text-center'>$row[6]</td>
					<td class='text-center'>$row[7]</td>
					<td class='text-center'>$row[8]</td>
				</tr>";


	}
	echo "</tbody>
			</table>";
	exit();
}
?>
<style>
	.judul {
		text-align: center;
		color: white;
		font-weight: bold;
		font-size: 1.5rem;
		padding-top: 0.2rem;
		background-color: black;
	}
</style>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="jquery-3.6.1.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-5.2.0/css/bootstrap.css">

	<!-- Bootstrap core CSS -->
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
			text decoration: none;
		}

		.navbar-brand {
			font-family: 'patrick', cursive;
			margin-right: 2%;
			margin-top: 0.2rem;
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
			<div class="collapse navbar-collapse justify-content-between" id="navbarNav">
				<ul class="navbar-nav ml-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link " href="action.php" style="margin-right: 2ex">Dashboard</a>
					</li>
				</ul>
			</div>
	</nav>

	<div class="container">

		<div class="row">
			<!-- LEFT -->
			<div class="col-2" style="margin-left: -3.2rem; margin-top:4rem">

				<button class="btn btn-dark" id="transaction"
					style="margin-top: 20px; padding-left: 2rem; padding-right: 2rem;">Transactions</button><br>
				<button class="btn btn-dark" id="dt"
					style="margin-top: 20px; ; padding-left: 1.2rem; padding-right: 1.2rem">Detail
					Transaksi</button><br>
				<button class="btn btn-dark" id="user"
					style="margin-top: 20px; padding-left: 3.5rem; padding-right: 3.5rem">User</button><br>
				<button class="btn btn-dark" id="quiz"
					style="margin-top: 20px; padding-left: 3.5rem; padding-right: 3.5rem">Quiz</button><br>
				<button class="btn btn-dark" id="wisata"
					style="margin-top: 20px; padding-left: 3rem; padding-right: 3rem">Wisata</button><br>
				<!-- <button class = "btn btn-dark" id ="detail" style="margin-top: 20px; width: 72%; ">Transaction Details</button><br>
				<button class = "btn btn-dark" id ="admin" style="margin-top: 20px; padding-left: 2.2rem; padding-right: 2.2rem">Admin</button><br>
				<button class = "btn btn-dark" id ="wishlist" style="margin-top: 20px; padding-left: 2rem; padding-right: 2rem">Wishlist</button><br>
				<button class = "btn btn-dark" id ="payment" style="margin-top: 20px; padding-left: 1.7rem; padding-right: 1.7rem">Payment</button><br> -->

			</div>
			<!-- Right -->
			<div class="col-10" id="tampilkan">

			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			showdata();
			$('#transaction').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						transaksi: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#dt').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						dt: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#user').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						user: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#quiz').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						quiz: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#wisata').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						wisata: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#detail').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						detail: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#admin').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						admin: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#wishlist').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						wishlist: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
			$('#payment').click(function () {
				$.ajax({
					url: 'admindashbord.php',
					type: 'POST',
					async: true,
					data: {
						payment: 1
					},
					success: function (result) {
						$('#tampilkan').html(result);
					}

				})
			})
		})
		function showdata() {
			$.ajax({
				url: 'admindashbord.php',
				type: 'POST',
				async: true,
				data: {
					def: 1
				},
				success: function (result) {
					$('#tampilkan').html(result);
				}

			})
		}

	</script>

</body>

</html>