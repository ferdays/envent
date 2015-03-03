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
  <script type="text/javascript" src="../../js/jquery.min.js"></script>
  <script src="../../js/highcharts.js"></script>
  <script type="text/javascript">
    $(function () {
      var chart;
      $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line',  
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Visitor',
                x: -20
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar','Apr','Mei','Jun','Jul','Ags','Sept','Okt','Nov','Des']
            },
            yAxis: {
                title: { 
                    text: 'Banyaknya Visitor'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: { 
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y ;
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{  
                name: 'Visitor',  
                data: [1660, 1946,2271,2590,3004,3550,1234,4124,5124,2413,1234,5312]
            }]
        });
    });
    
});
    </script>
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
    <a href="index.php"><div class='col-md-12 lain' style='border-bottom:1px solid grey;'>
      <center><h2 class='glyphicon glyphicon-home' style='color:#15c1df;'></h2>
      <h4> Dashboard </h4>
      </center>
    </div>
    </a>
    <a href="statistic.php"><div class='col-md-12 active' style='border-bottom:1px solid grey;'>
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
    <h2 style='color:grey;'>Statistic</h2>
    <ol class="breadcrumb" style='background:white;'>
      <li><i class='glyphicon glyphicon-retweet'> </i><a href='#'> &nbsp;E-nvent </a> </li> 
      <li class='active'> Statitic</li>
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
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_barang() ?></h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Item </h3>
      </div>
    </div>
  <hr style='width:500px;border:1px solid #d4d4d4;margin-top:200px;'>
  <div class='col-md-6' style='background:white;'>
    <br>
    <h3 style='color:#4DB3A2;display:inline;'><b>VISITOR</b> </h3><p style='color:grey;display:inline;'>Tahun 2015...</p>
    <hr style='border:1px solid #d4d4d4;'><div id="container" style="width:103%; height: 400px; margin: 0 auto"></div>
  </div>
  <div class='col-md-5' style='background:white;margin-left:20px;height:400px;'>
    <br>
    <h3 style='color:#CC4444;display:inline;'><b>USER</b> </h3><p style='color:grey;display:inline;'>Tahun 2010-2015</p>
    <hr style='border:1px solid #d4d4d4;'>
    <iframe src='userchart.php' style='border:none;width:100%;height:100%;overflow:none;'></iframe>
  </div>
  <hr style='width:500px;border:1px solid #d4d4d4;margin-top:450px;'>
  <div class='col-md-4' style='margin-top:20px;'>
      <div class='riwayat'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_peminjaman(); ?></h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Peminjaman Barang </h3>
      </div>
    </div>
  <div class='col-md-4' style='margin-top:20px;'>
      <div class='admin'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'><?php jumlah_admin(); ?></h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Admin </h3>
      </div>
    </div>
  <div class='col-md-4' style='margin-top:20px;'>
      <div class='undifined'>
        <h1 class='text-right' style='margin:0;padding-top:25px;margin-right:20px;color:white;'>0</h1>
        <h3 class='pull-right' style='margin:0;margin-right:20px;'> Undifined? </h3>
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