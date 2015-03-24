<?php 
include('connect.php');

$id_brg = $_GET['id'];

	$pinjaman = "DELETE FROM peminjam WHERE BARANG_ID='".$id_brg."' ";
	$delete_peminjam = mysql_query($pinjaman);

	$sql = "DELETE FROM barang WHERE BARANG_ID='".$id_brg."' ";
	$delete = mysql_query($sql);
	if($delete){

	header('location:../page/admin/index.php?delete=2');
}
else {
	echo "Barang belum di kembalikan.";
}
 ?>
