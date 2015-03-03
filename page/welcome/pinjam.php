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
			<a href="#<?php nama_brg(1); ?>" id="login_pop">
			<div class='col-md-3' style='background:#1BBC9B;'>
				<center>
					<h1 style='color:white;'><?php jumlah(1) ?></h1>
					<h3><?php nama_brg(1); ?></h3>
				</center>
			</div>
			</a>
        	<a href="#<?php nama_brg(2); ?>" id="login_pop">
			<div class='col-md-7' style='background:#4390DF;'>
				<center>
					<h1 style='color:white;'><?php jumlah(2) ?></h1>
					<h3><?php nama_brg(2); ?></h3>
				</center>
			</div>
			</a>
        	<a href="#<?php nama_brg(3); ?>" id="login_pop">
			<div class='col-md-2' style='background:#e67e22;'>
				<center>
					<h1 style='color:white;'><?php jumlah(3) ?></h1>
					<h3><?php nama_brg(3); ?></h3>
				</center>
			</div>
			</a>
			<a href="#<?php nama_brg(4); ?>" id="login_pop">
			<div class='col-md-7' style='background:#9b59b6;'>
				<center>
					<h1 style='color:white;'><?php jumlah(4) ?></h1>
					<h3><?php nama_brg(4); ?></h3>
				</center>
			</div>
			</a>
			<a href="#<?php nama_brg(5); ?>" id="login_pop">
			<div class='col-md-2' style='background:#e74c3c;'>
				<center>
					<h1 style='color:white;'><?php jumlah(5) ?></h1>
					<h3><?php nama_brg(5); ?></h3>
				</center>
			</div>
			</a>
			<a href="#<?php nama_brg(6); ?>" id="login_pop">
			<div class='col-md-3' style='background:#1BBC9B;'>
				<center>
					<h1 style='color:white;'><?php jumlah(6) ?></h1>
					<h3><?php nama_brg(6); ?></h3>
				</center>
			</div>
			</a>
			<a href="#<?php nama_brg(7); ?>" id="login_pop">
			<div class='col-md-2' style='background:#4390DF;'>
				<center>
					<h1 style='color:white;'><?php jumlah(7) ?></h1>
					<h3><?php nama_brg(7); ?></h3>
				</center>
			</div>
			</a>
			<a href="#<?php nama_brg(8); ?>" id="login_pop">
			<div class='col-md-3' style='background:#e67e22;'>
				<center>
					<h1 style='color:white;'><?php jumlah(8) ?></h1>
					<h3><?php nama_brg(8); ?></h3>
				</center>
			</div>
			</a>
			<a href="#<?php nama_brg(9); ?>" id="login_pop">
			<div class='col-md-7' style='background:#2F74A3;'>
				<center>
					<h1 style='color:white;'><?php jumlah(9) ?></h1>
					<h3><?php nama_brg(9); ?></h3>
				</center>
			</div>
			</a>
			<center><img src="../../img/thumb-footer.png" height='50' style='margin-top:50px;'>
			<h5 style='color:#333;'>Made with love by Cowoteam</h5>
			</center>
		</div>

		<!-- Pop Up -->

		<!-- Pop Up 1 -->
		<a href="#x" class="overlay" id="<?php nama_brg(1); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(1); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
            				<center><h5 style='color:#333;'>7FAECFC9</h5></center>
            			</td>
            			<td>
            				<center><h5 style='color:#333;'>Lenovo</h5></center>
            			</td>
            			<td>
            				<center><button type="submit" class="btn" style='background:#62C2E4;color:white;'>Pinjam</button> <a href='#detail' class="btn" style='background:#63CA82;color:white;'>Lihat Detail</a></center>
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 1 -->

        <!-- Pop Up 2 -->
		<a href="#x" class="overlay" id="<?php nama_brg(2); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(2); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 2 -->

        <!-- Pop Up 3 -->
		<a href="#x" class="overlay" id="<?php nama_brg(3); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(3); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 3 -->

        <!-- Pop Up 4 -->
		<a href="#x" class="overlay" id="<?php nama_brg(4); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(4); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 4 -->

        <!-- Pop Up 5 -->
		<a href="#x" class="overlay" id="<?php nama_brg(5); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(5); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 5 -->

        <!-- Pop Up 6 -->
		<a href="#x" class="overlay" id="<?php nama_brg(6); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(6); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 6 -->

        <!-- Pop Up 7 -->
		<a href="#x" class="overlay" id="<?php nama_brg(7); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(7); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 7 -->

        <!-- Pop Up 8 -->
		<a href="#x" class="overlay" id="<?php nama_brg(8); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(8); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 8 -->        

        <!-- Pop Up 9 -->
		<a href="#x" class="overlay" id="<?php nama_brg(9); ?>"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'><?php nama_brg(9); ?></h1>
            	<table width='100%'>
            		<tr>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Kode Barang</h4></center>
            			</td>
            			<td width='30%'>
            				<center><h4 style='color:#333;'>Merk Barang</h4></center>
            			</td>
            			<td width='30%'>
            			</td>
            		</tr>
            		 <tr>
            			<td>
 
            			</td>
            			<td>

            			</td>
            			<td>
            				
            			</td>
            		</tr>
            	</table>
	  		</form>
        	</div>
        <!-- Akhir Pop Up 9 -->

		<a href="#x" class="overlay" id="detail"></a>
	        <div class="popup">
            <form class="sign-up" style='width:700px;'>
            	<h1 class="sign-up-title" style='color:#F0776C;'>Detail</h1>
            <table>
            	<tr>
            		<td width='40%' rowspan='4'>
            			<img src="../../img/barang/laptop-lenovo.jpg" style='max-width:300px;'>
            		</td>
            		<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Nama  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : Laptop Lenovo </h4>
            		</td>
            		<tr>
            			<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Tanggal Pembelian  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : 02 - Maret - 2015 </h4>
            		</td>
            		</tr>
            		<tr>
            			<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Kondisi  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : <span class="label label-info">Baik </span></h4>
            		</td>
            		</tr>
            		<tr>
            			<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Status  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : <span class="label label-success">Ada </span></h4>
            		</td>
            		</tr>
            	</tr>
            </table>
            <br>
            <center><button type="submit" class="btn" style='background:#62C2E4;color:white;'>Pinjam</button> <a href='#x' class="btn" style='background:#63CA82;color:white;'>Kembali</a></center>
	  		</form>
        	</div>
<!-- Keterangan -->

<?php 
if(!empty($_GET['pinjam']))
{
       if($_GET['pinjam'] == 'sukses')
        {
        	alert("Barang Berhasil di Pinjam!");
        }
        else
        {
        	alert("Barang yang anda minta Sedang di pinjam.");
        }
}
?>   

</body>
</html>