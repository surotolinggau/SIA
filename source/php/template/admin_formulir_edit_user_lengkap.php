	<?php if(isset($_GET['id_usr'])){?>
	<div id="formulir_edit_user" class="admin_formulir_muncul">
		<div id="admin_formulir3">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Edit Data User</h2>

				<?php
					$tpl_user = tmplUSer($_GET['id_usr']);
					$row_tmpilusr = mysqli_fetch_assoc($tpl_user);
				?>

			</div>
			<div class="clear"></div>
			<div class="error1">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<div class="clear"></div>
			<p id="deail_kelas">Edit Data User Pada Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_mp">
				<form action="../../source/php/udpate_user.php" method="POST" enctype="multipart/form-data">
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Nama Pengguna</label>
						<p>Nama User SIA SDN 20 LLG</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="username" value="<?php echo $row_tmpilusr['nama_pengguna'];?>" disabled/>								
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Username</label>
						<p>Username SIA SDN 20 LLG</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="username" value="<?php echo $row_tmpilusr['username'];?>" required/>								
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Password</label>
						<p>Password SIA SDN 20 LLG</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="text" name="password" value="<?php echo $row_tmpilusr['password'];?>" required/>
						<input type="hidden" name="id_user" value="<?php echo $row_tmpilusr['id_user'];?>" required/>	
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Hak Akses</label>
						<p>Hak Akses User</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="hak_akses" required>
						    <option  id="opsel" value="" disabled selected>Pilih Hak Akses</option>
						    <option value="1" <?php if ($row_tmpilusr['status_user'] == 1 ){echo 'selected';} ?>>1 -> Admin</option>
						    <option value="2" <?php if ($row_tmpilusr['status_user'] == 2 ){echo 'selected';} ?>>2 -> Kepala Sekolah</option>
						    <option value="3" <?php if ($row_tmpilusr['status_user'] == 3 ){echo 'selected';} ?>>3 -> Guru</option>
						    <option value="4" <?php if ($row_tmpilusr['status_user'] == 4 ){echo 'selected';} ?>>4 -> Orangtua Murid</option>
					  	</select>		
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				
				<input type="submit" id="kdk" name="simpan_edit_user_lengkap" value="Simpan Data">
			</form>
			</div>

		</div>
		<div class="clear"></div>
	</div>
	<?php } ?>