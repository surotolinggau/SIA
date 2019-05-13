	<?php if(isset($_GET['id_pengajar'])){ ?>
		<div id="formulir_lihat_pengajar" class="admin_formulir_muncul">
				<?php
					$tam_pengajar = tampilMpengajar($_GET['id_pengajar']);
					$row_pengajar=mysqli_fetch_assoc($tam_pengajar);	
				?>
			<div id="admin_formulir3">
				<div class="info_kelas">
					<h2 id="judul_tambah_kelas">Daftar Pengajar</h2>
				</div>
				<div class="clear"></div>
				
				<p id="deail_kelas">Daftar Guru Mata Pelajaran <span><?php echo $row_pengajar['nama_mp']; ?></span> Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_kelas">
					<hr/>
					<table id="tabel_kelas">
						<tr>
							<th>Nama Guru</th>
							<th>Nama Kelas</th>
							<th>Tahun Ajaran</th>
							<?php if($hak_akses == 1){?>
							<th></th>
							<?php } ?>
						</tr>
						<?php
							$tam_ajar = tampilPengajar($_GET['id_pengajar']);
							while($row_ajar=mysqli_fetch_assoc($tam_ajar)){	
								$ajarkelas = $row_ajar['id_kls'];
								$ajarguru =  $row_ajar['id_guru_mp'];
								$ajarmapel =  $row_ajar['id_mp'];
									$queryggta = "SELECT * FROM kelas WHERE id_kelas = $ajarkelas ";
									$hasilnja = mysqli_query($con, $queryggta);
									$hgsa = mysqli_fetch_assoc($hasilnja);
									$queryguru = "SELECT * FROM guru WHERE id_guru = $ajarguru ";
									$hasilguru = mysqli_query($con, $queryguru);
									$guru_ajar = mysqli_fetch_assoc($hasilguru);
						?>
						<tr>
							<td><?php echo $guru_ajar['nama_guru']; ?></td>
							<td><?php echo $hgsa['nama_kelas'].'/'.$hgsa['ruang_kelas'] ; ?></td>
							<td><?php echo $hgsa['tahun_ajaran'] ; ?></td>
							<?php if($hak_akses == 1){?>
							<td><a class="tombol_kelas tgi" href="../../source/php/delete_pmp.php?id_pengajar=<?php echo $ajarguru;?>&id_mapel=<?php echo $ajarmapel;?>&id_klas=<?php echo $ajarkelas;?>" onclick="return confirm('Yakin Untuk Menghapus \'<?php echo $guru_ajar['nama_guru'];?>\' Pada Kelas \' <?php echo $hgsa['nama_kelas'];?>\/<?php echo $hgsa['ruang_kelas'];?> ?')" id="hapus_kontak" title="Hapus <?php echo $row_mp['nama_mp']?>">'</a></td>
							<?php } ?>
							<?php } ?>
						</tr>
					</table>
					<hr/>
			</div>

			</div>
			<div class="clear"></div>
		</div>
	<?php } ?>