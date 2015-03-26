<?php include('connect.php') ?>

<?php
 session_start();

$user_id = $_SESSION['USER_ID'];
$id_brg = $_GET['id'];

//cek + update tabel Barang
$sql = mysql_query("SELECT * FROM barang WHERE BARANG_ID = '".$id_brg."' ");
$data = mysql_fetch_array($sql);

if($sql){

	if($data['JUMLAH']==1){
		
	
	

	//cek Tabel Peminjam
		$peminjam_tabel = mysql_query("SELECT *FROM peminjam WHERE USER_ID='".$user_id."' ");
		$data_peminjam_user = mysql_fetch_array($peminjam_tabel);
		$peminjam_peminjam_brg = mysql_query("SELECT *FROM peminjam");
	
	//hitung jumlah barang berapa kali di pinjam
		$jumlah_pinjam_brg = mysql_num_rows($peminjam_peminjam_brg);
		$jumlah_pinjam_brg_akhir = $jumlah_pinjam_brg + 1;
		$id_peminjam = " ".$data['JENIS_BARANG_ID']."0".$jumlah_pinjam_brg_akhir." ";

	//Update Tabel Peminjam
		$insert_pinjam = mysql_query("INSERT INTO peminjam(PEMINJAM_ID,USER_ID,BARANG_ID,TANGGAL_PINJAM,PINJAM) values('".$id_peminjam."', '".$user_id."', '".$id_brg."', now(), 'wait') ");
		//echo $jumlah_pinjam_brg;

/*
*/

		header('location:../page/welcome/pinjam.php?pinjam=sukses');
		

		}

}
else{
	header('location:../page/welcome/pinjam.php?pinjam=gagal');
	echo "fail??";
}

?>