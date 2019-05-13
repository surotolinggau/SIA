<div id="formulir_tambah_guru" class="admin_formulir_muncul">
	<div id="admin_formulir4">
		<h2>Tambah Data Guru</h2>
		<p id="admin_penjelasan3">Tambah Data Orangtua/Wali Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>

		<!-- PHP Insert Data Murid -->
			<?php
				require_once('../../source/php/insert_data_guru.php');
			?>
		<!-- PHP Insert Data Murid -->

		<div class="error"><div class="isi_error <?php echo $error2;?>"><p><?php echo $error1;?></p><h3><?php echo $error;?></h3></div></div>
		<div class="clear"></div>
		
		<!-- Form Input Data Ortu-->							
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="nama_ortu">NUPTK</label>
					<p>Nomor Unik Pendidik</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="number" name="nuptk" required/>
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
					<input type="text" name="nama_guru" id="admin_nama_ortu" required />
					<input type="file" name="admin_foto_guru" id="foto_guru" required />
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
					<input type="radio" name="jk_guru" value="laki-laki" required> <span>Laki-Laki</span>
					<input type="radio" name="jk_guru" value="perempuan" required> <span> Perempuan</span>			
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
					<input type="number" name="nhp_guru" id="no_hp1" required />
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
					<input type="text" name="jabatan" required/>								
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
					    <option  id="opsel" value="" disabled selected>Jenis Status</option>
					    <option value="PNS">PNS</option>
					    <option value="CPNS">CPNS</option>
					    <option value="Guru Honor">Guru Honor</option>
					    <option value="Guru Pengganti">Guru Pengganti</option>
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
					<textarea name="alamat_guru" rows="5" required></textarea>							
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<input type="submit" id="kdk" name="kirim_data_guru" value="Tambah Data">
		</form>
		<!-- Form Input Data Ortu-->

	</div>
</div>