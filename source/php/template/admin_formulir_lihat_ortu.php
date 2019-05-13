<div id="formulir_kedua" class="admin_formulir_muncul1">
			<?php if($hak_akses == 1){?>
			<div id="tehy">
				<div class="tatus">
					<span>Tambah Data Ortu</span>
				</div>
				<div class="tatu">
					<a href="#formulir_pertama">+</a>
				</div>
			</div>
			<?php } ?>
			<div id="admin_formulir_lihat_data_ortu">
				
				<div class="clear"></div>
				<h2>Daftar Lengkap Ortangtua/Wali</h2>
				<p id="admin_penjelasan">Daftar Orangtua/Wali Murid Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div id="admin_cari">

					<!-- PHP Tampil Data dan Pencarian Orangtua -->
					<?php 
						$perpage = 6;
						$page = isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
						$start = ($page > 1) ?($page * $perpage) - $perpage : 0;
						$articel = "SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu and foto.id_murid = 0 ORDER BY nama_ortu LIMIT $start, $perpage ";
						$result_p = mysqli_query($con, $articel);
						if(isset($_GET['cari_ortu'])){
							$cari_ortu = $_GET['cari_ortu'];
							$result_p = hasilPencarian($cari_ortu);
						}
					?>
					<!-- PHP Tampil Data dan Pencarian Orangtua -->

					<form action="" method="GET">
						<input type="search" name="cari_ortu" placeholder="Cari Nama Orangtua/Wali...">
					</form>
				</div>
				<div class="admin_formulir_data_ortu_dalam_lengkap">

				<!-- PHP Tampil Data dan Pencarian Orangtua -->
					<?php 
						while($row_ortu=mysqli_fetch_assoc($result_p)):
					?>
				<!-- PHP Tampil Data dan Pencarian Orangtua -->

					<div class="admin_lihat_data_ortu_lengkap">
						<div class="admin_lihat_foto_ortu1">
							<img src="../../image/ortu/<?php echo $row_ortu['nama_foto']; ?>" />
							<?php if($hak_akses == 1){?>
							<div class="hapus_ortu_sia">
								<a href="../../source/php/delete_ortu.php?id_ortu=<?php echo $row_ortu['id_ortu'];?> " onclick="return confirm('Yakin Untuk Menghapus Data <?php echo $row_ortu['nama_ortu'];?>')" id="hapus_ort">HAPUS</a>
							</div>
							<?php } ?>
						</div>
						<div class="admin_lihat_detail_ortu">
							<div class="admin_lihat_data_ortu_nama_dan_alamat">
								<div class="admin_lihat_data_ortu_na">
									<a href=""><?php echo $row_ortu['nama_ortu'];?></a>
									<div class="clear"></div>
									<i><?php echo $row_ortu['pekerjaan'];?></i>
								</div>
								<div class="admin_lihat_data_ortu_logo">
									<?php if($hak_akses == 1){?>
									<a href="?id_ortu=<?php echo $row_ortu['id_ortu'];?>#formulir_ketiga"><span>S</span><div class="tooltip2">Edit Data Orang Tua</div></a>
									<a href="?id_ortu=<?php echo $row_ortu['id_ortu'];?>#formulir_keempat"><span>+</span><div class="tooltip">Tambah Data Murid</div></a>
									<?php } ?>
								</div>
								<div class="clear"></div>
							</div>
							<div class="admin_lihat_data_ortu_kiri">
								<p>Agama 		: <?php echo $row_ortu['agama'];?></p>
								<p>Jenis Kelamin 	: <?php echo $row_ortu['jenis_kelamin_ortu'];?></p>
							</div>
							<div class="admin_lihat_data_ortu_kanan">
								<p>No Handphone : <?php echo "+62".$row_ortu['no_telp'];?></p>
								<p>Alamat	: </p>
								<p><?php echo $row_ortu['alamat'];?></p>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<?php endwhile; //endwhile?>
					<!-- formulir admin untuk lihat data ortu -->

					<div class="clear"></div>

					<!-- PHP Panigation Lihat Data Orang Tua -->
					<?php if(!isset($_GET['cari_ortu'])){?>
					<div class="panigation">
						<?php 
						$hasil_p = mysqli_query($con, "SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu and foto.id_murid = 0");
						$total = mysqli_num_rows($hasil_p);
						$pages = ceil($total/$perpage);
						for($i=1; $i<=$pages; $i++){?>
						<a href="?hal=<?php echo $i;?>#formulir_kedua"><?php echo $i;?></a>
						<?php } ?>
					</div>
					<?php }?>
					<!-- PHP Panigation Lihat Data Orang Tua -->

				</div>
			</div>
		</div>