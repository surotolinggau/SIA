<?php
	require_once('../../source/php/init.php');
	// $username = $_SESSION['username'];
	// $isLoggedIn = $_SESSION['isLoggedIn'];
 
	// if($isLoggedIn != '1'){
	// 	session_destroy();
	// 	header('Location: ../index.php');
	// }

	if(isset($_GET['id_ortu'])){
		if(hapusKon_Ortu($_GET['id_ortu'])){
			header('location: ../../login/admin/halamanadmin.php#formulir_kontak');
		}else{
			echo "Hapus Data gagal";
		}
	}

?>