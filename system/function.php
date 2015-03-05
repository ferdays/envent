<?php
include('connect.php');

// Fungsi Tampil User

function tampilnama() {
	$username = $_SESSION['USERNAME'];
	$nama=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tnama=mysql_fetch_array($nama);
	echo $tnama['NAMA'];
}
function tampilkelas() {
	$username = $_SESSION['USERNAME'];
	$kelas=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tkelas=mysql_fetch_array($kelas);
	echo $tkelas['KELAS'];
}
function tampilalamat() {
	$username = $_SESSION['USERNAME'];
	$alamat=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$talamat=mysql_fetch_array($alamat);
	echo $talamat['ALAMAT'];
}
function tampiljk() {
	$username = $_SESSION['USERNAME'];
	$jk=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tjk=mysql_fetch_array($jk);
	echo $tjk['JENIS_KELAMIN'];
}
function tampilbackground() {
	$username = $_SESSION['USERNAME'];
	$background=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tbackground=mysql_fetch_array($background);
	echo $tbackground['BACKGROUND'];
}
function tampilnohp() {
	$username = $_SESSION['USERNAME'];
	$nohp=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tnohp=mysql_fetch_array($nohp);
	$nomor = $tnohp['NO_TELPON'];
	echo substr($nomor, 2);
}
function tampilusername() {
	$usernamee = $_SESSION['USERNAME'];
	$username=mysql_query("select * from user where USERNAME='$usernamee'") or die(mysql_error());
	$tusername=mysql_fetch_array($username);
	echo $tusername['USERNAME'];
}
function tampilpassword() {
	$usernamee = $_SESSION['USERNAME'];
	$password=mysql_query("select * from user where USERNAME='$usernamee'") or die(mysql_error());
	$tpassword=mysql_fetch_array($password);
	echo $tpassword['PASSWORD'];
}
function backgroundedit() {
	$username = $_SESSION['USERNAME'];
	$background=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tbackground=mysql_fetch_array($background);
	$back = $tbackground['BACKGROUND'];
	echo substr($back, 1);
}
function tampilid() {
	$username = $_SESSION['USERNAME'];
	$id=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tid=mysql_fetch_array($id);
	echo $tid['USER_ID'];
}
function foto() {
	$username = $_SESSION['USERNAME'];
	$foto=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tfoto=mysql_fetch_array($foto);
	echo $tfoto['FOTO'];
}

//Fungis Tampil User >> Pinjam
function list_pinjam($number){
	$barang = mysql_query("SELECT *FROM barang WHERE JENIS_BARANG_ID = '".$number."' AND jumlah =1 ");
	while($row=mysql_fetch_row($barang)){
	echo "
	<tr>
    	<td>
    	<center><h5 style='color:#333;'>$row[2]</h5></center>
    	</td>
        <td>
        <center><h5 style='color:#333;'>$row[3]</h5></center>
        </td>
        <td>
        <center><a href='../../system/system_pinjam.php?id=$row[0]'><button type='button' class='btn' style='background:#62C2E4;color:white;'>Pinjam</button></a> <a href='#detail' class='btn' style='background:#63CA82;color:white;'>Lihat Detail</a></center>
        </td>
    </tr>
	";
	}
}
function recent_activites(){
	$peminjam_list = mysql_query("SELECT *FROM peminjam");
	while($row=mysql_fetch_row($peminjam_list)){
		$nama = mysql_query("SELECT *FROM user WHERE USER_ID=$row[1]");
		$data_nama = mysql_fetch_array($nama);
		$barang = mysql_query("SELECT *FROM barang WHERE BARANG_ID=$row[2] ");
		$data_barang = mysql_fetch_array($barang);
		echo "<div class='col-md-6' style='margin-top:20px;'><img src='../profil/img/profil.jpg' class='img-circle pull-left' height='80' width='80' style='box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.3);'><h3 style='color:#333;margin-top:-5px;margin-left:90px;'>".$data_nama['NAMA']."</h3>";
		echo "<h4 style='color:#333;margin-left:90px;'>Meminjam ".$data_barang['MERK_BARANG']."</h4>";
		echo "<p style='color:#333;margin-left:90px;'>$row[3]</p></div>";
	}	 
}
// Fungsi Tampilan Admin 

