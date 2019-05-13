<?php
	require_once('../../source/php/init.php');

	$hak_akses = $_SESSION['hak_akses'];
	if(isset($_POST['kirim_pengumuman'])){
		$notujuan = $_POST['nomor_hp'];
		$notujuan = explode(", ",$notujuan);
		$jmlh_kntk = count($notujuan)-1;
		$peng = "Pengumuman SIA SDN 20 LLG : \n";
		$sms1 = $_POST['judul_pengumuman'];
		$jum_char = strlen($sms1);
		if($jum_char >= 98){$rbh_char= substr($sms1, 0, 92); $sms1= $rbh_char." ...";}
		$sms2 = "\nSelengkapnya www.SIASDN20LLG.com";
		$sms = $peng.$sms1.$sms2;
		for ($i=0; $i < $jmlh_kntk ; $i++) { 
			$query = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('+62$notujuan[$i]', '$sms', 'Gammu')";
			$hasil = mysqli_query($con1,$query) or die("query salah");
		}
		if($hasil){
			if($hak_akses ==1){header('location: ../../login/admin/halamanadmin.php#formulir_lihat_pengumuman');}
			if($hak_akses ==2){header('location: ../../login/admin/halamankepsek.php#formulir_lihat_pengumuman');}
		}else{
			echo "SMS Gagal Dikirim";
		}
	}
?>