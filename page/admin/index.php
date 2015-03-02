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
</head>
<body style='background:#C0C6C2;'>
  <div class='container' style='background:#F1F3FA;padding:0;box-shadow: 0 5px 5px black;height:auto;'>
  <div class='navbar navbar-fixed-top'>
  <div class='container' style='padding:0;box-shadow: 0 5px 5px rgba(0,0,0,.09);'>
  <div class='col-md-2' style='background:#14B9D6;'>
    <center><img src="../../img/logo2.png" style='max-height:80px;' class='img-responsive'></center>
  </div>
    <div class='col-md-10' style='padding:10px;background:white;'>
      <div class='col-md-4'>
        <div class="input-group" style='margin-top:15px;'>
          <input type="text" class="form-control" placeholder="Search..." style='border:none;box-shadow:none;'>
          <span class="input-group-btn">
            <button class="btn btn-default" type="button" style='background:transparent;border:none;box-shadow:none;'><p class='glyphicon glyphicon-search' style='color:grey;'></p></button>
          </span>
        </div>
      </div>
        <a href="#x" class="overlay" id="tambah_form"></a>
        <div class="popup">
            <form class="sign-up">
        <h1 class="sign-up-title" style='color:#F0776C;'>Tambah barang baru</h1>
        <input type="text" class="sign-up-input" placeholder="Nama barang">
        <input type="text" class="sign-up-input" placeholder="Merk">
        <input type="number" class="sign-up-input" placeholder="Jumlah">
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
  <div class='col-md-2' style='height:1000px;background:#4D5B69;padding:0;'>
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
  <div class='col-md-10'>
    <h2 style='color:grey;'>Dashboard</h2>
    <ol class="breadcrumb" style='background:white;'>
      <li><i class='glyphicon glyphicon-home'> </i><a href='#'> &nbsp;E-nvent </a> </li> 
      <li class='active'> Dashboard</li>
    </ol>
    <div class='col-md-4'>
      <div class='komen'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php komen(); ?> </h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> New Comment </h3>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='user'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php user(); ?> </h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> User </h3>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='barang'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'>60 </h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Item </h3>
      </div>
    </div>
  <hr style='width:500px;border:1px solid #d4d4d4;margin-top:200px;'>
  <h2 class='text-center' style='color:grey;'>Admin Panel </h2>
  <hr style='width:50px;border:1px solid #d4d4d4;'>
  <div class='col-md-5'>
  <div class="panel panel-default" style='border:none;'>
  <div class="panel-heading" style='background:#FFB848;'>
    <h2 class="panel-title" style='color:white;font-size:20px;'><i class='glyphicon glyphicon-plus'></i> Tambah Barang</h2>
  </div>
  <div class="panel-body" style='background:white;border:1px solid #FFB848;border-top:none;'>
    <table width='100%'>
      <tr>
        <td width='100'>
          Nama barang
        </td>
        <td>
          <div class="input-group">
          <select class="form-control" placeholder="Nama barang..." style='border:none;box-shadow:none;'>
          <option>Laptop</option>
          <option>Infocus</option>
          <option>Speaker</option>
          <option>Handicam</option>
          <option>Pocket</option>
          <option>DLSR</option>
          <option>Movie Camera</option>
          <option>Jimbe</option>
        </select>
        </div>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <a href="#tambah_form" id="login_pop" type='button' class='btn pull-right' style='background:#FFB848;color:white;display:inline;'>Tambah Baru ?</a>
        </td>
      </tr>
      <tr>
        <td width='100'>
          Merk
        </td>
        <td>
          <div class="input-group">
          <input type="text" class="form-control" placeholder="Merk barang..." style='border:none;box-shadow:none;'>
        </div>
        </td>
      </tr>
      <tr>
        <td>
          Jumlah
        </td>
        <td>
          <div class="input-group">
          <input type="number" class="form-control" placeholder="Jumlah..." style='border:none;box-shadow:none;'>
        </div>
        </td>
      </tr>
    </table>
    <button type='button' class='btn pull-right' style='background:#FFB848;color:white;'>Kirim</button>
  </div>
  </div>
  </div>
  <div class='col-md-7'>
  <div class="panel panel-default" style='border:none;'>
  <div class="panel-heading" style='background:#7D6BA1;'>
    <h2 class="panel-title" style='color:white;font-size:20px;'><i class='glyphicon glyphicon-user'></i> List User</h2>
  </div>
  <div class="panel-body" style='background:white;border:1px solid #7D6BA1;border-top:none;max-height:166px;overflow:auto;'>
    <table width='100%' border='1' style='text-align:center;border:1px solid #C0C6C2;'>
      <tr>
        <td>
          <h4 style='color:black;'>ID</h4>
        </td>
        <td>
          <h4 style='color:black;'>Nama</h4>
        </td>
        <td>
          <h4 style='color:black;'>Kelas</h4>
        </td>
        <td>
          <h4 style='color:black;'>Pernah meminjam</h4>
        </td>
        <td>
          <h4 style='color:black;'>Jenis Kelamin</h4>
        </td>
      </tr>
      <tr>
        <td>
          1
        </td>
        <td>
          Ferdi
        </td>
        <td>
          XI RPL B
        </td>
        <td>
          14 Kali
        </td>
        <td>
          Cowo
        </td>
      </tr>
    </table>
  </div>
  </div>
  </div>
  <div class='col-md-12' style='margin-top:20px;'>
  <div class="panel panel-default" style='border:none;'>
  <div class="panel-heading" style='background:#14B9D6;'>
    <h2 class="panel-title" style='color:white;font-size:20px;'><i class='glyphicon glyphicon-book'></i> List Barang</h2>
  </div>
  <div class="panel-body" style='background:white;border:1px solid #14B9D6;border-top:none;max-height:300px;overflow:auto;'>
    <table width='100%' border='1' style='text-align:center;border:1px solid #C0C6C2;'>
      <tr>
        <td>
          <h4 style='color:black;'>Nama</h4>
        </td>
        <td>
          <h4 style='color:black;'>Merk</h4>
        </td>
        <td>
          <h4 style='color:black;'>Jumlah</h4>
        </td>
        <td>
          <h4 style='color:black;'>Aksi</h4>
        </td>
      </tr>
      <tr>
        <td>
          Laptop
        </td>
        <td>
          Xenom
        </td>
        <td>
          2
        </td>
        <td>
          <span class='glyphicon glyphicon-edit' style='color:grey;'></span>
          &nbsp; &nbsp;
          <span class='glyphicon glyphicon-remove' style='color:red;'></span>
        </td>
      </tr>
      <tr>
        <td>
          Infocus
        </td>
        <td>
          Dell
        </td>
        <td>
          2
        </td>
        <td>
          <span class='glyphicon glyphicon-edit' style='color:grey;'></span>
          &nbsp; &nbsp;
          <span class='glyphicon glyphicon-remove' style='color:red;'></span>
        </td>
      </tr>
    </table>
  </div>
  </div>

  </div>  
  </div>
</div>
</div>
<center><img src="../../img/thumb.png" height='50' style='margin-top:50px;'>
      <h5 style='color:#333;'>Made with love by Cowoteam</h5>
      </center>
</body>
</html>