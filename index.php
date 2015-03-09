<html>
<head>
	<title>Inven</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">

	<!-- Tambahan -->
	<link rel="stylesheet" type="text/css" href="css/tambahan.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="js/bootstrap.min.js"></script>
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
  </div>
</div>

<div class="wide">
	<center><img src='img/logo.png' style='margin-top:150px;'>
		<h3 style='margin-top:40px;'> Aplikasi Inventaris Sekolah </h3>
		<br>
		<h4> Kamu siswa smk4 ? mau minjem peralatan buat dikelas ? daftar disini </h4>
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
	<div class="col-md-4">
    <div style="height:50%; width:100%; background-color:#333; opacity:0.8;">
    	<br>
    	<img src="img/thumb.png" class='img-responsive'>
    	<img src="img/logo.png" height='100'>
    </div>
    </div>
    <div class='col-md-3' style='border:1px solid white;border-radius:10px;margin-left:10px;'>
    <h1><?php jumlah(1); ?></h1>
        <p><?php nama_brg(1); ?></p>
    </div>
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;'>
    <h1><?php jumlah(2); ?></h1>
        <p><?php nama_brg(2); ?></p>
    </div>
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;'>
    <h1><?php jumlah(3); ?></h1>
        <p><?php nama_brg(3); ?></p>
    </div>
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(4); ?></h1>
        <p><?php nama_brg(4); ?></p>
    </div>
    <div class='col-md-3' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(5); ?></h1>
        <p><?php nama_brg(5); ?></p>
    </div>
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(6); ?></h1>
        <p><?php nama_brg(6); ?></p>
    </div>
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(7); ?></h1>
        <p><?php nama_brg(7); ?></p>
    </div>
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(8); ?></h1>
        <p><?php nama_brg(8); ?></p>
    </div>
    <div class='col-md-1' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(9); ?></h1>
        <p><?php nama_brg(9); ?></p>
    </div>
    <a href="#lainnya" id="login_pop">
    <div class='col-md-2' style='border:1px solid white;border-radius:10px;margin-left:10px;margin-top:10px;'>
    <h1><?php jumlah(8); ?></h1>
        <p>Lainnya</p>
    </div>
    </a>
    <div class='col-md-7' style='margin-top:20px;'>
	<p>Syarat dan ketentuan berlaku <a href='#'><span class='glyphicon glyphicon-question-sign'></span></a></p> 
	</div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<h5> Made with love by Cowoteam </h5>

    <!-- Popup Lainnya -->
    <a href="#x" class="overlay" id="lainnya"></a>
            <div class="popup">
            <form class="sign-up" style='width:700px;'>
                <h1 class="sign-up-title" style='color:#F0776C;'>Barang Lainnya</h1>
                <table width='100%'>
                    <tr>
                        <td width='30%'>
                            <center><h4 style='color:#333;'>Kode Barang</h4></center>
                        </td>
                        <td width='30%'>
                            <center><h4 style='color:#333;'>Merk Barang</h4></center>
                        </td>
                    </tr>               
                    <tr>
                    <td>
                    <center><h5 style='color:#333;'>-- Kode Barang --</h5></center>
                    </td>
                    <td>
                    <center><h5 style='color:#333;'>-- Merk Barang --</h5></center>
                    </td>
                </tr>
                </table>
            </form>
            </div>
    <!-- Akhir Popup -->
</div>
</body>
</html>