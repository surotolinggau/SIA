<?php if(isset($_GET['id_jdl'])){ ?>
	<div id="formulir_lihat_jadwal" class="admin_formulir_muncul1">
		<div id="admin_formulir_jadwal">
			<!-- kertas formulir admin untuk tambah Pengumuman -->
				<?php
					$tam_jad = editKelas($_GET['id_jdl']);
					$row_jad = mysqli_fetch_assoc($tam_jad);
					$jadidgu = $row_jad['id_guru'];
					$tamjfg = jadTfg($jadidgu);
					$row_jfg = mysqli_fetch_assoc($tamjfg);
					$row_jfg['nama_foto'];

				?>
			<!-- kertas formulir admin untuk tambah Pengumuman -->
			<div class="error1 naik_depan">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<div class="clear"></div>
			<div id="jadwal_kiri">
			</div>
			<div id="jadwal_tengah">
				<div id="jadkel">
					<p>KELAS <?php echo $row_jad['nama_kelas']?>/<?php echo $row_jad['ruang_kelas']?></p>
				</div>
				<div id="takel">
					<p><?php echo $row_jad['tahun_ajaran']?></p>
				</div>
				<div id="jadgar">
					<div class="jad_foto_guru"><img src="../../image/guru/<?php echo $row_jfg['nama_foto'];?>"/></div>
					<p>WALI KELAS</p>
					<hr/>
				</div>
				<div id="wakel">
					<span>/ </span> <p><?php echo $row_jad['nama_guru'];?></p>
				</div>
				<div class="clear"></div>
			</div>
			<div id="jadwal_kanan">
				<div class="bungkus_jadwal">
					<?php
						$tampjadhari = tampilJadhari($_GET['id_jdl']);
						while ($row_jadhari = mysqli_fetch_assoc($tampjadhari)) {
							$jad_harif = $row_jadhari['hari_jadwal'];
							$jad_hari = substr($jad_harif, 1, 10);
							$jad_hari = strtoupper($jad_hari);
					?>
					<div class="grid_jadwal">
						<div class="jadwal_hari">
							<p><?php echo $jad_hari;?></p>
						</div>
						<div class="isi_jadwal">
							<?php 
								$tampjadleng = tampilJadleng($jad_harif, $_GET['id_jdl']);
								while ($row_jadleng = mysqli_fetch_assoc($tampjadleng)) {
									$jammas = $row_jadleng['jam_masuk'];
									$jamsel = $row_jadleng['jam_selesai'];
									$jammas = substr($jammas, 0, -3);
									$jamsel = substr($jamsel, 0, -3);
							?>
							<div id="element_jadwal">
								<p><?php if($hak_akses==1){?><a href="?id_jdl=<?php echo $_GET['id_jdl'];?>&hapus_jadwal=<?php echo $row_jadleng['id_jadwal'];?>#formulir_lihat_jadwal" onclick="return confirm('Yakin Untuk Menghapus Mata Pelajaran \'<?php echo $row_jadleng['nama_mp'].' Pada Jam '.$jammas.'-'.$jamsel;?>\' ?')" id="hapus_jadwa"> Hapus</a><?php } ?><?php echo $jammas.'-'.$jamsel;?></p>
								<span><?php if($hak_akses==1){?><a href="?id_jadwal=<?php echo $row_jadleng['id_jadwal'];?>#formulir_edit_jadwal" id="edit_jadwa"> Edit</a><?php } ?><?php echo $row_jadleng['nama_mp'];?></span>
							</div>
							<?php } ?>
							
						</div>
					</div>
					<?php } ?>
					<div class="clear"></div>
				</div>
				
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
<?php } ?>