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
					<!-- PHP Tampil Data dan Pencarian Orangtua -->
								<?php 
									$perpage_guru = 5;
									$page_guru = isset($_GET["hln"]) ? (int)$_GET["hln"] : 1;
									$start_guru = ($page_guru > 1) ?($page_guru * $perpage_guru) - $perpage_guru : 0;
									$query_guru = "SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru ORDER BY nama_guru LIMIT $start_guru, $perpage_guru ";
									$result_guru = mysqli_query($con, $query_guru);
									if(isset($_GET['id_guru'])){
										$cari_guru = $_GET['id_guru'];
										$result_guru = hpGuru1($cari_guru);
									}
									while($row_guru=mysqli_fetch_assoc($result_guru)):
								?>
							<!-- PHP Tampil Data dan Pencarian Orangtua -->

								<div class="admin_lihat_data_ortu_lengkap1">
									<div class="admin_lihat_foto_ortu1">
										<img src="image/guru/<?php echo $row_guru['nama_foto']; ?>" />
									</div>
									<div class="admin_lihat_detail_ortu">
										<div class="admin_lihat_data_ortu_nama_dan_alamat">
											<div class="admin_lihat_data_ortu_na">
												<a href="?id_guru=<?php echo $row_guru['id_guru'];?>"><?php echo $row_guru['nama_guru'];?></a>
												<div class="clear"></div>
												<i><?php echo $row_guru['jabatan'];?></i>
											</div>
											<div class="clear"></div>
										</div>
										<div class="admin_lihat_data_ortu_kiri">
											<p>NUPTK		: <?php echo $row_guru['nuptk'];?></p>
											<p>Status Guru 		: <?php echo $row_guru['status'];?></p>
											<p>Jenis Kelamin 	: <?php echo $row_guru['jk_guru'];?></p>
										</div>
										<div class="admin_lihat_data_ortu_kanan">
											<p>No Handphone : <?php echo "+62".$row_guru['no_tel'];?></p>
											<p>Alamat	: </p>
											<p><?php echo $row_guru['alamat'];?></p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<?php endwhile; //endwhile?>
								<!-- formulir admin untuk lihat data ortu -->

								<div class="clear"></div>

								<!-- PHP Panigation Lihat Data Orang Tua -->
								<?php if(!isset($_GET['id_guru'])){?>
								<div class="panigation">
									<?php 
									$hasil_guru = mysqli_query($con, "SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru");
									$total_guru = mysqli_num_rows($hasil_guru);
									$pages_guru = ceil($total_guru/$perpage_guru);
									for($i=1; $i<=$pages_guru; $i++){?>
									<a href="?hln=<?php echo $i;?>"><?php echo $i;?></a>
									<?php } ?>
								</div>
								<?php }?>
				</div>
				<div class="peng_kanan">
					<div class="pengla">
						<img src="image/header/iklan.png"/>
					</div>
					<div class="pengla">
						<p>LAINNYA</p>
					</div>
					<?php
						$pengLainnya = pengLain2();
						while($row_pengLainnya = mysqli_fetch_assoc($pengLainnya)){
					?>
					<div class="pengla1">
						<div id="fotopenlai">
							<img src="image/guru/<?php echo $row_pengLainnya['nama_foto'];?>" />
						</div>
						<div id="pengki">
							<a href="?id_guru=<?php echo $row_pengLainnya['id_guru'];?>"><?php echo $row_pengLainnya['nama_guru'];?></a>
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