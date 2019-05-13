<?php

	require_once('../../source/php/init.php');
	// $username = $_SESSION['username'];
	// $isLoggedIn = $_SESSION['isLoggedIn'];
 
	// if($isLoggedIn != '1'){
	// 	session_destroy();
	// 	header('Location: ../index.php');
	// }

	if(isset($_GET['id_murid'], $_GET['id_ortu'])){
		$id_murid = $_GET['id_murid'];
		$id_ortu = $_GET['id_ortu'];
		$query1 = "SELECT id_ortu FROM murid WHERE id_ortu = $id_ortu";
		$hasil = mysqli_query($con, $query1);
		$cek_jumlah = mysqli_num_rows($hasil);
		if($cek_jumlah > 1){
			if(hapusMurid($id_murid)){
			header('location: ../../login/admin/halamanadmin.php#formulir_murid');
			}else{
				echo "Hapus Data gagal";
			}
		}else{
			if(hapusMuOr($id_murid,$id_ortu)){
				header('location: ../../login/admin/halamanadmin.php#formulir_murid');
				}else{
					echo "Hapus Data Murid gagal";
				}
		}
	}

?>