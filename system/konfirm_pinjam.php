<?php 
include("connect.php");

$id_peminjam = $_GET['id'];

		$sql = mysql_query("SELECT *FROM peminjam WHERE PEMINJAM_ID='".$id_peminjam."' ");
		$data = mysql_fetch_array($sql);
$id_brg = $data['BARANG_ID'];
$user_id = $data['USER_ID'];

		$sql_user = mysql_query("SELECT *FROM user WHERE USER_ID='".$user_id."' ");
$data_user = mysql_fetch_array($sql_user);
		
		mysql_query("UPDATE barang SET jumlah=0 WHERE BARANG_ID = '".$id_brg."' ");

	//cek + update Tabel User

		$pinjam_awal = $data_user['BANYAK_MEMINJAM'];
		$pinjam_akhir = $pinjam_awal + 1;
		$insert_user = mysql_query("UPDATE user set BANYAK_MEMINJAM='".$pinjam_akhir."' WHERE USER_ID = '".$user_id."' ");

	//update tabel Recent
		$tampil = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID WHERE brg.BARANG_ID='".$id_brg."' ");
		$row=mysql_fetch_row($tampil);
		$jenis = $row[8];
		$nama = $data_user['NAMA'];
		mysql_query("INSERT INTO recent(PEMINJAM_ID,USER_ID,NAMA,JENIS,TANGGAL_PINJAM) values( '".$id_peminjam."', '".$user_id."', '".$nama."', '".$jenis."', now() ) ");
		mysql_query("UPDATE peminjam SET PINJAM='yes' WHERE PEMINJAM_ID='".$id_peminjam."' ")or die(mysql_error());




		header('location:../page/admin/pemberitahuan.php?notice=berhasil');
 ?>