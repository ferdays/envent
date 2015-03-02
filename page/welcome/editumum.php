<?php 
include('../../system/connect.php');
if($_POST){
	$sql = "update user set NAMA='{$_POST['nama']}', KELAS='{$_POST['kelas']}', ALAMAT='{$_POST['alamat']}', NO_TELPON='+62{$_POST['nohp']}' where USER_ID='{$_POST['id']}'";
	mysql_query($sql);
	header('location:edit.php#sukses');
}
 ?>