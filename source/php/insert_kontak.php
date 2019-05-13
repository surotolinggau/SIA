<?php 
	require_once('../../source/php/init.php');
	// $username = $_SESSION['username'];
	// $isLoggedIn = $_SESSION['isLoggedIn'];
 
	// if($isLoggedIn != '1'){
	// 	session_destroy();
	// 	header('Location: ../index.php');
	// }
	if(isset($_POST['kirim_kontak_ortu'])){
		$nko=$_POST['nama_kontak_ortu'];
		$nck = $_POST['nm_chk_kontak'];

		$array_id = implode(",",$nck);
		echo $array_id;

		$sql = "INSERT INTO grup_kontak (nama_grup, id_ortu) VALUES ('$nko', '$array_id')";
		$hasil = mysqli_query($con, $sql) or die("Gagal Menyimpan Data".mysqli_error($con));
		if($hasil){
			header('location: ../../login/admin/halamanadmin.php#formulir_kontak');
		}else{
			echo "Insert Grup Id Gagal";
		}

		
		
	}
?>