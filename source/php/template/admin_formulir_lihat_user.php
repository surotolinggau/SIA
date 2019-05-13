	<div id="formulir_user" class="admin_formulir_muncul">
		<div id="admin_formulir3">
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Data User</h2>
			</div>
			<div class="clear"></div>
			<p id="deail_kelas">Data Seluruh User Pada Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_mp">
					<div id="user_batas">
					<table id="tabel_kelas">
						<tr>
							<th>Nama Pengguna</th>
							<th>Username</th>
							<th>Password</th>
							<th>Hak Akses</th>
							<th></th>
						</tr>
						<!-- PHP Tampil user lengkap -->
							<?php
								$tampillenguser = tamLenguser();
								while($row_tamlenguser = mysqli_fetch_assoc($tampillenguser)){
							?>
						<!-- PHP Tampil user lengkap -->
						<tr>
							<td><?php echo $row_tamlenguser['nama_pengguna'];?></td>
							<td><?php echo $row_tamlenguser['username'];?></td>
							<td><?php echo $row_tamlenguser['password'];?></td>
							<td><?php echo $row_tamlenguser['status_user'];?></td>
							<td><a href="?id_usr=<?php echo $row_tamlenguser['id_user'];?>#formulir_edit_user" title="Edit" id="edit_kontak" class="tombol_kelas tgi">S</a></td>
							<?php } //enwhile tampil user lengkap ?>
						</tr>
					</table>
					</div>
				</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>