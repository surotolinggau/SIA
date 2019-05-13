<?php if(isset($_GET['id_ortu'])){?>
	<div id="formulir_ketiga" class="admin_formulir_muncul">
		<div id="admin_formulir">
			<h2>Edit Data Orangtua/Wali Murid</h2>
			<p id="admin_penjelasan">Edit Data Orangtua/Wali Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>

			<!-- PHP Lihat Data Orangtua atau Wali Per-ID -->
			<?php
				$edit_data_ortu = editOrtu($_GET['id_ortu']);
				if($hortw=mysqli_fetch_assoc($edit_data_ortu)){
			?>
			<!-- PHP Lihat Data Orangtua atau Wali Per-ID -->

			<!-- PHP Form Edit Data Orangtua atau Wali Per-ID -->
			<form action="../../source/php/update_data_ortu.php" method="POST" enctype="multipart/form-data">
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="nama_ortu">Nama Ortu</label>
						<p>Nama Orangtua/Wali Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="nama_ortu" id="admin_nama_ortu" value="<?php echo $hortw['nama_ortu'];?>" required/>
						<input type="hidden" name="id_foto" value="<?php echo $hortw['id_foto']; ?>" />
						<input type="hidden" name="id_ortu" value="<?php echo $hortw['id_ortu']; ?>" />
						<input type="hidden" name="hak_user" value="<?php echo $hak_akses;?>" />
						<input type="file" name="admin_foto_ortu" id="foto_ortu" />
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="jenis_kelamin_ortu">Jenis Kelamin</label>
						<p>Jenis Kelamin Orangtua Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="radio" name="jenis_kelamin_ortu" value="Laki-Laki" <?php if ($hortw['jenis_kelamin_ortu'] == 'Laki-Laki' ){echo 'checked';} ?>> <span>Laki-Laki</span>
						<input type="radio" name="jenis_kelamin_ortu" value="Perempuan" <?php if ($hortw['jenis_kelamin_ortu'] == 'Perempuan' ){echo 'checked';} ?>> <span> Perempuan</span>			
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Pekerjaan</label>
						<p>Pekerjaan Orangtua/Wali Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="pekerjaan_ortu" value="<?php echo $hortw['pekerjaan'];?>" required/>								
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="agama_ortu">Agama</label>
						<p>Agama Orangtua/Wali Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="agama_ortu" required>
						    <option <?php if ($hortw['agama'] == 'Islam' ){echo 'selected';} ?> value="Islam">Islam</option>
						    <option <?php if ($hortw['agama'] == 'Kristen' ){echo 'selected';} ; ?> value="Kristen">Kristen</option>
						    <option <?php if ($hortw['agama'] == 'Budha' ){echo 'selected';}?> value="Budha">Budha</option>
						    <option <?php if ($hortw['agama'] == 'Khatolik' ){echo 'selected';}?> value="Khatolik">Khatolik</option>
					  	</select>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="no_hp">No Telepon</label>
						<p>No Hp Orangtua/Wali Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" id="kode_area" value="+62" disabled/>
						<input type="number" name="no_hp" id="no_hp1" value="<?php echo $hortw['no_telp'];?>" required />
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="alamat">Alamat</label>
						<p>Alamat Orangtua/Wali Murid</p>
					</div>
					<div class="admin_formulir_kanan">
						<textarea name="alamat_ortu" rows="5" required><?php echo $hortw['alamat'];?></textarea>							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<input type="submit" id="kirim_data_ortu" name="edit_data_ortu" value="Edit Data"/>
			</form>
			<?php } //endwhile?>
			<!-- PHP Form Edit Data Orangtua atau Wali Per-ID -->
		</div>
		<div class="clear"></div>
	</div>
<?php }?>