<?php 
	require_once('../../source/php/init.php');
	// $username = $_SESSION['username'];
	// $isLoggedIn = $_SESSION['isLoggedIn'];
 
	// if($isLoggedIn != '1'){
	// 	session_destroy();
	// 	header('Location: ../index.php');
	// }
	if(isset($_GET['id_mp'])){
		if(hapusMP($_GET['id_mp'])){
			header('location: ../../login/admin/halamanadmin.php#formulir_lihat_mp');
		}else{
			echo "Hapus Data gagal";
		}
	}

	if(isset($_GET['id_pengajar']) && isset($_GET['id_mapel']) && isset($_GET['id_klas'])  ){

		$ajarpengajar = $_GET['id_pengajar'];
		$ajarmapel =  $_GET['id_mapel'];
		$ajarkelas = $_GET['id_klas'];
		if(hapusPengajar($ajarpengajar, $ajarmapel, $ajarkelas)){
			header('location: ../../login/admin/halamanadmin.php#formulir_lihat_mp');
		}else{
			echo "Hapus Data gagal";
		}
	}
?>