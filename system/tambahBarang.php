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

$sql_jenis = mysql_query("SELECT *FROM barang WHERE JENIS_BARANG_ID ='".$nama_barang."'");
$jumlah_jenis = mysql_num_rows($sql_jenis);
$kode_barang = "".$nama_barang."00".$jumlah_jenis."";

$tambah = "INSERT INTO barang(KONDISI, JENIS_BARANG_ID, MERK_BARANG, KODE_BARANG) VALUES( 'BAIK' ,'".$nama_barang."' , '".$merk_barang."', '".$kode_barang."')";
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
