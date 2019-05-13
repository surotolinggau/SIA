<?php 
	$tam_jadk = tampilJadwalk($_GET['id_klas']);
	$row_jadkel=mysqli_fetch_assoc($tam_jadk);
	$tam_jadg = tampilJadwalg();
	$tam_jadmp = tampilJadwalmp();

	if(isset($_POST['simpan_jadwal'])){
		$jnk = $_POST['jadwal_nama_kelas'];
		$jng = $_POST['jadwal_nama_guru'];
		$jmp = $_POST['jadwal_mata_pelajaran'];
		$jjm = $_POST['jadwal_jam_mulai'];
		$jjs = $_POST['jadwal_jam_selesai'];
		$jhar = $_POST['jadwal_hari'];
		$query_inset_jadwal = "INSERT INTO jadwal (id_kls, id_guru_mp, id_mp, jam_masuk, jam_selesai, hari) VALUES ($jnk, $jng, $jmp, '$jjm', '$jjs', '$jhar')";
		$hasil_jadwal = mysqli_query($con, $query_inset_jadwal);
		if($hasil_jadwal){
			$error = "Tambah Data Jadwal Berhasil";
			$error1 = "/";
			$error2 = " warna_berhasil";
		}else{
			$error = "Tambah Data Jadwal gagal";
			$error1 = "-";
			$error2 = " warna_error";
		}			

	}
?>