<?php 

	if(isset($_POST['input_pengumuman'])){
		$judul = $_POST['judul_pengumuman'];
		$isi = $_POST['isi_pengumuman'];
		$tgl_peng = $_POST['tgl_peng'];
		$jam_peng = $_POST['jam_peng'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/pengumuman/';
		$fp = $_FILES['foto_pengumuaman']['name'];
		$sfp = $_FILES['foto_pengumuaman']['size'];
		$foto_pengumuman = "SIA_Foto_Pengumuman_".rand(1000,100000000)."_".$fp;
		$lfp = $_FILES['foto_pengumuaman']['tmp_name'];
		$ext = strtolower(pathinfo($fp, PATHINFO_EXTENSION));
		$query = "INSERT INTO pengumuman (judul_pengumuman, isi_pengumuman, tgl_pengumuman, jam_pengumuman) VALUES ('$judul','$isi','$tgl_peng','$jam_peng')";
		$hasil = mysqli_query($con, $query);
		
		if($hasil){
			$sql = "SELECT MAX(id_pengumuman) AS last_id FROM pengumuman LIMIT 1";
			$max = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($max);
			$id_max = $row['last_id'];
			if(!empty($fp)){
				if($sfp < 500000){
					if(in_array($ext, $extensi)){
						$path = $path.$foto_pengumuman;
						if(move_uploaded_file($lfp, $path)){
							$query = "INSERT INTO foto (nama_foto, id_pengumuman) VALUES ('$foto_pengumuman','$id_max')";
							$hsl = mysqli_query($con,$query);
							if($hsl){
									$error = "Tambah Data Pengumuman Berhasil";
									$error1 = "/";
									$error2 = " warna_berhasil";
							}else{
									$error = "Tambah Data Pengumuman Gagal";
									$error1 = "-";
									$error2 = " warna_error";
							}
						}else{
							$error = "Gagal Pindah Foto";
							$error1 = "-";
							$error2 = " warna_error";
						}
					}else{
						$error = "Ektensi Foto Tidak Didukung";
						$error1 = "-";
						$error2 = " warna_error";
					}
				}else{
					$error = "Ukuran Foto Melebihi 500Kb";
					$error1 = "-";
					$error2 = " warna_error";
				}
			}else{
				$error = "Foto Pengumuman Kosong";
				$error1 = "-";
				$error2 = " warna_error";
			}
		}else{
			$error = "Query Insert Pengumuman Salah";
			$error1 = "-";
			$error2 = " warna_error";
		}
	}
?>