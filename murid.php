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
									$perpage_murid = 8;
									$page_murid = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
									$start_murid = ($page_murid > 1) ?($page_murid * $perpage_murid) - $perpage_murid : 0;
									$articel_murid = "SELECT * FROM foto, murid, ortu WHERE foto.id_murid = murid.id_murid AND murid.id_ortu=ortu.id_ortu ORDER BY nama_murid LIMIT $start_murid, $perpage_murid ";
									$hasil_lihat_murid = mysqli_query($con, $articel_murid);
									if(isset($_GET['id_murid'])){
										$cari_murid = $_GET['id_murid'];
										$hasil_lihat_murid = hasilPencarian_murid1($cari_murid);
									}
									while($row_murid=mysqli_fetch_assoc($hasil_lihat_murid)){
								?>
								<!-- PHP Menampilkan Data Murid -->

								<div class="admin_lihat_data_ortu_lengkap1">
									<div class="admin_lihat_foto_ortu1">
										<img src="image/murid/<?php echo $row_murid['nama_foto']; ?>" />
									</div>
									<div class="admin_lihat_detail_ortu">
										<div class="admin_lihat_data_ortu_nama_dan_alamat">
											<div class="admin_lihat_data_ortu_na">
												<a href="?id_murid=<?php echo $row_murid['id_murid'];?>"><?php echo $row_murid['nama_murid'];?></a>
												<div class="clear"></div>
												<i><?php echo $row_murid['NIM'];?></i>
											</div>
											<div class="clear"></div>
										</div>
										<div class="admin_lihat_data_ortu_kiri">
											<p>Angkatan : <?php echo $row_murid['angkatan'];?></p>
											<p>Status Murid : <?php echo $row_murid['status_murid'];?></p>
											<p>Jenis Kelamin	: <?php echo $row_murid['jenis_kelamin_murid'];?></p>
										</div>
										<div class="admin_lihat_data_ortu_kanan">
											<p>Tempat Lahir 		: <?php echo $row_murid['tempat_lahir'];?></p>
											<p>Tanggal Lahir 	: <?php $tgl = $row_murid['tanggal_lahir']; echo tanggalIndonesia($tgl); ?></p>
											<p>Nama Ortu 	: <?php echo $row_murid['nama_ortu'];?></p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
									<?php } //endwhile?>
								<div class="clear"></div>
								<?php if(!isset($_GET['id_murid'])){?>
								<div class="panigation">

									<!-- PHP Nomor Urut Panigation Data Murid -->
									<?php 
									$hasil_murid = mysqli_query($con, "SELECT * FROM foto, murid WHERE foto.id_murid = murid.id_murid");
									$total_murid = mysqli_num_rows($hasil_murid);
									$pages_murid = ceil($total_murid/$perpage_murid);
									for($i=1; $i<=$pages_murid; $i++){ ?>
									<a href="?hlm=<?php echo $i;?>"><?php echo $i;?></a>
									<?php } ?>
									<!-- PHP Nomor Urut Panigation Data Murid -->

								</div>
								<?php } ?>
				</div>
				<div class="peng_kanan">
					<div class="pengla">
						<img src="image/header/iklan.png"/>
					</div>
					<div class="pengla">
						<p>LAINNYA</p>
					</div>
					<?php
						$pengLainnya = pengLain3();
						while($row_pengLainnya = mysqli_fetch_assoc($pengLainnya)){
					?>
					<div class="pengla1">
						<div id="fotopenlai">
							<img src="image/murid/<?php echo $row_pengLainnya['nama_foto'];?>" />
						</div>
						<div id="pengki">
							<a href="?id_murid=<?php echo $row_pengLainnya['id_murid'];?>"><?php echo $row_pengLainnya['nama_murid'];?></a>
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