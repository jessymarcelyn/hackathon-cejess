<?php
require 'connect.php';
// include('adminverification.php');
if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$sql  = "SELECT * FROM quiz WHERE id = '$id'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	echo json_encode($row);

	exit();

}
if(isset($_POST['save'])){
	$id = $_POST['id'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];
    $tglMain = $_POST['tglMain'];
    $menang = $_POST['menang'];

	$sql = "INSERT INTO quiz VALUES('$id','$email', '$tglMain', '$telp', $menang)";
	$result = mysqli_query($con,$sql);
	exit();
	


}
if(isset($_POST['showtable'])){
	$sql = "SELECT * FROM quiz";
	$result = mysqli_query($con,$sql);
	echo "<table class='table table-bordered my-5'>
			  <thead class = 'table-dark' style = 'text-align:center';>
			    <tr>
			      <th scope='col' class='text-center'>ID Pengguna</th>
			      <th scope='col' class='text-center'>Email</th>
				  <th scope='col' class='text-center'>Tanggal Main</th>
			      <th scope='col' class='text-center'>Nomor Telepon</th>
                  <th scope='col' class='text-center'>Menang</th>
			      <th scope='col' class='text-center'>Action</th>			      
			    </tr>
			  </thead>
			  <tbody>";
	while($row=mysqli_fetch_array($result)){
		echo "
			  	<tr>
			  		<th class='text-center'>$row[0]</th>
					<th class='text-center'>$row[1]</th>
					<th class='text-center'>$row[2]</th>
					<th class='text-center'>$row[3]</th>
                    <th class='text-center'>$row[4]</th>
					<td class='text-center'><button class = 'btn btn-dark edit' ide = '$row[0]'>Edit </button> <button class = 'btn btn-danger delete' idd = '$row[0]'>Delete</button></td>
				</tr>";
			  
			  
	}
	echo "</tbody>
			</table>";
	exit();
}
if(isset($_POST['del'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM quiz WHERE id = '$id'";
	$result = mysqli_query($con,$sql);
	
	exit();
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$telp = $_POST['telp'];
	$email = $_POST['email'];
    $tglMain = $_POST['tglMain'];
    $menang = $_POST['menang'];

	$sql="UPDATE quiz set email = '$email', tanggal_main = '$tglMain', menang = $menang WHERE id = '$id'";
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
		<p id ="judul" style = " height : 3rem; text-align: center; margin-top: 3rem;" >Quiz </p>
			<form>
			<div class="row justify-content-start" >
					<div class="col-4" style = "margin-right : 10rem;">
                        <label>ID Pengguna</label><br>
                        <input type="text" class="form-control" id = "id">
					</div><br>
					<div class="col-4" style = " margin-left:-9rem;">
                        <label>Email</label><br>
                        <input type="text" class="form-control" id = "email">
					</div><br>
				</div><br>
				<div class="row justify-content-start" >
                    <div class="col-4" style = "margin-right : 10rem;">
                        <label>Tanggal Main</label><br>
                        <input type="text" class="form-control" id = "tgl_main">
                    </div>
                    <br>
                    <div class="col-4" style = " margin-left:-9rem;">
                        <label>Nomor Telepon</label><br>
                    <input type="text" class="form-control" id = "telp">
                    </div>
                </div>   
                <div class="row justify-content-start" >
                    <div class="col-4" style = "margin-right : 10rem;">
                        <label>Menang</label><br>
                        <input type="text" class="form-control" id = "menang">
                    </div>
                    <br>
                </div> 
                    <br>
			</div>
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
				v_email = $('#email').val();
				v_telp = $('#telp').val();
                v_tglMain = $('#tgl_main').val();
                v_menang = $('#menang').val();

			$.ajax({
				url : 'quizA.php',
				type : 'POST',
				async : true,
				data : {
					save : 1,
					id : v_id,
					tglMain : v_tglMain,
					telp : v_telp,
					email : v_email,
                    menang : v_menang
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
						url : 'quizA.php',
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
					url : 'quizA.php',
					type : "POST",
					async : true,
					data  : {
						edit : 1,
						id : v_id
					
					},
					success : function(result){
						var myObject = $.parseJSON(result);
						$('#id').val(myObject.id);
						$('#telp').val(myObject.no_telp);
						$('#email').val(myObject.email);
                        $('#tgl_main').val(myObject.tanggal_main);
                        $('#menang').val(myObject.menang);
					}
				});
			});
		$('#update').click(function(){
				v_id = $('#id').val();
				v_nama = $('#nama').val();
				v_telp = $('#telp').val();
				v_mail = $('#email').val();
                v_tglMain = $('#tglMain').val();
                v_menang = $('#menang').val();
				
			$.ajax({
				url : 'quizA.php',
				type : 'POST',
				async : true,
				data : {
					update : 1,
					id : v_id,
					nama : v_nama,
					telp : v_telp,
					email : v_mail,
                    tglMain : v_tglMain,
                    menang :v_menang
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
				url : 'quizA.php',
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
