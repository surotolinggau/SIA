		<div id="formulir_guru_lihat_kelas" class="admin_formulir_muncul1">
			<div id="guru_formulir_lihat_kelas">
				<div class="info_kelas">
					<h2 id="judul_tambah_kelas">Data Kelas</h2>
				</div>
				<div class="bungkus_kelas_guru">
					<?php $cari_kelas_bimbingan_user = cariKBU($user_guru);
						if(mysqli_num_rows($cari_kelas_bimbingan_user) > 0 ){  
					?>
					<div id="kelas_bimbingan_guru">
						<p>KELAS BIMBINGAN</p>
						<table id="tabel_kelas">
							<tr>
								<th>Nama Kelas</th>
								<th>Jumlah Siswa</th>
								<th>Wali Kelas</th>
								<th>Tahun Ajaran</th>
								<th>Keterangan</th>
								<th></th>
							</tr>
								<?php 
									$tampilKelasbg = tampilKelasbg($user_guru);
									while($row_kelas_bimbingan_guru = mysqli_fetch_assoc($tampilKelasbg)){
										$sql_jm = $row_kelas_bimbingan_guru['id_kelas'];
										$q_jum= jumlahMurid($sql_jm);
										$hjm = mysqli_fetch_assoc($q_jum);
								?>
							<tr>
								<td><?php echo $row_kelas_bimbingan_guru['nama_kelas'].'/'.$row_kelas_bimbingan_guru['ruang_kelas'];?></td>
								<td><?php echo $hjm['jumlah_murid'];?></td>
								<td><?php echo $row_kelas_bimbingan_guru['nama_guru'];?></td>
								<td><?php echo $row_kelas_bimbingan_guru['tahun_ajaran'];?></td>
								<td><?php echo $row_kelas_bimbingan_guru['status_kelas'];?></td>
								<td><a href="?id_klsgr=<?php echo $sql_jm;?>#formulir_guru_lm" id="murid_guru">MURID</a></td>
							</tr>
							<?php } //Endwhile Tampil kelas bimbingan Guru?>
						</table>
					</div>
					<div class="clear"></div>
					<?php } //ENNWHILE cari kelas bimbingan Guru?>
					<div id="kelas_bimbingan_guru">
						<p>KELAS MENGAJAR</p>
						<table id="tabel_kelas">
							<tr>
								<th>Nama Kelas</th>
								<th>Jumlah Siswa</th>
								<th>Wali Kelas</th>
								<th>Tahun Ajaran</th>
								<th>Keterangan</th>
								<th></th>
							</tr>
							<tr>
								<?php 
									$tampilKelasag = tampilKelasag($user_guru);
									while($row_idkls_ajar_guru = mysqli_fetch_assoc($tampilKelasag)){
									$hasil_idkls_ajar_guru = $row_idkls_ajar_guru['id_kls'];
										$q_jumb= jumlahMurid($hasil_idkls_ajar_guru);
										$hjmb = mysqli_fetch_assoc($q_jumb);
									$tampilKelasagl = editKelas($hasil_idkls_ajar_guru);
									while($row_hasil_tampilkag = mysqli_fetch_assoc($tampilKelasagl)){
								?>
								<td><?php echo $row_hasil_tampilkag['nama_kelas'].'/'.$row_hasil_tampilkag['ruang_kelas'];?></td>
								<td><?php echo $hjmb['jumlah_murid'];?></td>
								<td><?php echo $row_hasil_tampilkag['nama_guru'];?></td>
								<td><?php echo $row_hasil_tampilkag['tahun_ajaran'];?></td>
								<td><?php echo $row_hasil_tampilkag['status_kelas'];?></td>
								<td><a href="?id_klsgr=<?php echo $hasil_idkls_ajar_guru;?>#formulir_guru_lm" id="murid_guru">MURID</a></td>
								<!-- <td><button onclick="window.print()">Cetak Halaman Web</button></td> -->
								<?php  } //Endwhile Tampil kelas bimbingan Guru?>
							</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>