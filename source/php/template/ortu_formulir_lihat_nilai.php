		<?php 
			$semestersNilai = '';
			$bulansNilai = '';
			$tahunNilai = '';
			$id_kelasNilai = '';
			if(isset($_GET['nilai_murid'])){
				if(!isset($_GET['nama_kelas'])){
					$error = "Kolom Kelas/Semester Belum Diisi";
					$error1 = "-";
					$error2 = " warna_error";
				}else{ $id_kelasNilai = $_GET['nama_kelas'];}
				if(!isset($_GET['semstrnlai'])){
					$error = "Kolom Kelas/Semester Belum Diisi";
					$error1 = "-";
					$error2 = " warna_error";
				}else{ $semestersNilai = $_GET['semstrnlai'];}
			}
			if(isset($_GET['kehadiran_murid'])){
				if(!isset($_GET['nilai_bulan'])){
					$error = "Periksa Kembali Kolom Kelas, Bulan Tahun Apakah Sudah Diisi";
					$error1 = "-";
					$error2 = " warna_error";
				}else{ $bulansNilai = $_GET['nilai_bulan'];}
				if(!isset($_GET['nilai_tahun'])){
					$error = "Periksa Kembali Kolom Kelas, Bulan Tahun Apakah Sudah Diisi";
					$error1 = "-";
					$error2 = " warna_error";
				}else{ $tahunNilai = $_GET['nilai_tahun'];}
				if(!isset($_GET['nama_kelas'])){
					$error = "Periksa Kembali Kolom Kelas, Bulan Tahun Apakah Sudah Diisi";
					$error1 = "-";
					$error2 = " warna_error";
				}else{ $id_kelasNilai = $_GET['nama_kelas'];}
			}
		?>
		<div id="formulir_lihat_nilai_anak" class="admin_formulir_muncul1">
			<div id="guru_formulir_lihat_kelas">
				<div class="error tngah">
					<div class="isi_error <?php echo $error2;?>">
						<p><?php echo $error1;?></p>
						<h3><?php echo $error;?></h3>
					</div>
				</div>
				<div class="info_kelas">
					<h2 id="judul_tambah_kelas">Formulir Lihat Nilai dan Kehadiran Anak</h2>
				</div>
				<div class="bungkus_kelas_guru huy">
					<div class="admin_formulir_data_ortu_dalam_lengkap">
						<?php 
							$query_ortu_nilai_murid = "SELECT * FROM foto, murid, ortu WHERE foto.id_murid = murid.id_murid AND murid.id_ortu=ortu.id_ortu AND ortu.id_ortu = $user_ortu ORDER BY nama_murid ";
							$hasil_ortu_nilai_murid = mysqli_query($con, $query_ortu_nilai_murid);
							while($row_murid_ortu=mysqli_fetch_assoc($hasil_ortu_nilai_murid)){
						?>
						<div class="admin_lihat_data_ortu_lengkap">
							<div class="admin_lihat_foto_ortu1">
								<img src="../../image/murid/<?php echo $row_murid_ortu['nama_foto'];?>" />
							</div>
							<div class="admin_lihat_detail_ortu">
								<div class="admin_lihat_data_ortu_nama_dan_alamat">
									<div class="admin_lihat_data_ortu_nilai">
										<a href=""><?php echo $row_murid_ortu['nama_murid'];?></a>
										<div class="clear"></div>
										<i><?php echo $row_murid_ortu['NIM'];?></i>
									</div>
									<div class="admin_lihat_data_ortu_logo_nilai">
										<form action="" method="GET">
										<div class="jhjs"><input type="submit" class="nmuror liht_nil_mur" name="nilai_murid" value="("><div class="tooltip2">Lihat Nilai Murid</div></div>
										<div class="jhjs"><input type="submit" class="nmuror kehadiran_murid" name="kehadiran_murid" value=")"><div class="tooltip4">Kehadiran Murid</div></div>
										<!-- <a><input type="submit" value="("><span>(</span><div class="tooltip2">Lihat Nilai Murid</div></a>
										<a>
											<span id="hapus_murid">)</span><div class="tooltip3">Lihat Kehadiran</div>
										</a> -->
									</div>
									<div class="clear"></div>
								</div>
								<div class="admin_lihat_data_ortu_kiri_nilai">
									<p>Angkatan : <?php echo $row_murid_ortu['angkatan'];?></p>
									<p>Tempat Lahir : <?php echo $row_murid_ortu['tempat_lahir'];?></p>
									<input type="hidden" name="onlaidmrd" value="<?php echo $row_murid_ortu['id_murid'];?>">
									<select name="nama_kelas" >
										<option  id="opsel" value="" disabled  selected>Pilih Kelas</option>
										<?php
											$idmNilai = $row_murid_ortu['id_murid'];
											$hbhd = "SELECT DISTINCT kelas.id_kelas, nama_kelas, ruang_kelas, tahun_ajaran FROM kelas, kelas_siswa WHERE kelas.id_kelas=kelas_siswa.id_kelas AND kelas_siswa.id_murid= $idmNilai";
											$sqlkelasNilai = mysqli_query($con, $hbhd);
											while($row_kelasNiliai = mysqli_fetch_assoc($sqlkelasNilai)){
										?>
										<option value="<?php echo $row_kelasNiliai['id_kelas'];?>" <?php if ($id_kelasNilai == $row_kelasNiliai['id_kelas']){echo 'selected';} ?>><?php echo $row_kelasNiliai['nama_kelas'].'/'.$row_kelasNiliai['ruang_kelas'].' ('.$row_kelasNiliai['tahun_ajaran'].')';?></option>
										<?php } ?>
									</select>
									<select name="semstrnlai" >
										<option  id="opsel" value="" disabled  selected>Pilih Semester</option>
										<option  value="1" <?php if ($semestersNilai == '1'){echo 'selected';} ?>>1 -> Ganjil</option>
										<option  value="2" <?php if ($semestersNilai == '2'){echo 'selected';} ?>>2 -> Genap</option>
									</select>
								</div>
								<div class="admin_lihat_data_ortu_kanan_nilai">
									<p>Tanggal Lahir 	: <?php $tgl = $row_murid_ortu['tanggal_lahir'];; echo tanggalIndonesia($tgl); ?></p>
									<p>Alamat Ortu 	: <?php echo $row_murid_ortu['alamat'];?></p>
									<select name="nilai_bulan">
										<option  id="opsel" value="" disabled  selected>Pilih Bulan</option>
										<option  value="01" <?php if ($bulansNilai == '01'){echo 'selected';} ?>> Januari</option>
										<option  value="02" <?php if ($bulansNilai == '02'){echo 'selected';} ?>> Februaari</option>
										<option  value="03" <?php if ($bulansNilai == '03'){echo 'selected';} ?>> Maret</option>
										<option  value="04" <?php if ($bulansNilai == '04'){echo 'selected';} ?>>April</option>
										<option  value="05" <?php if ($bulansNilai == '05'){echo 'selected';} ?>>Mei</option>
										<option  value="06" <?php if ($bulansNilai == '06'){echo 'selected';} ?>>Juni</option>
										<option  value="07" <?php if ($bulansNilai == '07'){echo 'selected';} ?>>Juli</option>
										<option  value="08" <?php if ($bulansNilai == '08'){echo 'selected';} ?>>Agustus</option>
										<option  value="09" <?php if ($bulansNilai == '09'){echo 'selected';} ?>>September</option>
										<option  value="10" <?php if ($bulansNilai == '10'){echo 'selected';} ?>>Oktober</option>
										<option  value="11" <?php if ($bulansNilai == '11'){echo 'selected';} ?>>November</option>
										<option  value="12" <?php if ($bulansNilai == '12'){echo 'selected';} ?>>Desember</option>
									</select>
									<select name="nilai_tahun">
										<option  id="nilai_tahun" value="" disabled  selected>Pilih Tahun</option>
										<?php
											$queryNiorHAri = "SELECT DISTINCT tahun FROM kehadiran ORDER BY tahun DESC";
											$sqlNiorHAri= mysqli_query($con, $queryNiorHAri);
											while($tamNiorHAri = mysqli_fetch_assoc($sqlNiorHAri)){
										?>
										<option  value="<?php echo $tamNiorHAri['tahun'];?>" <?php if ($tahunNilai == $tamNiorHAri['tahun']){echo 'selected';} ?>><?php echo $tamNiorHAri['tahun'];?></option>
										<?php } ?>
									</select>
								</div>
								</form>
							</div>
							<div class="clear"></div>
						</div>
						<?php } ?>
						<div class="clear"></div>
						<?php 
							if(isset($_GET['nilai_murid'])){
								if(isset($_GET['nama_kelas']) && isset($_GET['semstrnlai'])){
									$tamidklasNilai = $_GET['nama_kelas'];
									$tamsmstrNilai = $_GET['semstrnlai'];
									$tamidMrudNilai = $_GET['onlaidmrd'];
									$titlenilia = tampilJadwalk($tamidklasNilai);
									$tamTitnilai = mysqli_fetch_assoc($titlenilia);
						?>
						<div id="hkshda">
							<div id="title_niai">
							<span><?php echo 'Daftar Nilai Kelas '.$tamTitnilai['nama_kelas'].'/'.$tamTitnilai['ruang_kelas'].' Pada Semester '.$tamsmstrNilai;?></span>
							</div>
							<table id="tabel_kelas">
								<tr>
									<th class="asdjshdjs">Nama Mata Pelajaraan</th>
									<?php
										$query_namajn = tamJenisnilai();
										while($row_jenil = mysqli_fetch_assoc($query_namajn)){
									?>
									<th><?php echo $row_jenil['nama_jenis_nilai'];?></th>
									<?php } ?>
									<th>Rata-Rata Nilai Tugas</th>
									<th>Rata-Rata Nilai UH</th>
									<th>Nilai Total</th>
								</tr>
								<?php 
									$queriMapelNiOr = "SELECT DISTINCT kelas_siswa.id_ks, mp.nama_mp FROM jadwal, kelas_siswa, mp WHERE jadwal.id_kls=kelas_siswa.id_kelas AND jadwal.id_mp=mp.id_mp AND jadwal.id_kls = $tamidklasNilai AND kelas_siswa.id_murid = $tamidMrudNilai ORDER BY mp.nama_mp";
									$sqlMapelNiOr =mysqli_query($con, $queriMapelNiOr);
									while($tamMapelNiOr=mysqli_fetch_assoc($sqlMapelNiOr)){
								?>
								<tr>
									<td><?php echo $tamMapelNiOr['nama_mp'];?></td>
									<?php
										$query_id_jn = tamJenisnilai();
										while($row_id_jenil = mysqli_fetch_assoc($query_id_jn)){
											$tamNiliidks = $tamMapelNiOr['id_ks'];
											$tamNiliidjensi= $row_id_jenil['id_jenis_nilai'];
											$tamNilineme = $tamMapelNiOr['nama_mp'];
									?>
									<td>
										<input type="hidden" name="nilai_id_jenis[]" value="<?php echo $row_id_jenil['id_jenis_nilai'];?>"/>
										<?php
											$tam_nilai_si= tamNilaisiOrtu($tamNiliidks,$tamNiliidjensi, $tamsmstrNilai, $tamNilineme);
											$row_tam_nilai_si = mysqli_fetch_assoc($tam_nilai_si);								
										?>
										<span><?php echo $row_tam_nilai_si['nilai'];?></span>
									</td>
									<?php } ?>
									<td><span>
								<?php
									$tam_nid1= tamNilaisiOrtu($tamNiliidks,1, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid1 = mysqli_fetch_assoc($tam_nid1);
									$nilai_tugas1 = $row_tam_nid1['nilai'];
									if(!empty($nilai_tugas1)){$nt1a=1;}else{$nt1a=0;}

									$tam_nid2= tamNilaisiOrtu($tamNiliidks,2, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid2 = mysqli_fetch_assoc($tam_nid2);
									$nilai_tugas2 = $row_tam_nid2['nilai'];
									if(!empty($nilai_tugas2)){$nt2a=1;}else{$nt2a=0;}

									$tam_nid3= tamNilaisiOrtu($tamNiliidks,3, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid3 = mysqli_fetch_assoc($tam_nid3);
									$nilai_tugas3 = $row_tam_nid3['nilai'];
									if(!empty($nilai_tugas3)){$nt3a=1;}else{$nt3a=0;}

									$tam_nid4= tamNilaisiOrtu($tamNiliidks,4, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid4 = mysqli_fetch_assoc($tam_nid4);
									$nilai_tugas4 = $row_tam_nid4['nilai'];
									if(!empty($nilai_tugas4)){$nt4a=1;}else{$nt4a=0;}

									$tam_nid5= tamNilaisiOrtu($tamNiliidks,5, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid5 = mysqli_fetch_assoc($tam_nid5);
									$nilai_tugas5 = $row_tam_nid5['nilai'];
									if(!empty($nilai_tugas5)){$nt5a=1;}else{$nt5a=0;}

									$pembagi = $nt1a+$nt2a+$nt3a+$nt4a+$nt5a;
									$total_nilai_tugas = ($nilai_tugas1+$nilai_tugas2+$nilai_tugas3+$nilai_tugas4+$nilai_tugas5);
									if($pembagi != 0){
										$rata_nilai_tugas = $total_nilai_tugas/$pembagi;
									}else{
										$rata_nilai_tugas = '';
									}
									echo $rata_nilai_tugas;
								?></span></td>
									<td>
										<span>
								<?php
									$tam_nid6= tamNilaisiOrtu($tamNiliidks,6, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid6 = mysqli_fetch_assoc($tam_nid6);
									$nilai_UH1 = $row_tam_nid6['nilai'];
									if(!empty($nilai_UH1)){$nuh1=1;}else{$nuh1=0;}

									$tam_nid7=tamNilaisiOrtu($tamNiliidks,7, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid7 = mysqli_fetch_assoc($tam_nid7);
									$nilai_UH2 = $row_tam_nid7['nilai'];
									if(!empty($nilai_UH2)){$nuh2=1;}else{$nuh2=0;}

									$tam_nid8= tamNilaisiOrtu($tamNiliidks,8, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid8 = mysqli_fetch_assoc($tam_nid8);
									$nilai_UH3 = $row_tam_nid8['nilai'];
									if(!empty($nilai_UH3)){$nuh3=1;}else{$nuh3=0;}

									$pembagiuh = $nuh1+$nuh2+$nuh3;
									$total_nilaiUH = $nilai_UH1+$nilai_UH2+$nilai_UH3;
									if($pembagiuh != 0){
										$rata_nilaiUH = $total_nilaiUH/$pembagiuh;
									}else{
										$rata_nilaiUH = '';
									}
									echo $rata_nilaiUH;
								?></span>
									</td>
									<td>
										<span>
								<?php
									$tam_nid9= tamNilaisiOrtu($tamNiliidks,9, $tamsmstrNilai, $tamNilineme);;
									$row_tam_nid9 = mysqli_fetch_assoc($tam_nid9);
									$nilai_UTS = $row_tam_nid9['nilai'];

									$tam_nid10= tamNilaisiOrtu($tamNiliidks,10, $tamsmstrNilai, $tamNilineme);
									$row_tam_nid10 = mysqli_fetch_assoc($tam_nid10);
									$nilai_UAS = $row_tam_nid10['nilai'];

									if(!empty($nilai_UTS)){$toniseuts=$nilai_UTS*0.3;}else{$toniseuts='';}
									if(!empty($nilai_UAS)){$toniseuas=$nilai_UAS*0.3;}else{$toniseuas='';}
									if($rata_nilai_tugas != ''){$rata_nilai_tugas = $rata_nilai_tugas*0.2;}
									if($rata_nilaiUH != ''){$rata_nilaiUH = $rata_nilaiUH*0.2;}
									$tolal_nilai_seluruh = $rata_nilai_tugas+$rata_nilaiUH+$toniseuts+$toniseuas;

									if(empty($tolal_nilai_seluruh))
										{$tolal_nilai_lengkap = '';}else{$tolal_nilai_lengkap =$tolal_nilai_seluruh;}
									echo $tolal_nilai_lengkap;
								?></span>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
						<?php } } ?>
						<?php 
							if(isset($_GET['kehadiran_murid'])){
								if(isset($_GET['nilai_bulan']) && isset($_GET['nilai_tahun']) && isset($_GET['nama_kelas'])){
									$tambulanNilai = $_GET['nilai_bulan'];
									$tamidklasNilai = $_GET['nama_kelas'];
									$tamtahunNilai = $_GET['nilai_tahun'];
									$tamidMrudNilai = $_GET['onlaidmrd'];
									if($tambulanNilai == '01'){ $tulisanBulan = 'Januari';}
									if($tambulanNilai == '02'){ $tulisanBulan = 'Februaari';}
									if($tambulanNilai == '03'){ $tulisanBulan = 'Maret';}
									if($tambulanNilai == '04'){ $tulisanBulan = 'April';}
									if($tambulanNilai == '05'){ $tulisanBulan = 'Mei';}
									if($tambulanNilai == '06'){ $tulisanBulan = 'Juni';}
									if($tambulanNilai == '07'){ $tulisanBulan = 'Juli';}
									if($tambulanNilai == '08'){ $tulisanBulan = 'Agustus';}
									if($tambulanNilai == '09'){ $tulisanBulan = 'September';}
									if($tambulanNilai == '10'){ $tulisanBulan = 'Oktober';}
									if($tambulanNilai == '11'){ $tulisanBulan = 'November';}
									if($tambulanNilai == '12'){ $tulisanBulan = 'Desember';}
									$titlenilia = tampilJadwalk($tamidklasNilai);
									$tamTitnilai = mysqli_fetch_assoc($titlenilia);
									$query_tglHadir = "SELECT * FROM kehadiran, kelas_siswa WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_kelas=$tamidklasNilai AND kelas_siswa.id_murid=$tamidMrudNilai AND kehadiran.bulan='$tambulanNilai' AND kehadiran.tahun=$tamtahunNilai";
										$sqlHadir = mysqli_query($con, $query_tglHadir);
										$sqlHadir2 = mysqli_query($con, $query_tglHadir);
						?>
						<div class="clear"></div>
						<div id="hkshda">
							<?php if(mysqli_num_rows($sqlHadir) < 1){?>
							<div id="title_niai">
								<span>Data Kehadiran Murid Kosong/Belum Diinput</span>
							</div>
							<?php }else{?>
							<div id="title_niai">
							<span><?php echo 'Daftar Kehadiran Murid Pada Bulan '.$tulisanBulan.' Tahun '.$tamtahunNilai.' Di Kelas '.$tamTitnilai['nama_kelas'].'/'.$tamTitnilai['ruang_kelas'];?></span>
							</div>
							<table id="tabel_kehadiran">
								<tr>
									<th>Tanggal</th>
									<?php
										while($tamKehadiran = mysqli_fetch_assoc($sqlHadir)){
									?>
									<td><?php echo $tamKehadiran['hari'];?></td>
									<?php } ?>
								</tr>
								<tr>
									<th>Ket</th>
									<?php
										while($tamketKehadiran = mysqli_fetch_assoc($sqlHadir2)){
											if($tamketKehadiran['keterangan_hadir'] == 'hadir'){$tamKehadMu = 'H';}
											if($tamketKehadiran['keterangan_hadir'] == 'tidak hadir'){$tamKehadMu = 'TH';}
											if($tamketKehadiran['keterangan_hadir'] == 'izin'){$tamKehadMu = 'I';}
											if($tamketKehadiran['keterangan_hadir'] == 'sakit'){$tamKehadMu = 'S';}
									?>
									<td><?php echo $tamKehadMu;?></td>
									<?php } ?>
								</tr>
							</table>
							<div id="note_kehadiran">
								<i>#Catatan :</i><p> *H = Hadir</p><p>*TH = Tidak Hadir</p><p>*I = Izin</p><p>*S = Sakit</p>
							</div>
						</div>
						<?php } } }?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>