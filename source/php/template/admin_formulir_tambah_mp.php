	<div id="formulir_tmp" class="admin_formulir_muncul">
		<div id="admin_formulir3">
			<div class="info_kelas">
				<?php if(isset($_GET['id_mp'])){
					$taedma = 'Edit ';}else{ $taedma = 'Tambah';}
				?>
				<h2 id="judul_tambah_kelas"><?php echo $taedma;?> Mata Pelajaran Guru</h2>

				<!-- kertas formulir admin untuk tambah Pengumuman -->
					<?php require_once('../../source/php/crud_mapel.php');?>
				<!-- kertas formulir admin untuk tambah Pengumuman -->

			</div>
			<div class="clear"></div>
			<div class="error1">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<p id="deail_kelas"><?php echo $taedma;?> Mata Pelejaran Untuk Guru Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_mp">
				<form action="" method="POST" enctype="multipart/form-data">
				
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Mata Pelajaran</label>
						<p>Nama Mata Pelajaran</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="nama_mp" <?php if(isset($_GET['id_mp'])){ echo "value = \"".$row_mp['nama_mp']."\" ";}?> required/>								
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Keterangan</label>
						<p>Keterangan Mata Pelajaran</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="ketmp" <?php if(isset($_GET['id_mp'])){ echo "value = \"".$row_mp['ket_mp']."\" ";}?>required/>
						<input type="hidden" name="id_mapel" <?php if(isset($_GET['id_mp'])){ echo "value = \"".$row_mp['id_mp']."\" ";}?> />							
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				
				<?php if(!isset($_GET['id_mp'])){ echo '<input type="submit" id="kdk" name="tambah_mp" value="Tambah Data">'; } ?>
				<?php if(isset($_GET['id_mp'])){ echo '<input type="submit" id="kdk" name="edit_mp" value="Edit Data">'; } ?>
			</form>
			</div>

		</div>
		<div class="clear"></div>
	</div>