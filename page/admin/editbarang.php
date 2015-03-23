<?php
session_start();
include('../../system/connect.php');
include('../../system/function.php');
if(!isset($_SESSION['USERNAME'])){
    die("Anda belum login");
}
if($_SESSION['TIPE']!="admin"){
    header('location:../../index.php');
}
?>
<html>
<head>
	<title>Inven</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="../../css/bootstrap-theme.min.css">

	<!-- Tambahan -->
	<link rel="stylesheet" type="text/css" href="../../css/tambahan.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery-1.3.2.min.js"></script>
  <script src="../../js/jquery-1.11.0.min.js"></script>
  <script src="../../js/bootstrap.min2.js"></script>
  <script src="../../js/modernizr.js"></script> <!-- Modernizr -->
</head>
<body style='background:#C0C6C2;'>
  <div class='container' style='background:#F1F3FA;height:900px;padding:0;box-shadow: 0 5px 5px black;'>
  <div class='navbar navbar-fixed-top'>
  <div class='container' style='padding:0;box-shadow: 0 5px 5px rgba(0,0,0,.09);'>
  <div class='col-md-2' style='background:#14B9D6;'>
    <center><img src="../../img/logo2.png" style='max-height:80px;' class='img-responsive'></center>
  </div>
    <div class='col-md-10' style='padding:10px;background:white;'>
        <a href="#x" class="overlay" id="tambah_form"></a>
        <div class="popup">
            
            <form method="POST" action="../../system/tambahBarangBaru.php" class="sign-up">
        <h1 class="sign-up-title" style='color:#F0776C;'>Tambah barang baru</h1>
        
        <input name="jenis_barang" type="text" class="sign-up-input" placeholder="Nama barang" required>
        <input name="nama_barang" type="text" class="sign-up-input" placeholder="Merk" required>
        <input name="jumlah" type="number" class="sign-up-input" placeholder="Jumlah" required>
        
        <input type="submit" value="Kirim" class="sign-up-button">
      </form>

        </div>
            <a class="close" href="#close"></a>
      <div class='col-md-3 pull-right'>
        <img src='../profil/img/profil.jpg' height='60' width='60' style='border-radius:50%;' class='pull-left col-md-offset-2'>
        <div class="dropdown" style='margin-top:10px;'>
        <button class="btn dropdown-toggle" style='background:transparent;' type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
        <p style='color:grey;font-size:16px;text-transform:capitalize;'> <?php tampilnama(); ?> <span class="caret"></span></p>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="setting.php">Pengaturan</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="../../system/login.php?op=out">Logout</a></li>
        </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br><br>
<div class='container' style='padding:0;'>
  <div class='col-md-2' style='height:1000px;background:#4D5B69;padding:0;position:fixed;width:14.5%;'>
    <a href="index.php"><div class='col-md-12 active' style='border-bottom:1px solid grey;'>
      <center><h2 class='glyphicon glyphicon-home' style='color:#15c1df;'></h2>
      <h4> Dashboard </h4>
      </center>
    </div>
    </a>
    <a href="statistic.php"><div class='col-md-12 lain' style='border-bottom:1px solid grey;'>
      <center><h2 class='glyphicon glyphicon-retweet' style='color:#15c1df;'></h2>
      <h4> Statistic </h4>
      </center>
    </div>
    </a>
    <a href="traffic.php"><div class='col-md-12 lain' style='border-bottom:1px solid grey;'>
      <center><h2 class='glyphicon glyphicon-transfer' style='color:#15c1df;'></h2>
      <h4> Traffic </h4>
      </center>
    </div>
    </a>
    <a href="user.php"><div class='col-md-12 lain' style='border-bottom:1px solid grey;'>
      <center><h2 class='glyphicon glyphicon-user' style='color:#15c1df;'></h2>
      <h4> User Panel </h4>
      </center>
    </div>
    </a>
    <a href="setting.php"><div class='col-md-12 lain' style='height:100px;border-bottom:1px solid grey;'>
      <center><h2 class='glyphicon glyphicon-cog' style='color:#15c1df;'></h2>
      <h4> Setting </h4>
      </center>
    </div>
    </a>
  </div>
  <div class='col-md-10' style='margin-left:17%;'>
    <h2 style='color:grey;'>Dashboard</h2>
    <ol class="breadcrumb" style='background:white;'>
      <li><i class='glyphicon glyphicon-home'> </i><a href='#'> &nbsp;E-nvent </a> </li> 
      <li class='active'> Dashboard</li>
    </ol>
    <div class='col-md-4'>
      <div class='komen'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_komen(); ?> </h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> New Comment </h3>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='user'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_user(); ?> </h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> User </h3>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='barang'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_barang(); ?></h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Item </h3>
      </div>
    </div>
  <hr style='width:500px;border:1px solid #d4d4d4;margin-top:200px;'>
  <h2 class='text-center' style='color:grey;'>Edit Barang </h2>
  <hr style='width:50px;border:1px solid #d4d4d4;'>
  <form>
    <center>
    <table width='60%'>
    <tr>
      <td><h3 style='color:grey;margin:0;' class='pull-left'>Nama Barang</h3></td>
      <td>
      <div class="input-group" style='width:100%;'>
      <input type="text" name="namabarang" class="form-control" placeholder='Nama Barang' value="">
      </div>
      </td>
    </tr>
    <tr>
      <td>
        <br>
      </td>
    </tr>
    <tr>
      <td><h3 style='color:grey;margin:0;' class='pull-left'>Merk Barang</h3></td>
      <td>
      <div class="input-group" style='width:100%;'>
      <input type="text" name="merkbarang" class="form-control" placeholder='Merk Barang' value="">
      </div>
      </td>
    </tr>
    </table>
    </center>
    <br>
    <button type='submit' name="submit" class='btn pull-right' style='background:#1BBC9B;color:white;'>Edit</button>
  </form>
</div>
</div>

<a href="#0" class="cd-top">Top</a>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../../js/main.js"></script> <!-- Gem jQuery -->
</body>
</html>