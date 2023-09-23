<?php
require 'connect.php';
// include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM detail_transaksi WHERE id_detail = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$kuantitas = $_POST['kuantitas'];
	$jumlah = $_POST['jumlah'];
	$idWisata = $_POST['idWisata'];
	$idTransaksi = $_POST['idTransaksi'];

	$sql = "INSERT INTO detail_transaksi VALUES($id,$kuantitas,$jumlah,$idWisata,$idTransaksi)";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM detail_transaksi";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark'>
			    <tr>
			      <th scope='col' class='text-center' >ID Detail Transaksi</th>
			      <th scope='col' class='text-center'>Kuantitas</th>
			      <th scope='col' class='text-center'>Jumlah</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>ID Wisata</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;'>ID Transaksi</th>
			      <th scope='col' class='text-center' style = 'padding-bottom:1.5rem;' >Aksi</th>


			      
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
    <td>
      <button class='btn btn-dark edit' ide='$row[0]'>Edit</button>
      <button class='btn btn-danger delete' idd='$row[0]'>Delete</button>
    </td>
  </tr>";

			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM detail_transaksi WHERE id_detail = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
    $kuantitas =$_POST['kuantitas'];
    $jumlah = $POST_['jumlah'];
    $idWisata = $POST_['idWisata'];
    $idTransaksi = $_POST['idTransaksi'];

	$sql="UPDATE detail_transaksi SET quantity = $kuantitas,amount = $jumlah, id_wisata = $idWisata, id_transaksi = $idTransaksi  WHERE id_detail = '$id'";
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
		<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-top: 3rem;" >Transaction Details</p>
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
