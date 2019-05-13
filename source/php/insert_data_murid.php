<?php
	require_once('../../source/php/init.php');
	if(isset($_POST['tambah_data_murid'])){
		$id_ortu = $_POST['id_ortu'];
		$extensi = array('jpeg','jpg','png','gif','bmp');
		$path = '../../image/murid/';
		$admin_foto_murid = $_FILES['admin_foto_murid']['name'];
		$foto_murid = "SIA_Foto_Murid_".rand(1000,100000000)."_".$admin_foto_murid;
		$admin_foto_murid_loc = $_FILES['admin_foto_murid']['tmp_name'];
		$ext = strtolower(pathinfo($admin_foto_murid, PATHINFO_EXTENSION));
		$nim=$_POST['nim'];
		$ag = $_POST['angkatan'];
		$nm=$_POST['nama_murid'];
		$jkm=$_POST['jenis_kelamin_murid'];
		$tlm=$_POST['tempat_lahir_murid'];
		$tglm=$_POST['tanggal_lahir_murid'];
		$sm=$_POST['status_murid'];
		$query_insert = "INSERT INTO murid 
						(NIM, nama_murid, jenis_kelamin_murid, angkatan, tempat_lahir, tanggal_lahir, status_murid, id_ortu)
						VALUES ('$nim','$nm','$jkm','$ag', '$tlm','$tglm','$sm','$id_ortu')";
		$hasil_insert = mysqli_query($con,$query_insert);
		if($hasil_insert){
			$sql = "SELECT MAX(id_murid) AS last_id_murid FROM murid LIMIT 1";
			$hasil = mysqli_query($con,$sql);
			$row = mysqli_fetch_assoc($hasil);
			$last_id_murid = $row['last_id_murid'];
					if(!empty($admin_foto_murid)){
						if(in_array($ext, $extensi)){
						$path = $path.$foto_murid;
							if(move_uploaded_file($admin_foto_murid_loc, $path)){
								$query = "INSERT INTO foto (nama_foto,id_ortu, id_murid) VALUES ('$foto_murid','$id_ortu','$last_id_murid')";
								$hsl = mysqli_query($con,$query);
								if($hsl){
									$query_id_foto = "SELECT MAX(id_foto) AS last_id_foto FROM foto LIMIT 1";
									$hasil_id_foto = mysqli_query($con,$query_id_foto);
									$row_id_foto = mysqli_fetch_assoc($hasil_id_foto);
									$last_id_foto = $row_id_foto['last_id_foto'];
									$sql_id_foto = "UPDATE murid SET id_foto = '$last_id_foto' WHERE id_murid= '$last_id_murid'";
									$hasil_id_foto = mysqli_query($con, $sql_id_foto);
										if($hasil_id_foto){
											$error = "Tambah Data Murid Berhasil";
											$error1 = "/";
											$error2 = " warna_berhasil";
										}else{
											$error = "Tambah Data Murid Gagal";
											$error1 = "-";
											$error2 = " warna_error";
										}
								}else{
									$error = "Tambah Data Murid Gagal";
									$error1 = "-";
									$error2 = " warna_error";
								}
							}else{
								$error = "Gagal Pindahkan Gambar";
								$error1 = "-";
							}
						}else{
							$error = "Extensi Foto Tidak Didukung";
							$error1 = "-";
						}
					}else{
						$error = "Pilih Gambar";
						$error1 = "-";
					}
		}else{
			$error = "Query Insert Data Murid Salah";
			$error1 = "-";
			$error2 = " warna_error";
		}
	}
?>