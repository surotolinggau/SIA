<?php

	require_once('../../source/php/init.php');
	// $username = $_SESSION['username'];
	// $isLoggedIn = $_SESSION['isLoggedIn'];
 
	// if($isLoggedIn != '1'){
	// 	session_destroy();
	// 	header('Location: ../index.php');
	// }

	if(isset($_GET['id_ortu'])){
		$id_user_ortu = $_GET['id_ortu'];
		$query_cari_user_ortu="SELECT * FROM ortu WHERE id_ortu = $id_user_ortu";
		$hasil_cari_user_ortu = mysqli_query($con, $query_cari_user_ortu);
		$row_hasil_cari_user_ortu = mysqli_fetch_assoc($hasil_cari_user_ortu);
		$hapus_user_nama_ortu = $row_hasil_cari_user_ortu['nama_ortu'];
		$query_hapus_user_ortu = "DELETE FROM user WHERE nama_pengguna = '$hapus_user_nama_ortu'";
		mysqli_query($con, $query_hapus_user_ortu);
		if(hapusOrtu($_GET['id_ortu'])){
			header('location: ../../login/admin/halamanadmin.php#formulir_kedua');
		}else{
			echo "Hapus Data gagal";
		}
	}

?>