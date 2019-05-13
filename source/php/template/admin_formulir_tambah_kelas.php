
	<div id="formulir_kelas" class="admin_formulir_muncul">
		<div id="admin_formulir2">
			<div class="info_ortu_mrd">
				<h2 id="judul_tambah_kelas">Tambah Data Kelas</h2>

				<!-- kertas formulir admin untuk tambah Pengumuman -->
					<?php require_once('../../source/php/insert_kelas.php');?>
				<!-- kertas formulir admin untuk tambah Pengumuman -->

			</div>
			<div class="clear"></div>
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
						<select name="nama_kelas" required>
							<option  id="opsel" value="" disabled  selected>Pilih Kelas</option>
						    <?php if(!isset($_POST['tamp_mrid'])){?>
						    <option value="I" >I (SATU)</option>
						    <option value="II" >II (DUA)</option>
						    <option value="III" >III (TIGA)</option>
						    <option value="IV" >IV (EMPAT)</option>
						    <option value="V">V (LIMA)</option>
						    <option value="VI">VI (ENAM)</option>
						    <?php } ?>

						    <?php if(isset($_POST['tamp_mrid'])){?>
						    <option value="I" <?php if ($kelas == 'I' ){echo 'selected';} ?>>I (SATU)</option>
						    <option value="II" <?php if ($kelas == 'II' ){echo 'selected';} ?>>II (DUA)</option>
						    <option value="III" <?php if ($kelas == 'III' ){echo 'selected';} ?>>III (TIGA)</option>
						    <option value="IV" <?php if ($kelas == 'IV' ){echo 'selected';} ?>>IV (EMPAT)</option>
						    <option value="V" <?php if ($kelas == 'V' ){echo 'selected';} ?>>V (LIMA)</option>
						    <option value="VI" <?php if ($kelas == 'VI' ){echo 'selected';} ?>>VI (ENAM)</option>
						    <?php } ?>
					  	</select>						
					</div>
					<div class="input_ruang">
						<select name="ruang_kelas" required>
						    <option  id="opsel" value="" disabled selected>Ruang</option>
						    <?php if(!isset($_POST['tamp_mrid'])){?>
						    <option value="A">A</option>
						    <option value="B">B</option>
						    <option value="C">C</option>
						    <?php } ?>

							<?php if(isset($_POST['tamp_mrid'])){?>
						    <option value="A" <?php if ($ruang == 'A' ){echo 'selected';} ?>>A</option>
						    <option value="B" <?php if ($ruang == 'B' ){echo 'selected';} ?>>B</option>
						    <option value="C" <?php if ($ruang == 'C' ){echo 'selected';} ?>>C</option>
						    <?php } ?>
					  	</select>						
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="wali_kelas" required>
							<option  id="opsel" value="" disabled selected>Nama Wali Kelas</option>
							<?php
								$tmp_gru = tampilGuru();
								while($rw_gr=mysqli_fetch_assoc($tmp_gru)){
							?>
								<?php if(!isset($_POST['tamp_mrid'])){?>
								<option value="<?php echo $rw_gr['id_guru']?>"><?php echo $rw_gr['nama_guru']?></option>
								<?php } ?>

								<?php if(isset($_POST['tamp_mrid'])){?>
								<option value="<?php echo $rw_gr['id_guru'];?>" <?php if ($wk == $rw_gr['id_guru'] ){echo 'selected';} ?>><?php echo $rw_gr['nama_guru']?></option>
								<?php } ?>
							<?php } //endwhile?>
					  	</select>						
					</div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="tahun_ajaran" required>
							<?php $tahun = date('Y'); $ta4 = $tahun - 4; $ta3 = $tahun - 3; $ta2 = $tahun - 2; $ta = $tahun - 1; $tp1 = $tahun + 1; $tah1 = "$ta4/$ta3"; $tah2 = "$ta3/$ta2"; $tah3 = "$ta2/$ta"; $tah4 = "$ta/$tahun"; $tah5 = "$tahun/$tp1";?>
						    <option  id="opsel" value="" disabled selected>Tahun Ajaran</option>
						    <?php if(!isset($_POST['tamp_mrid'])){?>
						    <option value="<?php echo $tah1;?>"><?php echo $tah1;?></option>
						    <option value="<?php echo $tah2;?>"><?php echo $tah2;?></option>
						    <option value="<?php echo $tah3;?>"><?php echo $tah3;?></option>
						    <option value="<?php echo $tah4;?>"><?php echo $tah4;?></option>
						    <option value="<?php echo $tah5;?>"><?php echo $tah5;?></option>
						    <?php } ?>

						    <?php if(isset($_POST['tamp_mrid'])){?>
						    <option value="<?php echo $tah1;?>" <?php if ($taj == $tah1 ){echo 'selected';} ?>><?php echo $tah1;?></option>
						    <option value="<?php echo $tah2;?>" <?php if ($taj == $tah2 ){echo 'selected';} ?>><?php echo $tah2;?></option>
						    <option value="<?php echo $tah3;?>" <?php if ($taj == $tah3 ){echo 'selected';} ?>><?php echo $tah3;?></option>
						    <option value="<?php echo $tah4;?>" <?php if ($taj == $tah4 ){echo 'selected';} ?>><?php echo $tah4;?></option>
						    <option value="<?php echo $tah5;?>" <?php if ($taj == $tah5 ){echo 'selected';} ?>><?php echo $tah5;?></option>
						    <?php } ?>
					  	</select>						
					</div>
				</div>
				<div class="clear"></div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="status_kelas" required>
						    <option  id="opsel" value="" disabled selected>Status Kelas</option>
						    <?php if(!isset($_POST['tamp_mrid'])){?>
						    <option value="Aktif">Aktif</option>
						    <option value="Tidak Aktif">Tidak Aktif</option>
						    <?php } ?>

						    <?php if(isset($_POST['tamp_mrid'])){?>
						    <option value="Aktif" <?php if ($s_kelas == 'Aktif' ){echo 'selected';} ?>>Aktif</option>
						    <option value="Tidak Aktif" <?php if ($s_kelas == 'Tidak Aktif' ){echo 'selected';} ?>>Tidak Aktif</option>
						    <?php } ?>
					  	</select>						
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				<div class="admin_formulir_dalam">
					<div class="list_ang">
						<select name="angkatan" required>
						    <option  id="opsel" value="" disabled selected>List Angkatan</option>
						    <?php 
								$pil_angk = tampilAngkatan();
								while($tw_gr=mysqli_fetch_assoc($pil_angk)){
							?>
								<?php if(!isset($_POST['tamp_mrid'])){?>
								<option value="<?php echo $tw_gr['angkatan']?>"><?php echo $tw_gr['angkatan']?></option>
								<?php } ?>

								<?php if(isset($_POST['tamp_mrid'])){?>
								<option value="<?php echo $tw_gr['angkatan']?>" <?php if ($pis == $tw_gr['angkatan'] ){echo 'selected';} ?>><?php echo $tw_gr['angkatan']?></option>
								<?php } ?>
							<?php } //Endwhile?>
					  	</select>	
					  	<input id="kontak_tel_ortu" type="submit" value="Tampilkan" name="tamp_mrid">					
					</div>
				</div>
				<div class="clear"></div>
				<?php
					if(isset($_POST['tamp_mrid'])){
				?>
				<div class="admin_kelas_garis">
					<hr/>
				</div>
				<div id="pil_mur">
					<div id="isi_tam_mur">
						<table id="tabel_kontak">
							<tr>
								<th>+</th>
								<th>Nama Siswa</th>
								<th>NIM</th>
								<th>Tahun</th>
							</tr>
							<tr>
								<?php
									$pil_mur = tampilMurAng($pis);
									while($pil_muri=mysqli_fetch_assoc($pil_mur)){
								?>
								<td><input type="checkbox" name="nm_murid_ang[]" value="<?php echo $pil_muri['id_murid'];?>" /></td>
								<td><?php echo $pil_muri['nama_murid'];?></td>
								<td><?php echo $pil_muri['NIM'];?></td>
								<td><?php echo $pil_muri['angkatan'];?></td>
								
							</tr>
							<?php } //Endwhile?>
						</table>
					</div>
				</div>
				<?php } ?>
				<div class="clear"></div>
				<div class="input_murid">
					<input type="submit" id="tombol_input_murid" name="tambah_kelas" value="Tambah Data" />
				</div>
			</form>
		</div>
		<div class="clear"></div>
	</div>