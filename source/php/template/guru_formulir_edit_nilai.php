<?php
	if(isset($_GET['ienk'])){
		$editNilai_idKelas = $_GET['eik'];
		$editNilai_semester = $_GET['es'];
		$editNilai_mapel = $_GET['enm'];
		if($editNilai_semester ==1){$tampiledit_semester = 'Ganjil';}else{$tampiledit_semester = 'Genap';}
			$queryEditnilai_idkelas = tampilJadwalk($editNilai_idKelas);
			$row_queryEditnilai_idkelas = mysqli_fetch_assoc($queryEditnilai_idkelas);


		if(isset($_POST['edit_nilai'])){
			$simEditsemester 	= $_POST['edit_semester_nilai'];
			$simEditidgurumapel = $_POST['edit_nilai_id_guru'];
			$simEditmapel 		= $_POST['edit_nilai_nmp'];
			$simEditnilai 		= $_POST['edit_nilai_guru'];
			$simEditidks		= $_POST['edit_nilai_idks'];
			$simEditidjenisnilai= $_POST['edit_nilai_id_jenis'];

			$nilai_guru = $_POST['edit_nilai_guru'];
			$leng_nilai= count($nilai_guru);
			for ($i=0; $i < $leng_nilai ; $i++) { 
				if(!empty($nilai_guru[$i])){
					$queriSimpaneditnilai = "UPDATE nilai SET nilai = $simEditnilai[$i] WHERE id_jenis_nilai =$simEditidjenisnilai[$i] AND semester = $simEditsemester AND nama_mapel= '$simEditmapel' AND id_guru_mp = $simEditidgurumapel AND id_ks = $simEditidks[$i]";
					$hasilSimpaneditnilai = mysqli_query($con, $queriSimpaneditnilai);
					if($hasilSimpaneditnilai){
						$error = "Edit Data Nilai Berhasil";
						$error1 = "/";
						$error2 = " warna_berhasil";
					}else{
						$error = "Edit Data Nilai Gagal";
						$error1 = "-";
						$error2 = " warna_error";
					}
				}
			}
		}
?>
<div id="formulir_gednil" class="admin_formulir_muncul1">
	<div id="admin_formulir_lihat_data_ortu">
		<h2>Edit Nilai <?php echo '\''.$editNilai_mapel.'\'';?> Pada Kelas <?php echo '\''.$row_queryEditnilai_idkelas['nama_kelas'].'/'.$row_queryEditnilai_idkelas['ruang_kelas'].'\'';?></h2>
		<h3 id="tahun_ajaran_keni">Semester <?php echo $tampiledit_semester;?> Tahun Ajaran <?php echo $row_queryEditnilai_idkelas['tahun_ajaran'];?></h3>
		<div class="error">
			<div class="isi_error <?php echo $error2;?>">
				<p><?php echo $error1;?></p>
				<h3><?php echo $error;?></h3>
			</div>
		</div>
		<form action="" method="POST">
			<input type="hidden" name="edit_nilai_id_guru" value="<?php echo $user_guru;?>">
		  	<input type="hidden" name="edit_nilai_nmp" value="<?php echo $editNilai_mapel;?>">
		  	<input type="hidden" name="edit_semester_nilai" value="<?php echo $editNilai_semester;?>">
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
								$tamEditnilai_si= tamNilaisi2($rowEditnilai_idks['id_ks'],$rowEditidk_jenil['id_jenis_nilai'], $editNilai_semester, $editNilai_mapel, $user_guru); 
								$row_etam_nilai_si = mysqli_fetch_assoc($tamEditnilai_si);
								$esuinput="";
								$read_nilai="";
								if ($row_etam_nilai_si == ''){$esuinput= 'readonly'; $read_nilai = 'read_nilai';}
							?>
							<input type="number" name="edit_nilai_guru[]" maxlength="3" min="0" max="100" id="nilai_guru" class="<?php echo $read_nilai;?>" value="<?php echo $row_etam_nilai_si['nilai'];?>" <?php echo $esuinput;?>/>
						</td>
						<?php } ?>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="bungkus_nilai_kelas">
				<input type="submit" id="kdk" name="edit_nilai" value="Edit Nilai">
			</div>
		</form>		
	</div>
	<div class="clear"></div>
</div>
<?php } ?>