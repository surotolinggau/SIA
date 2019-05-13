<?php
if(isset($_GET['idthdr']) && isset($_GET['tgl'])){
	$getidklshadir = $_GET['idthdr'];
	$gettglhadir = $_GET['tgl'];
	$queritammurhad = "SELECT * FROM kelas, kelas_siswa, murid WHERE kelas.id_kelas=kelas_siswa.id_kelas AND kelas_siswa.id_murid=murid.id_murid AND kelas_siswa.id_kelas=$getidklshadir"; 
	$sqltammurhad = mysqli_query($con, $queritammurhad);
?>
<div id="formulirKehadiran" class="admin_formulir_muncul">
	<div id="admin_formulir">
		<h2>Tambah Data Kehadiran</h2>
		<?php
			$tglhadir = $gettglhadir; 
			$tamtglHadir = tanggalIndonesia($tglhadir);
			$queriinfoKelas = "SELECT * FROM kelas WHERE id_kelas=$getidklshadir"; 
			$sqlinfoKelas= mysqli_query($con, $queriinfoKelas);
			$taminfoKelas = mysqli_fetch_assoc($sqlinfoKelas);
		?>
		<p id="admin_penjelasan">Tambah Data Kehadiran Murid <?php echo $tamtglHadir?>, Kelas <?php echo $taminfoKelas['nama_kelas'].'/'.$taminfoKelas['ruang_kelas'].' Pada Tahun Ajaran '.$taminfoKelas['tahun_ajaran'];?></p>							
		<form action="../../source/php/crud_hadir.php" method="POST">
			<table id="tabel_kelas">
				<tr>
					<th>Nama Murid<input type="hidden" name="kehadiran_tgl" value="<?php echo $_GET['tgl'];?>"></th>
					<th>Keterangan Hadir</th>
				</tr>
				<?php 
					while($tammurhad = mysqli_fetch_assoc($sqltammurhad)){
				?>
				<tr>
					<td><?php echo $tammurhad['nama_murid'];?></td>
					<td>
						<input type="hidden" name="kehadiran_idks[]" value="<?php echo $tammurhad['id_ks'];?>">
						<input type="radio" name="kehadMrd_<?php echo $tammurhad['id_ks'];?>" value="hadir" checked> <span>HADIR</span>
						<input type="radio" name="kehadMrd_<?php echo $tammurhad['id_ks'];?>" value="tidak hadir"> <span>TIDAK HADIR</span>		
						<input type="radio" name="kehadMrd_<?php echo $tammurhad['id_ks'];?>" value="izin"> <span>IZIN</span>		
						<input type="radio" name="kehadMrd_<?php echo $tammurhad['id_ks'];?>" value="sakit"> <span>SAKIT</span>		
					</td>
				</tr>
				<?php } ?>
			</table>
			<input type="submit" id="kdk" name="tambah_hadir" value="Tambah Data Kehadiran">
		</form>
		<!-- Form Input Data Ortu-->

	</div>
</div>
<?php } ?>



<?php
if(isset($_GET['idehdr']) && isset($_GET['tgl'])){
	$geteidklshadir = $_GET['idehdr'];
	$getetglhadir = $_GET['tgl'];
	$arrayTgl = explode('-', $getetglhadir);
	$ehadirTahun =  $arrayTgl[0];
	$ehadirBulan = $arrayTgl[1];
	$ehadirHari = $arrayTgl[2];
	$querieditmurhad = "SELECT * FROM kehadiran, kelas_siswa, murid WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_murid=murid.id_murid AND kelas_siswa.id_kelas=$geteidklshadir AND hari='$ehadirHari' AND bulan='$ehadirBulan' AND tahun=$ehadirTahun";
	$sqltamemurhad = mysqli_query($con, $querieditmurhad);
?>
<div id="formulirKehadiran" class="admin_formulir_muncul">
	<div id="admin_formulir1">
		<h2>Lihat Data Kehadiran</h2>
		<?php
			$tglhadir = $getetglhadir; 
			$tamtglHadir = tanggalIndonesia($tglhadir);
			$queriinfoKelas = "SELECT * FROM kelas WHERE id_kelas=$geteidklshadir"; 
			$sqlinfoKelas= mysqli_query($con, $queriinfoKelas);
			$taminfoKelas = mysqli_fetch_assoc($sqlinfoKelas);
		?>
		<p id="admin_penjelasan">Lihat Data Kehadiran Murid <?php echo $tamtglHadir;?>, Kelas <?php echo $taminfoKelas['nama_kelas'].'/'.$taminfoKelas['ruang_kelas'].' Pada Tahun Ajaran '.$taminfoKelas['tahun_ajaran'];?></p>
		<!-- Form Input Data Ortu-->							
		<form action="../../source/php/crud_hadir.php" method="POST">
			<table id="tabel_kelas">
				<tr>
					<th>Nama Murid<input type="hidden" name="kehadiran_tgl" value="<?php echo $getetglhadir;?>"></th>
					<th>Keterangan Hadir</th>
				</tr>
				<?php 
					while($tamemurhad = mysqli_fetch_assoc($sqltamemurhad)){
				?>
				<tr>
					<td><?php echo $tamemurhad['nama_murid'];?></td>
					<td>
						<span>
						<input type="hidden" name="kehadiran_lidks[]" value="<?php echo $tamemurhad['id_ks'];?>">
						<?php echo $tamemurhad['keterangan_hadir'];?>
						</span>		
					</td>
				</tr>
				<?php } ?>
			</table>
			<input type="submit" id="hpshadir" onclick="return confirm('Yakin Untuk Menghapus Kehadiran Tanggal \'<?php echo $tamtglHadir;?>\' Kelas <?php echo $taminfoKelas['nama_kelas'].'/'.$taminfoKelas['ruang_kelas'];?> Tahun Ajaran <?php echo $taminfoKelas['tahun_ajaran'];?> ?')" name="hapus_kehadiran" value="Hapus Data Kehadiran">
		</form>
		<!-- Form Input Data Ortu-->

	</div>
</div>
<?php } ?>

