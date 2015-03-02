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
	<title>E-nvent | Pinjam Barang</title>
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
			<center><h1>Pinjam Barang</h1></center>
			<hr style='width:100px;border:1px solid #d4d4d4;'>
			<h3 style='color:#333;'> Barang yang tersedia saat ini</h3>
			<hr style='width:300px;border:1px solid #d4d4d4;margin-top:-2px;' class='pull-left'>
			<br>
			<div class='col-md-3' style='background:#1BBC9B;'>
				<center>
					<h1 style='color:white;'>15</h1>
					<h3> Laptop </h3>
				</center>
			</div>
			<div class='col-md-7' style='background:#4390DF;'>
				<center>
					<h1 style='color:white;'>12</h1>
					<h3> Speaker </h3>
				</center>
			</div>
			<div class='col-md-2' style='background:#e67e22;'>
				<center>
					<h1 style='color:white;'>5</h1>
					<h3> DLSR </h3>
				</center>
			</div>
			<div class='col-md-7' style='background:#9b59b6;'>
				<center>
					<h1 style='color:white;'>3</h1>
					<h3> Infocus </h3>
				</center>
			</div>
			<div class='col-md-2' style='background:#e74c3c;'>
				<center>
					<h1 style='color:white;'>4</h1>
					<h3> Handicam </h3>
				</center>
			</div>
			<div class='col-md-3' style='background:#1BBC9B;'>
				<center>
					<h1 style='color:white;'>1</h1>
					<h3> Pocket </h3>
				</center>
			</div>
			<div class='col-md-2' style='background:#4390DF;'>
				<center>
					<h1 style='color:white;'>1</h1>
					<h3> Gitar </h3>
				</center>
			</div>
			<div class='col-md-3' style='background:#e67e22;'>
				<center>
					<h1 style='color:white;'>5</h1>
					<h3> Jimbe </h3>
				</center>
			</div>
			<div class='col-md-7' style='background:#2F74A3;'>
				<center>
					<h1 style='color:white;'>1</h1>
					<h3> Movie Camera </h3>
				</center>
			</div>
			<h3 style='color:#333;margin-top:20px;'> . <br><br>Mau pinjam apa ?</h3>
			<hr style='width:300px;border:1px solid #d4d4d4;margin-top:-2px;' class='pull-left'>
			<br>
			
			<!-- <div class="alert alert-danger" role='alert'>
			    <strong>Error!</strong> A problem has been occurred while submitting your data. Please try again
			</div>
			
			<div class="alert alert-success" role='alert'>
			    <strong>Sukses!</strong> ID kamu adalah <b><font style='font-size:20px;color:red;'>1</font> <strong>Simpan ID kamu untuk mengembalikan barang</strong></b>
			</div>
			-->
			<form>
				<div class="form-group">
				  <label for="sel1">Nama Barang:</label>
				  <select class="form-control" id="sel1" style='font-size:15px;'>
				    <option>Speaker</option>
				    <option>Infocus</option>
				    <option>Laptop</option>
				    <option>Handicam</option>
				    <option>DLSR</option>
				    <option>Pocket</option>
				    <option>Movie Camera</option>
				    <option>Gitar</option>
				    <option>Jimbe</option>
				  </select>
					<br>
				  <input type='number' class='form-control' placeholder='Jumlah'>
					<br>
				  <center><button type="submit" class="btn btn-success">Pinjam</button></center>
				</div>
			</form>
			<center><img src="../../img/thumb-footer.png" height='50' style='margin-top:50px;'>
			<h5 style='color:#333;'>Made with love by Cowoteam</h5>
			</center>
		</div>
</body>
</html>