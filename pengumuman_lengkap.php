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
		?>
		<!-- Membuat Bungkus Pengumuman SDN 20 Kota Lubuklinggau-->
		<div id="pengumumanlengkap">
			<div class="indexpeng">
				<div class="peleng">
					<?php 
						$perpage_pengumuman = 5;
						$page_pengumuman = isset($_GET["hal_peg"]) ? (int)$_GET["hal_peg"] : 1;
						$start_pengumuman = ($page_pengumuman > 1) ?($page_pengumuman * $perpage_pengumuman) - $perpage_pengumuman : 0;
						$articel_pengumuman = "SELECT * FROM foto, pengumuman WHERE foto.id_pengumuman = pengumuman.id_pengumuman ORDER BY pengumuman.id_pengumuman DESC LIMIT $start_pengumuman, $perpage_pengumuman ";
						$isi_pe = mysqli_query($con, $articel_pengumuman);
						while($row_peng=mysqli_fetch_assoc($isi_pe)){
					?>

				<div class="isi_form_pengumuman">
					<div class="from_peng_foto">
						<img src="image/pengumuman//<?php echo $row_peng['nama_foto']; ?> " alt="foto Pengumuman"/>
					</div>
					<div class="form_detail_peng">
						<p id="waktu_pengumuman"> <span>P</span> <?php echo $row_peng['tgl_pengumuman']. ' ' . $row_peng['jam_pengumuman'];?></p>
						<a href="pengumuman.php?id_pengumuman=<?php echo $row_peng['id_pengumuman'];?>"><?php echo $row_peng['judul_pengumuman'];?></a>
						<p id="isi_peng_isi"><?php echo $row_peng['isi_pengumuman'];?></p>
					</div>
					<div class="clear"></div>
				</div>
					<?php } //endwhile?>
				<div class="clear"></div>
				<div class="panigation">

						<!-- PHP Nomor Urut Panigation Data Pengumuman -->
						<?php 
						$hasil_pengumuman = mysqli_query($con, "SELECT * FROM foto, pengumuman WHERE foto.id_pengumuman = pengumuman.id_pengumuman");
						$total_pengumuman = mysqli_num_rows($hasil_pengumuman);
						$pages_pengumuman = ceil($total_pengumuman/$perpage_pengumuman);
						for($i=1; $i<=$pages_pengumuman; $i++){ ?>
						<a href="?hal_peg=<?php echo $i;?>"><?php echo $i;?></a>
						<?php } ?>
						<!-- PHP Nomor Urut Panigation Data Pengumuman -->

				</div>
				</div>
				<div class="peng_kanan">
					<div class="pengla">
						<img src="image/header/iklan.png"/>
					</div>
					<div class="pengla">
						<p>LAINNYA</p>
					</div>
					<?php
						$pengLainnya = pengLain1();
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