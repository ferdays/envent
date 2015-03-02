<?php 
include("connect.php");

$name = $_POST['nama'];
$kritikSaran = $_POST['kritiksaran'];


$tambah = "INSERT INTO kritik_dan_saran(nama,kritiksaran) VALUES( '".$name."' , '".$kritikSaran."' )";
mysql_query($tambah) or die( mysql_error());


		if($tambah)
			{
				header('location:../index.php?kritik=1');	
			}

else
{
	header('location:../index.php?kritik=2#comment_form');
}

 ?>