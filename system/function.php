<?php
include('connect.php');

//function di index

function list_index(){
	$sql_list = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID");

	while($row=mysql_fetch_row($sql_list)){
	echo " 
	<tr>
            <td>1</td>
            <td>$row[7]</td>
            <td>$row[9] $row[2]</td>
            <td><span class='label label-success'>$row[10] Dipinjam</span> <!-- <span class='label label-danger'>Tidak Bisa Dipinjam</span> --></td>
            <td><span class='label label-info'>$row[4]</span></td>
          </tr>
	";
}
}
function jumlah_lain(){
	$sql_lebih = mysql_query("SELECT SUM(jumlah) AS total_item FROM barang WHERE JENIS_BARANG_ID > 9 ");
		//$hitungan = mysql_num_rows($sql_lebih);
		$hasil_hitung = mysql_fetch_array($sql_lebih);
		$output = number_format($hasil_hitung['total_item']);
		echo $output;
	
}

function konfirm_box(){

	$sql = mysql_query("SELECT *FROM peminjam WHERE PINJAM='wait'");
while($row=mysql_fetch_row($sql)){
$sql_nama = mysql_query("SELECT *FROM user WHERE USER_ID=$row[1]");
$data_nama = mysql_fetch_array($sql_nama);
$nama = $data_nama['USERNAME'];

$sql_merk = mysql_query("SELECT *FROM barang WHERE BARANG_ID=$row[2] ");
$data_merk = mysql_fetch_array($sql_merk);
$merk = $data_merk['MERK_BARANG'];

$jenis_barang_id = $data_merk['JENIS_BARANG_ID'];
$sql_jenis = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG_ID=$jenis_barang_id ");
$data_jenis = mysql_fetch_array($sql_jenis);
$jenis = $data_jenis['JENIS_BARANG'];

echo "	
		<div class='col-md-4 sedangpinjam'>
        	<h1 class='text-center' style='color:white;'>$nama</h1>
        	<h4 class='text-center'> Meminjam $jenis $merk dengan id $row[2]</h4>
        	<center><a href='../../system/konfirm_pinjam.php?id=$row[0]' class='btn' style='background:white;color:#333;' name='submit'> Konfirmasi </a> &nbsp; <a class='btn' style='background:#CC4444;color:white;' name='submit'> Tolak </a></center>
  		</div>
  	";
}


	$sql = mysql_query("SELECT *FROM peminjam WHERE kembali='wait'");
while($row=mysql_fetch_row($sql)){
$sql_nama = mysql_query("SELECT *FROM user WHERE USER_ID=$row[1]");
$data_nama = mysql_fetch_array($sql_nama);
$nama = $data_nama['USERNAME'];

$sql_merk = mysql_query("SELECT *FROM barang WHERE BARANG_ID=$row[2] ");
$data_merk = mysql_fetch_array($sql_merk);
$merk = $data_merk['MERK_BARANG'];

$jenis_barang_id = $data_merk['JENIS_BARANG_ID'];
$sql_jenis = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG_ID=$jenis_barang_id ");
$data_jenis = mysql_fetch_array($sql_jenis);
$jenis = $data_jenis['JENIS_BARANG'];

echo "	
		<div class='col-md-4 sedangpinjam'>
        	<h1 class='text-center' style='color:white;'>$nama</h1>
        	<h4 class='text-center'> Mengembalikan $jenis $merk dengan id $row[2]</h4>
        	<center><a href='../../system/konfirm_kembali.php?id=$row[0]' class='btn' style='background:white;color:#333;' name='submit'> Konfirmasi </a> &nbsp; <a class='btn' style='background:#CC4444;color:white;' name='submit'> Tolak </a></center>
  		</div>
  	";
}

}

// Fungsi Tampil User


function yang_dipinjam(){

$id = $_SESSION['USER_ID'];

$sql = mysql_query("SELECT *FROM peminjam WHERE USER_ID='".$id."'");
while($row = mysql_fetch_row($sql)){

if($row[4]=='0000-00-00 00:00:00'){

$sql_merk = mysql_query("SELECT *FROM barang WHERE BARANG_ID=$row[2]");
$data_merk = mysql_fetch_array($sql_merk);
$merk = $data_merk['MERK_BARANG'];
$jenis = $data_merk['JENIS_BARANG_ID'];

$sql_nama = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG_ID='".$jenis."' ");
$data_nama = mysql_fetch_array($sql_nama);
$nama = $data_nama['JENIS_BARANG'];

	echo "
			<div class='col-md-4 sedangpinjam'>
			<form method='post' action='../../system/kembali.php'>	
				<input type='hidden' name='nama' value='$nama'><h1 class='text-center' style='color:white;'>$nama</h1>
				<input type='hidden' name='merk' value='$merk'><h4 class='text-center' style='color:white;'>$merk</h4>
				<input type='hidden' name='id' value='$row[0]'><h6 class='text-center' style='color:white;'>ID : $row[0]</h6>
				<center><input type='submit' class='btn' style='background:white;color:#333;' name='submit' value='Kembalikan'>&nbsp;"; ?> 
				<a href="javascript:void(0);"
    			onclick="window.open('../../report.php?id=<?php echo $row[0]; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')" style='background:white;color:#333;' class='btn'> Lihat Bukti </a></center>
			</form>
			</div>
			<?php
	}
}
}

