<?php

	require_once('../../source/php/init.php');

	if(isset($_GET['id_pengumuman'])){
		$hak_akses = $_GET['id_user'];
		if(hapusPengumuman($_GET['id_pengumuman'])){
			if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_lihat_pengumuman');}
			if($hak_akses == 2){header('location: ../../login/admin/halamankepsek.php#formulir_lihat_pengumuman');}
		}else{
			echo "Hapus Data gagal";
		}
	}

?>