<?php
	if(isset($_POST['tamp_mrid'])){
		$wk = $_POST['wali_kelas'];
		$taj = $_POST['tahun_ajaran'];
		$kelas = $_POST['nama_kelas'];
		$ruang = $_POST['ruang_kelas'];
		$s_kelas = $_POST['status_kelas'];
		$pis = $_POST['angkatan'];
	}
	if(isset($_POST['tambah_kelas'])){
		if(isset( $_POST['nm_murid_ang'])){$nma = $_POST['nm_murid_ang'];}
		$wk = $_POST['wali_kelas'];
		$taj = $_POST['tahun_ajaran'];
		$kelas = $_POST['nama_kelas'];
		$ruang = $_POST['ruang_kelas'];
		$s_kelas = $_POST['status_kelas'];
		$pis = $_POST['angkatan'];


		$query = "INSERT INTO kelas (id_guru, tahun_ajaran, nama_kelas, ruang_kelas, status_kelas) VALUES ($wk,'$taj','$kelas','$ruang','$s_kelas')";
		$hasil = mysqli_query ($con, $query);
			if($hasil){
				if(isset($nma)){
				$sql = "SELECT MAX(id_kelas) AS last_id_kelas FROM kelas LIMIT 1";
				$hasil_tk = mysqli_query($con,$sql);
					if($hasil_tk){
						$row_tk = mysqli_fetch_assoc($hasil_tk);
						$last_id_kelas = $row_tk['last_id_kelas'];
						foreach ($nma as $id_km) {
							$sql_in = "INSERT INTO kelas_siswa (id_murid, id_kelas) VALUES ($id_km, $last_id_kelas)";
							mysqli_query($con,$sql_in) or die("query salah");
						}
						$error = "Tambah Data Kelas Berhasil";
						$error1 = "/";
						$error2 = " warna_berhasil";
					}else{
						$error = "query sql_in Data Kelas Gagal";
						$error1 = "-";
						$error2 = " warna_error";
					}

				}else{
					$error = "Tambah Data Kelas Berhasil<br/>Tanpa Anggota Kelas";
					$error1 = "/";
					$error2 = " warna_berhasil";
				}
			}else{
				$error = "Tambah Data Kelas Gagal";
				$error1 = "-";
				$error2 = " warna_error";
			}
	}
?>