		<?php 
			if(isset($_POST['ihnk'])){
				$hapusNilaiidkls = $_POST['hik'];
				$hapusNilaisemster = $_POST['hs'];
				$hapusNilaimapel = $_POST['hnm'];

				$tamHapidik = tamMurgu($hapusNilaiidkls);
				while($row_tamHapidik = mysqli_fetch_assoc($tamHapidik)){
				 $hapusNilaiidks = $row_tamHapidik['id_ks'];
				 $queryHapusnilaiguru = "DELETE FROM nilai WHERE semester = $hapusNilaisemster 
				 AND nama_mapel='$hapusNilaimapel' AND id_guru_mp = $user_guru AND id_ks = $hapusNilaiidks";
				 mysqli_query($con, $queryHapusnilaiguru);
				}
				$queryHapusnilaiguru = mysqli_query($con, $queryHapusnilaiguru);
				if($queryHapusnilaiguru){
					$error = "Hapus Data Nilai Berhasil";
					$error1 = "/";
					$error2 = " warna_berhasil";
				}else{
					$error = "Hapus Data Nilai Gagal";
					$error1 = "-";
					$error2 = " warna_error";
				}
			}
		?>
		<div id="formulir_guru_lihat_nilai" class="admin_formulir_muncul1">
			<div id="tehy">
				<div class="tatus gonilai">
					<span id="logo_tambah_nilai">Tambah Data Nilai</span>
				</div>
				<div class="tatu">
					<a href="halamanguru.php#formulir_cari_kelas_guru">+</a>
				</div>
			</div>
			<div id="guru_formulir_lihat_kelas">
				<div class="error tngah">
					<div class="isi_error <?php echo $error2;?>">
						<p><?php echo $error1;?></p>
						<h3><?php echo $error;?></h3>
					</div>
				</div>
				<div class="info_kelas">
					<h2 id="judul_tambah_kelas">Data Nilai</h2>
				</div>
				<div class="bungkus_kelas_guru">
					<?php						
						$tamNileng = tamNileng($user_guru);
						while($row_kelas_nilai = mysqli_fetch_assoc($tamNileng)){
						
					?>
						<div id="kelas_bimbingan_guru">
							<div id="tooltip_nk">
							<p>KELAS <?php echo $row_kelas_nilai['nama_kelas'].'/'.$row_kelas_nilai['ruang_kelas'].' Semester '.$row_kelas_nilai['semester'].' Tahun Ajaran '.$row_kelas_nilai['tahun_ajaran'];?></p>
							<form action="halamanguru.php#formulir_gednil" method="GET">
								<input type="hidden" name="eik" value="<?php echo $row_kelas_nilai['id_kelas'];?>">
								<input type="hidden" name="es" value="<?php echo $row_kelas_nilai['semester'];?>">
								<input type="hidden" name="enm" value="<?php echo $row_kelas_nilai['nama_mapel'];?>">
								<input type="submit" name="ienk" value="S" id="edit_nilai_kelas" title="Edit Nilai" />
							</form>
							<form action="" method="POST">
								<input type="hidden" name="hik" value="<?php echo $row_kelas_nilai['id_kelas'];?>">
								<input type="hidden" name="hs" value="<?php echo $row_kelas_nilai['semester'];?>">
								<input type="hidden" name="hnm" value="<?php echo $row_kelas_nilai['nama_mapel'];?>">
								<input type="submit" name="ihnk" onclick="return confirm(' Yakin Untuk Menghapus Data Nilai Kelas <?php echo $row_kelas_nilai['nama_kelas'].'/'.$row_kelas_nilai['ruang_kelas'].' Semester '.$row_kelas_nilai['semester'].' Tahun Ajaran '.$row_kelas_nilai['tahun_ajaran'];?> ?')" value="'" id="hapus_nilai_kelas" title="Hapus Nilai" />
							</form>
							<div class="clear"></div>
							</div>
							<table id="tabel_kelas">
								<tr>
									<th>Nama Murid</th>
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
									$quey_nilai_idks = moonMur($row_kelas_nilai['id_kelas']);
									while($row_nilai_idks = mysqli_fetch_assoc($quey_nilai_idks)){
								?>
								<tr>
								<td><?php echo $row_nilai_idks['nama_murid'];?></td>
								<?php
								$query_id_jn = tamJenisnilai();
								while($row_id_jenil = mysqli_fetch_assoc($query_id_jn)){
							?>
							<td>
								<input type="hidden" name="nilai_id_jenis[]" value="<?php echo $row_id_jenil['id_jenis_nilai'];?>"/>
								
								<?php
									$tam_nilai_si= tamNilaisi2($row_nilai_idks['id_ks'],$row_id_jenil['id_jenis_nilai'], $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru); 
									$row_tam_nilai_si = mysqli_fetch_assoc($tam_nilai_si);								
								?>
								<span><?php echo $row_tam_nilai_si['nilai'];?></span>
							</td>
							<?php } ?>
							<td><span>
								<?php
									$tam_nid1= tamNilaisi2($row_nilai_idks['id_ks'],1, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid1 = mysqli_fetch_assoc($tam_nid1);
									$nilai_tugas1 = $row_tam_nid1['nilai'];
									if(!empty($nilai_tugas1)){$nt1a=1;}else{$nt1a=0;}

									$tam_nid2= tamNilaisi2($row_nilai_idks['id_ks'],2, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid2 = mysqli_fetch_assoc($tam_nid2);
									$nilai_tugas2 = $row_tam_nid2['nilai'];
									if(!empty($nilai_tugas2)){$nt2a=1;}else{$nt2a=0;}

									$tam_nid3= tamNilaisi2($row_nilai_idks['id_ks'],3, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid3 = mysqli_fetch_assoc($tam_nid3);
									$nilai_tugas3 = $row_tam_nid3['nilai'];
									if(!empty($nilai_tugas3)){$nt3a=1;}else{$nt3a=0;}

									$tam_nid4= tamNilaisi2($row_nilai_idks['id_ks'],4, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid4 = mysqli_fetch_assoc($tam_nid4);
									$nilai_tugas4 = $row_tam_nid4['nilai'];
									if(!empty($nilai_tugas4)){$nt4a=1;}else{$nt4a=0;}

									$tam_nid5= tamNilaisi2($row_nilai_idks['id_ks'],5, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
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
								?></span>
							</td>
							<td><span>
								<?php
									$tam_nid6= tamNilaisi2($row_nilai_idks['id_ks'],6, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid6 = mysqli_fetch_assoc($tam_nid6);
									$nilai_UH1 = $row_tam_nid6['nilai'];
									if(!empty($nilai_UH1)){$nuh1=1;}else{$nuh1=0;}

									$tam_nid7= tamNilaisi2($row_nilai_idks['id_ks'],7, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid7 = mysqli_fetch_assoc($tam_nid7);
									$nilai_UH2 = $row_tam_nid7['nilai'];
									if(!empty($nilai_UH2)){$nuh2=1;}else{$nuh2=0;}

									$tam_nid8= tamNilaisi2($row_nilai_idks['id_ks'],8, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
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
							<td><span>
								<?php
									$tam_nid9= tamNilaisi2($row_nilai_idks['id_ks'],9, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
									$row_tam_nid9 = mysqli_fetch_assoc($tam_nid9);
									$nilai_UTS = $row_tam_nid9['nilai'];

									$tam_nid10= tamNilaisi($row_nilai_idks['id_ks'],10, $row_kelas_nilai['semester'], $row_kelas_nilai['nama_mapel'], $user_guru);
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
								<?php  } ?>
							</table>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>