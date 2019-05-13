<?php 
	if(isset($_POST['kirim_data_guru'])){
		$naor=$_POST['nama_guru'];
		$nuptk = $_POST['nuptk'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/guru/';
		$admin_foto_ortu = $_FILES['admin_foto_guru']['name'];
		$foto_ortu = "SIA_Foto_Guru_".rand(1000,100000000)."_".$admin_foto_ortu;
		$admin_foto_ortu_loc = $_FILES['admin_foto_guru']['tmp_name'];
		$ext = strtolower(pathinfo($admin_foto_ortu, PATHINFO_EXTENSION));
		$jk=$_POST['jk_guru'];
		$pk=$_POST['jabatan'];
		$ago=$_POST['status_guru'];
		$nh=$_POST['nhp_guru'];
		$ao=$_POST['alamat_guru'];
		$query_insert_user_ortu = "INSERT INTO user (username, password, status_user, nama_pengguna) 
									VALUES ('$naor', '$nuptk', 3,'$naor')"; mysqli_query($con, $query_insert_user_ortu);

		$query="INSERT INTO guru (nuptk, nama_guru, no_tel, jk_guru, jabatan, status, alamat) VALUES ('$nuptk','$naor','$nh','$jk','$pk','$ago','$ao')";

		if(mysqli_query($con,$query)){
			$query = "SELECT MAX(id_guru) AS last_id_guru FROM guru LIMIT 1";
			$hasil = mysqli_query($con,$query);
			$row = mysqli_fetch_assoc($hasil);
			$last_id_ortu = $row['last_id_guru'];
			if(!empty($admin_foto_ortu_loc)){
				if(in_array($ext, $extensi)){
					$path = $path.$foto_ortu;
					if(move_uploaded_file($admin_foto_ortu_loc, $path)){
						$sql = "INSERT INTO foto (nama_foto,id_guru) VALUES ('$foto_ortu','$last_id_ortu')";
						$hasil = mysqli_query($con, $sql);
							if($hasil){
								$query_id_foto = "SELECT MAX(id_foto) AS last_id_foto FROM foto LIMIT 1";
								$hasil_id_foto = mysqli_query($con,$query_id_foto);
								$row_id_foto = mysqli_fetch_assoc($hasil_id_foto);
								$last_id_foto = $row_id_foto['last_id_foto'];
								$sql_id_foto = "UPDATE guru SET id_foto = '$last_id_foto' WHERE id_guru= '$last_id_ortu'";
								$hasil_id_foto = mysqli_query($con, $sql_id_foto);
								if ($hasil_id_foto){
									$error = "Tambah Data Guru Berhasil";
									$error1 = "/";
									$error2 = " warna_berhasil";

								}else{
									$error =  "Update Id_Foto Gagal";
								}
								
							}else{
								$error =  "Query Yang Digunakan Salah";
							}
					}else{
						$error =  "Upload foto_ortu Gagal";
					}
				}else{
					$error =  "Extensi File Foto Tidak Didukung";
				}
			}else{
				$error =  "Foto Tidak Boleh Kosong";
			}
		}else{
			$error =  "Query Salah";
		}
	}
?>