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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style>
		body{
        box-sizing : border-box;
        overflow-x: hidden;
        width: 100%;
        height : 100%;
        margin : 0;
        padding : 0;


	    }
	    .nav-link{
	        text-decoration:none;
	        color:rgba(34,54,69,7);
	        font-weight : 500;
	        margin-top : 0.2rem;

	    }
	    hr {
		    border: none;
		    height: 1px;
		    /* Set the hr color */
		    color: #333; /* old IE */
		    background-color: #333; /* Modern Browsers */
		}
	    .nav-link:hover{
	        color :rgb(143, 124, 112);
	    }

	    ul {
	        list-style-type : none;
	    }

	    .navbar{
	        background : white;
	        height : 0rem;
	        min-height : 10vh;
	       
	    }

	    .navbar .navbar-brand a {
	        padding : 1rem 0;
	        display : block;
	        text decoration : none;
	    }

	    .navbar-brand{
	        font-family : 'patrick', cursive;
	        margin-right : 2%;
	        margin-top : 0.2rem;
	    }
	    button{
	    	margin-left : 10px;
	    }
    #judul{
      text-align : center;
      color: white;
      font-weight : bold;
      font-size : 1.5rem;
      padding-top: 0.2rem;
	  background-color :black;
    }


	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
	    <div class="container-fluid">
	        <a class="navbar-brand" href="admindashbord.php">Welcome Admin</a>
	        <button class="navbar-toggler" id= "navbartoggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon" ></span>
	        </button>
	            <a class="nav-link " href = "admindashbord.php" style = "margin-right: 2ex">View Database</a>
	        <div class="collapse navbar-collapse justify-content-between" id="navbarNav" >
	    </div>
	</div>
