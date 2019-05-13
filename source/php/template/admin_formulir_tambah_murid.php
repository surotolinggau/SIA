<?php if(isset($_GET['id_ortu'])){?>
	<div id="formulir_keempat" class="admin_formulir_muncul">
		<div id="admin_formulir2">
			<div class="info_ortu_mrd">
				<h2 id="judul_tambah_murid">Tambah Data Murid</h2>

				<!-- PHP Lihat Data Orangtua atau Wali Per-ID -->
				<?php
					$edit_data_ortu = editOrtu($_GET['id_ortu']);
					while($hortw=mysqli_fetch_assoc($edit_data_ortu)){
				?>
				<!-- PHP Lihat Data Orangtua atau Wali Per-ID -->

				<!-- PHP Insert Data Murid -->
					<?php
						require_once('../../source/php/insert_data_murid.php');
					?>
				<!-- PHP Insert Data Murid -->

				<div class="info_foto_ortu">
					<div class="error1">
						<div class="isi_error <?php echo $error2;?>">
							<p><?php echo $error1;?></p>
							<h3><?php echo $error;?></h3>
						</div>
					</div>
					<img src="../../image/ortu/<?php echo $hortw['nama_foto']; ?>" />
				</div>
				<div class="info_nama_ortu">
					<p><?php echo $hortw['nama_ortu']; ?></p>
				</div>
			</div>
			<div class="clear"></div>
			<form action="halamanadmin.php?id_ortu=<?php echo $hortw['id_ortu'];?>#formulir_keempat" method="POST" enctype="multipart/form-data">
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<input type="number" name="nim" placeholder="NIS" required/>								
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<input type="text" name="nama_murid" id="admin_nama_murid" placeholder="Nama Murid" required/>
						<input type="hidden" name="id_ortu" value="<?php echo $hortw['id_ortu']; ?>" />
						<input type="file" name="admin_foto_murid" id="foto_murid" required/>
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kanan">
					<div class="input_murid_radio">
						<input type="radio" name="jenis_kelamin_murid" value="laki-laki" checked> <span>Laki-Laki</span>
						<input type="radio" name="jenis_kelamin_murid" value="perempuan"> <span> Perempuan</span>
					</div>			
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<input type="text" name="tempat_lahir_murid" placeholder="Tempat Lahir Murid" required/>								
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<input type="date" name="tanggal_lahir_murid" min="2000-01-02" required/>							
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="angkatan" required>
						<?php echo $tahun = date('Y');?>
						   	<option value="<?php echo $tahun-6;?>"><?php echo $tahun-6 ;?></option>
						   	<option value="<?php echo $tahun-5;?>"><?php echo $tahun-5 ;?></option>
						   	<option value="<?php echo $tahun-4;?>"><?php echo $tahun-4 ;?></option>
						   	<option value="<?php echo $tahun-3;?>"><?php echo $tahun-3 ;?></option>
						   	<option value="<?php echo $tahun-2;?>"><?php echo $tahun-2 ;?></option>
						   	<option value="<?php echo $tahun-1;?>"><?php echo $tahun-1 ;?></option>
						   	<option value="<?php echo $tahun;?>"><?php echo $tahun ;?></option>
						   	<option  id="opsel" value="" disabled selected>Tahun Masuk</option>
					  	</select>						
					</div>
					<div class="clear"></div>
				</div>
				<div class="admin_formulir_dalam">
					<div class="input_murid">
						<select name="status_murid" required>
						    <option  id="opsel" value="" disabled selected>Status Murid</option>
						    <option value="Aktif">Aktif</option>
						    <option value="Tidak Aktif">Tidak Aktif</option>
					  	</select>						
					</div>
					<div class="clear"></div>
				</div>
				<div class="input_murid">
					<input type="submit" id="tombol_input_murid" name="tambah_data_murid" value="Tambah Data" />
				</div>
			</form>
			<?php } //endwhile ?>
		</div>
		<div class="clear"></div>
	</div>
<?php }?>