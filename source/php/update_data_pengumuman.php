<?php 
	session_start();
	require_once('db.php');
	$hak_akses = $_SESSION['hak_akses'];
	if(isset($_POST['edit_pengumuman'])){
		$if = $_POST['id_foto'];
		$ip = $_POST['id_pengumuman'];
		$judul = $_POST['judul_pengumuman'];
		$isi = $_POST['isi_pengumuman'];
		$tgl_peng = $_POST['tgl_peng'];
		$jam_peng = $_POST['jam_peng'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/pengumuman/';
		$fp = $_FILES['foto_pengumuaman']['name'];
		$sfp = $_FILES['foto_pengumuaman']['size'];
		$foto_pengumuman = "SIA_Foto_Pengumuman_Update_".rand(1000,100000000)."_".$fp;
		$lfp = $_FILES['foto_pengumuaman']['tmp_name'];
		$ext = strtolower(pathinfo($fp, PATHINFO_EXTENSION));

		$query = "UPDATE pengumuman SET judul_pengumuman = '$judul', isi_pengumuman = '$isi', tgl_pengumuman = '$tgl_peng', jam_pengumuman = '$jam_peng' WHERE id_pengumuman ='$ip'";
		if (mysqli_query($con, $query)) {
			echo "Edit Data Pengumuman Berhasil";
			if(!empty($lfp)){
					if($sfp < 5000000){					
					if(in_array($ext, $extensi)){
						$path = $path.$foto_pengumuman;
						if(move_uploaded_file($lfp, $path)){
							$query1 = "UPDATE foto SET nama_foto = '$foto_pengumuman' WHERE id_foto = '$if'";
							$hasil = mysqli_query($con, $query1);
							if($hasil){
								echo "Upload Foto Berhasil";
								if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_lihat_pengumuman');}
								if($hak_akses == 2){header('location: ../../login/admin/halamankepsek.php#formulir_lihat_pengumuman');}
							}else{
								echo "Upload Foto Pengumuman Gagal";
							}
						}else{
							echo "Gagal Upload Edit Foto Pengumuman";
						}
					}else{
						echo "Format Data Foto Tidak Didukung";
					}
				}else{
					echo "Ukuran Gambar Terlalu Besar, Harus Dibawah 500Kb";
				}
			}else{
				if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_lihat_pengumuman');}
								if($hak_akses == 2){header('location: ../../login/admin/halamankepsek.php#formulir_lihat_pengumuman');}
			}
		}else{
			echo "Edit Data Pengumuman Gagal";
		}
	}
?>