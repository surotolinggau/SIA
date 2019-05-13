					<div id="formulir_lihat_pengumuman" class="admin_formulir_muncul1">
						<div id="lihat_formulir_pengumuman">
							<h2>Daftar Pengumuman Terbaru</h2>
							<p id="admin_penjelasan">Daftar Pengumuman Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
							<div id="cari_pengumuman">
								<div class="t_peng">
								<a href="?tp=1#formulir_pengumuman">Tambah Pengumuman</a>
								<hr id="garis_bwh" />
								</div>
								<!-- PHP Tampil Data dan Pencarian Pengumuman berdasarkan judul -->
								<?php 
									$perpage_pengumuman = 6;
									$page_pengumuman = isset($_GET["hal_peg"]) ? (int)$_GET["hal_peg"] : 1;
									$start_pengumuman = ($page_pengumuman > 1) ?($page_pengumuman * $perpage_pengumuman) - $perpage_pengumuman : 0;
									$articel_pengumuman = "SELECT * FROM foto, pengumuman WHERE foto.id_pengumuman = pengumuman.id_pengumuman ORDER BY pengumuman.id_pengumuman DESC LIMIT $start_pengumuman, $perpage_pengumuman ";
									$isi_pe = mysqli_query($con, $articel_pengumuman);
									if(isset($_GET['cari_pengumuman'])){
										$cari_pengumuman = $_GET['cari_pengumuman'];
										$isi_pe = hasilPencarian_pengumuman($cari_pengumuman);
									}
								?>
								<!-- PHP Tampil Data dan Pencarian Pengumuman berdasarkan judul -->

								<form action="" method="GET">
									<input type="search" name="cari_pengumuman" placeholder="Cari Pengumuman...">
									<input type="button" value="L" name="cari_pengumuman" />
								</form>
							</div>
							<hr/>
							<div class="clear"></div>

								<!-- PHP Menampilkan Data Murid -->
								<?php 
									while($row_peng=mysqli_fetch_assoc($isi_pe)){
								?>
								<!-- PHP Menampilkan Data Murid -->

							<div class="isi_form_pengumuman">
								<div class="from_peng_foto">
									<img src="../../image/pengumuman/<?php echo $row_peng['nama_foto']; ?> " alt="foto Pengumuman"/>
									<div class="delanded">
										<a href="?id_pengumuman=<?php echo $row_peng['id_pengumuman'];?>#formulir_edit_pengumuman" id="update_pengumuman">EDIT</a>
										<div class="clear"></div>
										<a href="../../source/php/delete_pengumuman.php?id_pengumuman=<?php echo $row_peng['id_pengumuman'];?>&id_user=<?php echo $hak_akses;?>" onclick="return confirm('Yakin Untuk Menghapus Pengumumuman &ldquo; <?php echo $row_peng['judul_pengumuman'];?> &rdquo;.')" id="delete_pengumuman">DELETE</a>
										<div class="clear"></div>
										<a href="?id_pengumuman=<?php echo $row_peng['id_pengumuman'];?>#formulir_kirim_pengumuman" id="kirim_pengumuman">KIRIM</a>
									</div>
								</div>
								<div class="form_detail_peng">
									<p id="waktu_pengumuman"> <span>P</span> <?php echo $row_peng['tgl_pengumuman']. ' ' . $row_peng['jam_pengumuman'];?></p>
									<a href="../../pengumuman.php?id_pengumuman=<?php echo $row_peng['id_pengumuman'];?>"><?php echo $row_peng['judul_pengumuman'];?></a>
									<p id="isi_peng_isi"><?php echo $row_peng['isi_pengumuman'];?></p>
								</div>
								<div class="clear"></div>
							</div>
								<?php } //endwhile?>
							<div class="clear"></div>
							<div class="panigation">

									<!-- PHP Nomor Urut Panigation Data Pengumuman -->
									<?php 
									$hasil_pengumuman = mysqli_query($con, "SELECT * FROM foto, pengumuman WHERE foto.id_pengumuman = pengumuman.id_pengumuman");
									$total_pengumuman = mysqli_num_rows($hasil_pengumuman);
									$pages_pengumuman = ceil($total_pengumuman/$perpage_pengumuman);
									for($i=1; $i<=$pages_pengumuman; $i++){ ?>
									<a href="?hal_peg=<?php echo $i;?>#formulir_lihat_pengumuman"><?php echo $i;?></a>
									<?php } ?>
									<!-- PHP Nomor Urut Panigation Data Pengumuman -->

							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>