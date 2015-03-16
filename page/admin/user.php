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
  <div class='container' style='background:#F1F3FA;height:auto;padding:0;box-shadow: 0 5px 5px black;'>
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
  <div class='col-md-2' style='height:2000px;background:#4D5B69;padding:0;position:fixed;width:14.5%;'>
    <a href="index.php"><div class='col-md-12 lain' style='border-bottom:1px solid grey;'>
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
    <a href="user.php"><div class='col-md-12 active' style='border-bottom:1px solid grey;'>
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
    <h2 style='color:grey;'>User Panel</h2>
    <ol class="breadcrumb" style='background:white;'>
      <li><i class='glyphicon glyphicon-user'> </i><a href='#'> &nbsp;E-nvent </a> </li> 
      <li class='active'> User Panel</li>
    </ol>
    <div class='col-md-4'>
      <div class='user'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_user(); ?> </h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> User </h3>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='riwayat'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_peminjaman(); ?></h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Peminjaman Barang </h3>
      </div>
    </div>
    <div class='col-md-4'>
      <div class='admin'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_admin(); ?></h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Admin </h3>
      </div>
    </div>
  <hr style='width:500px;border:1px solid #d4d4d4;margin-top:200px;'>
  <h2 class='text-center' style='color:grey;'> User Panel </h2>
  <hr style='width:50px;border:1px solid #d4d4d4;'>
<form method="post" action="../../system/tambahUser.php">
    <div class='col-md-5'>
  <div class="panel panel-default" style='border:none;'>
  <div class="panel-heading" style='background:#FFB848;'>
    <h2 class="panel-title" style='color:white;font-size:20px;'><i class='glyphicon glyphicon-plus'></i> Tambah User</h2>
  </div>
  <div class="panel-body" style='background:white;border:1px solid #FFB848;border-top:none;'>
      <table>
    
      <tr>
        <td width='100'>
          Nama
        </td>
        <td>
          <div class="input-group">
          <input type="text" name="name" class="form-control" placeholder="Nama..." style='border:none;box-shadow:none;'required>
        </div>
        </td>
      </tr>
      <tr>
        <td width='100'>
          Kelas
        </td>
        <td>
          <div class="input-group">
          <input type="text" name="kelas" class="form-control" placeholder="Kelas..." style='border:none;box-shadow:none;'required>
        </div>
        </td>
      </tr>
      <tr>
        <td width='100'>
          Username
        </td>
        <td>
          <div class="input-group">
          <input type="text" name="username" class="form-control" placeholder="Username..." style='border:none;box-shadow:none;'required>
        </div>
        </td>
      </tr>
      <tr>
        <td width='100'>
          Password
        </td>
        <td>
          <div class="input-group">
          <input type="password" name="password" class="form-control" placeholder="Password..." style='border:none;box-shadow:none;'required>
        </div>
        </td>
      </tr>
      <tr>
        <td>
          Jenis Kelamin
        </td>


        <td>
           <div class="btn-group" data-toggle="buttons" style='margin-left:10px;'>
          <label class="btn btn-default">
            <input type="radio" id="jenis-kelamin" name="jenis-kelamin" value="laki-laki" /> L
          </label>
          <label class="btn btn-default active">
            <input type="radio" id="jenis-kelamin" name="jenis-kelamin" value="perempuan" /> P
          </label>
          </div>
        </div>
        </td>
      

      </tr>
    </table>
    <button type='submit' name="button" class='btn pull-right' style='background:#FFB848;color:white;'>Tambahkan</button>
 </div>
  </div>
  </div>

</form>    <div class='col-md-7'>
  <div class="panel panel-default" style='border:none;'>
  <div class="panel-heading" style='background:#7D6BA1;'>
    <h2 class="panel-title" style='color:white;font-size:20px;'><i class='glyphicon glyphicon-user'></i> List User</h2>
  </div>
  <div class="panel-body" style='background:white;border:1px solid #7D6BA1;border-top:none;max-height:250px;overflow:auto;'>
    <table width='100%' border='1' style='text-align:center;border:1px solid #C0C6C2;'>
      <tr>
        <td>
          <h4 style='color:black;'>ID</h4>
        </td>
        <td>
          <h4 style='color:black;'>Nama</h4>
        </td>
        <td>
          <h4 style='color:black;'>Aksi</h4>
        </td>
      </tr>
      <?php list_user(); ?>
    </table>
  </div>
  </div>
  </div>
  <hr style='width:500px;border:1px solid #d4d4d4;margin-top:350px;'>
  <h2 class='text-center' style='color:grey;'> Info User </h2>
  <hr style='width:50px;border:1px solid #d4d4d4;'>
  <div class='col-md-12' style='max-height:1200px;overflow:auto;'>
    <?php info_user(); ?>
  </div>
  <br>
  .
  </div>
</div>
</div>
<a href="#0" class="cd-top">Top</a>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../../js/main.js"></script> <!-- Gem jQuery -->
</body>
</html>