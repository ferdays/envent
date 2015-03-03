<?php 
include("connect.php");
if(!empty($_POST['name'] && $_POST['jenis-kelamin'] )){

$username = $_POST['username'];
$password = $_POST['password'];
$tipe = 'user';
$nama = $_POST['name'];
$kelas = $_POST['kelas'];
$jk = $_POST['jenis-kelamin'];


$tambah = mysql_query("INSERT INTO user(USERNAME,PASSWORD,tipe,NAMA,KELAS,JENIS_KELAMIN,FOTO,BACKGROUND) VALUES( '".$username."', '".$password."', '".$tipe."', '".$nama."', '".$kelas."', '".$jk."' , 'default.png' , '#1BBC9B')");
	
	if($tambah){
		header('location:../page/admin/user.php?tambah=1');
}

else{
  header('location:../page/admin/user.php?tambah=2');
}

}

?>