	<div id="formulir_tmp" class="admin_formulir_muncul">
		<div id="admin_formulir3">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Lihat Laporan Kehadiran</h2>
			</div>
			<div class="clear"></div>
			<div class="error1">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<p id="deail_kelas"> Lihat Laporan Kehadiran Murid Pada Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_mp">
				<form action="halamankepsek.php#formulir_kepsek_lihat_kehadiran" method="GET" enctype="multipart/form-data">
				<?php
					$queryKelaske_kepsek = "SELECT DISTINCT nama_kelas FROM kelas";
					$sqlKelaske_kepsek = mysqli_query($con, $queryKelaske_kepsek);
					$queryKelaske_kepsek1 = "SELECT DISTINCT ruang_kelas FROM kelas";
					$sqlKelaske_kepsek1 = mysqli_query($con, $queryKelaske_kepsek1);
					$queryKelaske_kepsek2 = "SELECT DISTINCT tahun_ajaran FROM kelas";
					$sqlKelaske_kepsek2 = mysqli_query($con, $queryKelaske_kepsek2);
					$queryKelaske_kepsek3 = "SELECT DISTINCT tahun FROM kehadiran";
					$sqlKelaske_kepsek3 = mysqli_query($con, $queryKelaske_kepsek3);
				?>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Kelas</label>
						<p>Nama Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="kepsekhadirNamakelas" required>
							<option  id="opsel" value="" disabled  selected>Pilih Kelas</option>
							<?php while($tamKehadirankelas = mysqli_fetch_assoc($sqlKelaske_kepsek)){?>
							<option  value="<?php echo $tamKehadirankelas['nama_kelas'];?>"><?php echo $tamKehadirankelas['nama_kelas'];?></option>
							<?php } ?>
						</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Ruang</label>
						<p>Ruang Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="kepsekhadirRuangkelas" required >
							<option  id="opsel" value="" disabled  selected>Pilih Ruangan</option>
							<?php while($tamKehadiranruang = mysqli_fetch_assoc($sqlKelaske_kepsek1)){?>
							<option  value="<?php echo $tamKehadiranruang['ruang_kelas'];?>"><?php echo $tamKehadiranruang['ruang_kelas']?></option>
							<?php } ?>
						</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Tahun Ajaran</label>
						<p>Tahun Ajaran Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="kepsekhadirTahunajar" required >
							<option  id="opsel" value="" disabled  selected>Pilih Tahun Ajaran</option>
							<?php while($tamKehadirantahajr = mysqli_fetch_assoc($sqlKelaske_kepsek2)){?>
							<option  value="<?php echo $tamKehadirantahajr['tahun_ajaran'];?>"><?php echo $tamKehadirantahajr['tahun_ajaran'];?></option>
							<?php } ?>
						</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Bulan</label>
						<p>Bulan Kehadiran Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="kepsekhadirBulan" required>
							<option  id="opsel" value="" disabled  selected>Pilih Bulan Kehadiran</option>
							<option  value="01"> Januari</option>
							<option  value="02"> Februaari</option>
							<option  value="03"> Maret</option>
							<option  value="04">April</option>
							<option  value="05">Mei</option>
							<option  value="06">Juni</option>
							<option  value="07">Juli</option>
							<option  value="08">Agustus</option>
							<option  value="09">September</option>
							<option  value="10">Oktober</option>
							<option  value="11">November</option>
							<option  value="12">Desember</option>
						</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Tahun</label>
						<p>Tahun Kehadiran Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="kepsekhadirTahun" >
							<option  id="opsel" value="" disabled  selected>Pilih Tahun Kehadiran</option>
							<?php while($tamKehadirantahadir = mysqli_fetch_assoc($sqlKelaske_kepsek3)){?>
							<option  value="<?php echo $tamKehadirantahadir['tahun'];?>"><?php echo $tamKehadirantahadir['tahun'];?></option>
							<?php } ?>
						</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<input type="submit" id="kdk" name="kepsek_lihat_kehadiran" value="Lihat Kehadiran">
			</form>
			</div>

		</div>
		<div class="clear"></div>
	</div>