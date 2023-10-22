<?php
require 'connect.php';
// include('adminverification.php');
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM transaksi WHERE id_transaksi = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($row);
    exit();
}

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $user = $_POST['user'];
    $rek = $_POST['rek'];

    $sql = "INSERT INTO transaksi (id_transaksi, tanggal_transaksi, total_transaksi, status, id_user, nama_rekening) 
            VALUES (:id, :tanggal, :total, :status, :user, :rek)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':tanggal', $tanggal, PDO::PARAM_STR);
    $stmt->bindParam(':total', $total, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':user', $user, PDO::PARAM_STR);
    $stmt->bindParam(':rek', $rek, PDO::PARAM_STR);
    $stmt->execute();
    exit();
}

if (isset($_POST['showtable'])) {
    $sql = "SELECT * FROM transaksi";
    $stmt = $con->query($sql);
    echo "<table class='table table-bordered my-5'>
              <thead class='table-dark'>
                <tr>
                  <th scope='col-md-4' class='text-center'>ID</th>
                  <th scope='col' class='text-center'>Tanggal Transaksi</th>
                  <th scope='col' class='text-center'>Total Transaksi</th>
                  <th scope='col-md-4' class='text-center'>Status</th>
                  <th scope='col' class='text-center'>ID Pengguna</th>
                  <th scope='col' class='text-center'>Nama Rekening</th>
                  <th scope='col' class='text-center'>Aksi</th>
                </tr>
              </thead>
              <tbody>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
                <th class='text-center'>$row[id_transaksi]</th>
                <th class='text-center'>$row[tanggal_transaksi]</th>
                <th class='text-center'>Rp " . number_format($row['total_transaksi'], 0, ',', '.') . "</th>
                <th class='text-center'>$row[status]</th>
                <th class='text-center'>$row[id_user]</th>
                <th class='text-center'>$row[nama_rekening]</th>
                <td class='text-center'>
                    <button class='btn btn-dark edit' ide='$row[id_transaksi]'>Edit</button>
                    <button class='btn btn-danger delete' idd='$row[id_transaksi]'>Delete</button>
                </td>
            </tr>";
    }
    echo "</tbody>
        </table>";
    exit();
}

if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM detail_transaksi WHERE id_transaksi = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    
    $sql3 = "DELETE FROM transaksi WHERE id_transaksi = :id";
    $stmt3 = $con->prepare($sql3);
    $stmt3->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt3->execute();
    exit();
}

if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql = "SELECT * FROM transaksi WHERE id_transaksi = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($row);
    exit();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $status = $_POST['status'];
    $idUser = $_POST['user'];
    $rek = $_POST['rek'];

    $sql = "UPDATE transaksi 
            SET tanggal_transaksi = :tanggal, total_transaksi = :total, status = :status, id_user = :user, nama_rekening = :rek 
            WHERE id_transaksi = :id";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->bindParam(':tanggal', $tanggal, PDO::PARAM_STR);
    $stmt->bindParam(':total', $total, PDO::PARAM_INT);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':user', $idUser, PDO::PARAM_STR);
    $stmt->bindParam(':rek', $rek, PDO::PARAM_STR);
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
			<p id ="judul" style = " height : 3rem; text-align: center;  margin-top: 3rem;" >Transaksi</p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID</label><br>
				<input type="text" class="form-control" id = "id"><br>
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Tanggal</label><br>
				<input type="date" class="form-control" id = "tanggal"><br>
					</div>
				</div>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>Total Transaksi</label><br>
				<input type="text" class="form-control" id = "total">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Status</label><br>
				<input type="text" class="form-control" id = "status">
					</div><br>
				</div>
				<br>
				<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Pengguna</label><br>
				<input type="text" class="form-control" id = "userId">
				</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
					<label>Nama Rekening</label><br>
				<input type="text" class="form-control" id = "nama_rek">
					</div><br>
				</div>
				<br>

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
				v_tanggal = $('#tanggal').val();
				v_total = $('#total').val();
				v_status = $('#status').val();
				v_user = $('#userId').val();
                v_rek = $('#nama_rek').val();
			$.ajax({
				url : 'transaksiA.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					tanggal : v_tanggal,
					total : v_total,
					status : v_status,
					user : v_user,
					rek : v_rek
				
				},
				success : function(result){
					alert('Insert Berhasil');
				}
			})
		})
		$('body').delegate('.delete','click',function(){
				var v_id = $(this).attr('idd');
				var conf = window.confirm('Are You Sure?');
				if (conf){
					$.ajax({
						url : 'transaksiA.php',
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
					url : 'transaksiA.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id_transaksi);
						$('#tanggal').val(myObject.tanggal_transaksi);
						$('#total').val(myObject.total_transaksi);
						$('#status').val(myObject.status);
						$('#userId').val(myObject.id_user);
                        $('#nama_rek').val(myObject.nama_rekening);
					}
				});
			})
		$('#update').click(function(){
				v_id = $('#id').val();
				v_tanggal = $('#tanggal').val();
				v_total = $('#total').val();
				v_status = $('#status').val();
				v_user = $('#userId').val();
                v_rek = $('#nama_rek').val();
			$.ajax({
				url : 'transaksiA.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					tanggal : v_tanggal,
					total : v_total,
					status : v_status,
					user : v_user,
                    rek : v_rek
				},
				success : function(result){
					alert('Update Berhasil');
					showdata();
				}
				
			})
		})
	})

	
	function showdata(){
			$.ajax({
				url : 'transaksiA.php',
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
