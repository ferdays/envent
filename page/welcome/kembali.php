<?php
session_start();
include('../../system/connect.php');
include('../../system/function.php');
if(!isset($_SESSION['USERNAME'])){
    die("Anda belum login");
}

if($_SESSION['TIPE']!="user"){
    header('location:../../index.php');
}
?>
<html>
<head>
	<title>E-nvent | Mengembalikan Barang</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">

	<!-- Tambahan -->
	<link rel="stylesheet" type="text/css" href="../../css/tambahan.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="../../js/bootstrap.min.js"></script>
</head>
<body style='background:<?php tampilbackground(); ?>;'>
<div class="navbar">
      <center><img src='../../img/logo.png' height='60px'><a href="#help" id="login_pop"><span class='glyphicon glyphicon-question-sign'></span></a></center>
</div>
 <a href="#x" class="overlay" id="help"></a>
        <div class="popup">
            <form class="sign-up" style='width:700px;'>
   		 	<h1 class="sign-up-title" style='color:#F0776C;'>Help</h1>
    		<table border='0' width='100%'>
    			<tr>
    				<td>
    					<center><h2 style='color:#333;'>Icon</h2></center>
    				</td>
    				<td>
    					<center><h2 style='color:#333;'>Fungsi</h2></center>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<center><img src='../../img/pinjam-hover.png' width='100'></center>
    				</td>
    				<td>
    					<center><h3 style='color:#333;'>Meminjam Barang</h3></center>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<br><center><img src='../../img/ngembaliin-hover.png' width='100'></center>
    				</td>
    				<td>
    					<center><h3 style='color:#333;'>Mengembalikan Barang</h3></center>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<br><center><img src='../../img/arus-hover.png' width='100'></center>
    				</td>
    				<td>
    					<center><h3 style='color:#333;'>Aktifitas Peminjaman Barang</h3></center>
    				</td>
    			</tr>
    			<tr>
    				<td>
    					<br><center><img src='../../img/profil-hover.png' width='100'></center>
    				</td>
    				<td>
    					<center><h3 style='color:#333;'>Info Profil</h3></center>
    				</td>
    			</tr>    			
    		</table>
  		</form>
        </div>
<div class='container'>
	<div class='col-md-10 col-md-offset-1' style='padding:0;background:white;box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.3);'>
		<div class='col-md-2' style='padding:0;'><img src="../profil/img/<?php foto(); ?>" height='200' width='158'></div>
		<div class='col-md-6' style='background:#2F74A3;'><h1 style='color:white;text-transform:capitalize;'><center><?php tampilnama();?></h1></center><br></div>
		<div class='col-md-4' style='background:#266997;'><h1 style="color:white;"><center><?php tampilkelas();?></center></h1><br></div>
		<a href="pinjam.php"><div class='col-md-2' style='padding:0;'>
			<div class='pinjam'>
			</div>
		</div>
		</a>
		<a href="kembali.php"><div class='col-md-2' style='padding:0;'>
				<div class='kembali'>
				</div>
		</div>
		</a>
		<a href="index.php"><div class='col-md-2' style='padding:0;'>
				<div class='traffic'>
				</div>
		</div>
		</a>
		<a href="profil.php"><div class='col-md-2' style='padding:0;'>
				<div class='profil'>
				</div>
		</div>
		</a>
		<a href="../../system/login.php?op=out"><div class='col-md-2' style='padding:0;'>
				<div class='logout'>
				</div>
		</div>
		</a>

		<div class='col-md-12'>
			<center><h1>Mengembalikan Barang</h1></center>
			<hr style='width:100px;border:1px solid #d4d4d4;'>
			<br>
			<h3 style='color:#333;'> Cara Mengembalikan barang</h3>
			<hr style='width:300px;border:1px solid #d4d4d4;margin-top:-2px;' class='pull-left'>
			<div class="row smpl-step col-md-offset-2" style="border-bottom: 0; min-width: 500px;">
		        <div class="col-xs-3 smpl-step-step complete">
		            <div class="text-center smpl-step-num">Step 1</div>
		            <div class="progress">
		                <div class="progress-bar"></div>
		            </div>
		            <a class="smpl-step-icon"><i class="glyphicon glyphicon-modal-window" style="font-size: 30px; padding-left:20px; padding-top: 20px; color: white;"></i></a>
		            <div class="smpl-step-info text-center col-md-offset-2">Simpan barang ke ruang barang</div>
		        </div>

		        <div class="col-xs-3 smpl-step-step complete">           
		            <div class="text-center smpl-step-num">Step 2</div>
		            <div class="progress">
		                <div class="progress-bar"></div>
		            </div>
		            <a class="smpl-step-icon"><i class="glyphicon glyphicon-pencil" style="font-size: 30px; padding-left:20px; padding-top: 20px; color: white;"></i></a>
		            <div class="smpl-step-info text-center col-md-offset-2">Isi form yang tersedia di web ini</div>
		        </div>
		        <div class="col-xs-3 smpl-step-step active">          
		            <div class="text-center smpl-step-num">Step 3</div>
		            <div class="progress">
		                <div class="progress-bar"></div>
		            </div>
		            <a class="smpl-step-icon"><i class="glyphicon glyphicon-ok" style="font-size: 30px; padding-left:20px; padding-top: 20px; color: white;"></i></a>
		            <div class="smpl-step-info text-center col-md-offset-2">Selesai</div>
	        	</div>
    		</div>
    		<h3 style='color:#333;'>Yuk isi datanya</h3>
			<hr style='width:300px;border:1px solid #d4d4d4;margin-top:-2px;' class='pull-left'>
			<br>
			<!-- <div class="alert alert-danger" role='alert'>
			    <strong>Error!</strong> A problem has been occurred while submitting your data. Please try again
			</div>
			<div class="alert alert-success" role='alert'>
			    <strong>Success</strong>
			</div>
			-->
			<form method='POST'>
				<div class="input-group">
				  <span class="input-group-addon glyphicon glyphicon-hand-right" id="basic-addon1"></span>
				  <input type="text" class="form-control" placeholder="ID Peminjaman" aria-describedby="basic-addon1">
				</div>
				<br>
				 <center><button type="submit" class="btn btn-success">Kembalikan</button></center>
			</form>
    		<center><img src="../../img/thumb-footer.png" height='50' style='margin-top:50px;'>
			<h5 style='color:#333;'>Made with love by Cowoteam</h5>
			</center>
		</div>

</body>
</html>