<?php 
include('connectdb.php');

$name = $_POST['name'];
$jumlah = $_POST['jumlah'];
$id = $_POST['id'];

$sql = "SELECT SUM(JUMLAH) AS total_barang FROM barang as brg JOIN jenis as jns ON brg.JENIS_ID=jns.JENIS_ID  WHERE brg.BARANG_ID='".$id."'";

$show = mysql_query($sql)or die(mysql_error());
$hasil = mysql_fetch_array($show);
$output = number_format($hasil['total_barang']);

$sql2 = mysql_query("SELECT * FROM barang as brg JOIN jenis as jns ON brg.JENIS_ID=jns.JENIS_ID  WHERE brg.JENIS_ID='".$name."'");
$data = mysql_fetch_array($sql2);
$awal = $data['JUMLAH'] + 1 ;

if($jumlah < $awal ){

	$sql = "UPDATE barang SET";


	echo "bisa di hapus";
	echo $output;
}
else{

	echo "tidak bisa di hapus!";
	echo $output;

}


/*while($row = mysql_fetch_row($show)){

echo $row[0];
echo "<br/>";
echo $jumlah;

}*/
 ?>
