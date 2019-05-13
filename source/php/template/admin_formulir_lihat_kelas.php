	<div id="formulir_lihat_kelas" class="admin_formulir_muncul">
			<?php if($hak_akses == 1){?>
			<div id="tehy">
				<div class="tatus">
					<span>Tambah Data Kelas</span>
				</div>
				<div class="tatu1">
					<a href="#formulir_kelas">+</a>
				</div>
			</div>
			<?php } ?>
		<div id="admin_formulir3">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Daftar Kelas</h2>
			</div>
			<p id="deail_kelas">Daftar Kelas Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
			<div class="bungkus_kelas">
				<hr/>
				<table id="tabel_kelas">
					<tr>
						<th>Nama Kelas</th>
						<th>Jumlah Siswa</th>
						<th>Wali Kelas</th>
						<th>Tahun Ajaran</th>
						<th>Keterangan</th>
						<?php if($hak_akses == 1){?>
						<th></th>
						<?php } ?>
					</tr>
						<!-- kertas formulir admin untuk tambah Pengumuman -->
							<?php
								$tam_kel = tampilKelas();
								while($row_kel=mysqli_fetch_assoc($tam_kel)){
									$sql_jm = $row_kel ['id_kelas'];
									$q_jum= jumlahMurid($sql_jm);
									$hjm = mysqli_fetch_assoc($q_jum);
									$ta_jum= moonMur($sql_jm);
									
							?>
						<!-- kertas formulir admin untuk tambah Pengumuman -->
						<tr>
							<td>
								<div class="nam_kel">
									<span><?php echo $row_kel['nama_kelas']?>/<?php echo $row_kel['ruang_kelas']?>
										<p>
											<?php if($hak_akses == 1){?>
											<a href="?id_klas=<?php echo $row_kel['id_kelas']; ?>#formulir_tambah_jadwal">+ <strong id="edit_jad">tambah Jadwal</strong></a>
											<a href="?id_jdl=<?php echo $row_kel['id_kelas'];?>#formulir_lihat_jadwal"> E<strong id="li_jad">Lihat Jadwal</strong></a>
											<?php } ?>
											<?php if($hak_akses == 2){?>
											<a href="?id_jdl=<?php echo $row_kel['id_kelas'];?>#formulir_lihat_jadwal"> E<strong id="edit_jad">Laporan Jadwal</strong></a>
											<?php } ?>
										</p>
									</span>
								</div>
							</td>
							<td>
								<div class="jummur">
									<span><?php echo $hjm['jumlah_murid'];?>
									<p><strong>DAFTAR MURID</strong>
									<?php
										while($tajm = mysqli_fetch_assoc($ta_jum)){
											echo $tajm['nama_murid']."<br/>";
										}
									?>
									 </p></span>
								</div>
							</td>
							<td><?php echo $row_kel['nama_guru'];?></td>
							<td><?php echo $row_kel['tahun_ajaran'];?></td>
							<td><?php echo $row_kel['status_kelas'];?></td>
							<?php if($hak_akses == 1){?>
							<td><a class="tombol_kelas tgi" href="../../source/php/delete_kelas.php?id_kelas=<?php echo $row_kel['id_kelas'];?>" onclick="return confirm('Yakin Untuk Menghapus Kelas \'<?php echo $row_kel["nama_kelas"]?>/<?php echo $row_kel["ruang_kelas"]?>\' Pada Tahun Ajaran \'<?php echo $row_kel["tahun_ajaran"]?>\' ?')" id="hapus_kontak" title="Hapus Kelas">'</a> <a href="?id_kls=<?php echo $row_kel['id_kelas']?>#formulir_edit_kelas" title="Edit Kelas" id="edit_kontak" class="tombol_kelas tgi">S</a></td>
							<?php } ?>
					
						<?php } //endwhile?>
					</tr>
				</table>
				<hr/>
		</div>

		</div>
		<div class="clear"></div>
	</div>