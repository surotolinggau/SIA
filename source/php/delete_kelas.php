<?php

	require_once('../../source/php/init.php');
	// $username = $_SESSION['username'];
	// $isLoggedIn = $_SESSION['isLoggedIn'];
 
	// if($isLoggedIn != '1'){
	// 	session_destroy();
	// 	header('Location: ../index.php');
	// }

	if(isset($_GET['id_kelas'])){
		if(hapusKelas($_GET['id_kelas'])){
			header('location: ../../login/admin/halamanadmin.php#formulir_lihat_kelas');
		}else{
			echo "Hapus Data gagal";
		}
	}

?>