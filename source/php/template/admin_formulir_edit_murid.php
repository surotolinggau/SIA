				<?php if(isset($_GET['id_ortu'], $_GET['id_murid'])){?>
					<div id="formulir_kelima" class="admin_formulir_muncul">
						<div id="admin_formulir">
							<h2>Edit Data Murid</h2>
							<p id="admin_penjelasan">Edit Data Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>

							<!-- PHP Lihat Data Orangtua atau Wali Per-ID -->
							<?php
								$edit_data_murid = editMurid($_GET['id_murid']);
								while($anom=mysqli_fetch_assoc($edit_data_murid)){
							?>
							<!-- PHP Lihat Data Orangtua atau Wali Per-ID -->

							<!-- PHP Form Edit Data Orangtua atau Wali Per-ID -->
							<form action="../../source/php/update_data_murid.php" method="POST" enctype="multipart/form-data">
							<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="NIS">NIS</label>
										<p>No Induk Siswa</p>
									</div>
									<div class="admin_formulir_kanan">
										<input type="number" name="NIM" value="<?php echo $anom['NIM'];?>" required/>							
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="nama_ortu">Nama Murid</label>
										<p>Nama Murid</p>
									</div>
									<div class="admin_formulir_kanan">
										<input type="text" name="nama_murid" id="admin_nama_ortu" value="<?php echo $anom['nama_murid'];?>" required/>
										<input type="hidden" name="id_foto" value="<?php echo $anom['id_foto']; ?>">
										<input type="hidden" name="id_murid" value="<?php echo $anom['id_murid']; ?>">
										<input type="hidden" name="hak_user" value="<?php echo $hak_akses ?>">
										<input type="file" name="admin_foto_murid" id="foto_murid" />
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="jenis_kelamin_ortu">Jenis Kelamin</label>
										<p>Jenis Kelamin Murid</p>
									</div>
									<div class="admin_formulir_kanan">
										<input type="radio" name="jenis_kelamin_murid" value="Laki-Laki" <?php if ($anom['jenis_kelamin_murid'] == 'Laki-Laki' ){echo 'checked';} ?>> <span>Laki-Laki</span>
										<input type="radio" name="jenis_kelamin_murid" value="Perempuan" <?php if ($anom['jenis_kelamin_murid'] == 'Perempuan' ){echo 'checked';} ?>> <span> Perempuan</span>	
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="tempat_lahir_murid">Tempat Lahir</label>
										<p>Tempat Lahir Murid</p>
									</div>
									<div class="admin_formulir_kanan">
										<input type="text" name="tempat_lahir_murid" value="<?php echo $anom['tempat_lahir'];?>" required/>								
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="tanggal_lahir_murid">Tanggal Lahir</label>
										<p>Tanggal Lahir Murid</p>
									</div>
									<div class="admin_formulir_kanan">
										<input type="date" name="tanggal_lahir_murid" value="<?php echo $anom['tanggal_lahir'];?>" required/>					
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="status_murid">Tahun Ajaran</label>
										<p>Tahun Ajaran</p>
									</div>
									<div class="admin_formulir_kanan">
										<select name="angkatan" required>
											<?php echo $tahun = date('Y');
												for($xt = $tahun-5; $xt <= $tahun; $xt++){
											 ?>
										   	<option value="<?php echo $xt;?>" <?php if($xt==$anom['angkatan']){
													echo "selected";}?>><?php echo $xt;?>
											</option>
										   	<?php } //endwhile?>
					  					</select>
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri">
										<label for="status_murid">Status</label>
										<p>Status Murid</p>
									</div>
									<div class="admin_formulir_kanan">
										<select name="status_murid" required>
										    <option <?php if ($anom['status_murid'] == 'Aktif' ){echo 'selected';} ?>value="Aktif">Aktif</option>
										    <option <?php if ($anom['status_murid'] == 'Tidak Aktif' ){echo 'selected';} ?> value="Tidak Aktif">Tidak Aktif</option>
									  	</select>
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<input type="submit" id="kirim_data_murid" name="edit_data_murid" value="Edit Data" />
							</form>
							<?php } //endwhile?>
							<!-- PHP Form Edit Data Orangtua atau Wali Per-ID -->
						</div>
					</div>
					<?php }?>