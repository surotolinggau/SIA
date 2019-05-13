<?php
	if(isset($_GET['ienk'])){
		$editNilai_idKelas = $_GET['eik'];
		$editNilai_semester = $_GET['es'];
		$editNilai_mapel = $_GET['enm'];
		$editNilai_idgr = $_GET['eidg'];
		if($editNilai_semester ==1){$tampiledit_semester = 'Ganjil';}else{$tampiledit_semester = 'Genap';}
			$queryEditnilai_idkelas = tampilJadwalk($editNilai_idKelas);
			$row_queryEditnilai_idkelas = mysqli_fetch_assoc($queryEditnilai_idkelas);
?>
<div id="formulir_admin_lihat_nilai" class="admin_formulir_muncul1">
	<div id="admin_formulir_lihat_data_ortu">
		<h2>Lihat Nilai <?php echo '\''.$editNilai_mapel.'\'';?> Pada Kelas <?php echo '\''.$row_queryEditnilai_idkelas['nama_kelas'].'/'.$row_queryEditnilai_idkelas['ruang_kelas'].'\'';?></h2>
		<h3 id="tahun_ajaran_keni">Semester <?php echo $tampiledit_semester;?> Tahun Ajaran <?php echo $row_queryEditnilai_idkelas['tahun_ajaran'];?></h3>
		<div class="error">
			<div class="isi_error <?php echo $error2;?>">
				<p><?php echo $error1;?></p>
				<h3><?php echo $error;?></h3>
			</div>
		</div>
			<div class="bungkus_nilai_kelas">
				<table id="tabel_kelas">
					<tr>
						<th>Nama Murid</th>
						<?php
							$queryEditnamajn = tamJenisnilai();
							while($row_Editjenil = mysqli_fetch_assoc($queryEditnamajn)){
						?>
						<th><?php echo $row_Editjenil['nama_jenis_nilai'];?></th>
						<?php } ?>
						<th>Rata-Rata Nilai Tugas</th>
						<th>Rata-Rata Nilai UH</th>
						<th>Nilai Total</th>
					</tr>
					
						<?php
							$queyEditnilai_idks = moonMur($editNilai_idKelas);
							while($rowEditnilai_idks = mysqli_fetch_assoc($queyEditnilai_idks)){
						?>
						<tr>
						<td><?php echo $rowEditnilai_idks['nama_murid'];?></td>
						<?php
							$queryEditid_jn = tamJenisnilai();
							while($rowEditidk_jenil = mysqli_fetch_assoc($queryEditid_jn)){
						?>
						<td>
							<input type="hidden" name="edit_nilai_idks[]" value="<?php echo $rowEditnilai_idks['id_ks'];?>">
							<input type="hidden" name="edit_nilai_id_jenis[]" value="<?php echo $rowEditidk_jenil['id_jenis_nilai'];?>"/>
							
							<?php
								$tamEditnilai_si= tamNilaisi2($rowEditnilai_idks['id_ks'],$rowEditidk_jenil['id_jenis_nilai'], $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
								$row_etam_nilai_si = mysqli_fetch_assoc($tamEditnilai_si);
								$esuinput="";
								$read_nilai="";
								if ($row_etam_nilai_si == ''){$esuinput= 'readonly'; $read_nilai = 'read_nilai';}
							?>
							<p><?php echo $row_etam_nilai_si['nilai'];?></p>
						</td>
						<?php } ?>
						<td><span>
								<?php
									$tam_nid1= tamNilaisi2($rowEditnilai_idks['id_ks'],1, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid1 = mysqli_fetch_assoc($tam_nid1);
									$nilai_tugas1 = $row_tam_nid1['nilai'];
									if(!empty($nilai_tugas1)){$nt1a=1;}else{$nt1a=0;}

									$tam_nid2= tamNilaisi2($rowEditnilai_idks['id_ks'],2, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid2 = mysqli_fetch_assoc($tam_nid2);
									$nilai_tugas2 = $row_tam_nid2['nilai'];
									if(!empty($nilai_tugas2)){$nt2a=1;}else{$nt2a=0;}

									$tam_nid3= tamNilaisi2($rowEditnilai_idks['id_ks'],3, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid3 = mysqli_fetch_assoc($tam_nid3);
									$nilai_tugas3 = $row_tam_nid3['nilai'];
									if(!empty($nilai_tugas3)){$nt3a=1;}else{$nt3a=0;}

									$tam_nid4= tamNilaisi2($rowEditnilai_idks['id_ks'],4, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid4 = mysqli_fetch_assoc($tam_nid4);
									$nilai_tugas4 = $row_tam_nid4['nilai'];
									if(!empty($nilai_tugas4)){$nt4a=1;}else{$nt4a=0;}

									$tam_nid5= tamNilaisi2($rowEditnilai_idks['id_ks'],5, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
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
									$tam_nid6= tamNilaisi2($rowEditnilai_idks['id_ks'],6, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid6 = mysqli_fetch_assoc($tam_nid6);
									$nilai_UH1 = $row_tam_nid6['nilai'];
									if(!empty($nilai_UH1)){$nuh1=1;}else{$nuh1=0;}

									$tam_nid7= tamNilaisi2($rowEditnilai_idks['id_ks'],7, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid7 = mysqli_fetch_assoc($tam_nid7);
									$nilai_UH2 = $row_tam_nid7['nilai'];
									if(!empty($nilai_UH2)){$nuh2=1;}else{$nuh2=0;}

									$tam_nid8= tamNilaisi2($rowEditnilai_idks['id_ks'],8, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
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
									$tam_nid9= tamNilaisi2($rowEditnilai_idks['id_ks'],9, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
									$row_tam_nid9 = mysqli_fetch_assoc($tam_nid9);
									$nilai_UTS = $row_tam_nid9['nilai'];

									$tam_nid10= tamNilaisi2($rowEditnilai_idks['id_ks'],10, $editNilai_semester, $editNilai_mapel, $editNilai_idgr);
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
								?></span></td>
					</tr>
					<?php } ?>
				</table>
			</div>	
	</div>
	<div class="clear"></div>
</div>
<?php } ?>