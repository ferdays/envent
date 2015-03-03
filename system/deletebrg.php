<?php 
include('connect.php');




$id_brg = $_GET['id'];
$tampil = mysql_query("SELECT * FROM barang WHERE BARANG_ID='".$id_brg."' ");
$data = mysql_fetch_array($tampil);
$awal = $data['JUMLAH'];
	$sql = "DELETE FROM barang WHERE BARANG_ID='".$id_brg."' ";
	$delete = mysql_query($sql);
	if($delete){
	header('location:../page/admin/index.php?delete=2');
}
 ?>