<?php
require 'connect.php';
// include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$tanggal = $_POST['tanggal'];
	$total = $_POST['total'];
	$status = $_POST['status'];
	$user = $_POST['user'];
    $rek = $_POST['rek'];
	

	$sql = "INSERT INTO transaksi VALUES('$id','$tanggal','$total','$status','$user', '$rek')";
	$result = mysqli_query($con,$sql);
	exit();
}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM transaksi";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
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
	while($row=mysqli_fetch_array($result)){
		echo "
			  	<tr>
			  		<th class='text-center'>$row[0]</th>
					<th class='text-center'>$row[1]</th>
					<th class='text-center'>Rp " . number_format($row[2], 0, ',', '.') . "</th>
					<th class='text-center'>$row[3]</th>
					<th class='text-center'>$row[4]</th>
					<th class='text-center'>$row[5]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
					
				</tr>";
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM detail_transaksi WHERE id_transaksi = '$id'";
	$result = mysqli_query($con,$sql);
	$sql3 = "DELETE FROM transaksi WHERE id_transaksi='$id'";
	$result3 = mysqli_query($con,$sql3);
	exit();
}
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM transaksi WHERE id_transaksi = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$tanggal = $_POST['tanggal'];
	$total = $_POST['total'];
	$status = $_POST['status'];
	$idUser = $_POST['user'];
    $rek = $_POST['rek'];

	$sql="UPDATE transaksi set tanggal_transaksi='$tanggal', total_transaksi = $total, status = $status, id_user = '$idUser', nama_rekening = '$rek' WHERE id_transaksi = '$id'";
	$result = mysqli_query($con,$sql);
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
			<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Transaksi</p>
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
