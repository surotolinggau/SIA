<?php
require_once('../../source/php/init.php');
	if(isset($_POST['simpan_edit_jadwal'])){
		$ejij = $_POST['edit_id_jadwal'];
		$ejik = $_POST['edit_id_kelas'];
		$edit_jadwal_id_guru = $_POST['edit_jadwal_nama_guru'];
		$edit_jadwal_mata_pelajaran = $_POST['edit_jadwal_mata_pelajaran'];
		$edit_jadwal_hari = $_POST['edit_jadwal_hari'];
		$edit_jadwal_jam_mulai = $_POST['edit_jadwal_jam_mulai'];
		$edit_jadwal_jam_selesai = $_POST['edit_jadwal_jam_selesai'];
		$query_update_jadwal = "UPDATE jadwal SET id_guru_mp = $edit_jadwal_id_guru, id_mp = $edit_jadwal_mata_pelajaran, hari = '$edit_jadwal_hari', jam_masuk = '$edit_jadwal_jam_mulai', jam_selesai = '$edit_jadwal_jam_selesai' WHERE id_jadwal = $ejij";
		$hasil_update_jadwal = mysqli_query($con, $query_update_jadwal);
		if($hasil_update_jadwal){
			header("location: ../../login/admin/halamanadmin.php?id_jdl=$ejik#formulir_lihat_jadwal");
		}else{
			echo "Update Jadwal Gagal";
		}
	}
?>