	<div id="formulir_cari_kelas_guru" class="admin_formulir_muncul">
		<div id="admin_formulir3">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Masukan Data Kelas</h2>
				<?php
					if(isset($_POST['cari_kelas_guru'])){
						$nama_kelas_guru = $_POST['nama_kelas_guru'];
						$ruang_kelas_guru = $_POST['ruang_kelas_guru'];
						$semester_nilai = $_POST['semester_input_nilai'];
						$tahuan_ajaran_kelas_guru = $_POST['tahuan_ajaran_kelas_guru'];
						$id_mata_pelajaran_guru = $_POST['mata_pelajaran_guru'];
						$query_pilih_id_kelas = "SELECT * FROM kelas WHERE nama_kelas ='$nama_kelas_guru' AND ruang_kelas='$ruang_kelas_guru' AND tahun_ajaran='$tahuan_ajaran_kelas_guru'";
						$hasil_pilih_id_kelas = mysqli_query($con, $query_pilih_id_kelas);
						$row_hasil_pilih_id_kelas = mysqli_fetch_assoc($hasil_pilih_id_kelas);
							$idkgu = $row_hasil_pilih_id_kelas['id_kelas'];
							header("location: ../../login/admin/halamanguru.php?id_klsgu=$idkgu&nmp=$id_mata_pelajaran_guru&ids=$semester_nilai#formulir_gen");
						
					}
				?>
			</div>
			<div class="clear"></div>
			<p id="deail_kelas">Masukan Data Kelas Untuk Entri Nilai</p>
				<div class="bungkus_mp">
				<form action="" method="POST" >
					<div class="admin_formulir_dalam1">
						<div class="admin_formulir_kiri2">
							<label for="jm">Kelas</label>
							<p>Nama Kelas</p>
						</div>
						<div class="admin_formulir_kanan2">
							<select name="nama_kelas_guru" required>
							<option  id="opsel" value="" disabled selected>Pilih</option>
							<?php
								$hatanakegu = tamNaKegu($user_guru);
								while($row_hatanakegu = mysqli_fetch_assoc($hatanakegu)){
							?>
							    
							    <option  value="<?php echo $row_hatanakegu['nama_kelas'];?>" ><?php echo $row_hatanakegu['nama_kelas'];?></option>
						  	<?php } ?>
						  	</select>								
						</div>
						<div class="admin_formulir_kiri2">
							<label for="jm">Ruangan</label>
							<p>Ruangan Kelas</p>
						</div>
						<div class="admin_formulir_kanan2">
							<select name="ruang_kelas_guru" required>
							    <option  id="opsel" value="" disabled selected>Pilih</option>
							    <?php
									$hatarukegu = tamRuKegu($user_guru);
									while($row_hatarukegu = mysqli_fetch_assoc($hatarukegu)){
								?>
							    <option  value="<?php echo $row_hatarukegu['ruang_kelas'];?>" ><?php echo $row_hatarukegu['ruang_kelas'];?></option>
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
							<select name="tahuan_ajaran_kelas_guru" required>
							    <option  id="opsel" value="" disabled selected>Pilih Tahun Ajaran</option>
							     <?php
									$hatatagu = tamTagu($user_guru);
									while($row_hatatagu = mysqli_fetch_assoc($hatatagu)){
								?>
							    <option  value="<?php echo $row_hatatagu['tahun_ajaran'];?>" ><?php echo $row_hatatagu['tahun_ajaran'];?></option>
							    <?php } ?>
						  	</select>
						</div>
						<div class="clear"></div>
						<hr>
					</div>
					<div class="admin_formulir_dalam">
						<div class="admin_formulir_kiri">
							<label for="pekerjaan_ortu">Mata Pelajaran</label>
							<p>Mata Pelajaran Guru</p>
						</div>
						<div class="admin_formulir_kanan">
							<select name="mata_pelajaran_guru" required>
							    <option  id="opsel" value="" disabled selected>Pilih Mata Pelajaran</option>
							    <?php
									$hatagu = tamNampgu($user_guru);
									while($row_hatagu = mysqli_fetch_assoc($hatagu)){
								?>
							    <option  value="<?php echo $row_hatagu['nama_mp']?>" ><?php echo $row_hatagu['nama_mp']?></option>
							    <?php } ?>
						  	</select>
						</div>
						<div class="clear"></div>
						<hr>
					</div>
					<div class="admin_formulir_dalam">
						<div class="admin_formulir_kiri">
							<label for="pekerjaan_ortu">Semester</label>
							<p>Semester Kelas</p>
						</div>
						<div class="admin_formulir_kanan">
							<select name="semester_input_nilai" required>
							    <option  id="opsel" value="" disabled selected>Pilih Semester</option>
							    <option  value="1" >1 -> Ganjil</option>
							    <option  value="2" >2 -> Genap</option>
						  	</select>
						</div>
						<div class="clear"></div>
						<hr>
					</div>
					<input type="submit" id="kdk" name="cari_kelas_guru" value="Cari Kelas">
				</form>
			</div>

		</div>
		<div class="clear"></div>
	</div>