<?php
session_start();
ob_start();
include_once("system/connect.php"); //buat koneksi ke database
$kode   = $_GET['id']; //kode berita yang akan dikonvert
$query  = mysql_query("SELECT * FROM peminjam WHERE PEMINJAM_ID='".$kode."'");
$data   = mysql_fetch_array($query);
$user_id = $_SESSION['USER_ID'];
$sql = mysql_query("SELECT *FROM user WHERE USER_ID='".$user_id."' ");
    $data_user = mysql_fetch_array($sql);
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $data['USER_ID']; ?></title>
</head>
<body>
<?php
echo "<h3> Halo ".$data_user['NAMA'].", berikut bukti peminjaman anda</h3>"; 
echo '<table border="0">
  <tr>
    <td width="200">ID PEMINJAMAN</td>
    <td width="10">:</td>
    <td width="250">'.$data['PEMINJAM_ID'].'</td>
  </tr>
  <tr>
    <td>ID BARANG</td>
    <td>:</td>
    <td>'.$data['BARANG_ID'].'</td>
  </tr>
  <tr>
    <td>Tanggal Dipinjam</td>
    <td>:</td>
    <td>'.$data['TANGGAL_PINJAM'].'</td>
  </tr>
   <tr>
    <td>Nama Peminjam</td>
    <td>:</td>
    <td>'.$data_user['NAMA'].'</td>
  </tr>
  <tr>
    <td>Kelas</td>
    <td>:</td>
    <td>'.$data_user['KELAS'].'</td>
  </tr>
  <tr>
    <td>NIS</td>
    <td>:</td>
    <td>'.$data_user['NIS'].'</td>
  </tr>
</table>';

echo "<p>data yang tertera di atas adalah siswa sekolah ini.</p>";
echo "<p align='right'>Bandung, ".date('d-m-Y')." <br> <img src='page/profil/img/".$data_user['FOTO']."' width='100'>
( ".$data_user['NAMA']." )</p>";
?>
</body>
</html><!-- Akhir halaman HTML yang akan di konvert -->
<?php
$filename="mhs-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
//==========================================================================================================
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF
//==========================================================================================================
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
 require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
 try
 {
  $html2pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));
  $html2pdf->setDefaultFont('Arial');
  $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
  $html2pdf->Output($filename);
 }
 catch(HTML2PDF_exception $e) { echo $e; }
?>