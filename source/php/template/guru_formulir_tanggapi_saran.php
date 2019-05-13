<?php 
	if(isset($_GET['id_sdk'])){
		$eid_masukan=$_GET['id_sdk'];
		$equery_tanggapan = "SELECT * FROM masukan WHERE id_masukan = $eid_masukan";
		$sqltanggapan = mysqli_query($con, $equery_tanggapan);
		$tamTanggapan = mysqli_fetch_assoc($sqltanggapan);
?>
<div id="formulir_ortu_tanggapi" class="admin_formulir_muncul">
	<div id="admin_formulir_pengumuman">
		<h2>Kirim Tanggapan</h2>
		<p id="kirim_pengumuman1">Formulir Kirim Tanggapan Pada Sistem Informasi Akademik Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
			<?php
				if(isset($_POST['ttggp'])){
					$kategori_tanggapan = $_POST['kategori_tanggapan'];
					$pengirim_tanggapan = $_POST['pengirim_tanggapan'];
					$tanggapan_kepada = $_POST['tanggapan_kepada'];
					$eisi_masukan = $_POST['isi_masukan'];
					$etanggapan = $_POST['tanggapan'];
					$eid_masukan = $_POST['id_masukan'];
					$tanggal_masukan = date('d-M-Y');
					$jam_masukan = date('H:i:s');

					$queryTanggapan = "UPDATE masukan SET tanggapan='$etanggapan', keterangan_masukan = 'Dilaksanakan', tanggal_masukan='$tanggal_masukan', jam_masukan='$jam_masukan' WHERE id_masukan= $eid_masukan";
					$sqlEtanggapan = mysqli_query($con, $queryTanggapan);
					if($sqlEtanggapan){
						if($hak_akses == 1){
							header('location: ../../login/admin/halamanadmin.php#formulir_ortu_saran_masuk');
						}
						if($hak_akses == 2){
							header('location: ../../login/admin/halamankepsek.php#formulir_ortu_saran_masuk');
						}
						if($hak_akses == 3){
							header('location: ../../login/admin/halamanguru.php#formulir_ortu_saran_masuk');
						}
						if($hak_akses == 4){
							header('location: ../../login/admin/halamanortu.php#formulir_ortu_saran_masuk');
						}
					}else{
						$error = "Kirim Masukan Gagal";
						$error1 = "-";
						$error2 = " warna_error";
					}
				}
			?>
		<form action="" method="POST">
			<div class="error"><div class="isi_error <?php echo $error2;?>"><p><?php echo $error1;?></p><h3><?php echo $error;?></h3></div></div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri1">
					<label for="judul">Kategori</label>
					<p>Kategori Masukan</p>
				</div>
				<div class="admin_formulir_kanan1">
					<input type="text" name="kategori_tanggapan" value="<?php echo $tamTanggapan['kategori_masukan'];?>" readonly>
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri1">
					<label for="judul">Pengirim</label>
					<p>Nama Pengirim</p>
				</div>
				<div class="admin_formulir_kanan1">
					<input type="text" name="pengirim_tanggapan" value="<?php echo $tamTanggapan['pengirim'];?>" readonly>
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
					<p><?php echo $tamTanggapan['isi_masukan'];?></p>
					<input type="hidden" name="isi_masukan" value="<?php echo $tamTanggapan['isi_masukan'];?>">				
					<input type="hidden" name="id_masukan" value="<?php echo $tamTanggapan['id_masukan'];?>">				
					<input type="hidden" name="tanggapan_kepada" value="<?php echo $tamTanggapan['kepada'];?>">				
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<div class="admin_formulir_dalam">
				<div class="admin_formulir_kiri1">
					<label for="isi">Tanggapan</label>
					<p>Menanggapi Masukan</p>
				</div>
				<div class="admin_formulir_kanan1">
					<textarea name="tanggapan" id="isi_pengumuman" rows="8" required></textarea>							
				</div>
				<div class="clear"></div>
				<hr>
			</div>
			<input type="submit" id="kdk" name="ttggp" value="Tanggapan" />
		</form>
	</div>
</div>
<?php } ?>