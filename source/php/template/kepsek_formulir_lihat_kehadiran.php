		<div id="formulir_kepsek_lihat_kehadiran" class="admin_formulir_muncul1">
			<div id="guru_formulir_lihat_kelas">
				<div class="error tngah">
					<div class="isi_error <?php echo $error2;?>">
						<p><?php echo $error1;?></p>
						<h3><?php echo $error;?></h3>
					</div>
				</div>
				<div class="info_kelas">
					<h2 id="judul_tambah_kelas">Laporan Kehadiran Murid</h2>
				</div>
				<div class="bungkus_kelas_guru huy">
					<div class="admin_formulir_data_ortu_dalam_lengkap">
						<div class="clear"></div>
						<?php 
							if(isset($_GET['kepsek_lihat_kehadiran'])){
								$kepsekhadirNamakelas = $_GET['kepsekhadirNamakelas'];
								$kepsekhadirRuangkelas = $_GET['kepsekhadirRuangkelas'];
								$kepsekhadirTahunajar = $_GET['kepsekhadirTahunajar'];
								$kepsekhadirBulan = $_GET['kepsekhadirBulan'];
								$kepsekhadirTahun = $_GET['kepsekhadirTahun'];
								if($kepsekhadirBulan == '01'){ $tulisanBulan = 'Januari';}
								if($kepsekhadirBulan == '02'){ $tulisanBulan = 'Februaari';}
								if($kepsekhadirBulan == '03'){ $tulisanBulan = 'Maret';}
								if($kepsekhadirBulan == '04'){ $tulisanBulan = 'April';}
								if($kepsekhadirBulan == '05'){ $tulisanBulan = 'Mei';}
								if($kepsekhadirBulan == '06'){ $tulisanBulan = 'Juni';}
								if($kepsekhadirBulan == '07'){ $tulisanBulan = 'Juli';}
								if($kepsekhadirBulan == '08'){ $tulisanBulan = 'Agustus';}
								if($kepsekhadirBulan == '09'){ $tulisanBulan = 'September';}
								if($kepsekhadirBulan == '10'){ $tulisanBulan = 'Oktober';}
								if($kepsekhadirBulan == '11'){ $tulisanBulan = 'November';}
								if($kepsekhadirBulan == '12'){ $tulisanBulan = 'Desember';}
								
								$queryPilihkelas = "SELECT * FROM kelas WHERE nama_kelas='$kepsekhadirNamakelas' AND ruang_kelas='$kepsekhadirRuangkelas' AND tahun_ajaran = '$kepsekhadirTahunajar'";
								$sqlPilihkelas = mysqli_query($con, $queryPilihkelas);
								$tamIDKShadir = mysqli_fetch_assoc($sqlPilihkelas);
								$hadir_idKls = $tamIDKShadir['id_kelas'];
								$queryHarihadir = "SELECT DISTINCT hari FROM kehadiran, kelas_siswa WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_kelas=$hadir_idKls AND kehadiran.bulan='$kepsekhadirBulan' AND kehadiran.tahun='$kepsekhadirTahun'";
								$sqlHarikehadiran = mysqli_query($con, $queryHarihadir);
								$queryIdMuridhadir = "SELECT DISTINCT id_murid FROM kehadiran, kelas_siswa WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_kelas=$hadir_idKls AND kehadiran.bulan='$kepsekhadirBulan' AND kehadiran.tahun='$kepsekhadirTahun'";
								$sqlIdMuridhadir= mysqli_query($con, $queryIdMuridhadir);
						?>
						<div class="clear"></div>
						<div id="hkshda">
							<?php if(mysqli_num_rows($sqlHarikehadiran) < 1){?>
							<div id="title_niai">
								<span>Data Kehadiran Murid Kosong/Belum Diinput</span>
							</div>
							<?php }else{?>
							<div id="title_niai">
							<span><?php echo 'Daftar Kehadiran Murid Bulan '.$tulisanBulan.' Tahun '.$kepsekhadirTahun.' Dikelas '.$kepsekhadirNamakelas.'/'.$kepsekhadirRuangkelas.' Tahun Ajaran '.$kepsekhadirTahunajar;?></span>
							</div>
							<table id="tabel_kehadiran">
								<tr>
									<th><?php echo 'Bulan '.$tulisanBulan;?></th>
									<?php while($tamHarikehadiran = mysqli_fetch_assoc($sqlHarikehadiran)){?>
									<th><?php echo $tamHarikehadiran['hari'];?></th>
									<?php } ?>
								</tr>
								<?php while($tamIdMuridhadir = mysqli_fetch_assoc($sqlIdMuridhadir)){ $HadirIdmurid = $tamIdMuridhadir['id_murid'];?>
								<tr>
									<td>
										<?php
										$queryMuridhadir = "SELECT nama_murid FROM murid WHERE id_murid = $HadirIdmurid";
										$sqlMuridhadir = mysqli_query($con, $queryMuridhadir);
										$tamMuridhadir = mysqli_fetch_assoc($sqlMuridhadir);
										echo $tamMuridhadir['nama_murid'];
										?>
									</td>
									<?php 
									$queryKethadir = "SELECT keterangan_hadir FROM kehadiran, kelas_siswa WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_kelas=$hadir_idKls AND kelas_siswa.id_murid=$HadirIdmurid AND kehadiran.bulan='$kepsekhadirBulan' AND kehadiran.tahun='$kepsekhadirTahun'";
									$sqlKethadir= mysqli_query($con, $queryKethadir);
									while($tamKethadir= mysqli_fetch_assoc($sqlKethadir)){
									?>
									<td><?php echo $tamKethadir['keterangan_hadir'];?></td>
									<?php } ?>
								</tr>
								<?php } ?>
							</table>
							<div id="note_kehadiran">
								<i>#Catatan :</i><p> *H = Hadir</p><p>*TH = Tidak Hadir</p><p>*I = Izin</p><p>*S = Sakit</p>
							</div>
						</div>
						<?php } } ?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>