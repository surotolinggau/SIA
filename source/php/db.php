<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="sia_sd20_llg";
	$con= mysqli_connect($host,$user,$pass, $db) or die(mysqli_error($con));
		// tambahan kalo ada error database hapus yang bawah dan hilangkan coment di file init
	date_default_timezone_set('Asia/Jakarta');
	$db1="gammu";
	$con1= mysqli_connect($host,$user,$pass, $db1) or die(mysqli_error($con1));
?>