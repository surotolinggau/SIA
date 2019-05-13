					<div id="formulir_guru" class="admin_formulir_muncul1">
						<?php if($hak_akses == 1){?>
						<div id="tehy">
							<div class="tatus">
								<span>Tambah Data Guru</span>
							</div>
							<div class="tatu">
								<a href="#formulir_tambah_guru">+</a>
							</div>
						</div>
						<?php } ?>
						<div id="admin_formulir_lihat_data_ortu">
							
							<div class="clear"></div>
							<h2>Daftar Lengkap Guru</h2>
							<p id="admin_penjelasan">Daftar Guru Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							<div id="admin_cari">

								<!-- PHP Tampil Data dan Pencarian Orangtua -->
								<?php 
									$perpage_guru = 6;
									$page_guru = isset($_GET["hln"]) ? (int)$_GET["hln"] : 1;
									$start_guru = ($page_guru > 1) ?($page_guru * $perpage_guru) - $perpage_guru : 0;
									$query_guru = "SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru ORDER BY nama_guru LIMIT $start_guru, $perpage_guru ";
									$result_guru = mysqli_query($con, $query_guru);
									if(isset($_GET['cari_guru'])){
										$cari_guru = $_GET['cari_guru'];
										$result_guru = hpGuru($cari_guru);
									}
								?>
								<!-- PHP Tampil Data dan Pencarian Orangtua -->

								<form action="" method="GET">
									<input type="search" name="cari_guru" placeholder="Cari Nama Guru...">
								</form>
							</div>
							<div class="admin_formulir_data_ortu_dalam_lengkap">

							<!-- PHP Tampil Data dan Pencarian Orangtua -->
								<?php 
									while($row_guru=mysqli_fetch_assoc($result_guru)):
								?>
							<!-- PHP Tampil Data dan Pencarian Orangtua -->

								<div class="admin_lihat_data_ortu_lengkap">
									<div class="admin_lihat_foto_ortu1">
										<img src="../../image/guru/<?php echo $row_guru['nama_foto']; ?>" />
									</div>
									<div class="admin_lihat_detail_ortu">
										<div class="admin_lihat_data_ortu_nama_dan_alamat">
											<div class="admin_lihat_data_ortu_na">
												<a href=""><?php echo $row_guru['nama_guru'];?></a>
												<div class="clear"></div>
												<i><?php echo $row_guru['jabatan'];?></i>
											</div>
											<div class="admin_lihat_data_ortu_logo">
												<?php if($hak_akses == 1){?>
												<a href="?id_guru=<?php echo $row_guru['id_guru'];?>#formulir_edit_guru"><span>S</span><div class="tooltip2">Edit Data Guru</div></a>
												<a href="../../source/php/delete_guru.php?id_guru=<?php echo $row_guru['id_guru'];?>" onclick="return confirm('Yakin Untuk Menghapus Data <?php echo $row_guru['nama_guru'];?>')">
													<span id="hapus_murid" >\</span><div class="tooltip3">Hapus Data Guru</div>
												</a>
												<?php } ?>
											</div>
											<div class="clear"></div>
										</div>
										<div class="admin_lihat_data_ortu_kiri">
											<p>NUPTK		: <?php echo $row_guru['nuptk'];?></p>
											<p>Status Guru 		: <?php echo $row_guru['status'];?></p>
											<p>Jenis Kelamin 	: <?php echo $row_guru['jk_guru'];?></p>
										</div>
										<div class="admin_lihat_data_ortu_kanan">
											<p>No Handphone : <?php echo "+62".$row_guru['no_tel'];?></p>
											<p>Alamat	: </p>
											<p><?php echo $row_guru['alamat'];?></p>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<?php endwhile; //endwhile?>
								<!-- formulir admin untuk lihat data ortu -->

								<div class="clear"></div>

								<!-- PHP Panigation Lihat Data Orang Tua -->
								<?php if(!isset($_GET['cari_guru'])){?>
								<div class="panigation">
									<?php 
									$hasil_guru = mysqli_query($con, "SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru");
									$total_guru = mysqli_num_rows($hasil_guru);
									$pages_guru = ceil($total_guru/$perpage_guru);
									for($i=1; $i<=$pages_guru; $i++){?>
									<a href="?hln=<?php echo $i;?>#formulir_guru"><?php echo $i;?></a>
									<?php } ?>
								</div>
								<?php }?>
								<!-- PHP Panigation Lihat Data Orang Tua -->

							</div>
						</div>
					</div>