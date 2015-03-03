<?php 
include("connect.php");
session_start();
 ?>

 <?php 

if(!empty($_POST['name_brg'] && $_POST['merk_brg'] && $_POST['jumlah_brg'])){

$nama_barang = $_POST['name_brg'];
$merk_barang = $_POST['merk_brg'];
$jumlah_barang = $_POST['jumlah_brg'];

echo $nama_barang;
echo $merk_barang;
echo $jumlah_barang;
echo "<br/>";

for($i=0;$i<$jumlah_barang;$i++){
$tambah = "INSERT INTO barang(KONDISI, JENIS_BARANG_ID, MERK_BARANG) VALUES( 'BAIK' ,'".$nama_barang."' , '".$merk_barang."')";
mysql_query($tambah) or die( mysql_error());
}

if($tambah){

	header('location:../page/admin/index.php?tambah=1');

}
}
else{

	header('location:../page/admin/index.php?tambah=2');

}
  ?>
