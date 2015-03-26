<?php 
include("connect.php");
session_start();
$name = $_POST['jenis_barang'];
$merk = $_POST['nama_barang'];
$jumlah = $_POST['jumlah'];
$status = $_POST['status'];

echo $status;

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

    $jml_jenis = mysql_num_rows(mysql_query("SELECT *FROM jenis_barang"));
    $id_jenis = $jml_jenis + 1;

	$tambah_jenis = mysql_query("INSERT INTO jenis_barang(JENIS_BARANG_ID,JENIS_BARANG, STATUS) VALUES('".$id_jenis."','".$name."','".$status."')");

	$sql = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG = '".$name."' ");
	$data = mysql_fetch_array($sql);
		$jenis_data = $data['JENIS_BARANG_ID'];


for($i = 0; $i < $jumlah; $i++){

$sql_jenis = mysql_query("SELECT *FROM barang WHERE JENIS_BARANG_ID ='".$jenis_data."'");
$jumlah_jenis = mysql_num_rows($sql_jenis);
$kode_barang = "".$jenis_data."00".$jumlah_jenis."";

	$tambah_barang = mysql_query("INSERT INTO barang(JENIS_BARANG_ID, MERK_BARANG, KONDISI, KODE_BARANG, FOTO_BARANG) VALUES( '".$jenis_data."', '".$merk."', 'BAIK', '".$kode_barang."', '".$target_file."' ) ");

}
header('location:../page/admin/index.php?tambah=1')
?>