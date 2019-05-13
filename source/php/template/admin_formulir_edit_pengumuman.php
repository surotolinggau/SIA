<?php if(isset($_GET['id_pengumuman'])){?>
					<div id="formulir_edit_pengumuman" class="admin_formulir_muncul">
						<div id="admin_formulir_pengumuman">
							<h2>Edit Pengumuman</h2>
							<p id="admin_penjelasan1">Edit Pengumuman Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							
							<!-- PHP Lihat Data Pengumuman Per-ID -->
							<?php
								$edit_data_peng = editPengumuman($_GET['id_pengumuman']);
								while($peng_edit=mysqli_fetch_assoc($edit_data_peng)){
							?>
							<!-- PHP Lihat Data Pengumuman Per-ID -->
							
							<form action="../../source/php/update_data_pengumuman.php" method="POST" enctype="multipart/form-data">
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri1">
										<label for="judul">Judul</label>
										<p>Judul Pengumuman</p>
									</div>
									<div class="admin_formulir_kanan1">
										<input type="text" name="judul_pengumuman" id="judul_pengumuman" value="<?php echo $peng_edit['judul_pengumuman'];?>" />
										<input type="hidden" name="tgl_peng" value="<?php $tgl1=date('Y/m/d'); echo $tgl1;?>" />
										<input type="hidden" name="jam_peng" value="<?php $tgl2=date('H:i:s'); echo $tgl2;?>" />
										<input type="hidden" name="id_pengumuman" value="<?php echo $peng_edit['id_pengumuman'];?>" />
										<input type="hidden" name="id_foto" value="<?php echo $peng_edit['id_foto'];?>" />
										<input type="file" name="foto_pengumuaman" id="foto_pengumuman" />
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
										<textarea name="isi_pengumuman" id="isi_pengumuman" rows="8" required><?php echo $peng_edit['isi_pengumuman'];?></textarea>							
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<input type="submit" id="kirim_data_ortu" name="edit_pengumuman" value="Edit Data">
							</form>
							<?php } //endwhile?>
						</div>
						<div class="clear"></div>
					</div>
					<?php } ?>