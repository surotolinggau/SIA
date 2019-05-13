<?php
require_once('../../source/php/init.php');
if(isset($_POST['tambah_hadir'])){
	$simKehadidks = $_POST['kehadiran_idks'];
	$simKehadtggl = $_POST['kehadiran_tgl'];
	$arrayTgl = explode('-', $simKehadtggl);
	$hadirTahun =  $arrayTgl[0];
	$hadirBulan = $arrayTgl[1];
	$hadirHari = $arrayTgl[2];
	$countKehidks = count($simKehadidks);
	for ($i=0; $i < $countKehidks ; $i++) { 
		$coba = $_POST['kehadMrd_'.$simKehadidks[$i]];
		$dbchd = $simKehadidks[$i];
		$bsh = " INSERT INTO kehadiran (id_ks, keterangan_hadir, hari, bulan, tahun) VALUES ($dbchd, '$coba', '$hadirHari', '$hadirBulan', $hadirTahun)";
		mysqli_query($con, $bsh);

		$cariMK = "SELECT * FROM murid, kelas_siswa, kelas, ortu WHERE murid.id_ortu=ortu.id_ortu AND murid.id_murid=kelas_siswa.id_murid AND kelas.id_kelas=kelas_siswa.id_kelas AND kelas_siswa.id_ks='$dbchd'";
		$querycariMK= mysqli_query($con, $cariMK);
		$tamcariMK = mysqli_fetch_assoc($querycariMK);
		$nama_anak = $tamcariMK['nama_murid'];
		$nama_kelas = $tamcariMK['nama_kelas'];
		$NoOrtu = "+62".$tamcariMK['no_telp'];
		
		$kirimKehadiran= "Info Kehadiran ".$nama_anak." Di Kelas ".$nama_kelas.":\n".$hadirHari."-".$hadirBulan."-".$hadirTahun."-> ".$coba."\n";
		$queryKkeh = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$NoOrtu','$kirimKehadiran','Gammu')";
		mysqli_query($con1, $queryKkeh);
	}
	header("location: ../../login/admin/halamanadmin.php#formulir_kehadiran");
}
if(isset($_POST['hapus_kehadiran'])){
	$simKehadidks = $_POST['kehadiran_lidks'];
	$simKehadtggl = $_POST['kehadiran_tgl'];
	$arrayTgl = explode('-', $simKehadtggl);
	$hadirTahun =  $arrayTgl[0];
	$hadirBulan = $arrayTgl[1];
	$hadirHari = $arrayTgl[2];
	$countKehidks = count($simKehadidks);
	for ($i=0; $i < $countKehidks ; $i++) { 
		$dbchd = $simKehadidks[$i];
		$bsh = " DELETE FROM kehadiran WHERE id_ks=$dbchd AND hari='$hadirHari' AND bulan='$hadirBulan' AND tahun=$hadirTahun";
		mysqli_query($con, $bsh);
	}
	header("location: ../../login/admin/halamanadmin.php#formulir_kehadiran");
}
if(isset($_POST['edit_kehadiran'])){
	$simKehadidks = $_POST['kehadiran_idks'];
	$simKehadtggl = $_POST['kehadiran_tgl'];
	$arrayTgl = explode('-', $simKehadtggl);
	$hadirTahun =  $arrayTgl[0];
	$hadirBulan = $arrayTgl[1];
	$hadirHari = $arrayTgl[2];
	$countKehidks = count($simKehadidks);
	for ($i=0; $i < $countKehidks ; $i++) { 
		$coba = $_POST['kehadMrd_'.$simKehadidks[$i]];
		$dbchd = $simKehadidks[$i];
		$bsh = " UPDATE kehadiran SET keterangan_hadir = '$coba' WHERE id_ks=$dbchd AND hari='$hadirHari' AND bulan='$hadirBulan' AND tahun=$hadirTahun";
		mysqli_query($con, $bsh);
	}header("location: ../../login/admin/halamanadmin.php#formulir_kehadiran");
}
?>