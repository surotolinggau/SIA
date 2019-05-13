<div id="formulir_ortu_saran_keluar" class="admin_formulir_muncul1">
	<div id="guru_formulir_lihat_kelas">
		<div class="error tngah">
			<div class="isi_error <?php echo $error2;?>">
				<p><?php echo $error1;?></p>
				<h3><?php echo $error;?></h3>
			</div>
		</div>
		<div class="info_kelas">
			<h2 id="judul_tambah_kelas">Kritik dan Saran Yang Disampaikan</h2>
		</div>
		<div class="bungkus_title">
			<p id="detail_masukan">Formulir Daftar Kritik dan Saran Yang disampaikan</p>
		</div>
			<div class="bungkus_tombol">
				<?php if($hak_akses == 4){?>
				<a href="halamanortu.php?ids=1#formulir_ortu_saran_masuk" id="tombol_masukan">Kritik dan Saran Masuk</a>
				<a href="halamanortu.php?ids=2#formulir_ortu_saran_keluar" id="tombol_masukan">Kritik dan Saran Keluar</a>
				<a href="halamanortu.php#formulir_ortu_kirim" id="kirim_masukan">Kirim Kritik dan Saran</a>
				<?php } ?>
				<?php if($hak_akses == 3){?>
				<a href="halamanguru.php?ids=1#formulir_ortu_saran_masuk" id="tombol_masukan">Kritik dan Saran Masuk</a>
				<a href="halamanguru.php?ids=2#formulir_ortu_saran_keluar" id="tombol_masukan">Kritik dan Saran Keluar</a>
				<a href="halamanguru.php#formulir_ortu_kirim" id="kirim_masukan">Kirim Kritik dan Saran</a>
				<?php } ?>
				<?php if($hak_akses == 2){?>
				<a href="halamankepsek.php?ids=1#formulir_ortu_saran_masuk" id="tombol_masukan">Kritik dan Saran Masuk</a>
				<a href="halamankepsek.php?ids=2#formulir_ortu_saran_keluar" id="tombol_masukan">Kritik dan Saran Keluar</a>
				<a href="halamankepsek.php#formulir_ortu_kirim" id="kirim_masukan">Kirim Kritik dan Saran</a>
				<?php } ?>
				<?php if($hak_akses == 1){?>
				<a href="halamanadmin.php?ids=1#formulir_ortu_saran_masuk" id="tombol_masukan">Kritik dan Saran Masuk</a>
				<a href="halamanadmin.php?ids=2#formulir_ortu_saran_keluar" id="tombol_masukan">Kritik dan Saran Keluar</a>
				<a href="halamanadmin.php#formulir_ortu_kirim" id="kirim_masukan">Kirim Kritik dan Saran</a>
				<?php } ?>
			</div>
			<div class="bungkus_kelas">
				<table id="tabel_masukan">
					<tr>
						<th>NO</th>
						<th>Kategori</th>
						<th>Kepada</th>
						<th>Tgl</th>
						<th>Isi</th>
						<th>Ket</th>
						<th>Tanggapan</th>
					</tr>
					<?php 
						$querysaranmasuk = "SELECT * FROM masukan WHERE pengirim ='$nama_pengguna' ORDER BY tanggal_masukan, jam_masukan DESC";
						$sqlisaranmasuk = mysqli_query($con, $querysaranmasuk);
						$no_masukan = 0;
						if(mysqli_num_rows($sqlisaranmasuk) < 1){?>
						<tr>
							<td colspan="7" id="kosong_saran">Krikik dan Saran Yang Disampaikan Kosong</td>
						</tr>
						<?php }else{
						while($tampilsaranmasuk = mysqli_fetch_assoc($sqlisaranmasuk)){
							$no_masukan++
					?>
					<tr>
						<td ><?php echo $no_masukan;?></td>
						<td><?php echo $tampilsaranmasuk['kategori_masukan'];?></td>
						<td><?php echo $tampilsaranmasuk['kepada'];?></td>
						<td><?php echo $tampilsaranmasuk['tanggal_masukan'];?></td>
						<td><?php echo $tampilsaranmasuk['isi_masukan'];?></td>
						<td><?php echo $tampilsaranmasuk['keterangan_masukan'];?></td>
						<td><?php echo $tampilsaranmasuk['tanggapan'];?></td>
					</tr>
					<?php } } ?>
				</table>
			</div>
	</div>
</div>