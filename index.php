<!DOCTYPE html>
<html>
	<head>
		<title>Sistem Informasi Akademik SD_20_LLG</title>
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<script type="text/javascript" src="source/jquery/jquery2.1.3.js"></script>
	<link rel="stylesheet" type="text/css" href="source/css/style.css" />
	<body>
		<div id="menu_fix">
			<div id="logo_sekolah">
				<a href="">
					<img src="image/header/logo_sekolah3.png">
					<p id="logo_tulisan">Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				</a>
			</div>
			<!-- Membuat Menu Navigasi -->
			<div id="menu">
				<a href="#pertama" class="kolom"> <p class="sa1">Pengumuman</p></a>
				<a href="#kedua" class="kolom kolom_tengah"> <p class="sa2">History</p></a>
				<a href="#ketiga" class="kolom kolom_tengah"> <p class="sa3">Guru</p></a>
				<a href="#keempat" class="kolom kolom_tengah"> <p class="sa4">Murid</p></a>
				<a href="#kelima" class="kolom"> <p class="sa5">Kontak</p></a>
				<a href="login/" class="kolom"> <p class="sa5">Login</p></a>
			</div>
		</div>
		<!-- Membuat Kolom Pengumuman SDN 20 Kota Lubuklinggau-->
		<div id="pertama">
			<div id="header">
			<!-- Membuat Logo Sistem Informasi Akademik SDN 20 Kota Lubuklinggau-->
				<div class="clear"></div>
				<!-- Membuat Slider Sistem Informasi Akademik SDN 20 Kota Lubuklinggau-->
				<div id="slider">
					<div id="bungkus_slider">
					<?php
						require_once('source/php/db.php');
						require_once('source/php/fungsi.php');
						$query= "SELECT * FROM pengumuman, foto WHERE pengumuman.id_pengumuman=foto.id_pengumuman ORDER BY tgl_pengumuman, jam_pengumuman DESC LIMIT 4";
						$sqlquery = mysqli_query($con, $query);
						while($row_peng = mysqli_fetch_assoc($sqlquery)){
							$isipengumuman	= $row_peng['isi_pengumuman'];
							$isipengumuman	= substr($isipengumuman, 0, 430);
					?>
						<div class="slider_gmbr">
							<img src="image/pengumuman/<?php echo $row_peng['nama_foto'];?>" alt="Gambar Slider Pertama" />
							<a href="pengumuman.php?id_pengumuman=<?php echo $row_peng['id_pengumuman'];?>" class="judul_index"><?php echo $row_peng['judul_pengumuman'];?></a>
							<p><?php echo $isipengumuman.' ......';?>
							</p>
							<span><a class="index_selengkapnya" href="pengumuman_lengkap.php">Selengkapnya</a></span>
						</div>
						
						<?php } 
							$querya= "SELECT * FROM pengumuman, foto WHERE pengumuman.id_pengumuman=foto.id_pengumuman ORDER BY tgl_pengumuman, jam_pengumuman DESC LIMIT 1";
							$sqlquerya = mysqli_query($con, $querya);
							while($row_penga = mysqli_fetch_assoc($sqlquerya)){
								$isipengumumana	= $row_penga['isi_pengumuman'];
								$isipengumumana	= substr($isipengumumana, 0, 430);
						?>
						<div class="slider_gmbr">
							<img src="image/pengumuman/<?php echo $row_penga['nama_foto'];?>" alt="Gambar Slider Pertama" />
							<a href="pengumuman.php?id_pengumuman=<?php echo $row_penga['id_pengumuman'];?>" class="judul_index"><?php echo $row_penga['judul_pengumuman'];?></a>
							<p><?php echo $isipengumumana.' ......';?>
							</p>
							<span><a class="index_selengkapnya" href="pengumuman_lengkap.php">Selengkapnya</a></span>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<!--Bagian Keedua Tentang Visi dan Misi Sekolah Dasar Negeri 20 Kota Lubuklinggau  -->
		<div id="kedua">
			<div id="visimisi">
			<p id="vnd">VISI DAN MISI</p>
				<div class="isivm">
					<!-- Kotak Gambar Pada Kolom Visi Dan Misi -->
					<div class="gambar">
						<img src="image/pengumuman/1.jpg" alt="Gambar Visi" />
					</div>
					<!-- Kotak Tulisan Pada Kolom Visi Dan Misi -->
					<div class="tulisan">
						<h3> VISI</h3>
						<hr/>
						<p class="ivm">
							<i>"Menghasilkan lulusan yang cerdas, trampil dan taqwa"</i>
						</p>
					</div>
				</div>
				<div class="clear"></div>
				<div class="isivm">
					<div class="tulisan">
						<h3> MISI</h3>
						<hr/>
						<p class="ivm">
							- Melatih kecerdasan siswa sehingga mampu mengembangkan potensi diri.<br/>- Memiliki keterampilan yang - berorientasi kecakapan hidup (LIVE SKILL) sesuai dengan kemampuan dan budayanya.</br>- Mendidik siswa menjadi anak sehat jasmani dan rohani, berbudi pekerti luhur, beriman dan bertaqwa pada Tuhan Yang Maha Esa.
						</p>
					</div>	
					<div class="gambar">
						<img src="image/pengumuman/2.jpg" alt="Gambar Visi" />
					</div>
					<hr id="space">
					<a id="history" href="history.php">History</a>	
					<hr id="space1">
				</div>			
			</div>
		</div>
		<div class="clear"></div>
		<!-- membuat Kolom Guru -->
		<div id="ketiga">
			<div class="guru">
			<p id="daftar_guru">Guru</p>
				<div class="kotak_guru">
					<?php 
						$queriguru = "SELECT * FROM guru, foto WHERE guru.id_guru=foto.id_guru ORDER BY RAND() LIMIT 1";
						$sqlqueryguru = mysqli_query($con, $queriguru);
						$row_guru1 = mysqli_fetch_assoc($sqlqueryguru);
						$row_id_guru1 = $row_guru1['id_guru'];
					?>
					<div class="foto_guru">
						<a href="guru.php?id_guru=<?php echo $row_guru1['id_guru'];?>">
						<img src="image/guru/<?php echo $row_guru1['nama_foto'];?>" alt="Foto Guru">
						</a>
					</div>
					<div class="bungkus_segitiga s">
					<div class="st segitiga"></div>
					</div>
					<div class="detail_guru">
						<a href="guru.php?id_guru=<?php echo $row_guru1['id_guru'];?>"><?php echo $row_guru1['nama_guru'];?></a>
						<p>NUPTK : <?php echo $row_guru1['nuptk'];?></p>
						<p>No. Telp : <?php echo $row_guru1['no_tel'];?></p>
						<p>Alamat : <?php echo $row_guru1['alamat'];?></p>
					</div>
				</div>
				<div class="kotak_guru tengah">
					<?php 
						$queriguru2 = "SELECT * FROM guru, foto WHERE guru.id_guru=foto.id_guru AND guru.id_guru NOT IN ($row_id_guru1) ORDER BY RAND() LIMIT 1";
						$sqlqueryguru2 = mysqli_query($con, $queriguru2);
						$row_guru2 = mysqli_fetch_assoc($sqlqueryguru2);
						$row_id_guru2 = $row_guru2['id_guru'];
					?>
					<div class="detail_guru">
						<a href="guru.php?id_guru=<?php echo $row_guru2['id_guru'];?>"><?php echo $row_guru2['nama_guru'];?></a>
						<p>NUPTK : <?php echo $row_guru2['nuptk'];?></p>
						<p>No. Telp : <?php echo $row_guru2['no_tel'];?></p>
						<p>Alamat : <?php echo $row_guru2['alamat'];?></p>
					</div>
					<div class="bungkus_segitiga">
					<div class="st segitigat"></div>
					</div>
					<div class="foto_guru">
						<a href="guru.php?id_guru=<?php echo $row_guru2['id_guru'];?>">
						<img src="image/guru/<?php echo $row_guru2['nama_foto'];?>" alt="Foto Guru">
						</a>
					</div>
				</div>
				<div class="kotak_guru">
					<?php 
						$queriguru3 = "SELECT * FROM guru, foto WHERE guru.id_guru=foto.id_guru AND guru.id_guru NOT IN ($row_id_guru1, $row_id_guru2) ORDER BY RAND()";
						$sqlqueryguru3 = mysqli_query($con, $queriguru3);
						$row_guru3 = mysqli_fetch_assoc($sqlqueryguru3);
						$row_id_guru3 = $row_guru3['id_guru'];
					?>
					<div class="foto_guru">
						<a href="guru.php?id_guru=<?php echo $row_guru3['id_guru'];?>">
						<img src="image/guru/<?php echo $row_guru3['nama_foto'];?>" alt="Foto Guru">
						</a>
					</div>
					<div class="bungkus_segitiga s">
					<div class="st segitiga"></div>
					</div>
					<div class="detail_guru">
						<a href="guru.php?id_guru=<?php echo $row_guru3['id_guru'];?>"><?php echo $row_guru3['nama_guru'];?></a>
						<p>NUPTK : <?php echo $row_guru3['nuptk'];?></p>
						<p>No. Telp : <?php echo $row_guru3['no_tel'];?></p>
						<p>Alamat : <?php echo $row_guru3['alamat'];?></p>
					</div>
				</div>	
			</div>
			<div class="clear"></div>
			<div id="tombol_guru">
			<a href="guru.php">Daftar Guru</a>
			</div>
		</div>
		<div class="clear"></div>
		<!--  Membuat Kolom Murid-->
		<div id="keempat">
			<div class="murid">
			<p id="siswa">Murid</p>
			<?php
				$querymurid = "SELECT * FROM foto, murid WHERE foto.id_murid=murid.id_murid ORDER BY RAND() LIMIT 5";
				$sqlmurid = mysqli_query($con, $querymurid);
				while($row_murid = mysqli_fetch_assoc($sqlmurid)){
			?>
			<div class="bungkus_murid">
				<div class="foto_murid">
					<a href="murid.php?id_murid=<?php echo $row_murid['id_murid'];?>">
					<img src="image/murid/<?php echo $row_murid['nama_foto'];?>" alt="Foto Murid" />
					</a>
				</div>
				<div class="detail_murid">
					<p class="nama_murid"><?php echo $row_murid['NIM'];?></p>
					<p class="penjelasan_murid"><?php echo $row_murid['nama_murid'];?></p>
					<p class="penjelasan_murid"><?php echo $row_murid['tempat_lahir'];?></p>
					<p class="penjelasan_murid"><?php $tgl = $row_murid['tanggal_lahir']; echo tanggalIndonesia($tgl); ?></p>
				</div>
			</div>
			<?php } ?>
			
			<div class="clear"></div>
				<div id="tombol_murid">
				<a href="murid.php">Daftar Murid</a>
				</div>
			</div>
		</div>
		<div id="kelima">
			<div class="murid">
			<p id="kontak">Kontak</p>
				<div class="grid_2">
					<form action="#">
						<input type="text" name="nama" placeholder="Nama" />
						<input type="email" name="email" placeholder="Email" />
						<textarea name="pesan" rows="8" cols="40" placeholder="Pesan"></textarea>
						<input type="submit" name="submit" value="Kirim" />
					</form>
				</div>
				<div class="grid_2">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6698.955146234986!2d102.86481013514107!
					3d-3.2949839397932945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e30e25ac964e19b%3A0x3039d80b220cc30!
					2sLubuklinggau%2C+Kota+Lubuklinggau%2C+Sumatera+Selatan!5e0!3m2!1sid!2sid!4v1449480234664" width="600" height="250" 
					frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div id="footer">
		<p>&copy Surototeak 2015</p>
	</div>
	<script type="text/javascript" src="source/jquery/scroll_fix.js"></script>
	</body>
</html>