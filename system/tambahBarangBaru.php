<?php 
include("connectdb.php");

if(!empty($_POST['name'] && $_POST['merk'] && $_POST['jumlah'])){

$name = $_POST['name'];
$merk = $_POST['merk'];
$jumlah = $_POST['jumlah'];

		$show = mysql_query("SELECT * FROM jenis");
		$jenis = mysql_query("INSERT INTO jenis(NAMA) VALUES( '".$name."' ) ");

	if($jenis){

		$barang = mysql_query("INSERT INTO barang(MERK,JUMLAH) VALUES( '".$merk."', '".$jumlah."' )");
	}

}
?>