</nav>
	<br>
	<p id ="judul" style = " height : 3rem; text-align: center; margin-button: 3rem;  margin-right:5rem; margin-left:5rem;" >Dashboard</p>
	<div class=" dbcard container" style = "margin-left : 11rem;">
		<div class="row">
				<div class="card text-bg-primary mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Transaction</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-5" style= "margin-right:-1.5rem;">
									<?php
										$sql="select count(*) as total from transaksi";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.3rem; padding-left: 1.5rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Transaksi</p>
				
								</div>

								<div class="col-4" style = "margin-left: 2rem">
								<i class="fas fa-database fa-4x" style = "margin-left:0.5rem"></i>
									<a href = "transaksiA.php"><button class = "btn btn-light" style = "margin-top: 0.5rem; margin-left:-0.5rem">Transaksi</button></a>
								</div>
							</div>
							</p>
						</div>
					</div>
		
			<div class="card text-bg-secondary mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Detail Transaksi</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-4" style= "margin-right:0.5rem;">
									<?php
										$sql="select count(*) as total from detail_transaksi";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.5rem; padding-left: 1.5rem; margin-right:-1rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; padding-left:0.5rem; margin-top:-1.4rem; margin-right:-2rem;'>Detail Transaksi</p>
				
								</div>

								<div class="col-4" style = "margin-left: 2rem">
								<i class="fas fa-info-circle fa-4x"></i>
									<a href = "dTransaksiA.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.8rem;" >Detail Transaksi</button></a>
								</div>
							</div>
							</p>
						</div>
					</div>
				<div class="card text-bg-success mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Pengguna</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-6" style= "margin-right:-1.5rem;">
									<?php
										$sql="select count(*) as total from user";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.5rem; padding-left: 1.5rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Pengguna</p>
				
								</div>

								<div class="col-4" style = "margin-left: 2rem">
								<i class="fas fa-user  fa-4x"></i>
									<a href = "memberAdmin.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.8rem;">Pengguna</button></a>
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
                            <p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
                                <div class="col-4" style= "margin-right:-0.8rem;">
                                    <?php
                                        $sql="select count(*) as total from quiz";
                                        $result=mysqli_query($con,$sql);
                                        $data=mysqli_fetch_assoc($result);
                                        echo "<p style = 'font-size:2.5rem; padding-left: 1.5rem; margin-right: -0.5rem'>".$data['total']."</p>";
                                    ?>
                                    <p style = 'font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Quiz</p>
                
                                </div>

                                <div class="col-4" style = "margin-left: 3rem">
                                <i class="far fa-lightbulb fa-4x" ></i>
                                    <a href = "quizA.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.0rem;">Quiz</button></a>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
 

		
			<div class="card text-bg-secondary mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Wisata</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-4" style= "margin-right:0.5rem;">
									<?php
										$sql="select count(*) as total from wisata";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.5rem; padding-left: 1.5rem; margin-right:-1rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; padding-left:0.5rem; margin-top:-1.4rem; margin-right:-2rem;'>Wisata</p>
				
								</div>

								<div class="col-4" style = "margin-left: 2rem">
								<i class="fas fa-umbrella-beach fa-4x"></i>
									<a href = "wisataA.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.0rem;" >Wisata</button></a>
								</div>
							</div>
							</p>
						</div>
					</div>
				<!-- <div class="card text-bg-success mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Reviews</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-4" >
									<?php
										$sql="select count(*) as total from review";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.5rem; padding-left: 1rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Reviews</p>
				
								</div>

								<div class="col-4" style = "margin-left: 3rem">
								<i class="fas fa-user-edit fa-4x"></i>
									<a href = "reviewAdmin.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.7rem;">Reviews</button></a>
								</div>
							</div>
							</p>
						</div>
					</div>
				</div>
				

				<div class="row">
				<div class="card text-bg-primary mb-3 col-4 me-3" style="max-width: 18rem;">
                    <div class="card-header">Transactions</div>
                        <div class="card-body">
                            <p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
                                <div class="col-4" >
                                    <?php
                                        $sql="select count(*) as total from features";
                                        $result=mysqli_query($con,$sql);
                                        $data=mysqli_fetch_assoc($result);
                                        echo "<p style = 'font-size:2.5rem; padding-left: 1.5rem; margin-right: -0.5rem'>".$data['total']."</p>";
                                    ?>
                                    <p style = 'font-size:1.2rem; margin-right:-2.8rem; margin-top:-1.4rem;'>Transactions</p>
                
                                </div>

                                <div class="col-4" style = "margin-left: 3.5rem">
								<i class="fas fa-money-bill-alt fa-4x"></i>
                                    <a href = "transactionAdmin.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-1rem;">Transactions</button></a>
                                </div>
                            </div>
                            </p>
                        </div>
                    </div>
 

		
			<div class="card text-bg-secondary mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Transaction Details</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-4" style= "margin-right:0.5rem;">
									<?php
										$sql="select count(*) as total from detail_transaksi";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.5rem; padding-left: 1.5rem; margin-right:-1rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; padding-left:0.5rem; margin-top:-1.4rem; margin-right:-2.7rem;'>Transaction Details</p>
				
								</div>

								<div class="col-4" style = "margin-left: 2rem">
								<i class="fas fa-file-invoice fa-4x"  style = "margin-left: 1rem"></i>
									<a href = "dtransaksi.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.5rem;" >Transaction Details</button></a>
								</div>
							</div>
							</p>
						</div>
					</div>
				<div class="card text-bg-success mb-3 col-4 me-3" style="max-width: 18rem;">
					<div class="card-header">Credit Card</div>
						<div class="card-body">
							<p class="card-text" >  <div class="row justify-content-start" style = "text-align:center" >
								<div class="col-4" >
									<?php
										$sql="select count(*) as total from kartu_kredit";
										$result=mysqli_query($con,$sql);
										$data=mysqli_fetch_assoc($result);
										echo "<p style = 'font-size:2.5rem; padding-left: 1rem;'>".$data['total']."</p>";
									?>
									<p style = 'font-size:1.2rem; margin-right:-1rem; margin-top:-1.4rem;'>Credit Card</p>
				
								</div>

								<div class="col-4" style = "margin-left: 3rem">
								<i class="fas fa-dollar-sign fa-4x"></i>
									<a href = "paymentAdmin.php"><button class = "btn btn-light" style = "margin-top: 0.3rem; margin-left:-0.7rem; ">Credit Card</button></a>
								</div>
							</div>
							</p>
						</div>
					</div>
				</div> -->
				
				</div>
</div>

  </div>


</body>
</html> 
