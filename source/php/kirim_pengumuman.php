<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="gammu";
	$con= mysqli_connect($host,$user,$pass, $db) or die(mysqli_error($con));

	if(isset($_POST['kirim_pengumuman'])){
	$notujuan = $_POST['nomor_hp'];
	$kode_area = "+62";
	$pebg = "Pengumuman Sistem Informasi SDN 20 LLG :<br/>";
	$sms1 = $_POST['judul_pengumuman'];
	$sms = $pebg.$sms1;
	// $isipengumuman	= $row_peng['isi_pengumuman'];
	// $isipengumuman	= substr($isipengumuman, 0, 430);
	$gabung = $kode_area."".$notujuan;
	$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$gabung', '$sms', 'Gammu')";
	$hasil = mysqli_query($con,$query);
	if($hasil){
		header('location: ../../login/admin/halamanadmin.php#formulir_lihat_pengumuman');
	}else{
		echo "SMS Gagal Dikirim";
	}
}
?>