<?php if(!isset($_GET['tk'])){?>
<tr>
	<th>+</th>
	<th>Nama Ortu</th>
	<th>Perkerjaan</th>
	<th>Kontak</th>
</tr>
<?php } //endwhile ?>

<!-- PHP Menampilkan Data ortu -->
<?php 
	if(!isset($_GET['tk'])){
	$tam_kon = tampilKontak();
	while($row_pe=mysqli_fetch_assoc($tam_kon)){
?>
<!-- PHP Menampilkan Data ortu -->

<tr>
	<td><input type="checkbox" name="nm_chk_kontak[]" value="<?php echo $row_pe['id_ortu'];?>" /></td>
	<td><?php echo $row_pe['nama_ortu'];?></td>
	<td><?php echo $row_pe['pekerjaan'];?></td>
	<td><?php echo "+62".$row_pe['no_telp'];?></td>
<?php }} //endwhile ?>

<?php if(isset($_GET['tk'])){ ?>
<tr>
	<th>Nama Ortu</th>
	<th>Perkerjaan</th>
	<th>Kontak</th>
	<th></th>
</tr>
<?php } //endwhile ?>

<!-- PHP Menampilkan Data ortu -->
<?php 
	if(isset($_GET['tk'])){
		if($_GET['gr']==""){
			$tam_kon = tampilKontak();
			while($row_pe=mysqli_fetch_assoc($tam_kon)){
?>
	<tr>
	<td><?php echo $row_pe['nama_ortu'];?></td>
	<td><?php echo $row_pe['pekerjaan'];?></td>
	<td><?php echo "+62".$row_pe['no_telp'];?></td>
	<td></td>
	</tr>
<?php
		}}else{
		$ta_kon = tampilOrKontak();
		$rw_pe=mysqli_fetch_assoc($ta_kon);
		for ($i=0; $i < $p_array ; $i++) { 
		$query_tam = "SELECT * FROM ortu WHERE id_ortu='$array_id[$i]'";
		$hasil_kntk = mysqli_query($con,$query_tam);
		$hsl_kontk = mysqli_fetch_assoc($hasil_kntk);
?>
<!-- PHP Menampilkan Data ortu -->

<tr>
	<td><?php echo $hsl_kontk['nama_ortu'];?></td>
	<td><?php echo $hsl_kontk['pekerjaan'];?></td>
	<td><?php echo "+62".$hsl_kontk['no_telp'];?></td>
	<td><a href="../../source/php/delete_per_ortu_kontak.php?io=<?php echo $hsl_kontk['id_ortu'];?>&ng=<?php echo $rw_pe['nama_grup'];?> " onclick="return confirm('Yakin Untuk Menghapus Data <?php echo $hsl_kontk['nama_ortu'];?> Dari Grup <?php echo $rw_pe['nama_grup'];?>') " id="hapus_kontak">'</a></td>
</tr>
<?php }}} //endwhile ?>