function list_lainnya(){
 	$list_lain = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID WHERE jns.JENIS_BARANG_ID > 9 ");
	while($row=mysql_fetch_row($list_lain)){
 echo"    <tr>
                    
                    <td>
                    <center><h5 style='color:#333;'>$row[11]</h5></center>
                    </td>

                    <td>
                    <center><h5 style='color:#333;'>$row[9]</h5></center>
                    </td>

                    <td>
                    <center><h5 style='color:#333;'>$row[2]</h5></center>
                    </td>
          </tr>
     ";
}
}
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
function tampilpinjam(){
	$username = $_SESSION['USERNAME'];
	$pinjam=mysql_query("select * from user where USERNAME='$username'") or die(mysql_error());
	$tjk=mysql_fetch_array($pinjam);
	echo $tjk['BANYAK_MEMINJAM'];
	echo " kali meminjam";

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
    	<center><h5 style='color:#333;'>$row[7]</h5></center>
    	</td>
        <td>
        <center><h5 style='color:#333;'>$row[2]</h5></center>
        </td>
        <td>
        <center><a href='../../system/system_pinjam.php?id=$row[0]'><button type='button' class='btn' style='background:#62C2E4;color:white;'>Pinjam</button></a> </center>
        </td>
    </tr>
	";
	}
}
function list_pinjam_lain(){
	$barang_lain = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID WHERE brg.JENIS_BARANG_ID >9 ");
	while($row=mysql_fetch_row($barang_lain)){
	echo "
	<tr>
    	<td>
    	<center><h5 style='color:#333;'>$row[7]</h5></center>
    	</td>
        <td>
        <center><h5 style='color:#333;'>$row[9] $row[2]</h5></center>
        </td>
        <td>
        <center><a href='../../system/system_pinjam.php?id=$row[0]'><button type='button' class='btn' style='background:#62C2E4;color:white;'>Pinjam</button></a> </center>
        </td>
    </tr>
	";
	}
}
function list_semua_pinjam(){
		$sql_list = mysql_query("SELECT *FROM barang as brg JOIN jenis_barang as jns ON brg.JENIS_BARANG_ID=jns.JENIS_BARANG_ID");

	while($row=mysql_fetch_row($sql_list)){
		if($row[6] == 1){
			$status = 'Tersedia';
		}
		else{
			$status = 'Dipinjam';
		}

if($row[10]=='Bisa'){

	echo "
	<tr>
                        <td><center>$row[7]</center></td>
                        <td><center>$row[9] $row[2]</center></td>
                        <td><center><span class='label label-success'>$status</span></center></td>
                        <td><center><span class='label label-info'>$row[4]</span></center></td>
                        <br>
                    </tr>
	";
	}

}
}
function recent_activites(){

	$peminjam_list = mysql_query("SELECT *FROM recent");
	while($row=mysql_fetch_row($peminjam_list)){
	//data USER_ID dari table Peminjam
		$table_pinjam = mysql_query("SELECT *FROM peminjam WHERE PEMINJAM_ID=$row[1] ");
		$data_peminjam = mysql_fetch_array($table_pinjam);
		$id_user = $data_peminjam['USER_ID'];
	//Data User dari TAble User
		$table_user = mysql_query("SELECT *FROM user WHERE USER_ID='".$id_user."' ");
		$data_user = mysql_fetch_row($table_user);
		$foto = $data_user['10'];
	//data jenis
		$tabel_jenis = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG_ID =$row[4]");
		$data_jenis = mysql_fetch_row($tabel_jenis);
		$jenis_brg = $data_jenis[1];
	//data merk
		$tabel_barang = mysql_query("SELECT *FROM peminjam WHERE PEMINJAM_ID = $row[1] ");
		$data_pinjam = mysql_fetch_row($tabel_barang);
		$barang_id = $data_pinjam[2];

		$tabel_brg = mysql_query("SELECT *FROM barang WHERE BARANG_ID = '".$barang_id."' ");
		$data_barang = mysql_fetch_row($tabel_brg);
		$merk = $data_barang[2];

		if($row[6]==NULL){
		echo "<div class='col-md-6' style='margin-top:20px;'><img src='../profil/img/$foto' class='img-circle pull-left' height='80' width='80' style='box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.3);'><h3 style='color:#333;margin-top:-5px;margin-left:90px;'>$row[3]</h3>";
		echo "<h4 style='color:#333;margin-left:90px;'><font color='red'>Meminjam</font> $jenis_brg $merk</h4>";
		echo "<p style='color:#333;margin-left:90px;'>$row[5]</p></div>";
		}
		else{
		echo "<div class='col-md-6' style='margin-top:20px;'><img src='../profil/img/$foto' class='img-circle pull-left' height='80' width='80' style='box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.3);'><h3 style='color:#333;margin-top:-5px;margin-left:90px;'>$row[3]</h3>";
		echo "<h4 style='color:#333;margin-left:90px;'><font color='green'>Mengembalikan</font> $jenis_brg $merk</h4>";
		echo "<p style='color:#333;margin-left:90px;'>$row[6]</p></div>";
		}

	}	 


}

