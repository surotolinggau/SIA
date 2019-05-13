<?php
	require_once('../../source/php/init.php');
	
	if(isset($_POST['update_kelas'])){
		$eik = $_POST['edit_id_kelas'];
		if(isset($_POST['edit_angkatan'])){$edit_angkatan = $_POST['edit_angkatan'];}
		if(isset($_POST['edit_nama_murid'])){ $enma = $_POST['edit_nama_murid'];}
		$ewk = $_POST['edit_wali_kelas'];
		$etaj = $_POST['edit_tahun_ajaran'];
		$ekelas = $_POST['edit_nama_kelas'];
		$eruang = $_POST['edit_ruang_kelas'];
		$es_kelas = $_POST['edit_status_kelas'];

		$query_update_kelas =" UPDATE kelas SET nama_kelas='$ekelas', ruang_kelas='$eruang', status_kelas='$es_kelas', 
					tahun_ajaran='$etaj', id_guru = $ewk WHERE id_kelas=$eik";
		mysqli_query($con, $query_update_kelas) or die ("Gagal query update".mysqli_error());
		

		if(!isset($_POST['edit_angkatan'])){
			$error = "Data List Angkatan Belum Dipilih";
			$error1 = "-";
			$error2 = " warna_error";
		}

		if(isset($_POST['edit_angkatan']) && !isset($_POST['edit_tamp_mrid'])){
			$error = "Data Murid (chbox) Belum Dipilih";
			$error1 = "-";
			$error2 = " warna_error";
		}
		if(isset($_POST['edit_angkatan']) && isset($_POST['edit_tamp_mrid']) && !isset($_POST['edit_nama_murid'])){
			$error = "coba";
			$error1 = "-";
			$error2 = " warna_error";
		}

		if(isset($_POST['edit_angkatan']) && isset($_POST['edit_nama_murid'])){
			$query_update_kelas =" UPDATE kelas SET nama_kelas='$ekelas', ruang_kelas='$eruang', status_kelas='$es_kelas', 
					tahun_ajaran='$etaj', id_guru = $ewk WHERE id_kelas=$eik";
			$hasil_update_kelas = mysqli_query($con, $query_update_kelas) or die ("Gagal query update".mysqli_error());
			if($hasil_update_kelas){
				$dataIdmurid = "";
				foreach($enma as $kodeSiswa){
					$cekSql = "SELECT * FROM kelas_siswa WHERE id_kelas = $eik AND id_murid = $kodeSiswa";
					$cekQry = mysqli_query($con, $cekSql) or die ("Gagal Query relasi ".mysqli_error());
					if(mysqli_num_rows($cekQry) <= 0) {
						// Jika tidak ada (belum masuk)
						$tambahSQL  = "INSERT INTO kelas_siswa (id_kelas, id_murid) VALUES ($eik, $kodeSiswa)";
						mysqli_query($con, $tambahSQL) or die ("Gagal Query".mysqli_error());	
						$dataIdmurid .= $kodeSiswa.", ";		
					}else{
						// untuk hapus murid
						$dataIdmurid .= $kodeSiswa.", ";
						$error = "Data Murid Tidak Ditambah";
						$error1 = "/";
						$error2 = " warna_berhasil";
					}
					
				}
					$dataIdmurid	= substr($dataIdmurid, 0, -2);

					$mySql = "SELECT * FROM kelas_siswa, murid WHERE kelas_siswa.id_murid = murid.id_murid AND  kelas_siswa.id_kelas = $eik AND murid.angkatan = '$edit_angkatan' AND murid.id_murid NOT IN ($dataIdmurid)"; 
					$myQry = mysqli_query($con, $mySql) or die ("Gagal Query relasi ".mysqli_error());
					if($myQry){
						while ($myData=mysqli_fetch_assoc($myQry)){ 
							$ID = $myData['id_ks'];
							
							$hapusSQL  = "DELETE FROM kelas_siswa WHERE id_ks='$ID'"; 
							mysqli_query($con, $hapusSQL) or die ("Gagal Query hapus Kelas Siswa".mysqli_error());
						}
						$error = "Edit Kelas Berhasil";
						$error1 = "/";
						$error2 = " warna_berhasil";
					}else{
						$error = "Query Pilih Siswa Salah";
						$error1 = "-";
						$error2 = " warna_error";
					}	
			}else{
				$error = "query update kelas salah";
				$error1 = "-";
				$error2 = " warna_error";
			}
		}
	}



	if(isset($_POST['edit_tamp_mrid'])){
		$eik = $_POST['edit_id_kelas'];
		$ewk = $_POST['edit_wali_kelas'];
		$etaj = $_POST['edit_tahun_ajaran'];
		$ekelas = $_POST['edit_nama_kelas'];
		$eruang = $_POST['edit_ruang_kelas'];
		$es_kelas = $_POST['edit_status_kelas'];
		$query_update_kelas =" UPDATE kelas SET nama_kelas='$ekelas', ruang_kelas='$eruang', status_kelas='$es_kelas', 
					tahun_ajaran='$etaj', id_guru = $ewk WHERE id_kelas=$eik";
		mysqli_query($con, $query_update_kelas) or die ("Gagal query update".mysqli_error());

		if(isset($_POST['edit_angkatan'])){$edit_angkatan = $_POST['edit_angkatan'];}
		else{$error = "List Angkatan Belum Dipilih";$error1 = "-";$error2 = " warna_error";}
	}
?>