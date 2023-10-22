<?php
require 'connect.php';
// include('adminverification.php');

if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql = "SELECT * FROM user WHERE id = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	echo json_encode($row);
	exit();
}

if(isset($_POST['save'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];

	$sql = "INSERT INTO user (id, nama, email, no_telp) VALUES (:id, :nama, :email, :telp)";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':telp', $telp, PDO::PARAM_STR);
	$stmt->execute();
	exit();
}

if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM user";
	$stmt = $con->query($sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark' style = 'text-align:center';>
			    <tr>
			      <th scope='col' class='text-center'>ID Pengguna</th>
			      <th scope='col' class='text-center'>Nama</th>
			      <th scope='col' class='text-center'>Email</th>
			      <th scope='col' class='text-center'>Nomor Telepon</th>
			      <th scope='col' class='text-center'>Action</th>
			    </tr>
			  </thead>
			  <tbody>";
	while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo "
			<tr>
				<th class='text-center'>$row[id]</th>
				<th class='text-center'>$row[nama]</th>
				<th class='text-center'>$row[email]</th>
				<th class='text-center'>$row[no_telp]</th>
				<td class='text-center'><button class='btn btn-dark edit' ide='$row[id]'>Edit</button> <button class='btn btn-danger delete' idd='$row[id]'>Delete</button></td>
			</tr>";
	}
	echo "</tbody></table>";
	exit();
}

if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM user WHERE id = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->execute();
	exit();
}

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];

	$sql = "UPDATE user SET nama = :nama, no_telp = :telp, email = :email WHERE id = :id";
	$stmt = $con->prepare($sql);
	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
	$stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
	$stmt->bindParam(':email', $email, PDO::PARAM_STR);
	$stmt->bindParam(':telp', $telp, PDO::PARAM_STR);
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
		<p id ="judul" style = " height : 3rem; text-align: center; margin-top: 3rem;" >Pengguna </p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
					<label>ID Pengguna</label><br>
				<input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">

					<label>Nama</label><br>
				<input type="text" class="form-control" id = "nama">
					</div><br>
				</div><br>
				<div class="row justify-content-start" >
				<div class="col-4" style = "margin-right : 10rem;">
					<label>Email</label><br>
				<input type="text" class="form-control" id = "email">
				</div>
					<br>
				<div class="col-4" style = " margin-left:-9rem;">
					<label>Nomor Telepon</label><br>
				<input type="text" class="form-control" id = "telp">
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
				v_nama = $('#nama').val();
				v_email = $('#email').val();
				v_telp = $('#telp').val();
			$.ajax({
				url : 'memberAdmin.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					nama : v_nama,
					telp : v_telp,
					email : v_email
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
						url : 'memberAdmin.php',
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
					url : 'memberAdmin.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id);
						$('#nama').val(myObject.nama);
						$('#telp').val(myObject.no_telp);
						$('#email').val(myObject.email);
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_nama = $('#nama').val();
				v_telp = $('#telp').val();
				v_mail = $('#email').val();
				
			$.ajax({
				url : 'memberAdmin.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					nama : v_nama,
					telp : v_telp,
					email : v_mail
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
				url : 'memberAdmin.php',
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