function list_user(){

$tampil = mysql_query("SELECT * FROM user WHERE tipe = 'user'");
  
  while($row=mysql_fetch_row($tampil))
    {
     echo "<tr>
        <td>
          <h4 style='color:black;'>$row[0]</h5>
        </td>
        <td>
          <h4 style='color:black;'>$row[4]</h5>
        </td>
        <td>
          <span class='glyphicon glyphicon-edit' style='color:grey;'></span>
          &nbsp; &nbsp;
          <a href='../../system/deleteuser.php?id=$row[0]'><span class='glyphicon glyphicon-remove' style='color:red;'></span></a>
        </td>
      </tr>";
    }
}
function jumlah_user(){
	$user = mysql_query("SELECT * FROM user where TIPE='user'");
	$total = mysql_num_rows($user);
	$output =  $total;
	echo $output;
}
function jumlah_komen(){
	$kritik = mysql_query("SELECT * FROM kritik_dan_saran");
	$saran = mysql_num_rows($kritik);
	echo $saran;
}
function jumlah_barang(){
	$total = mysql_query("SELECT SUM(jumlah) AS total_item FROM barang");
	$hasil = mysql_fetch_array($total);
	$output = number_format($hasil['total_item']);
	echo $output;
}
function jumlah_admin(){
	$admin = mysql_query("SELECT * FROM user WHERE tipe='admin'");
	$total = mysql_num_rows($admin);
	echo $total;
}
function jumlah_peminjaman(){
	$peminjam = mysql_query("SELECT * FROM peminjam");
  	$total = mysql_num_rows($peminjam);
	echo $total;
}
function jumlah($number) {
	$sql = mysql_query("SELECT SUM(jumlah) AS total_barang FROM barang WHERE JENIS_BARANG_ID = '".$number."' ");
	$hasil = mysql_fetch_array($sql);
	$output = number_format($hasil['total_barang']);
	echo $output;
}
function nama_brg($number) {
    $sql = mysql_query("SELECT JENIS_BARANG FROM jenis_barang WHERE JENIS_BARANG_ID='".$number."' ");
    $tampil = mysql_fetch_array($sql);
    echo $tampil['JENIS_BARANG'];
}
function item(){
	$total = mysql_query("SELECT SUM(JUMLAH) AS total_item FROM barang");
	$hasil = mysql_fetch_array($total);
	$output = number_format($hasil['total_item']);
	echo $output;
}
function list_user_lengkap(){
$tampil = mysql_query("SELECT * FROM user");
$data = mysql_fetch_array($tampil);
while($row=mysql_fetch_row($tampil))
{
	echo "	<tr>
    		<td>
    		$row[0]
    		</td>
        	<td>
          	$row[2]
        	</td>
        	<td>
          	$row[5]
        	</td>
        	<td>
          	$row[9]
        	</td>
        	<td>
          	$row[6]
        	</td>
      		</tr>";
     }
}
function list_barang()
{
$tampil = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID ");
while($row=mysql_fetch_row($tampil))
{
	echo " 
			<tr>
    	    <td>
			$row[11]        
        	</td>
        	<td>
        	$row[3]
        	</td>
        	<td>
        	$row[0]
        	</td>
        	<td>
          			<span class='glyphicon glyphicon-edit' style='color:grey;'></span>
          			&nbsp; &nbsp;
          			<a href='../../system/deletebrg.php?id=$row[0]'> <span class='glyphicon glyphicon-remove' style='color:red;'></span></a>
        	</td>
      		</tr>
      	 ";
}

}
function info_user(){
$tampil = mysql_query("SELECT * FROM user");
$data = mysql_fetch_array($tampil);
while($row=mysql_fetch_row($tampil))
{
	echo "<div class='col-md-4' style='margin-top:20px;'>
      	<div class='profilbig'>
        <center><br><img src='../profil/img/$row[10]' style='border-radius:50%;' height='100' width='100'>
        <br><br><h3 style='margin:0;color:white;'>$row[4]</h3>
        <h4>$row[5]</h4>
        <h4>$row[6]</h4>
        <br>
        </center>
      </div>
    </div>";
 }   
}

?>