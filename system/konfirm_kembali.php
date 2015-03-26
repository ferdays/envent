<?php 
include("connect.php");

$id_peminjam = $_GET['id'];

$sql = mysql_query("SELECT *FROM peminjam WHERE PEMINJAM_ID='".$id_peminjam."' ");
$data = mysql_fetch_array($sql);
$id_brg = $data['BARANG_ID'];
$user_id = $data['USER_ID'];
$sql_user = mysql_query("SELECT *FROM user WHERE USER_ID='".$user_id."' ");
$data_user = mysql_fetch_array($sql_user);

	$update_tanggal = mysql_query("UPDATE peminjam SET TANGGAL_KEMBALI=now() WHERE PEMINJAM_ID='".$id_peminjam."' ")or die(mysql_error());
	$update_kembali = mysql_query("UPDATE peminjam SET kembali='yes' WHERE PEMINJAM_ID='".$id_peminjam."' ")or die(mysql_error());
	$update_jmlh_barang = mysql_query("UPDATE barang SET jumlah=1 WHERE BARANG_ID = '".$id_brg."' ");

		//update tabel Recent
		$tampil = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID WHERE brg.BARANG_ID='".$id_brg."' ");
		$row=mysql_fetch_row($tampil);
		$jenis = $row[8];
		$nama = $data_user['NAMA'];
		mysql_query("INSERT INTO recent(PEMINJAM_ID,USER_ID,NAMA,JENIS,TANGGAL_KEMBALI) values( '".$id_peminjam."', '".$user_id."', '".$nama."', '".$jenis."', now() ) ");
		mysql_query("UPDATE peminjam SET PINJAM='yes' WHERE PEMINJAM_ID='".$id_peminjam."' ")or die(mysql_error());

		header('location:../page/admin/pemberitahuan.php?notice=berhasil');
 ?> ?>