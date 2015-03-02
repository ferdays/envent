<?php 
include('../../system/connect.php');
if($_POST){
	$sql = "update user set PASSWORD='{$_POST['password']}' where USER_ID='{$_POST['id']}'";
	mysql_query($sql);
	header('location:edit.php#sukses');
}
 ?>