	<div id="formulir_lihat_mp" class="admin_formulir_muncul">
		<?php if($hak_akses == 1){?>
			<div id="tehy">
				<div class="tatus">
					<span>Tambah Mata Pelajaran</span>
				</div>
				<div class="tatu1">
					<a href="#formulir_tmp">+</a>
				</div>
			</div>
			<?php } ?>
		<div id="admin_formulir3">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Daftar Mata Pelajaran</h2>
			</div>
			<div class="clear"></div>
			<div class="error1">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<div class="clear"></div>
			<p id="deail_kelas">Daftar Mata Pelajaran Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
			<div class="bungkus_kelas">
				<table id="tabel_kelas">
					<tr>
						<th>Nama Pelajaran</th>
						<th>Keterangan</th>
						<th></th>
						<?php if($hak_akses == 1){?>
						<th></th>
						<?php } ?>
					</tr>
						<!-- kertas formulir admin untuk tambah Pengumuman -->
							<?php
								$tam_mp = tampilMP();
								while($row_mp=mysqli_fetch_assoc($tam_mp)){
									
							?>
						<!-- kertas formulir admin untuk tambah Pengumuman -->
						<tr>
							<td><?php echo $row_mp['nama_mp']?></td>
							<td><?php echo $row_mp['ket_mp'];?></td>
							<td><a href="?id_pengajar=<?php echo $row_mp['id_mp'];?>#formulir_lihat_pengajar" id="lihat_pengajar">Lihat Pengajar</a></td>
							<?php if($hak_akses == 1){?>
							<td><a class="tombol_kelas tgi" href="../../source/php/delete_pmp.php?id_mp=<?php echo $row_mp['id_mp']?>" onclick="return confirm('Yakin Untuk Menghapus Mata Pelajaran \'<?php echo $row_mp['nama_mp']?>\' ?')" id="hapus_kontak" title="Hapus <?php echo $row_mp['nama_mp']?>">'</a> <a href="?id_mp=<?php echo $row_mp['id_mp']?>#formulir_tmp" title="Edit <?php echo $row_mp['nama_mp']?>" id="edit_kontak" class="tombol_kelas tgi">S</a></td>
							<?php } ?>
							
					
						<?php } //endwhile?>
					</tr>
				</table>
				<hr/>
		</div>

		</div>
		<div class="clear"></div>
	</div>