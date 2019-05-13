					<div id="formulir_lihat_nilai" class="admin_formulir_muncul1">
						<div id="admin_formulir_nilai">
							<?php
								$adminPilihsem	= '';
								$adminPilihkelas= '';
								$filterSem		= '';
								$filterKel		= '';
								if(isset($_GET['atn'])) {
									$adminPilihsem = $_GET['ans'];
									$adminPilihkelas = $_GET['anik'];
									$filterSem = "AND semester= $adminPilihsem";
									$filterKel = "AND kelas.id_kelas= $adminPilihkelas";

								}
							?>
							<h2>Daftar Nilai</h2>
							<p id="admin_penjelasan">Daftar Nilai Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							<div class="admin_bungkus_nilai">
							<form action="" method="GET">
								<div class="tmcnkelas">
									<p onclick="toggleMenu2()">L</p>
								</div>
								<div class="kotak_cari_nilai" id="iden_nilai">
									<div class="admin_formulir_dalam">
										<div class="admin_formulir_kiri">
											<label for="pekerjaan_ortu">Semester</label>
											<p>Pilih Nilai Semester</p>
										</div>
										<div class="admin_formulir_kanan">
											<select name="ans" required>
											    <option  id="opsel" value="" disabled selected>Pilih Semester</option>
											    <option value="1" <?php if ($adminPilihsem == 1 ){echo 'selected';} ?>>1 -> Ganjil</option>
											    <option value="2" <?php if ($adminPilihsem == 2 ){echo 'selected';} ?>>2 -> Genap</option>
										  	</select>							
										</div>
										<div class="clear"></div>
										<hr>
									</div>
									<div class="admin_formulir_dalam">
										<div class="admin_formulir_kiri">
											<label for="pekerjaan_ortu">Kelas</label>
											<p>Pilih Nama Kelas</p>
										</div>
										<div class="admin_formulir_kanan">
											<select name="anik" required>
											    <option  id="opsel" value="" disabled selected>Pilih Kelas</option>
											    <?php 
											    	$tmadKelasnilai = tmadKelasnilai();
											    	while($row_tmadKelasnilai = mysqli_fetch_assoc($tmadKelasnilai)){
											    		$lihatKelasid = $row_tmadKelasnilai['id_kelas'];
											    		$lihatKelasnilai = $row_tmadKelasnilai['nama_kelas'].'/'.
											    		$row_tmadKelasnilai['ruang_kelas'].' ('.$row_tmadKelasnilai['tahun_ajaran'].')';
											    ?>
											    <option value="<?php echo $lihatKelasid;?>" <?php if ($adminPilihkelas == $lihatKelasid){echo 'selected';} ?>><?php echo $lihatKelasnilai;?></option>
											    <?php } ?>
										  	</select>						
										</div>
										<div class="clear"></div>
										<hr>
									</div>
									<input type="submit" name="atn" id="kdk" value="Pilih Kelas">
								</div>
								<div class="clear"></div>
							</form>
							</div>
							<div class="admin_bungkus_nilai">
								<table id="tabel_kelas">
									<tr>
										<th>Kelas</th>
										<th>Tahun Ajaran</th>
										<th>Nama Pelajaran</th>
										<th>Nama Guru</th>
										<th>Semester</th>
										<th>Status</th>
										<th>Ket</th>
									</tr>
									<?php 
										$adminNilai = adminNilai($filterKel);
										while($row_adminNilai = mysqli_fetch_assoc($adminNilai)){
											$adminNilaiik = $row_adminNilai['id_kelas'];
											$adminNilaink = $row_adminNilai['nama_kelas'];
											$adminNilairk = $row_adminNilai['ruang_kelas'];
											$adminNilaita = $row_adminNilai['tahun_ajaran'];
											$adminNilaiimp = $row_adminNilai['id_mp'];
											$adminNilainmp = $row_adminNilai['nama_mp'];
											$adminNilaiig = $row_adminNilai['id_guru'];
											$adminNilaing = $row_adminNilai['nama_guru'];

											$admincekNilai = admincekNilai($adminNilaiig, $filterSem, $adminNilaiik, $adminNilainmp);
											$row_admincekNilai= mysqli_fetch_assoc($admincekNilai);
											$tamAdmigm = $row_admincekNilai['id_guru_mp'];
											$tamAdmik = $row_admincekNilai['id_kelas'];
											$tamAdmnmp = $row_admincekNilai['nama_mapel'];
											$tamAdmsmstr = $row_admincekNilai['semester'];
									?>
									<tr>
										<td><?php echo $adminNilaink.'/',$adminNilairk;?></td>
										<td><?php echo $adminNilaita;?></td>
										<td><?php echo $adminNilainmp;?></td>
										<td><?php echo $adminNilaing;?></td>
										<td><?php echo $tamAdmsmstr;?></td>
										<?php 
											if (( $adminNilaiig == $tamAdmigm ) AND ($adminNilaiik == $tamAdmik)
												AND ($adminNilainmp == $tamAdmnmp)){
												$Statusnilai = ".";
												$gayaupload = "uploadni";
											}else{
												$Statusnilai = "X";
												$gayaupload = "belomup";
											} 
											?>
										<td id="<?php echo $gayaupload;?>"><?php echo $Statusnilai;?></td>
										<td>
											<?php if($hak_akses == 1){?><form action="halamanadmin.php#formulir_admin_lihat_nilai" method="GET"><?php } ?>
											<?php if($hak_akses == 2){?><form action="halamankepsek.php#formulir_admin_lihat_nilai" method="GET"><?php } ?>
												<input type="hidden" name="eik" value="<?php echo $tamAdmik;?>">
												<input type="hidden" name="es" value="<?php echo $tamAdmsmstr;?>">
												<input type="hidden" name="enm" value="<?php echo $tamAdmnmp;?>">
												<input type="hidden" name="eidg" value="<?php echo $tamAdmigm;?>">
												<?php 
												if (( $adminNilaiig == $tamAdmigm ) AND ($adminNilaiik == $tamAdmik)
													AND ($adminNilainmp == $tamAdmnmp)){
												?>
												<input type="submit" name="ienk" value="Lihat" id="admin_lini"/>
												<?php } ?>
											</form>
										</td>
									</tr>
									<?php } ?>
								</table>	
							</div>
						</div>
					</div>