<?php
	require_once('../../source/php/init.php');


		$id_group = isset($_GET['id_group'])?$_GET['id_group']:"";

		$query = "SELECT * FROM grup_kontak WHERE id_grup='$id_group'";
		$result = mysqli_query($con,$query) or die("query salah");
		$row_grup = mysqli_fetch_assoc($result);

		$list_id_kontak = $row_grup["id_ortu"];

		$list_id_kontak = explode(',', $list_id_kontak);

		$list_kontak["list_kontak"] = array();
		foreach ($list_id_kontak as $id_kontak) {
			$query = "SELECT * FROM ortu WHERE id_ortu='$id_kontak'";
			$result = mysqli_query($con,$query) or die("query salah");
			$row_ortu = mysqli_fetch_assoc($result);

			$list_kontak["list_kontak"][] = $row_ortu;
		}

		echo json_encode($list_kontak);
?>