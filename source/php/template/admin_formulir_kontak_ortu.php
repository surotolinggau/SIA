			<div id="formulir_kontak" class="admin_formulir_muncul">
						<div id="admin_formulir1">
							<h2>Nomor Kontak Orangtua</h2>
							<p id="admin_penjelasan">Daftar Nomor Handphone Orangtua/Wali Murid Pada Sistem Informasi Akademik SDN 20 Kota Lubuklinggau</p>

							<!-- PHP Hapus dan Tampil Kontak Grup -->
								<?php 
									require_once('../../source/php/delete_action_kontak.php');
								?>	
							<!-- PHP Hapus dan Tampil Kontak Grup -->

							<div class="error"><div class="isi_error <?php echo $error2;?>"><p><?php echo $error1;?></p><h3><?php echo $error;?></h3></div></div>
							<div class="clear"></div>
							<div class="kotak_kontak_ortu">
								<?php if(!isset($_GET['tk'])){?>
								<p onclick="toggleMenu1()">Tambah Grup</p>
								<?php } //endwhile?>
								<form action="" method="GET">
									<input type="submit" name="tk" id="guren" value="Tampilkan" />
									<input type="submit" name="ptk" id="gurens" value="Hapus" onclick="return confirm('Yakin Untuk Menghapus Grup Yang Dipilih ?')" />
									<select name="gr" >
										<option value="" selected>ALL</option>

										<!--Tampil Kontak-->
										<?php
											$ta_kon = tampilOrKontak();
											while($rw_pe=mysqli_fetch_assoc($ta_kon)){
										?>
										<!--Tampil Kontak-->
										<option value="<?php echo $rw_pe['nama_grup'];?>" ><?php echo $rw_pe['nama_grup'];?></option>
										<?php }//endwhile ?>
										<div class="clear"></div>
									</select>
								</form>
							</div>

							<div class="clear"></div>
							<div class="kotak_kontak_ortu1">
								<div class="admin_formulir_dalam">
									<hr>
								</div>
							</div>
							<div class="clear"></div>
							
							<form action="../../source/php/insert_kontak.php" method="POST">
								<div class="kotak_kontak_ortu1">
									<div class="menu_kontak" id="iden_kon">
										<div class="admin_formulir_dalam">
											<div class="admin_formulir_kiri1">
												<label for="judul">Nama Grup</label>
												<p>Nama Grup Kontak Ortu</p>
											</div>
											<div class="admin_formulir_kanan1">
												<input type="text" name="nama_kontak_ortu" id="nm_kontak_ortu" required />
												<div class="clear"></div>
											</div>
											<div class="clear"></div>
											<hr>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>

								<div class="kotak_kontak_ortu1">
									<div id="bung_kon">
										<table id="tabel_kontak">
											
											<!-- PHP Template Tabel Kontak -->
												<?php 
													require_once('../../source/php/template_kontak.php');
												?>
											<!-- PHP Template Tabel Kontak -->

										</table>
									</div>
								<div class="clear"></div>
								<hr/>
									<div class="menu_kontak" id="iden_kon_l">
										<input type="submit" id="kdk" name="kirim_kontak_ortu" value="SIMPAN GRUP" />
									</div>
									<div class="clear"></div>
								</div>
							</form>

							<div class="clear"></div>

						</div>
					</div>