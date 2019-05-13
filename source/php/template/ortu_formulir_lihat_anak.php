					<div id="formulir_murid" class="admin_formulir_muncul1">
						<div id="admin_formulir_nilai">
							<h2>Data Anak </h2>
							<p id="admin_penjelasan">Formulir Orangtua Untuk Melihat Data Anak Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							<div id="admin_cari">

								<!-- PHP Panigation Data Data Murid -->
								<?php 
									$articel_murid = "SELECT * FROM foto, murid, ortu WHERE foto.id_murid = murid.id_murid AND murid.id_ortu=ortu.id_ortu AND ortu.id_ortu = $user_ortu ORDER BY nama_murid";
									$hasil_lihat_murid = mysqli_query($con, $articel_murid);
								?>
								<!-- PHP Panigation Data Murid -->
							</div>
							<div class="admin_formulir_data_ortu_dalam_lengkap">

								<!-- PHP Menampilkan Data Murid -->
								<?php 
									while($row_murid=mysqli_fetch_assoc($hasil_lihat_murid)){
								?>
								<!-- PHP Menampilkan Data Murid -->

								<div class="ortu_lihat_anak">
									<div class="admin_lihat_foto_ortu1">
										<img src="../../image/murid/<?php echo $row_murid['nama_foto']; ?>" />
									</div>
									<div class="admin_lihat_detail_ortu">
										<div class="admin_lihat_data_ortu_nama_dan_alamat">
											<div class="admin_lihat_data_ortu_na">
												<a href=""><?php echo $row_murid['nama_murid'];?></a>
												<div class="clear"></div>
												<i><?php echo $row_murid['NIM'];?></i>
											</div>
											<div class="ortu_edit_murid">
												<a href="?id_ortu=<?php echo $row_murid['id_ortu'];?>&id_murid=<?php echo $row_murid['id_murid'];?>#formulir_kelima"><span>S</span><div class="tooltip2">Edit Data Murid</div></a>
											</div>
											<div class="clear"></div>
										</div>
										<div class="admin_lihat_data_ortu_kiri">
											<p>Angkatan : <?php echo $row_murid['angkatan'];?></p>
											<p>Tempat Lahir 		: <?php echo $row_murid['tempat_lahir'];?></p>
										</div>
										<div class="admin_lihat_data_ortu_kanan">
											
											<p>Tanggal Lahir 	: <?php $tgl = $row_murid['tanggal_lahir']; echo tanggalIndonesia($tgl); ?></p>
											<p> Alamat Ortu 		: <?php echo $row_murid['alamat'];?></p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
									<?php } //endwhile?>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>