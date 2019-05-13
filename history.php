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
				<div class="hisri">
					<p id="judul_history">Visi</p>
					<div class="isi_histori">
						<p>Visi dari Sekolah Dasar Negeri 20 Kota Lubuklinggau :</p>
						<i class="hjhdj">"Menghasilkan lulusan yang cerdas, trampil dan taqwa"</i>
					</div>
					<p id="judul_history">Misi</p>
					<div class="isi_histori">
						<p>Visi dari Sekolah Dasar Negeri 20 Kota Lubuklinggau :</p>
						<ul>
						  <li>Melatih kecerdasan siswa sehingga mampu mengembangkan potensi diri.</li>
						  <li>Memiliki keterampilan yang berorientasi kecakapan hidup (LIVE SKILL) sesuai dengan kemampuan dan budayanya.</li>
						  <li>Mendidik siswa menjadi anak sehat jasmani dan rohani, berbudi pekerti luhur, beriman dan bertaqwa pada Tuhan Yang Maha Esa</li>
						</ul>
					</div>
					<p id="judul_history">Sejarah</p>
					<div class="isi_histori">
						<p id="sejarah_pek">Berdirinya Sekolah Dasar Negeri 20 Kota Lubuklinggau didasari oleh keinginan yang luhur, disertai dengan tekad yang suci untuk ikut serta dalam memajukan dan mengembangkan pendidikan tinggi berdasarkan falsafah Pancasila dan Undang-Undang Dasar 1945 yang merupakan landasan utama dalam penyelenggaraan pendidikan di Indonesia.</p>
						<p id="sejarah_pek">Sekolah Dasar Negeri 20 Kota Lubuklinggau merupakan salah satu sekolah dasar negeri dikota Lubuklinggau, Sumatera Selatan. Sekolah ini dibangun di atas tanah seluas 1125 m^2 dengan berbagai fasilitas yang mencukupi sebagai sarana prasarana pembelajaran. Sekolah Dasar Negeri 20 Kota Lubuklinggau didirikan pada tanggal 1 januari 1963 dan baru beroperasi pada tanggal 1 januari 1963. SDN 20 Kota Lubuklinggau bertempat di jalan garuda hitam rt.02 kelurahan pasar pemiri kecamatan lubuklinggau barat II. Pada tahun pelajaran 2014-2015 siswa berjumlah 290 siswa dengan perincian 100 siswa perempuan dan 190 siswa laki-laki serta 20 guru pengajar.
						</p>
					</div>
				</div>
				<div class="peng_kanan">
					<div class="pengla">
						<img src="image/header/iklan.png"/>
					</div>
					<div class="pengla">
						<p>LAINNYA</p>
					</div>
					<div class="pengla1">
						<div id="fotopenlai">
							<img src="image/pengumuman/1.jpg" />
						</div>
						<div id="pengki">
							<a > VISI</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="pengla1">
						<div id="fotopenlai">
							<img src="image/pengumuman/1.jpg" />
						</div>
						<div id="pengki">
							<a > MISI</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="pengla1">
						<div id="fotopenlai">
							<img src="image/pengumuman/1.jpg" />
						</div>
						<div id="pengki">
							<a > SEJARAH</a>
						</div>
						<div class="clear"></div>
					</div>
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