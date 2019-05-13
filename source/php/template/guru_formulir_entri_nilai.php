<?php if(isset($_GET['id_klsgu']) && isset($_GET['nmp']) && isset($_GET['ids'])){ ?>
<div id="formulir_gen" class="admin_formulir_muncul1">
	<div id="admin_formulir_lihat_data_ortu">
		<?php 

			if(isset($_POST['simpan_nilai_guru'])){
				 $semester = $_POST['semester_nilai'];
				 $id_guru_mp = $_POST['nilai_id_guru'];
				 $nam_mapel = $_POST['nilai_nmp'];
				 $nilai = $_POST['nilai_guru'];
				$id_ks = $_POST['nilai_idks'];
				$id_jenis_nilai =$_POST['nilai_id_jenis'];

				$nilai_guru = $_POST['nilai_guru'];
				$leng_nilai= count($nilai_guru);
				for ($i=0; $i < $leng_nilai ; $i++) { 
					if(!empty($nilai_guru[$i])){
						// echo $i;
						$queri_insert_nilai = "INSERT INTO nilai (semester, nama_mapel, id_guru_mp, nilai, id_jenis_nilai, id_ks) VALUES ($semester, '$nam_mapel', $id_guru_mp, $nilai[$i], $id_jenis_nilai[$i], $id_ks[$i])";
						$hasil_insert_nilai = mysqli_query($con, $queri_insert_nilai);
						if($hasil_insert_nilai){
							$error = "Entri Data Nilai Berhasil";
							$error1 = "/";
							$error2 = " warna_berhasil";

							$cariJN = "SELECT * FROM jenis_nilai WHERE id_jenis_nilai='$id_jenis_nilai[$i]'";
							$querycariJN= mysqli_query($con, $cariJN);
							$tamcariJN= mysqli_fetch_assoc($querycariJN);
							$namaJN = $tamcariJN['nama_jenis_nilai'];
							$cariMK = "SELECT * FROM murid, kelas_siswa, kelas, ortu WHERE murid.id_ortu=ortu.id_ortu AND murid.id_murid=kelas_siswa.id_murid AND kelas.id_kelas=kelas_siswa.id_kelas AND kelas_siswa.id_ks='$id_ks[$i]'";
							$querycariMK= mysqli_query($con, $cariMK);
							$tamcariMK = mysqli_fetch_assoc($querycariMK);
							$nama_anak = $tamcariMK['nama_murid'];
							$nama_kelas = $tamcariMK['nama_kelas'];
							$NoOrtu = "+62".$tamcariMK['no_telp'];

							$kirimNilai= " Daftar Nilai ".$nama_anak."\nSemester: ".$semester."\nKelas: ".$nama_kelas."\n".$namaJN."-> ".$nam_mapel.": ".$nilai[$i];
							$queryKN = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$NoOrtu','$kirimNilai','Gammu')";
							mysqli_query($con1, $queryKN);
						}else{
							$error = "Entri Data Nilai Gagal";
							$error1 = "-";
							$error2 = " warna_error";
						}
					}
				}
			} unset($_POST['simpan_nilai_guru']);

			if($_GET['ids'] ==1){$semter = 'Ganjil';}else{$semter = 'Genap';}
			$tamkelnigur = tampilJadwalk($_GET['id_klsgu']);
			$row_tamkelnigur = mysqli_fetch_assoc($tamkelnigur);

			
		?>
		<h2>Entri Nilai <?php echo '\''.$_GET['nmp'].'\'';?> Pada Kelas <?php echo '\''.$row_tamkelnigur['nama_kelas'].'/'.$row_tamkelnigur['ruang_kelas'].'\'';?></h2>
		<h3 id="tahun_ajaran_keni">Semester <?php echo $semter;?> Tahun Ajaran <?php echo $row_tamkelnigur['tahun_ajaran'];?></h3>
		<div class="error">
			<div class="isi_error <?php echo $error2;?>">
				<p><?php echo $error1;?></p>
				<h3><?php echo $error;?></h3>
			</div>
		</div>
		<div class="clear"></div>
		<form action="" method="POST">
		  	<input type="hidden" name="nilai_id_guru" value="<?php echo $user_guru;?>">
		  	<input type="hidden" name="nilai_nmp" value="<?php echo $_GET['nmp'];?>">
		  	<input type="hidden" name="semester_nilai" value="<?php echo $_GET['ids'];?>">
			<div class="bungkus_nilai_kelas">
				<table id="tabel_kelas">
					<tr>
						<th>Nama Murid</th>
						<?php
							$query_namajn = tamJenisnilai();
							while($row_jenil = mysqli_fetch_assoc($query_namajn)){
						?>
						<th><?php echo $row_jenil['nama_jenis_nilai'];?></th>
						<?php } ?>
					</tr>
					
						<?php
							$quey_nilai_idks = moonMur($_GET['id_klsgu']);
							while($row_nilai_idks = mysqli_fetch_assoc($quey_nilai_idks)){
						?>
						<tr>
						<td><?php echo $row_nilai_idks['nama_murid'];?></td>
						<?php
							$query_id_jn = tamJenisnilai();
							while($row_id_jenil = mysqli_fetch_assoc($query_id_jn)){
						?>
						<td>
							<input type="hidden" name="nilai_idks[]" value="<?php echo $row_nilai_idks['id_ks'];?>">
							<input type="hidden" name="nilai_id_jenis[]" value="<?php echo $row_id_jenil['id_jenis_nilai'];?>"/>
							
							<?php
								$tam_nilai_si= tamNilaisi2($row_nilai_idks['id_ks'],$row_id_jenil['id_jenis_nilai'], $_GET['ids'], $_GET['nmp'], $user_guru);
								$row_tam_nilai_si = mysqli_fetch_assoc($tam_nilai_si);
								if (!empty($row_tam_nilai_si['nilai'])){ ?>
									<span><?php echo $row_tam_nilai_si['nilai'];?></span>
									<input type="hidden" name="nilai_guru[]" maxlength="3" min="0" max="100" id="nilai_guru" value=""/>
								<?php }else{?>
							<input type="number" name="nilai_guru[]" maxlength="3" min="0" max="100" id="nilai_guru" value="<?php echo $row_tam_nilai_si['nilai'];?>"/>
						</td>
						<?php }} ?>
					</tr>
					<?php } ?>
				</table>
			</div>
			<div class="bungkus_nilai_kelas">
				<input type="submit" id="kdk" name="simpan_nilai_guru" value="Simpan Nilai">
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div>
<?php } //Endwhile lihat murid guru?>