<?php
if(isset($_GET['idedthdr']) && isset($_GET['tgl'])){
	$getedtidklshadir = $_GET['idedthdr'];
	$getedttglhadir = $_GET['tgl'];
	$arrayTgl = explode('-', $getedttglhadir);
	$edhadirTahun =  $arrayTgl[0];
	$edhadirBulan = $arrayTgl[1];
	$edhadirHari = $arrayTgl[2];
	$querieditmurhad = "SELECT * FROM kehadiran, kelas_siswa, murid WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_murid=murid.id_murid AND kelas_siswa.id_kelas=$getedtidklshadir AND hari='$edhadirHari' AND bulan='$edhadirBulan' AND tahun=$edhadirTahun"; 
	$sqltamemurhad = mysqli_query($con, $querieditmurhad);
?>
<div id="formulirKehadiran" class="admin_formulir_muncul">
	<div id="admin_formulir1">
		<h2>Edit Data Kehadiran</h2>
		<?php
			$tglhadir = $getedttglhadir; 
			$tamtglHadir = tanggalIndonesia($tglhadir);
			$queriinfoKelas = "SELECT * FROM kelas WHERE id_kelas=$getedtidklshadir"; 
			$sqlinfoKelas= mysqli_query($con, $queriinfoKelas);
			$taminfoKelas = mysqli_fetch_assoc($sqlinfoKelas);
		?>
		<p id="admin_penjelasan">Edit Data Kehadiran Murid <?php echo $tamtglHadir?>, Kelas <?php echo $taminfoKelas['nama_kelas'].'/'.$taminfoKelas['ruang_kelas'].' Pada Tahun Ajaran '.$taminfoKelas['tahun_ajaran'];?></p>
		<!-- Form Input Data Ortu-->							
		<form action="../../source/php/crud_hadir.php" method="POST">
			<table id="tabel_kelas">
				<tr>
					<th>Nama Murid<input type="hidden" name="kehadiran_tgl" value="<?php echo $getedttglhadir;?>"></th>
					<th>Keterangan Hadir</th>
				</tr>
				<?php 
					while($tamedtmurhad = mysqli_fetch_assoc($sqltamemurhad)){
				?>
				<tr>
					<td><?php echo $tamedtmurhad['nama_murid'];?></td>
					<td>
						<span>
						<input type="hidden" name="kehadiran_idks[]" value="<?php echo $tamedtmurhad['id_ks'];?>">
						<input type="radio" name="kehadMrd_<?php echo $tamedtmurhad['id_ks'];?>" value="hadir" <?php if($tamedtmurhad['keterangan_hadir'] == 'hadir'){echo "checked";}?>> <span>HADIR</span>
						<input type="radio" name="kehadMrd_<?php echo $tamedtmurhad['id_ks'];?>" value="tidak hadir" <?php if($tamedtmurhad['keterangan_hadir'] == 'tidak hadir'){echo "checked";}?>> <span>TIDAK HADIR</span>		
						<input type="radio" name="kehadMrd_<?php echo $tamedtmurhad['id_ks'];?>" value="izin" <?php if($tamedtmurhad['keterangan_hadir'] == 'izin'){echo "checked";}?>> <span>IZIN</span>		
						<input type="radio" name="kehadMrd_<?php echo $tamedtmurhad['id_ks'];?>" value="sakit" <?php if($tamedtmurhad['keterangan_hadir'] == 'sakit'){echo "checked";}?>> <span>SAKIT</span>
						</span>		
					</td>
				</tr>
				<?php } ?>
			</table>
			<input type="submit" id="kdk" name="edit_kehadiran" value="Edit Data Kehadiran">
		</form>
		<!-- Form Input Data Ortu-->

	</div>
</div>
<?php } ?>