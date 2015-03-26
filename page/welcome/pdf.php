<?php 
include('connect.php');
$user_id = $_SESSION['USER_ID'];
$sql = mysql_query("SELECT *FROM user WHERE USER_ID='".$user_id."' ");
		$data_user = mysql_fetch_array($sql);
		$nama = $data_user['NAMA'];

		require_once("../../dompdf/dompdf_config.inc.php");
		$html =
		  '<html><body>'.
		  '<h3>Halo, '.$nama.' berikut bukti peminjam Anda : </h3>'.
		  '<p>Alamat lengkap Anda adalah : '.$user_id.'</p>'.
		  '</body></html>';

		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('bukti_peminjaman_'.$nama.'.pdf');
		if ($dompdf) {
		header('location:../page/welcome/pinjam.php?pinjam=sukses');
		}
 ?>