<?php 
include("connect.php");
session_start();
$name = $_POST['jenis_barang'];
$merk = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];

	
	$tambah_jenis = mysql_query("INSERT INTO jenis_barang(JENIS_BARANG) VALUES('".$name."')");

	$sql = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG = '".$name."' ");
	$data = mysql_fetch_array($sql);
		$jenis_data = $data['JENIS_BARANG_ID'];


for($i = 0; $i < $jumlah; $i++){

$sql_jenis = mysql_query("SELECT *FROM barang WHERE JENIS_BARANG_ID ='".$jenis_data."'");
$jumlah_jenis = mysql_num_rows($sql_jenis);
$kode_barang = "".$jenis_data."00".$jumlah_jenis."";

	$tambah_barang = mysql_query("INSERT INTO barang(JENIS_BARANG_ID, MERK_BARANG, KONDISI, KODE_BARANG) VALUES( '".$jenis_data."', '".$merk."', 'BAIK', '".$kode_barang."' ) ");

}

?>