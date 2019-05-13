<?php 
	session_start();
	require_once('db.php');

	if(isset($_POST['edit_data_guru'])){
		$id_ot = $_POST['id_guru'];
		$id_foto_ortu = $_POST['id_foto'];
		$hak_akses = $_POST['hak_user'];
		$nuptk = $_POST['nuptk'];
		$naor=$_POST['nama_guru'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/guru/';
		$admin_foto_ortu = $_FILES['admin_foto_guru']['name'];
		$foto_ortu = "SIA_Foto_Guru_Update_".rand(1000,100000000)."_".$admin_foto_ortu;
		$admin_foto_ortu_loc = $_FILES['admin_foto_guru']['tmp_name'];
		$admin_size = $_FILES['admin_foto_guru']['size'];
		$ext = strtolower(pathinfo($admin_foto_ortu, PATHINFO_EXTENSION));
		$jk=$_POST['jk_guru'];
		$pk=$_POST['jabatan'];
		$ago=$_POST['status_guru'];
		$nh=$_POST['nhp_guru'];
		$ao=$_POST['alamat_guru'];

		$query = "UPDATE guru SET nuptk = '$nuptk', nama_guru = '$naor', jk_guru = '$jk', jabatan = '$pk', status = '$ago', no_tel = '$nh', alamat = '$ao' WHERE id_guru ='$id_ot'";
		if (mysqli_query($con, $query)) {
			echo "Edit Data Guru Berhasil";
			if(!empty($admin_foto_ortu_loc)){
					if($admin_size < 500000){					
					if(in_array($ext, $extensi)){
						$path = $path.$foto_ortu;
						if(move_uploaded_file($admin_foto_ortu_loc, $path)){
							$query1 = "UPDATE foto SET nama_foto = '$foto_ortu', id_guru = '$id_ot' WHERE id_foto = '$id_foto_ortu'";
							$hasil = mysqli_query($con, $query1);
							if($hasil){
								echo "Upload Foto Berhasil";
								if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_guru');}
								if($hak_akses == 2){header('location: ../../login/admin/halamankepsek.php#formulir_lihat_profil');}
								if($hak_akses == 3){header('location: ../../login/admin/halamanguru.php#formulir_lihat_profil');}
							}else{
								echo "Upload foto_ortu Gagal";
							}
						}else{
							echo "Gagal Upload Edit Foto Ortu";
						}
					}else{
						echo "Format Data Foto Tidak Didukung";
					}
				}else{
					echo "Ukuran Gambar Terlalu Besar, Harus Dibawah 500Kb";
				}
			}else{
				if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_guru');}
				if($hak_akses == 2){header('location: ../../login/admin/halamankepsek.php#formulir_lihat_profil');}
				if($hak_akses == 3){header('location: ../../login/admin/halamanguru.php#formulir_lihat_profil');}
			}
		}else{
			echo "Edit Data Gagal";
		}
	}
?>