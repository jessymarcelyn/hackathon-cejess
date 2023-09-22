<!doctype html>
<?php
session_start();
require "connect.php";
?>

<style>
    .judul{
      text-align : center;
      color: white;
      font-weight : bold;
      font-size : 1.5rem;
      padding-top: 0.2rem;
    }
	     body{
        box-sizing : border-box;
        overflow-x: hidden;
        width: 100%;
        height : 100%;
        margin : 0;
        padding : 0;
        background-color:#f7f8fa;
    }
</style>
<html>
<head>
<meta charset="utf-8">
<title>Payment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- Import jquery cdn -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
		crossorigin="anonymous">
	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
	</script>
</head>

<body>
	<?php
		$tglDapet=$_GET['tgl'];
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
		$tgl = date("d-m-Y", strtotime($tglDapet));
		?>
	 <p class= "judul"  style = "background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : 5rem; margin-right: 5rem; margin-button: 3rem;  margin-top: 3rem;" >Transaction Detail</p>
		<div style="margin-left: 10vw; margin-right: 10vw;">
			<form action="pay.php" method="post">
			<div class="mb-3 row">
					<label class="col-sm-3">Tanggal</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="tgl" value="<?php echo $tgl; ?>" readonly>
					</div>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-3">Raja Domba</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q1" value="<?php echo $q1; ?>" readonly>
					</div>
					<label class="col-sm-3">Rumah Batik</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q2" value="<?php echo $q2; ?>" readonly>
					</div>
					
				</div>
				<div class="mb-3 row">
					<label class="col-sm-3">Rumah Akar</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q3" value="<?php echo $q3; ?>" readonly>
					</div>
					<label class="col-sm-3">Sendang Tirto Gumitir</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q4" value="<?php echo $q4; ?>" readonly>
					</div>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-3">PPG Wisata Pinus</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q5" value="<?php echo $q5; ?>" readonly>
					</div>
					<label class="col-sm-3">PPG Wisata Pinus</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q6" value="<?php echo $q6; ?>" readonly>
					</div>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-3">Terowongan Mrawan</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q7" value="<?php echo $q7; ?>" readonly>
					</div>
					<label class="col-sm-3">Stasiun Mrawan</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q8" value="<?php echo $q8; ?>" readonly>
					</div>
				</div>
				<div class="mb-3 row">
				<label class="col-sm-3">Kopi Ketakasi</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q9" value="<?php echo $q9; ?>" readonly>
					</div>
					<label class="col-sm-3">Pabrik Kopi Mrawan</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="q10" value="<?php echo $q10; ?>" readonly>
					</div>
				</div>				
				<p class= "judul"  style = "background-color :rgb(143, 124, 112); height : 3rem; text-align: center; margin-left : -3rem; margin-right:8rem; margin-button: 3rem;  margin-top: 3rem; width : 125%;" >Payment Details</p>
				<div class="mb-3 row">
					<label class="col-sm-2">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="name">
					</div>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-2">Card ID</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="card-id">
					</div>
				</div>
				<div class="mb-3 row">
					<label class="col-sm-2">CVV Code</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="cvv">
					</div>
				</div>
			<button name="pay" type="submit" class="btn btn-outline-primary mb-3" style="width: 50%; margin-left: 25%">Pay<i class='fas fa-save' style='color:blue'></i></button>
				
			</form>
            <script>
function detail1() {
  // Use backticks (`) instead of single quotes (') for the URL string so that variable substitution can be performed.
  location.href = `user.php?tgl=${tgl}&q1=${quantity1}&q2=${quantity2}&q3=${quantity3}&q4=${quantity4}&q5=${quantity5}&q6=${quantity6}&q7=${quantity7}&q8=${quantity8}&q9=${quantity9}&q10=${quantity10}`;
}
</script>
</body>
</html>