<?php if(isset($_GET['id_jadwal'])){ ?>
	<div id="formulir_edit_jadwal" class="admin_formulir_muncul">
		<div id="admin_formulir">
			<h2>Edit Jadwal</h2>

			<!-- Update JADWAL -->
				<?php 
					$tam_edjad = tampilEditjadwal($_GET['id_jadwal']);
					$row_edjad = mysqli_fetch_assoc($tam_edjad);
					$edjammas = $row_edjad['jam_masuk'];
					$edjamsel = $row_edjad['jam_selesai'];
					$edjammas = substr($edjammas, 0, -3);
					$edjamsel = substr($edjamsel, 0, -3);
					$edit_id_kelas = $row_edjad['id_kls'];
					$hasil_editkelas_jadwal = tampilJadwalk($edit_id_kelas);
					$row_editkelas_jadwal = mysqli_fetch_assoc($hasil_editkelas_jadwal);
					$hasil_edit_tampilguru = tampilJadwalg();
					$tampilmp_editjadwal = tampilJadwalmp();
				?>
			<!-- Update JADWAL -->
			<div class="clear"></div>
			<p id="admin_penjelasan">Edit Jadwal Kelas Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
			<form action="../../source/php/update_data_jadwal.php" method="POST" enctype="multipart/form-data">
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Kelas</label>
						<p>Nama Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="hidden" name="edit_id_jadwal" value="<?php echo $_GET['id_jadwal'];?>">
						<input type="hidden" name="edit_id_kelas" value="<?php echo $edit_id_kelas;?>">
						<input type="text" value="<?php echo $row_editkelas_jadwal['nama_kelas'].'/'.$row_editkelas_jadwal['ruang_kelas'];?>" readonly>		
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Tahun Ajaran</label>
						<p>Tahun Ajaran Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" value="<?php echo $row_editkelas_jadwal['tahun_ajaran'];?>" readonly>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Guru</label>
						<p>Nama Guru</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="edit_jadwal_nama_guru" required>
						    <option  id="opsel" value="" disabled selected>Pilih Guru</option>
						    <?php while($row_tampilguruedit=mysqli_fetch_assoc($hasil_edit_tampilguru)){?>
						    <option value="<?php echo $row_tampilguruedit['id_guru'];?>" <?php if ($row_tampilguruedit['id_guru'] == $row_edjad['id_guru_mp'] ){echo 'selected';} ?>><?php echo $row_tampilguruedit['nama_guru'];?></option>
						    <?php } ?>
					  	</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Mata Pelajaran</label>
						<p>Nama Mata Pelajaran</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="edit_jadwal_mata_pelajaran" required>
						    <option  id="opsel" value="" disabled selected>Pilih Mata Pelajaran</option>
						    <?php while($rowmp_editjadwal=mysqli_fetch_assoc($tampilmp_editjadwal)){ ?>
						    <option value="<?php echo $rowmp_editjadwal['id_mp'];?>" <?php if ($rowmp_editjadwal['id_mp'] == $row_edjad['id_mp'] ){echo 'selected';} ?>><?php echo $rowmp_editjadwal['nama_mp'];?></option>
						    <?php } ?>
					  	</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Hari</label>
						<p>Nama Hari Jadwal</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="edit_jadwal_hari" required>
						    <option  id="opsel" value="" disabled selected>Pilih Hari</option>
						    <option  value="1Senin" <?php if ($row_edjad['hari'] == '1Senin'){echo 'selected';} ?>>Senin</option>
						    <option  value="2Selasa" <?php if ($row_edjad['hari'] == '2Selasa'){echo 'selected';} ?>>Selasa</option>
						    <option  value="3Rabu" <?php if ($row_edjad['hari'] == '3Rabu'){echo 'selected';} ?>>Rabu</option>
						    <option  value="4Kamis" <?php if ($row_edjad['hari'] == '4Kamis'){echo 'selected';} ?>>Kamis</option>
						    <option  value="5Jumat" <?php if ($row_edjad['hari'] == '5Jumat'){echo 'selected';} ?>>Jumat</option>
						    <option  value="6Sabtu" <?php if ($row_edjad['hari'] == '6Sabtu'){echo 'selected';} ?>>Sabtu</option>
					  	</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam1">
					<div class="admin_formulir_kiri2">
						<label for="jm">Jam Mulai</label>
						<p>Jam Mulai Pelajaran</p>
					</div>
					<div class="admin_formulir_kanan2">
						<input type="time" name="edit_jadwal_jam_mulai" value="<?php echo $edjammas;?>">							
					</div>
					<div class="admin_formulir_kiri2">
						<label for="jm">Jam Selesai</label>
						<p>Jam Selesai Pelajaran</p>
					</div>
					<div class="admin_formulir_kanan2">
						<input type="time" name="edit_jadwal_jam_selesai" value="<?php echo $edjamsel;?>">							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<input type="submit" id="kirim_data_ortu" name="simpan_edit_jadwal" value="Edit Data">
			</form>
			<!-- Edit Form Jadwal-->

		</div>
	</div>
<?php } //endwhile formulir Edit jadwal ?>