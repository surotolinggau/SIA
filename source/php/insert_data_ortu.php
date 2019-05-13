<?php 
	require_once('../../source/php/init.php');
	if(isset($_POST['kirim_data_ortu'])){
		$naor=$_POST['nama_ortu'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/ortu/';
		$admin_foto_ortu = $_FILES['admin_foto_ortu']['name'];
		$foto_ortu = "SIA_Foto_Ortu_".rand(1000,100000000)."_".$admin_foto_ortu;
		$admin_foto_ortu_loc = $_FILES['admin_foto_ortu']['tmp_name'];
		$ext = strtolower(pathinfo($admin_foto_ortu, PATHINFO_EXTENSION));
		$jk=$_POST['jenis_kelamin_ortu'];
		$pk=$_POST['pekerjaan_ortu'];
		$ago=$_POST['agama_ortu'];
		$nh=$_POST['no_hp'];
		$ao=$_POST['alamat_ortu'];
		$query_insert_user_ortu = "INSERT INTO user (username, password, status_user, nama_pengguna) 
									VALUES ('$naor', '0$nh', 4,'$naor')"; mysqli_query($con, $query_insert_user_ortu);
		
		$query="INSERT INTO ortu (nama_ortu, jenis_kelamin_ortu, pekerjaan, agama, no_telp, alamat) VALUES ('$naor','$jk','$pk','$ago','$nh','$ao')";

		if(mysqli_query($con,$query)){
			$query = "SELECT MAX(id_ortu) AS last_id_ortu FROM ortu LIMIT 1";
			$hasil = mysqli_query($con,$query);
			$row = mysqli_fetch_assoc($hasil);
			$last_id_ortu = $row['last_id_ortu'];
			if(!empty($admin_foto_ortu_loc)){
				if(in_array($ext, $extensi)){
					$path = $path.$foto_ortu;
					if(move_uploaded_file($admin_foto_ortu_loc, $path)){
						$sql = "INSERT INTO foto (nama_foto,id_ortu) VALUES ('$foto_ortu','$last_id_ortu')";
						$hasil = mysqli_query($con, $sql);
							if($hasil){
								$query_id_foto = "SELECT MAX(id_foto) AS last_id_foto FROM foto LIMIT 1";
								$hasil_id_foto = mysqli_query($con,$query_id_foto);
								$row_id_foto = mysqli_fetch_assoc($hasil_id_foto);
								$last_id_foto = $row_id_foto['last_id_foto'];
								$sql_id_foto = "UPDATE ortu SET id_foto = '$last_id_foto' WHERE id_ortu= '$last_id_ortu'";
								$hasil_id_foto = mysqli_query($con, $sql_id_foto);
								if ($hasil_id_foto){
									$smsUser= "Selamat Anda Telah Terdaftar Pada SIASDN20LLG.\nUsername: ".$naor."\nPassword: 0".$nh;
									$queryUser = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('+62$nh', '$smsUser', 'Gammu')";
									mysqli_query($con1, $queryUser) or die("query salah");
									header("location: ../../login/admin/halamanadmin.php?id_ortu=$last_id_ortu#formulir_keempat");
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