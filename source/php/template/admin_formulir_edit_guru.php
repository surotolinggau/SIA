<?php if(isset($_GET['id_guru'])){?>
	<div id="formulir_edit_guru" class="admin_formulir_muncul">
		<div id="admin_formulir4">
			<h2>Edit Data Guru</h2>
			<p id="admin_penjelasan3">Edit Data Guru Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>

			<!-- PHP Lihat Data guru Per-ID -->
			<?php
				$edit_data_guru = editGuru($_GET['id_guru']);
				while($rows_guru=mysqli_fetch_assoc($edit_data_guru)){
			?>
			<!-- PHP Lihat Data guru Per-ID -->


			<!-- PHP Form Edit Data guru Per-ID -->
			<form action="../../source/php/update_data_guru.php" method="POST" enctype="multipart/form-data">
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="nama_ortu">NUPTK</label>
					<p>Nomor Unik Pendidik</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="number" name="nuptk" value="<?php echo $rows_guru['nuptk']; ?>" required/>
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="nama_ortu">Nama Guru</label>
					<p>Nama Guru SDN 20 LLG</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="text" name="nama_guru" id="admin_nama_ortu" value="<?php echo $rows_guru['nama_guru'];?>" required />
					<input type="hidden" name="id_foto" value="<?php echo $rows_guru['id_foto']; ?>">
					<input type="hidden" name="id_guru" value="<?php echo $rows_guru['id_guru']; ?>">
					<input type="hidden" name="hak_user" value="<?php echo $hak_akses;?>" />
					<input type="file" name="admin_foto_guru" id="foto_guru" />
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="jk_guru">Jenis Kelamin</label>
					<p>Jenis Kelamin Guru</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="radio" name="jk_guru" value="Laki-Laki" <?php if ($rows_guru['jk_guru'] == 'Laki-laki' ){echo 'checked';} ?>> <span>Laki-Laki</span>
					<input type="radio" name="jk_guru" value="Perempuan" <?php if ($rows_guru['jk_guru'] == 'Perempuan' ){echo 'checked';} ?>> <span> Perempuan</span>				
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="no_hp">No Telepon</label>
					<p>No Handphone Guru</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="text" id="kode_area" value="+62" disabled/>
					<input type="number" name="nhp_guru" id="no_hp1" value="<?php echo $rows_guru['no_tel'];?>" required />
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="jabatan">Jabatan</label>
					<p>Jabatan Guru</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="text" name="jabatan" value="<?php echo $rows_guru['jabatan'];?>" required/>								
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="status_guru">Status Guru</label>
					<p>Jenis Status Guru</p>
				</div>
				<div class="admin_formulir_kanan">
					<select name="status_guru" required>
					    <option value="PNS" <?php if ($rows_guru['status'] == 'PNS' ){echo 'selected';} ?>>PNS</option>
					    <option value="CPNS" <?php if ($rows_guru['status'] == 'CPNS' ){echo 'selected';} ?>>CPNS</option>
					     <option value="Guru Honor" <?php if ($rows_guru['status'] == 'Guru Honor' ){echo 'selected';} ?>>Guru Honor</option>
					    <option value="Guru Pengganti" <?php if ($rows_guru['status'] == 'Guru Pengganti' ){echo 'selected';} ?>>Guru Pengganti</option>
				  	</select>							
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="alamat">Alamat</label>
					<p>Alamat Rumah Guru</p>
				</div>
				<div class="admin_formulir_kanan">
					<textarea name="alamat_guru" rows="5" required><?php echo $rows_guru['alamat'];?></textarea>							
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<input type="submit" id="kdk" name="edit_data_guru" value="Edit Data">
		</form>
			<?php } //endwhile ?>
			<!-- PHP Form Edit Data guru Per-ID -->

		</div>
		<div class="clear"></div>
	</div>
<?php }?>