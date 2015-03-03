<?php 
include('connect.php');
 session_start();

$user_id = $_SESSION['USER_ID'];
$id_peminjam = $_POST['id_peminjam'];

$sql = mysql_query("SELECT *FROM peminjam WHERE PEMINJAM_ID ='".$id_peminjam."' AND USER_ID= '".$user_id."' " );
$data = mysql_fetch_array($sql);
$data['PEMINJAM_ID'];


echo $id_peminjam;

if($sql){
	$kembali = mysql_query("UPDATE peminjam SET TANGGAL_KEMBALI=now() WHERE PEMINJAM_ID= '".$id_peminjam."' ");
	$barang = mysql_query("UPDATE barang SET JUMLAH=1 WHERE BARANG_ID = '".$data['PEMINJAM_ID']."' ");
}

else{
	echo " Ente ga minjem itu gan!";
}
 ?>