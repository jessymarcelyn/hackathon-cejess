<?php
require 'connect.php';

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql  = "SELECT * FROM detail_transaksi WHERE id_detail = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($row);
    exit();
}

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $kuantitas = $_POST['kuantitas'];
    $jumlah = $_POST['jumlah'];
    $idWisata = $_POST['idWisata'];
    $idTransaksi = $_POST['idTransaksi'];

    $sql = "INSERT INTO detail_transaksi (id_detail, quantity, amount, id_wisata, id_transaksi)
            VALUES (:id, :kuantitas, :jumlah, :idWisata, :idTransaksi)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':kuantitas', $kuantitas, PDO::PARAM_INT);
    $stmt->bindParam(':jumlah', $jumlah, PDO::PARAM_INT);
    $stmt->bindParam(':idWisata', $idWisata, PDO::PARAM_INT);
    $stmt->bindParam(':idTransaksi', $idTransaksi, PDO::PARAM_INT);
    $stmt->execute();
    exit();
}

if (isset($_POST['showtable'])) {
    $sql = "SELECT * FROM detail_transaksi";
    $stmt = $con->query($sql);
    echo "<table class='table table-bordered my-5'>
              <thead class='table-dark'>
                <tr>
                  <th scope='col' class='text-center'>ID Detail Transaksi</th>
                  <th scope='col' class='text-center'>Kuantitas</th>
                  <th scope='col' class='text-center'>Jumlah</th>
                  <th scope='col' class='text-center' style='padding-bottom:1.5rem;'>ID Wisata</th>
                  <th scope='col' class='text-center' style='padding-bottom:1.5rem;'>ID Transaksi</th>
                  <th scope='col' class='text-center' style='padding-bottom:1.5rem;'>Aksi</th>
                </tr>
              </thead>
              <tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <th class='text-center'>$row[id_detail]</th>
                <th class='text-center'>$row[quantity]</th>
                <th class='text-center'>Rp " . number_format($row['amount'], 0, ',', '.') . "</th>
                <th class='text-center'>$row[id_wisata]</th>
                <th class='text-center'>$row[id_transaksi]</th>
                <td>
                  <button class='btn btn-dark edit' ide='$row[id_detail]'>Edit</button>
                  <button class='btn btn-danger delete' idd='$row[id_detail]'>Delete</button>
                </td>
              </tr>";
    }
    echo "</tbody>
        </table>";
    exit();
}

if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM detail_transaksi WHERE id_detail = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $kuantitas = $_POST['kuantitas'];
    $jumlah = $_POST['jumlah'];
    $idWisata = $_POST['idWisata'];
    $idTransaksi = $_POST['idTransaksi'];

    $sql = "UPDATE detail_transaksi 
            SET quantity = :kuantitas, amount = :jumlah, id_wisata = :idWisata, id_transaksi = :idTransaksi
            WHERE id_detail = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':kuantitas', $kuantitas, PDO::PARAM_INT);
    $stmt->bindParam(':jumlah', $jumlah, PDO::PARAM_INT);
    $stmt->bindParam(':idWisata', $idWisata, PDO::PARAM_INT);
    $stmt->bindParam(':idTransaksi', $idTransaksi, PDO::PARAM_INT);
    $stmt->execute();
    exit();
}
?>

<style>
    #judul{
      text-align : center;
      color: white;
      font-weight : bold;
      font-size : 1.5rem;
      padding-top: 0.2rem;
	  background-color :black;
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
		</head>
<body>
	<nav class="navbar navbar-expand-lg bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
	    <div class="container-fluid">
	        <a class="navbar-brand" href="action.php">Back</a>
	        <button class="navbar-toggler" id= "navbartoggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon" ></span>
	        </button>
	        <div class="collapse navbar-collapse justify-content-between" id="navbarNav" >
	     
	    </div>
	</div>
</nav>
	<div class = "container">
		<div class = "content-web my-5">
		<p id ="judul" style = " height : 3rem; text-align: center;  margin-top: 3rem;" >Transaction Details</p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Detail Transaksi </label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Kuantitas</label><br>
                    <input type="text" class="form-control" id = "kuantitas">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Jumlah</label><br>
                    <input type="text" class="form-control" id = "jumlah">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>ID Wisata</label><br>
				<input type="text" class="form-control" id = "idWisata">
					</div>
				</div><br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Transaksi</label><br>
                    <input type="text" class="form-control" id = "idTransaksi">
					</div><br>
				</div>
				<br>
				<button class = "btn btn-dark"   id="update">Update</button>
				<button class = "btn btn-dark"   id="save">Insert</button>
			</form>

			<div id = "showdata"></div>
		</div>
	</div>

			
	
	<script>
	$(document).ready(function(){
		showdata();
		$('#save').click(function(){
				v_id = $('#id').val();
				v_kuantitas = $('#kuantitas').val();
				v_jumlah = $('#jumlah').val();
				v_idWisata = $('#idWisata').val();
				v_idTransaksi = $('#idTransaksi').val();
			$.ajax({
				url : 'dTransaksiA.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					kuantitas : v_kuantitas,
					jumlah : v_jumlah,
					idWisata : v_idWisata,
					idTransaksi : v_idTransaksi
				
				},
				success : function(result){
					alert('Insert Success');
					showdata();
				}
				
			})
		})
		$('body').delegate('.delete','click',function(){
				var v_id = $(this).attr('idd');
				var conf = window.confirm('Are You Sure');
				if (conf){
					$.ajax({
						url : 'dTransaksiA.php',
						type : 'POST',
						async : true,
						data : {
							id : v_id,
							del : 1
						},
					success : function(result){
						alert('Delete Success');
						showdata();
						
					}
					})
				}
			})
		$('body').delegate('.edit','click',function(){
				var v_id = $(this).attr('ide');
				$.ajax({
					url : 'dTransaksiA.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_detail);
						$('#kuantitas').val(myObject.quantity);
						$('#jumlah').val(myObject.amount);
						$('#idWisata').val(myObject.id_wisata);
						$('#idTransaksi').val(myObject.id_transaksi);
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_kuantitas = $('#kuantitas').val();
				v_jumlah = $('#jumlah').val();
				v_idWisata = $('#idWisata').val();
				v_idTransaksi = $('#idTransaksi').val();
				
			$.ajax({
				url : 'dTransaksiA.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					kuantitas : v_kuantitas,
					jumlah : v_jumlah,
					wisata : v_idWisata,
					idTransaksi : v_idTransaksi
				},
				success : function(result){
					alert('Update Berhasil');
					showdata();
				}
				
			})
		})
	});
	function showdata(){
			$.ajax({
				url : 'dTransaksiA.php',
				type : "POST",
				async : true,
				data : {
					showtable : 1
				},
			success : function(result){
				$("#showdata").html(result);
			}
			});
		}

			
	</script>
</body>
</html>
