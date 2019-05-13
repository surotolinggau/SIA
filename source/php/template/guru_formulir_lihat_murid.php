					<?php if(isset($_GET['id_klsgr'])){ ?>
					<div id="formulir_guru_lm" class="admin_formulir_muncul1">
						<!-- <div id="tombol_print">
							<p id="logo_print" onclick="window.print()" >d</p>
						</div> -->
						<div id="admin_formulir_lihat_data_ortu">
						
						<?php 
							$tam_nmkls_guru = tamMurgu($_GET['id_klsgr']);
							$row_tam_nmkl_guru = mysqli_fetch_assoc($tam_nmkls_guru);

						?>
							<h2>Daftar Murid Pada Kelas <?php echo $row_tam_nmkl_guru['nama_kelas'].'/'.$row_tam_nmkl_guru['ruang_kelas']; ?></h2>
							<h3 id="tahun_ajaran_mg"><?php echo $row_tam_nmkl_guru['tahun_ajaran'];?></h3>
							<div id="admin_cari">

								<!-- PHP Panigation Data Data Murid -->
								<?php 
									$perpage_murid = 6;
									$page_murid = isset($_GET["hlm"]) ? (int)$_GET["hlm"] : 1;
									$start_murid = ($page_murid > 1) ?($page_murid * $perpage_murid) - $perpage_murid : 0;
									$hasil_lihat_murid = tamMurgulen($_GET['id_klsgr']);
									if(isset($_GET['id_klsgr']) && isset($_GET['cari_murid'])){
										$cari_mg = $_GET['cari_murid'];
										$id_mg = $_GET['id_klsgr'];
										$hasil_lihat_murid = hasilPencarian_muridleng($id_mg, $cari_mg);
									}
								?>
								<!-- PHP Panigation Data Murid -->
								<div id="cari_murid_guru">
									<form action="" method="GET">
										<input type="hidden" name="id_klsgr" value="<?php echo $_GET['id_klsgr'];?>" />
										<input type="search" name="cari_murid" placeholder="Cari Nama Murid...">
									</form>
								</div>
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
										</div>
									</div>
									<div class="clear"></div>
								</div>
									<?php } //endwhile?>
								<div class="clear"></div>
								<div class="panigation">

									<!-- PHP Nomor Urut Panigation Data Murid -->
									<?php 
									
									$total_murid = mysqli_num_rows($hasil_lihat_murid);
									$pages_murid = ceil($total_murid/$perpage_murid);
									for($i=1; $i<=$pages_murid; $i++){ ?>
									<a href="?hlm=<?php echo $i;?>#formulir_guru_lm"><?php echo $i;?></a>
									<?php } ?>
									<!-- PHP Nomor Urut Panigation Data Murid -->

								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<?php } //Endwhile lihat murid guru?>