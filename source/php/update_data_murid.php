<?php 
	session_start();
	require_once('db.php');

	if(isset($_POST['edit_data_murid'])){
		$id_ot = $_POST['id_murid'];
		$id_foto_ortu = $_POST['id_foto'];
		$ang = $_POST['angkatan'];
		$hak_akses = $_POST['hak_user'];
		$naor=$_POST['nama_murid'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/murid/';
		$admin_foto_ortu = $_FILES['admin_foto_murid']['name'];
		$foto_ortu = "SIA_Foto_Murid_Update_".rand(1000,100000000)."_".$admin_foto_ortu;
		$admin_foto_ortu_loc = $_FILES['admin_foto_murid']['tmp_name'];
		$admin_size = $_FILES['admin_foto_murid']['size'];
		$ext = strtolower(pathinfo($admin_foto_ortu, PATHINFO_EXTENSION));
		$jk=$_POST['NIM'];
		$pk=$_POST['tempat_lahir_murid'];
		$ago=$_POST['jenis_kelamin_murid'];
		$nh=$_POST['tanggal_lahir_murid'];
		$ao=$_POST['status_murid'];

		$query = "UPDATE murid SET NIM = '$jk', nama_murid = '$naor', jenis_kelamin_murid = '$ago', tempat_lahir = '$pk', tanggal_lahir = '$nh', status_murid = '$ao', angkatan='$ang' WHERE id_murid ='$id_ot'";
		if (mysqli_query($con, $query)) {
			echo "Edit Data Murid Berhasil";
			if(!empty($admin_foto_ortu_loc)){
					if($admin_size < 500000){					
					if(in_array($ext, $extensi)){
						$path = $path.$foto_ortu;
						if(move_uploaded_file($admin_foto_ortu_loc, $path)){
							$query1 = "UPDATE foto SET nama_foto = '$foto_ortu' WHERE id_foto = '$id_foto_ortu'";
							$hasil = mysqli_query($con, $query1);
							if($hasil){
								echo "Upload Foto Berhasil";
								if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_murid');}
								if($hak_akses == 4){header('location: ../../login/admin/halamanortu.php#formulir_murid');}
							}else{
								echo "Upload Foto Murid Gagal";
							}
						}else{
							echo "Gagal Upload Edit Foto Murid";
						}
					}else{
						echo "Format Data Foto Tidak Didukung";
					}
				}else{
					echo "Ukuran Gambar Terlalu Besar, Harus Dibawah 500Kb";
				}
			}else{
				if($hak_akses == 1){header('location: ../../login/admin/halamanadmin.php#formulir_murid');}
				if($hak_akses == 4){header('location: ../../login/admin/halamanortu.php#formulir_murid');}
			}
		}else{
			echo "Edit Data Murid Gagal";
		}
	}
?>