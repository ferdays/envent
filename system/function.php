<?php
include('connect.php');
// Fungsi Tampil
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
function user(){

	$user = mysql_query("SELECT * FROM user where TIPE='user'");
	$total = mysql_num_rows($user);

	$output =  $total;
	echo $output;

}
function komen(){
	$kritik = mysql_query("SELECT * FROM kritik_dan_saran");
	$saran = mysql_num_rows($kritik);
	echo $saran;
}
?>