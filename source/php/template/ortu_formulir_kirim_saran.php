<div id="formulir_ortu_kirim" class="admin_formulir_muncul">
	<div id="admin_formulir_pengumuman">
		<h2>Kirim Masukan</h2>
		<p id="kirim_pengumuman1">Formulir Kirim Masukan Sistem Informasi akademik Pada Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
			<?php
				if(isset($_POST['kirim_masukan'])){
					$kategori_masukan = $_POST['kategori_saran'];
					$tujuan_masukan = $_POST['masukan_tujuan'];
					$nama_masukan = $_POST['nama_saran'];
					$isi_masukan = $_POST['isi_masukan'];
					$id_masukan = $_POST['id_pemasukan'];
					$id_pecak_pengirim = explode('-', $id_masukan);
					$id_pecak_kepada = explode('-', $nama_masukan);
					$nama_pengirim = $id_pecak_pengirim[0];
					$no_pengirim = $id_pecak_pengirim[1];
					$nama_kepada = $id_pecak_kepada[0];
					$no_kepada = $id_pecak_kepada[1];
					$tanggal_masukan = date('d-M-Y');
					$jam_masukan = date('H:i:s');

					$queryImasukan = "INSERT INTO masukan (pengirim, kategori_masukan, kepada, isi_masukan, keterangan_masukan, tanggal_masukan, jam_masukan) VALUES ('$nama_pengirim', '$kategori_masukan', '$nama_kepada', '$isi_masukan', 'Terkirim', '$tanggal_masukan','$jam_masukan')";
					$sqlImasukan = mysqli_query($con, $queryImasukan);
					if($sqlImasukan){
						$kirimSMSI= "Anda Mendapatkan ".$kategori_masukan." Dari ".$nama_pengirim." Yang Berisi:\n".$isi_masukan;
						$jmlSMSI = ceil(strlen($kirimSMSI)/153);
						$pecahSMSI = str_split($kirimSMSI, 153);
						$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
						$querySMSI= mysqli_query($con1, $ghghj);
						$dataSMSI= mysqli_fetch_assoc($querySMSI);
						$newIdsms = $dataSMSI['Auto_increment'];
							for ($i=1; $i <= $jmlSMSI; $i++) { 
								$uhd="050003A7".sprintf("%02s", $jmlSMSI).sprintf("%02s", $i);
								$msgSMSI =$pecahSMSI[$i-1];
									if($i == 1){
										$querySMSI = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('+62$no_kepada','$uhd','$msgSMSI','$newIdsms','true','Gammu')";
									}else{
										$querySMSI = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msgSMSI','$newIdsms','$i')";
									}
									//echo $querySMSI;
								mysqli_query($con1, $querySMSI);
							}
						if($hak_akses == 1){
							header('location: ../../login/admin/halamanadmin.php#formulir_ortu_saran_keluar');
						}
						if($hak_akses == 2){
							header('location: ../../login/admin/halamankepsek.php#formulir_ortu_saran_keluar');
						}
						if($hak_akses == 3){
							header('location: ../../login/admin/halamanguru.php#formulir_ortu_saran_keluar');
						}
						if($hak_akses == 4){
							header('location: ../../login/admin/halamanortu.php#formulir_ortu_saran_keluar');
						}
					}else{
						$error = "Kirim Masukan Gagal";
						$error1 = "-";
						$error2 = " warna_error";
					}
				}
			?>
		<form action="" method="POST" >
			<div class="error"><div class="isi_error <?php echo $error2;?>"><p><?php echo $error1;?></p><h3><?php echo $error;?></h3></div></div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri1">
					<label for="judul">Kategori</label>
					<p>Kategori Masukan</p>
				</div>
				<div class="admin_formulir_kanan1">
					<select name="kategori_saran" required>
						<option id="opsel" value="" disabled  selected>Pilih Kategori</option>
						<option value="kritik">Kritik</option>
						<option value="saran">Saran</option>
						<option value="pertanyaan">Pertanyaan</option>
						<?php 
							if($hak_akses==4){
							$query_pemasukan = "SELECT * FROM user, ortu WHERE user.nama_pengguna=ortu.nama_ortu AND ortu.id_ortu=$user_ortu";
							$sql_pamasukan = mysqli_query($con, $query_pemasukan);
							$tam_pemasukan = mysqli_fetch_assoc($sql_pamasukan);}
							else{
							$query_pemasukan = "SELECT * FROM user, guru WHERE user.nama_pengguna=guru.nama_guru AND guru.id_guru=$user_guru";
							$sql_pamasukan = mysqli_query($con, $query_pemasukan);
							$tam_pemasukan = mysqli_fetch_assoc($sql_pamasukan);}
						?>
						<?php if($hak_akses==4){?><input type="hidden" name="id_pemasukan" value="<?php echo $tam_pemasukan['nama_ortu'].'-'.$tam_pemasukan['no_telp'];?>"><?php }else{?><input type="hidden" name="id_pemasukan" value="<?php echo $tam_pemasukan['nama_guru'].'-'.$tam_pemasukan['no_tel'];?>"><?php } ?>
					</select>
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri1">
					<label for="judul">Kepada</label>
					<p>Masukan Ditujuan</p>
				</div>
				<div class="admin_formulir_kanan1">
					<select name="masukan_tujuan" id="tujuan_saran" required>
						<option id="opsel" value="" disabled  selected>Pilih Tujuan</option>
						<?php if($hak_akses!=1){?><option value="1">Admin</option><?php } ?>
						<?php if($hak_akses!=2){?><option value="2">Kepala Sekolah</option><?php } ?>
						<?php if($hak_akses!=3){?><option value="3">Guru</option><?php } ?>
						<?php if($hak_akses!=4){?><option value="4">Ortu</option><?php } ?>
					</select>
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam" id="nama_penerima">
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri1">
					<label for="isi">Isi</label>
					<p>Isi Pesan Masukan</p>
				</div>
				<div class="admin_formulir_kanan1">
					<textarea name="isi_masukan" id="isi_pengumuman" rows="8" required></textarea>							
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<input type="submit" id="kdk" name="kirim_masukan" value="KIRIM MASUKAN" />
		</form>
	</div>
</div>