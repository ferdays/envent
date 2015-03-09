<?php 
include("connectdb.php");

if(!empty($_POST['jenis_barang'] && $_POST['nama_barang'] && $_POST['jumlah'])){

$name = $_POST['jenis_barang'];
$merk = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];

	
	$tambah_jenis = mysql_query("INSERT INTO jenis_barang(JENIS_BARANG) VALUES('".$name."')");

	$sql = mysql_query("SELECT FROM jenis_barang WHERE JENIS_BARANG = '".$name."' ");
	$data = mysql_fetch_array($sql);
	$jenis_data = $data['JENIS_BARANG_ID'];
for($i = 0; $i < $jumlah; $i++){

	$tambah_barang = mysql_query("INSERT INTO barang(JENIS_BARANG_ID,MERK_BARANG,KONDISI) VALUES( '".$jenis_data."', '".$name."', 'BAIK' ) ");

}

}
?>