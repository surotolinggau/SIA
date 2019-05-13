					<div id="formulir_murid" class="admin_formulir_muncul1">
						<div id="admin_formulir_lihat_data_ortu">
							<h2>Daftar Lengkap Murid </h2>
							<p id="admin_penjelasan">Daftar Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							<div id="admin_cari">

								<!-- PHP Panigation Data Data Murid -->
								<?php 
									$perpage_murid = 6;
									$page_murid = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
									$start_murid = ($page_murid > 1) ?($page_murid * $perpage_murid) - $perpage_murid : 0;
									$articel_murid = "SELECT * FROM foto, murid, ortu WHERE foto.id_murid = murid.id_murid AND murid.id_ortu=ortu.id_ortu ORDER BY nama_murid LIMIT $start_murid, $perpage_murid ";
									$hasil_lihat_murid = mysqli_query($con, $articel_murid);
									if(isset($_GET['cari_murid'])){
										$cari_murid = $_GET['cari_murid'];
										$hasil_lihat_murid = hasilPencarian_murid($cari_murid);
									}
								?>
								<!-- PHP Panigation Data Murid -->

								<form action="" method="GET">
									<input type="search" name="cari_murid" placeholder="Cari Nama Murid...">
								</form>
							</div>
							<div class="admin_formulir_data_ortu_dalam_lengkap">

								<!-- PHP Menampilkan Data Murid -->
								<?php 
									while($row_murid=mysqli_fetch_assoc($hasil_lihat_murid)){
								?>
								<!-- PHP Menampilkan Data Murid -->

								<div class="admin_lihat_data_ortu_lengkap">
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
											<div class="admin_lihat_data_ortu_logo">
												<?php if($hak_akses == 1){?>
												<a href="?id_ortu=<?php echo $row_murid['id_ortu'];?>&id_murid=<?php echo $row_murid['id_murid'];?>#formulir_kelima"><span>S</span><div class="tooltip2">Edit Data Murid</div></a>
												<a href="../../source/php/delete_murid.php?id_murid=<?php echo $row_murid['id_murid'];?> & id_ortu=<?php echo $row_murid['id_ortu'];?>" onclick="return confirm('Yakin Untuk Menghapus Data <?php echo $row_murid['nama_murid'];?>')">
													<span id="hapus_murid" >\</span><div class="tooltip3">Hapus Data Murid</div>
												</a>
												<?php } ?>
											</div>
											<div class="clear"></div>
										</div>
										<div class="admin_lihat_data_ortu_kiri">
											<p>Angkatan : <?php echo $row_murid['angkatan'];?></p>
											<p>Status Murid : <?php echo $row_murid['status_murid'];?></p>
											<p>Jenis Kelamin	: <?php echo $row_murid['jenis_kelamin_murid'];?></p>
										</div>
										<div class="admin_lihat_data_ortu_kanan">
											<p>Tempat Lahir 		: <?php echo $row_murid['tempat_lahir'];?></p>
											<p>Tanggal Lahir 	: <?php $tgl = $row_murid['tanggal_lahir']; echo tanggalIndonesia($tgl); ?></p>
											<p>Nama Ortu 	: <?php echo $row_murid['nama_ortu'];?></p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
									<?php } //endwhile?>
								<div class="clear"></div>
								<?php if(!isset($_GET['cari_murid'])){?>
								<div class="panigation">

									<!-- PHP Nomor Urut Panigation Data Murid -->
									<?php 
									$hasil_murid = mysqli_query($con, "SELECT * FROM foto, murid WHERE foto.id_murid = murid.id_murid");
									$total_murid = mysqli_num_rows($hasil_murid);
									$pages_murid = ceil($total_murid/$perpage_murid);
									for($i=1; $i<=$pages_murid; $i++){ ?>
									<a href="?hlm=<?php echo $i;?>#formulir_murid"><?php echo $i;?></a>
									<?php } ?>
									<!-- PHP Nomor Urut Panigation Data Murid -->

								</div>
								<?php } ?>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>