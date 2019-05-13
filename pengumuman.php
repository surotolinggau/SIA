<!DOCTYPE html>
<html>
	<head>
		<title>Sistem Informasi Akademik SD_20_LLG</title>
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="source/css/style.css" />
	<body>
		<div id="menu_fix2">
			<div id="logo_sekolah">
				<a href="">
					<img src="image/header/logo_sekolah3.png">
					<p id="logo_tulisan">Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				</a>
			</div>
			<!-- Membuat Menu Navigasi -->
			<div id="menu">
				<a href="index.php" class="kolom"> <p class="sa1">Beranda</p></a>
				<a href="pengumuman_lengkap.php" class="kolom kolom_tengah"> <p class="sa2">Pengumuman</p></a>
				<a href="guru.php" class="kolom kolom_tengah"> <p class="sa3">Guru</p></a>
				<a href="murid.php" class="kolom kolom_tengah"> <p class="sa4">Murid</p></a>
				<a href="history.php" class="kolom kolom_tengah"> <p class="sa2">History</p></a>
				<a href="login/" class="kolom"> <p class="sa5">Login</p></a>
			</div>
		</div>
		<div class="clear"></div>
		<!-- Membuat Menu Navigasi -->
		<?php
			require_once('source/php/db.php');
			require_once('source/php/fungsi.php');
			$id_pengumuman = $_GET['id_pengumuman'];
			$tamPeng = editPengumuman($id_pengumuman);
			$row_tamPeng = mysqli_fetch_assoc($tamPeng);

		?>
		<!-- Membuat Bungkus Pengumuman SDN 20 Kota Lubuklinggau-->
		<div id="pengumumanlengkap">
			<div class="indexpeng">
				<div class="peng_kiri">
					<p><?php echo $row_tamPeng['judul_pengumuman'];?></p>
					<div id="gampeng">
						<img src="image/pengumuman/<?php echo $row_tamPeng['nama_foto'];?>"/>
					</div>
					<p id="isi_peng"><span>Liputan6.com, Meksiko City -</span>
					<?php echo $row_tamPeng['isi_pengumuman']?></p>
				</div>
				<div class="peng_kanan">
					<div class="pengla">
						<img src="image/header/iklan.png"/>
					</div>
					<div class="pengla">
						<p>LAINNYA</p>
					</div>
					<?php
						$pengLainnya = pengLain($id_pengumuman);
						while($row_pengLainnya = mysqli_fetch_assoc($pengLainnya)){
					?>
					<div class="pengla1">
						<div id="fotopenlai">
							<img src="image/pengumuman/<?php echo $row_pengLainnya['nama_foto'];?>" />
						</div>
						<div id=penglatu>
							<a href="?id_pengumuman=<?php echo $row_pengLainnya['id_pengumuman'];?>"><?php echo $row_pengLainnya['judul_pengumuman'];?></a>
						</div>
						<div class="clear"></div>
					</div>
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<!-- Membuat Bungkus Pengumuman SDN 20 Kota Lubuklinggau-->

		</div>
		
		
		
		
		<div class="footer_peng">
			<div class="indexpeng">
				<p>&copy Copyright 2016 SIA_SDN 20 Kota Lubuklinggau. All Rights Reserved</p>
			</div>
		</div>
	</body>
</html>