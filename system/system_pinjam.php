<?php include('connect.php') ?>

<?php
 session_start();

$user_id = $_SESSION['USER_ID'];
$id_brg = $_GET['id'];

//cek + update tabel Barang
$sql = mysql_query("SELECT * FROM barang WHERE BARANG_ID = '".$id_brg."' ");
$data = mysql_fetch_array($sql);

if($sql){

	if($data['jumlah']==1){
		$pinjam = mysql_query("UPDATE barang SET jumlah=0 WHERE BARANG_ID = '".$id_brg."' ");
	
	//cek + update Tabel User
		$users = mysql_query("SELECT *FROM user WHERE USER_ID = '".$user_id."' ");
		$data_user = mysql_fetch_array($users);
		$pinjam_awal = $data_user['BANYAK_MEMINJAM'];
		$pinjam_akhir = $pinjam_awal + 1;
		$insert_user = mysql_query("UPDATE user set BANYAK_MEMINJAM='".$pinjam_akhir."' WHERE USER_ID = '".$user_id."' ");

	//cek Tabel Peminjam
		$peminjam_tabel = mysql_query("SELECT *FROM peminjam WHERE USER_ID='".$user_id."' ");
		$data_peminjam_user = mysql_fetch_array($peminjam_tabel);
		$peminjam_peminjam_brg = mysql_query("SELECT *FROM peminjam");
	
	//hitung jumlah barang berapa kali di pinjam
		$jumlah_pinjam_brg = mysql_num_rows($peminjam_peminjam_brg);
		$jumlah_pinjam_brg_akhir = $jumlah_pinjam_brg + 1;
		$id_peminjam = " ".$data['JENIS_BARANG_ID']."0".$jumlah_pinjam_brg_akhir." ";
	//Update Tabel Peminjam
		$insert_pinjam = mysql_query("INSERT INTO peminjam(PEMINJAM_ID,USER_ID,BARANG_ID,TANGGAL_PINJAM) values('".$id_peminjam."', '".$user_id."', '".$id_brg."', now() ) ");
		echo $jumlah_pinjam_brg;

		echo "Anda Berhasil Meminjam Barang, Saat mengembalika diperlukan PEMINJAMAN_ID, Di saran kan untuk mencatat Peminjaman ID anda : '".$id_peminjam."' ";
		echo "<a href='../page/welcome/pinjam.php?pinjam=sukses'>OKE</a>";
		}

}
else{
	header('location:../page/welcome/pinjam.php?pinjam=gagal');
	echo "fail??";
}

?>