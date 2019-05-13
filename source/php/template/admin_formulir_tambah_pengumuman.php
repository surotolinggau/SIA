					<div id="formulir_pengumuman" class="admin_formulir_muncul">
						<div id="admin_formulir_pengumuman">
							<h2>Tambah Pengumuman</h2>
							<p id="admin_penjelasan1">Tambah Pengumuman Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							
							<!-- PHP Insert Data Pengumuman-->
								<?php 
									require_once('../../source/php/insert_data_pengumuman.php');
								?>
								
							<!-- PHP Insert Data Pengumuman-->
							
							<form action="" method="POST" enctype="multipart/form-data">
								<div class="error"><div class="isi_error <?php echo $error2;?>"><p><?php echo $error1;?></p><h3><?php echo $error;?></h3></div></div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri1">
										<label for="judul">Judul</label>
										<p>Judul Pengumuman</p>
									</div>
									<div class="admin_formulir_kanan1">
										<input type="text" name="judul_pengumuman" id="judul_pengumuman" required />
										<input type="hidden" name="tgl_peng" value="<?php $tgl1=date('Y/m/d'); echo $tgl1;?>" />
										<input type="hidden" name="jam_peng" value="<?php $tgl2=date('H:i:s'); echo $tgl2;?>" />
										<input type="file" name="foto_pengumuaman" id="foto_pengumuman" required />
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri1">
										<label for="isi">Isi</label>
										<p>Isi Pengumuman</p>
									</div>
									<div class="admin_formulir_kanan1">
										<textarea name="isi_pengumuman" id="isi_pengumuman" rows="8" required></textarea>							
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<input type="submit" id="kirim_data_ortu" name="input_pengumuman" value="Tambah Data">
							</form>
						</div>
					</div>