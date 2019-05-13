<!-- Kolom Header Menu -->
	<div id="admin_header">
		<div id="admin_logo">
			<?php if($hak_akses == 1){?><a href="halamanadmin.php#formulir_home">SIA SD20 LLG</a><?php } ?>
			<?php if($hak_akses == 2){?><a href="halamankepsek.php#formulir_home">SIA SD20 LLG</a><?php } ?>
			<?php if($hak_akses == 4){?><a href="halamanortu.php#formulir_home">SIA SD20 LLG</a><?php } ?>
			<?php if($hak_akses == 3){?><a href="halamanguru.php#formulir_home">SIA SD20 LLG</a><?php } ?>
		</div>
		<div id="admin_pesan">
			<?php if($hak_akses == 1){?>
			<!-- <a href="#"><span >@</span></a>
			<a href="#"><span >Z</span></a> -->
			<?php } ?>
			<div id="admin_fotodannama">
				<a href="#formulir_lihat_profil">
					<?php
					if($hak_akses != 4){
						$sesion_nama_user = $_SESSION['nama_pengguna'];
						$query_cari_foto_user = "SELECT * FROM guru, foto WHERE guru.id_guru=foto.id_guru AND nama_guru = '$sesion_nama_user'";
						$hasil_cari_foto_user = mysqli_query($con, $query_cari_foto_user);
						$id_foto_user = mysqli_fetch_assoc($hasil_cari_foto_user);
						$tampil_id_foto_user = $id_foto_user['nama_foto'];
					?>
					<img src="../../image/guru/<?php echo $tampil_id_foto_user;?>" />
					<?php }else{
						$sesion_nama_user = $_SESSION['nama_pengguna'];
						$query_cari_foto_user = "SELECT * FROM ortu, foto WHERE ortu.id_ortu=foto.id_ortu AND nama_ortu = '$sesion_nama_user'";
						$hasil_cari_foto_user = mysqli_query($con, $query_cari_foto_user);
						$id_foto_user = mysqli_fetch_assoc($hasil_cari_foto_user);
						$tampil_id_foto_user = $id_foto_user['nama_foto'];
						$user_ortu = $id_foto_user['id_ortu'];
					?>
					<img src="../../image/ortu/<?php echo $tampil_id_foto_user;?>" />
					<?php } ?>
					<p><?php echo $sesion_nama_user;?></p>
				</a>
			</div>
			<a href="../../source/php/proses_logout.php"><span>X</span></a>
		</div>
	</div>
	<div class="clear"></div>
<!-- Kolom Header Menu -->