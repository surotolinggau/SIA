<?php 
	session_start();
	require_once('db.php');

	if(isset($_POST['edit_data_ortu'])){
		$id_ot = $_POST['id_ortu'];
		$id_foto_ortu = $_POST['id_foto'];
		$hak_akses = $_POST['hak_user'];
		$naor=$_POST['nama_ortu'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/ortu/';
		$admin_foto_ortu = $_FILES['admin_foto_ortu']['name'];
		$foto_ortu = "SIA_Foto_Ortu_Update_".rand(1000,100000000)."_".$admin_foto_ortu;
		$admin_foto_ortu_loc = $_FILES['admin_foto_ortu']['tmp_name'];
		$admin_size = $_FILES['admin_foto_ortu']['size'];
		$ext = strtolower(pathinfo($admin_foto_ortu, PATHINFO_EXTENSION));
		$jk=$_POST['jenis_kelamin_ortu'];
		$pk=$_POST['pekerjaan_ortu'];
		$ago=$_POST['agama_ortu'];
		$nh=$_POST['no_hp'];
		$ao=$_POST['alamat_ortu'];

		$query = "UPDATE ortu SET nama_ortu = '$naor', jenis_kelamin_ortu = '$jk', pekerjaan = '$pk', agama = '$ago', no_telp = '$nh', alamat = '$ao' WHERE id_ortu ='$id_ot'";
		if (mysqli_query($con, $query)) {
			echo "Edit Data Ortu Berhasil";
			if(!empty($admin_foto_ortu_loc)){
					if($admin_size < 500000){					
					if(in_array($ext, $extensi)){
						$path = $path.$foto_ortu;
						if(move_uploaded_file($admin_foto_ortu_loc, $path)){
							$query1 = "UPDATE foto SET nama_foto = '$foto_ortu', id_ortu = '$id_ot' WHERE id_foto = '$id_foto_ortu'";
							$hasil = mysqli_query($con, $query1);
							if($hasil){
								echo "Upload Foto Berhasil";
								if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_kedua');}
								if($hak_akses == 4){header('location: ../../login/admin/halamanortu.php#formulir_lihat_profil');}
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
				if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_kedua');}
				if($hak_akses == 4){header('location: ../../login/admin/halamanortu.php#formulir_lihat_profil');}
			}
		}else{
			echo "Edit Data Gagal";
		}
	}
?>