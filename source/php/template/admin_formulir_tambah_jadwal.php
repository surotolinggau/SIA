<?php if(isset($_GET['id_klas'])){ ?>
	<div id="formulir_tambah_jadwal" class="admin_formulir_muncul">
		<div id="admin_formulir">
			<h2>Tambah Jadwal</h2>

			<!-- CRUD JADWAL -->
				<?php require_once('../../source/php/crud_jadwal.php');?>
			<!-- CRUD JADWAL -->

			<div class="error">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<div class="clear"></div>
			<p id="admin_penjelasan">Tambah jadwal Kelas Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Kelas</label>
						<p>Nama Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="hidden" name="jadwal_nama_kelas" value="<?php echo $row_jadkel['id_kelas'];?>">
						<input type="text" value="<?php echo $row_jadkel['nama_kelas'].'/'.$row_jadkel['ruang_kelas'];?>" readonly>		
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
						<input type="text" value="<?php echo $row_jadkel['tahun_ajaran'];?>" readonly>							
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
						<select name="jadwal_nama_guru" required>
						    <option  id="opsel" value="" disabled selected>Pilih Guru</option>
						    <?php while($row_jadgur=mysqli_fetch_assoc($tam_jadg)){ ?>
						    <option value="<?php echo $row_jadgur['id_guru'];?>"><?php echo $row_jadgur['nama_guru'];?></option>
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
						<select name="jadwal_mata_pelajaran" required>
						    <option  id="opsel" value="" disabled selected>Pilih Mata Pelajaran</option>
						    <?php while($row_jadmp=mysqli_fetch_assoc($tam_jadmp)){ ?>
						    <option value="<?php echo $row_jadmp['id_mp'];?>"><?php echo $row_jadmp['nama_mp'];?></option>
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
						<select name="jadwal_hari" required>
						    <option  id="opsel" value="" disabled selected>Pilih Hari</option>
						    <option  value="1Senin" >Senin</option>
						    <option  value="2Selasa">Selasa</option>
						    <option  value="3Rabu" >Rabu</option>
						    <option  value="4Kamis" >Kamis</option>
						    <option  value="5Jumat" >Jumat</option>
						    <option  value="6Sabtu" >Sabtu</option>
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
						<input type="time" name="jadwal_jam_mulai">							
					</div>
					<div class="admin_formulir_kiri2">
						<label for="jm">Jam Selesai</label>
						<p>Jam Selesai Pelajaran</p>
					</div>
					<div class="admin_formulir_kanan2">
						<input type="time" name="jadwal_jam_selesai">							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<input type="submit" id="kirim_data_ortu" name="simpan_jadwal" value="Tambah Data">
			</form>
			<!-- Form Input Data Ortu-->

		</div>
	</div>
<?php } //endwhile formulir tambah jadwal ?>