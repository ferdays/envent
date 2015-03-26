<?php 
include("connect.php");
session_start();
 ?>

 <?php 

if(!empty($_POST['name_brg'] && $_POST['merk_brg'] && $_POST['jumlah_brg'])){

$nama_barang = $_POST['name_brg'];
$merk_barang = $_POST['merk_brg'];
$jumlah_barang = $_POST['jumlah_brg'];
//upload gambar
$target_dir = "../page/foto/barang/";
$target_file = $target_dir . basename($_FILES["fotobarang"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fotobarang"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fotobarang"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fotobarang"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
//selesai upload gambar
for($i=0;$i<$jumlah_barang;$i++){

$sql_jenis = mysql_query("SELECT *FROM barang WHERE JENIS_BARANG_ID ='".$nama_barang."'");
$jumlah_jenis = mysql_num_rows($sql_jenis);
$kode_barang = "".$nama_barang."00".$jumlah_jenis."";

$tambah = "INSERT INTO barang(KONDISI, JENIS_BARANG_ID, MERK_BARANG, KODE_BARANG, FOTO_BARANG) VALUES( 'BAIK' ,'".$nama_barang."' , '".$merk_barang."', '".$kode_barang."','".$target_file."')";
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
