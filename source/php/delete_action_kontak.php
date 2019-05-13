<?php
	if(isset($_GET['ptk'])){
		$nm_grup = $_GET['gr'];
		if(!empty($nm_grup)){
			if(hpsGrp($nm_grup)){
				$error = "Hapus Grup ".$nm_grup." Berhasil";
				$error1 = "/";
				$error2 = " warna_error";
			}else{
				$error = "Hapus Grup ".$nm_grup." Gagal";
				$error1 = "-";
				$error2 = " warna_berhasil";
			}
		}else{
			$error = "Maaf Grup ALL Tidak Bisa Dihapus";
			$error1 = "-";
			$error2 = " warna_error";
		}
		
	}

	if(isset($_GET['tk'])){
		$nm_grup = $_GET['gr'];
		$query = "SELECT * FROM grup_kontak WHERE nama_grup = '$nm_grup'";
		$hasil = mysqli_query($con, $query);
		$h_kon = mysqli_fetch_assoc($hasil);
		$tam_kon = $h_kon['id_ortu'];
		$array_id = explode(",",$tam_kon);
		$p_array = count($array_id);
	}
?>