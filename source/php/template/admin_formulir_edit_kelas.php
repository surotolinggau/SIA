
<?php if(isset($_GET['id_kls'])){?>
	<div id="formulir_edit_kelas" class="admin_formulir_muncul">
		<div id="admin_formulir2">
			<div class="info_ortu_mrd">
				<h2 id="judul_tambah_kelas">Edit Data Kelas</h2>

				<!-- kertas formulir admin untuk tambah Pengumuman -->
					<?php require_once('../../source/php/update_data_kelas.php');?>
				<!-- kertas formulir admin untuk tambah Pengumuman -->

			</div>
			<div class="clear"></div>
			<?php
				$edit_kelas = editKelas($_GET['id_kls']);
				while($rows_kls=mysqli_fetch_assoc($edit_kelas)){
			?>
			<div class="error1">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<div class="clear"></div>
			<form action="" method="POST">
				<div class="admin_formulir_dalam">
					<div class="input_kelas">
					<input type="hidden" name="edit_id_kelas" value="<?php echo $rows_kls['id_kelas'];?>">
						<select name="edit_nama_kelas" required>
							<option  id="opsel" value="" disabled  selected>Pilih Kelas</option>
						    <option value="I" <?php if ($rows_kls['nama_kelas'] == 'I' ){echo 'selected';} ?>>I (SATU) </option>
						    <option value="II" <?php if ($rows_kls['nama_kelas'] == 'II' ){echo 'selected';} ?>>II (DUA)</option>
						    <option value="III" <?php if ($rows_kls['nama_kelas'] == 'III' ){echo 'selected';} ?>>III (TIGA)</option>
						    <option value="IV" <?php if ($rows_kls['nama_kelas'] == 'IV' ){echo 'selected';} ?>>IV (EMPAT)</option>
						    <option value="V" <?php if ($rows_kls['nama_kelas'] == 'V' ){echo 'selected';} ?>>V (LIMA)</option>
						    <option value="VI" <?php if ($rows_kls['nama_kelas'] == 'VI' ){echo 'selected';} ?>>VI (ENAM)</option>
					  	</select>						
					</div>
					<div class="input_ruang">
						<select name="edit_ruang_kelas" required>
						    <option  id="opsel" value="" disabled selected>Ruang</option>
						    <option value="A" <?php if ($rows_kls['ruang_kelas'] == 'A' ){echo 'selected';} ?>>A</option>
						    <option value="B" <?php if ($rows_kls['ruang_kelas'] == 'B' ){echo 'selected';} ?>>B</option>
						    <option value="C" <?php if ($rows_kls['ruang_kelas'] == 'C' ){echo 'selected';} ?>>C</option>
					  	</select>						
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="edit_wali_kelas" required>
							<option  id="opsel" value="" disabled selected>Nama Wali Kelas</option>
							<?php
								$tmp_gru = tampilGuru();
								while($rw_gr=mysqli_fetch_assoc($tmp_gru)){
							?>
								<option value="<?php echo $rw_gr['id_guru']?>" <?php if ($rows_kls['id_guru'] == $rw_gr['id_guru'] ){echo 'selected';} ?>><?php echo $rw_gr['nama_guru']?></option>
							<?php } //endwhile?>
					  	</select>						
					</div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="edit_tahun_ajaran" required>
							<?php $tahun = date('Y'); $ta4 = $tahun - 4; $ta3 = $tahun - 3; $ta2 = $tahun - 2; $ta = $tahun - 1; $tp1 = $tahun + 1; $tah1 = "$ta4/$ta3"; $tah2 = "$ta3/$ta2"; $tah3 = "$ta2/$ta"; $tah4 = "$ta/$tahun"; $tah5 = "$tahun/$tp1";?>
						    <option  id="opsel" value="" disabled selected>Tahun Ajaran</option>
						    <option value="<?php echo $tah1;?>" <?php if ($rows_kls['tahun_ajaran'] == $tah1 ){echo 'selected';} ?>><?php echo $tah1;?></option>
						    <option value="<?php echo $tah2;?>" <?php if ($rows_kls['tahun_ajaran'] == $tah2 ){echo 'selected';} ?>><?php echo $tah2;?></option>
						    <option value="<?php echo $tah3;?>" <?php if ($rows_kls['tahun_ajaran'] == $tah3 ){echo 'selected';} ?>><?php echo $tah3;?></option>
						    <option value="<?php echo $tah4;?>" <?php if ($rows_kls['tahun_ajaran'] == $tah4 ){echo 'selected';} ?>><?php echo $tah4;?></option>
						    <option value="<?php echo $tah5;?>" <?php if ($rows_kls['tahun_ajaran'] == $tah5 ){echo 'selected';} ?>><?php echo $tah5;?></option>
					  	</select>						
					</div>
				</div>
				<div class="clear"></div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="edit_status_kelas" required>
						    <option  id="opsel" value="" disabled selected>Status Kelas</option>
						    <option value="Aktif" <?php if ($rows_kls['status_kelas'] == 'Aktif' ){echo 'selected';} ?>>Aktif</option>
						    <option value="Tidak Aktif" <?php if ($rows_kls['status_kelas'] == 'Tidak Aktif' ){echo 'selected';} ?>>Tidak Aktif</option>
						</select>						
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="admin_formulir_dalam">
					<div class="list_ang">
						<select name="edit_angkatan">
						    <option  id="opsel" value="" disabled selected>List Angkatan</option>
						    <?php 
								$pil_angk = tampilAngkatan();
								while($tw_gr=mysqli_fetch_assoc($pil_angk)){
								if(isset($_POST['edit_angkatan'])){
							?>
								<option value="<?php echo $tw_gr['angkatan'];?>" <?php if ($edit_angkatan == $tw_gr['angkatan'] ){echo 'selected';} ?>><?php echo $tw_gr['angkatan'];?></option>
							<?php } //Endwhile
								if(!isset($_POST['edit_angkatan'])){
							?> 
								<option value="<?php echo $tw_gr['angkatan'];?>"><?php echo $tw_gr['angkatan'];?></option>
							<?php } }//Endwhile?>
					  	</select>	
					  	<input id="kontak_tel_ortu" type="submit" value="Tampilkan" name="edit_tamp_mrid">					
					</div>
				</div>
				<div class="clear"></div>
				<?php
				if(isset($_POST['edit_tamp_mrid']) & isset($_POST['edit_angkatan'])){?>
				<div class="admin_kelas_garis">
					<hr/>
				</div>
				<div id="pil_mur">
					<div id="isi_tam_mur">
						<table id="tabel_kontak">
							<tr>
								<th>+</th>
								<th>Nama Siswa</th>
								<th>Tahun</th>
								<th>Kelas</th>
							</tr>
							<tr>
								<?php
									$e_pil_mur = tampilMurAng($edit_angkatan);
									while($edit_pil_muri=mysqli_fetch_assoc($e_pil_mur)){
										$idk = $rows_kls['id_kelas']; $idm = $edit_pil_muri['id_murid']; $thn_ajr = $rows_kls['tahun_ajaran'];
										$info2Sql  = "SELECT * FROM kelas_siswa WHERE id_kelas = $idk AND id_murid = $idm";
										$info2Qry 	= mysqli_query($con, $info2Sql);
										if (mysqli_num_rows($info2Qry) >=1) {
												$terpilih = " checked";
											}
											else {
												$terpilih = "";
											}
										$tmuri = "SELECT * FROM kelas, kelas_siswa WHERE kelas.id_kelas = kelas_siswa.id_kelas and kelas_siswa.id_murid = $idm AND kelas.tahun_ajaran = '$thn_ajr' ";
										$query_tmuri = (mysqli_query($con, $tmuri));
										$has_tmuri = mysqli_fetch_assoc($query_tmuri);
										$mati	= "";
										$mati2	= "";
										if(mysqli_num_rows($query_tmuri) >=1) {
											if($has_tmuri['id_kelas'] != $idk) {
												$mati	= " disabled";
												$mati2	= " checked";
											}
										}
								?>
								<td><input type="checkbox" name="edit_nama_murid[]" value="<?php echo $edit_pil_muri['id_murid'];?>" <?php echo $terpilih; echo $mati; echo $mati2;?> /></td>
								<td><?php echo $edit_pil_muri['nama_murid'];?></td>
								<td><?php echo $has_tmuri['tahun_ajaran'];?></td>
								<td><?php echo $has_tmuri['nama_kelas'].'-'. $has_tmuri['ruang_kelas'];?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
				<?php } //Endwhile?>
				<div class="clear"></div>
				<div class="input_murid">
					<input type="submit" id="tombol_input_murid" name="update_kelas" value="Simpan Data" />
				</div>
			</form>
			<?php } //endwhile Tampil Edit Kelas?>
		</div>
		<div class="clear"></div>
	</div>
	<?php } //endwhile Edit Kelas?>