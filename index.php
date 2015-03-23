<html>
<head>
	<title>Inven</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

	<!-- Tambahann -->
	<link rel="stylesheet" type="text/css" href="css/tambahan.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>

<body style='background:#3333;'>
<?php 
require('system/function.php');
 ?>
<div class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      	<img src='img/thumb.png' height='50px'>
      </a>
    </div>
    <div class='pull-right'>
        <a href='#page3' class='btn' style='background:#E86256;color:white;margin:10px;'>
            List Barang
        </a>
    </div>
  </div>
</div>

<div class="wide">
	<center><img src='img/logo.png' style='margin-top:150px;'>
		<h3 style='margin-top:40px;'> Aplikasi Inventaris Sekolah </h3>
		<br>
		<h4> Kamu siswa smk4 ? mau minjem peralatan buat dikelas ? Masuk disini </h4>
		<br>
		<div class="main">
            <div class="panel">
			<a href="#login_form" id="login_pop" type="button" class="btn btn-large" style='border:1px solid white;width:250px;height:50px;'><h4>Masuk</h4></a>	
            </div>
        </div>

        <!-- popup form #2 -->
        <a href="#x" class="overlay" id="login_form"></a>
        <div class="popup">
        <form class="sign-up" action='system/login.php?op=in' method='post'>
   		 	<h1 class="sign-up-title" style='color:#F0776C;'>Login</h1>
    		<input name='username' type="text" class="sign-up-input" placeholder="Username">
    		<input name='password' type="password" class="sign-up-input" placeholder="Password">
    		<input type="submit" value="Login!" class="sign-up-button">
  		</form>
        </div>
        </div>
	</center>
</div>
<div id='page2'>
<div class='container'>
	<br><br>

	<center><h1>Apa sih Envent?</h1>
	<hr style='width:100px;border:1px solid white;'>
	<h4><i>"Envent adalah aplikasi web yang bertujuan untuk mendata traffic peminjaman barang-barang milik sekolah yang dipinjam siswa untuk kebutuhan dikelasnya"</i></h4>
	</center>
	<br><br>
	<center><h1>Envent buat siapa ?</h1>
	<hr style='width:100px;border:1px solid white;'>
	<h4>Envent diperuntukan untuk siswa smk4</h4>
	</center>
	<br>
	<center><h1>Kritik & saran buat Envent</h1>
	<hr style='width:100px;border:1px solid white;'>
	<h4>Tampilannya jelek ? sistemnya ancur ? kasih saran dong <a href="#comment_form" id="login_pop">Disini</a></h4>
	 <a href="#x" class="overlay" id="comment_form"></a>
        <div class="popup">
        <form class="sign-up" action='system/kritiksaran.php' method='post'>
   		 	<h1 class="sign-up-title" style='color:#F0776C;'>Kritik & Saran</h1>
        <input name='nama' type="text" class="sign-up-input" placeholder="Nama Kamu">
    		<input name='kritiksaran' type="text" class="sign-up-input" placeholder="Tulis Kritik & Saranmu">
    		<input type="submit" value="Kirim" class="sign-up-button">
  		</form>
        </div>
        <br><br>
        <img src="img/arrow.png" height="80">
        <br><br>
	</center>
</div>
</div>

<div id='page3'>
	<br><br>
	<center><h1>Live Statistic</h1>
	<hr style='width:100px;border:1px solid white;'>
	<div class='container'>
    <div class='wadahtabel'>
    <table class="table table-hover" style='color:white;'>
        <thead>
          <tr>
            <th>#</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Status</th>
            <th>Kondisi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>1003</td>
            <td>Laptop Lenovo</td>
            <td><span class="label label-success">Bisa Dipinjam</span> <!-- <span class="label label-danger">Tidak Bisa Dipinjam</span> --></td>
            <td><span class="label label-info">Baik</span></td>
          </tr>
        </tbody>
      </table>
    </div>
	<h5> Made with love by Cowoteam </h5>
    <a href="#0" class="cd-top">Top</a>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/main.js"></script> <!-- Gem jQuery -->
    </div>
</div>
</body>
</html>