function Aktivitas(){
	$user_id = $_SESSION['USER_ID'];
	$table_pinjam_aktivitas = mysql_query("SELECT *FROM recent WHERE USER_ID = '".$user_id."' ");
	while($row=mysql_fetch_row($table_pinjam_aktivitas)){
	//jenis	
		$tabel_jns = mysql_query("SELECT *FROM jenis_barang WHERE JENIS_BARANG_ID =$row[4] ");
		$data_jenis = mysql_fetch_row($tabel_jns);
		$jenis = $data_jenis[1];
	if($row[5]==NULL){
	echo "
	<i class='glyphicon glyphicon-random pull-left'></i> <h4 style='color:black;'> &nbsp; Kamu <font color='light green'>mengembalikan</font> $jenis pada tanggal $row[6] dengan ID PEMINJAMAN : $row[1]</h4>
	";
	}
	else {
	echo "
	<i class='glyphicon glyphicon-random pull-left'></i> <h4 style='color:black;'> &nbsp; Kamu <font color='red'>meminjam</font> $jenis pada tanggal $row[5] dengan ID PEMNJAMAN : <b>$row[1]</b></h4>
	";
	}
	}
	}


function detail(){
	$id_brg = $_GET['id'];
	$sql_detail = mysql_query("SELECT *FROM barang WHERE BARANG_ID = '".$id_brg."' ");
	$row = mysql_fetch_row($sql_detail);
	echo "
		<a href='#x' class='overlay' id='detail''></a>
	        <div class='popup'>
            <form class='sign-up' style='width:700px;'>
            	<h1 class='sign-up-title' style='color:#F0776C;'>Detail</h1>
            <table>
            	<tr>
            		<td width='40%' rowspan='4'>
            			<img src='../../img/barang/$row[4]' style='max-width:300px;'>
            		</td>
            		<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Nama  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : $row[2] </h4>
            		</td>
            		<tr>
            			<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Tanggal Pembelian  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : $row[7] </h4>
            		</td>
            		</tr>
            		<tr>
            			<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Kondisi  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : <span class='label label-info'>$row[5] </span></h4>
            		</td>
            		</tr>
            		<tr>
            			<td width='30%'>
            			<h4 style='color:black;margin-left:20px;'> Status  </h4>
            		</td>
            		<td width='40%'>
            			<h4 style='color:black;'> : <span class='label label-success'>Ada </span></h4>
            		</td>
            		</tr>
            	</tr>
            </table>
            <br>
            <center><button type='submit' class='btn' style='background:#62C2E4;color:white;'>Pinjam</button> <a href='#detail' class='btn' style='background:#63CA82;color:white;'>Kembali</a></center>
	  		</form>
        	</div>
	";
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
          <h4 style='color:black;'>$row[5]</h5>
        </td>
        <td>
          <h4 style='color:black;'>$row[7]</h5>
        </td>
        <td>
          <a href='edit.php?id=$row[0]' class='glyphicon glyphicon-edit' style='color:grey;'></a>
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
	$total = mysql_query("SELECT *FROM barang");
	$output = mysql_num_rows($total);
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
function pilhan_pinjam(){
	echo "<select name='name_brg' class='form-control' placeholder='Nama barang...' style='border:none;box-shadow:none;'> ";
	$list_jenis = mysql_query("SELECT * FROM jenis_barang");
	while($row=mysql_fetch_row($list_jenis)){
 	echo "<option value='$row[0]'>$row[1]</option>";
    }
    echo "</select>";
	
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
	$barang = mysql_query("SELECT *FROM barang");
$data = mysql_fetch_array($barang);

	if($row[6] == 1){
		$status = 'Tersedia';
	}
	else{
		$status = 'Di pinjam';
	}

	echo " 
			<tr>
 
    	    <td>
			$row[9]        
        	</td>
        	<td>
			$row[2]        
        	</td>
        	<td>
        	$row[7]
        	</td>
        	<td>
        	$row[4]
        	</td>
        	<td>
          <h4 style='color:black;'>$status</h4>
        </td>
        <td>
          <h4 style='color:black;'>$row[10] dipinjam</h4>
        </td>
        	<td>
          			<a href='editbarang.php?id=$row[0]' class='glyphicon glyphicon-edit' style='color:grey;'></a>
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