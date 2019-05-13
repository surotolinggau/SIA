<div id="admin_menu_kiri">
	<div id="admin_gambar">
		<div id="admin_bungkus_gambar_user">
			<div id="admin_bungkus_gambar_user_foto">
				<?php if($hak_akses != 4){?>
				<img src="../../image/guru/<?php echo $tampil_id_foto_user;?>" />
				<?php }else{ ?>
				<img src="../../image/ortu/<?php echo $tampil_id_foto_user;?>" />
				<?php } ?>
				<div class="clear"></div>
			</div>
			<div id="admin_bungkus_gambar_user_detail">
					<p><?php echo $sesion_nama_user;?></p>
					<span>
					<?php if($hak_akses == 1){echo "Admin Sekolah";}
						elseif($hak_akses == 2){echo "Kepala Sekolah";}
						elseif($hak_akses == 3){echo "Guru Sekolah";}
						else{echo "Orangtua Murid";}
					?>
					</span>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div id="admin_bungkus_gambar_user1">
			<input type="search" name="admin_cari" placeholder="Search..." />
			<div class="clear"></div> 
			</div>
	</div>
	<div id="admin_gambar">
	<h4>MENU NAVIGASI</h4>
	</div>
	<div id="admin_menu_tulisan">Kelola Data SIA</div>
	<?php if($hak_akses == 1){?>
	<div id="admin_menu_bawah">
		<a href="halamanadmin.php#formulir_user" >Lihat Data User</a>
		<a href="halamanadmin.php#formulir_kedua" >Lihat Data Ortu</a>
		<a href="halamanadmin.php#formulir_murid" >Lihat Data Murid</a>
		<a href="halamanadmin.php#formulir_guru" >Lihat Data Guru</a>
		<a href="halamanadmin.php#formulir_lihat_kelas" >Lihat Data Kelas</a>
		<a href="halamanadmin.php#formulir_lihat_nilai" >Lihat Data Nilai</a>
		<a href="halamanadmin.php#formulir_kehadiran" >Data Kehadiran</a>
		<a href="halamanadmin.php#formulir_lihat_mp" >Lihat Mata Pelajaran</a>
		<a href="halamanadmin.php#formulir_lihat_pengumuman" >Lihat Pengumuman</a>
		<a href="halamanadmin.php#formulir_kontak" >Lihat Grup Kontak</a>
		<a href="halamanadmin.php?ids=1#formulir_ortu_saran_masuk" >Lihat Kritik/Saran</a>
		<!-- 
		<a href="#formulir_user" >Lihat Data User</a>
		<a href="#formulir_kedua" >Lihat Data Ortu</a>
		<a href="halamanadmin.php#formulir_murid" >Lihat Data Murid</a>
		<a href="../../source/php/template/lontar_guru.php" >Lihat Guru</a>
		<a href="../../source/php/template/lontar_peng.php" >Lihat Pengumuman</a>
		<a href="halamanadmin.php#formulir_kontak" >Lihat Kontak</a>
		<a href="../../source/php/template/lontar_kelas.php" >Lihat Kelas</a>
		<a href="#formulir_lihat_mp" >Lihat Mata Pelajaran</a> -->
	</div>
	<?php } //Endwhile Menu Kiri Admin?>
	<?php if($hak_akses == 2){?>
	<div id="admin_menu_bawah">
		<a href="halamankepsek.php#formulir_kedua" >Laporan Data Ortu</a>
		<a href="halamankepsek.php#formulir_murid" >Laporan Data Murid</a>
		<a href="halamankepsek.php#formulir_guru" >Laporan Data Guru</a>
		<a href="halamankepsek.php#formulir_lihat_kelas" >Laporan Data Kelas</a>
		<a href="halamankepsek.php#formulir_lihat_nilai" >Laporan Nilai</a>
		<a href="halamankepsek.php#formulir_tmp" >Laporan Kehadiran</a>
		<a href="halamankepsek.php#formulir_lihat_mp" >Laporan Mata Pelajaran</a>
		<a href="halamankepsek.php#formulir_lihat_pengumuman" >Lihat Pengumuman</a>
		<a href="halamankepsek.php?ids=1#formulir_ortu_saran_masuk" >Lihat Kritik/Saran</a>
		
	</div>
	<?php } //Endwhile Menu Kiri Kepsek?>
	<?php if($hak_akses == 3){?>
	<div id="admin_menu_bawah_guru">
		<a href="halamanguru.php#formulir_guru_lihat_kelas" >Lihat Kelas</a>
		<a href="halamanguru.php#formulir_guru_lihat_nilai" >Lihat Nilai</a>
		<a href="halamanguru.php#formulir_guru_lihat_jadwal" >Lihat Jadwal</a>
		<a href="halamanguru.php#formulir_guru_lihat_pengumuman" >Lihat Pengumuman</a>
		<a href="halamanguru.php?ids=1#formulir_ortu_saran_masuk" >Lihat Kritik/Saran</a>
	</div>
	<?php } //Endwhile Menu Kiri Guru?>
	<?php if($hak_akses == 4){?>
	<div id="admin_menu_bawah_guru">
		<a href="halamanortu.php#formulir_lihat_profil" >Lihat Profil</a>
		<a href="halamanortu.php#formulir_murid" >Lihat Data Anak</a>
		<a href="halamanortu.php#formulir_murid_jadwal" >Lihat Jadwal Anak</a>
		<a href="halamanortu.php#formulir_lihat_nilai_anak" >Data Akademik Anak</a>
		<a href="halamanortu.php#formulir_guru_lihat_pengumuman" >Lihat Pengumuman</a>
		<a href="halamanortu.php?ids=1#formulir_ortu_saran_masuk" >Kirim Kritik/Saran</a>
	</div>
	<?php } //Endwhile Menu Kiri Guru?>
	<div id="admin_menu_tulisan">Kelola Data SIA</div>
	<!-- <div id="admin_menu_bawah1">
		<a href="#formulir_pengumuman" >Input Pengumuman</a>						
	</div>
	<a href="">Create by @Surototeak</a>
	<div class="clear"></div> -->
</div>