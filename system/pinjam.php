<?php include('connect.php') ?>
<?php
 session_start();

$user_id = $_SESSION['USER_ID'];
$name = $_POST['nama_brg'];
$kode = $_POST['kode_barang'];

$sql = mysql_query("SELECT * FROM barang WHERE BARANG_ID = '".$kode."' ");
$users = mysql_query("SELECT *FROM user WHERE USER_ID = '".$user_id."' ");

if($sql){

$data = mysql_fetch_array($sql);
$data_user = mysql_fetch_array($users);
if($data['jumlah']==1){
$pinjam_awal = $data_user['BANYAK_MEMINJAM'];
$pinjam_akhir = $pinjam_awal + 1;
$pinjam = mysql_query("UPDATE barang SET JUMLAH=0 WHERE BARANG_ID = '".$kode."' ");
$insert_pinjam = mysql_query("INSERT INTO peminjam(USER_ID,BARANG_ID,TANGGAL_PINJAM) values( '".$user_id."', '".$kode."', now() ) ");
$insert_user = mysql_query("UPDATE user set BANYAK_MEMINJAM='".$pinjam_akhir."' WHERE USER_ID = '".$user_id."' ");

$peminjaman = mysql_query("SELECT *FROM peminjam ");
$data
alert("Peminjaman berhasil, ini dia kode peminjaman anda, anda akan memerlukan nya saat anda mengembalikan barang yang anda pinjam : '".$."' ")


header('location:../page/welcome/pinjam.php?pinjam=sukses');

}
else{
header('location:../page/welcome/pinjam.php?pinjam=gagal');
}
}
?>