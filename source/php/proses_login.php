<?php
	//Membuat session untuk para user
	session_start();
	require_once('db.php');

	if(isset($_POST['login'])){
		global $con;
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$query= "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
		$result=mysqli_query($con,$query);
		$hasil_login = mysqli_fetch_assoc($result);
		$global_hak_akses_user = $hasil_login['status_user'];
		$global_nama_pengguna_user = $hasil_login['nama_pengguna'];
		if($result){
			if(mysqli_num_rows($result) >0){
				$_SESSION['username']= $user;
				$_SESSION['hak_akses']= $global_hak_akses_user;
				$_SESSION['nama_pengguna']= $global_nama_pengguna_user;
					if($global_hak_akses_user == 1){
						header('location: ../../login/admin/halamanadmin.php#formulir_home');
					}elseif($global_hak_akses_user == 2){
						header('location: ../../login/admin/halamankepsek.php#formulir_home');
					}elseif($global_hak_akses_user == 3){
						header('location: ../../login/admin/halamanguru.php#formulir_home');
					}else{
						header('location: ../../login/admin/halamanortu.php#formulir_home');
					}
			}else{
				echo "username dan password salah";
				}
		}
	}
?>