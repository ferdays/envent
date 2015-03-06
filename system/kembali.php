<?php 
include('connect.php');
 session_start();

$user_id = $_SESSION['USER_ID'];
$id_peminjam = $_POST['id_peminjam'];

echo $user_id;
echo "<br/>";
echo $id_peminjam;
echo "<br/>";

$sql= "SELECT *FROM peminjam WHERE PEMINJAM_ID='".$id_peminjam."' ";
$cek= mysql_query($sql);
$data = mysql_fetch_array($cek);
$barang_id = $data['BARANG_ID'];
$tanggal = $data['TANGGAL_KEMBALI'];

if($data['USER_ID']==$user_id){
	if($tanggal=='0000-00-00 00:00:00'){
		$update_tanggal = mysql_query("UPDATE peminjam SET TANGGAL_KEMBALI=now() WHERE PEMINJAM_ID='".$id_peminjam."' ")or die(mysql_error());
		$update_barang = mysql_query("UPDATE barang SET jumlah=1 WHERE BARANG_ID='".$barang_id."' ");
	//update tabel Recent
		$sql_user = mysql_query("SELECT * FROM user WHERE USER_ID = '".$user_id."' ");
		$data_user = mysql_fetch_array($sql_user);
		$id_brg = $data['BARANG_ID'];
		$tampil = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID WHERE brg.BARANG_ID='".$id_brg."' ");
		$row=mysql_fetch_row($tampil);
		$jenis = $row[10];
		$nama = $data_user['NAMA'];
		mysql_query("INSERT INTO recent(PEMINJAM_ID,NAMA,JENIS,TANGGAL_KEMBALI) values( '".$id_peminjam."', '".$nama."', '".$jenis."', now() ) ");
		
		header('location:../page/welcome/kembali.php?kembali=sukses');
	}
	else{
		header('location:../page/welcome/kembali.php?kembali=sudah');
	}
}
else{

	header('location:../page/welcome/kembali.php?kembali=gagal');
}