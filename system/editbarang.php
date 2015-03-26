
<?php 
include("connect.php");
    $id = $_GET['id'];
    $merk = $_GET['merk'];
    $kondisi = $_GET['kondisi'];
  echo $id;
  echo $merk;
  echo $kondisi;


$update_merk = mysql_query("UPDATE barang SET MERK_BARANG='".$merk."' WHERE BARANG_ID='".$id."' ");
$update_kondisi = mysql_query("UPDATE barang SET KONDISI='".$kondisi."' WHERE BARANG_ID='".$id."' ");

if($update_merk && $update_kondisi){
    header('location:../page/admin/index.php?edit=1');
}
else{
    header('location:../page/admin/index.php?edit=2');
}

 ?>