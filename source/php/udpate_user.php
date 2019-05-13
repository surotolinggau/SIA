<?php
require_once('../../source/php/init.php');
	if(isset($_POST['simpan_edit_user'])){
		$id_user = $_POST['id_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$hak_akses = $_POST['hak_akses'];
		$query_update_user = "UPDATE user SET username = '$username', password='$password', status_user=$hak_akses WHERE id_user=$id_user";
		$hasil_update_user = mysqli_query($con, $query_update_user);
		if($hasil_update_user){
			header('location: ../../login/admin/halamanadmin.php#formulir_lihat_profil');
		}else{
			echo "Update Data User Gagal";
		}
	}

	if(isset($_POST['simpan_edit_user_guru'])){
		$id_user = $_POST['id_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query_update_user = "UPDATE user SET username = '$username', password='$password' WHERE id_user=$id_user";
		$hasil_update_user = mysqli_query($con, $query_update_user);
		if($hasil_update_user){
			header('location: ../../login/admin/halamanguru.php#formulir_lihat_profil');
		}else{
			echo "Update Data User Gagal";
		}
	}

	if(isset($_POST['simpan_edit_user_ortu'])){
		$id_user = $_POST['id_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query_update_user = "UPDATE user SET username = '$username', password='$password' WHERE id_user=$id_user";
		$hasil_update_user = mysqli_query($con, $query_update_user);
		if($hasil_update_user){
			header('location: ../../login/admin/halamanortu.php#formulir_lihat_profil');
		}else{
			echo "Update Data User Gagal";
		}
	}

	if(isset($_POST['simpan_edit_user_kepsek'])){
		$id_user = $_POST['id_user'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query_update_user = "UPDATE user SET username = '$username', password='$password' WHERE id_user=$id_user";
		$hasil_update_user = mysqli_query($con, $query_update_user);
		if($hasil_update_user){
			header('location: ../../login/admin/halamankepsek.php#formulir_lihat_profil');
		}else{
			echo "Update Data User Gagal";
		}
	}

	if(isset($_POST['simpan_edit_user_lengkap'])){
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$hak_akses = $_POST['hak_akses'];
	$query_update_user = "UPDATE user SET username = '$username', password='$password', status_user=$hak_akses WHERE id_user=$id_user";
	$hasil_update_user = mysqli_query($con, $query_update_user);
	if($hasil_update_user){
		header('location: ../../login/admin/halamanadmin.php#formulir_user');
	}else{
		echo "Update Data User Gagal";
	}
}
?>