<?php
	require_once('../../source/php/init.php');
	$di = $_GET['io'];
	$nm = $_GET['ng'];
	echo $di;
	echo "<br>";
	echo $nm;
	echo "<br>";

	$query = "SELECT id_ortu from grup_kontak WHERE nama_grup ='$nm'";
	$hasil = mysqli_query($con, $query);
	$tam = mysqli_fetch_assoc($hasil);
	echo $tam['id_ortu'];
	$gd = $tam['id_ortu'];
	$array_id = explode(",",$gd);
	echo "<br/>";
	print_r($array_id);
	echo count($array_id);
		$p_array = count($array_id);
		echo "<br/>";
		echo array_search($di, $array_id);
		$key_ar = array_search($di, $array_id);
		echo "<br>";
		echo $array_id[$key_ar];
		unset($array_id[$key_ar]);
		echo "<br/>";
		print_r($array_id);
		echo "<br>";
		echo count($array_id);
		echo "<br>";
		$array_i = implode(",",$array_id);
		echo $array_i;
	$q_u = "UPDATE grup_kontak SET id_ortu = '$array_i' ";
	$h_u = mysqli_query($con, $q_u);
	header("location: ../../login/admin/halamanadmin.php?tk=Tampilkan&gr=$nm#formulir_kontak");
	
	
	
?> 