<div id="formulir_pertama" class="admin_formulir_muncul">
	<div id="admin_formulir">
		<h2>Tambah Data Orangtua/Wali Murid</h2>
		<p id="admin_penjelasan">Tambah Data Orangtua/Wali Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
		
		<!-- Form Input Data Ortu-->							
		<form action="../../source/php/insert_data_ortu.php" method="POST" enctype="multipart/form-data">
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri">
					<label for="nama_ortu">Nama Ortu</label>
					<p>Nama Orangtua/Wali Murid</p>
				</div>
				<div class="admin_formulir_kanan">
					<input type="text" name="nama_ortu" id="admin_nama_ortu" required />
					<input type="file" name="admin_foto_ortu" id="foto_ortu" required />
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
					<input type="radio" name="jenis_kelamin_ortu" value="laki-laki" checked> <span>Laki-Laki</span>
					<input type="radio" name="jenis_kelamin_ortu" value="perempuan"> <span> Perempuan</span>			
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
					<input type="text" name="pekerjaan_ortu" required/>								
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
					    <option  id="opsel" value="" disabled selected>Pilih Agama</option>
					    <option value="islam">Islam</option>
					    <option value="kristen">Kristen</option>
					    <option value="budha">Budha</option>
					    <option value="khatolik">Khatolik</option>
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
					<input type="number" name="no_hp" id="no_hp1" required />
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
					<textarea name="alamat_ortu" rows="5" required></textarea>							
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<input type="submit" id="kirim_data_ortu" name="kirim_data_ortu" value="Tambah Data">
		</form>
		<!-- Form Input Data Ortu-->

	</div>
</div>