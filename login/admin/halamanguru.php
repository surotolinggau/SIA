<!DOCTYPE html>
<html>
	<head>
		<title>Menu Admin</title>
		<link rel="stylesheet" type="text/css" href="../../source/css/style.css" />
		<script type="text/javascript" src="../../source/jquery/jquery-2.2.0.min.js"></script>
	</head>
		<!-- PHP Session Login Admin -->
		<?php
			ob_start();
			require_once('../../source/php/init.php');
			$username = $_SESSION['username'];
			$nama_pengguna = $_SESSION['nama_pengguna'];
			$hak_akses = $_SESSION['hak_akses'];
			$error = "";
			$error1 = "";
			$error2 = "";
		 
			if($hak_akses != '3'){
				session_destroy();
				header('Location: ../index.php');
			}
		?>
		<!-- PHP Session Login Admin -->
		<body>
			<!-- Kolom Header Menu -->
				<?php require_once('../../source/php/template/admin_header.php');?>
			<!-- Kolom Header Menu -->
			<!-- Kolom Admin Menu -->
				<?php require_once('../../source/php/template/guru_menu.php');ob_end_flush();?>
			<!-- Kolom Admin Menu -->
			<script type="text/javascript" src="../../source/jquery/kontak.js"></script>
			<script type="text/javascript" src="../../source/jquery/list_kontak.js"></script>
		</body>
</html>