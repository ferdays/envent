<?php 
include('../../system/connect.php');
if($_POST){
	$sql = "update user set BACKGROUND='#{$_POST['background']}' where USER_ID='{$_POST['id']}'";
	mysql_query($sql);
	header('location:edit.php#sukses');
}
 ?>