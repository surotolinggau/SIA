<?php if(isset($_GET['id_pengumuman'])){?>
					<div id="formulir_kirim_pengumuman" class="admin_formulir_muncul">
						<div id="admin_formulir_pengumuman">
							<h2>Kirim Pengumuman</h2>
							<p id="kirim_pengumuman1">Kirim Pengumuman Kepada Orangtua/Wali Murid Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
								<?php
									$kirim_data_peng = editPengumuman($_GET['id_pengumuman']);
									while($kir_peng=mysqli_fetch_assoc($kirim_data_peng)){
								?>

							<form action="../../source/php/kelola_kontak.php" method="POST" name="form_kontak_ortu" >
								<div class="error"><div class="isi_error <?php echo $error2;?>"><p><?php echo $error1;?></p><h3><?php echo $error;?></h3></div></div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri1">
										<label for="judul">No.Hp</label>
										<p>No Handphone Ortu</p>
									</div>
									<div class="admin_formulir_kanan1">
										<input type="text" name="kode_area" id="kode_area" value="+62" disabled/>
										<input type="text" name="nomor_hp" id="no_hp" required />
										<p id="kontak_tel_ortu" onclick="toggleMenu()">Kontak</p>
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<div class="menu_kontak" id="iden_kontak">
									<div class="admin_formulir_dalam">
										<div class="admin_formulir_kiri1">
											<label for="judul">Kontak Ortu</label>
											<p>Daftar kontak Ortu</p>
										</div>
										<div class="admin_formulir_kanan1">
											<!--Menu Kontak-->

												<div class="header_kontak">
													<p>Pilih Nama Grup</p>
													<select id="grup_kon_ort" name="grup_kon_ort"  required>
														<option disabled selected id="opsel">Pilih Grup</option>
														<?php $nma_kon = tampilOrKontak2();
															while($takr=mysqli_fetch_assoc($nma_kon)){
														?>
														<option value="<?php echo $takr['id_grup'];?>" ><?php echo $takr['nama_grup'];?></option>
														
														<?php }?>
														<div class="clear"></div>
													</select>
												</div>
												<div class="clear"></div>
												<div class="isi_kontak" id="konten_kontak">
													
														
													<!--Tampil Kontak-->
													<?php
														$tko = tampilKontak();
														while($takoor=mysqli_fetch_assoc($tko)){
															
													?>
													<!--Tampil Kontak-->
													
													<div class="konten_kontak">
														<div id="check_bok">
															<input type="checkbox" name="kontak_ortu[]" id="checkbox_kontak"  value="<?php echo $takoor['no_telp'];?>">
														</div>
														<div id="kontak_nama_ortu">
															<p><?php echo $takoor['nama_ortu'];?></p>
														</div>
														<div id="kontak_nomor_telp">
															<p><?php echo "+62".$takoor['no_telp'];?></p>
														</div>
														<div class="clear"></div>
													</div>
													<?php }  //endwhile?>
													
												</div>
												<div id="tombol_kontak_pilih">
														<input type="checkbox" name="pilih_semua" onclick="pilih(document.form_kontak_ortu.checkbox_kontak)" /><p>Select All</p>
														<input type="button" value="Pilih" onclick="pilihKontak()" />
														<div class="clear"></div>
												</div>
											
											<!--Menu Kontak-->

											<div class="clear"></div>
										</div>
										<div class="clear"></div>
										<hr>
									</div>
								</div>
								<div class="admin_formulir_dalam">
									<div class="admin_formulir_kiri1">
										<label for="isi">Pengumuman</label>
										<p>Judul Pengumuman</p>
									</div>
									<div class="admin_formulir_kanan1">
										<textarea name="judul_pengumuman" id="isi_pengumuman" rows="8" required><?php echo $kir_peng['judul_pengumuman'];?></textarea>							
									</div>
									<div class="clear"></div>
									<hr>
								</div>
								<input type="submit" id="kirim_data_ortu" name="kirim_pengumuman" value="KIRIM PENGUMUMAN" />
							</form>
							<?php } //Endwhile?>
						</div>
					</div>
					<?php }?>