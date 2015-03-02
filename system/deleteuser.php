<?php 
include('connect.php');

$id_usr = $_GET['id'];
$tampil = mysql_query("SELECT * FROM user WHERE USER_ID='".$id_usr."' ");
$data = mysql_fetch_array($tampil);
$awal = $data['JUMLAH'];

	$sql = "DELETE FROM user WHERE USER_ID='".$id_usr."' ";
	$delete = mysql_query($sql);
	if($delete){
	header('location:../page/admin/user.php?delete=1');
	}



 ?>
