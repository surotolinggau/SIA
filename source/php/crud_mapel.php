<?php
	if(isset($_POST['tambah_mp'])){
		$nmp = $_POST['nama_mp'];
		$kmp = $_POST['ketmp'];
		
		$query_insert_mp = "INSERT INTO mp (nama_mp, ket_mp) VALUES ('$nmp','$kmp')";
		$hasil_mp = mysqli_query($con, $query_insert_mp);
		if($hasil_mp){
			$error = "Tambah Data Mata Pelajaran Berhasil";
			$error1 = "/";
			$error2 = " warna_berhasil";
		}else{
			$error = "Tambah Data Mata Pelajaran gagal";
			$error1 = "-";
			$error2 = " warna_error";
		}
	}

	if(isset($_POST['edit_mp'])){
		$enmp = $_POST['nama_mp'];
		$ekmp = $_POST['ketmp'];
		$eidmp = $_POST['id_mapel'];
		$query_update_mp = "UPDATE mp SET nama_mp ='$enmp', ket_mp = '$ekmp' WHERE id_mp = $eidmp";
		$hasil_ump = mysqli_query($con, $query_update_mp);
		if($hasil_ump){
			$error = "Edit Mata Pelajaran Berhasil";
			$error1 = "/";
			$error2 = " warna_berhasil";
		}else{
			$error = "Edit Mata Pelajaran gagal";
			$error1 = "-";
			$error2 = " warna_error";
		}
	}

	if(isset($_GET['id_mp'])){
		$tam_mp = tampilMper($_GET['id_mp']);
		$row_mp=mysqli_fetch_assoc($tam_mp);
	}
?>