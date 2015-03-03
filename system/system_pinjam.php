<?php include('connect.php') ?>
<?php
 session_start();

$user_id = $_SESSION['USER_ID'];
//$name = $_GET['nama_brg'];
$kode = $_GET['id'];

$sql = mysql_query("SELECT * FROM barang WHERE BARANG_ID = '".$kode."' ");
$users = mysql_query("SELECT *FROM user WHERE USER_ID = '".$user_id."' ");

if($sql){

$data = mysql_fetch_array($sql);
$data_user = mysql_fetch_array($users);

$peminjam_tabel = mysql_query(" SELECT *FROM peminjam ");
$jumlah_awal = mysql_num_rows($peminjam_tabel);
$jumlah_akhir = $jumlah_awal + 1;
$id_peminjam = " ".$data['JENIS_BARANG_ID']."-".$jumlah_akhir." ";

if($data['jumlah']==1){
$pinjam_awal = $data_user['BANYAK_MEMINJAM'];
$pinjam_akhir = $pinjam_awal + 1;
$pinjam = mysql_query("UPDATE barang SET JUMLAH=0 WHERE BARANG_ID = '".$kode."' ");
$insert_pinjam = mysql_query("INSERT INTO peminjam(PEMINJAM_ID,USER_ID,BARANG_ID,TANGGAL_PINJAM) values('".$id_peminjam."', '".$user_id."', '".$kode."', now() ) ");
$insert_user = mysql_query("UPDATE user set BANYAK_MEMINJAM='".$pinjam_akhir."' WHERE USER_ID = '".$user_id."' ");

echo "Anda Berhasil Meminjam Barang, Saat mengembalika diperlukan PEMINJAMAN_ID, Di saran kan untuk mencatat Peminjaman ID anda : '".$id_peminjam."' ";
echo "<a href='../page/welcome/pinjam.php?pinjam=sukses'>OKE</a>";
//header('location:../page/welcome/pinjam.php?pinjam=$row[1]');
}
}
else{
header('location:../page/welcome/pinjam.php?pinjam=gagal');
echo "fail??";
}

?>