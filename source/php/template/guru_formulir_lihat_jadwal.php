	<div id="formulir_guru_lihat_jadwal" class="admin_formulir_muncul1">
		<div id="admin_formulir_lihat_jadwalg">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Jadwal Guru</h2>
			</div>
			<div class="clear"></div>
			<p id="deail_jadwal">Jadwal Guru Mengajar Pada Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_mp">
					<?php
						$tamJadguru = tamJadguru($user_guru);
						while($row_tamjadguru = mysqli_fetch_assoc($tamJadguru)){					
					?>
					<p id="mapel_jadwal_guru"><?php echo 'Kelas '.$row_tamjadguru['nama_kelas'].'/'.$row_tamjadguru['ruang_kelas'].' '.$row_tamjadguru['nama_mp'].' '.$row_tamjadguru['tahun_ajaran'];?></p>
					<div class="clear"></div>
					<div id="bungkus_jadwal_guru">
					<?php 
						$jadguru_idmp = $row_tamjadguru['id_mp'];
						$jadguru_idkls = $row_tamjadguru['id_kelas'];
						$tamHarjadguru = tamHarjadguru($user_guru, $jadguru_idmp, $jadguru_idkls);
						while($row_tamHarijadguru = mysqli_fetch_assoc($tamHarjadguru)){
							$jadguruhari = $row_tamHarijadguru['hari'];
							$jad_hariguru = substr($jadguruhari, 1, 10);
							$jad_hariguru = strtoupper($jad_hariguru);
					?>
						<div class="bungkus_jadwal_hari">
							<div class="isi_jadwal_guru">
								<div id="jadwal_hari_guru">
									<p><?php echo $jad_hariguru;?></p>
								</div>
								
								<div id="jadwal_jam_guru">
								<?php 
									$tamJamkelasguru = tamJamkelasguru($jadguru_idmp, $user_guru, $jadguru_idkls, $jadguruhari);
									while($row_tamJamkelasguru = mysqli_fetch_assoc($tamJamkelasguru)){
								?>
									<p id="jadwal_jam_bawah">Jam Masuk</p><p id="jadwal_jam_bawah">Jam Selesai</p>
									<p id="jadwal_jam_atas"><?php echo $row_tamJamkelasguru['jam_masuk'];?></p><p id="jadwal_jam_atas"><?php echo $row_tamJamkelasguru['jam_selesai'];?></p>
									<?php } ?>
									<div class="clear"></div>
								</div>
								
							</div>
							<div class="clear"></div>
						</div>
						<?php } ?>
					</div>
					<div class="clear"></div>
					<?php } ?>
				</div>
		</div>
		<div class="clear"></div>
	</div>