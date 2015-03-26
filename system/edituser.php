<?php 
include("connect.php");
 
 $id = $_POST['id'];
 $name = $_POST['nama'];
 $kelas = $_POST['kelas'];
 $username = $_POST['username'];
 $password = $_POST['password'];
 $nis = $_POST['NIS'];

 	$update_nama = mysql_query("UPDATE user SET NAMA='".$name."' WHERE USER_ID='".$id."' ");
 	$update_kelas = mysql_query("UPDATE user SET KELAS='".$kelas."' WHERE USER_ID='".$id."' ");
 	$update_username = mysql_query("UPDATE user SET USERNAME='".$username."' WHERE USER_ID='".$id."' ");
 	$update_password = mysql_query("UPDATE user SET PASSWORD='".$password."' WHERE USER_ID='".$id."' ");
 	$update_nis = mysql_query("UPDATE user SET NIS='".$nis."' WHERE USER_ID='".$id."' ");

		header('location:../page/admin/user.php?edit=1');

 ?>