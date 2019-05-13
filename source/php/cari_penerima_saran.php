<?php
require_once('../../source/php/init.php');
$penerima =  $_POST['kategori_penerima'];

if($penerima == '4'){
	$querypenerima = "SELECT * FROM user, ortu WHERE user.nama_pengguna= ortu.nama_ortu AND status_user='$penerima' AND nama_pengguna NOT IN ('Anom Suroto') ORDER BY nama_pengguna";
	$sqlpenerima = mysqli_query($con, $querypenerima);?>
		<div class="admin_formulir_kiri1">
			<label for="judul">Penerima</label>
			<p>Penerima Masukan</p>
		</div>
		<div class="admin_formulir_kanan1">
			<select name="nama_saran" required>
				<option id="opsel" value="" disabled selected>Pilih Nama Penerima</option>
				<?php while($tamPenerima = mysqli_fetch_assoc($sqlpenerima)){?>
				<option value="<?php echo $tamPenerima['nama_ortu'].'-'.$tamPenerima['no_telp'];?>">
					<?php echo $tamPenerima['nama_pengguna'];?>
				</option>
				<?php } ?>
			</select>
		</div>
		<div class="clear"></div>
		<hr>
	<?php }else{

	$querypenerima = "SELECT * FROM user, guru WHERE user.nama_pengguna= guru.nama_guru AND status_user='$penerima' AND nama_pengguna NOT IN ('Anom Suroto') ORDER BY nama_pengguna";
	$sqlpenerima = mysqli_query($con, $querypenerima);?>
		<div class="admin_formulir_kiri1">
			<label for="judul">Penerima</label>
			<p>Penerima Masukan</p>
		</div>
		<div class="admin_formulir_kanan1">
			<select name="nama_saran" required>
				<option id="opsel" value="" disabled selected>Pilih Nama Penerima</option>
				<?php while($tamPenerima = mysqli_fetch_assoc($sqlpenerima)){?>
				<option value="<?php echo $tamPenerima['nama_guru'].'-'.$tamPenerima['no_tel'];?>">
					<?php echo $tamPenerima['nama_pengguna'];?>
				</option>
				<?php } ?>
			</select>
		</div>
		<div class="clear"></div>
		<hr>
	<?php }?>